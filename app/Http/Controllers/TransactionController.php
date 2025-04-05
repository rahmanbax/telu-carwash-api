<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        // Ambil semua data transaksi dengan relasi yang dibutuhkan
        $transactions = Transaction::with([
            'user',
            'admin',
            'kendaraan',
            'layananTransaksi',
            'statusTransaksi'
        ])->get();

        // Kembalikan dalam format JSON
        return response()->json([
            'message' => 'Data transaksi berhasil diambil',
            'data' => $transactions
        ], 200);
    }
}
