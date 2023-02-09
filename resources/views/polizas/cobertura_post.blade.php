@extends('layouts.main')

@section('content')
<!-- content -->
 <!-- content -->

  <main class="py-5">

    <div class="container">
        <h1 class="h5 mb-3">
            Bienvenido
            <small class="text-muted">{{ auth()->user()->name }}</small>
        </h1>
      <div class="row">
        <div class="col-md-12">


     <h1> Orden en Curso:    {{ $orden->order_number}}</h1>

        <form method="post"  action="{{route('set_polizas_amparo')}}">
          @csrf
          <div class="card">


              <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h2 class="mb-0">SELECCIONAR AMPAROS DE LA PÓLIZA </h2>

                </div>
              </div>
            <div class="card-body">
              <div class="form-group">

                <div class="col-md-12">
              <input type="text" class="form-control" name="order_number"
                  id="order_number" value="{{$orden}}" hidden>
                </div>
              </div>
                     <h5> I. AMPAROS A CONSTITUIR POR PARTE DEL CONTRATISTA O PROVEEDOR SEGÚN APLIQUE EN EL
              CONTRATO U ORDEN DE COMPRA:</h5>
              • AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO:
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">SELECCIONAR</th>
                    <th scope="col">CLASE DE RIESGO </th>
                    <th scope="col">PORCENTAJE
                      (%)
                      </th>
                    <th scope="col">VALOR
                      ASEGURADO</th>
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

                    <input name="id.{{$dato['id']}}" type="checkbox" value="{{$dato['id']}}">

                    <input name="id.{{$dato['origen']}}" type="text" value="{{$dato['origen']}}" hidden>

                    </th>
                    <th scope="row">
                    {{$dato['clase_de_riesgo']}}
                    </th>
                      <th scope="row">
                      {{$dato['porcentaje_amparo']}}

                      </th>

                        <th scope="row">
                        {{$dato['valor_asegurado']}}
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
                    <th scope="col">SELECCIONAR</th>
                    <th scope="col">CLASE DE RIESGO </th>
                    <th scope="col">PORCENTAJE
                      (%)
                      </th>
                    <th scope="col">VALOR
                      ASEGURADO</th>
                    <th scope="col">VIGENCIA</th>

                      </th>
                  </tr>
                </thead>


                <tbody>
                  <?php
                    setlocale(LC_MONETARY,"de_DE");



                    foreach ($datos3 as $id => $dato):?>
                  <tr>
                    @if($dato['tipo_de_poliza'] == 'RESPONSABILIDAD CIVIL EXTRACONTRACTUA')
                    <th scope="row">

                      <input name="id.{{$dato['id']}}" type="checkbox" value="{{$dato['id']}}">

                      <input name="id.{{$dato['origen']}}" type="text" value="{{$dato['origen']}}" hidden>

                    </th>
                    <th scope="row">
                    {{$dato['clase_de_riesgo']}}
                    </th>
                      <th scope="row">
                      {{$dato['porcentaje_amparo']}}

                      </th>

                        <th scope="row">
                        {{$dato['valor_asegurado']}}
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
                    <th scope="col">SELECCIONAR</th>
                    <th scope="col">CLASE DE RIESGO </th>
                    <th scope="col">PORCENTAJE
                      (%)
                      </th>
                    <th scope="col">VALOR
                      ASEGURADO</th>
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

                      <input name="id.{{$dato['id']}}" type="checkbox" value="{{$dato['id']}}">

                      <input name="id.{{$dato['origen']}}" type="text" value="{{$dato['origen']}}" hidden>

                    </th>
                    <th scope="row">
                    {{$dato['clase_de_riesgo']}}
                    </th>
                      <th scope="row">
                      {{$dato['porcentaje_amparo']}}

                      </th>

                        <th scope="row">
                        {{$dato['valor_asegurado']}}
                        </th>


                        <th scope="row">

                        {{$dato['vigencia']}}

                          </th>



                              </tr>

                              @endif

                  <?php endforeach ?>
                </tbody>
              </table>
              <input type="submit" name="send" value="Enviar" class="btn btn-outline-secondary">

              </div>


            </form>

          </div>
        </div>
      </div>
    </div>

  </main>

@endsection