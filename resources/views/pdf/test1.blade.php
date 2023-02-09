<!DOCTYPE html>
<html>
    
<head>
<style type="text/css">
table td tr{
  margin:0;
  border: 1px solid rgba(0, 0, 0, 0.8);
}
.table{
  width: 40px;

}

@media only screen and (max-width: 600px) {
  body {
    background-color: lightblue;
  }
}
.grid-container {
 /* display: grid;*/
  width: 70%;
  height: 900px;
position: absolute;
margin-bottom: 5%;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 1px solid rgba(0, 0, 0, 0.8);
 
  font-size: 30px;
  text-align: center;
  max-width:30%;
  float: left;
  display: inline-grid;
  position: absolute;
}
.firma{
  text-align:center;
}
.clsfirma{
  text-align:center;
}
.border_solid{

  border: 1px solid rgba(0, 0, 0, 0.8);
}
.border_2solid{

border: 2px solid rgba(0, 0, 0, 0.8);
}
.col-9 {
  padding: 2%;
  width: 79%;
  height:80px;

  font-size: 30px;
  text-align: center;

  float: right;




}

.col-12{
  padding: 2%;
  font-size: 24px;
  text-align: center;

  float: right;




}

.row{
 


}
body{
 
}
.col-2 {
  padding: 2%;
  width: 19%;



font-size: 30px;
text-align: center;

float: left;

min-height:80px;
height:80px;

}
.mb-0{
  font-weight:bold;
  font-size:17px;
  text-align: center;
  
}
.mb-2{
  font-weight:bold;
  font-size:12px;
  text-align: center;
  
}
tr{
  height:15px;
}
.tdSubtitle{
  height: 10px;
  
  font-size:10px;
  border: 1px solid rgba(0, 0, 0, 0.8);
  }
  .litle{
    font-size:10px;
  }
  .tdAnch{
    height:10px;
  }
       </style>
       <meta charset="UTF-8" />
    <title>Laravel 9 Generate PDF Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


  <div class="row border_solid">
      <!------------------Agregrar table--------------->
     <div>
      <table class="table ">
        <tr>
          <td rowspan="2" class="tdSubtitle">   <img src="{{public_path('image/logo_documento.png')}}" alt="Logo" height="70px"> </td>
          <td colspan="3"  >
            <h2 class="mb-0" >VERIFICACIÓN Y APROBACION DE POLIZAS O GARANTÍAS</h2>
            </td>
        </tr>
        <tr>
       
            <td class="tdSubtitle">Código: F-GESLOG-002</td>
            <td class="tdSubtitle">VERSIÓN Nº: 0.0.2</td>
            <td class="tdSubtitle">Fecha de aprobación: 22-ago-2012</td>
        </tr>
        </table>
        </div>
            <!------------------Agregrar table--------------->
<div>
      <table class="table">
        <tr>
          <td class="tdAnch" colspan="2">
          <h2 class="mb-2">DATOS DE LA APROBACIÓN DE LA PÓLIZA</h2>
          </td>
        </tr>
        <tr>
          <?php  foreach ($Datos_Orden as $id => $dato):?>
         
        
            <td class="tdSubtitle">DOCUMENTO Nº:  <span class="subtitle">{{$dato['order_number']}}</span></td>
            <td class="tdSubtitle">FECHA DOCUMENTO:  <span class="subtitle">{{
            
            substr( $dato['created_at'], 0, 10)
            
            }}</span></td>
            <?php endforeach ?>
        </tr>
        </table>

          </div>
  <!------------------Agregrar table--------------->
      <!------------------Agregrar table--------------->
      <div>
        <table class="table">
          <tr>
            <td colspan="2">
            <h2 class="mb-2">DATOS DEL NEGOCIO JURÍDICO</h2>
            </td>
          </tr>
          <tr>
              <td class="tdSubtitle">TIPO: CONTRATO  <input disabled type="checkbox" name="colors" value="blue"/> ORDEN DE COMPRA  <input disabled type="checkbox" name="colors" value="blue" checked="yes" /> ORDEN DE SERVICIO <input disabled type="checkbox" name="colors" value="blue"  /> </td>
              <td class="tdSubtitle">NUMERO: {{$Datos_Orden[0]['order_number']}}</td>
          </tr>
          <tr>
              <td class="tdSubtitle">FECHA:{{substr($Datos_Orden[0]['created_at'], 0, 10)}} </td>
              <td class="tdSubtitle">VALOR: ${{$Datos_Orden[0]['order_total']}}</td>
          </tr>
          </table>

          </div>
    <!------------------Agregrar table--------------->
        <!------------------Agregrar table--------------->
        <div>
          <table class="table">
            <tr>
              <td colspan="3">
              <h2 class="mb-2">DATOS DEL PROVEEDOR O CONTRATISTA</h2>
              </td>
            </tr>
            <tr>
                <td class="tdSubtitle">NOMBRE: INGENIERIA DEL CARIBE S.A.S.  </td>
                <td class="tdSubtitle">Nº DE IDENTIFICACIÓN: 8060106758 </td>
                <td class="tdSubtitle">TIPO DE IDENTIFICACIÓN: CC  <input disabled type="checkbox" name="colors" value="blue" /> NIT <input disabled type="checkbox" name="colors" value="blue" checked="yes" /> CE  <input disabled type="checkbox" name="colors" value="blue"  /></td>
            </tr>
            </table>
          </div>
      
      <!------------------Agregrar table--------------->
           <!------------------Agregrar table--------------->
           <div>
           <table class="table">


            <tr>
              <td colspan="3">
                <h2 class="mb-0" >DATOS DE LA PÓLIZA DE SEGURO DE CUMPLIMIENTO</h2>
              </td>
            </tr>

            <tr>
              <td class="tdSubtitle">PÓLIZA CUMPLIMIENTO Nº. {{$Datos_Orden[0]['order_nit']}}  </td>
              <td class="tdSubtitle">ASEGURADORA: {{$Aseguradora[0] ['company_name']}} </td>
              <td class="tdSubtitle">FECHA EXPEDICIÓN: {{substr($Datos_Orden[0]['created_at'], 0, 10)}}</td>
          </tr>
          <tr>
            <td class="tdSubtitle">LUGAR DE EXPEDICIÓN: {{$Datos_Orden[0]['poliza_expplace']}}  </td>
            <td class="tdSubtitle">TOMADOR: {{$Datos_Orden[0]['order_nombre']}}  </td>
            <td class="tdSubtitle">BENEFICIARIO / ASEGURADO: {{$Datos_Orden[0]['poliza_beneficiario']}} </td>
        </tr>

          
            </table>
          </div>
      
      <!------------------Agregrar table--------------->


          <!------------------Agregrar table--------------->
          <div>
      
         
        
            <table class="table">
              <tr>
                <td colspan="2">
                <p ><h5> AMPAROS SOLICITADOS EN EL NEGOCIO JURÍDICO </h5></p>
              </td>
              </tr> 
              @if($Condicion1>0)
              <tr>
                <td colspan="2">
                <span class="litle">.AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO</span>
                </td>
              </tr>
              @endif
              <!----------------->
              <?php  foreach ($datos3 as $id => $dato):?>

              @if($dato['tipo_de_poliza'] == 'AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO') 
              <tr>
                <td colspan="2" class="tdSubtitle">
                  <span class="subtitle">  <u>{{$dato['clase_de_riesgo']}}   <input disabled type="checkbox" name="colors" value="blue" checked="yes" /></u>   </span>
                 
                </td>
           
              </tr>
          
              @endif
          
              <?php endforeach ?>
            </table>

              <table class="table">
                @if($Condicion2>0)
                <tr>
                  <td colspan="2">
                  <span class="litle">.RESPONSABILIDAD CIVIL EXTRACONTRACTUAL</span>
                  </td>
                </tr>
@endif
              <?php  foreach ($datos3 as $id => $dato):?>

              @if($dato['tipo_de_poliza'] == 'RESPONSABILIDAD CIVIL EXTRACONTRACTUAL') 
              <tr>
                <td colspan="2" class="tdSubtitle">
                  <span class="subtitle">  <u>{{$dato['clase_de_riesgo']}}   <input disabled type="checkbox" name="colors" value="blue" checked="yes" /></u>   </span>
                 
                </td>
           
              </tr>
             
              @endif
          
          
              <?php endforeach ?>

            </table>
              <table class="table">
                @if($Condicion3>0)
                <tr>
                  <td colspan="2">
                  <span class="litle">.SERIEDAD DE OFERTA </span>
                  </td>
                </tr>
                @endif
              <?php  foreach ($datos3 as $id => $dato):?>
                 
          
              @if($dato['tipo_de_poliza'] == 'SERIEDAD DE OFERTA') 
              <tr>
                <td colspan="2" class="tdSubtitle">
                  <span class="subtitle">  <u>{{$dato['clase_de_riesgo']}}   <input disabled type="checkbox" name="colors" value="blue" checked="yes" /></u>   </span>
                 
                </td>
           
              </tr>
              @endif
              <?php endforeach ?>
            </table>
         
     
          
          </div>
      
      <!------------------Agregrar table--------------->
      <div>
      <table class="table">
           
            <tr>
                <td class="tdSubtitle">VIGENCIAS DEBIDAMENTE CONSTITUIDAS: SI  <input disabled type="checkbox" name="colors" value="blue" checked="yes" /> NO <input disabled type="checkbox" name="colors" value="blue"  /></td>
                <td class="tdSubtitle">PÓLIZA APROBADA: SI  <input disabled type="checkbox" name="colors" value="blue" checked="yes" /> NO <input disabled type="checkbox" name="colors" value="blue"  /></td>
                
            </tr>
            </table>
          </div>
       <!------------------Agregrar table--------------->
<div>


       <table class="table">
            <tr>
              <td colspan="2">
              <span class="litle">CAUSALES DE NO APROBACIÓN (SEÑALADOS CON CHULO): N/A</span>
              </td>
            </tr>
            <tr>
            <td class="tdSubtitle">
              <p>
                <u>INDEBIDA PAPELERÍA (A FAVOR DE ENTIDAD ESTATAL)   <input disabled type="checkbox" name="colors" value="blue"  /></u><br>
                <u>NDEBIDA IDENTIFICACIÓN DE LAS PARTES   <input disabled type="checkbox" name="colors" value="blue"  /></u><br>
                <u>OBJETO DEL SEGURO ERRADO   <input disabled type="checkbox" name="colors" value="blue"  /></u><br>
                <u>VIGENCIAS ERRADAS   <input disabled type="checkbox" name="colors" value="blue"  /></u><br>
                <u>SUMAS ASEGURADAS ERRADAS   <input disabled type="checkbox" name="colors" value="blue"  /></u><br>
               
                
              </p>
              </td>
              <td class="tdSubtitle">
              <p>
                <u>INDEBIDA IDENTIFICACIÓN DE LOS AMPAROS    <input disabled type="checkbox" name="colors" value="blue"  /></u><br>
                <u>PÓLIZA SIN FIRMAR POR TOMADOR   <input disabled type="checkbox" name="colors" value="blue"  /> </u><br>
                <u>AMPARO DE CALIDAD SIN INDICAR QUE INICIA DESDE LA FINALIZACIÓN DE LOS TRABAJOS O ENTREGA DEL BIEN  <input disabled type="checkbox" name="colors" value="blue"  /> </u><br>
                <u>AMPARO DE ESTABILIDAD SIN INDICAR QUE INICIA DESDE LA FINALIZACIÓN DE LOS TRABAJOS   <input disabled type="checkbox" name="colors" value="blue"  /></u><br>
               
               
                
              </p>
              </td>
            </tr>

          
            </table>
            </div>
      
      <!------------------Agregrar table--------------->
      <div>
      <table class="table">
            <tr>
              <td colspan="2">
              <span class="litle">NOTAS U OBSERVACIONES:</span>
              </td>
            </tr>
            </table>
            </div>
   
    <div class="clsfirma">
        <img class="firma" src="{{public_path($firma_seleccionada)}}" 
        
        
        alt="Logo" height="75px">
        <p> {{$gestor['Email']}} |
          {{$gestor['Name']}}</p>
        </div>
    
  </div> 

 
</div>
  <!------------------Agregrar table--------------->

 <!---------
 
------------>

</body>
</html>
