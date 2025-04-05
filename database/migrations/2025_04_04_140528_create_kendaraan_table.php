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
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id('id_kendaraan');
            $table->string('no_plat');
            $table->enum('jenis_kendaraan', ['motor', 'mobil'])->default('motor');
            $table->string('model_kendaraan');

            // foreign key ke id user
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
};
