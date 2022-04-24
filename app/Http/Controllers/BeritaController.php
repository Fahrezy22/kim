<?php

namespace App\Http\Controllers;

use App\Model\BeritaModel;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $data = BeritaModel::paginate(6);
        return view('berita')->with('data', $data);
    }
}
