<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use App\Model\AnggotaModel;
use App\Model\DaerahModel;
use App\Model\DatakimModel;
use Illuminate\Http\Request;

class PublikController extends Controller
{
    public function index()
    {
        $data =  AnggotaModel::all();
        return view('Layout.public', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $check = DatakimModel::where('kd_kim', '=', $request->kd_kim)->first();
        $check2 = DatakimModel::where('nama_kim', '=', $request->nama_kim)->first();
        if ($check != '') {
            if ($check2 != '') {
                AnggotaModel::create($request->all());
                return back()->with('succes', 'Data Berhasil Di Tambahkan');
            } else {
                return back()->with('error', 'Data Kim Tidak ditemukan, mohon periksa lagi nama kim anda');
            }
        } else {
            return back()->with('error', 'Data Kim Tidak ditemukan, mohon periksa lagi kode kim anda');
        }
    }
}
