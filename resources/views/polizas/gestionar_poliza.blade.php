@extends('layouts.main')
@section('content')



<main class="py-5">

    <div class="container">

      <div class="row">
        <div class="col-md-12">




      </h1>


          <div class="card">
              <div class="card-header card-title">


                <div class="d-flex align-items-center">
                  <h2 class="mb-0">Coberturas en Gestión</h2>
                  <div class="ml-auto">
                    <a href="{{route('home')}}" class="btn btn-sm btn-circle btn-success" title="Inicio">  @include('iconos.home')</a>

                    <a href="{{route('crear_cobertura')}}" class="btn btn-sm btn-circle btn-success" title="Crear Coberturas">  @include('iconos.add')</a>


                  </div>
                </div>
              </div>
            <div class="card-body">

<!---Filtros----->


              <table class="table table-striped table-hover">
                <thead>

                  <tr>
                    <th scope="col">Tipo de Poliza</th>
                    @role('Admin')

                    <th scope="col">Clase de Riesgo</th>
                    <th scope="col">% Amparo </th>
                    <th scope="col">Valor Asegurado</th>
                    <th scope="col">Vigencia</th>
                    <th scope="col">Origen</th>
                    <th scope="col">IVA</th>
                    <th scope="col"> </th>
                    @endrole
                  </tr>
                </thead>
                <tbody>

                  <?php
                  setlocale(LC_MONETARY,"de_DE");



                  foreach ($Coberturas as $id => $cobertura):?>
                <tr>
                  <th scope="row"><p>{{$cobertura['tipo_de_poliza']}}</th>
                  <th scope="row"><p>{{$cobertura['clase_de_riesgo']}}</th>
                    <th scope="row"><p>{{$cobertura['porcentaje_amparo']}}</th>
                      <th scope="row"><p>{{$cobertura['valor_asegurado']}}</th>
                          <th scope="row"><p>{{$cobertura['vigencia']}}</th>
                            <th scope="row"><p>{{$cobertura['origen']}}</th>
                              <th scope="row">

                                <p>{{$cobertura['iva']}}</p>

                                </th>

                                  <td>     <a

                                    href="{{route('actualizar_cobertura',['id_poliza'=> $cobertura['id']   ])}}"

                                  class="btn btn-sm btn-circle btn-outline-info" title="Actualizar Coberturas">  @include('iconos.crearcobertura_icon')</a> </td>
                  </tr>
                    <?php endforeach ?>
            <tr>
              <td colspan="8">
           <!-----------Polizas en gestion ------>
           <div class="align-items-center">
           @role('Invitado')
           <h1>Usuario Invitado</h1>
           <p> Cordial Saludo, {{ auth()->user()->name }}</p>
           <p>Muy pronto tu usuario será autorizado para contribuir en el proceso institucional de Gestión de Polizas según el nivel de seguridad y el perfil relacionado con tu cargo en la entidad.</p>
           <p>Recibiras un una notificaión vía correo electrónico con la confirmación</p>
           <p><h1>Gracias! Vuelve Pronto</h1>



           <div>
             <form action="{{ route('logout') }}" method="POST" style="display: inline;">
               @csrf
               <button  class="btn btn-dark ">Salir</button>
             </form>
           </div>
           @endrole
           </div>
              </td>
            </tr>
                </tbody>
              </table>

              <nav class="mt-4">
                  <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
