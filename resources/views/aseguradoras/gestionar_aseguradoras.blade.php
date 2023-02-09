@extends('layouts.main')
@section('content')



<main class="py-5">

    <div class="container">
        <h1 class="h5 mb-3">
            Bienvenido
            <small class="text-muted">{{ auth()->user()->name }}</small>
        </h1>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h2 class="mb-0">Aseguradoras en Gestión</h2>
                  <div class="ml-auto">

                    <a href="{{route('home')}}" class="btn btn-sm btn-circle btn-success" title="Inicio">  @include('iconos.home')</a>
                    <a href="{{route('crear_aseguradora')}}" class="btn btn-sm btn-circle btn-success" title="Gestionar Aseguradora">  @include('iconos.add')</a>

                  </div>
                </div>
              </div>
            <div class="card-body">

<!---Filtros----->


              <table class="table table-striped table-hover">
                <thead>

                  <tr>
                    <th scope="col">#</th>
                    @role('Admin')
                    <th scope="col">Nombre Aseguradora</th>

                    <th scope="col">Id Representante</th>
                    <th scope="col">Fecha Elaboración</th>
                    <th scope="col">Opciones</th>

                    <th scope="col">Estados</th>
                    @endrole
                  </tr>
                </thead>
                <tbody>
                  <?php
                  setlocale(LC_MONETARY,"de_DE");

                  foreach ($Aseguradoras as $id => $aseguradora):?>
                  <tr>
                    <th scope="row"><p>{{$aseguradora['id']}}</th>
                      <th scope="row"><p>{{$aseguradora['company_name']}}</th>
                        <th scope="row"><p>{{$aseguradora['ccrepresentante']}}</th>
                          <td>    <p> {{substr($aseguradora['created_at'], 0, 10) }}</p></td>





                          <td>



                              <a href="{{route('update',['id_aseguradora'=> $aseguradora['id']  ])}}"  class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i>
                            </a>





                        </td>
                        <th scope="row">
                        <p>

                          @if ($aseguradora['estado']==1)
              Activo
                @else
              Inactivo
                @endif

                      </p></th>
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
