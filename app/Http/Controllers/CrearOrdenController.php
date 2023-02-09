<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ordenes;
use App\Models\Coberturas;
use App\Models\User;

use App\Models\Coberturas_Seleccionadas;
use App\Models\Aseguradoras;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;


class CrearOrdenController extends Controller

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


     public function resumen_orden(Request $request,$order_number)
     {

        $users = User::with('roles')->get();

        $orden = Ordenes::whereIn('order_number', array($order_number))->get()->toArray();
        $datos3 =Coberturas_Seleccionadas::whereIn('order_number', array($orden[0]['order_number'] ) )->get()->toArray();

        if( $orden[0]['order_estado']=="Borrador"){

            return view('welcome');

        }
     //dd(      $orden);


        $roles= Role::all()->pluck('name','id');

        $user=Auth::user();
        $creado_por = \Auth::id();
        $Aseguradora = Aseguradoras::whereIn('id', array($datos3[0]['id_aseguradora']))->get()->toArray();



            $orden = Ordenes::whereIn('order_number', array($order_number))->get();
            //

            return view('polizas.resumen_cobertura_post',compact('orden','users','datos3','Aseguradora'));

     }



    public function SetOrderData(Request $request)
{



   $orden_number= $request->post('order_number');


    if( Ordenes::whereIn('order_number', array($orden_number))->get()->first()){
        return back()->with('error_exist', '!Un Anexo A ya ha sido creado para esta orden!');
    }else{


        $user =Auth::user();
        $creado_por = \Auth::id();
        $aprobado = \Auth::id();
      //dd(  $user->id );

//$request->merge(['order_number'=> "0041050772"]);
$request->merge(['order_fecha'=> "2022/12/31"]);
$request->merge(['order_subtotal'=> 34421500.00]);
$request->merge(['order_total'=> 34421500.00]);
$request->merge(['order_iva'=> 0.00]);
$request->merge(['order_nombre'=> "OLGAMAR SOLUCIONES S.A.S."]);
$request->merge(['order_nit'=> "9012037061"]);
$request->merge(['order_representante'=> "73151046"]);
$request->merge(['order_email'=> "OLGAMARCCTV@GMAIL.COM"]);
$request->merge(['order_tel'=> "3004144417"]);
$request->merge(['order_dir'=> "BRR TERNERA DG 32 85 100"]);
$request->merge(['order_anticipo'=> 17210750.00]);

$request->merge(['order_tipo'=> "Contrato"]);
$request->merge(['creado_por'=>  $creado_por]);

$orden = Ordenes::create($request->all())->order_number;
$datos3= Coberturas::all();
$roles= Role::all()->pluck('name','id');


//aprobado por y fechas
//dd($creado_por);

Ordenes::where('order_number',  array($orden))->update([
    'creado_por' =>$aprobado
 ]);

 $orden3 = Ordenes::whereIn('order_number', array( $orden ))->get()->toArray();
 //dd($orden3 );

return view('polizas.cobertura',compact('roles','datos3','orden','user'))->with('success', 'Hemos registrado una nueva orden para gestión.');
    }



   /*



*/
//dd($orden);


}


}