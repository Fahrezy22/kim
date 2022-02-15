<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\DaerahModel;
use App\Model\DatakimModel;
use Illuminate\Http\Request;

class DatakimController extends Controller
{
    public function index()
    {
        $data = array(
            'daerah' => DaerahModel::all(),
            'kim' => DatakimModel::with('kabupaten_rol')->get(),
        );
        return view('admin.datakim', ['data' => $data]);
    }

    public function store(Request $request)
    {
        DatakimModel::create($request->all());
        return back()->with('succes', 'Data Berhasil Di Tambahkan');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'kd_kim' => $request->kd_kim,
            'nama_kim' => $request->nama_kim,
            'kd_daerah' => $request->kd_daerah,
            'email_kim' => $request->email_kim,
            'medsos' => $request->medsos,
            'web_resmi' => $request->web_resmi,
            'tanggal_terbentuk' => $request->tanggal_terbentuk,
            'alamat_kim' => $request->alamat_kim,
            'kecamatan' => $request->kecamatan,
            'desa' => $request->desa,
        ];
        DatakimModel::where(['id' => $id])->update($data);
        return back()->with('succes', 'Data Berhasil Di Edit');
    }

    public function delete($id)
    {
        $data =  DatakimModel::find($id);
        $data->delete();
        return back()->with('succes', 'Data Berhasil Di Hapus');
    }
}
