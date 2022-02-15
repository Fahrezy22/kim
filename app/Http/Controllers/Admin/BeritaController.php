<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BeritaModel;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $data =  BeritaModel::all();
        return view('admin.berita', ['data' => $data]);
    }

    public function store(Request $request)
    {
        BeritaModel::create($request->all());
        return back()->with('succes', 'Data Berhasil Di Tambahkan');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'judul_berita' => $request->judul_berita,
            'deskripsi' => $request->deskripsi,
        ];
        BeritaModel::where(['id' => $id])->update($data);
        return back()->with('succes', 'Data Berhasil Di Edit');
    }

    public function delete($id)
    {
        $data =  BeritaModel::find($id);
        $data->delete();
        return back()->with('succes', 'Data Berhasil Di Hapus');
    }
}
