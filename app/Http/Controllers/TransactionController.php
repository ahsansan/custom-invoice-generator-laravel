<?php

namespace App\Http\Controllers;

use App\Helpers\TransactionHelper;
use Illuminate\Http\Request;
use App\Models\Counter;
use App\Models\TrxCustomOrder;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function allTransaction()
    {
        return view('transactions.all');
    }

    public function submitTransaction(Request $request) 
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $now = Carbon::now();

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

        // Generate Invoice Number
    }
}
