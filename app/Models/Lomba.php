<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    protected $table = 'lombas';

    protected $fillable = ['judul', 'deskripsi', 'meta', 'url', 'gambar', 'deadline'];

    protected $casts = ['deadline' => 'date'];
}