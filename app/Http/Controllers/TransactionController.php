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
        $request->validate([
            'status' => 'required|in:ditolak,berlangsung,dikembalikan,selesai',
        ]);

        $transaction = Transaction::findOrFail($id);

        $transaction->status = $request->status;
        $transaction->save();

        return redirect()->back()->with('success', 'Status transaksi berhasil diperbarui!');
    }

    public function store(Request $request)
    {
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
            foreach ($request->rooms as $room) {
                $transaction = Transaction::create([
                    'status' => $request->status,
                    'borrow_date' => Carbon::parse($request->borrow_date),
                    'return_date' => Carbon::parse($request->return_date),
                    'user_id' => $request->user_id,
                    'room_id' => $room['room_id'],
                ]);

                if (!$transaction) {
                    return back()->withErrors('Failed to create transaction for room_id: ' . $room['room_id']);
                }

                foreach ($request->details as $detail) {
                    if (
                        ($detail['material_id'] != 0 && $detail['tool_id'] == 0 && $detail['room_id'] == $room['room_id']) ||
                        ($detail['tool_id'] != 0 && $detail['material_id'] == 0 && $detail['room_id'] == $room['room_id'])
                    ) {
                        $transactionDetail = TransactionDetail::create([
                            'tool_id' => $detail['tool_id'] ?? 0,
                            'material_id' => $detail['material_id'] ?? 0,
                            'trans_id' => $transaction->id,
                            'amount' => $detail['amount'],
                        ]);

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
                        return back()->withErrors([
                            'error' => 'Invalid tool_id or material_id combination for room_id: ' . $room['room_id']
                        ]);
                    }
                }
            }

            Cart::where('user_id', $request->user_id)->delete();

            return redirect()->route('peminjaman', $request->user_id)->with('success', 'Transaction created successfully!');
        } catch (\Exception $e) {
            return back()->withErrors('An error occurred: ' . $e->getMessage());
        }
    }

    public function store2(Request $request)
    {
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

            $transaction = Transaction::create([
                'status' => $request->status,
                'borrow_date' => Carbon::parse($request->borrow_date),
                'return_date' => Carbon::parse($request->return_date),
                'user_id' => $request->user_id,
                'room_id' => $room,
            ]);

            foreach ($request->details as $detail) {
                if (($detail['material_id'] != 0 && $detail['tool_id'] == 0) || ($detail['material_id'] == 0 && $detail['tool_id'] != 0)) {
                    TransactionDetail::create([
                        'tool_id' => $detail['tool_id'] ?? 0,
                        'material_id' => $detail['material_id'] ?? 0,
                        'trans_id' => $transaction->id,
                        'amount' => $detail['amount'],
                    ]);
                } else {
                    return back()->withErrors('Invalid tool_id or material_id combination.');
                }
            }

        }
        Cart::where('user_id', $request->user_id)->delete();

        return redirect()->route('peminjaman', $transaction->user_id)->with('success', 'Transaction created successfully!');
    }

    public function generatePDF($id)
    {
        $trans = Transaction::findOrFail($id);

        $materials = TransactionDetail::where('material_id', '!=', 0)->where('trans_id', $id)->get();
        $tools = TransactionDetail::where('tool_id', '!=', 0)->where('trans_id', $id)->get();

        $total = 0;
        foreach ($materials as $value) {
            $total = $total + $value->amount;
        }
        foreach ($tools as $value) {
            $total = $total + $value->amount;
        }

        $html = view('user.components.generate-pdf.trans', compact('trans', 'materials', 'tools', 'total'))->render();

        $mpdf = new \Mpdf\Mpdf();

        $mpdf->WriteHTML($html);

        $mpdf->Output('transaksi_' . $trans->id . '_' . $trans->user->name . '.pdf', \Mpdf\Output\Destination::DOWNLOAD);

        return redirect()->back();
    }
}


