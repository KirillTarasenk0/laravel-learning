<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppRequestLogger extends Model
{
    use HasFactory;
    protected $table = 'request_logger';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'httpMethod',
        'url',
        'ip',
        'timestamp'
    ];
}
