<?php

namespace App\Http\Controllers;

use App\Models\Aseguradoras;
use App\Models\Coberturas_Seleccionadas;
use App\Models\FirmaUpload;
use App\Models\FileUpload;
use App\Models\Ordenes;
use App\Models\User;
use PDF;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;


class GeneratePDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF_a($order_number)
    {



        $orden = Ordenes::whereIn('order_number', array($order_number))->get()->toArray();

        $order_id = $orden[0]['id'];

        $datos3 = Coberturas_Seleccionadas::whereIn('order_id', array($order_id))->get()->toArray();



        if (!$datos3) {
            return back()->with('error_exist', 'la orden no tiene atributos');

        } else {

            $i = 0;
            $condicion1 = 0;
            $condicion2 = 0;
            $condicion3 = 0;

           // dd($datos3);
            foreach ($datos3 as $dato) {
   //dd($dato);
                if ($dato['tipo_de_poliza'] == "AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO") {
                    $condicion1 = $condicion1 + 1;
                } elseif ($dato['tipo_de_poliza'] == "RESPONSABILIDAD CIVIL EXTRACONTRACTUAL") {
                    $condicion2 = $condicion2 + 1;
                } elseif ($dato['tipo_de_poliza'] == "SERIEDAD DE OFERTA") {
                    $condicion3 = $condicion3 + 1;
                }

                $i++;
            }


            $Aseguradora = Aseguradoras::whereIn('id', array($datos3[0]['id_aseguradora']))->get()->toArray();

            // dd(  $Aseguradora );

            $users = User::get();
            $gestor = array(
                "came" => "Gestor 1 trabajador ",
                "cargo" => "Gestor de Contratos",
            );

            $datos3 = Coberturas_Seleccionadas::whereIn('order_id', array($order_id))->get();


            $data = [
                'title' => 'Autorizacion',
                'Orden' => $order_number,
                'date' => date('m/d/Y'),
                'users' => $users,
                'Aseguradora' => $Aseguradora,
                'datos3' => $datos3,
                'gestor' => $gestor,
                'Condicion1' => $condicion1,
                'Condicion2' => $condicion2,
                'Condicion3' => $condicion3,
                'Datos_Orden' => $orden,

            ];

//dd(   $data );

            $pdf = PDF::loadView('pdf.test', $data);

            return $pdf->download('AnexoA.pdf');
        }
    }

    public function generatePDF_b($order_number)
    {

        $orden = Ordenes::whereIn('order_number', array($order_number))->get()->toArray();

        $order_id = $orden[0]['id'];

        $datos3 = Coberturas_Seleccionadas::whereIn('order_id', array(  $order_id))->get()->toArray();


        if (!$datos3) {
            return back()->with('error_exist', 'la orden no tiene atributos');

        } else {


$datos3 = Coberturas_Seleccionadas::whereIn('order_id', array($order_id))->get();


            $Aseguradora = Aseguradoras::whereIn('id', array($datos3[0]['id_aseguradora']))->get()->toArray();



            $aprobado_por_datos = User::findOrFail($orden[0]['aprobado_id'])->toArray();
//dd($aprobado_por_datos);
            $aprobador_id = $aprobado_por_datos['id'];

//dd($aprobador_id);
            $firma = FirmaUpload::whereIn('user_id', array($aprobador_id))->get()->toArray();


if($firma){

            $gestor = array(
                "Name" => $aprobador_id = $aprobado_por_datos['name'],
                "Email" => $aprobador_id = $aprobado_por_datos['email'],
                "firma" => "file/" . $firma[0]['name'],
            );

            $i = 0;
            $condicion1 = 0;
            $condicion2 = 0;
            $condicion3 = 0;

           // dd($datos3);
            foreach ($datos3 as $dato) {
   //dd($dato);
                if ($dato['tipo_de_poliza'] == "AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO") {
                    $condicion1 = $condicion1 + 1;
                } elseif ($dato['tipo_de_poliza'] == "RESPONSABILIDAD CIVIL EXTRACONTRACTUAL") {
                    $condicion2 = $condicion2 + 1;
                } elseif ($dato['tipo_de_poliza'] == "SERIEDAD DE OFERTA") {
                    $condicion3 = $condicion3 + 1;
                }

                $i++;
            }
            $users = User::get();

            $data = [
                'title' => 'Autorizacion',
                'Orden' => $order_number,
                'date' => date('m/d/Y'),
                'users' => $users,
                'Aseguradora' => $Aseguradora,
                'datos3' => $datos3->toArray(),
                'Condicion1' => $condicion1,
                'Condicion2' => $condicion2,
                'Condicion3' => $condicion3,
                'gestor' => $gestor,
                'Datos_Orden' => $orden,
                'firma_seleccionada' => "file/" . $firma[0]['name'],
            ];






            $pdf = PDF::loadView('pdf.test1', $data);

            return $pdf->download('Autorizacion.pdf');

        }else{

            return back()->with('error_exist', 'Cargar Firma!');
        }

        }
    }
}
