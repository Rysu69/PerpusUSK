<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class pengunjung extends Authenticatable
{
    //table yangdigunakan
    protected $table = 'pengunjung';

    //field yang dapat diisi
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
