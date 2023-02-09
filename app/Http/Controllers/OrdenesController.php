<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Ordenes;
use App\Models\Coberturas;
use App\Models\User;
use App\Models\Ordenes_Asignadas;
use App\Models\Coberturas_Seleccionadas;
use App\Models\Aseguradoras;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class OrdenesController extends Controller
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


     public function ampliar_orden(Request $request,$orden)
     {
      dd($orden);
     }


     public function resumen_orden(Request $request,$order_number)
     {


   
        $users = User::with('roles')->get();

        $orden = Ordenes::whereIn('order_number', array($order_number))->get()->toArray();
   $order_id = $orden[0]['id'];



        $datos3 =Coberturas_Seleccionadas::whereIn('order_id', array(     $order_id  ) )->get()->toArray();

       /* if( $orden[0]['estado'] == 0){

            return view('welcome');

        }

*/

        $roles= Role::all()->pluck('name','id');


        $Aseguradora = Aseguradoras::whereIn('id', array($datos3[0]['id_aseguradora']))->get()->toArray();



            $orden = Ordenes::whereIn('order_number', array($order_number))->get();
            //

            return view('polizas.resumen_cobertura_post',compact('orden','users','datos3','Aseguradora'));

     }



    public function SetOrderData(Request $request)
{

  $todos_los_datos = $request->all();

  $order_tipo =  $todos_los_datos['order_tipo'];
  $order_subtotal = floatvalue($todos_los_datos['order_subtotal']);
  $order_iva = floatvalue( $todos_los_datos['order_iva']);
  $todos_los_datos['order_total'] = $order_subtotal + $order_iva ;

  if( $order_tipo == 'contrato'){
   
    $request->merge(['order_total'=> number_format( $order_subtotal + $order_iva , 2, '.', ',' )]);
    $order_iva = number_format($order_iva , 2, '.', ',');
    $order_subtotal = number_format($order_subtotal , 2, '.', ',');
  
    $request->merge(['order_iva'=>  $order_iva]);
    $request->merge(['order_subtotal'=>  $order_subtotal]);
    $todos_los_datos['order_iva'] = $order_iva;
    $todos_los_datos['order_subtotal'] = $order_subtotal;
  }


//dd( $request);

 $this->validate($request, [
           'order_number' => 'regex:/^[a-zA-Z0-9_-]*$/',
           'order_fecha' => 'required',
           'order_subtotal' => 'required',
           'order_iva' => 'required',
           'order_total' => 'required',
           'order_nombre' => 'required',
           'order_nit' => 'required',
           'order_representante' => 'required',
           'order_email' => 'required',
           'order_tel' => 'required',
           'order_anticipo' => 'required',
           'order_dir' => 'required'

        ]
        , [
            'order_number.regex' => 'Solo se aceptan números y letras para el nombre del contrato.'
          ]
    
    
    
    
    );




   $order_number =  $todos_los_datos['order_number'];


    if( Ordenes::whereIn('order_number', array($order_number))->get()->first()){
      //dd(  $todos_los_datos);
        return back()->with('error_exist', '!Un Anexo A ya ha sido creado para esta orden!');
    }else{


       // dd(0);

        $user =Auth::user();
        $creado_por = \Auth::id();
        $aprobado = \Auth::id();



$request->merge(['owner_id'=>  $creado_por]);
 //$request->merge(['order_tipo'=> "orden"]);
$request->merge(['gestionado'=> 0]);

$orden = Ordenes::create($request->all())->order_number;

$datos3= Coberturas::all();
$roles= Role::all()->pluck('name','id');

//dd($datos3);

//aprobado por y fechas


Ordenes::where('order_number',  array($order_number))->update([
    'owner_id' =>$aprobado
 ]);



 $orden3 = Ordenes::whereIn('order_number', array( $orden ))->get()->toArray();
// dd($orden3 );

return view('polizas.cobertura',compact('roles','datos3','orden','user','order_number'))->with('success', 'Hemos registrado una nueva orden para gestión.');
    }



   /*



*/
//dd($orden);


}
}
function floatvalue($val){
    $val = str_replace(",",".",$val);
    $val = preg_replace('/\.(?=.*\.)/', '', $val);
    return floatval($val);
}