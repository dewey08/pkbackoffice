<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Warehouse_pay extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'warehouse_pay';
    protected $primaryKey = 'warehouse_pay_id';
    protected $fillable = [
        'warehouse_pay_code',
        'warehouse_pay_no_bill',
        'warehouse_pay_year'
         
    ];

  
}
