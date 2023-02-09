@extends('layouts.main')

@section('content')
<!-- content -->
<main class="py-5">
    <div class="container">

   @if(Session::has('error_exist'))
            <div class="alert alert-danger">
                {{Session::get('error_exist')}}
            </div>



        @endif
      <div class="row justify-content-md-center">
        <div class="col-md-12">
          <div class="card">

            <div class="card-header card-title ">

  <strong><h5>APROBACION DE POLIZAS O GARANTÍAS</h5></strong>

            </div>

            <div class="card-body">


              <div class="row">

                <div class="col-md-12">



<div class="form-group row ">
  <div class="col-md-12 justify-content-md-center" >

        @include('layouts.datos_orden')
      </div>
    </div>

      <div class="row justify-content-md-center">
        <div class="col-md-12">



          <div class="card">
            <div class="card-header card-title ">

               <strong><h5>DATOS DE LA POLIZA</h5></strong>


            </div>
            <?php
            foreach ($orden as $id => $dato1):?>
            <form method="post"  action="{{route('set_autorizar_orden',['order_number'=>$dato1['order_number']   ])}}" enctype="multipart/form-data">

              <?php endforeach ?>
              @csrf



            <div class="card-body">


              <div class="row">

                <div class="col-md-3">



                <label class="form-label" >NÚMERO DE POLIZA</label>



                </div>

                <div class="col-md-7">




                    <input name="poliza_number"  value="{{ old('poliza_number') }}"  id="poliza_number"   type="text" required>


                </div>

                <div class="col-md-3">

                  <label class="form-label"  >BENEFICIARIO / ASEGURADO:
                  </label>


                </div>

                <div class="col-md-7">


                  <input name="beneficiario" value="Cotecmar"  id="beneficiario"  value="{{ old('beneficiario') }}"   type="text"  required>

                </div>

                <div class="col-md-3">

                  <label class="form-label" >LUGAR DE EXPEDICIÓN:
                  </label>


                </div>

                <div class="col-md-7">


                  <input name="lugar_exp"  id="lugar_exp" value="{{ old('lugar_exp') }}"   type="text" required>

                </div>


              </div>





              </div>

            </div>
    <br><br>

                <div class="col-md-12">
                  <div class="mb-3 file_imput">

<h5>Adjuntar Poliza:</h5>
                    <input  accept=".pdf"
                        type="file"
                        name="file"
                        id="file"
                        class="form-control @error('file') is-invalid @enderror" required>

                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                </div>

                @include('layouts.notificacion_table')
                  <hr>

     </div>
              </div>     </div>
              </div>
                </div>
              </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </main>
  @endsection

@section('title','Autorizar Orden | Contrato')