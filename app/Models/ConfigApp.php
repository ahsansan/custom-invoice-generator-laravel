<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigApp extends Model
{
    use HasFactory;

    protected $table = 'config_apps';
    protected $fillable = ['website_name', 'website_desc', 'address', 'phone', 'email', 'midtrans_server_key', 'midtrans_client_key'];
}
