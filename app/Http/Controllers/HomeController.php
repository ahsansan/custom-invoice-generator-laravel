<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConfigApp;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function homedash()
    {
        return redirect('/site-dashboard');
    }
}