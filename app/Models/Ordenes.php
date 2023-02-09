<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    use HasFactory;
    public $fillable = ['order_number', 'order_fecha', 'order_subtotal', 'order_iva', 'order_total','order_nombre','order_nit', 'order_representante', 'order_email', 'order_tel', 'order_anticipo','estado','order_alert_date','order_dir','owner_id','order_tipo','order_tipoidentificacion'];
}
