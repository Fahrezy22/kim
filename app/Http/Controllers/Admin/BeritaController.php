<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BeritaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    public function index()
    {
        $data =  BeritaModel::all();
        return view('admin.berita', ['data' => $data]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_berita' => 'required',
            'deskripsi' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        if ($files = $request->file('img')) {
            $destinationPath = public_path('image/'); // upload path
            $profileImage = date('YmdHis') .$files->getClientOriginalName(). "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            }
        else{
            return back()->with('error', 'Gambar tidak valid !');
        }
        $data = [
            'judul_berita' => $request->judul_berita,
            'deskripsi' => $request->deskripsi,
            'img' => $profileImage,
        ];
        BeritaModel::insert($data);
        return back()->with('succes', 'Data Berhasil Di Tambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_berita' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($request->img != '') {
            $doc = BeritaModel::where('id',$id)->first();
            $imagePath = public_path('image/'.$doc['img']);
            if(File::exists($imagePath)){
                unlink($imagePath);
            }
            if ($files = $request->file('img')) {
                $destinationPath = public_path('image/'); // upload path
                $profileImage = date('YmdHis') .$files->getClientOriginalName(). "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
            }
            else {
                return back()->with('error', 'Gambar tidak valid !');
            }
            $data = [
                'judul_berita' => $request->judul_berita,
                'deskripsi' => $request->deskripsi,
                'img' => $profileImage,
            ];
            BeritaModel::where(['id' => $id])->update($data);
            return back()->with('succes', 'Data Berhasil Di Edit');
        }
    }

    public function delete($id)
    {
        $data =  BeritaModel::find($id);
        $data->delete();
        return back()->with('succes', 'Data Berhasil Di Hapus');
    }
}
