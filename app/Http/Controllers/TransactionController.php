<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;
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

        return view('user.pages.borrows', compact('transactions', 'details'));
    }

    public function store(Request $request)
    {
        // dd($request);
        // Validasi input
        $request->validate([
            'status' => 'required|string',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after:borrow_date',
            'user_id' => 'required|exists:users,id',
            'details' => 'required|array',
            'details.*.tool_id' => 'nullable|integer|exists:tools,id',
            'details.*.material_id' => 'nullable|integer|exists:materials,id',
            'details.*.amount' => 'required|integer|min:1',
        ]);

        // Create Transaction
        $transaction = Transaction::create([
            'status' => $request->status,
            'borrow_date' => Carbon::parse($request->borrow_date),
            'return_date' => Carbon::parse($request->return_date),
            'user_id' => $request->user_id,
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
        $mpdf->Output('transaksi_'. $trans->id . '_' . $trans->user->name .'.pdf', \Mpdf\Output\Destination::DOWNLOAD);

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back();
    }
}


