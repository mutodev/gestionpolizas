@extends('layouts.main')

@section('content')
<!-- content -->
 <!-- content -->

  <main class="py-5">

    <div class="container">
        <h1 class="h5 mb-3">
            Bienvenido

        </h1>
      <div class="row">
        <div class="col-md-12">




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
                   <h5> AMPAROS A CONSTITUIR POR PARTE DEL CONTRATISTA O PROVEEDOR SEGÚN APLIQUE EN EL
              CONTRATO U ORDEN DE COMPRA:</h5>
              <table>
                <tr>
             
                  <th class="col-0">
                    
                    <input id="all_coberturas" 
          
                    onclick="document.getElementById('all_coberturas_clear').checked = false;<?php foreach ($datos3 as $id => $dato):?>document.getElementById('id.{{$dato['id']}}').checked = true;            
                    <?php endforeach ?>"    type="checkbox" >
                 
                 
                  </th>
                  <th>Seleccionar todas las polizas</th>
                </tr>
                <tr>
             
                  <th class="col-0">
                    
                    <input id="all_coberturas_clear" 
          
                    onclick="document.getElementById('all_coberturas').checked = false; <?php foreach ($datos3 as $id => $dato):?>document.getElementById('id.{{$dato['id']}}').checked = false;            
                    <?php endforeach ?>"    type="checkbox" >
                 
                 
                  </th>
                  <th>Limpiar Selección</th>
                </tr>
              </table>
              <input type="text" class="form-control" name="order_number"
                  id="order_number" value="{{$order_number}}" hidden>
                </div>
              </div>



             <h5> I. AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO:</h5>
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">
                      SELECCIONAR  
                    
                    </th>
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
                    foreach ($datos3 as $id => $dato):?>
                  <tr>

                  @if($dato['tipo_de_poliza'] == 'AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO')
                    <th scope="row">
                      <input  name="{{$dato['origen']}}" type="text" value="{{$dato['origen']}}" hidden>
                    <input id="id.{{$dato['id']}}" name="id.{{$dato['id']}}" type="checkbox" value="{{$dato['id']}}">


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
                    @if($dato['tipo_de_poliza'] == 'RESPONSABILIDAD CIVIL EXTRACONTRACTUAL')



                    <th scope="row">
                      <input name="{{$dato['origen']}}" type="text" value="{{$dato['origen']}}" hidden>

                      <input id="id.{{$dato['id']}}" name="id.{{$dato['id']}}" type="checkbox" value="{{$dato['id']}}">



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
                      <input name="{{$dato['origen']}}" type="text" value="{{$dato['origen']}}" hidden>

                      <input id="id.{{$dato['id']}}" name="id.{{$dato['id']}}" type="checkbox" value="{{$dato['id']}}">



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
              <input type="submit" name="send" value="Guardar" class="btn btn-outline-secondary">

              </div>


            </form>

          </div>
        </div>
      </div>
    </div>

  </main>

@endsection