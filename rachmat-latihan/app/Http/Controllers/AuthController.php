<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //view login
    public function index() {
        //ambil info user
        $user = Auth::user();
        //jika user sudah login
        if($user){
            if($user->level === 'admin'){
                return redirect()->intended('admin');
            }else if($user->level == 'user'){
                return redirect()->intended('user');
            }
        }

        return view('login');
    }

    public function proses_login(Request $request) {
         //form validation
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );

        //buat variable untuk proses cek credential
        $credential = $request->only('email', 'password');
        //lakukan proses login attempt
        if(Auth::attempt($credential)){
            $user = Auth::user();
            if($user->level === 'admin'){
                return redirect()->intended('admin');
            }else if($user->level == 'user'){
                return redirect()->intended('user');
            }

            return redirect()->intended('/');
        }

        //jika login gagal
        return redirect('login')
            ->withInput()
            ->withErrors(
                ['login_gagal' => 'User tidak terdaftar (email atau password salah)!']
            );
    }

    public function logout(Request $request) {
        //hapus session login
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }

    //view register
    public function register() {
        return view('register');
    }

    public function proses_register(Request $request) {
        //buat form validation
        //validasi email harus unique
        $validator = Validator::make($request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]
        );

        //jika validasi gagal
        if($validator->fails()){
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }

        $request['level']       = 'user';
        $request['password']    = Hash::make($request->password);

        //simpan ke tabel user
        User::create($request->all());

        //arahkan ke halaman login
        return redirect()->route('login');
    }
}
