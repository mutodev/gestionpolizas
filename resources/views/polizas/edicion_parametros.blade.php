@extends('layouts.main')

@section('content')
<!-- content -->
 <!-- content -->
 <main class="py-5">
    <div class="container">



      <div class="row justify-content-md-center">


        @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif



        <div class="col-md-12">

          <div class="card">

            <div class="card-header card-title">
              <strong>Datos de las Aseguradora Disponibles </strong>
            </div>
            <div class="card-body">

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">

                    <h5> Orden en Curso:    {{ $orden}}</h5>

                </div>
              </div>

              <form method="post"  action="{{route('resumen_orden_coberturas')}}">
                @csrf
 <input type="text" class="form-control" name="order_number"
          id="order_number" value="{{$orden}}" hidden>
                <div class="form-group">
                   <!------Aseguradora -------->
                  <label for="first_name" class="col col-form-label">
                    Selecciona la aseguradora
                       </label>
                          <select class="form-control"  name="company_name">
                          <?php
                                  setlocale(LC_MONETARY,"de_DE");


                                  foreach ($Aseguradora as $dato1):?>
                                  @if($dato1['estado']=='1')
                                    <option value="{{$dato1['id']}}">
                                      {{$dato1['company_name']}}
                                    </option>
                                    @endif
                                    <?php endforeach ?>
                                </select>

  <!------Aseguradora -------->
                </div>
                <div class="form-group">

                  <!------Tabla 1 -------->
                  <table class="table table-striped table-hover">
                    <h5> I. AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO:
                      <thead>
                        <tr>

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

                           <!--1-->
          <input name="id_.{{$id}}._tipo_de_poliza" id="id_.{{$id}}._tipo_de_poliza" type="text" value="{{$dato['tipo_de_poliza']}}" class="form-control" hidden>


          <th scope="row">
             <!--2-->
             <input name="id_.{{$id}}._origen" id="id_.{{$id}}._origen" type="text" value="{{$dato['origen']}}" hidden>

            {{$dato['clase_de_riesgo']}}

            <input name="id_.{{$id}}._clase_de_riesgo"
            id="id_.{{$id}}._clase_de_riesgo" type="text"
            value="{{$dato['clase_de_riesgo']}}" class="form-control" hidden>



          </th>
                         <!--3-->
                            <th scope="row">


                              <input name="id_.{{$id}}._origen"
                              id="id_.{{$id}}._origen" type="text" value="{{$dato['origen']}}"  hidden>


                              <input name="id_.{{$id}}._porcentaje_amparo" id="id_.{{$id}}._porcentaje_amparo" type="text" value=" {{$dato['porcentaje_amparo']}}" class="form-control" >


                            </th>

                              <th scope="row">


                 <!--4-->

                 {{$dato['valor_asegurado']}}
                              <input name="id_.{{$id}}._valor_asegurado" id="id_.{{$id}}._valor_asegurado" type="text" value="{{$dato['valor_asegurado']}}" class="form-control" hidden>


                              </th>


                              <th scope="row">

                                 <!--5-->
                                <textarea class="form-control {{ $errors->has('vigencia') ? 'error' : '' }}" name="id_.{{$id}}._vigencia" id="id_.{{$id}}._vigencia" cols="50" rows="5">{{$dato['vigencia']}}
                                </textarea>



                                </th>

                            <!--6-->
                                <th scope="row">


                                  <input name="id_.{{$id}}._iva" id="id_.{{$id}}.iva" type="text" value="{{$dato['iva']}}" class="form-control" hidden>



                                  </th>
                                    </tr>

                                    @endif

                        <?php endforeach ?>
                      </tbody>
                    </table>


                                </div>
                <div class="form-group">

  <!------Tabla 2 -------->
  <table class="table table-striped table-hover">
    <h5> II. AMPAROS DE LA PÓLIZA DE RESPONSABILIDAD CIVIL EXTRACONTRACTUAL:
      <thead>
        <tr>

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

            <!--1-->
            <input name="id_.{{$id}}._tipo_de_poliza" id="id_.{{$id}}._tipo_de_poliza" type="text" value="{{$dato['tipo_de_poliza']}}" class="form-control" hidden>


            <th scope="row">

               <!--2-->
               <input name="id_.{{$id}}._origen" id="id_.{{$id}}._origen" type="text" value="{{$dato['origen']}}" hidden>

              {{$dato['clase_de_riesgo']}}

              <input name="id_.{{$id}}._clase_de_riesgo"
              id="id_.{{$id}}._clase_de_riesgo" type="text"
              value="{{$dato['clase_de_riesgo']}}" class="form-control" hidden>



            </th>
           <!--3-->
            <th scope="row">
              <input name="id_.{{$id}}._origen" id="id_.{{$id}}._origen" type="text" value="{{$dato['origen']}}" hidden>
              {{$dato['porcentaje_amparo']}}
              <input name="id_.{{$id}}._porcentaje_amparo" id="id_.{{$id}}._porcentaje_amparo" type="text"
              value="{{$dato['porcentaje_amparo']}}" class="form-control" hidden>


            </th>

              <th scope="row">

 <!--4-->

              <input name="id_.{{$id}}._valor_asegurado" id="id_.{{$id}}._valor_asegurado" type="number" value="{{$dato['valor_asegurado']}}" class="form-control">


              </th>


              <th scope="row">
                 <!--5-->

                <textarea class="form-control" name="id_.{{$id}}._vigencia" id="id_.{{$id}}._vigencia" cols="50" rows="5">{{$dato['vigencia']}}
                </textarea>


                </th>


                <th scope="row">
  <!--6-->
                  <input name="id_.{{$id}}._iva" id="id_.{{$id}}.iva" type="text" value="{{$dato['iva']}}" class="form-control" hidden>



                  </th>
                    </tr>

                    @endif

        <?php endforeach ?>
      </tbody>
    </table>


                </div>

                <div class="form-group">
  <table class="table table-striped table-hover">
    <h5> III. AMPAROS DE LA PÓLIZA DE SERIEDAD DE OFERTA :
      <thead>
        <tr>

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

            <!--1-->
          <input name="id_.{{$id}}._tipo_de_poliza" id="id_.{{$id}}._tipo_de_poliza" type="text" value="{{$dato['tipo_de_poliza']}}" class="form-control" hidden>



          <th scope="row">
  <!--2-->
  <input name="id_.{{$id}}._origen" id="id_.{{$id}}._origen" type="text" value="{{$dato['origen']}}" hidden>

          {{$dato['clase_de_riesgo']}}

          <input name="id_.{{$id}}._clase_de_riesgo"
          id="id_.{{$id}}._clase_de_riesgo" type="text"
          value="{{$dato['clase_de_riesgo']}}" class="form-control" hidden>

          </th>
            <th scope="row">
               <!--3-->
               <input name="id_.{{$id}}._origen" id="id_.{{$id}}._origen" type="text" value="{{$dato['origen']}}" hidden>
              <input type="text" class="form-control" name="id_.{{$id}}._porcentaje_amparo"
              id="id_.{{$id}}._porcentaje_amparo"" value="
            {{$dato['porcentaje_amparo']}}">

            </th>

              <th scope="row">
                  <!--4-->
             {{$dato['valor_asegurado']}}
             <input name="id_.{{$id}}._valor_asegurado" id="id_.{{$id}}._valor_asegurado" type="text" value="{{$dato['valor_asegurado']}}" class="form-control" hidden>

              </th>


              <th scope="row">
                  <!--5-->
                <textarea class="form-control {{ $errors->has('vigencia') ? 'error' : '' }}" name="id_.{{$id}}._vigencia" id="id_.{{$id}}._vigencia" cols="50" rows="5">{{$dato['vigencia']}}
                </textarea>


                </th>


                <th scope="row">
                    <!--6-->
                  <input name="id_.{{$id}}._iva" id="id_.{{$id}}._iva" type="text" value="{{$dato['iva']}}" class="form-control" hidden>


                  </th>
                    </tr>

                    @endif

        <?php endforeach ?>
      </tbody>
    </table>
  <!------Tabla 3-------->
</div>

              <input type="submit" name="send" value="Guardar" class="btn btn-outline-secondary">
             </div>


            </div>
        </div>
      </div>
    </div>
  </main>
@endsection