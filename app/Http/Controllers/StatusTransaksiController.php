<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Carbon\Carbon;

class StatusTransaksiController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $data = [
            'total_transaksi' => Transaction::whereDate('created_at', $today)->count(),
            'belum_dicuci' => Transaction::whereDate('created_at', $today)
                                         ->whereHas('statusTransaksi', function ($q) {
                                             $q->where('nama_status_transaksi', 'Belum Dicuci');
                                         })->count(),
            'sedang_dicuci' => Transaction::whereDate('created_at', $today)
                                          ->whereHas('statusTransaksi', function ($q) {
                                              $q->where('nama_status_transaksi', 'Sedang Dicuci');
                                          })->count(),
            'selesai_dicuci' => Transaction::whereDate('created_at', $today)
                                           ->whereHas('statusTransaksi', function ($q) {
                                               $q->where('nama_status_transaksi', 'Selesai Dicuci');
                                           })->count(),
        ];

        return response()->json($data);
    }
}
