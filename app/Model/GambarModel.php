<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GambarModel extends Model
{
    protected $table = 'gambar';
    protected $fillable = [
        'id',
        'nama',
        'nama_gambar',
        'created_at',
        'deleted_at'
    ];
}
