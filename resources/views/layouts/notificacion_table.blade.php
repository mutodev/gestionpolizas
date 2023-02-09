


        <div class="row">
    <div class="col-md-12">




      <div class="card">


          <div class="card-header card-title">

              <h5 class="mb-0">FECHAS DE NOTIFICACIÓN Y CIERRE</h5>


          </div>
        <div class="card-body">

          <div class="row">

            <div class="col-md-12">




    <div id="cajaFechaUno" class="col-md-12">






      @foreach( $orden as  $dato)


             <div class="form-group row mb-0">
            <input type="text" class="form-control" name="order_number"
            id="order_number" value="{{$dato['order_number']}}" hidden>
            </div>


         <div class="form-group row mb-0">
      <div class="col-md-7">
     <label class="form-label"  >Número de Orden/Contrato:
                  </label>
  </div>
  <div class="col-md-3">
{{$dato['order_number']}}
     </div>
     </div>


  <div class="form-group row mb-0">
<div class="col-md-7">
      <label class="form-label"  >Fecha de Inicio:
                  </label>
                       </div>


           <div class="col-md-3">
              <input name="fecha_inicio_orden"  id="fecha_inicio_orden"  type="date" required>
                </div>  </div>

        <div class="form-group row mb-0">
<div class="col-md-7">
              <label class="form-label"  >Fecha de Finalizacion:
                  </label>
 </div>
    <div class="col-md-3">
               <input name="fecha_finalizacion_orden"  id="fecha_finalizacion_orden"  type="date" required >
                </div>

                </div>



        <div class="form-group row mb-0">
        <div class="col-md-7">
           <label class="form-label"  >Número de Días Previos
                  </label>
                  </div>
                    <div class="col-md-3">
               <input name="dias_para_notificacion_orden"  id="dias_para_notificacion_orden"   type="number"  required>
               </div>
               </div>


          @endforeach
</br>
<table class="table table-striped table-hover" border="1" >
  <thead>
    <th scope="col">Orden</th>
    <th scope="col">Poliza a Notificar</th>
    <th scope="col">Seleccionar Fecha de Finalización</th>
    <th scope="col">Número de Días Previos - Notificación</th>
  </thead>
  <tbody>

    @foreach( $datos3 as  $dato)
    <tr>

        <th scope="row">     <input type="checkbox" class="form-control"
          name="{{$dato['id']}}" id="id" ></th>
        <th scope="row">  {{$dato['tipo_de_poliza'] }}   </th>
        <th scope="row">  <input name="id.{{$dato['id']}}_endsat" type="date" >    </th>
        <th scope="row">  <input name="id.{{$dato['id']}}_diasleft" id="id.{{$dato['id']}}_diasleft'" type="number" >    </th>
      </tr>
      @endforeach
    </tbody>
</table>
<script>

    $("#prueba").inValid( function() {

            $("#fecha_inicio_orden").prop("disabled", true);

    });
    if ($request->fecha >= now()->toDateString()){
      alert('hola');
    }

</script>




                  <div class="form-group row mb-0">






                    <input type="submit" name="Completar Autorización" value="Aprobar" class="btn btn-outline-secondary">




                    <!-- aqui el finaliza en  otro fomulario finalizacion -->



                  </div>
  </div>
    </form>
  </div>
    </div>
      </div>


        </div>