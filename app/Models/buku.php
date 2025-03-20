<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    //table yangdigunakan
    protected $table = 'buku';

    //field yang dapat diisi
    protected $fillable = ['judul', 'pengarang', 'penerbit', 'tahun_terbit', 'status'];
}
