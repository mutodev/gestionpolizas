

          <label>Tipo de Poliza</label>
          <select class="form-control {{ $errors->has('tipo_de_poliza') ? 'error' : '' }}" name="tipo_de_poliza">
            @isset($Cobertura)
            <?php
            foreach ($Cobertura as $cobertura):?>
            <option selected> {{$cobertura['tipo_de_poliza']}}</option>
            <?php endforeach ?>
            @endisset

               <option value="RESPONSABILIDAD CIVIL EXTRACONTRACTUAL" >RESPONSABILIDAD CIVIL EXTRACONTRACTUAL</option>
               <option value="SERIEDAD DE OFERTA" >SERIEDAD DE OFERTA</option>
              <option value="AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO" >AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO</option>

          </select>

          @if ($errors->has('tipo_de_poliza'))
          <div class="error">
              {{ $errors->first('tipo_de_poliza') }}
          </div>

          @endif