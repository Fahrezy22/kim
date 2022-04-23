<?php

namespace App\Http\Controllers;

use App\Model\AnggotaModel;
use App\Model\DatakimModel;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $data =  array(
            'all' => DatakimModel::with('kabupaten_rol')->paginate(6),
        );
        return view('dashboard', ['data' => $data]);
    }

    public function detail($id)
    {
        $get = DatakimModel::where('id', $id)->with('kabupaten_rol')->value('kd_kim');
        $data = array(
            'kim' => DatakimModel::where('id', $id)->with('kabupaten_rol')->get(),
            'anggota' => AnggotaModel::where('kd_kim', $get)->get(),
        );
        return view('detail', ['data' => $data]);
    }

}
