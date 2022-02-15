<?php

namespace App\Http\Controllers;

use App\Model\GambarModel;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    public function index()
    {
        $data = GambarModel::all();
        return view('dokumentasi')->with('data', $data);
    }
}
