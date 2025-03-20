<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    //table yangdigunakan
    protected $table = 'peminjaman';

    //field yang dapat diisi
    protected $fillable = ['id_buku', 'id_pengunjung', 'tanggal_peminjaman', 'tanggal_terakhir_pengembalian'];
}
