<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Ordenes;

class GetOrdenDataController extends Controller
{
    public function CreateOrderForm(Request $request)
    {
        return view('ordenes.createform');
    }

    public function CreateContractForm(Request $request)
    {
        return view('ordenes.createcontractform');


    }

    public function GetOrderData(Request $request)

    {
           
        $value = $request->order_number;
        $orden = Ordenes::whereIn('order_number', array( $value ))->get()->toArray();


        $this->validate($request, [
            'order_number' => 'required',
        ]);
        $url = 'http://cratos.cotecmar.com:8065/api/OrdenesCompra?numero_oc=';
        $response = Http::get($url . $value);
        $string_data = $response->getBody()->getContents();
        $datos5 = json_decode($string_data, true);

         if( $orden){

            return view('ordenes.morecreate_ampliacion', compact('datos5'));
         }


        if(count(    $datos5 ) > 0 ){
            return view('ordenes.morecreate', compact('datos5'));
        }else{
            return back()->with('error_exist', '!La orden No se encuentra en los registros!');

        }



    }
}
