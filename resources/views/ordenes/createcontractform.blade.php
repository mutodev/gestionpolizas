@extends('layouts.main')

@section('content')
<!-- content -->


 <main class="py-5">

  @if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif

    @if(Session::has('error_exist'))
            <div class="alert alert-danger">
                {{Session::get('error_exist')}}
            </div>
@endif


    <div class="container">




      <div class="row justify-content-md-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-title">
              <strong>Detalles del Contrato</strong>
            </div>
            <div class="card-body">


              <form method="post" action="{{ route('order.store') }}">
                @csrf

     <input type="text" name="order_tipoidentificacion" id="order_tipoidentificacion" value="nit" hidden>
    <input type="text" name="order_tipo" id="order_tipo" value="contrato" hidden>

                <div class=" row form-group " >
                     <div class="col-md-6">
                    <h5><label>Número del Contrato: </label></h5>

                    <input type="text"  value="{{ old('order_number') }}" class="form-control {{ $errors->has('order_number') ? 'error' : '' }}" name="order_number" id="order_number" required >
                    <!-- Error -->
                    @if ($errors->has('order_number'))
                    <div class="error">
                        {{ $errors->first('order_number') }}
                    </div>
                    @endif
                </div>

                </div>



                <div class="row form-group border_info">
                     <div class="col-md-3">
                    <label>Email : </label>

                    <input type="email"  value="{{ old('order_email') }}" class="form-control {{ $errors->has('order_email') ? 'error' : '' }}" name="order_email" id="order_email" required >


                    @if ($errors->has('order_email'))
                    <div class="error">
                        {{ $errors->first('order_email') }}
                    </div>
                    @endif
                      </div>

 <div class="col-md-6">
  <label>Tel:  </label>

                    <input type="text"  value="{{ old('order_tel') }}" class="form-control {{ $errors->has('order_tel') ? 'error' : '' }}" name="order_tel" id="order_tel" required>
                    @if ($errors->has('order_tel'))
                    <div class="error">
                        {{ $errors->first('order_tel') }}
                    </div>
                    @endif

    </div>
                </div>




                <div class="form-group border_info">

                    <label>Dirección de Contacto :  </label>

                    <input type="text"  value="{{ old('order_dir') }}" class="form-control {{ $errors->has('order_dir') ? 'error' : '' }}" name="order_dir"
                        id="order_dir" >
                    @if ($errors->has('order_dir'))
                    <div class="error">
                        {{ $errors->first('order_dir') }}
                    </div>
                    @endif




                </div>

                <div class="form-group border_info">
                    <label>Nombre de la Compañia :</label>

                    <input type="text" value="{{ old('order_nombre') }}" class="form-control {{ $errors->has('order_nombre') ? 'error' : '' }}" name="order_nombre"
                        id="order_nombre" >
                    @if ($errors->has('order_nombre'))
                    <div class="error">
                        {{ $errors->first('order_nombre') }}
                    </div>
                    @endif
                </div>
                <div class="form-group row border_info">
                  <div class="col-md-3">
                    <label>NIT : </label>

                    <input type="text"  value="{{ old('order_nit') }}" class="form-control   {{ $errors->has('order_nit') ? 'error' : '' }}" name="order_nit"
                        id="order_nit" >
                    @if ($errors->has('order_nit'))
                    <div class="error">
                        {{ $errors->first('order_nit') }}
                    </div>
                    @endif
                     </div>
   <div class="col-md-6">

  <label>Identificación Representante : </label>

                    <input type="text" value="{{ old('order_representante') }}"  class="form-control {{ $errors->has('order_representante') ? 'error' : '' }}" name="order_representante"
                        id="order_representante" >
                    @if ($errors->has('order_representante'))
                    <div class="error">
                        {{ $errors->first('order_representante') }}
                    </div>
                    @endif

   </div>
                </div>

                <div class="form-group border_info">
                    <label>Fecha : </label>
                    <input type="date" value="{{ old('order_fecha') }}" class="form-control {{ $errors->has('order_fecha') ? 'error' : '' }}" name="order_fecha"
                        id="fecha" required>

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

                    <input type="number"  value="{{ old('order_subtotal') }}"  class="form-control" name="order_subtotal"
                        id="order_subtotal" >
                    @if ($errors->has('order_subtotal'))
                    <div class="error">
                        {{ $errors->first('order_subtotal') }}
                    </div>
                    @endif
                </div>
                <div class="form-group border_info">
                    <label>IVA : </label>

                    <input type="number" step="any" onmouseleave="listen(this)" value="{{ old('0') }}" class="form-control" name="order_iva"
                        id="order_iva">
                    @if ($errors->has('order_iva'))
                    <div class="error">
                        {{ $errors->first('order_iva') }}
                    </div>
                    @endif
                </div>
                
            

                <div class="form-group border_info" >
                    <label>Anticipo : </label>

                    <input type="number" value="{{ old('0') }}" class="form-control {{ $errors->has('order_anticipo') ? 'error' : '' }}" name="order_anticipo"
                        id="order_anticipo" >
                    @if ($errors->has('order_anticipo'))
                    <div class="error">
                        {{ $errors->first('order_anticipo') }}
                    </div>
                    @endif
                </div>

                <input type="submit" name="send" value="Gestión Poliza" class="btn btn-outline-secondary" >
                <a href="{{route('home')}}" class="btn btn-dark ">Cancelar</a>
            </form>



            </div>



<script>
    function listen(get) {

        const number =  parseInt(  document.getElementById("order_iva").value) +parseInt( document.getElementById("order_subtotal").value);
        number_format =  new Intl.NumberFormat().format(number);
        document.getElementById("order_total").value =  number_format;
    }
</script>


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