




            @if(Session::has('success_comentarios'))
            <div class="alert alert-success">
                {{Session::get('success_comentarios')}}
            </div>
            @endif





            <div class="card">


              <div class="card-body">


                        <div class="row">
                            <div class="col-md-7">

        <form method="post"
    action="{{route('set_comentario_orden',['order_number'=> $orden_number ])}}">

            @csrf



                <textarea class="form-control" name="comentario"    id="comentario" cols="50" rows="5"></textarea>

</div>

            <input name="user_id" id="user_id" type="text" value="{{ auth()->user()->id}}" class="form-control" hidden>

  <div class="col-md-3">
            <input type="submit" name="send" value="Agregar Comentarios" class="btn btn-outline-secondary" >
</div>


</form>
</div>
</div>
</div>
<br>
<!--------------------------->

  @role('Contratos')

<!--------Completar Gestión------------>

   <div class="row form-group ">
                     <div class="col-md-3">
    <form method="post"
    action="{{route('completar_gestion_orden',['order_number'=> $orden_number ])}}">
    @csrf

    <input type="submit" name="Completar Gestión" value="Completar Gestión" class="btn btn-outline-secondary" >


</form>
</div>






<!----------->



@if( $dato1['estado'] == 1 )
<!--------Cerrar Gestión------------>

     <div class="col-md-3">
  <form method="post"
  action="{{route('cerrar_orden',['order_number'=> $orden_number ])}}">
@csrf

  <input type="submit" name="Cerrar Orden" value="Cerrar Gestión" onclick="confirm('Esta usted seguro?')" class="btn btn-dark" >


</form>
</div>
</div>


@endif
@endrole
  <!-- aqui el finaliza en  otro fomulario finalizacion -->
<!----------->