<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

<link rel='stylesheet prefetch' href='http://cdnjs.cloudflare.com/ajax/libs/jquery.nanoscroller/0.8.7/css/nanoscroller.min.css'>
<link rel="stylesheet" href="css/style1.css">
<link rel="stylesheet" href="css/style2.css">
<script>
    $("div.oculto2").slideToggle("fast");
    $("div.oculto3").slideToggle("fast");
</script>
<div class="oculto2">
    <br>
    <div class="group">
        <input class="datos" type="text" id="nombre" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Nombre</label>
    </div>
    
    <div class="group">
        <input class="datos" type="text" id="app" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Ap.Paterno</label>
    </div>
    <p>Día:
    <select class="dia">
              <option value="0" selected="selected">Selección</option>
              <option value="Lunes">Lunes</option>
              <option value="Martes">Martes</option>
              <option value="Miércoles">Miércoles</option>
              <option value="Jueves">Jueves</option>
              <option value="Viernes">Viernes</option>
        </select></p>
    <br>
    <p>Hora Inicio:
    <select class="inicio">
              <option value="0" selected="selected">Selección</option>
              <option value="7:00">7:00</option>
              <option value="8:00">8:00</option>
              <option value="9:00">9:00</option>
              <option value="10:00">10:00</option>
              <option value="11:00">11:00</option>
              <option value="12:00">12:00</option>
              <option value="13:00">13:00</option>
              <option value="14:00">14:00</option>
              <option value="15:00">15:00</option>
              <option value="16:00">16:00</option>
              <option value="17:00">17:00</option>
              <option value="18:00">18:00</option>
              <option value="19:00">19:00</option>
              <option value="20:00">20:00</option>
              <option value="21:00">21:00</option>
              <option value="22:00">22:00</option>
        </select></p>
    <br><br>
    <p>Hora Fin:
    <select class="fin">
        <option value="0" selected="selected">Selección</option>
              <option value="7:00">7:00</option>
              <option value="8:00">8:00</option>
              <option value="9:00">9:00</option>
              <option value="10:00">10:00</option>
              <option value="11:00">11:00</option>
              <option value="12:00">12:00</option>
              <option value="13:00">13:00</option>
              <option value="14:00">14:00</option>
              <option value="15:00">15:00</option>
              <option value="16:00">16:00</option>
              <option value="17:00">17:00</option>
              <option value="18:00">18:00</option>
              <option value="19:00">19:00</option>
              <option value="20:00">20:00</option>
              <option value="21:00">21:00</option>
              <option value="22:00">22:00</option>
        </select></p>
    
        <br>
    <input type="submit" id="agregar2" class="agregar2" value="Agregar" size="10">
</div>
<div class="oculto3">
    <br>
    <div class="group">
        <input class="datos" type="text" id="nombre1" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Nombre</label>
    </div>
    
    <div class="group">
        <input class="datos" type="text" id="app1" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Ap.Paterno</label>
    </div>
    <p>Día:
    <select class="dia1">
              <option value="0" selected="selected">Selección</option>
              <option value="Lunes">Lunes</option>
              <option value="Martes">Martes</option>
              <option value="Miércoles">Miércoles</option>
              <option value="Jueves">Jueves</option>
              <option value="Viernes">Viernes</option>
        </select></p>
    <br>
    <input type="submit" id="agregar3" class="agregar3" value="Borrar" size="10">
</div>
    <input type="submit" name="enviar" value="Borrar Horario" class="blo1">

    <input type="submit" name="enviar" value="Agregar Horario" class="blo">


<?php
    echo "<h1>Horarios de Bloqueo</h1>";


$user     = 'root';
$password = 'root';
$db       = 'proyecto';
$host     = 'localhost';
$port     = 3306;


//Abre la base de datos e inicia sesion.
$link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
mysqli_select_db($link, $db) or die("No selecciono base de datos");
$query = "SELECT nombre, dia, hora_inicio, hora_fin from empleado right join hora_bloqueos using(id_empleado) where dia='Lunes' order by hora_inicio";

$result = mysqli_query($link, $query) or die("Query 1 failed");

 echo "
 <div id='caja'>
  <div class='wrap-schedule'>
  
  <div class='body-schedule'>
    <div class='wrapper'>
      <div class='prev-week'>
        <div class='wrap-day'>
          <div class='header-day'>
            Lunes
          </div>
       <div class='body-day'>";

    $x=7;
    $nombre=array();
    $hora_inicio=array();
    $hora_fin=array();

      while ($registro = mysqli_fetch_array($result)) {
         array_push($nombre,$registro['nombre']);
         array_push($hora_inicio,$registro['hora_inicio']);
         array_push($hora_fin,$registro['hora_fin']);
      }
     $y=count($nombre);
     $z=0;
    while($x<23){
        while($z<$y){
           $otro=$z+1;
            if($x==(int)$hora_inicio[$z] and $x==(int)$hora_inicio[$otro]){
                echo "<div  class='wrap-hour event'>
                <div class='inner-event'>
                <span class='title-event'>".$nombre[$z]." y "."$nombre[$otro]"."</span>
              <span class='time'>".$hora_inicio[$z].":00</span>
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
                            <span class='title-event'>".$nombre[$z]." y "."$nombre[$otro]"."</span>
                            <span class='time'>".$x.":00</span>
                            </div>
                            </div>";
                    }else{
                        echo "<div  class='wrap-hour event'>
                            <div class='inner-event'>
                            <span class='title-event'>".$nombre[$z]."</span>
                            <span class='time'>".$x.":00</span>
                            </div>
                            </div>";
                    }
             }
            }else if($x==(int)$hora_inicio[$z]){
                echo "<div  class='wrap-hour event'>
                <div class='inner-event'>
                <span class='title-event'>".$nombre[$z]."</span>
              <span class='time'>".$hora_inicio[$z].":00</span>
              </div>
            </div>";
                $resultado=(int)$hora_fin[$z]-(int)$hora_inicio[$z];
                $total=$x+$resultado;
                for($x=$x+1;$x<$total;$x++){
                    echo "<div  class='wrap-hour event'>
                <div class='inner-event'>
                <span class='title-event'>".$nombre[$z]."</span>
              <span class='time'>".$x.":00</span>
              </div>
            </div>";
             }
            }
            $z++;
        }
        $z=0;
               echo "<div class='wrap-hour'>
              <span class='time'>".$x.":00</span>
            </div>";
        $x++;
      }
echo "</div></div>
    <div class='wrap-day'>
          <div class='header-day'>
            Martes
          </div>
       <div class='body-day'>";
 $query = "SELECT nombre, dia, hora_inicio, hora_fin from empleado right join hora_bloqueos using(id_empleado) where dia='Martes' order by hora_inicio";

$result = mysqli_query($link, $query) or die("Query 1 failed");
$x=7;
    $nombre=array();
    $hora_inicio=array();
    $hora_fin=array();

      while ($registro = mysqli_fetch_array($result)) {
         array_push($nombre,$registro['nombre']);
         array_push($hora_inicio,$registro['hora_inicio']);
         array_push($hora_fin,$registro['hora_fin']);
      }
     $y=count($nombre);
     $z=0;
    while($x<23){
        while($z<$y){
            $otro=$z+1;
            if($x==(int)$hora_inicio[$z] and $x==(int)$hora_inicio[$otro]){
                echo "<div  class='wrap-hour event'>
                <div class='inner-event'>
                <span class='title-event'>".$nombre[$z]." y "."$nombre[$otro]"."</span>
              <span class='time'>".$hora_inicio[$z].":00</span>
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
                            <span class='title-event'>".$nombre[$z]." y "."$nombre[$otro]"."</span>
                            <span class='time'>".$x.":00</span>
                            </div>
                            </div>";
                    }else{
                        echo "<div  class='wrap-hour event'>
                            <div class='inner-event'>
                            <span class='title-event'>".$nombre[$z]."</span>
                            <span class='time'>".$x.":00</span>
                            </div>
                            </div>";
                    }
             }
            }else if($x==(int)$hora_inicio[$z]){
                echo "<div  class='wrap-hour event'>
                <div class='inner-event'>
                <span class='title-event'>".$nombre[$z]."</span>
              <span class='time'>".$hora_inicio[$z].":00</span>
              </div>
            </div>";
                $resultado=(int)$hora_fin[$z]-(int)$hora_inicio[$z];
                $total=$x+$resultado;
                for($x=$x+1;$x<$total;$x++){
                    echo "<div  class='wrap-hour event'>
                <div class='inner-event'>
                <span class='title-event'>".$nombre[$z]."</span>
              <span class='time'>".$x.":00</span>
              </div>
            </div>";
             }
            }
            $z++;
        }
        $z=0;
               echo "<div class='wrap-hour'>
              <span class='time'>".$x.":00</span>
            </div>";
        $x++;
      }
echo "</div></div>
    <div class='wrap-day'>
          <div class='header-day'>
            Miércoles
          </div>
       <div class='body-day'>";
 $query = "SELECT nombre, dia, hora_inicio, hora_fin from empleado right join hora_bloqueos using(id_empleado) where dia='Miércoles' order by hora_inicio";

$result = mysqli_query($link, $query) or die("Query 1 failed");
$x=7;
    $nombre=array();
    $hora_inicio=array();
    $hora_fin=array();

      while ($registro = mysqli_fetch_array($result)) {
         array_push($nombre,$registro['nombre']);
         array_push($hora_inicio,$registro['hora_inicio']);
         array_push($hora_fin,$registro['hora_fin']);
      }
     $y=count($nombre);
     $z=0;
    while($x<23){
        while($z<$y){
            $otro=$z+1;
            if($x==(int)$hora_inicio[$z] and $x==(int)$hora_inicio[$otro]){
                echo "<div  class='wrap-hour event'>
                <div class='inner-event'>
                <span class='title-event'>".$nombre[$z]." y "."$nombre[$otro]"."</span>
              <span class='time'>".$hora_inicio[$z].":00</span>
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
                            <span class='title-event'>".$nombre[$z]." y "."$nombre[$otro]"."</span>
                            <span class='time'>".$x.":00</span>
                            </div>
                            </div>";
                    }else{
                        echo "<div  class='wrap-hour event'>
                            <div class='inner-event'>
                            <span class='title-event'>".$nombre[$z]."</span>
                            <span class='time'>".$x.":00</span>
                            </div>
                            </div>";
                    }
             }
            }else if($x==(int)$hora_inicio[$z]){
                echo "<div  class='wrap-hour event'>
                <div class='inner-event'>
                <span class='title-event'>".$nombre[$z]."</span>
              <span class='time'>".$hora_inicio[$z].":00</span>
              </div>
            </div>";
                $resultado=(int)$hora_fin[$z]-(int)$hora_inicio[$z];
                $total=$x+$resultado;
                for($x=$x+1;$x<$total;$x++){
                    echo "<div  class='wrap-hour event'>
                <div class='inner-event'>
                <span class='title-event'>".$nombre[$z]."</span>
              <span class='time'>".$x.":00</span>
              </div>
            </div>";
             }
            }
            $z++;
        }
        $z=0;
               echo "<div class='wrap-hour'>
              <span class='time'>".$x.":00</span>
            </div>";
        $x++;
      }
    echo "</div></div>
    <div class='wrap-day'>
          <div class='header-day'>
            Jueves
          </div>
       <div class='body-day'>";
 $query = "SELECT nombre, dia, hora_inicio, hora_fin from empleado right join hora_bloqueos using(id_empleado) where dia='Jueves' order by hora_inicio";

$result = mysqli_query($link, $query) or die("Query 1 failed");
$x=7;
    $nombre=array();
    $hora_inicio=array();
    $hora_fin=array();

      while ($registro = mysqli_fetch_array($result)) {
         array_push($nombre,$registro['nombre']);
         array_push($hora_inicio,$registro['hora_inicio']);
         array_push($hora_fin,$registro['hora_fin']);
      }
     $y=count($nombre);
     $z=0;
    while($x<23){
        while($z<$y){
            $otro=$z+1;
            if($x==(int)$hora_inicio[$z] and $x==(int)$hora_inicio[$otro]){
                echo "<div  class='wrap-hour event'>
                <div class='inner-event'>
                <span class='title-event'>".$nombre[$z]." y "."$nombre[$otro]"."</span>
              <span class='time'>".$hora_inicio[$z].":00</span>
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
                            <span class='title-event'>".$nombre[$z]." y "."$nombre[$otro]"."</span>
                            <span class='time'>".$x.":00</span>
                            </div>
                            </div>";
                    }else{
                        echo "<div  class='wrap-hour event'>
                            <div class='inner-event'>
                            <span class='title-event'>".$nombre[$z]."</span>
                            <span class='time'>".$x.":00</span>
                            </div>
                            </div>";
                    }
             }
            }else if($x==(int)$hora_inicio[$z]){
                echo "<div  class='wrap-hour event'>
                <div class='inner-event'>
                <span class='title-event'>".$nombre[$z]."</span>
              <span class='time'>".$hora_inicio[$z].":00</span>
              </div>
            </div>";
                $resultado=(int)$hora_fin[$z]-(int)$hora_inicio[$z];
                $total=$x+$resultado;
                for($x=$x+1;$x<$total;$x++){
                    echo "<div  class='wrap-hour event'>
                <div class='inner-event'>
                <span class='title-event'>".$nombre[$z]."</span>
              <span class='time'>".$x.":00</span>
              </div>
            </div>";
             }
            }
            $z++;
        }
        $z=0;
               echo "<div class='wrap-hour'>
              <span class='time'>".$x.":00</span>
            </div>";
        $x++;
      }
     echo "</div></div>
    <div class='wrap-day'>
          <div class='header-day'>
            Viernes
          </div>
       <div class='body-day'>";
 $query = "SELECT nombre, dia, hora_inicio, hora_fin from empleado right join hora_bloqueos using(id_empleado) where dia='Viernes' order by hora_inicio";

$result = mysqli_query($link, $query) or die("Query 1 failed");
$x=7;
    $nombre=array();
    $hora_inicio=array();
    $hora_fin=array();

      while ($registro = mysqli_fetch_array($result)) {
         array_push($nombre,$registro['nombre']);
         array_push($hora_inicio,$registro['hora_inicio']);
         array_push($hora_fin,$registro['hora_fin']);
      }
     $y=count($nombre);
     $z=0;
    while($x<23){
        while($z<$y){
            $otro=$z+1;
            if($x==(int)$hora_inicio[$z] and $x==(int)$hora_inicio[$otro]){
                echo "<div  class='wrap-hour event'>
                <div class='inner-event'>
                <span class='title-event'>".$nombre[$z]." y "."$nombre[$otro]"."</span>
              <span class='time'>".$hora_inicio[$z].":00</span>
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
                            <span class='title-event'>".$nombre[$z]." y "."$nombre[$otro]"."</span>
                            <span class='time'>".$x.":00</span>
                            </div>
                            </div>";
                    }else{
                        echo "<div  class='wrap-hour event'>
                            <div class='inner-event'>
                            <span class='title-event'>".$nombre[$z]."</span>
                            <span class='time'>".$x.":00</span>
                            </div>
                            </div>";
                    }
             }
            }else if($x==(int)$hora_inicio[$z]){
                echo "<div  class='wrap-hour event'>
                <div class='inner-event'>
                <span class='title-event'>".$nombre[$z]."</span>
              <span class='time'>".$hora_inicio[$z].":00</span>
              </div>
            </div>";
                $resultado=(int)$hora_fin[$z]-(int)$hora_inicio[$z];
                $total=$x+$resultado;
                for($x=$x+1;$x<$total;$x++){
                    echo "<div  class='wrap-hour event'>
                <div class='inner-event'>
                <span class='title-event'>".$nombre[$z]."</span>
              <span class='time'>".$x.":00</span>
              </div>
            </div>";
             }
            }
            $z++;
        }
        $z=0;
               echo "<div class='wrap-hour'>
              <span class='time'>".$x.":00</span>
            </div>";
        $x++;
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

