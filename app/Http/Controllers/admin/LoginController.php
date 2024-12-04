<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index() {
        return view("auth.admin.login");
    }
    
    public function auth(Request $request) {
        $validator = Validator::make($request->all(),[
            "email"=> "required|email",
            "password"=> "required"
        ]);

        if ($validator->passes()) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
            {
                if (Auth::guard('admin')->user()->role != 'admin') {
                    return redirect()->route('admin.login')->with('error','Kamu tidak di ijikan untuk mengakses halaman ini');
                }
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('admin.login')->with('error','Email atau password salah');
            }
        } else {
            return redirect()->route('admin.login')
            ->withInput()
            ->withErrors($validator);
        }
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success','Berhasil keluar');
    }
}