
 <form method="post"  action="#">

 
    @csrf
    <div class="row">
      <div class="col">
        <input type="checkbox" value="{{$cobertura['estado']}}"  name="Activar">

    </div>
    <div class="col">
          <input type="submit" name="send" value="Actualizar" class="btn btn-outline-secondary">
    </div>

    </div>
 </form>
