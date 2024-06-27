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

        // CONTOH RAW
        // $results = DB::select('select * from users where id = :id', ['id' => 1]);
        // DB::insert('insert into users (id, name) values (?, ?)', [1, 'Marc']);

        // BIKIN RAW QUERY SENDIRI
        // $query = "SELECT u.id, u.name, u.email, u.created_at, u.username, u.active, mr.role_code, mr.role_name FROM users u
        // INNER JOIN mst_roles mr ON mr.id = u.role_id
        // WHERE u.id = :id AND u.active = '1';";
        // $user_lists = DB::select($query, ['id' => $user->id]);

        if($role->role_code == 'SPA' or $role->role_code == 'ADM') {

            $query = "SELECT u.id, u.name, u.email, u.created_at, u.username, 
                    u.active, mr.role_code, mr.role_name, ROW_NUMBER() OVER (ORDER BY u.id desc) AS 'index'
                    FROM users u
                    INNER JOIN mst_roles mr ON mr.id = u.role_id;";
            $user_lists = DB::select($query);

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
