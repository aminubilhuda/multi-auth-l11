<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index() {
        return view("auth.guru.login");
    }

    public function auth(Request $request) {
        $validator = Validator::make($request->all(),[
            "email"=> "required|email",
            "password"=> "required"
        ]);

        if ($validator->passes()) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            {
                return redirect()->route('account.dashboard');
            } else {
                return redirect()->route('account.login')->with('error','Email atau password salah');
            }
        } else {
            return redirect()->route('account.login')
            ->withInput()
            ->withErrors($validator);
        }
    }

    public function register() {

        return view('auth.guru.register');
    }

    public function prosesRegister(Request $request) {
        $validator = Validator::make($request->all(),[
            "email"=> "required|email|unique:users",
            "password"=> "required|confirmed"
        ]);

        // Cek apakah validasi berhasil
        if ($validator->passes()) {
            // Buat instance user baru
            $user = new User();
            // Set data user dari request
            $user->nama = $request->nama;
            $user->email = $request->email;
            // Hash password sebelum disimpan
            $user->password = Hash::make($request->password);
            // Set role default sebagai guru
            $user->role = 'guru';
            // Simpan data user ke database
            $user->save();
            // Redirect ke halaman login dengan pesan sukses
            return redirect()->route('account.login')->with('success', 'Pendaftaran anda berhasil');
        } else {
            // Jika validasi gagal, kembali ke halaman register dengan error
            return redirect()->route('account.register')
            ->withInput()
            ->withErrors($validator);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('account.login')->with('success','Berhasil keluar dari aplikasi');
    }
}