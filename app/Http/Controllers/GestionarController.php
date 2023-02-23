<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Ldap\User  as User_Ldap;
use Adldap\Laravel\Facades\Adldap;
use App\Models\User;
use App\Models\Coberturas;
use App\Models\Coberturas_Seleccionadas;
use App\Models\Ordenes;
use App\Models\Comentarios;
use App\Models\Ordenes_Asignadas;
use App\Models\Aseguradoras;
use App\Models\Impuestos;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Notifications\EmailNotification;

class GestionarController extends Controller
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
    public function crear_gestion_orden($orden_number)
    {


        $orden = Ordenes::whereIn('order_number', array($orden_number))->get()->toArray();

        $order_id = $orden[0]['id'];



      if( Coberturas_Seleccionadas::whereIn('order_id', array( $order_id))->get()->first()){


        $roles= Role::all()->pluck('name','id');
        $user=Auth::user();

        $orden = Ordenes::whereIn('order_number', array($orden_number))->get();
        $datos3 =Coberturas_Seleccionadas::whereIn('order_id', array(  $order_id ) )->get()->toArray();


        $Comentarios =  Comentarios::whereIn('order_id', array( $order_id ) )->get()->sortByDesc("created_at");


        $k=0;
        foreach ( $Comentarios as &$value) {
         $id = $Comentarios[$k]['user_id'];

         $Comentarios[$k]['user_id'] = User::findOrFail($id)->name;


         $k++;
     }


     $interesados =   Ordenes_Asignadas::whereIn('order_id', array($order_id) )->get()->toArray();


     $condicion1 = null;
     $condicion2 = null;
     $condicion3 = null;


     for($i = 0; $i < count($datos3) ; $i++){


      if ( $datos3[$i]['tipo_de_poliza']=
      "AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO") {
          $condicion1 = $i++;
      }


      if ( $datos3[$i]['tipo_de_poliza']="RESPONSABILIDAD CIVIL EXTRACONTRACTUAL") {
          $condicion2 = $i++;
      }

      if ( $datos3[$i]['tipo_de_poliza']="SERIEDAD DE OFERTA") {
          $condicion3 = $i++;
      }
  }

  $datos3 =Coberturas_Seleccionadas::whereIn('order_id', array($order_id) )->get();

  Ordenes::where('order_number',  array($orden_number))
  ->update([
      'elaboracion' => "1",
   ]);


        return view('ordenes.gestionar',compact('datos3','user','condicion1','condicion2','condicion3','orden','interesados','Comentarios','orden_number'));

    }else{

      return back()->with('error_exist', 'la orden no tiene parametros');
      }


    }


    public function crear_comentario_gestion_orden(Request $request,$orden_number)
    {


        $orden = Ordenes::whereIn('order_number', array($orden_number))->get()->toArray();

        $order_id = $orden[0]['id'];

      $this->validate($request, [
        'comentario' => 'required'
     ]);

      $request->merge(['order_id'=> $order_id]);

      $aprobado = \Auth::id();
      $request->merge(['user_id'=>  $aprobado]);
      $Comentario = Comentarios::create($request->all());
      //dd(  $Comentario);
//dd( $Comentario);
return back()->with('success', 'Hemos registrado comentario de orden para gestión.');
    }

    public function crear_interesado_gestion_orden(Request $request,$orden_number)
    {


        $mailData = [
            "mensaje" =>'Usted ha sido asignado como Interesado en la Gestion #:'.$orden_number,
            "order_number" =>$orden_number,
        ];

   $orden = Ordenes::whereIn('order_number', array($orden_number))->get()->toArray();

        $order_id = $orden[0]['id'];



      $request->validate([         'email_interesado' => 'required|email'     ]);
     // $todos_los_datos = $request->all();




     $email_to_insert =  $request->input('email_interesado');



      if(    Ordenes_Asignadas::whereIn('order_id', array($order_id))->where('email_interesado', array($email_to_insert ))->get()->first() ){

        return back()->with('success_interesado', 'El Interesado ya fue Seleccionado');

    }else{

                //Filtro de correos
                $users = User_Ldap:: where([
                    ['mail', '=',   $email_to_insert],
         ])->get()->toArray();



//Si existe count es mayor que 0
 // dd( $email_to_insert);

 if(count($users)> 0){

    $user_exist = User::where('email', '=', $email_to_insert)->first();
//dd( $user_exist== null);
if($user_exist == null){

    //dd($user_exist);
    $user =   User::create([
        'name' =>  $users[0]['samaccountname'][0],
        'email' => $email_to_insert,
        'password' => bcrypt('0'),
    ]);

//if email exist
$user->assignRole('Interesado');
$request->merge(['user_id'=> $user->id]);
//notificaicion

$user->notify(new EmailNotification($mailData));

}else{

    $request->merge(['user_id'=> $user_exist->id]);

    //if email exist
    $user_exist->notify(new EmailNotification($mailData));
}


    $request->merge(['order_id'=> $order_id]);

    $orden = Ordenes_Asignadas::create($request->all());
   // dd($order_id);
    $gestionado_por= \Auth::id();

    $r=Ordenes::where('id',  array($order_id))
    ->update([
        'gestionado' => '1',
        'gestionado_id' => $gestionado_por
     ]);
    // dd(    $r);
//Funcion Notificar
     return back()->with('success_interesado', 'Hemos agregado un interesado en la  gestión de la orden.');
 }else{

    return back()->with('success_interesado', 'La Dirección de Correo No se encuentra en el Directorio Activo');
 }


    }



    }





    public function  update_valor_total(Request $request,$orden_number)
    {

        $orden = Ordenes::whereIn('order_number', array($orden_number))->get()->toArray();

        $order_id = $orden[0]['id'];

      $orden_iva =floatvalue($request->post('order_iva'));
      $orden_total = floatvalue($request->post('order_subtotal'));

      $order_new_total = $orden_iva + $orden_total  ;

      //dd(   $order_new_total  {{ number_format( $dato['order_total'], 2, ',', '.') }} );

      $Current_order = Ordenes::where('order_number',  array($orden_number))
      ->update([
          'order_iva' =>   number_format($orden_iva, 2, ',', '.'),
          'order_total' =>  number_format( $order_new_total, 2, ',', '.')
       ]);

     // Actualizar polizas
     $datos3 =Coberturas_Seleccionadas::whereIn('order_id', array($order_id) )->get()->toArray();


     calculos(  $datos3 );

//dd( $datos3 );

      return back()->with('success_interesado', 'Actualizado');
    }


    public function eliminar_interesado_gestion_orden(Request $request,$orden_number)
    {      //$todos_los_datos = $request->all();

     // dd($todos_los_datos);


     $orden = Ordenes::whereIn('order_number', array($orden_number))->get()->toArray();

     $order_id = $orden[0]['id'];
     $id_to_delete =  $request->input('id');
      Ordenes_Asignadas::whereIn('order_id', array(   $order_id ))->where('id', array( $id_to_delete ))->delete();



      return back()->with('success_interesado', 'Hemos eliminado un interesado de orden para gestión.');
    }


    public function completar_gestion_orden(Request $request,$orden_number)
    {      $todos_los_datos = $request->all();

        $orden = Ordenes::whereIn('order_number', array($orden_number))->get()->toArray();

        $order_id = $orden[0]['id'];
       // dd($order_id);
   // validar si tiene comentarios y interesados
   $datos3 =Coberturas_Seleccionadas::whereIn('order_id', array($order_id) )->get()->toArray();

   $interesados = Ordenes_Asignadas::whereIn('order_id', array($order_id))->get()->toArray();

   //dd( !$interesados);

   if( !$interesados) {

  return back()->with('error_exist', 'Agregar al menos un Interesado.');

   }else{
    $aprobado = \Auth::id();
//dd(  $aprobado );
    Ordenes::where('id',  array($order_id))
    ->update([
        'gestionado' => 1 ,
        'gestionado_id' => $aprobado
     ]);


 //  $orden = Ordenes::whereIn('order_number', array($orden_number))->get()->toArray();



 //$roles= Role::all()->pluck('name','id');
 //$datos2= Ordenes::all()->sortByDesc("created_at");

 return redirect('/Ordenes');
 //return back()->with('success_interesado', 'Completada la Gestion.');


    }
    }


    public function cerrar_orden(Request $request,$orden_number)
    {      $todos_los_datos = $request->all();



    Ordenes::where('order_number',  array($orden_number))
    ->update([
        'estado' => 0
     ]);





 //return view('home');
 return back()->with('success_interesado', 'Completado Cerrar.');



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




$order_number = $array_seleccionado[0]['order_id'];

//dd($order_number);

//$orden= Ordenes::whereIn('id', array($order_number))->get()->toArray();
$orden= Ordenes::find($order_number)->toArray();


//dd($array_seleccionado);

$valor_total= $orden['order_total'];
$Anticipo = $orden['order_anticipo'];

//dd($Anticipo);


for ($i = 0; $i <= (count($array_seleccionado)-1); $i++) {
    $poliza_to_update =  $array_seleccionado[$i]['id'];
    $base_calculo=  $array_seleccionado[$i]['origen'];
    $porcentaje = $array_seleccionado[$i]['porcentaje_amparo'];
    $valor_asegurado = $array_seleccionado[$i]['valor_asegurado'];

   // dd(  $valor_asegurado  );

    switch ($base_calculo) {
        case  "Anticipo":


                if( $porcentaje == "100" ){

                    $array_seleccionado[$i]['valor_asegurado'] =floatvalue( $Anticipo);

                }else{

                    $array_seleccionado[$i]['valor_asegurado'] =     (floatvalue('0.'.  $array_seleccionado[$i]['porcentaje_amparo'])* floatvalue($Anticipo));

                }



            break;

        case "Valor Asegurado":



                if( $porcentaje == "100" ){

                    $array_seleccionado[$i]['valor_asegurado'] =floatvalue($array_seleccionado[$i]['valor_asegurado']);

                }else{

                    $array_seleccionado[$i]['valor_asegurado'] =     (floatvalue('0.'.  $array_seleccionado[$i]['porcentaje_amparo'])*$array_seleccionado[$i]['valor_asegurado']);

                }




            break;
            default:




                if( $porcentaje == "100" ){

                    $array_seleccionado[$i]['valor_asegurado'] =floatvalue( $valor_total);

                }else{

                    $array_seleccionado[$i]['valor_asegurado'] =     (floatvalue('0.'.  $array_seleccionado[$i]['porcentaje_amparo'])* floatvalue($valor_total));

                }





            }


    //$order_number= $array_seleccionado[$i]['order_number'];


   // dd($poliza_to_update);
    Coberturas_Seleccionadas::where('id', $poliza_to_update)
       ->update([
           'valor_asegurado' =>   $array_seleccionado[$i]['valor_asegurado']
        ]);

    //Coberturas_Seleccionadas::create($array_seleccionado[$i]);
//Actualizar los nuevos datos
   // $Polizas_agregadas =Coberturas_Seleccionadas::whereIn('order_number', array($order_number) )->get();



}



}
function floatvalue($val){
    $val = str_replace(",",".",$val);
    $val = preg_replace('/\.(?=.*\.)/', '', $val);
    return floatval($val);
}
 function send()
{
    $user = User::first();

    $project = [
        'greeting' => 'Hi '.$user->name.',',
        'body' => 'This is the project assigned to you.',
        'thanks' => 'Thank you this is from codeanddeploy.com',
        'actionText' => 'View Project',
        'actionURL' => url('/'),
        'id' => 57
    ];

    Notification::send($user, new EmailNotification($project));

    dd('Notification sent!');
}