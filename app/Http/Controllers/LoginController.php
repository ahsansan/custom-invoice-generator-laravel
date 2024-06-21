<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\ConfigApp;

class LoginController extends Controller
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
}