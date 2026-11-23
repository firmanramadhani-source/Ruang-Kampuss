<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karier extends Model
{
    protected $table = 'kariers';

    protected $fillable = ['judul', 'deskripsi', 'meta', 'url', 'gambar'];
}