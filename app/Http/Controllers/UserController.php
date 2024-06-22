<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function viewListUsers()
    {
        $user = Auth::user();

        $role = DB::table('mst_roles')->where('id', $user->role_id)->first();

        if($role->role_code == 'SPA' or $role->role_code == 'ADM') {
            $user_lists = User::all();
            $success_role_message = [
                'success' => true,
                'data' => $user_lists
            ];
            return view('users.list', ['response' => $success_role_message]);
        } else {
            $failed_role_message = [
                'success' => false,
                'message' => 'Role anda tidak bisa mengakses halaman ini.'
            ];
            
            return view('users.list', ['response' => $failed_role_message]);
        }

    }
}
