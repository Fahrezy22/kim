<?php

namespace App\Http\Controllers\Publik;

use App\Http\Controllers\Controller;
use App\Model\AnggotaModel;
use App\Model\DaerahModel;
use App\Model\DatakimModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        if ($check != '') {
            AnggotaModel::create($request->all());
            return back()->with('succes', 'Data Berhasil Di Tambahkan');
        } else {
            return back()->with('error', 'Data Kim Tidak ditemukan, mohon periksa lagi kode kim anda');
        }
    }

    public function search(Request $request)
    {
        $text = $request->input('kd');

        $data = DB::table('datakim')->where('kd_kim', 'Like', "$text")->first();
        return response()->json($data);
    }
}
