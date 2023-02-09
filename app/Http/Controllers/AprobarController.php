<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use App\Models\Coberturas;
use App\Models\Ordenes;
use App\Models\Ordenes_Asignadas;
use App\Models\Comentarios;
use App\Models\Aseguradoras;
use App\Models\Coberturas_Seleccionadas;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use App\Http\Requests\StoreFileRequest;
use App\Models\FileUpload;
use DateTime;
use App\Notifications\EmailNotification;

class AprobarController extends Controller
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
    public function crear_autorizacion_orden($orden_number)
    {

        $user =Auth::user();
        $roles= Role::all();
        $user_role =  $user->getRoleNames();
 
     if( $user_role[0] != "Contratos")  {
         return back();
       } 

         $condicion1 = null;
        $condicion2 = null;
        $condicion3 = null;
       $orden = Ordenes::whereIn('order_number', array($orden_number))->get()->toArray();
       $order_id = $orden[0]['id'];



       $datos3 =Coberturas_Seleccionadas::whereIn('id', array($order_id) )->get()->toArray();


      if($orden[0]['aprobado'] = 1  ){


      for($i = 0; $i < count($datos3) ; $i++){


        if ( $datos3[$i]['tipo_de_poliza']="AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO") {
            $condicion1 = $i++;
        }


        if ( $datos3[$i]['tipo_de_poliza']="RESPONSABILIDAD CIVIL EXTRACONTRACTUA") {
            $condicion2 = $i++;
        }

        if ( $datos3[$i]['tipo_de_poliza']="SERIEDAD DE OFERTA") {
            $condicion3 = $i++;
        }
    }

    $orden = Ordenes::whereIn('order_number', array($orden_number))->get();
    //dd( $datos_orden );
    $datos3 =Coberturas_Seleccionadas::whereIn('order_id', array($order_id) )->get();
      return view('ordenes.autorizar',compact('datos3','condicion1','condicion2','condicion3','orden'));
    }else{

        return back();

      }

    }

    public function set_autorizacion_orden(Request $request,$orden_number)
    {


        $orden = Ordenes::whereIn('order_number', array($orden_number))->get()->toArray();
        $order_id = $orden[0]['id'];
        $orden_Asignadas = Ordenes_Asignadas::whereIn('order_id', array($order_id))->pluck('email_interesado');
      //  dd( $orden_Asignadas);
    
        $aprobado = $orden[0]['aprobado'];
        if(  $aprobado == 1){

            return redirect()->to('/Ordenes');
        }

        $todos_los_datos = $request->all();
        //dd(     $todos_los_datos);
        $request->validate([

            'fecha_finalizacion_orden' => 'required',
            'dias_para_notificacion_orden' => 'required',
            'fecha_inicio_orden' => 'required'
        ]);

        $fecha_inicio_orden =  new DateTime( $todos_los_datos['fecha_inicio_orden']);

        $fecha_finalizacion_orden =  new DateTime( $todos_los_datos['fecha_finalizacion_orden']);

        $dias_para_notificacion_orden = $todos_los_datos['dias_para_notificacion_orden'];

        $diff =  $fecha_inicio_orden->diff( $fecha_finalizacion_orden);

      //  dd(  $diff->days);
       // dd(  $fecha_finalizacion_orden >= $fecha_inicio_orden );

        if( $fecha_inicio_orden >  $fecha_finalizacion_orden){

            return back()->with('error_exist', '!Fecha Inicio tiene que ser menor a fecha Final!')->withInput();
        }



   //  dd(  $diff->days);

        $file = $request->file('file');
         $fileName = time() . '.'. $file->extension();

         $type = $request->file->getClientMimeType();
         $size = $request->file->getSize();

         $request->file->move('file', $fileName);

        $file_data= FileUpload::create([
             'user_id' => auth()->id(),
             'name' => $fileName,
             'type' => $type,
             'size' => $size,
             'order_number' => $orden_number
         ]);

        // dd($file_data->name);


$fecha_finalizacion_poliza =  $request->input('fecha_finalizacion_orden');

$dia_lef_poliza  =  $request->input('dias_para_notificacion_orden');
$fecha_ini_poliza =  $request->input('fecha_inicio_orden');
$exp_poliza =  $request->input('lugar_exp');
$beneficiario_poliza =  $request->input('beneficiario');
$poiza_numer =  $request->input('poliza_number');

$secondDate = new DateTime(date("Y-m-d H:i:s"));
$firstDate = new DateTime($fecha_finalizacion_poliza);

$intvl = $firstDate->diff($secondDate);


if( $intvl->days < $dia_lef_poliza ){

  //  dd($intvl->days);
    Ordenes::where('order_number',  array($orden_number))->update([
        'diasleft' => 1,
     ]);

}

if( $dia_lef_poliza >  $diff->days ){

    $dia_lef_poliza =  $diff->days ;

}

$aprobado = \Auth::id();
//aprobado por y fechas
/**/
Ordenes::where('order_number',  array($orden_number))->update([
    'aprobado' => 1,
    'poliza_diasleft' => $dia_lef_poliza ,
    'poliza_ini' =>$fecha_ini_poliza,
    'poliza_end' =>$fecha_finalizacion_poliza,
    'aprobado_id' =>$aprobado,
    'poliza_number' =>$aprobado,
    'poliza_expplace' => $exp_poliza,
    'poliza_beneficiario'=>$beneficiario_poliza,
    'poliza'=>$file_data->name
 ]);

 $mailData = [
    "mensaje" =>'La Gestión #:'.$orden_number.' Ha cambiado de estado a Aprobado',
    "order_number" =>$orden_number,
];

/*
foreach ( $orden_Asignadas as $key => $value) {
    $user = User::whereIn('email', array($value))->get();
    $user->notify(new EmailNotification($mailData));
  }
*/
$orden = Ordenes::whereIn('order_number', array($orden_number))->get()->toArray();
$order_id = $orden[0]['id'];


$collection=  collect(
    $request->all())->reject(   function($item, $key ) use ($todos_los_datos){



        $key_array = explode("_", substr($key,3));



     if (strpos($key, "id_") !== false &&  array_key_exists( $key_array[0], $todos_los_datos  ) ) {


        return false;

     } else {

        return true;

     }
 })->toArray();


//dd($collection);

 $c=0;


 foreach ($collection as $key => $value) {

// si la fecha es menor q la inicial
// si los dias no coinciden


    if( isset($value )){


        $key_array = explode("_", substr($key,3));
       // dd( $key_array);

    // dd( $fecha_finalizacion_orden);
    // dd( $fecha_inicio_orden);
    //dd( $dias_para_notificacion_orden);
    $CoberturaSeleccionada[ $key_array[0]][$key_array[1]] = $value ;





     if($key_array[1 ]=="endsat"){


        $fecha_finalizacion_poliza =  new DateTime($value);

           $diff_limit_cobertura =  $fecha_finalizacion_poliza->diff( $fecha_finalizacion_orden);

          // dd($diff->days);

       //   dd( $fecha_finalizacion_poliza <  $fecha_inicio_orden);
if( $fecha_finalizacion_poliza <  $fecha_inicio_orden){

    return back()->with('error_exist', '!Error de Parametros!')->withInput();
}else{

    $CoberturaSeleccionada[ $key_array[0]]['endsat']= $value;

    Coberturas_Seleccionadas::where( 'id', array(strval($key_array[0])))->update([
        strval($key_array[1]) =>$value

     ]);
}





     }

     if($key_array[1]=="diasleft" ){

        $fecha_finalizacion_poliza =  new DateTime($CoberturaSeleccionada[$key_array[0]]['endsat']);

        //   $fecha_finalizacion_orden
        $diff =  $fecha_finalizacion_poliza->diff( $fecha_finalizacion_orden  );


  // dd($diff->days );
       if($diff->days > $value){


        $CoberturaSeleccionada[$key_array[0]]['diasleft'] = $value;

        Coberturas_Seleccionadas::where( 'id', array(strval($key_array[0])))->update([
            strval($key_array[1]) =>$value

         ]);

       }else{


    $CoberturaSeleccionada[ $key_array[0]]['diasleft'] =$diff->days ;


    Coberturas_Seleccionadas::where( 'id', array(strval($key_array[0])))->update([
        strval($key_array[1]) =>$diff->days

     ]);



       }


     }


        //comparar con los datos de la poliz








    }else{

        $key_array = explode("_", substr($key,3));

     //   dd($key_array[0]); diasleft endsat
     //Si son vacios los parametros
     if($key_array[1]=="diasleft"){
        $CoberturaSeleccionada[ $key_array[0]]['diasleft'] =$dias_para_notificacion_orden;


    
  

        Coberturas_Seleccionadas::where( 'id', array(strval($key_array[0])))->update([
            strval($key_array[1]) =>$dias_para_notificacion_orden

         ]);



     }

     if($key_array[1 ]=="endsat"){

        $CoberturaSeleccionada[ $key_array[0]]['endsat']= $todos_los_datos['fecha_finalizacion_orden'];



        Coberturas_Seleccionadas::where( 'id', array(strval($key_array[0])))->update([
            strval($key_array[1]) =>$todos_los_datos['fecha_finalizacion_orden']

         ]);



     }



    }

    $c++;

   }





if (isset( $CoberturaSeleccionada)) {

   // dd(   $CoberturaSeleccionada);
    $secondDate = new DateTime(date("Y-m-d H:i:s"));


    foreach ( $CoberturaSeleccionada as &$value) {

//dd($value);

       $trdDate = new DateTime(   $value['endsat'] );
     
        $intvl =  $secondDate->diff(  $trdDate);


if( $intvl->days <  $value['diasleft']   ){
 //   dd( $intvl->days);

    Ordenes::where('id',$order_id)
    ->update([
        'diasleft' => 1,
    ]);

}


    }
   

   
  // dd( $intvl->days);





}



return redirect()->to('/Ordenes');
}


}
