<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Employee;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\RoomDetail;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index($id)
    {
        $transactions = Transaction::where('user_id', $id)->get();

        $details = collect();

        foreach ($transactions as $trans) {
            $detail = TransactionDetail::where('trans_id', $trans->id)->get();
            $details = $details->merge($detail);
        }

        $uniqueRoomIds = Cart::where('user_id', $id)->pluck('room_id')->unique();

        return view('user.pages.borrows', compact('transactions', 'details', 'uniqueRoomIds'));
    }

    public function admin()
    {
        $employee = Employee::where('user_id', auth()->id())->first();

        $faculty = Room::findOrFail($employee->room_id)->faculty_name;

        $rooms = Room::where('faculty_name', $faculty)->get();

        $transactions = Transaction::whereHas('room', function ($query) use ($faculty) {
            $query->where('faculty_name', $faculty);
        })->orderBy('room_id', 'asc')->get();

        return view('admin.pages.transaction.index', compact('transactions', 'faculty', 'rooms'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|in:ditolak,berlangsung,dikembalikan,selesai',
        ]);

        // Cari transaksi berdasarkan ID
        $transaction = Transaction::findOrFail($id);

        // Update status
        $transaction->status = $request->status;
        $transaction->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Status transaksi berhasil diperbarui!');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'status' => 'required|string',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after:borrow_date',
            'user_id' => 'required|exists:users,id',
            'rooms' => 'required|array',
            'rooms.*.room_id' => 'required|integer|exists:rooms,id',
            'details' => 'required|array',
            'details.*.tool_id' => 'nullable|integer|exists:tools,id',
            'details.*.material_id' => 'nullable|integer|exists:materials,id',
            'details.*.room_id' => 'nullable|integer|exists:rooms,id',
            'details.*.amount' => 'required|integer|min:1',
        ]);

        try {
            // Loop setiap unique room_id
            foreach ($request->rooms as $room) {
                // Buat transaksi untuk room_id tertentu
                $transaction = Transaction::create([
                    'status' => $request->status,
                    'borrow_date' => Carbon::parse($request->borrow_date),
                    'return_date' => Carbon::parse($request->return_date),
                    'user_id' => $request->user_id,
                    'room_id' => $room['room_id'],
                ]);

                // Debug: Cek apakah transaksi berhasil dibuat
                if (!$transaction) {
                    return back()->withErrors('Failed to create transaction for room_id: ' . $room['room_id']);
                }

                // Ambil details yang terkait dengan room_id
                foreach ($request->details as $detail) {
                    if (
                        ($detail['material_id'] != 0 && $detail['tool_id'] == 0 && $detail['room_id'] == $room['room_id']) ||
                        ($detail['tool_id'] != 0 && $detail['material_id'] == 0 && $detail['room_id'] == $room['room_id'])
                    ) {
                        // Buat detail transaksi
                        $transactionDetail = TransactionDetail::create([
                            'tool_id' => $detail['tool_id'] ?? 0,
                            'material_id' => $detail['material_id'] ?? 0,
                            'trans_id' => $transaction->id,
                            'amount' => $detail['amount'],
                        ]);

                        // Kurangi current_stocks pada RoomDetail
                        $roomDetail = RoomDetail::where('room_id', $room['room_id'])
                            ->where(function ($query) use ($detail) {
                                if (!empty($detail['tool_id'])) {
                                    $query->where('tool_id', $detail['tool_id']);
                                }
                                if (!empty($detail['material_id'])) {
                                    $query->where('material_id', $detail['material_id']);
                                }
                            })
                            ->first();

                        if ($roomDetail) {
                            // Pastikan current_stocks cukup sebelum dikurangi
                            if ($roomDetail->current_stocks >= $detail['amount']) {
                                $roomDetail->decrement('current_stocks', $detail['amount']);
                            } else {
                                return back()->withErrors([
                                    'error' => 'Not enough stock for room_id: ' . $room['room_id'] . ', tool/material ID: ' . ($detail['tool_id'] ?? $detail['material_id']),
                                ]);
                            }
                        } else {
                            return back()->withErrors([
                                'error' => 'RoomDetail not found for room_id: ' . $room['room_id'] . ', tool/material ID: ' . ($detail['tool_id'] ?? $detail['material_id']),
                            ]);
                        }
                    } else if ($detail['room_id'] != $room['room_id']) {
                        continue;
                    } else {
                        // Kirim error dengan room_id spesifik
                        return back()->withErrors([
                            'error' => 'Invalid tool_id or material_id combination for room_id: ' . $room['room_id']
                        ]);
                    }
                }
            }

            // Hapus keranjang belanja pengguna
            Cart::where('user_id', $request->user_id)->delete();

            return redirect()->route('peminjaman', $request->user_id)->with('success', 'Transaction created successfully!');
        } catch (\Exception $e) {
            // Tangkap error dan kembalikan pesan error
            return back()->withErrors('An error occurred: ' . $e->getMessage());
        }
    }

    public function store2(Request $request)
    {
        // dd($request);
        // Validasi input
        $request->validate([
            'status' => 'required|string',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after:borrow_date',
            'user_id' => 'required|exists:users,id',
            'rooms' => 'required|array',
            'rooms.*.room_id' => 'required|required|integer',
            'details' => 'required|array',
            'details.*.tool_id' => 'nullable|integer|exists:tools,id',
            'details.*.material_id' => 'nullable|integer|exists:materials,id',
            'details.*.amount' => 'required|integer|min:1',
        ]);

        foreach ($request->rooms as $room) {

            // Create Transaction
            $transaction = Transaction::create([
                'status' => $request->status,
                'borrow_date' => Carbon::parse($request->borrow_date),
                'return_date' => Carbon::parse($request->return_date),
                'user_id' => $request->user_id,
                'room_id' => $room,
            ]);

            // Loop through details and create TransactionDetail
            foreach ($request->details as $detail) {
                // Ensure tool_id and material_id validation
                if (($detail['material_id'] != 0 && $detail['tool_id'] == 0) || ($detail['material_id'] == 0 && $detail['tool_id'] != 0)) {
                    TransactionDetail::create([
                        'tool_id' => $detail['tool_id'] ?? 0,
                        'material_id' => $detail['material_id'] ?? 0,
                        'trans_id' => $transaction->id,
                        'amount' => $detail['amount'],
                    ]);
                } else {
                    // Return an error if validation fails
                    return back()->withErrors('Invalid tool_id or material_id combination.');
                }
            }

        }
        // Hapus seluruh isi cart dengan user_id pembuat transaction
        Cart::where('user_id', $request->user_id)->delete();

        return redirect()->route('peminjaman', $transaction->user_id)->with('success', 'Transaction created successfully!');
    }

    public function generatePDF($id)
    {
        // Ambil data room berdasarkan ID
        $trans = Transaction::findOrFail($id);

        // Ambil materials dan tools berdasarkan room_id
        $materials = TransactionDetail::where('material_id', '!=', 0)->where('trans_id', $id)->get();
        $tools = TransactionDetail::where('tool_id', '!=', 0)->where('trans_id', $id)->get();

        $total = 0;
        foreach ($materials as $value) {
            $total = $total + $value->amount;
        }
        foreach ($tools as $value) {
            $total = $total + $value->amount;
        }

        // Load view menggunakan mPDF
        $html = view('user.components.generate-pdf.trans', compact('trans', 'materials', 'tools', 'total'))->render();

        // Setup mPDF
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);

        // Download file PDF dengan nama laravel_demo.pdf
        $mpdf->Output('transaksi_' . $trans->id . '_' . $trans->user->name . '.pdf', \Mpdf\Output\Destination::DOWNLOAD);

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }
}


