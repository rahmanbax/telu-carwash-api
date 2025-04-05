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
        Schema::create('booking', function (Blueprint $table) {
            $table->id('id_booking');

            // foreign key ke transaksi
            $table->unsignedBigInteger('id_transaksi');
            $table->foreign('id_transaksi')->references('id_transaksi')->on('transaksi');
            
            // foreign key ke users
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users');

            $table->dateTime('tanggal_booking');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
