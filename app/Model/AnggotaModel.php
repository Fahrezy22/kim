<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    protected $table = 'anggota';
    protected $fillable = [
        'id',
        'kd_kim',
        'nama_kim',
        'ttl',
        'alamat_lengkap',
        'nama',
        'created_at',
        'deleted_at'
    ];
    public function kd_kim_rol()
    {
        return $this->belongsTo(DatakimModel::class, 'kd_kim');
    }
}
