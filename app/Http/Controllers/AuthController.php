<?php

namespace App\Http\Controllers;

use App\Model\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            $request->session()->put('fullname', Auth::user()->fullname,);
            return redirect()->route('dashboard');
        } else {
            Session::flash('error', 'username atau Password Salah');
            return redirect()->route('login');
        }
    }

    public function register()
    {
        return view('Auth.register');
    }

    public function register_pro(Request $request)
    {
        $user = new UserModel();
        $user->fullname = ($request->fullname);
        $user->username = ($request->username);
        $user->password = Hash::make($request->password);
        $simpan = $user->save();
        return redirect()->route('login')->with('succes', 'Register Berhasil Silahkan Login Untuk Melakukan Akses Data');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
