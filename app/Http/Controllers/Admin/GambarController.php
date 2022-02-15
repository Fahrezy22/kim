<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\GambarModel;
use Illuminate\Http\Request;

class GambarController extends Controller
{
    public function index()
    {
        $data =  GambarModel::all();
        return view('admin.gambar', ['data' => $data]);
    }
    public function store(Request $request)
    {
        $file = $request->file('gambar');
        $file->move(public_path('/upload'), $file->getClientOriginalName());
        $name = $file->getClientOriginalName();
        $data = [
            'nama' => $request->nama,
            'nama_gambar' => $name,
        ];
        GambarModel::create($data);
        return back()->with('succes', 'Data Berhasil Di Tambahkan');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'judul_berita' => $request->judul_berita,
            'deskripsi' => $request->deskripsi,
        ];
        GambarModel::where(['id' => $id])->update($data);
        return back()->with('succes', 'Data Berhasil Di Edit');
    }

    public function delete($id)
    {
        $data =  GambarModel::find($id);
        $data->delete();
        return back()->with('succes', 'Data Berhasil Di Hapus');
    }
}
