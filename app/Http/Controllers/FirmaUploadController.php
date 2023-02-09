<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Orden;
use App\Models\Polizas;
use App\Models\User;
use App\Models\FirmaUpload;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use App\Http\Requests\StoreFileRequest;

class FirmaUploadController extends Controller
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

    public function index()
    {
        $files =FirmaUpload::all();
        $users = User::with('roles')->get();
        return view('usuarios.index', [
            'files' => $files,
            'Users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user =Auth::user();
        $roles= Role::all();
        $user_role =  $user->getRoleNames();

     if( $user_role[0] != "Admin")  {
         return back();
       } 

        $users = User::with('roles')->get();
        $roles= Role::all();
        return view('usuarios.create',compact('users','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreFileRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreFileRequest $request)
    {



$todos_los_datos = $request->all();


$user_id =  $request->input('user_id');



        $fileName = auth()->id() . '_' . time() . '.'. $request->file->extension();

        $type = $request->file->getClientMimeType();
        $size = $request->file->getSize();

        $request->file->move(public_path('file'), $fileName);

       FirmaUpload::create([
            'user_id' =>$user_id,
            'name' => $fileName,
            'type' => $type,
            'size' => $size,
        ]);

        return redirect()->route('files.index')->withSuccess(__('File added successfully.'));
    }

    public function delete(Request $request)
    {


        $id_to_delete =  $request->input('id');
       FirmaUpload::whereIn('id', array($id_to_delete))->delete();


        return redirect()->route('files.index')->withSuccess(__('File deletedsuccessfully.'));
    }

}
