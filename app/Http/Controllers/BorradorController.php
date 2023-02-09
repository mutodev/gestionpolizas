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

class BorradorController extends Controller
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

    public function SetOrderData_borrador(Request $request,$order_number)
    {
       // dd($order_number);
       $datos3= Coberturas::all();
       $orden = Ordenes::whereIn('order_number', array($order_number))->get();

       $order_id = $orden[0]['id'];

       $roles= Role::all()->pluck('name','id');
       $user =Auth::user();
        return view('polizas.cobertura',compact('roles','datos3','orden','user','order_number'));
    }


}
