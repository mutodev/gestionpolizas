<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GestionUsuariosController;
use App\Http\Controllers\FirmaUploadController;
use App\Http\Controllers\ImpuestosController;
use App\Http\Controllers\AseguradorasController;
use App\Http\Controllers\CoberturasController;
use App\Http\Controllers\GetOrdenDataController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\GeneratePDFController;
use App\Http\Controllers\CrearOrdenController;
use App\Http\Controllers\AprobarController;
use App\Http\Controllers\GestionarController;
use App\Http\Controllers\BorradorController;
use App\Http\Controllers\MailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::fallback(function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {


 

    Route::get('send-mail', [MailController::class, 'index']);
 

    Route::get('/Ordenes', [App\Http\Controllers\HomeController::class, 'List'])->name('Ordenes');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



    Route::get('/send', '\App\Http\Controllers\HomeController@send')->name('home.send');

    Route::get('/gestionar_usuarios', [App\Http\Controllers\GestionUsuariosController::class, 'index'])->name('gestionar_usuarios');


    Route::post('/actualizar_role/{id?}', [GestionUsuariosController::class, 'actualizar_role'])->name('actualizar_role');


    Route::get('/files', [FirmaUploadController::class,'index'])->name('files.index');

    Route::get('/files/add', [FirmaUploadController::class,'create'])->name('files.create');

    Route::post('/files/add', [FirmaUploadController::class,'store'])->name('files.store');

    Route::post('/files/delete', [FirmaUploadController::class,'delete'])->name('files.delete');


    Route::get('/actualizar_impuestos', [ImpuestosController::class, 'index'])->name('actualizar_impuestos');

    Route::post('/actualizar_impuestos', [ImpuestosController::class, 'set_impuesto'])->name('update_actualizar_impuestos');



    Route::get('/crear_aseguradora', [AseguradorasController::class, 'crear_aseguradora'])->name('crear_aseguradora');

    Route::get('/update_aseguradora/{id_aseguradora}', [AseguradorasController::class, 'update'])->name('update');

    Route::post('/actualizar_aseguradora_set/{id_aseguradora}', [AseguradorasController::class, 'actualizar_aseguradora_set'])->name('actualizar_aseguradora_set');

    Route::post(
        '/crear_aseguradora',
        [AseguradorasController::class,'set_aseguradora']
    )->name('set_aseguradora');

    Route::get('/gestionar_aseguradora', [AseguradorasController::class, 'gestionar_aseguradora'])->name('gestionar_aseguradora');

    Route::get('/crear_cobertura', [CoberturasController::class, 'crear_cobertura'])->name('crear_cobertura');

    Route::get('/actualizar_cobertura/{id_poliza}', [CoberturasController::class, 'actualizar_cobertura'])->name('actualizar_cobertura');

    Route::post('/actualizar_cobertura_set/{id_poliza}', [CoberturasController::class, 'actualizar_cobertura_set'])->name('actualizar_cobertura_set');

    Route::post('/crear_cobertura', [CoberturasController::class, 'store_cobertura'])->name('store_cobertura');

    Route::get('/gestionar_coberturas', [CoberturasController::class, 'gestionar_coberturas'])->name('gestionar_coberturas');

    Route::post('/resumen_orden_acobertura', [CoberturasController::class, 'resumen_orden_cobertura'])->name('resumen_orden_coberturas');

    Route::post('/resumen_orden_acobertura', [CoberturasController::class, 'resumen_orden_cobertura'])->name('resumen_orden_coberturas');

    Route::post('/gestionar_cobertura', [CoberturasController::class, 'set_gestion_cobertura'])->name('set_gestion_cobertura');

    Route::post('/gestionar_cobertura', [CoberturasController::class, 'set_cobertura_amparo'])->name('set_polizas_amparo');

    Route::get('/crear', [GetOrdenDataController::class, 'CreateOrderForm'])->name('crear');

    Route::get('/crear_contrato', [GetOrdenDataController::class, 'CreateContractForm'])->name('crear_contrato');

    Route::post('/crear', [GetOrdenDataController::class, 'GetOrderData'])->name('crearget');

    Route::match(['get', 'post'], '/crearset', [OrdenesController::class, 'SetOrderData'])->name('order.store');

    Route::get('/generate-pdf-a/{order_number}', [GeneratePDFController::class, 'generatePDF_a'])->name('generatePDF-a');

    Route::get('/generate-pdf-b/{order_number}', [GeneratePDFController::class, 'generatePDF_b'])->name('generatePDF-b');

    Route::match(['get', 'post'], '/resumen_orden/{order_number}',[OrdenesController::class, 'resumen_orden'])->name('resumen_orden');
   
    Route::get('/gestionar_orden/{order_number}', [GestionarController::class, 'crear_gestion_orden'])->name('gestionar_orden');

    Route::get('/autorizar_orden/{order_number}', [AprobarController::class, 'crear_autorizacion_orden'])->name('autorizar_orden');

    Route::post('/autorizar_orden/{order_number}', [AprobarController::class, 'set_autorizacion_orden'])->name('set_autorizar_orden');


    Route::post('/update_valor_total/{order_number}', [GestionarController::class, 'update_valor_total'])->name('update_valor_total');
    Route::post('/gestionar_orden_add_comentario/{order_number}', [GestionarController::class, 'crear_interesado_gestion_orden'])->name('set_interesado_orden');
    Route::post('/gestionar_orden_add_interesado/{order_number}', [GestionarController::class, 'crear_comentario_gestion_orden'])->name('set_comentario_orden');

    Route::post('/gestionar_orden_delete_interesado/{order_number}', [GestionarController::class, 'eliminar_interesado_gestion_orden'])->name('delete_comentario_orden');

    Route::post('/gestionar_orden/{order_number}', [GestionarController::class, 'completar_gestion_orden'])->name('completar_gestion_orden');
    Route::post('/cerrar_orden/{order_number}', [GestionarController::class, 'cerrar_orden'])->name('cerrar_orden');

    Route::match(['get', 'post'], '/crearset/borrador/{order_number}',[BorradorController::class, 'SetOrderData_borrador'])->name('order.store_borrador');
});


