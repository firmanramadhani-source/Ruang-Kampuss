<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = ['judul', 'deskripsi', 'meta', 'url', 'gambar', 'mulai', 'selesai'];

    protected $casts = [
        'mulai' => 'date',
        'selesai' => 'date',
    ];
}