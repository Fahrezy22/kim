<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DaerahModel extends Model
{
    protected $table = 'daerah';
    protected $fillable = [
        'id',
        'kabupaten',
        'created_at',
        'deleted_at'
    ];
}
