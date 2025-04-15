<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function index()
    {
        // Ambil semua data transaksi dengan relasi yang dibutuhkan
        $transactions = DB::table('transaksi as t')
            ->join('kendaraan as k', 't.id_kendaraan', '=', 'k.id_kendaraan')
            ->join('layanan_transaksi as l', 't.id_layanan_transaksi', '=', 'l.id_layanan_transaksi')
            ->join('status_transaksi as s', 't.id_status_transaksi', '=', 's.id_status_transaksi')
            ->select(
                't.id_transaksi',
                'k.jenis_kendaraan',
                'k.no_plat',
                'l.nama_layanan as jenis_layanan_transaksi',
                'l.harga as total_harga',
                's.nama_status_transaksi as status',
                't.created_at as waktu_dibuat',
                't.updated_at as terakhir_diupdate'
            )
            ->get();

        // Kembalikan dalam format JSON
        return response()->json([
            'message' => 'Data transaksi berhasil diambil',
            'data' => $transactions
        ], 200);
    }

    public function show($id)
    {
        $transaksi = Transaction::with([
            'kendaraan:id_kendaraan,jenis_kendaraan,no_plat',
            'layananTransaksi:id_layanan_transaksi,nama_layanan,harga',
            'statusTransaksi:id_status_transaksi,nama_status_transaksi'
        ])->find($id);

        if (!$transaksi) {
            return response()->json([
                'message' => 'Transaksi tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'data' => [
                'id_transaksi' => $transaksi->id_transaksi,
                'jenis_kendaraan' => $transaksi->kendaraan->jenis_kendaraan,
                'no_plat' => $transaksi->kendaraan->no_plat,
                'jenis_layanan_transaksi' => $transaksi->layananTransaksi->nama_layanan,
                'total_harga' => $transaksi->layananTransaksi->harga,
                'status' => $transaksi->statusTransaksi->nama_status_transaksi,
                'waktu_dibuat' => $transaksi->created_at,
                'terakhir_diupdate' => $transaksi->updated_at,
            ]
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|exists:users,id_user',
            'id_admin' => 'required|exists:admins,id_admin',
            'id_kendaraan' => 'required|exists:kendaraan,id_kendaraan',
            'id_layanan_transaksi' => 'required|exists:layanan_transaksi,id_layanan_transaksi',
            'id_status_transaksi' => 'required|exists:status_transaksi,id_status_transaksi',
        ]);

        $transaksi = Transaction::create($validated);

        return response()->json([
            'message' => 'Transaksi berhasil dibuat',
            'data' => $transaksi
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id_user',
            'id_admin' => 'required|exists:admins,id_admin',
            'id_kendaraan' => 'required|exists:kendaraan,id_kendaraan',
            'id_layanan_transaksi' => 'required|exists:layanan_transaksi,id_layanan_transaksi',
            'id_status_transaksi' => 'required|exists:status_transaksi,id_status_transaksi',
        ]);

        $transaksi = Transaction::find($id);

        if (!$transaksi) {
            return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
        }

        $transaksi->update([
            'id_user' => $request->id_user,
            'id_admin' => $request->id_admin,
            'id_kendaraan' => $request->id_kendaraan,
            'id_layanan_transaksi' => $request->id_layanan_transaksi,
            'id_status_transaksi' => $request->id_status_transaksi,
        ]);

        return response()->json([
            'message' => 'Transaksi berhasil diperbarui',
            'data' => $transaksi
        ], 200);
    }

    public function destroy($id)
    {
        $transaksi = Transaction::find($id);

        if (!$transaksi) {
            return response()->json([
                'message' => 'Transaksi tidak ditemukan'
            ], 404);
        }

        $transaksi->delete();

        return response()->json([
            'message' => 'Transaksi berhasil dihapus'
        ], 200);
    }
}
