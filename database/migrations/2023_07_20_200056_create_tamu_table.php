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
        Schema::create('tamu', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nama_lengkap');
            $table->string('instansi');
            $table->datetime('jadwal_temu');
            // $table->unsignedBigInteger('bidang_id')->nullable();
            // $table->foreign('bidang_id')->references('id')->on('bidang')->onDelete('cascade');
            $table->unsignedBigInteger('pegawai_id')->nullable();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->longText('keperluan');
            $table->enum('status', ['Sudah', 'Belum', 'Batal'])->nullable()->default('Belum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tamu');
    }
};
