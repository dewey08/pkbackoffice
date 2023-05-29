<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Building_type extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'building_type';
    protected $primaryKey = 'building_type_id';
    protected $fillable = [
        'building_type_name' 
    ];

  
}
