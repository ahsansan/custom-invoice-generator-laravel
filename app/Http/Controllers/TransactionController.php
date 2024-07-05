<?php

namespace App\Http\Controllers;

use App\Helpers\TransactionHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Counter;
use App\Models\TrxCustomOrder;
use App\Models\Roles;
use Carbon\Carbon;

class TransactionController extends Controller
{

    public function allTransaction(Request $request)
    {
        $user = Auth::user();
        $role = Roles::where('id', $user->role_id)->first();

        $query = "SELECT id, invoice_number, first_name, last_name, photo, email, phone, status, price, created_by, created_at, updated_at, ROW_NUMBER() OVER (ORDER BY tco.id desc) AS 'index' FROM trx_custom_orders tco";
        
        $where = [];

        if ($role->role_code == 'SPA') {
            // No additional where clause
        } else if ($role->role_code == 'ADM' or $role->role_code == 'STF') {
            $where[] = "created_by = {$user->id}";
        } else {
            return view('transactions.all', [
                'response' => [
                    'success' => false,
                    'message' => 'Role anda tidak bisa mengakses halaman ini.'
                ]
            ]);
        }

        if ($request->has('search')) {
            $search = $request->input('search');
            $where[] = "(invoice_number LIKE '%{$search}%' OR first_name LIKE '%{$search}%' OR last_name LIKE '%{$search}%' OR email LIKE '%{$search}%')";
        }

        if (!empty($where)) {
            $query .= " WHERE " . implode(" AND ", $where);
        }

        $query .= " ORDER BY tco.id DESC";
        
        $dataTrx = DB::select($query);

        $result = [
            'success' => true,
            'data' => $dataTrx
        ];

        return view('transactions.all', ['response' => $result]);
    }

    public function addTransaction()
    {
        return view('transactions.add');
    }

    public function viewInvoice($invoice_number)
    {
        $data_invoice = TrxCustomOrder::where('invoice_number', $invoice_number)->first();
        return view('transactions.invoice', ['response' => $data_invoice]);
    }

    // FUNCTION
    public function submitTransaction(Request $request) 
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $price = $request->input('price');
        $now = Carbon::now();
        $user = Auth::user();

        $check_counter = Counter::where('counter_type', '1')
        ->where('counter_year', TransactionHelper::getYearNow($now))
        ->where('counter_month', TransactionHelper::getMonthNow($now))->first();

        // Check Existing Counter
        if(!$check_counter) {
            $data_counter = [
                'counter_type' => '1',
                'counter_code' => 'INV',
                'counter_year' => TransactionHelper::getYearNow($now),
                'counter_month' => TransactionHelper::getMonthNow($now),
                'counter_number' => 1,
            ];
            $create_counter = Counter::create($data_counter);
            $check_counter = $create_counter;
        }

        // Generate Invoice
        $invoice_number = TransactionHelper::generateCode($check_counter);
        $data_order = TrxCustomOrder::create([
            'invoice_number' => $invoice_number,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'status' => 'unpaid', // status unpaid -> expired / paid
            'price' => $price,
            'created_by' => $user->id
        ]);

        // Menaikkan counter
        $new_value_counter = $check_counter->counter_number + 1;
        $update_counter = Counter::find($check_counter->id);
        $update_counter->update([
            'counter_number' => $new_value_counter,
        ]);

        return redirect("/invoice/$invoice_number");
    }
}
