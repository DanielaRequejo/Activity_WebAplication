
<?php
//Variables que almacenan los datos para poder ingresar a la base de datos.
   $user     = 'root';
   $password = 'root';
   $db       = 'proyecto';
   $host     = 'localhost';
   $port     = 3306;
   $link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
       mysqli_select_db($link, $db) or die("No selecciono base de datos");
   
?>
<link rel='stylesheet prefetch' href='http://bradfrost.github.com/this-is-responsive/styles.css'/>
<style>
    h1 {
    font-size: 3em;
    margin: .67em 0;
}
    
.list li {
  display: table;
  border-collapse: collapse;
  width: 100%;
}
.inner {
  display: table-row;
  overflow: hidden;
}
.li-img {
  display: table-cell;
  vertical-align: middle;
  width: 40%;
  padding-right: 1em;
}
.li-img img {
  display: block;
  width: 100%;
  height: auto;
}
.li-text {
  display: table-cell;
  vertical-align: middle;
  width: 60%;
}
.li-head {
  margin: 0;
}
.li-sub {
  margin: 0;
}
a:hover, a:focus {
    color: rgba(217, 48, 48, 1);
}

@media all and (min-width: 40em) {
  .list {
    padding: 0.5em;
    max-width: 70em;
    margin: 0 auto;
    overflow: hidden;
  }
  .list li {
    padding: 0.5em;
    display: block;
    width: 50%;
    float: left;
    background: none;
    border: 0;
  }
  .inner {
    display: block;
  }
  .li-img, .li-text, .inner {
    display: block;
    width: auto;
    padding: 0;
  }
  .li-text {
    padding: 0.5em 0;
  }
}

@media all and (min-width: 60em) {
  .list li {
    width: 33.33333333%;
  }
}

</style>

<!--Pattern HTML-->
  	<ul class="list img-list">
    <?php
         echo "<h1>Reembolso de Comida</h1>";
               //Abre la base de datos e inicia sesion.
               $query = "SELECT id_actividad,clavealimento,fecha,fecha_fin,nombre, ap_paterno, id_empleado FROM proyecto.actividad left join proyecto.empleado  using(id_empleado) where regreso=1";
                
                
               $result = mysqli_query($link, $query) or die("Query 1 failed");
               
               while ($registro = mysqli_fetch_array($result)) {
                       if($registro['clavealimento']==1){

                           echo "<li>
                    <a href='#' class='inner'>
                        <div class='li-img'>
                            <img src='img/desayuno.jpg' alt='Desayuno' />
                        </div>
                        <div class='li-text'>
                            <h4 id='".$registro['id_actividad']."' class='li-head'>Desayuno (".$registro['fecha']." - ".$registro['fecha_fin'].")</h4>
                            <p id='".$registro['id_actividad']."' class='li-sub'>".$registro['nombre']." ".$registro['ap_paterno']."</p>
                        </div>
                    </a>
                </li>";   
                       }//if

                       if($registro['clavealimento']==3){

                        echo "<li>
                    <a href='#' class='inner'>
                        <div class='li-img'>
                            <img src='img/cena.jpg' alt='Cena' />
                        </div>
                        <div class='li-text'>
                            <h4 id='".$registro['id_actividad']."' class='li-head'>Cena (".$registro['fecha']." - ".$registro['fecha_fin'].")</h4>
                            <p id='".$registro['id_actividad']."' class='li-sub'>".$registro['nombre']." ".$registro['ap_paterno']."</p>
                        </div>
                    </a>
                </li>";

                       }//if

                       if($registro['clavealimento']==2){

                    echo "<li><a href='#' class='inner'>
                        <div class='li-img''>
                            <img src='img/comida.jpg' alt='Comida' />
                        </div>
                        <div class='li-text'>
                            <h4 id='".$registro['id_actividad']."' class='li-head'>Comida (".$registro['fecha']." - ".$registro['fecha_fin'].")</h4>
                            <p id='".$registro['id_actividad']."' class='li-sub'>".$registro['nombre']." ".$registro['ap_paterno']."</p>
                        </div>
                    </a>
                </li>";

                       }//if

                       if($registro['clavealimento']==12){


                    echo "<li><a href='#' class='inner'>
                        <div class='li-img'>
                            <img src='img/desayuno_comida.jpg' alt='Desayuno, Comida' />
                        </div>
                        <div class='li-text'>
                            <h4 id='".$registro['id_actividad']."' class='li-head'>Desayuno, Comida (".$registro['fecha']." - ".$registro['fecha_fin'].")</h4>
                            <p id='".$registro['id_actividad']."' class='li-sub'>".$registro['nombre']." ".$registro['ap_paterno']."</p>
                        </div>
                    </a>
                </li>";

                       }//if

                       if($registro['clavealimento']==23){

                    echo "<li><a href='#' class='inner'>
                        <div class='li-img'>
                            <img src='img/comida_cena.jpg' alt='Comida, cena' />
                        </div>
                        <div class='li-text'>
                            <h4 id='".$registro['id_actividad']."' class='li-head'>Comida, Cena (".$registro['fecha']." - ".$registro['fecha_fin'].")</h4>
                            <p id='".$registro['id_actividad']."' class='li-sub'>".$registro['nombre']." ".$registro['ap_paterno']."</p>
                        </div>
                    </a>
                </li>";

                       }//if

                        if($registro['clavealimento']==123){

                          echo "<li>
                    <a href='#' class='inner'>
                        <div class='li-img'>
                            <img src='img/desayuno_comida_cena.jpg' alt='Desayuno, Comida, Cena' />
                        </div>
                        <div class='li-text'>
                            <h4 id='".$registro['id_actividad']."' class='li-head'>Desayuno,Comida, Cena (".$registro['fecha']." - ".$registro['fecha_fin'].")</h4>
                            <p id='".$registro['id_actividad']."' class='li-sub'>".$registro['nombre']." ".$registro['ap_paterno']."</p>
                        </div>
                    </a>
                </li>";
                        }//if
               }//while  
               ?>    
    </ul>
<?php
mysqli_close($link);
?>