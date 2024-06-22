<?php

namespace App\Http\Controllers;

use App\Helpers\TransactionHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Counter;
use App\Models\TrxCustomOrder;
use Carbon\Carbon;

class TransactionController extends Controller
{

    // PAGES
    public function allTransaction()
    {
        return view('transactions.all');
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
