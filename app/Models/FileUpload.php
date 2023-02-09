<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileUpload extends Model
{
    use HasFactory;
    protected $table = 'file_uploads';

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'size',
        'order_id'
    ];
}
