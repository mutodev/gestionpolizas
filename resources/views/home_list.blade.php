@extends('layouts.main')
@section('content')



<main class="py-5">

    <div class="container">
        <h1 class="h5 mb-3">
          <a  href="/Panel_de_Control" class="btn btn-sm btn-success" title="Panel de Control">

            Bienvenido </a>
            <small class="text-muted">{{ auth()->user()->name }}</small>
        </h1>
        @if(Session::has('error_exist'))
        <div class="alert alert-danger">
            {{Session::get('error_exist')}}
        </div>
        @endif

        @if(Session::has('Aprobado'))
        <div class="alert alert-success">
            {{Session::get('Aprobado')}}
        </div>
        @endif



      <div class="row">
        <div class="col-md-12">

          <div class="card">
              <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h2 class="mb-0">Polizas en Gestión</h2>
                  <div class="ml-auto">
                
                  <a href="{{route('home')}}" class="btn btn-sm btn-circle btn-success" title="Inicio">@include('iconos.home')</a>

     @role('Contratos')

                    <a href="{{route('crear_contrato')}}"   class="btn btn-outline-secondary"title="Crear Contrato">  Crear Contrato </a>


                    @endrole
                    @role('Admin')

                    <a  href="{{route('gestionar_coberturas')}}" class="btn btn-sm btn-circle btn-success" title="Gestionar Coberturas">  @include('iconos.gestionarcobertura_icon')</a>

                    <a href="{{route('gestionar_usuarios')}}" class="btn btn-sm btn-circle btn-success" title="Gestionar Usuarios">  @include('iconos.gestionarusuarios_icon')
                    </a>


                    <a href="{{route('files.index')}}" class="btn btn-sm btn-circle btn-success" title="Gestionar Firmas">  @include('iconos.gestionarfirmas_icon')
                    </a>


                    <a href="{{route('gestionar_aseguradora')}}" class="btn btn-sm btn-circle btn-success" title="Gestionar Aseguradora">  @include('iconos.aseguradora')</a>

                    @endrole
                    @role('Adquisiciones')
                    <a href="{{route('crear')}}" class="btn btn-success" title="Agregar Ordenes | Admin"><i class="fa fa-plus-circle"></i> Agregar</a>
                    @endrole
                  </div>
                </div>
              </div>

            <div class="card-body">
    @include('layouts._filter')
              <table class="table table-striped table-hover">
                <thead>

                  <tr>
                    <th scope="col">#</th>

                    <th scope="col">Nombre</th>
                    <th scope="col">Fecha Elaboración</th>
                    @role('Contratos')
                  <th scope="col">Total</th>
                  @endrole
                  @role('Admin')
                  <th scope="col">Total</th>
                  @endrole
                    <th scope="col">Opciones</th>
                    <th scope="col" style="
                    text-align: center;
                ">

                      <a href="#" class="btn btn-sm btn-circle btn-outline-danger" title="Alerts" >  @include('iconos.notificacion')</a>


                    </th>
                    <th scope="col">Estados</th>

                  </tr>


                </thead>
                <tbody>
                  <tr >

                    <td colspan="8" >
                 <!-----------Polizas en gestion ------>
                 @role('Super_Admin')
                 <h1>Usuario Admin</h1>
                 <p> Cordial Saludo, {{ auth()->user()->name }}</p>






                   <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                     @csrf
                     <button  class="btn btn-dark ">Salir</button>
                   </form>
                 </div>
                 @endrole

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
                    </td>



                  </tr>


                  @role('Adquisiciones')
                    @if($datos2 != null)
            <?php
            setlocale(LC_MONETARY,"de_DE");
            foreach ($datos2 as $id => $dato):?>

             <tr>

            <th scope="row"><p>{{$dato['order_number']}}</th>
            <td>    <p>{{$dato['order_nombre']}}</p></td>
            <td>    <p> {{substr($dato['order_fecha'], 0, 10) }}</p></td>
            <td>


              @if($dato['elaboracion'] == 1  )

    <a href="{{route('resumen_orden',['order_number'=> $dato['order_number']   ])}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
     @endif

              @if($dato['elaboracion'] != 0  && $dato['estado'] == 1 )

              <a href="{{route('generatePDF-a',['order_number'=> $dato['order_number']   ])}}"  class="btn btn-sm btn-circle btn-outline-info" title="Descargar Anexo A">  @include('iconos.pdficon')</a>






          @endif


@if($dato['elaboracion'] == 0  && $dato['estado'] == 1)

            <a href="{{route('order.store_borrador',['order_number'=> $dato['order_number']   ])}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>

    @endif


            </td>

            <td   >    @if($dato['elaboracion'] != 0  && $dato['estado'] == 1 )    <a href="#"

              class="

              @if($dato['diasleft']  != 1  )
              btn btn-sm btn-circle btn-outline-no-danger

          @else
          btn btn-sm btn-circle btn-outline-danger fa-pulse fa-spin
          @endif "



              title="Alerts" >  @include('iconos.notificacion_red')</a>


   @endif

            </td>
            <td
            class="


  @if($dato['estado'] == 0)
  grey_status
   @endif

  @if($dato['elaboracion'] == 0 && $dato['gestionado'] == 0 && $dato['estado'] == 1 )
            orange_status
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 0 && $dato['estado'] == 1 )
            green_status
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 1 && $dato['estado'] == 1 && $dato['aprobado'] == 0 )
           yellow_status
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 1 && $dato['estado'] == 1 && $dato['aprobado'] == 1 )
            blue_status
             @endif
              "

             >



             <p  >


     @if($dato['estado'] == 0)
CERRADO
   @endif

  @if($dato['elaboracion'] == 0 && $dato['gestionado'] == 0 && $dato['estado'] == 1 )
          BORRADOR
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 0 && $dato['estado'] == 1 )
            CREADO
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 1 && $dato['estado'] == 1 && $dato['aprobado'] == 0 )
         EN GESTIÓN
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 1 && $dato['estado'] == 1 && $dato['aprobado'] == 1 )
           APROBADO
             @endif



            </p>
           </td>

          </tr>





          <?php endforeach ?>
     @endif
          @endrole

  @if($datos2 != null)
          @role('Contratos')
          <?php
          setlocale(LC_MONETARY,"de_DE");
          foreach ($datos2 as $id => $dato):?>
 @if($dato['elaboracion'] == 1 )
           <tr >

          <th scope="row"><p>{{$dato['order_number']}}</th>
          <td>    <p>{{$dato['order_nombre']}}</p></td>
          <td>    <p> {{substr($dato['order_fecha'], 0, 10) }}</p></td>
          <td>   <p>$
            {{  $dato['order_total'] }}</p>
          </td>



          <td>

   @if($dato['elaboracion'] != 0 )
            <a href="{{route('resumen_orden',['order_number'=> $dato['order_number']   ])}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
  @else
    <a href="{{route('order.store_borrador',['order_number'=> $dato['order_number']   ])}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
   @endif

            @if($dato['gestionado'] == 1 && $dato['aprobado'] == 0 && $dato['estado'] != 0)

            <a href="{{route('autorizar_orden',['order_number'=> $dato['order_number']   ])}}"   class="btn btn-sm btn-circle btn-outline-secondary" title="Aprobar"><i class="fa fa-edit"></i></a>
   @endif




   @if($dato['elaboracion'] !== 0 && $dato['estado'] != 0)
            <a href="{{route('gestionar_orden',['order_number'=> $dato['order_number']   ])}}"  class="btn btn-sm btn-circle btn-outline-secondary gestionar" title="gestionar"><i class="fa fa-edit"></i></a>
   @endif


            @if($dato['aprobado'] == 1)
            <a href="{{route('generatePDF-b',['order_number'=> $dato['order_number']   ])}}" class="btn btn-sm btn-circle btn-outline-info" title="Descargar Aprobación"> @include('iconos.pdficon')</a>

             <a href="{{  asset("file/".$dato['poliza'] )}}" class="btn btn-sm btn-circle btn-outline-dark" target="_blank" title="Descargar Poliza"> @include('iconos.pdficon')</a>
            @endif
            @if($dato['elaboracion'] != 0  && $dato['estado'] == 1 )

            <a href="{{route('generatePDF-a',['order_number'=> $dato['order_number']   ])}}"  class="btn btn-sm btn-circle btn-outline-info" title="Descargar Anexo A">  @include('iconos.pdficon')</a>






        @endif

            @role('Admin')

            <a href="{{route('delete_orden',['order_number'=> $dato['order_number']   ])}}"class="btn btn-sm btn-circle btn-outline-danger" title="Delete" onclick="confirm('Are you sure?')"><i class="fa fa-times"></i></a>
            @endrole




          </td>

         <td   >

           @if($dato['elaboracion'] != 0  && $dato['estado'] == 1 )
               <a href="#"

              class="

              @if($dato['diasleft']  != 1  )
              btn btn-sm btn-circle btn-outline-no-danger

          @else
          btn btn-sm btn-circle btn-outline-danger fa-pulse fa-spin
          @endif "



              title="Alerts" >  @include('iconos.notificacion_red')</a>


  @endif

            </td>
          <td
            class="


  @if($dato['estado'] == 0)
  grey_status
   @endif

  @if($dato['elaboracion'] == 0 && $dato['gestionado'] == 0 && $dato['estado'] == 1 )
            orange_status
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 0 && $dato['estado'] == 1 )
            green_status
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 1 && $dato['estado'] == 1 && $dato['aprobado'] == 0 )
           yellow_status
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 1 && $dato['estado'] == 1 && $dato['aprobado'] == 1 )
            blue_status
             @endif
              "

             >



             <p  >


            @if($dato['estado'] == 0)
CERRADO
   @endif

  @if($dato['elaboracion'] == 0 && $dato['gestionado'] == 0 && $dato['estado'] == 1 )
          BORRADOR
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 0 && $dato['estado'] == 1 )
            CREADO
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 1 && $dato['estado'] == 1 && $dato['aprobado'] == 0 )
         EN PROCESO
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 1 && $dato['estado'] == 1 && $dato['aprobado'] == 1 )
           APROBADO
             @endif




            </p>
           </td>


        </tr>


   @endif


        <?php endforeach ?>

        @endrole
    @endif

        @role('Interesado')

            @if($datos2 != null)
        <?php
        setlocale(LC_MONETARY,"de_DE");


        foreach ($datos2 as $id => $dato):?>

         <tr



          >

        <th scope="row"><p>{{$dato['order_number']}}</th>
        <td>    <p>{{$dato['order_nombre']}}</p></td>
        <td>    <p> {{substr($dato['order_fecha'], 0, 10) }}</p></td>


        <td>

          @if($dato['elaboracion'] != 0)
          <a href="{{route('resumen_orden',['order_number'=> $dato['order_number']   ])}}" class="btn btn-sm btn-circle btn-outline-info" title="Show"><i class="fa fa-eye"></i></a>
 @endif

  {{--  @if($dato['aprobado'] == 1)
            <a href="{{route('generatePDF-b',['order_number'=> $dato['order_number']   ])}}" class="btn btn-sm btn-circle btn-outline-info" title="Descargar Aprobación"> @include('iconos.pdficon')</a>

             <a href="{{  asset("file/".$dato['poliza'] )}}" class="btn btn-sm btn-circle btn-outline-dark" target="_blank" title="Descargar Poliza"> @include('iconos.pdficon')</a>
            @endif--}}

          <a href="{{route('gestionar_orden',['order_number'=> $dato['order_number']   ])}}"  class="btn btn-sm btn-circle btn-outline-secondary gestionar" title="gestionar">
            <i class="fa fa-edit fa-rotate-180"></i></a>




        </td>

    <td   >      <a href="#"

              class="

              @if($dato['diasleft']  != 1  )
              btn btn-sm btn-circle btn-outline-no-danger

          @else
          btn btn-sm btn-circle btn-outline-danger fa-pulse fa-spin
          @endif "



              title="Alerts" >  @include('iconos.notificacion_red')</a>




            </td>

   <td
            class="


  @if($dato['estado'] == 0)
  grey_status
   @endif

  @if($dato['elaboracion'] == 0 && $dato['gestionado'] == 0 && $dato['estado'] == 1 )
            orange_status
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 0 && $dato['estado'] == 1 )
            green_status
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 1 && $dato['estado'] == 1 && $dato['aprobado'] == 0 )
           yellow_status
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 1 && $dato['estado'] == 1 && $dato['aprobado'] == 1 )
            blue_status
             @endif
              "

             >



             <p  >


            @if($dato['estado'] == 0)
CERRADO
   @endif

  @if($dato['elaboracion'] == 0 && $dato['gestionado'] == 0 && $dato['estado'] == 1 )
          BORRADOR
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 0 && $dato['estado'] == 1 )
            CREADO
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 1 && $dato['estado'] == 1 && $dato['aprobado'] == 0 )
         EN PROCESO
             @endif

  @if($dato['elaboracion'] == 1 && $dato['gestionado'] == 1 && $dato['estado'] == 1 && $dato['aprobado'] == 1 )
           APROBADO
             @endif




            </p>
           </td>

      </tr>

      {{ $datos2->links() }}
      <?php endforeach ?>
 @endif
      @endrole


                </tbody>
              </table>

            
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection
