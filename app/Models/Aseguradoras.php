<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aseguradoras extends Model
{
    use HasFactory;
    public $fillable = ['nit','tipo_aseguradora','representante','ccrepresentante','direccion_entidad','name1', 'email1', 'phone1', 'company_name', 'dir1','cargo1','url1', 'name2', 'email2', 'phone2', 'dir2','url2','cargo2','estado', ];
}
