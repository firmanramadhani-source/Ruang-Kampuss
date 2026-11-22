<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kos extends Model
{
    protected $table = 'kos';

    protected $fillable = ['judul', 'deskripsi', 'meta', 'url', 'gambar'];
}