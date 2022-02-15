<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BeritaModel extends Model
{
    protected $table = 'berita';
    protected $fillable = [
        'id',
        'judul_berita',
        'deskripsi',
        'created_at',
        'deleted_at'
    ];
}
