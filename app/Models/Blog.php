<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\BlogFactory;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blogs';
    public $timestamps = false;
    protected static function newFactory(): Factory
    {
        return BlogFactory::new();
    }
}
