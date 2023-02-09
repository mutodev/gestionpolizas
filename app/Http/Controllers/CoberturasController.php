<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\Coberturas;
use App\Models\Ordenes;
use App\Models\Coberturas_Seleccionadas;
use App\Models\Aseguradoras;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\Impuestos;

class CoberturasController extends Controller
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
     */
    public function crear_cobertura()
    {

        $user =Auth::user();
        $roles= Role::all();
        $user_role =  $user->getRoleNames();
     
     if( $user_role[0] != "Admin")  {
         return back();
       }
        $roles= Role::all()->pluck('name','id');

       $user=Auth::user();
       //$user=User::all()->pluck('name','id');
       //$request->merge(['order_number'=> "0041050772"]);
       $result= $user->getRoleNames();



      return view('polizas.crear_poliza');
    }

    public function actualizar_cobertura($id_poliza)
    {
        $user =Auth::user();
        $roles= Role::all();
        $user_role =  $user->getRoleNames();
 
     if( $user_role[0] != "Admin")  {
         return back();
       }
        $roles= Role::all()->pluck('name','id');

       $user=Auth::user();
       //$user=User::all()->pluck('name','id');
       $result= $user->getRoleNames();

       $Cobertura = Coberturas::whereIn('id', array($id_poliza))->get()->toArray();

       return view('polizas.actualizar_poliza',compact('Cobertura'));


    }


    public function actualizar_cobertura_set(Request $request,$id_poliza)
    {

      // dd('actualizando Orden');

       $Cobertura  =  Coberturas::findOrFail($id_poliza);

       $input = $request->all();

       $Cobertura->fill($input)->save();


       return back()->with('success', 'Hemos Hemos actualizado la Cobertura.');


    }

    public function  store_cobertura(Request $request)
    {

       $this->validate($request, [
           'vigencia' => 'required'
        ]);

    // dd($request);   // estamos aqui
    $request->merge(['iva'=> 0]);
     Coberturas::create($request->all());

//hacer un colection



      return back()->with('success', 'Hemos registrado una nueva cobertura.');
     //   return view('polizas.crear_poliza');
}

public function  gestionar_coberturas(Request $request)

{

    $user =Auth::user();
    $roles= Role::all();
    $user_role =  $user->getRoleNames();

 if( $user_role[0] != "Admin")  {
     return back();
   }
    $Coberturas = Coberturas::all();
//dd("test");


return view('polizas.gestionar_poliza',compact('Coberturas'));

}

public function  set_gestion_coberturas(Request $request)
{


return view('polizas.gestionar_poliza');
}



public function set_cobertura_amparo(Request $request)
{



    $todos_los_datos = $request->all();

 // dd( $todos_los_datos );
    // Obteniendo solo los datos enviados en el post
    $CoberturaSeleccionada=[];
    $Cobertura_a_retornar=[];
    //$base_calculo = "Valor Total";
    $collection =  collect($request->all())->reject(function($item, $key){
           if (strpos($key,'id') !== false) {
               return false;
           } else {
               return true;
           }
       })->toArray();
       $i = 0;

       //Orgnizando los datos en un vector para orgnizar la consulta
       foreach ($collection as $key => $value) {
        $CoberturaSeleccionada[$i] = $value ;
        $i++;
       }


       // $array contiene la lita de id de coberturas a consultar para injetar en la siguente pagina

    $k = 0;
    foreach ($CoberturaSeleccionada as &$value) {
        $Cobertura_a_retornar[$k] = $value ;
        $k++;
    }


    /*

        $datos3 = Amparo_Poliza::where(function ($query){

            $query->where('id', '=',1);

        })->get()->toArray();
    */
   // dd($CoberturaSeleccionada );
    $Aseguradora = Aseguradoras::all();

    $datos3 = Coberturas::whereIn('id', $CoberturaSeleccionada)->get()->toArray();

    $orden = $request->post('order_number');




return view('polizas.edicion_parametros',compact('datos3','Aseguradora','orden'));
}



public function resumen_orden_cobertura(Request $request)
{




    $todos_los_datos = $request->all();
    //dd($todos_los_datos);
    $condicion1 = null;
    $condicion2 = null;
    $condicion3 = null;

$orden_number = $request->post('order_number');


$orden3 = Ordenes::whereIn('order_number', array( $orden_number))->first()->id;


$cs = Coberturas_Seleccionadas::whereIn('order_id', array($orden3))->get()->first();
//dd($cs);

if( isset($cs)){


    return redirect('/home');

}else{





$todos_los_datos = $request->all();
$cantidad_de_registros = (count($todos_los_datos)-4) / 7 ;
//dd($cantidad_de_registros );
// Obteniendo solo los datos enviados en el post
$CoberturaSeleccionada=[];
$Cobertura_a_retornar=[];


for ($c = 0; $c<= $cantidad_de_registros-1; $c++) {


$collection[$c] =  collect(
      $request->all())->reject(   function($item, $key ) use (&$c) {
    $condition = "id__".strval($c);

       if (strpos($key,$condition) !== false) {


           return false;
       } else {


           return true;
       }
   })->toArray();

//ciclo for para organizar las variables

   $i = 0;

   //Orgnizando los datos en un vector para orgnizar la consulta
   foreach ($collection[$c] as $key => $value) {
    $CoberturaSeleccionada[$c][substr($key,7)] = $value ;
   }
/**/

   $CoberturaSeleccionada[$c]['order_id']=$orden3;

   $CoberturaSeleccionada[$c]['id_aseguradora']=$request->post('company_name');


}

if($cantidad_de_registros < 1){

    return redirect()->route('home');
}

//dd($CoberturaSeleccionada);
calculos($CoberturaSeleccionada);


//dd($CoberturaSeleccionada);

//dd($orden3);

$Aseguradora = Aseguradoras::whereIn('id', array($request->post('company_name')))->get()->toArray();



$datos3 =Coberturas_Seleccionadas::whereIn('order_id', array($orden3) )->get()->toArray();

//dd($datos3);

//Cambiar estado a Creado
$gestionado = \Auth::id();
Ordenes::where('order_number',$request->post('order_number'))
       ->update([
           'elaboracion' => 1
        ]);

$orden = Ordenes::whereIn('order_number', array($request->post('order_number')))->get()->toArray();

//dd($orden);
for($i = 0; $i <=count($datos3)-1 ; $i++){

    if ( $datos3[$i]['tipo_de_poliza'] == "AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO") {
        $condicion1 = $i++;
    }elseif ( $datos3[$i]['tipo_de_poliza'] == "RESPONSABILIDAD CIVIL EXTRACONTRACTUA") {
        $condicion2 = $i++;
    }elseif ( $datos3[$i]['tipo_de_poliza'] == "SERIEDAD DE OFERTA") {
        $condicion3 = $i++;
    }
}




//dd($datos3);

//dd($orden );
return view('polizas.resumen_cobertura',compact('orden','datos3','condicion1','condicion2','condicion3','Aseguradora'));

}
}



}

function  calculos($array_seleccionado)
{

 //Datos de la poliza
//porcentaje_amparo
//valor_asegurado
//origen


//Datos de la Orden
//Anticipo
//Valor total

//dd($array_seleccionado);

$order_number = $array_seleccionado[0]['order_id'];

$orden= Ordenes::whereIn('id', array($order_number))->get()->toArray();

//dd($orden);


$valor_total= $orden[0]['order_total'];
$Anticipo =  $orden[0]['order_anticipo'];


$valor_total = floatvalue($valor_total);
$Anticipo= floatvalue($Anticipo);



for ($i = 0; $i <= (count($array_seleccionado)-1); $i++) {

    $base_calculo=  $array_seleccionado[$i]['origen'];
    $porcentaje = $array_seleccionado[$i]['porcentaje_amparo'];
    $valor_asegurado = $array_seleccionado[$i]['valor_asegurado'];

   // dd(  $valor_asegurado  );

    switch ($base_calculo) {
        case  "Anticipo":

            if( $porcentaje == "100" ){

                $array_seleccionado[$i]['valor_asegurado'] = floatvalue($Anticipo);


            }else{

                $array_seleccionado[$i]['valor_asegurado'] =     (floatvalue('0.'.  $array_seleccionado[$i]['porcentaje_amparo'])*$Anticipo);


            }

            break;

        case "Valor Asegurado":
            if( $porcentaje == "100" ){

                $array_seleccionado[$i]['valor_asegurado'] = floatvalue($array_seleccionado[$i]['valor_asegurado']);

            }else{

                $array_seleccionado[$i]['valor_asegurado'] =     (floatvalue('0.'.  $array_seleccionado[$i]['porcentaje_amparo'])*$array_seleccionado[$i]['valor_asegurado']);

            }



            break;
            default:

            if( $porcentaje == "100" ){


                $array_seleccionado[$i]['valor_asegurado'] =  floatvalue( $valor_total);

            }else{


                $array_seleccionado[$i]['valor_asegurado'] =  floatvalue('0.'.  $array_seleccionado[$i]['porcentaje_amparo']) *   floatvalue( $valor_total);



            }


            }


    $order_number = $array_seleccionado[$i]['order_id'];


  // dd( $array_seleccionado);
    Coberturas_Seleccionadas::create($array_seleccionado[$i]);

   // $Polizas_agregadas =Poliza_Coberturas::whereIn('order_number', array($order_number) )->get();



}



}
function floatvalue($val){
    $val = str_replace(",",".",$val);
    $val = preg_replace('/\.(?=.*\.)/', '', $val);
    return floatval($val);
}
