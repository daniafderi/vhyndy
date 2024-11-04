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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('invoice');
            $table->string('judul_servis');
            $table->date('tanggal_servis');
            $table->string('nama_pelanggan');
            $table->string('alamat_pelanggan')->nullable();
            $table->string('kontak_pelanggan')->nullable();
            $table->foreignId('status_id');
            $table->foreignId('category_id');
            $table->string('merek_perangkat');
            $table->string('type_perangkat');
            $table->string('kelengkapan');
            $table->text('kerusakan');
            $table->string('foto_perangkat')->nullable();
            $table->string('penggunaan_sparepart');
            $table->string('sparepart_digunakan')->nullable();
            $table->bigInteger('harga_sparepart');
            $table->bigInteger('harga_jual_sparepart');
            $table->bigInteger('harga_jasa');
            $table->bigInteger('harga_total');
            $table->string('metode_pembayaran');
            $table->date('tanggal_pembayaran')->nullable();
            $table->bigInteger('jumlah_sudah_dibayar');
            $table->bigInteger('jumlah_belum_dibayar');
            $table->timestamps();
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
