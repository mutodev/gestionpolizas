<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
       .small{ color: #000;
    text-align: justify;
    font-size: 77%; }

    .small2{ 
        background: #e5e5e5;
    text-align: center;
    font-size: 10px; }

    .small3{ 
        background: white;
    text-align: center;
    font-size: 10px; }

    .notas_generales{ 
  color: #000;
  line-height: 95%;
    font-size: 80%;}

 th{
   
    text-align:center;

    

 }
li{
    margin-left: 10px;
}
u{
    justify-content: center;
    text-align:center;
    font-size: 12px;
    align-items: center;
}

.title{
    font-size: 12px;
}

.subTitle{
    color:gray;
}
strong{
    align-items: center;
    justify-content: center;
    text-align:center;
}
.table, th, td {
    align-items: center;
    justify-content: center;
  border: 1px solid black;
  text-align:center;
  border-bottom:1px solid black;
  

  
}


    
       </style>
    <title>Poliza # </title>
    <link href=" {{ asset('/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
</head>
<body>
    <div class="container" >
    <div  class="notas_generales" style="
text-align: center;font-weight: bold;
  ">
  <p class="notas_generales" style="font-weight: bold;  text-align:center; " ></p>
    ANEXO “A” DE LA ORDEN {{ $Orden }} - INGENIERIA DEL CARIBE SAS
    CONDICIONES GENERALES 
    </div>
<br>
    <p class="notas_generales" style="font-weight: bold;" >  SEGUROS A CONSTITUIR DE ACUERDO AL SISTEMA DE ADMINISTRACIÓN DEL RIESGO INTERNO DE
LA CONTRATACIÓN (SARIC):</p>


<p class="small" >
Para garantizar el cumplimiento de las obligaciones que EL CONTRATISTA asume en virtud del contrato, que
conoce y acepta que CORPORACIÓN DE CIENCIA Y TECNOLOGÍA PARA EL DESARROLLO DE LA
INDUSTRIA NAVAL, MARÍTIGMA Y FLUVIAL “COTECMAR” es el titular del riesgo a ser asegurado mediante
el(los) seguro(s) al(los) que se refiere esta cláusula especialmente aquellos relacionados con el cumplimiento
general de las obligaciones derivadas de la contratación, ejecución y desarrollo del contrato, por lo que
CORPORACIÓN DE CIENCIA Y TECNOLOGÍA PARA EL DESARROLLO DE LA INDUSTRIA NAVAL,
MARÍTIMA Y FLUVIAL “COTECMAR” está legalmente facultado para determinar las condiciones de
aseguramiento que deben cumplir los seguros por medio de las cuales será(n) transferido este(os) riesgo(s) a
compañía de seguros. EL CONTRATISTA conoce y acepta que las condiciones de aseguramiento que
satisfacen los lineamientos sobre aseguramiento y transferencia de riesgos de CORPORACIÓN DE CIENCIA
Y TECNOLOGÍA PARA EL DESARROLLO DE LA INDUSTRIA NAVAL, MARÍTIMA Y FLUVIAL “COTECMAR”
son cumplidos por el SISTEMA DE ADMINISTRACIÓN DEL RIESGO INTERNO DE LA CONTRATACIÓN
(SARIC), el cual consiste en un esquema de aseguramiento en donde CORPORACIÓN DE CIENCIA Y
TECNOLOGÍA PARA EL DESARROLLO DE LA INDUSTRIA NAVAL, MARÍTIMA Y FLUVIAL “COTECMAR”
ostenta las calidades de tomador, asegurado y beneficiario; EL CONTRATISTA ostentará la calidad de
garantizado. 
    </p>
    <p class="small" >
    Las pólizas del contrato y/u orden de compra deberán ser emitidas por una compañía de seguros legalmente
establecida en Colombia y sujeta a inspección y vigilancia de la Superintendencia Financiera y deberán reunir
las condiciones exigidas y previamente aprobadas por CORPORACIÓN DE CIENCIA Y TECNOLOGÍA PARA
EL DESARROLLO DE LA INDUSTRIA NAVAL, MARÍTIMA Y FLUVIAL “COTECMAR” en cuanto al emisor,
clausulados, condiciones generales, particulares, objeto, valor asegurado, alcance, vigencias, coberturas, y
exclusiones de los distintos amparos. 
    </p>
    <p class="small">
    Las condiciones de las pólizas de seguros anteriormente mencionadas, se encuentran reunidas en el SISTEMA
DE ADMINISTRACIÓN DEL RIESGO INTERNO DE LA CONTRATACIÓN (SARIC) de la CORPORACIÓN DE
CIENCIA Y TECNOLOGÍA PARA EL DESARROLLO DE LA INDUSTRIA NAVAL, MARÍTIMA Y FLUVIAL
“COTECMAR”, el cual ha sido tomado y negociado por CORPORACIÓN DE CIENCIA Y TECNOLOGÍA PARA
EL DESARROLLO DE LA INDUSTRIA NAVAL, MARÍTIMA Y FLUVIAL “COTECMAR” con el respaldo de
Aseguradoras de primera línea, que gozan de buena solvencia financiera. 
    </p>
    <p class="small">
    El contratista / proveedor podrá asegurar el cumplimiento de sus obligaciones, mediante la consecución de los
certificados de seguros aplicables al SISTEMA DE ADMINISTRACIÓN DEL RIESGO INTERNO DE LA
CONTRATACIÓN (SARIC) de la CORPORACIÓN DE CIENCIA Y TECNOLOGÍA PARA EL DESARROLLO DE
LA INDUSTRIA NAVAL, MARÍTIMA Y FLUVIAL “COTECMAR”, en el caso de que tales seguros consistan en
Pólizas de Cumplimiento y Pólizas de Responsabilidad Civil Extracontractual.

    </p>
    <p class="small">
    Para la expedición del certificado de seguros, la aseguradora solicitará información adicional que el
proveedor/contratista deberá suministrar. Para facilitar el proceso, el oferente podrá contactar al Área
designada por CORPORACIÓN DE CIENCIA Y TECNOLOGÍA PARA EL DESARROLLO DE LA INDUSTRIA
NAVAL, MARÍTIMA Y FLUVIAL “COTECMAR” para el manejo del SARIC:

    </p>

  
<!----- Los datos de contacto son variables de la poliza----->
<!----Inicio datos de Contacto---->
<br>
    <div class="notas_generales" >  


    <li>&nbsp; <strong>       DATOS DE CONTACTO PARA LA EXPEDICIÓN DE LAS PÓLIZAS:</strong></li>
      
     <br>
     <?php
                    setlocale(LC_MONETARY,"de_DE");
                  
                    
                  
foreach ($Aseguradora as $id => $dato):?>
        <p><strong class="nombre_contacto"> {{$dato['name1']}}</strong>| {{$dato['cargo1']}}| {{$dato['company_name']}} <br>
        {{$dato['dir1']}}| {{$dato['direccion_entidad']}}| <br>
t: {{$dato['phone1']}} <br>
{{$dato['email1']}} | {{$dato['url1']}}</p>
<br>   

<p><strong class="nombre_contacto"> {{$dato['name2']}}</strong>| {{$dato['cargo2']}}| {{$dato['company_name']}} <br>
        {{$dato['dir2']}}| {{$dato['direccion_entidad']}}| <br>
t: {{$dato['phone2']}} <br>
{{$dato['email2']}} | {{$dato['url2']}}</p>
<?php endforeach ?>





    <li> &nbsp; &nbsp;<strong>       LOS CERTIFICADOS DE SEGUROS DEBERÁN CONSTAR DE LO SIGUIENTE: </strong></li>


<br>


</div>
<!----Fin datos de Contacto----->

<p class="small">
La póliza tendrá la siguiente estructura: Tomador: CORPORACIÓN DE CIENCIA Y TECNOLOGÍA PARA EL
DESARROLLO DE LA INDUSTRIA NAVAL, MARÍTIMA Y FLUVIAL “COTECMAR” Asegurado: Proveedor o
contratista y CORPORACIÓN DE CIENCIA Y TECNOLOGÍA PARA EL DESARROLLO DE LA INDUSTRIA
NAVAL, MARÍTIMA Y FLUVIAL “COTECMAR” Beneficiario: Póliza de Cumplimiento: COTECMAR; Póliza de
RCE: Terceros afectados; la Vigencia deberá comprender el término de duración del contrato y/u orden de
compra y sus prórrogas.
</p>
<p class="small">
PARÁGRAFO:
</p>
<p class="small">
1. El pago de la prima que se cause con ocasión de la garantía o seguro respectivo, correrá por cuenta del
Contratista y/o Proveedor así como la que se cause por las modificaciones del contrato y/u orden de compra a
que haya lugar. Cuando haya modificación del plazo, o del valor del contrato, el Contratista y/o Proveedor deberá
acogerse a la modificación de la garantía o seguro para conservar el monto porcentual y la vigencia aquí
pactada; En todos los casos el contratista deberá adjuntar original del recibo de pago de las correspondientes
primas cuando se trate de póliza de seguros. 

</p>
<p class="small">
2. La Aseguradora solo procederá a emitir el certificado de la póliza previo pago de la prima que se haya
liquidado por ése concepto por parte del contratista y/o proveedor, de manera que, la garantía solo tendrá
efectos de cobertura a partir del evento antes señalado.

</p>
<p class="small">
3. El Contratista y/o Proveedor se obliga a constituir y entregar los originales de las pólizas a la CORPORACIÓN
DE CIENCIA Y TECNOLOGÍA PARA EL DESARROLLO DE LA INDUSTRIA NAVAL, MARÍTIMA Y FLUVIAL
“COTECMAR” dentro de los ocho (08) días siguientes a la fecha de suscripción del contrato o recepción de la
orden compra, junto con el recibo de pago de las primas correspondientes. 
</p>
<p class="small">II.
4. Queda entendido y acordado por las partes que ni los límites mínimos de las pólizas de seguros con las que
debe contar el Contratista y/o Proveedor de conformidad con esta cláusula, ni los valores reales de los seguros,
deberán de ninguna manera limitar o reducir la responsabilidad del Contratista y/o Proveedor o sus obligaciones;
adicional todo deducible originado por las pólizas de seguros serán asumido en su totalidad por el Contratista
y/o Proveedor. 
<br>
<div style="page-break-after:always;"></div>
</p>
<!--- caja para Items II y tabla---->

<div> <strong class="title"> II. AMPAROS A CONSTITUIR POR PARTE DEL CONTRATISTA O PROVEEDOR SEGÚN APLIQUE EN EL
CONTRATO U ORDEN DE COMPRA:</strong>

<br>
@if($Condicion1>0)
<li>&nbsp; <span  class="title">AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO:</span>  </li>

<br>
<table border="1">

<thead>
<tr>
            <th  class="small2"  >   <p class="small2" ><u>CLASE DE RIESGO </u> </p> </th>
            <th class="small2"  > <p class="small2" > <u>PORCENTAJE(%)</u></p> </th>
            <th  class="small2" ><p class="small2"> <u>VALOR ASEGURADO</u></p> </th>
            <th  class="small2" ><p class="small2" ><u>VIGENCIA</u></p>  </th>
        

        </tr>
</thead>
          <tbody>
          <?php   foreach ($datos3 as $id => $dato):?>
                    @if($dato['tipo_de_poliza'] == 'AMPAROS DE LA PÓLIZA DE CUMPLIMIENTO') 
                  <tr>
                    <th >
                        <p class="small3">
                        <u>
                        {{$dato['clase_de_riesgo']}}
                        </u>
                        </p>
                    </th>
                      <th >
                      <p class="small3">
                      <u>
                      {{$dato['porcentaje_amparo']}}
                      </u>
                      </p>
                      </th>
                   
                        <th >
                        <p class="small3">
                        <u>
                        
                        {{ 
                            
                            
                            
                            number_format(   $dato['valor_asegurado'] , 2, ',', '.') }}
                       
                 
                        </u>
                        </p>
                        </th>

                        
                        <th>
                        <p class="small3">  
                        {{$dato['vigencia']}}
                        </p>
                          </th>
                       
                          @endif
                          
                              </tr>


                              <?php endforeach ?>
                
                </tbody>
               
    </table>
 
    <br>

    @endif
    </div>
  
    <!---fin de caja-->
   
   <div>
   @if($Condicion2>0)
    <li>   <span class="title" >AMPAROS DE LA PÓLIZA DE RESPONSABILIDAD CIVIL EXTRACONTRACTUAL:</span>     </li>
    <p class="small">
    <br>

    Póliza de Responsabilidad Civil Extracontractual, la cual deberá amparar los perjuicios Patrimoniales y extra-
patrimoniales incluido el lucro cesante, reclamados por terceros afectados, como consecuencia de los daños
causados por el Contratista y/o Proveedor en virtud de la ejecución del contrato y/u orden de compra suscrito
con COTECMAR. La póliza que deberá contener los siguientes amparos básicos: Predios, Labores y
Operaciones el cual tendrá un límite asegurado del 100% de lo exigido para esta póliza, amparo de
Contaminación accidental, súbita e imprevista; y como amparos adicionales las siguientes coberturas: a) Bienes
bajo cuidado, tenencia y control, b) Contratistas y/o subcontratistas c) arrendadores, poseedores y
arrendatarios, ) Escoltas y/o personal de seguridad, d) Parqueaderos, e) Productos, f) R.C. cruzada, g) R.C.
Patronal, h) Vehículos propios y no propios. Contará también con el amparo de Gastos médicos con un sub-
límite de $5.000.000 por evento y $20.000.000 por vigencia, el cual no tendrá aplicación de deducible.
<br>
<table border="1">
<thead>
<tr>
<th class="small2" >   <p class="small2"><u>CLASE DE RIESGO </u> </p> </th>
            <th class="small2"> <p class="small2"> <u>PORCENTAJE(%)</u></p> </th>
            <th  class="small2" ><p class="small2"> <u>VALOR ASEGURADO</u></p> </th>
            <th  class="small2" ><p class="small2"><u>VIGENCIA</u></p>  </th>
        </tr>
                    </thead>
        <tbody>
        <?php
               
                  
                    
                  
               foreach ($datos3 as $id => $dato):?>
                @if($dato['tipo_de_poliza'] == 'RESPONSABILIDAD CIVIL EXTRACONTRACTUAL') 
                  <tr>
                   
                 
                    <th >
                        <p class="small3">
                        <u>
                        {{$dato['clase_de_riesgo']}}
                        </u>
                        </p>
                   
                    </th>
                      <th  >
                      <p class="small3">
                      <u>
                      {{$dato['porcentaje_amparo']}}
                      </u>
                      </p>
                      </th>
                   
                        <th  >
                        <p class="small3">
                        <u>

                        {{  number_format( $dato['valor_asegurado']   , 2, ',', '.')}}
                 
                        </u>
                        </p>
                        </th>

                        
                        <th>
                        <p class="small3">  
                        {{$dato['vigencia']}}
                        </p>
                          </th>
                          @endif

                            
               </tr>
               <?php endforeach ?>    
                 
                </tbody>
        
    
    </table>
   
    <br>
</p>
<li> &nbsp;  <p class="small">En caso que el contratista o proveedor tenga una póliza de RESPONSABILIDAD CIVIL
EXTRACONTRACTUAL anualizada antes de la fecha de expedición de la resolución de implementación
del SARIC por parte de COTECMAR, podrá aportarla para cubrir la solicitud de éste seguro. Sin embargo,
al llegar la fecha de su vencimiento, no podrá renovarla automáticamente, sino que la misma tendrá que
tramitarla con la Aseguradora que está implementando el SARIC.
</p> </li>
<br>
@endif
</div>









<div>
@if($Condicion3>0)
<strong class="title">
        III. CONDICIONES DE LAS PÓLIZAS QUE DEBEN SER INCLUIDAS EN LOS PROCESOS DE SELECCIÓN
        DE CONTRATISTAS O PROVEEDORES (Cuando aplique):</strong>
        
        <br>

        <table border="1">
        <thead>
        <tr>
        <th class="small2" > <p class="small2"><u>CLASE DE RIESGO </u> </p> </th>
            <th class="small2" > <p class="small2"> <u>PORCENTAJE(%)</u></p> </th>
            <th class="small2" ><p class="small2"> <u>VALOR ASEGURADO</u></p> </th>
            <th class="small2" ><p class="small2"><u>VIGENCIA</u></p>  </th>
 
        </tr>
                    </thead>
        
        <tbody>
        <?php
                 
                  
                    
                  
                 foreach ($datos3 as $id => $dato):?>
                    @if($dato['tipo_de_poliza'] == 'SERIEDAD DE OFERTA') 
                  <tr>
                 
                   
                    <th  style="text-align: center;">
                        <p class="small3">
                        <u>
                        {{$dato['clase_de_riesgo']}}
                        </u>
                        </p>
                   
                    </th>
                      <th  style="text-align: center;">
                      <p class="small3">
                      <u>
                      {{$dato['porcentaje_amparo']}}
                      </u>
                      </p>
                      </th>
                   
                        <th  style="text-align: center;">
                        <p class="small3">
                        <u>

                        
                        {{
                             number_format( $dato['valor_asegurado']
                             , 2, ',', '.')
                            }}
                 
                        </u>
                        </p>
                        </th>

                        
                        <th style="text-align: justify-center;">
                        <p class="small3">  
                        {{$dato['vigencia']}}
                        </p>
                          </th>
                       

                           
                 </tr>
                 @endif
                 <?php endforeach ?>
                </tbody>
    </table>
    @endif
    </div>


    <br>

    <div class="notas_generales" >
    <h5 class="title">NOTAS GENERALES:</h5>
   
             -Para la expedición del certificado de seguros, la aseguradora solicitara información adicional que el oferente
deberá suministrar. <br>
-Para facilitar el proceso, el oferente podrá contactar al área designada por la CORPORACIÓN DE CIENCIA
Y TECNOLOGÍA PARA EL DESARROLLO DE LA INDUSTRIA NAVAL, MARÍTIMA Y FLUVIAL “COTECMAR”. <br>
 -Es de obligatorio cumplimiento la presentación del recibo de pago de las pólizas por parte del contratista.

</div>
 
<br>


    </div>
</body>
</html>