@extends('layouts.main')

@section('content')
<!-- content -->


 <main class="py-5">

  @if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif






    <div class="container">




      <div class="row justify-content-md-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-title">
              <strong>Detalles de La Orden</strong>
            </div>
            <div class="card-body">
              <?php
              setlocale(LC_MONETARY,"de_DE");



              foreach ($datos5 as $id => $dato):?>

              <form method="post" action="{{ route('order.store') }}">
                @csrf

     <input type="text" name="order_tipoidentificacion" id="order_tipoidentificacion" value="nit" hidden>
    <input type="text" name="order_tipo" id="order_tipo" value="orden" hidden>

                <div class=" row form-group " >
                    <div class="col">
                        <div class="alert alert-danger">   Un Anexo A ya ha sido creado para la Orden :</div><h1><label> {{$dato['NUMERO']}}</label></h1>



                    <input type="text" class="form-control {{ $errors->has('order_number') ? 'error' : '' }}" name="order_number" id="order_number" value="{{$dato['NUMERO']}}" >
                    <!-- Error -->
                    @if ($errors->has('order_number'))
                    <div class="error">
                        {{ $errors->first('order_number') }}
                    </div>
                    @endif
                </div>

                </div>



                <div class="row form-group border_info">
                    <div class="col">
                    <label>Email : </label>
                    <label>{{$dato['CORREO']}}</label>
                    <input type="order_email" class="form-control {{ $errors->has('order_email') ? 'error' : '' }}" name="order_email" id="order_email" value="{{$dato['CORREO']}}" hidden>


                    @if ($errors->has('order_email'))
                    <div class="error">
                        {{ $errors->first('order_email') }}
                    </div>
                    @endif
                </div>
                <div class="col">
                    <label>Tel:  </label>
                      <label>{{$dato['TELEFONO']}}</label>
                    <input type="text" class="form-control {{ $errors->has('order_tel') ? 'error' : '' }}" name="order_tel" id="order_tel" value="{{$dato['TELEFONO']}}" hidden>
                    @if ($errors->has('order_tel'))
                    <div class="error">
                        {{ $errors->first('order_tel') }}
                    </div>
                    @endif
                </div>
            </div>

                <div class="form-group border_info">
                    <label>Dirección de Contacto :  </label>
                        <label>{{$dato['DIRECCION']}} </label>
                    <input type="text" class="form-control {{ $errors->has('order_dir') ? 'error' : '' }}" name="order_dir"
                        id="order_dir" value="{{$dato['DIRECCION']}}" hidden>
                    @if ($errors->has('order_dir'))
                    <div class="error">
                        {{ $errors->first('order_dir') }}
                    </div>
                    @endif
                </div>
                <div class="form-group border_info">
                    <label>Nombre de la Compañia :</label>
                       <label> {{$dato['NOMBRE']}} </label>
                    <input type="text" class="form-control {{ $errors->has('order_nombre') ? 'error' : '' }}" name="order_nombre"
                        id="order_nombre" value="{{$dato['NOMBRE']}}" hidden>
                    @if ($errors->has('order_nombre'))
                    <div class="error">
                        {{ $errors->first('order_nombre') }}
                    </div>
                    @endif
                </div>
                <div class="form-group border_info">
                    <label>NIT : </label>
                       <label>{{$dato['NOMBRE']}}</label>
                    <input type="text" class="form-control {{ $errors->has('order_nit') ? 'error' : '' }}" name="order_nit"
                        id="order_nit" value="{{$dato['NIT']}}" hidden>
                    @if ($errors->has('order_nit'))
                    <div class="error">
                        {{ $errors->first('order_nit') }}
                    </div>
                    @endif
                </div>
                <div class="form-group border_info">
                    <label>Identificaión Representante : </label>
                       <label>{{$dato['REPRESENTANTE']}}</label>
                    <input type="text" class="form-control {{ $errors->has('representante') ? 'error' : '' }}" name="order_representante"
                        id="order_representante" value="{{$dato['REPRESENTANTE']}}" hidden>
                    @if ($errors->has('order_representante'))
                    <div class="error">
                        {{ $errors->first('order_representante') }}
                    </div>
                    @endif
                </div>
                <div class="form-group border_info">
                    <label>Fecha : </label>
                       <label>{{substr($dato['FECHA'], 0, 10)}}</label>
                    <input type="text" class="form-control {{ $errors->has('order_fecha') ? 'error' : '' }}" name="order_fecha"
                        id="fecha" value="{{substr($dato['FECHA'], 0, 10)}}" hidden>
                    @if ($errors->has('order_fecha'))
                    <div class="error">
                        {{ $errors->first('order_fecha') }}
                    </div>
                    @endif
                </div>
                 <!---->

                <!---->


                <div class="form-group border_info">
                    <label>Sub Total : </label>
                       <label>{{number_format( $dato['SUBTOTAL'], 2, ',', '.')}}</label>
                    <input type="text" class="form-control" name="order_subtotal"
                        id="order_subtotal" value="{{number_format( $dato['SUBTOTAL'], 2, ',', '.')}}" hidden>
                    @if ($errors->has('order_subtotal'))
                    <div class="error">
                        {{ $errors->first('order_subtotal') }}
                    </div>
                    @endif
                </div>
                <div class="form-group border_info">
                    <label>IVA : </label>
                          <label>{{number_format( $dato['IVA'], 2, ',', '.')}} </label>
                    <input type="text" class="form-control" name="order_iva"
                        id="order_iva" value="{{number_format( $dato['IVA'], 2, ',', '.')}}" hidden>
                    @if ($errors->has('order_iva'))
                    <div class="error">
                        {{ $errors->first('order_iva') }}
                    </div>
                    @endif
                </div>
                <div class="form-group border_info">
                      <label>Total : </label>
                    <label>{{number_format( $dato['TOTAL'], 2, ',', '.')}}</label>

                    <input type="text" class="form-control" name="order_total"
                        id="order_total" value="{{number_format( $dato['TOTAL'], 2, ',', '.')}}" hidden>
                    @if ($errors->has('order_total'))
                    <div class="error">
                        {{ $errors->first('order_total') }}
                    </div>
                    @endif
                </div>
                <div class="form-group border_info" >
                    <label>Anticipo : </label>
                            <label>{{number_format($dato['ANTICIPO'], 2, ',', '.')}}</label>

                    <input type="text" class="form-control {{ $errors->has('order_anticipo') ? 'error' : '' }}" name="order_anticipo"
                        id="order_anticipo" value="{{number_format($dato['ANTICIPO'], 2, ',', '.')}}" hidden>
                    @if ($errors->has('order_anticipo'))
                    <div class="error">
                        {{ $errors->first('order_anticipo') }}
                    </div>
                    @endif
                </div>


                <input type="submit" name="send" value="Crear Ampliación" class="btn btn-outline-secondary" >
                <a href="{{route('home')}}" class="btn btn-dark ">Cancelar</a>
            </form>


           <?php endforeach ?>
            </div>




                  </tbody>
                </table>






                  <hr>


                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection