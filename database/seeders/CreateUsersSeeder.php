<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Coberturas;
use App\Models\Aseguradoras;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

      $user =   User::create([
            'name' => 'AdminApp',
            'email' => 'AdminApp@cotecmar.com',
            'password' => bcrypt('QWRtaW5BcHA'),
        ]);
      
        $role1 = Role::create(['name' => 'Admin']);
        $role3 = Role::create(['name' => 'Invitado']);
        $role4 = Role::create(['name' => 'Adquisiciones']);
        $role4 = Role::create(['name' => 'Interesado']);
        $role5 = Role::create(['name' => 'Contratos']);
        $user->assignRole('Admin');

        $Cobertura1 = Coberturas::create(  ['estado' => 1,
        'clase_de_riesgo' => 'BUEN MANEJO
        DEL ANTICIPO',
         'porcentaje_amparo' => '100',
        'valor_asegurado' => 'El valor entregado en calidad de anticipo'
        ,
        'vigencia'=> 'Vigencia igual a la ejecución del contrato y sus prórrogas.'
        ,
        'estado' => '1',
        'iva' => '0',
        'origen' => 'Anticipo',
        'tipo_de_poliza' => 'AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO']);

        $Cobertura2 = Coberturas::create(  ['estado' => 1,
        'clase_de_riesgo' => 'CUMPLIMIENTO DEL CONTRATO',
         'porcentaje_amparo' => '20',
        'valor_asegurado' => 'Sobre el valor final del contrato u orden más IVA'
        ,
        'vigencia'=> 'Vigencia por la ejecución del contrato
        y/u orden de compra sus prórrogas.
        En todo caso, éste amparo deberá
        estar vigente hasta la fecha de
        suscripción del acta d.'
        ,
        'estado' => '1',
        'iva' => '0',
        'origen' => 'Valor del Contrato',
        'tipo_de_poliza' => 'AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO']);

        $Cobertura3 = Coberturas::create(  ['estado' => 1,
        'clase_de_riesgo' => 'CALIDAD DEL SERVICIO/BIEN',
         'porcentaje_amparo' => '20',
        'valor_asegurado' => 'Sobre el valor final del contrato u orden más IVA'
        ,
        'vigencia'=> 'Con una vigencia de 1 año a partir de la fecha terminación del servicio y/o recibido a satisfacción del mismo'
        ,
        'estado' => '1',
        'iva' => '0',
        'origen' => 'Valor del Contrato',
        'tipo_de_poliza' => 'AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO']);

        $Cobertura4 = Coberturas::create(  ['estado' => 1,
        'clase_de_riesgo' => 'SALARIOS, PRESTACIONES SOCIALES E INDEMNIZACIONES',
         'porcentaje_amparo' => '10',
        'valor_asegurado' => 'Sobre el valor final del contrato u orden más IVA'
        ,
        'vigencia'=> 'Término de ejecución del contrato y/o orden de compra y sus prórrogas y tres (3) años más correspondientes a su periodo de prescripción laboral.',
        'estado' => '1',
        'iva' => '0',
        'origen' => 'Valor del Contrato',
        'tipo_de_poliza' => 'AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO']);

        $Cobertura5 = Coberturas::create(  ['estado' => 1,
        'clase_de_riesgo' => 'ESTABILIDAD DE LA OBRA',
         'porcentaje_amparo' => '30',
        'valor_asegurado' => 'Sobre el valor final del contrato u orden más IVA'
        ,
        'vigencia'=> 'Vigencia de (entre 3 y 5 años contados a partir del acta de entrega de la obra, esto de acuerdo a las especificaciones técnicas de la obra contratada).',
        'estado' => '1',
        'iva' => '0',
        'origen' => 'Valor del Contrato',
        'tipo_de_poliza' => 'AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO']);

        $Cobertura6 = Coberturas::create(  ['estado' => 1,
        'clase_de_riesgo' => 'PAGO ANTICIPADO',
         'porcentaje_amparo' => '100',
        'valor_asegurado' => 'El valor entregado en calidad de pago anticipado'
        ,
        'vigencia'=> 'Vigencia igual a la ejecución del contrato y sus prórrogas.',
        'estado' => '1',
        'iva' => '0',
        'origen' => 'Anticipo',
        'tipo_de_poliza' => 'AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO']);

        $Cobertura7 = Coberturas::create(  ['estado' => 1,
        'clase_de_riesgo' => 'CALIDAD Y CORRECTO FUNCIONAMIENTO DE LOS EQUIPOS',
         'porcentaje_amparo' => '50',
         'valor_asegurado' => 'Sobre el valor final del contrato u orden más IVA'
        ,
        'vigencia'=> 'vigencia (esta debe ser igual a la garantía otorgada por el fabricante máximo plazo otorgado por las aseguradoras de 3 años contados) a partir del acta de recibo a satisfacción de los equipos suministrados,montados o instalados.',
        'estado' => '1',
        'iva' => '0',
        'origen' => 'Valor del Contrato',
        'tipo_de_poliza' => 'AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO']);

        $Cobertura8 = Coberturas::create(  ['estado' => 1,
        'clase_de_riesgo' => 'PROVISIÓN DE REPUESTOS Y ACCESORIOS',
         'porcentaje_amparo' => '50',
         'valor_asegurado' => 'Sobre el valor final del contrato u orden más IVA'
        ,
        'vigencia'=> 'Vigencia de 1 años contados a partir del acta de entrega de los equipos suministrados, montados o instalados.',
        'estado' => '1',
        'iva' => '0',
        'origen' => 'Valor del Contrato',
        'tipo_de_poliza' => 'AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO']);


        $Cobertura9 = Coberturas::create(  ['estado' => 1,
        'clase_de_riesgo' => 'RESPONSABILIDAD CIVIL EXTRACONTRACTUAL',
         'porcentaje_amparo' => '100',
         'valor_asegurado' => '0'
        ,
        'vigencia'=> 'Vigencia por el término de ejecución del contrato y/u orden de compra.',
        'estado' => '1',
        'iva' => '0',
        'origen' => 'Valor Asegurado',
        'tipo_de_poliza' => 'RESPONSABILIDAD CIVIL EXTRACONTRACTUAL']);

        $Cobertura10 = Coberturas::create(  ['estado' => 1,
        'clase_de_riesgo' => 'SERIEDAD DE OFERTA',
         'porcentaje_amparo' => '10',
        'valor_asegurado' => 'Sobre el valor
        final del contrato
        u orden más IVA'
        ,
        'vigencia'=> 'Vigencia igual a la validez de la oferta, la cual iniciará a partir de la fecha de entrega de las ofertas'
        ,
        'estado' => '1',
        'iva' => '0',
        'origen' => 'Valor del Contrato',
        'tipo_de_poliza' => 'SERIEDAD DE OFERTA']);

   

        $Aseguradora = Aseguradoras::create(  ['tipo_aseguradora' => 'Tipo 1',
        'representante' => 'Aon Risk Services Colombia S A',
         'ccrepresentante' => '20',
         'nit' => '20',
        'direccion_entidad' => 'Calle del Arsenal No 8B -195 | Edif. Royal | Of. 202|Cartagena, Colombia',
        'company_name' =>'Aon Risk Services Colombia S A',
        'estado' =>1,
        'user_id' =>1,
        'name1'=> 'Veronica Alvear Castro',
        'email1' => 'veronica.alvear@aon.com',
        'phone1' => '0t: t: (575) 6642311 - 6642314 cel: 3005493750',
        'cargo1' => 'Ejecutiva de Cuenta',
        'dir1' => 'Calle del Arsenal No 8B -195 | Edif. Royal | Of. 202|Cartagena, Colombia',
        'url1' => 'www.aon.com/colombia',
        'name2'=> 'Luis Rodrigo Mendoza Estarita',
        'email2' => 'Luis.mendoza@aon.com',
        'phone2' => 't: t: (575) 6642311-6642314| Cel: 313-8280655',
        'cargo2' => 'Director Regional Costa',
        'dir2' => 'Calle 77B No.59-61 Centro Empresarial las Américas II Of 312 Barranquilla, Colombia',
        'url2' => 'www.aon.com/colombia',
    ]);




        $role1->givePermissionTo(Permission::all());
    }
}


//php artisan db:seed --class=CreateUsersSeeder