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

          <div class="row">

            <div class="col-md-12">

            <?php
            foreach ($orden as $id => $dato1):?>
            <div class="row">
            <div class="col-md-3 datos_orden">
            Orden: {{$dato1['order_number']}}
            </div>

            <div class="col-md-9">
              <p> Sub Total de la Orden: {{$dato1['order_subtotal'] }}</p>
            <p> Creación: {{substr($dato1['created_at'], 0, 10) }}</p>
           <p> IVA Registrado:


         {{ $dato1['order_iva'] }}



          </p>
           <p> Total de la Orden:


  {{
                         $dato1['order_total']

                            }}
</p>
            </div>
            </div>



            <?php endforeach ?>

        </div>
    </div>
  </div>
</div>
    <br>