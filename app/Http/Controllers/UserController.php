<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function viewListUsers(Request $request)
    {
        $user = Auth::user();

        $role_code = $this->checkRoleCode($user->role_id);

        // CONTOH RAW
        // $results = DB::select('select * from users where id = :id', ['id' => 1]);
        // DB::insert('insert into users (id, name) values (?, ?)', [1, 'Marc']);

        // BIKIN RAW QUERY SENDIRI
        // $query = "SELECT u.id, u.name, u.email, u.created_at, u.username, u.active, mr.role_code, mr.role_name FROM users u
        // INNER JOIN mst_roles mr ON mr.id = u.role_id
        // WHERE u.id = :id AND u.active = '1';";
        // $user_lists = DB::select($query, ['id' => $user->id]);

        // MENAMBAHKAN WHERE BUAT PENCARIAN BY EMAIL, USERNAME, NAME

        // if($role_code == 'SPA' or $role_code == 'ADM') {

        //     $search = $request->input('search');

        //     $conditions = [];
        //     $bindings = [];

        //     if ($search) {
        //         $conditions[] = "(u.name LIKE ? OR u.email LIKE ? OR u.username LIKE ?)";
        //         $bindings[] = '%' . $search . '%';
        //         $bindings[] = '%' . $search . '%';
        //         $bindings[] = '%' . $search . '%';
        //     }

        //     $whereClause = "";
        //     if (count($conditions) > 0) {
        //         $whereClause = "WHERE " . implode(" AND ", $conditions);
        //     }

        //     $query = "SELECT u.id, u.name, u.email, u.created_at, u.username, 
        //                 u.active, mr.role_code, mr.role_name, ROW_NUMBER() OVER (ORDER BY u.id desc) AS 'index'
        //                 FROM users u
        //                 INNER JOIN mst_roles mr ON mr.id = u.role_id
        //                 $whereClause;";
            
        //     $user_lists = DB::select($query, $bindings);

        //     $success_role_message = [
        //         'success' => true,
        //         'data' => $user_lists
        //     ];

        //     return view('users.list', ['response' => $success_role_message]);
        // } else {
        //     $failed_role_message = [
        //         'success' => false,
        //         'message' => 'Role anda tidak bisa mengakses halaman ini.'
        //     ];
            
        //     return view('users.list', ['response' => $failed_role_message]);
        // }

        if ($role_code == 'SPA' or $role_code == 'ADM') {
            $search = $request->input('search');
            $currentPage = $request->input('page', 1);
            $limit = $request->input('limit', 10);
            $offset = ($currentPage - 1) * $limit;
    
            // Menggunakan Query Builder untuk memanfaatkan fitur pagination
            $query = DB::table('users as u')
                ->join('mst_roles as mr', 'mr.id', '=', 'u.role_id')
                ->select('u.id', 'u.name', 'u.email', 'u.created_at', 'u.username', 'u.active', 'mr.role_code', 'mr.role_name');
    
            if ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('u.name', 'LIKE', '%' . $search . '%')
                        ->orWhere('u.email', 'LIKE', '%' . $search . '%')
                        ->orWhere('u.username', 'LIKE', '%' . $search . '%');
                });
            }
    
            $totalItems = $query->count();
            $totalPages = ceil($totalItems / $limit);
            
            $user_lists = $query->orderBy('u.id', 'desc')
                                ->offset($offset)
                                ->limit($limit)
                                ->get();
    
            // Tambahkan index secara manual
            $user_lists->transform(function($item, $key) use ($offset) {
                $item->index = $offset + $key + 1;
                return $item;
            });
    
            $success_role_message = [
                'success' => true,
                'data' => $user_lists,
                'pagination' => [
                    'currentPage' => $currentPage,
                    'totalPages' => $totalPages,
                    'limit' => $limit
                ]
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

    public function addUser()
    {
        return view('users.add');
    }

    public function actionregister(Request $request)
    {

        // MENAMBAHKAN KONDISI BY ROLE

        User::create([
            'email' => $request->email,
            'name' => $request->fullname,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => $request->role,
            'active' => 1
        ]);

        return redirect()->route('user.list')->with('success', 'User berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return redirect()->route('user.list')->with('success', 'Data berhasil dihapus.');
    }

    public function changeStatusUser($id)
    {
        $data = User::findOrFail($id);
        $toUpdate = [
            'active' => $data->active == '1' ? '0' : '1'
        ];
        $data->update($toUpdate);

        return redirect()->route('user.list')->with('success', 'Data berhasil diupdate.');
    }

    public function editUser($username)
    {
        $data = User::where('username', $username)->first();
        $response = [
            'success' => true,
            'data' => $data
        ];
        return view('users.edit', ['response' => $response]);
    }

    public function actionEditUser(Request $request, $username)
    {
        // $data_to_update = $request->all();
        $data_to_update = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role_id' => $request->role
        ];

        if($request->password !== null) {
            $data_to_update['password'] = Hash::make($request->password);
        }

        $data = User::where('username', $username)->first();

        $data->update($data_to_update);

        return redirect()->route('user.list')->with('success', 'Data berhasil diupdate.');
    }

    public function editUserPath($username)
    {
        return redirect("/user/$username/edit");
    }

    public function checkRoleCode($id_role)
    {
        $role_code_check = Roles::where('id', $id_role)->first();
        $role_code = $role_code_check->role_code;
        return $role_code;
    }
}
