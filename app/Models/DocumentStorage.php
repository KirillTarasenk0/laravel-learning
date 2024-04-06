<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentStorage extends Model
{
    use HasFactory;
    protected $table = 'document_storage';
    public $timestamps = false;
    protected $fillable = [
        'fileName',
        'filePath',
        'fileVersion'
    ];
}
