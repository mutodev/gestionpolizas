<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aseguradoras;
use Illuminate\Support\Facades\DB;
use App\Models\Orden;
use App\Models\Polizas;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class AseguradorasController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
    public function crear_aseguradora()
    {

        $user =Auth::user();
        $roles= Role::all();
        $user_role =  $user->getRoleNames();
 
     if( $user_role[0] != "Admin")  {
         return back();
       }
        return view('aseguradoras.aseguradora_create');

    }

    public function update($id_aseguradora)
    {
        $user =Auth::user();
        $roles= Role::all();
        $user_role =  $user->getRoleNames();
 
     if( $user_role[0] != "Admin")  {
         return back();
       }
     // dd($id_aseguradora);
     $Aseguradora =  Aseguradoras::whereIn('id', array($id_aseguradora))->get()->toArray();

      return view('aseguradoras.aseguradora_update',compact('Aseguradora'));
    }
    public function actualizar_aseguradora_set(Request $request,$id_aseguradora)
    {
        $user =Auth::user();
        $roles= Role::all();
        $user_role =  $user->getRoleNames();

     if( $user_role[0] != "Admin")  {
         return back();
       } 

       // dd('actualizando Orden');
        $roles= Role::all()->pluck('name','id');

       $user=Auth::user();
       //$user=User::all()->pluck('name','id');
       $result= $user->getRoleNames();

       $Aseguradora  =  Aseguradoras::findOrFail($id_aseguradora);

       $input = $request->all();

       $Aseguradora->fill($input)->save();


       return back()->with('success', 'Hemos Hemos actualizado la aseguradora.');


    }
    public function set_aseguradora(Request $request)
    {
        //$request->merge(['id_user '=>'1']); en caso de que no tengas un dato
        //validar que vengan todos los datos

       // $request->merge(['name1'=>  '1' ]); dd($request);
 Aseguradoras::create($request->all());
return back()->with('success', 'Hemos Agregado una nueva aseguradora');

    }

    public function gestionar_aseguradora()
    {
        
        $user =Auth::user();
        $roles= Role::all();
        $user_role =  $user->getRoleNames();

     if( $user_role[0] != "Admin")  {
         return back();
       } 

        $Aseguradoras =  Aseguradoras::all();


        return view('aseguradoras.gestionar_aseguradoras',compact('Aseguradoras'));
    }

    public function  set_aseguradora_orden(Request $request)
    {


        return back()->with('success_aseguradora', 'Hemos Asignado la aseguradora a la orden en curso');


    }


}
