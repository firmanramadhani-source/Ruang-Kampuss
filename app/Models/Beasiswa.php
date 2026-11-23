<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    protected $table = 'beasiswas';

    protected $fillable = ['judul', 'deskripsi', 'meta', 'url', 'gambar', 'deadline'];

    protected $casts = ['deadline' => 'date'];
}