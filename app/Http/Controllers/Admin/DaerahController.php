<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\DaerahModel;
use Illuminate\Http\Request;

class DaerahController extends Controller
{
    public function index()
    {
        $data =  DaerahModel::all();
        return view('admin.daerah', ['data' => $data]);
    }

    public function store(Request $request)
    {
        DaerahModel::create($request->all());
        return back()->with('succes', 'Data Berhasil Di Tambahkan');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'kabupaten' => $request->daerah,
        ];
        DaerahModel::where(['id' => $id])->update($data);
        return back()->with('succes', 'Data Berhasil Di Edit');
    }

    public function delete($id)
    {
        $data =  DaerahModel::find($id);
        $data->delete();
        return back()->with('succes', 'Data Berhasil Di Hapus');
    }
}
