@extends('layouts.main')

@section('content')
<!-- content -->
 <!-- content -->

  <main class="py-5">

    <div class="container">

           <div class="row">
        <div class="col-md-12">
<div class="card">

           <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h5 class="mb-0">DATOS DE LA ORDEN</h5>
                  <div class="ml-auto">

                    <a href="{{route('home')}}" class="btn btn-sm btn-circle btn-success" title="Inicio">  @include('iconos.home')</a>

  <a href="{{route('Ordenes')}}" class="btn btn-sm btn-circle btn-success" title="Ordenes">  @include('iconos.list')</a>

                  </div>
                </div>
              </div>

 <div class="card-body">
            Bienvenido
            <small class="text-muted">{{ auth()->user()->name }}</small>
            <?php  foreach ($orden as $id => $dato):?>
            <h1> Orden en Curso: {{ $dato->order_number}}</h1>
            <?php endforeach ?>
            @foreach ($users as $user )
         @if($user->id ==  auth()->user()->id )
            <p>Elaborado Por: {{ $user->name}}</p>
     @endif
            @endforeach

        </h1>

        <?php  foreach ($Aseguradora as $id => $dato):?>
         <p >Aseguradora Seleccionada:    {{ $dato['company_name']}}
        </p>


         <p>Contacto:    {{ $dato['name2']}}
        </p>
          <?php endforeach ?>
   </div>
      </div>



<hr>



          <div class="card">


              <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h2 class="mb-0">Resumen de Cobertura</h2>

                </div>
              </div>
            <div class="card-body">


            <h5>    I. AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO:</h5>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>

                    <th scope="col">CLASE DE RIESGO </th>
                    <th scope="col">PORCENTAJE
                      (%)
                      </th>

                    <th scope="col">VIGENCIA</th>

                      </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    setlocale(LC_MONETARY,"de_DE");



                    foreach ($datos3 as $id => $dato):?>
                  <tr>
                  @if($dato['tipo_de_poliza'] == 'AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO')

                    <th scope="row">
                    {{$dato['clase_de_riesgo']}}
                    </th>
                      <th scope="row">
                      {{$dato['porcentaje_amparo']}}

                      </th>


                        <th scope="row">

                        {{$dato['vigencia']}}

                          </th>

                          @endif

                              </tr>



                  <?php endforeach ?>
                </tbody>
              </table>
                    </div>
              <div class="card-body">
              <table class="table table-striped table-hover">
              <h5> II. AMPAROS DE LA PÓLIZA DE RESPONSABILIDAD CIVIL EXTRACONTRACTUAL:
                <thead>
                  <tr>

                    <th scope="col">CLASE DE RIESGO </th>
                    <th scope="col">PORCENTAJE
                      (%)
                      </th>

                    <th scope="col">VIGENCIA</th>

                      </th>
                  </tr>
                </thead>


                <tbody>
                  <?php
                    setlocale(LC_MONETARY,"de_DE");



                    foreach ($datos3 as $id => $dato):?>
                  <tr>
                    @if($dato['tipo_de_poliza'] == 'RESPONSABILIDAD CIVIL EXTRACONTRACTUAL')

                    <th scope="row">
                    {{$dato['clase_de_riesgo']}}
                    </th>
                      <th scope="row">
                      {{$dato['porcentaje_amparo']}}

                      </th>




                        <th scope="row">

                        {{$dato['vigencia']}}

                          </th>



                              </tr>

                              @endif

                  <?php endforeach ?>
                </tbody>
              </table>
              </div>



              <div class="card-body">
              <table class="table table-striped table-hover">
              <h5> III. AMPAROS DE LA PÓLIZA DE SERIEDAD DE OFERTA :
                <thead>
                  <tr>

                    <th scope="col">CLASE DE RIESGO </th>
                    <th scope="col">PORCENTAJE
                      (%)
                      </th>

                    <th scope="col">VIGENCIA</th>

                      </th>
                  </tr>
                </thead>


                <tbody>
                  <?php
                    setlocale(LC_MONETARY,"de_DE");



                    foreach ($datos3 as $id => $dato):?>
                  <tr>
                    @if($dato['tipo_de_poliza'] == 'SERIEDAD DE OFERTA')

                    <th scope="row">
                    {{$dato['clase_de_riesgo']}}
                    </th>
                      <th scope="row">
                      {{$dato['porcentaje_amparo']}}

                      </th>



                        <th scope="row">

                        {{$dato['vigencia']}}

                          </th>



                              </tr>

                              @endif

                  <?php endforeach ?>
                </tbody>
              </table>

              </div>



    </div>
          </div>
        </div>
      </div>
    </div>

  </main>

@endsection