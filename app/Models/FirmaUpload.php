<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirmaUpload extends Model
{
    use HasFactory;
    protected $table = 'firma_uploads';
    protected $fillable = [
        'user_id',
        'name',
        'type',
        'size'
    ];
}
