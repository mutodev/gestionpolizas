@extends('layouts.main')

@section('content')
<!-- content -->
<main class="py-5">
    <div class="container">

      <div class="row justify-content-md-center">
        <div class="col-md-12">
          <div class="card">

    @if(Session::has('error_exist'))
            <div class="alert alert-danger">
                {{Session::get('error_exist')}}
            </div>



        @endif

          @if(Session::has('success_interesado'))
            <div class="alert alert-success">
                {{Session::get('success_interesado')}}
            </div>
            @endif
            <div class="card-header card-title ">


             <div class="row justify-content-md-center">    <strong><h5>VERIFICACIÓN Y APROBACION DE POLIZAS O GARANTÍAS</h5></strong>
              <br>

             </div>


            </div>

            <div class="card-body">


              <div class="row">

                <div class="col-md-12">



<div class="form-group row ">
  <div class="col-md-12 justify-content-md-center" >


    @if(Session::has('error_interesadoy'))
                    <div class="alert alert-danger">
                        {{Session::get('error_interesado')}}
                    </div>



                @endif





 <div class="card">


   <div class="card-header card-title">
                <div class="d-flex align-items-center">
                  <h5 class="mb-0">Datos de la Orden</h5>
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
       <div class="col-md-6">
      <b>  Orden: </b> {{$dato1['order_number']}}
       </div>

       <div class="col-md-6">
       <b> Creación:</b> {{substr($dato1['created_at'], 0, 10) }}



       </div>
       <br>
        <br>







       <div class="col-md-9">


     <p> Sub Total de la Orden:

      {{$dato1['order_subtotal'] }}</p>

          @role('Interesado')
IVA: {{$dato1['order_iva'] }}
  <p> Total de la Orden: {{$dato1['order_total']}}</p>
          @endrole
     @role('Contratos')
       <form method="post"
       action="{{route('update_valor_total',['order_number'=> $dato1['order_number']  ])}}">
     @csrf

       <input type="text" name="order_iva" id="order_iva" class="form-control is-invalid" value="{{$dato1['order_iva'] }}">

       <input type="text" name="order_subtotal" id="order_subtotal" class="form-control is-invalid" value="{{$dato1['order_subtotal'] }}" hidden>


     <br>




    </p>
      <p> Total de la Orden: {{$dato1['order_total']}}</p>


       </div>
       <div class="col-md-3">
       <input type="submit" name="send" value="Actualizar" class="btn btn-outline-secondary" >
       </div>
       </form>
       </div>
@endrole


       <?php endforeach ?>

   </div>
</div>

</div>

</div>



 <br>
</div>



<div class="col-md-12 justify-content-md-center" >





<div class="form-group row  " >

  <hr>
  <div class="col justify-content-md-center " >
  @include('layouts.tabla_cobertura')

</div>




</div>
</div>


<!-------------------->


</div>




                  <div class="col-md-12 justify-content-md-center" >

                  @include('layouts.interesados_orden')
                  </div>


                  </div>
                  <hr>
                  <div class="col-md-12 justify-content-md-center" >

                  @isset($Comentarios)

                  <table border="0" >




                 <thead>

                        <th>   <strong><h5>   Fecha</strong></h5>  </th>
                        <th>   <strong><h5>   Usuario </strong></h5>  </th>
                        <th>   <strong><h5>   Comentario </strong></h5> </th>

                    </thead>
                    @foreach( $Comentarios as  $comentario)
                    <tbody>
                      <tr>



                          <td>    <p> {{substr($comentario['created_at'], 0, 10) }}</p></td>

                          <td>  {{$comentario['user_id']}}</td>
                          <td>  {{$comentario['comentario']}}</td>
                        </tr>
                      </tbody>
                          @endforeach
                  </table>

                  @endisset


                  <hr>

                  @if(Session::has('success'))
                  <div class="alert alert-success">
                      {{Session::get('success')}}
                  </div>
              @endif
                  </div>
                  <?php
                  foreach ($orden as $id => $dato1):?>


                  @include('layouts.comentarios_orden')


                  <?php endforeach ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



  @endsection

@section('title','Crear Poliza | Seguros')