<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    protected $table = 'buku';
    protected $fillable = ['judul', 'pengarang', 'penerbit', 'tahun_terbit', 'status'];
}
