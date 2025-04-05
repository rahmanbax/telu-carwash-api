<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');

            // foreign key ke user
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users');
            
            // foreign key ke admin
            $table->unsignedBigInteger('id_admin');
            $table->foreign('id_admin')->references('id_admin')->on('admins');
            
            // foreign key ke kendaraan
            $table->unsignedBigInteger('id_kendaraan');
            $table->foreign('id_kendaraan')->references('id_kendaraan')->on('kendaraan');
            
            // foreign key ke layanan transaksi
            $table->unsignedBigInteger('id_layanan_transaksi');
            $table->foreign('id_layanan_transaksi')->references('id_layanan_transaksi')->on('layanan_transaksi');
            
            // foreign key ke status transaksi
            $table->unsignedBigInteger('id_status_transaksi')->default(2);
            $table->foreign('id_status_transaksi')->references('id_status_transaksi')->on('status_transaksi');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
