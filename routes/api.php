<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\StatusTransaksiController;

Route::apiResource('transactions', TransactionController::class);
Route::get('status_transaksi', [StatusTransaksiController::class, 'index']);
