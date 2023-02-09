@extends('layouts.main')

@section('content')
<!-- content -->
 <!-- content -->

  <main class="py-5">

    <div class="container">
    <div class="datos_orden_resumen">
        <h1 class="h5 mb-3">
            Bienvenido
            <small class="text-muted">{{ auth()->user()->name }}</small>
    </h1>
            <hr>

            @include('layouts.datos_orden')


     <div class="card">
       <div class="card-body">

          <div class="row">

            <div class="col-md-12 mb-3" ">

        <?php  foreach ($Aseguradora as $id => $dato):?>
        <p >Aseguradora Seleccionada:    {{ $dato['company_name']}}
        </p>


       <p >Contacto:    {{ $dato['name2']}}
        </p>
        <br>
          <?php endforeach ?>
</div></div></div></div>



      <div class="row">
        <div class="col-md-12">


          <div class="card">


              <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h2 class="mb-0">Resumen de Orden </h2>
                  <div class="ml-auto">

                    <a href="{{route('home')}}" class="btn btn-sm btn-circle btn-success" title="Inicio">  @include('iconos.home')</a>


                  </div>
                </div>
              </div>
            <div class="card-body">

                     <h5> I. AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO:</h5>
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