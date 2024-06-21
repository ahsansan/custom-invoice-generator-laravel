<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrxCustomOrder extends Model
{
    use HasFactory;

    protected $table = 'trx_custom_orders';
    protected $fillable = ['invoice_number', 'first_name', 'last_name', 'photo', 'email', 'phone', 'status', 'price', 'created_by'];
}
