<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.nanoscroller/0.8.7/css/nanoscroller.min.css'>
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="css/style2.css">
<style>
.wrap-schedule .body-schedule .wrapper .wrap-day .body-day .wrap-hour.event .inner-event {
  height: 100%;
  text-align: left;
  padding: 0.35em 0.75em 0.35em 1em;
  border-left: 5px solid orange;
}
.time1{
    visibility: hidden;
}
h1 {
    font-size: 3em;
    margin: .67em 0;
}
</style>
<script>
    $('select#empleado').on('change',function(){
        var valor = $(this).val();
        $.post("semana_u.php", {id: valor}, function(htmlexterno){
            $("#area").html(htmlexterno);
        }); 
    });
</script>
<label class="lempleado" for="empleado">Empleado:</label>
        <select class="selectempleado"cname="empleado" id="empleado">
            <?php
            $user     = 'root';
            $password = 'root';
            $db       = 'proyecto';
            $host     = 'localhost';
            $port     = 3306;


            //Abre la base de datos e inicia sesion.
            $link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
            mysqli_select_db($link, $db) or die("No selecciono base de datos");

               //Abre la base de datos e inicia sesion.
               $query = "SELECT id_empleado, nombre,ap_paterno,ap_materno FROM empleado ORDER BY nombre ASC";
               $result = mysqli_query($link, $query) or die("Query 1 failed");
               
               while ($registro = mysqli_fetch_array($result)) {
                   
                   if($registro['id_empleado']=='0'){
                       
                       echo "<option selected value=".$registro['id_empleado'].">".$registro['nombre']." ".$registro['ap_paterno']." ".$registro['ap_materno']."</option>";
                   }//if
                   
                   else{
                        echo "<option  value=".$registro['id_empleado'].">".$registro['nombre']." ".$registro['ap_paterno']." ".$registro['ap_materno']."</option>";   
                   }//else
               }//while  
             echo "<option selected value='0'>General</option>";   
            ?>
        </select>
<?php

    echo "<h1>Semana Actual</h1>";
$user     = 'root';
$password = 'root';
$db       = 'proyecto';
$host     = 'localhost';
$port     = 3306;


//Abre la base de datos e inicia sesion.
$link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
mysqli_select_db($link, $db) or die("No selecciono base de datos");

    $weekNum = date("W") - date("W",strtotime(date("Y-m-01")))+1;
    $mes=date("F");
    if ($mes=="January") $mes="Enero";
    if ($mes=="February") $mes="Febrero";
    if ($mes=="March") $mes="Marzo";
    if ($mes=="April") $mes="Abril";
    if ($mes=="May") $mes="Mayo";
    if ($mes=="June") $mes="Junio";
    if ($mes=="July") $mes="Julio";
    if ($mes=="August") $mes="Agosto";
    if ($mes=="September") $mes="Setiembre";
    if ($mes=="October") $mes="Octubre";
    if ($mes=="November") $mes="Noviembre";
    if ($mes=="December") $mes="Diciembre";
    
    $query="select id_mes from meses where mes ='$mes' and semana='$weekNum'";
    $result = mysqli_query($link, $query) or die("Query 1 failed");
    while ($registro = mysqli_fetch_array($result)) {
        $mes=$registro['id_mes'];
     }

echo "
 <div id='caja1'>
  <div class='wrap-schedule'>
  
  <div class='body-schedule'>
    <div class='wrapper'>
      <div class='prev-week'>
        <div class='wrap-day'>
          <div class='header-day'>
            Hora
          </div>
       <div class='body-day'>";
$x=7;
while($x<23){
    echo "<div class='wrap-hour'>
              <span class='time'>".$x.":00</span>
            </div>";
        $x++;
}
$query="select fecha from actividad right join actividades using(clavetipoactividad) right join meses using(id_mes)
right join dirigido using(clavedirigido) right join empleado as a using(id_empleado) right join 
empleado as ad using(id_empleado) right join empleado as e using(id_empleado) right join 
prioridades using(id_prio) right join colegios using(id_colegios) right join grado 
using(id_grado) right join alimento using(clavealimento) where id_mes = $mes order by fecha asc";
$result = mysqli_query($link, $query) or die("Query 0 failed");
$fechao=array();
while ($registro = mysqli_fetch_array($result)) {
    array_push($fechao,$registro['fecha']);
}

$cont=0;
$dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sábado');
$numf=count($fechao);
$xf=0;
$yf=0;
while($cont<6){
    $tiempo= "$fechao[$xf]";
    $tiempo=explode("/",$tiempo);
    $time=sprintf("%s-%s-%s",$tiempo[2],$tiempo[1],$tiempo[0]);
    $num=date('N', strtotime($time))-1;
    if($num==$cont){
        $fecha = $dias[$num];
        $query = "select id_actividad,coloractividad,nombreactividad, mes, fecha, fecha_fin, hora_ini, hora_fin, nombredirigo, a.nombre, ad.nombre, e.nombre, prioridad,titulo_platica,colegio,grado,num,expositor_1,expositor_2,turno,tipo_alimento,transporte,tag_numero,notas_transporte,apoyo,
    notas from actividad right join actividades using(clavetipoactividad) right join meses using(id_mes)
    right join dirigido using(clavedirigido) right join empleado as a using(id_empleado) right join 
    empleado as ad using(id_empleado) right join empleado as e using(id_empleado) right join 
    prioridades using(id_prio) right join colegios using(id_colegios) right join grado 
    using(id_grado) right join alimento using(clavealimento) where id_mes = $mes and fecha ='$fechao[$xf]' order by fecha asc";
        $result = mysqli_query($link, $query) or die("Query 1 failed");
         $x=7;
        $actividad=array();
        $fechai=array();
        $hora_inicio=array();
        $hora_fin=array();
        $id=array();
        $color=array();
        while ($registro = mysqli_fetch_array($result)) {
             array_push($actividad,$registro['nombreactividad']);
             array_push($hora_inicio,$registro['hora_ini']);
             array_push($hora_fin,$registro['hora_fin']);
             array_push($fechai,$registro['fecha']);
             array_push($color,$registro['coloractividad']);
             array_push($id,$registro['id_actividad']);
             $yf++;
          }
         echo "
            </div></div>
            <div class='wrap-day'>
              <div class='header-day'>
                $fecha $fechao[$xf]
              </div>
           <div class='body-day'>";
         $y=count($actividad);
         $z=0;
        while($x<23){
            while($z<$y){
               $otro=$z+1;
                if($x==(int)$hora_inicio[$z] and $x==(int)$hora_inicio[$otro]){
                    echo "<div  class='wrap-hour event'>
                    <div class='inner-event'>
                    <span class='title-event'>".$actividad[$z]." y "."$actividad[$otro]"."</span>
                  <span class='time1'>".$id[$z]."</span>
                  </div>
                </div>";
                    $resultado=(int)$hora_fin[$z]-(int)$hora_inicio[$z];
                    $total=$x+$resultado;
                    $resultado1=(int)$hora_fin[$otro]-(int)$hora_inicio[$otro];
                    $total1=$x+$resultado1;
                    for($x=$x+1;$x<$total;$x++){
                        if($x<$total1){
                            echo "<div  class='wrap-hour event'>
                                <div class='inner-event'>
                                <span class='title-event'>".$actividad[$z]." y "."$actividad[$otro]"."</span>
                                <span class='time1'>".$id[$z]."</span>
                                </div>
                                </div>";
                        }else{
                            echo "<div  class='wrap-hour event'>
                                <div class='inner-event'>
                                <span class='title-event'>".$actividad[$z]."</span>
                                <span class='time1'>".$id[$z]."</span>
                                </div>
                                </div>";
                        }
                 }
                }else if($x==(int)$hora_inicio[$z]){
                    echo "<div  class='wrap-hour event'>
                    <div class='inner-event'>
                    <span class='title-event'>".$actividad[$z]."</span>
                  <span class='time1'>".$id[$z]."</span>
                  </div>
                </div>";
                    $resultado=(int)$hora_fin[$z]-(int)$hora_inicio[$z];
                    $total=$x+$resultado;
                    for($x=$x+1;$x<$total;$x++){
                        echo "<div  class='wrap-hour event'>
                    <div class='inner-event'>
                    <span class='title-event'>".$actividad[$z]."</span>
                  <span class='time1'>".$id[$z]."</span>
                  </div>
                </div>";
                 }
                }
                $z++;
            }
            $z=0;
                   echo "<div class='wrap-hour'>
                  <span class='time'></span>
                </div>";
            $x++;
          }
    }else{
        $fecha = $dias[$cont];
        echo "
            </div></div>
            <div class='wrap-day'>
              <div class='header-day'>
                $fecha
              </div>
           <div class='body-day'>";
        $x=7;
        while($x<23){
            echo "<div class='wrap-hour'>
              <span class='time'></span>
            </div>";
            $x++;
        }
    }
    $xf=$yf;
    $cont++;
}
 echo "  </div>
            </div>
         </div>
       </div>
     </div>
   </div>
 </div> ";
mysqli_close($link);
?> 
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery.nanoscroller/0.8.7/javascripts/jquery.nanoscroller.min.js'></script>