<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BeritaModel;
use App\Model\DaerahModel;
use App\Model\DatakimModel;
use App\Model\GambarModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = array(
            'jumlah_daerah' => DaerahModel::count(),
            'jumlah_kim' => DatakimModel::count(),
            'jumlah_gambar' => GambarModel::count(),
            'jumlah_berita' => BeritaModel::count(),
            'berita' => BeritaModel::all(),
            'gambar' => GambarModel::all(),
        );
        return view('Admin.dashboard', ['data' => $data]);
    }
}
