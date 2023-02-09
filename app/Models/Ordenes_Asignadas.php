<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenes_Asignadas extends Model
{
    use HasFactory;
    public $fillable = ['order_id', 'user_id',
    'email_interesado'];
}
