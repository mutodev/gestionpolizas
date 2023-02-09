<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;
use Adldap\Laravel\Facades\Adldap;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;


class GestionUsuariosController extends Controller
{
    /**
     * Update the specified user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */

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

       $users = User::with('roles')->get();
       $user =Auth::user();
       $roles= Role::all();
       $user_role =  $user->getRoleNames();

    if( $user_role[0] != "Admin")  {
        return back();
      } 

//dd($user_role[0]);
        return view('usuarios.gestionar_usuarios',compact('roles','users','user_role'));
    }

    public function actualizar_role(Request $request,$id)
    {


        $this->validate($request, [
        'role_type' => 'required'
     ]);


     $role_type = $request->input('role_type');
     $user = User::find($id);
     $has_role =  $user->roles->first();

   //  dd( $has_role);
if( isset($has_role)){
     $user->removeRole($user->roles->first());
   $user->assignRole($role_type);
}else{
   // $user->removeRole($user->roles->first());
     $user->assignRole($role_type);

}



     $user->save();
        return back()->with('success', 'Hemos Actualizado el usuario con id #: '.$id."| Asignando el role: ". $role_type );
    }

}
