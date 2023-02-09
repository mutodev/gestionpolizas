

<div class="row">
    <div class="col-md-12">





      <div class="card">

        <div class="card-title">






              <h5>  <strong>   INTERESADOS</strong></h5>



</div>
        <div class="card-body">


                <div class="row">

                  <div class="col-md-12">



            @isset($interesados)


                    @foreach( $interesados as  $interesado)


                        <div class="row">
                            <div class="col-md-4">
                    {{$interesado['email_interesado']}}
                </div>
  @role('Contratos')
               <div class="col-md-3">
                <form method="post" action="{{route('delete_comentario_orden',['order_number'=> $orden_number ])}}">
                    @csrf

                        <input name="id" id="id" type="text" value="  {{$interesado['id']}}" class="form-control" hidden>



                      <input type="submit" name="send" value="-" class="fa btn-outline-danger fa-window-close" >

                    </form>


                </div>


                @endrole
            </div>

                      @endforeach



            @endisset



  @role('Contratos')
<!------------Agregar------------->

       </div>
        <div class="card-body">
       <div class="row form-group ">
                     <div class="col-md-7">
<form method="post" action="{{route('set_interesado_orden',['order_number'=> $orden_number ])}}">
@csrf

            <input type="text" class="form-control {{ $errors->has('email_interesado') ? 'error' : '' }}" name="email_interesado" id="emailinteresado"   >
            <!-- Error -->
            @if ($errors->has('email_interesado'))
            <div class="error">
                {{ $errors->first('email_interesado') }}
            </div>
            @endif



            <input name="id_user_interesado" id="id_user_interesado" type="text" value="{{ auth()->user()->id}}" class="form-control" hidden>
            <input name=" id_user_last_editor" id=" id_user_last_editor" type="text" value="{{ auth()->user()->id}}" class="form-control" hidden>



    </div>


     <div class="col-md-3">
        <input type="submit" name="send" value="Agregar Interesado" class="btn btn-outline-secondary" >


    </div>


</form>

    </div>

<!-------Fin------>
@endrole





        </div>
    </div>

                </div>
            </div>
        </div>
    </div>

<!--------------------------------------------------->

