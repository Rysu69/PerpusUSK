<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $fillable = ['id_buku', 'id_pengunjung', 'tanggal_peminjaman', 'tanggal_pengembalian','tanggal_terakhir_pengembalian', 'status'];
}
