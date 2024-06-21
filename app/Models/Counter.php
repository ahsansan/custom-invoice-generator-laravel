<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    protected $table = 'mst_counters';
    protected $fillable = ['counter_type', 'counter_month', 'counter_code', 'counter_number', 'counter_year'];
}
