@extends('layouts.main')

@section('content')



<main class="py-5">
    <div class="container">
 <div class="card" style="
    margin-bottom: 5%;
">
 <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h2 class="mb-0">Panel de Control</h2>
                  <div class="ml-auto">

                    <a href="{{route('home')}}" class="btn btn-sm btn-circle btn-success" title="Inicio">  @include('iconos.home')</a>

                    <a href="{{route('Ordenes')}}" class="btn btn-sm btn-circle btn-success" title="Ordenes">  @include('iconos.list')</a>

                    @role('Adquisiciones')
                    <a href="{{route('crear')}}" class="btn btn-success" title="Agregar Ordenes | Admin"><i class="fa fa-plus-circle"></i> Agregar</a>

                    @endrole
                    @role('Contratos')

                    <a href="{{route('crear_contrato')}}"   class="btn btn-outline-secondary"title="Crear Contrato">  Crear Contrato </a>


                    @endrole

                    @role('Admin')
                       <a  href="{{route('gestionar_coberturas')}}" class="btn btn-sm btn-circle btn-success" title="Gestionar Coberturas">  @include('iconos.gestionarcobertura_icon')</a>
    <a href="{{route('gestionar_aseguradora')}}" class="btn btn-sm btn-circle btn-success" title="Gestionar Aseguradora">  @include('iconos.aseguradora')</a>


                    <a href="{{route('gestionar_usuarios')}}" class="btn btn-sm btn-circle btn-success" title="Gestionar Usuarios">  @include('iconos.gestionarusuarios_icon')
                    </a>


                    <a href="{{route('files.index')}}" class="btn btn-sm btn-circle btn-success" title="Gestionar Firmas">  @include('iconos.gestionarfirmas_icon')
                    </a>




                    @endrole


                </div>

                </div>
              </div>
     <div class="card-body">

                {{ __('Bienvenido') }}

                      @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   : {{ auth()->user()->name }}



   </div>
   </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">

                    <div class="card-header bg-white">
                       Polizas Tramitadas
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-around">
                            <h3 class="h1"> {{$data['Polizas_Tramitadas']}}</h3>
                            <ul class="list-unstyled pl-5">

                                <li>{{$data['TipoOrden']}} Ordenes</li>
                                <li>{{$data['TipoContrato']}} Contratos</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-white">
                       Estados
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-around">
                            <ul class="list-unstyled">
                                <li>{{$data['Aprobadas']}} Aprobado </li>
                               <li>{{$data['Gestionadas']}} En Proceso</li>
                                 <li>{{$data['Cerradas']}} Cerrado </li>
    <li>{{$data['Creadas']}} Creadas</li>
                                    @role('Adquisiciones')
                                  <li>{{$data['Pendientes_Completar']}} Borrador </li>

                                  @endrole
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">


                <div class="card">

                    <div class="card-header bg-white">
                        Pendientes
                    </div>
                    <div class="card-body">

                        <div class="d-flex align-items-center justify-content-around">
                            <ul class="list-unstyled pl-5">
    @role('Contratos')
                              <li>{{$data['Pendientes_Aprobar']}}  Por Aprobar</li>
  @endrole
                                      @role('Interesado')
                                 <li>{{$data['Comentadas']}}  Comentadas</li>
                                     <li>{{$data['No_Comentadas']}}  No Comentadas</li>
                                  @endrole
                                   @role('Adquisiciones')
                                 <li>{{$data['Pendientes_Completar']}}  Borrador</li>
                                  @endrole
                            </ul>
                        </div>

                    </div>


                </div>

            </div>

        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-white">
                     Polizas que Requieren su Atención Urgente:
                    </div>
                    <div class="card-body p-0">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>

                                    <th scope="col">Nombre</th>
                                    <th scope="col">Fecha de Actualización</th>
                                      <th scope="col">Acción</th>

                                </tr>
                            </thead>

                            @if($data['Interesado'] != null)
                            <tbody>



 <?php
            setlocale(LC_MONETARY,"de_DE");
            foreach ($data['Interesado'] as $id => $dato):?>
   @if($dato['aprobado'] != 1 && $dato['estado'] != 0)
             <tr>

            <th scope="row"><p>{{$dato['order_number']}}</th>
            <td>    <p>{{$dato['order_nombre']}}</p></td>
            <td>    <p> {{substr($dato['order_fecha'], 0, 10) }}</p></td>
            <td>



@hasrole('Contratos|Interesado')
          <a href="{{route('gestionar_orden',['order_number'=> $dato['order_number']   ])}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
@endhasrole

        @role('Adquisiciones')

           <a href="{{route('order.store_borrador',['order_number'=> $dato['order_number']   ])}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>

        @endrole

            </td>




          </tr>



@endif

          <?php endforeach ?>




                            </tbody>
                            @endif
                        </table>
@if($data['Interesado'] != null)
{{ $data['Interesado']->links() }}
@endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
@endsection
