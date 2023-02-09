<label>Clase de Riesgo</label>
          <select class="form-control {{ $errors->has('clase_de_riesgo') ? 'error' : '' }}" name="clase_de_riesgo">

            @isset($Cobertura)
            <?php
            foreach ($Cobertura as $cobertura):?>
            <option selected> {{$cobertura['clase_de_riesgo']}}</option>
            <?php endforeach ?>
            @endisset

            <option value="BUEN MANEJO DEL ANTICIPO">BUEN MANEJO DEL ANTICIPO</option>
            <option value="CUMPLIMIENTO DEL CONTRATO">CUMPLIMIENTO DEL CONTRATO</option>
            <option value="CALIDAD DEL SERVICIO/BIEN">CALIDAD DEL SERVICIO/BIEN</option>
            <option value="SALARIOS, PRESTACIONES SOCIALES E
            INDEMNIZACIONES">SALARIOS, PRESTACIONES SOCIALES E             INDEMNIZACIONES</option>
            <option value="ESTABILIDAD DE LA OBRA">ESTABILIDAD DE LA OBRA</option>
            <option value="PAGO ANTICIPADO">PAGO ANTICIPADO</option>>
            <option value="ALIDAD Y CORRECTO FUNCIONAMIENTO DE LOS
            EQUIPOS">CALIDAD Y CORRECTO FUNCIONAMIENTO DE LOS
              EQUIPOS</option>
            <option value="PROVISIÓN DE REPUESTOS Y ACCESORIOS">PROVISIÓN DE REPUESTOS Y ACCESORIOS</option>
            <option value="RESPONSABILIDAD CIVIL            EXTRACONTRACTUAL">RESPONSABILIDAD CIVIL               EXTRACONTRACTUAL</option>>
            <option value="SERIEDAD DE OFERTA">SERIEDAD DE OFERTA</option>


       </select>

       @if ($errors->has('clase_de_riesgo'))
       <div class="error">
           {{ $errors->first('clase_de_riesgo') }}
       </div>
       @endif