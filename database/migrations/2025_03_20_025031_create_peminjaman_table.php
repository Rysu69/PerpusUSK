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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_buku')->constrained('buku');
            $table->foreignId('id_pengunjung')->constrained('pengunjung');
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_terakhir_pengembalian');
            $table->date('tanggal_pengembalian')->nullable();
            $table->enum('status', ['dipinjam', 'dikembalikan','terlambat']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
