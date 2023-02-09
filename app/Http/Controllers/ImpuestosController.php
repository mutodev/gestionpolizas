<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Impuestos;
use App\Models\User;
use App\Models\Orden;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class ImpuestosController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     *
     *******/


    public function index(){


    $Impuestos= Impuestos::all();
   // dd( $Impuestos);

return view('formularios.impuestos',compact('Impuestos'));

}



public function set_impuesto(Request $request)
{
$todos_los_datos = $request->all();

 // dd($todos_los_datos);

 // $impuesto_actualizado = Impuestos::create($request->all())->id;
 $porcentaje= $request->post('porcentaje_valor');
 $impuesto_actualizado = "IVA";
 Impuestos::whereIn('id', array(1))->update(

    array('porcentaje_valor' =>  $porcentaje)
  );


    return back()->with('alert', 'Se realizó actualización del impuesto: '.$impuesto_actualizado );

}

}
