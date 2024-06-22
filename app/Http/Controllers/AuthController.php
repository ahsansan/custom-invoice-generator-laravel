<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\ConfigApp;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            $configData = ConfigApp::where('id', 1)->first();

            return view('login', ['configData' => $configData]);
        }
    }

    public function register()
    {
        return view('register');
    }

    public function actionLogin(Request $request)
    {
        $login = $request->input('login'); // bisa email atau username
        $password = $request->input('password');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $data = [
            $fieldType => $login,
            'password' => $password,
        ];

        if (Auth::attempt($data)) {
            // Autentikasi berhasil
            $user = Auth::user();

            // Melakukan query tambahan untuk mendapatkan informasi role
            $role = DB::table('mst_roles')->where('id', $user->role_id)->first();

            // Menyimpan role ke sesi
            Session::put('user_role', $role);

            return redirect('/');
        } else {
            // Autentikasi gagal
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/login');
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function actionregister(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'name' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            // 'role' => $request->role,
            'active' => 1
        ]);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('register');
    }

}