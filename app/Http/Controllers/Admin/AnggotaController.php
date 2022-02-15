<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AnggotaModel;
use App\Model\DatakimModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    public function index()
    {
        $data = array(
            'kim' => DatakimModel::all(),
            'anggota' => AnggotaModel::with('kd_kim_rol')->get(),
        );
        return view('admin.anggota', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $nama = $request->kd_kim;
        $kim = DB::table('datakim')->where('id', $nama)->value('nama_kim');
        $data = [
            'kd_kim' => $request->kd_kim,
            'nama_kim' => $kim,
            'ttl' => $request->ttl,
            'alamat_lengkap' => $request->alamat_lengkap,
            'nama' => $request->nama,
        ];
        AnggotaModel::create($data);
        return back()->with('succes', 'Data Berhasil Di Tambahkan');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nama' => $request->nama,
            'ttl' => $request->ttl,
            'alamat_lengkap' => $request->alamat_lengkap,
        ];
        AnggotaModel::where(['id' => $id])->update($data);
        return back()->with('succes', 'Data Berhasil Di Edit');
    }

    public function delete($id)
    {
        $data =  AnggotaModel::find($id);
        $data->delete();
        return back()->with('succes', 'Data Berhasil Di Hapus');
    }
}
