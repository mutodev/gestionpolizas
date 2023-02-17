<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Aseguradoras;
use App\Models\Comentarios;
use App\Models\Ordenes;
use App\Models\Ordenes_Asignadas;
use App\Models\Coberturas_Seleccionadas;
use App\Models\User;
use Auth;
use DateTime;
use Artisan;

class HomeController extends Controller
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
    public function index()
    {
        $user = Auth::user();
        $roles = auth()->user()->roles->map->name;
        if (count($roles) == 0) {
            $user->assignRole('Invitado');
            return redirect('/Ordenes');

        } else {

            $roles = $roles[0];

        }


        if ($roles == "Invitado") {

        return redirect('/Ordenes');

        }

        $ordenes = [];
        $collection_Cerradas = 0;
        $collection_Cerradas_contratos = 0;
        $collection_Cerradas_Adquisiciones = 0;
        $collection_Cerradas_Interesado = 0;

        $collection_Aprobadas = 0;
        $collection_Gestionadas = 0;
        $collection_creadas = 0;
        $collection_Borrador = 0;
        $collection_Pendientes_Completar = 0;

        $collection_Pendientes_Aprobar= 0;

        $collection_tipoOrden = 0;
        $collection_tipoOrden_contratos = 0;
        $collection_tipoOrden_Adquisiciones = 0;
        $collection_tipoOrden_Interesado = 0;

        $collection_TipoContrato = 0;
        $collection_TipoContrato_contratos = 0;
        $collection_TipoContrato_Adquisiciones = 0;
        $collection_TipoContrato_Interesado = 0;

        $user_id = \Auth::id();

        $datos1 = Ordenes_Asignadas::whereIn('user_id', array($user_id))->get()->pluck('order_id')->toArray();


        $collection_Comentadas = Comentarios::whereIn('user_id', array($user_id))->get()->toArray();

        $collection_no_Comentadas = count(  $datos1 ) - count($collection_Comentadas);
        //$datos1= Ordenes_Asignadas::all()->sortByDesc("created_at");

        $datos2 = Aseguradoras::all()->sortByDesc("created_at");




        if (count($datos1) > 0) {

            $ordenes = Ordenes::whereIn('id',  $datos1 )->get()->toQuery()->orderBy('created_at', 'DESC')->paginate(100);
            $datos3=Ordenes::whereIn('id',  $datos1 )->get()->toArray();
        }else{

            $datos3 = Ordenes::all();

            if( $datos3->first()){

            
            $ordenes = Ordenes::get()->toQuery()->orderBy('created_at', 'DESC')->paginate(100);}
            

        }





        if ($roles == "Adquisiciones") {

            $datos3=Ordenes::whereIn('owner_id', array( $user_id ))->get()->toArray();



             $coc= 0;//Contador de Ordens Creadas
             $ordenes_creadas = [];
 //dd($datos3);
            foreach ($datos3 as &$value) {

                if ($value['owner_id'] ==   $user_id && $value['elaboracion'] == 0 ) {
                 //Obtener el id de las ordnes creadas
                  $ordenes_creadas[$coc] = $value['id'];
                }

         $coc = $coc+1;
            }

          //  dd($ordenes_creadas);

            $ordenes = Ordenes::whereIn('id',  $ordenes_creadas )->orderBy('created_at', 'DESC')->paginate(100);
           
        }


        if ($roles == "Contratos") {


            $datos3=Ordenes::whereIn('elaboracion', array( 1))->get()->toArray();


            $coc= 0;//Contador de Ordens Creadas
            $ordenes_creadas = [];

           foreach ($datos3 as &$value) {

               if ($value['estado'] == 1 && $value['elaboracion'] == 1 && $value['gestionado'] == 0) {
                //Obtener el id de las ordnes creadas
                 $ordenes_creadas[$coc] = $value['id'];
               }

        $coc = $coc+1;
           }

        // dd($ordenes_creadas);

           $ordenes = Ordenes::whereIn('id',  $ordenes_creadas )->orderBy('created_at', 'DESC')->paginate(100);;

       }


       if ($roles == "Admin") {


        $datos3=Ordenes::all()->sortByDesc("created_at")->toArray();
          $ordenes = null;
    }
        // dd(  $datos_seleccionados  );

        // dd($ordenes);
        foreach ($datos3 as &$value) {


            if ($value['estado'] == 1 && $value['aprobado'] == 0 && $value['gestionado_id'] == $user_id) {
                $collection_Pendientes_Aprobar = $collection_Pendientes_Aprobar + 1;

            }





        }

        foreach ($datos3 as &$value) {

            if ($roles == "Contratos") {

                if ($value['estado'] == 0) {
                    $collection_Cerradas = $collection_Cerradas + 1;

                }
            }

            if ($roles == "Adquisiciones") {

                if ($value['estado'] == 0 && $value['owner_id'] == $user_id) {
                    $collection_Cerradas = $collection_Cerradas + 1;

                }
            }

            if ($roles == "Interesado") {
//listar las asignadas

                if ($value['estado'] == 0) {
                    $collection_Cerradas = $collection_Cerradas + 1;

                }
            }

            if ($roles == "Invitado") {

                $collection_Cerradas = 0;

            }

            if ($roles == "Admin") {

                if ($value['estado'] == 0) {
                    $collection_Cerradas = $collection_Cerradas + 1;

                }

            }


        }

        foreach ($datos3 as &$value) {

//Relacionadas

            if ($roles == "Contratos") {

                if ($value['aprobado'] == 1) {
                    $collection_Aprobadas = $collection_Aprobadas + 1;

                }
            }

            if ($roles == "Adquisiciones") {

                if ($value['aprobado'] == 1 && $value['owner_id'] == $user_id) {
                    $collection_Aprobadas = $collection_Aprobadas + 1;

                }
            }

            if ($roles == "Invitado") {

                $collection_Aprobadas = 0;

            }
            if ($roles == "Interesado") {

                if ($value['aprobado'] == 1) {
                    $collection_Aprobadas = $collection_Aprobadas + 1;

                }

            }
            if ($roles == "Admin") {

                if ($value['aprobado'] == 1) {
                    $collection_Aprobadas = $collection_Aprobadas + 1;

                }

            }

        }

        foreach ($datos3 as &$value) {

            if ($roles == "Adquisiciones") {

                if ($value['estado'] == 1 && $value['elaboracion'] == 0 && $value['owner_id'] == $user_id) {
                    $collection_Pendientes_Completar = $collection_Pendientes_Completar + 1;

                }

            }

            if ($roles == "Contratos") {

                if ($value['estado'] == 1 && $value['elaboracion'] == 0) {
                    $collection_Pendientes_Completar = $collection_Pendientes_Completar + 1;

                }

            }

            if ($roles == "Invitados") {

                $collection_Pendientes_Completar = 00;

            }

            if ($roles == "Interesados") {

                if ($value['estado'] == 1 && $value['elaboracion'] == 0) {
                    $collection_Pendientes_Completar = $collection_Pendientes_Completar + 1;

                }

            }
            if ($roles == "Admin") {

                if ($value['estado'] == 1 && $value['elaboracion'] == 0) {
                    $collection_Pendientes_Completar = $collection_Pendientes_Completar + 1;

                }

            }
        }

        foreach ($datos3 as &$value) {

            if ($roles == "Contratos") {

                if ($value['estado'] == 1 && $value['elaboracion'] == 1 && $value['gestionado'] == 1 && $value['aprobado'] == 0) {
                    $collection_Gestionadas = $collection_Gestionadas + 1;

                }

            }

            if ($roles == "Adquisiciones") {

                if ($value['estado'] == 1 && $value['elaboracion'] == 1 && $value['aprobado'] == 0 && $value['gestionado'] == 1) {
                    $collection_Gestionadas = $collection_Gestionadas + 1;

                }

            }

            if ($roles == "Interesado") {




                if ($value['estado'] == 1 && $value['elaboracion'] == 1 && $value['aprobado'] == 0 && $value['gestionado'] == 1) {
                    $collection_Gestionadas = $collection_Gestionadas + 1;

                }



            }
            if ($roles == "Admin") {




                if ($value['estado'] == 1 && $value['elaboracion'] == 1 && $value['aprobado'] == 0 && $value['gestionado'] == 1) {
                    $collection_Gestionadas = $collection_Gestionadas + 1;

                }



            }
            if ($roles == "Invitados") {

                $collection_Gestionadas = 0;

            }

        }

        foreach ($datos3 as &$value) {

            if ($roles == "Contratos") {
                if ($value['estado'] == 1 && $value['elaboracion'] == 0) {
                    $collection_Borrador = $collection_Borrador + 1;

                }
            }
            if ($roles == "Adqusiciones") {
                if ($value['estado'] == 1 && $value['elaboracion'] == 0) {
                    $collection_Borrador = $collection_Borrador + 1;

                }
            }

            if ($roles == "Invitados") {

                $collection_Borrador = 0;

            }

            if ($roles == "Interesados") {

                if ($value['estado'] == 1 && $value['elaboracion'] == 0) {
                    $collection_Borrador = $collection_Borrador + 1;

                }

            }
            if ($roles == "Admin") {

                if ($value['estado'] == 1 && $value['elaboracion'] == 0) {
                    $collection_Borrador = $collection_Borrador + 1;

                }

            }

        }

        foreach ($datos3 as &$value) {

            if ($roles == "Contratos") {

                if ($value['order_tipo'] == "orden") {
                    $collection_tipoOrden = $collection_tipoOrden + 1;

                }

            }

            if ($roles == "Invitados") {

                if ($value['order_tipo'] == "orden") {
                    $collection_tipoOrden = $collection_tipoOrden + 1;

                }

            }

            if ($roles == "Adquisiciones") {

                if ($value['order_tipo'] == "orden" && $value['owner_id'] == $user_id) {

                    $collection_tipoOrden = $collection_tipoOrden + 1;

                }

            }

            if ($roles == "Interesado") {


                if ($value['order_tipo'] == "orden") {
                    $collection_tipoOrden = $collection_tipoOrden + 1;

                }

            }

            if ($roles == "Admin") {

                $collection_tipoOrden = $collection_tipoOrden + 1;

            }

        }

        foreach ($datos3 as &$value) {

            if ($value['order_tipo'] == "contrato") {
                $collection_TipoContrato = $collection_TipoContrato + 1;

            }

        }

        foreach ($datos3 as &$value) {


            if ($roles == "Interesado") {


                if ($value['gestionado'] == 0 && $value['elaboracion'] == 0 ) {
                    $collection_creadas =  $collection_creadas  + 1;

                }

            }


            if ($roles == "Adquisiciones") {


                if ($value['gestionado'] == 0 && $value['elaboracion'] == 1 ) {
                    $collection_creadas =  $collection_creadas  + 1;

                }

            }


            if ($roles == "Contratos") {


                if ($value['gestionado'] == 0 && $value['elaboracion'] == 1 && $value['aprobado'] == 0 ) {
                    $collection_creadas =  $collection_creadas  + 1;

                }

            }
            if ($roles == "Admin") {


                if ($value['gestionado'] == 0 && $value['elaboracion'] == 1 && $value['aprobado'] == 0 ) {
                    $collection_creadas =  $collection_creadas  + 1;

                }

            }

        }


  
        $data = [
            'Aseguradoras' => $datos2,
            'Polizas_Tramitadas' => count($datos3),
            'Aprobadas' => $collection_Aprobadas,
            'Gestionadas' => $collection_Gestionadas,
            'Cerradas' => $collection_Cerradas,
            'Comentadas' => count($collection_Comentadas),
            'No_Comentadas' => $collection_no_Comentadas,
            'Asignadas' => count($datos1),
            'Borrador' => $collection_Borrador,
            'Pendientes_Aprobar' => $collection_Pendientes_Aprobar,
            'Pendientes_Completar' => $collection_Pendientes_Completar,
            'TipoOrden' => $collection_tipoOrden,
            'TipoContrato' => $collection_TipoContrato,
            'Interesado' => $ordenes,
            'roles' => $roles,
            'Creadas' => $collection_creadas,
        ];
        //  dd($data);
        return view('home', compact('data'));
    }

    function list(Request $request) {
   //dd(0);
        $order= 'DESC';
        if ($up = request()->query('dwn_val')) {

            $order= 'DESC';
        }
        if ($up = request()->query('up_val')) {

            $order= 'ASC';
        }
        $user_id = \Auth::id();
        $roles = auth()->user()->roles->map->name;

        //dd($roles[0]);
        if ($roles[0] == "Contratos") {
            if ($search = request()->query('search')) {
                $datos2 = Ordenes::all();
                if($datos2->first()){
                    $datos2 = Ordenes::where(
                        function($query)use ($search) {
                          return $query
                                 ->where('order_nombre', 'LIKE',"%{$search}%")
                                 ->orWhere('order_number', 'LIKE',"%{$search}%")
                                 ->orWhere('order_email', 'LIKE',"%{$search}%");
                         })->paginate(100);
    
            // dd($datos2);
                }else{
                    $datos2 = null;

                }
            
               
               // $datos2 = Ordenes::all()->sortByDesc("created_at")->toQuery()->orderBy('created_at','DESC')->paginate(1);
               // $datos2 = Ordenes::whereIn('owner_id', array($user_id))->get()->toQuery()->orderBy('created_at','DESC')->paginate(100);
               }else{

                $datos2 = Ordenes::all();
                if($datos2->first()){
            $datos2 = Ordenes::get()->toQuery()->orderBy('created_at', $order)->paginate(10);
            // dd($datos2);
                }else{
                    $datos2 = null;

                }

               }
        }

        if ($roles[0] == "Invitado") {
            //dd(0);
            $datos2 = null;
        }

        if ($roles[0] == "Admin") {
//dd(0);
            $datos2 = Ordenes::all();
            if($datos2->first()){
                $datos2 = Ordenes::get()->sortByDesc("created_at")->toQuery()->orderBy('created_at', $order)->paginate(10);
            }else{
                $datos2 = null;
            }
           
            // dd($datos2);
        }

        if ($roles[0] == "Adquisiciones") {
          
          
            if ($search = request()->query('search')) {

            
                $datos2 = Ordenes::whereIn('owner_id', array($user_id))->where(
                    function($query)use ($search) {
                      return $query
                             ->where('order_nombre', 'LIKE',"%{$search}%")
                             ->orWhere('order_number', 'LIKE',"%{$search}%")
                             ->orWhere('order_email', 'LIKE',"%{$search}%");
                     })
                     ->get()->toQuery()->orderBy('created_at', $order)->paginate(100);

               // $datos2 = Ordenes::all()->sortByDesc("created_at")->toQuery()->orderBy('created_at','DESC')->paginate(1);
               // $datos2 = Ordenes::whereIn('owner_id', array($user_id))->get()->toQuery()->orderBy('created_at','DESC')->paginate(100);
               }else{


           $datos2 = Ordenes::all();
                if($datos2->first()){
            $datos2 = Ordenes::get()->toQuery()->orderBy('created_at', $order)->paginate(10);
            // dd($datos2);
                }else{
                    $datos2 = null;

                }


                
               }

          

           

        }

        if ($roles[0] == "Interesado") {

            $datos1 = Ordenes_Asignadas::whereIn('user_id', array($user_id))->get()->pluck('order_id')->toArray();

            if (count($datos1) > 0) {


                
            if ($search = request()->query('search')) {

            
                $datos2 = Ordenes::whereIn('id', $datos1)->where(
                    function($query)use ($search) {
                      return $query
                             ->where('order_nombre', 'LIKE',"%{$search}%")
                             ->orWhere('order_number', 'LIKE',"%{$search}%")
                             ->orWhere('order_email', 'LIKE',"%{$search}%");
                     })
                     ->get()->toQuery()->orderBy('created_at', $order)->paginate(100);

               // $datos2 = Ordenes::all()->sortByDesc("created_at")->toQuery()->orderBy('created_at','DESC')->paginate(1);
               // $datos2 = Ordenes::whereIn('owner_id', array($user_id))->get()->toQuery()->orderBy('created_at','DESC')->paginate(100);
               }else{

                $datos2 = Ordenes::whereIn('id', $datos1)->paginate(100);
               }


            } else {

                $datos2 = null;

            }

        }

        //$datos2= Ordenes::all()->sortByDesc("created_at");
        $user = Auth::user();
        //$user=User::all()->pluck('name','id');
        $result = $user->getRoleNames();


        if (count($roles) == 0) {

            $user->assignRole('Interesado');

        } else {

            $roles = $roles[0];

        }

        //  dd(  $roles);
        // dd( $result);
        //dd(  $datos2);

//Consulatar las polizas seleccionadas para validar las fechas de las polizas




        if (isset($datos2)) {
         
            $t = 0;
            foreach ($datos2 as &$value) {
           
             
                $secondDate = new DateTime(date("Y-m-d H:i:s"));
                $firstDate = new DateTime($value['poliza_end']);

                $intvl = $firstDate->diff($secondDate);

                //$diasleft = strtotime($value['poliza_end']) - strtotime($hoy);
                //dd( $value['poliza_diasleft']);
                $datos5 = Coberturas_Seleccionadas::whereIn('order_id',array($value['id']))->get()->toArray();


            //  dd(  $datos5[0]['diasleft'] );
             //  dd(  $datos5[0]['endsat'] );




               if (isset( $datos5[0]['endsat'])) {

                $trdDate = new DateTime( $datos5[0]['endsat'] );

               $intvl = $firstDate->diff(  $trdDate);
              // dd( $intvl->days);

            if(   $datos5[0]['diasleft'] < $intvl->days ){

                Ordenes::where('id', $value['id'])
                ->update([
                    'diasleft' => 1,
                ]);

            }



            }


                if (isset($value['poliza_diasleft'])) {
                  //  dd($value['poliza_diasleft']);
                    $intvl = $firstDate->diff($secondDate);
                    //dd( $intvl->days);
                    if(   $value['poliza_diasleft'] >= $intvl->days ){

                     // dd($datos2);
                    Ordenes::where('id', $value['id'])
                        ->update([
                            'diasleft' => 1,
                        ]);
                    }

                }



                $t++;
            }

        }
       
        return view('home_list', compact('roles', 'datos2'));

    }

}