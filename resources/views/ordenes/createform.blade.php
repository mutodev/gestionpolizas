@extends('layouts.main')

@section('content')
<!-- content -->
<main class="py-5">
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-8">
          @role('Adquisiciones')
          <div class="card">
            <div class="card-header card-title">
              <strong>Consultar Datos de la Orden</strong>
            </div>



            @if(Session::has('error_exist'))
            <div class="alert alert-danger">
         
                {{Session::get('error_exist')}}

            </div>        
        @endif


     
            <form action="" method="post" action="#">
              @csrf
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label for="first_name" class="col-md-3 col-form-label"># Orden a Consultar</label>
                    <div class="col-md-9">
                      <input type="text" name="order_number" id="order_number" class="form-control is-invalid" required>
                      <div class="invalid-feedback">
                        Número de Orden a Consultar
                      </div>
                    </div>
              
              
                  </div>
                
                     
            <input type="submit" name="send" value="Consultar"  class="btn btn-outline-secondary">
          
        
       
                 

               

                 


                

                 
              
                 
          
      </form>
                    <div class="form-group row mb-0">
                    <hr>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                  

                
                @endif

              </div>

              @endrole


              <div class="form-group row mb-0">
                <div class="col-md-9 offset-md-3">
               
           
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

@section('title','Consultar Poliza | Seguros')