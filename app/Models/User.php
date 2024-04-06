<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use  HasFactory;
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = [
        'user_role'
    ];
}