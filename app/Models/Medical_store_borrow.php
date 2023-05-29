<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Medical_store_borrow extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'medical_store_borrow';
    protected $primaryKey = 'medical_store_borrow_id';
    protected $fillable = [
        'year' ,
        'date_borrow' ,
        'time_borrow'      
    ];

  
}
