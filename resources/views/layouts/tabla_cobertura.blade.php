<div class="row">
    <div class="col-md-12">




      <div class="card">


          <div class="card-header card-title">
            <div class="d-flex align-items-center">
              <h5 class="mb-0">AMPAROS  SELECCIONADOS DE LA PÓLIZA </h5>

            </div>
          </div>
        <div class="card-body">
  <h5> AMPAROS A CONSTITUIR POR PARTE DEL CONTRATISTA O PROVEEDOR SEGÚN APLIQUE EN EL
          CONTRATO U ORDEN DE COMPRA:</h5>
          <div class="form-group">
          <h5> I. AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO::</h5>

          </div>

          <table class="table table-striped table-hover">
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




                foreach ($datos3 as $id => $dato):?>

              @if($dato['tipo_de_poliza'] == 'AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO')
              <tr>
                <th scope="row">
                {{$dato['clase_de_riesgo']}}
                </th>
                  <th scope="row">
                  {{$dato['porcentaje_amparo']}}

                  </th>

                    <th scope="row">

                    {{
                   
                   number_format(
                      $dato['valor_asegurado'], 2, ',', '.')}}
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

                foreach ($datos3 as $id => $dato):?>

                @if($dato['tipo_de_poliza'] == 'RESPONSABILIDAD CIVIL EXTRACONTRACTUAL')

                <tr>
                <th scope="row">
                {{$dato['clase_de_riesgo']}}
                </th>
                  <th scope="row">
                  {{$dato['porcentaje_amparo']}}

                  </th>

                    <th scope="row">

                    {{
                       number_format(
                      $dato['valor_asegurado'], 2, ',', '.')

                      }}

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
                <th scope="col">VALOR
                  ASEGURADO</th>
                <th scope="col">VIGENCIA</th>

                  </th>
              </tr>
            </thead>


            <tbody>
              <?php



                foreach ($datos3 as $id => $dato):?>

                @if($dato['tipo_de_poliza'] == 'SERIEDAD DE OFERTA')
                <tr>
                <th scope="row">
                {{$dato['clase_de_riesgo']}}
                </th>
                  <th scope="row">
                  {{$dato['porcentaje_amparo']}}

                  </th>

                    <th scope="row">
                    {{

                      number_format(
                      $dato['valor_asegurado'], 2, ',', '.')




                      }}
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


        </form>

      </div>
    </div>
