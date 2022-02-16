<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DatakimModel extends Model
{
    protected $table = 'datakim';
    protected $fillable = [
        'id',
        'kd_kim',
        'nama_kim',
        'kd_daerah',
        'email_kim',
        'medsos',
        'web_resmi',
        'tanggal_terbentuk',
        'alamat_kim',
        'kecamatan',
        'desa',
        'created_at',
        'deleted_at'
    ];
    public function kabupaten_rol()
    {
        return $this->belongsTo(DaerahModel::class, 'kd_daerah');
    }
}
