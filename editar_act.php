    <script src="js/jquery.ui.datepicker-es.js"></script>
<?php
   //Variables que almacenan los datos para poder ingresar a la base de datos.
   $user     = 'root';
   $password = 'root';
   $db       = 'proyecto';
   $host     = 'localhost';
   $port     = 3306;
   $link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
       mysqli_select_db($link, $db) or die("No selecciono base de datos");
   
   echo "<h1>Editar Actividad</h1>";
   ?>

<!--http://codepen.io/north-of-rapture/pen/rWqega/-->

 <link rel="stylesheet" href="css/calendario_actividad_nueva.css">
    <script src="js/actividades.js"></script>
<style>
    
    .form-style-4 {
        font-family: 'Quicksand', sans-serif;
    }
    
    .form-style-4 input[type="text"], .form-style-4 input[type="number"], .form-style-4 input[type="time"]
{
    background: transparent;
    border: none;
    border-bottom: 1px dashed rgb(192, 57, 43);
    outline: none;
    padding: 0px 0px 0px 0px;
    font-family: 'Quicksand', sans-serif;
}

 .form-style-4 input[type="text"] , .form-style-4 input[type="number"], .form-style-4 input[type="time"]:focus
{
    border-bottom: 1px dashed rgb(192, 57, 43);
    font-family: 'Quicksand', sans-serif;
}

.form-style-4 input[type=submit],
.form-style-4 input[type=button]{
    background: rgb(255, 26, 26);
    border: none;
    padding: 8px 10px 8px 10px;
    border-radius: 5px;
    color: rgb(255,255, 255);
    cursor: pointer;
    font-family: 'Quicksand', sans-serif;
}

    .form-style-4 input[type=submit]:hover,
.form-style-4 input[type=button]:hover{
background: rgb(192, 57, 43);
    font-family: 'Quicksand', sans-serif;
}
    
label span {
  display: inline-block;
  position: relative;
  background-color: transparent;
  width: 20px;
  height: 20px;
  transform-origin: center;
  border: 2px solid rgb(192, 57, 43);
  border-radius: 50%;
  vertical-align: -6px;
  margin-right: 10px;
  transition: background-color 150ms 200ms, transform 350ms cubic-bezier(0.78, -1.22, 0.17, 1.89);
}
label span:before {
    content: "";
    width: 0px;
    height: 2px;
    border-radius: 20px;
    background: rgb(192, 57, 43);
    position: absolute;
    transform: rotate(45deg);
    top: 7px;
    left: 5px;
    transition: width 50ms ease 50ms;
    transform-origin: 0% 0%;
}
label span:after {
    content: "";
    width: 0;
    height: 2px;
    border-radius: 2px;
    background: rgb(192, 57, 43);
    position: absolute;
    transform: rotate(305deg);
    top: 11px;
    left: 6px;
    transition: width 50ms ease;
    transform-origin: 0% 0%;
}
label:hover span:before {
  width: 5px;
  transition: width 100ms ease;
}
label:hover span:after {
  width: 10px;
  transition: width 150ms ease 100ms;
}

input[type="checkbox"] {
  display: none;
}
input[type="checkbox"]:checked + label span {
  background-color: rgb(192, 57, 43);
  transform: scale(1.25);
}
input[type="checkbox"]:checked + label span:after {
  width: 10px;
  background: white;
  transition: width 150ms ease 100ms;
}
input[type="checkbox"]:checked + label span:before {
  width: 5px;
  background: white;
  transition: width 150ms ease 100ms;
}
input[type="checkbox"]:checked + label:hover span {
  background-color: rgb(192, 57, 43);
  transform: scale(1.25);
}
input[type="checkbox"]:checked + label:hover span:after {
  width: 10px;
  background: white;
  transition: width 150ms ease 100ms;
}
input[type="checkbox"]:checked + label:hover span:before {
  width: 5px;
  background: white;
  transition: width 150ms ease 100ms;
}
  
select{
        
        background: transparent;
    color: black;
       font-family: 'Quicksand', sans-serif;
          font-size: 18px;
}
.form {
    background: transparent;
    padding: 30px;
    margin: 50px auto;
    border-radius: 14px;
    box-shadow: 3px 2px 8px 2px rgba(179, 179, 179,.3);
    width: 1100px;
}
    
    label {
    display: inline-block;
    color: black;
    cursor: pointer;
    position: inherit;
    pointer-events: painted;
    margin-left: 10px;
}
    
    select#colegio{
        width: 400px;
    }
    .fec_fin{
     
       margin-left: -38px; 
    }
    
    .fec_cont{
       margin-left: 10px; 
    }
    
    .dirig{
        margin-left: 35px; 
    }
    
    .prioridad{
        
        margin-left: -25px;
    }
    
    .elaboro{
        margin-left: 5px;
        
    }
    
    .grado{
        
           margin-left: -148px;
    }
    
    .expositor{
        margin-left: -50px;
        
    }
    
    .tipo-plat{
        margin-left: -10px;
    }
    
    .exp_2{
        margin-left: -18px;
        
    }
    
    .transporte{
         margin-left: -20px;
    }
    
    .apoyo{
        margin-left: -65px;
    }
</style>
<?php
$id = $_POST['id'];
$id1=0;
$nombre =$_POST['nombre'];
$query="select clavetipoactividad from actividades where nombreactividad='$nombre'";
$result = mysqli_query($link, $query) or die("Query 1 failed");
while ($registro = mysqli_fetch_array($result)) {
    $id1=$registro['clavetipoactividad'];
}

?>
<div class="form">

    <div class="form-style-4 ">
       <label for="tipo-actividad">Tipo de Actividad:</label>
            <select id="tipo-actividad" name="tipo-actividad">
            <?php
               //Abre la base de datos e inicia sesion.
               $query = "SELECT clavetipoactividad, nombreactividad FROM actividades ORDER BY nombreactividad ASC";
               $result = mysqli_query($link, $query) or die("Query 1 failed");
               
               while ($registro = mysqli_fetch_array($result)) {
                 
                   if($registro['clavetipoactividad']==$id1){
                       echo "<option selected value=".$registro['clavetipoactividad'].">".$registro['nombreactividad']."</option>";   
                   }//if
                 
                   else{
                       echo "<option value=".$registro['clavetipoactividad'].">".$registro['nombreactividad']."</option>";
                  
                   }//else
                   
               }//while  
               ?>
                </select>
            <label for="clave">Clave:</label>
            <?php
                echo"<input type='text' name='clave' id='clave' readonly='readonly' value='$id1' size='2'/>";
            ?>
    </div>
    <br>
    <div class="form-style-4 ">
        <!--<label for="datepicker" class="fec_fin">Fecha de Inicio:</label>
        <?php
        /*$query = "SELECT fecha FROM actividad WHERE id_actividad=$id";
        $result = mysqli_query($link, $query) or die("Query 1 failed");
        while ($registro = mysqli_fetch_array($result)) {
            echo"<input type='text' id='datepicker' size='10' value='".$registro['fecha']."' required/>";
        }*/
        ?>-->
        <label for="hora_inicio" class="fec_cont">Hora de Inicio:</label>
        <?php
            $query = "SELECT hora_ini FROM actividad WHERE id_actividad=$id";
            $result = mysqli_query($link, $query) or die("Query 1 failed");
            while ($registro = mysqli_fetch_array($result)) {
                echo"<input name='hora_inicio' type='time' min='07:00' max='21:40' value='".$registro['hora_ini']."' id='hora_inicio' required>";
            }
        ?>
        <!--<label for="datepicker2" class="fec_cont">Fecha de Fin:</label>
        <input name="datepicker2" type="text" id="datepicker2" size="10" required>-->
        <label for="hora_fin" class="fec_cont">Hora de Fin:</label>
        <?php
            $query = "SELECT hora_fin FROM actividad WHERE id_actividad=$id";
            $result = mysqli_query($link, $query) or die("Query 1 failed");
            while ($registro = mysqli_fetch_array($result)) {
                echo"<input type='time' min='07:00' max='22:00' value='".$registro['hora_fin']."' name='hora_fin' id='hora_fin' required>";
            }
        ?>
    </div>
    <br>
    <div class="form-style-4">
        <label for="dirigido" class="dirig">Dirigido a:</label>
        <select id="dirigido" name="dirigido">
            <?php
                $query = "select clavedirigido from actividad where id_actividad=$id";
                $result = mysqli_query($link, $query) or die("Query 1 failed");
                while ($registro = mysqli_fetch_array($result)) {
                    $id2=$registro['clavedirigido'];
               }
                $query = "SELECT clavedirigido,nombredirigo FROM dirigido ORDER BY nombredirigo ASC";
                $result = mysqli_query($link, $query) or die("Query 1 failed");
                while ($registro = mysqli_fetch_array($result)) {
                   
                    if($registro['clavedirigido']==$id2){
                       echo "<option selected value=".$registro['clavedirigido'].">".$registro['nombredirigo']."</option>";   
                   }//if 
                   else{
                       echo "<option value=".$registro['clavedirigido'].">".$registro['nombredirigo']."</option>";
                   }//else
                   
               }//while  
               ?>
            </select>
        <label for="responsable_admin">Responsable (Admisión):</label>
        <?php
            $query = "SELECT puesto FROM actividad left join empleado using(id_empleado) WHERE id_actividad=$id";
            $result = mysqli_query($link, $query) or die("Query 1 failed");
            while ($registro = mysqli_fetch_array($result)) {
                echo"<input type='text' name='responsable_admin' id='responsable_admin' readonly='readonly' size='10' value='".$registro['puesto']."'/>";
            }
        ?>
        <label for="responsable-act">Responsable (Act):</label>
        <?php
            $query = "SELECT nombre FROM actividad left join empleado using(id_empleadoa) WHERE id_actividad=$id";
            $result = mysqli_query($link, $query) or die("Query 1 failed");
            while ($registro = mysqli_fetch_array($result)) {
                echo"<input type='text' id='responsable-act' name='responsable_act' readonly='readonly' size='10' value='".$registro['nombre']."'/>";
            }
        ?>
        
    </div>
    <br>
    <div class="form-style-4 ">
        <label for="prioridad" class="prioridad">Prioridad:</label>
        <select id="prioridad" name="prioridad">
            <?php
               $query = "select id_prio from actividad where id_actividad=$id";
                $result = mysqli_query($link, $query) or die("Query 1 failed");
                while ($registro = mysqli_fetch_array($result)) {
                    $id2=$registro['id_prio'];
               }
               $query = "SELECT id_prio,prioridad FROM prioridades ORDER BY prioridad ASC";
               $result = mysqli_query($link, $query) or die("Query 1 failed");
               
               while ($registro = mysqli_fetch_array($result)) {
                   
                    if($registro['id_prio']==$id2){
                       echo "<option selected value=".$registro['id_prio'].">".$registro['prioridad']."</option>";   
                   }//if
                   else{
                   
                       echo "<option value=".$registro['id_prio'].">".$registro['prioridad']."</option>";
                   }//else 
               }//while  
               ?>
        </select>
        <label for="platica">Plática:</label>
        <?php
            $query = "SELECT titulo_platica FROM actividad WHERE id_actividad=$id";
            $result = mysqli_query($link, $query) or die("Query 1 failed");
            while ($registro = mysqli_fetch_array($result)) {
                echo"<input type='text' id='platica' name='platica' size='40'  value='".$registro['titulo_platica']."' required>";
            }
        ?>
    </div>
    <br>
    <div class="form-style-4 ">
       <label class="elaboro" for="empleado">Elaboró:</label>
        <select name="empleado" id="empleado">
            <?php
               $query = "select id_empleado from actividad where id_actividad=$id";
                $result = mysqli_query($link, $query) or die("Query 1 failed");
                while ($registro = mysqli_fetch_array($result)) {
                    $id2=$registro['id_empleado'];
               }
               $query = "SELECT id_empleado, nombre,ap_paterno,ap_materno FROM empleado ORDER BY nombre ASC";
               $result = mysqli_query($link, $query) or die("Query 1 failed");
               
               while ($registro = mysqli_fetch_array($result)) {
                   
                   if($registro['id_empleado']==$id2){
                       
                       echo "<option selected value=".$registro['id_empleado'].">".$registro['nombre']." ".$registro['ap_paterno']." ".$registro['ap_materno']."</option>";
                       
                   }//if
                   
                   else{
                        echo "<option value=".$registro['id_empleado'].">".$registro['nombre']." ".$registro['ap_paterno']." ".$registro['ap_materno']."</option>";   
                   }//else
               }//while  
            ?>
        </select>
        <label for="colegio">Colegio:</label>
        <select id="colegio" name="colegio">
            <?php
               $query = "select id_colegios from actividad where id_actividad=$id";
                $result = mysqli_query($link, $query) or die("Query 1 failed");
                while ($registro = mysqli_fetch_array($result)) {
                    $id2=$registro['id_colegios'];
               }
               $query = "SELECT id_colegios, colegio FROM colegios ORDER BY colegio ASC";
               $result = mysqli_query($link, $query) or die("Query 1 failed");

               while ($registro = mysqli_fetch_array($result)) {
                   
                    if($registro['id_colegios']==$id2){
                       echo "<option selected value=".$registro['id_colegios'].">".$registro['colegio']."</option>";   
                   }//if
                   
                   else{
                   
                       echo "<option value=".$registro['id_colegios'].">".$registro['colegio']."</option>";
                   }//else
                   
               }//while  
               ?>
        </select>
    </div>
    <br>
    <div class="form-style-4 ">
        <label for="grado" class="grado">Grado del Alumno:</label>
        <select name="grado" id="grado">
            <?php
               $query = "select id_grado from actividad where id_actividad=$id";
                $result = mysqli_query($link, $query) or die("Query 1 failed");
                while ($registro = mysqli_fetch_array($result)) {
                    $id2=$registro['id_grado'];
               }
               $query = "SELECT id_grado,grado FROM grado ORDER BY grado ASC";
               $result = mysqli_query($link, $query) or die("Query 1 failed");
               
               while ($registro = mysqli_fetch_array($result)) {
                   
                    if($registro['id_grado']==$id2){
                       echo "<option selected value=".$registro['id_grado'].">".$registro['grado']."</option>";   
                   }//if
                   
                   else{
                   
                       echo "<option value=".$registro['id_grado'].">".$registro['grado']."</option>";
                   }//else
                   
               }//while  
               ?>
            </select>
        <label for="num_participantes">Número de Participantes:</label>
        <?php
            $query = "SELECT num FROM actividad WHERE id_actividad=$id";
            $result = mysqli_query($link, $query) or die("Query 1 failed");
            while ($registro = mysqli_fetch_array($result)) {
                echo"<input type='text' name='num_participantes' id='num_participantes' placeholder='0' size='3' value='".$registro['num']."' required>";
            }
        ?>
    </div>
    <br>
    <div class="form-style-4 ">
        <label for="exp_1evento" class="expositor">Expositor (1er Evento):</label>
        <?php
            $query = "SELECT expositor_1 FROM actividad WHERE id_actividad=$id";
            $result = mysqli_query($link, $query) or die("Query 1 failed");
            while ($registro = mysqli_fetch_array($result)) {
                echo"<input type='text' id='exp_1evento' size='30' required name='exp_1evento' value='".$registro['expositor_1']."'>";
            }
        ?>
        <label for="tipo-visita">Tipo de Visita:</label>
        <?php
            $query = "SELECT tipo_visita FROM actividad WHERE id_actividad=$id";
            $result = mysqli_query($link, $query) or die("Query 1 failed");
            while ($registro = mysqli_fetch_array($result)) {
                echo"<input type='text' id='tipo-visita' size='30' required name='tipo-visita' value='".$registro['tipo_visita']."'>";
            }
        ?>
    </div>
    <br>
    <div class="form-style-4 ">
        <label for="tipo-platica" class="tipo-plat">Tipo de Plática:</label> 
        <?php
            $query = "SELECT tipo_platica FROM actividad WHERE id_actividad=$id";
            $result = mysqli_query($link, $query) or die("Query 1 failed");
            while ($registro = mysqli_fetch_array($result)) {
                echo"<input type='text' id='tipo-platica' size='60' name='tipo-platica' value='".$registro['tipo_platica']."' required>";
            }
        ?>
        <label for="turno">Turno:</label>
        <?php
            $query = "SELECT turno FROM actividad WHERE id_actividad=$id";
            $result = mysqli_query($link, $query) or die("Query 1 failed");
            while ($registro = mysqli_fetch_array($result)) {
                echo"<input type='text' id='turno' size='20' required name='turno' value='".$registro['turno']."'>";
            }
        ?>
    </div>
    <br>
    <div class="form-style-4 ">
        <label for="exp_2evento" class="exp_2">Expositor (2do Evento):</label>
        <?php
            $query = "SELECT expositor_2 FROM actividad WHERE id_actividad=$id";
            $result = mysqli_query($link, $query) or die("Query 1 failed");
            while ($registro = mysqli_fetch_array($result)) {
                echo"<input type='text' id='exp_2evento' size='20' required name='exp_2evento' value='".$registro['expositor_2']."'>";
            }
        ?>
        <label for="alimento">Tipo de Alimentos:</label>
          <?php
               $query = "select clavealimento from actividad where id_actividad=$id";
                $result = mysqli_query($link, $query) or die("Query 1 failed");
                while ($registro = mysqli_fetch_array($result)) {
                    $id2=$registro['clavealimento'];
               }
               $query = "SELECT clavealimento, tipo_alimento FROM proyecto.alimento ORDER BY clavealimento asc limit 0,3";
               $result = mysqli_query($link, $query) or die("Query 1 failed");
               
               while ($registro = mysqli_fetch_array($result)) {
                   
                   $Tipo_alimento = $registro['tipo_alimento'];
                    $Clavealimento =$registro['clavealimento'];
                    if($id2==1){
                        if($registro['tipo_alimento']=='Desayuno'){
    
                            echo "<input id=\"$Clavealimento\" type='checkbox' checked name=\"$Clavealimento\" value=\"$Tipo_alimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                        }else{
                       
                            echo "<input id=\"$Clavealimento\" type='checkbox' value=\"$Tipo_alimento\" name=\"$Clavealimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                       }     
                    }else if($id2==2){
                        if($registro['tipo_alimento']=='Comida'){
    
                            echo "<input id=\"$Clavealimento\" type='checkbox' checked name=\"$Clavealimento\" value=\"$Tipo_alimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                        }else{
                       
                            echo "<input id=\"$Clavealimento\" type='checkbox' value=\"$Tipo_alimento\" name=\"$Clavealimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                       }     
                    }else if($id2==3){
                        if($registro['tipo_alimento']=='Cena'){
    
                            echo "<input id=\"$Clavealimento\" type='checkbox' checked name=\"$Clavealimento\" value=\"$Tipo_alimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                        }else{
                       
                            echo "<input id=\"$Clavealimento\" type='checkbox' value=\"$Tipo_alimento\" name=\"$Clavealimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                       }     
                    }else if($id2==12){
                        if($registro['tipo_alimento']=='Desayuno'){
    
                            echo "<input id=\"$Clavealimento\" type='checkbox' checked name=\"$Clavealimento\" value=\"$Tipo_alimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                        }else if($registro['tipo_alimento']=='Comida'){
    
                            echo "<input id=\"$Clavealimento\" type='checkbox' checked name=\"$Clavealimento\" value=\"$Tipo_alimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                        }else{
                       
                            echo "<input id=\"$Clavealimento\" type='checkbox' value=\"$Tipo_alimento\" name=\"$Clavealimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                       }     
                    }else if($id2==23){
                        if($registro['tipo_alimento']=='Comida'){
    
                            echo "<input id=\"$Clavealimento\" type='checkbox' checked name=\"$Clavealimento\" value=\"$Tipo_alimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                        }else if($registro['tipo_alimento']=='Cena'){
    
                            echo "<input id=\"$Clavealimento\" type='checkbox' checked name=\"$Clavealimento\" value=\"$Tipo_alimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                        }else{
                       
                            echo "<input id=\"$Clavealimento\" type='checkbox' value=\"$Tipo_alimento\" name=\"$Clavealimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                       }     
                    }else if($id2==123){
                        if($registro['tipo_alimento']=='Desayuno'){
    
                            echo "<input id=\"$Clavealimento\" type='checkbox' checked name=\"$Clavealimento\" value=\"$Tipo_alimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                        }else if($registro['tipo_alimento']=='Comida'){
    
                            echo "<input id=\"$Clavealimento\" type='checkbox' checked name=\"$Clavealimento\" value=\"$Tipo_alimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                        }else{
                       
                            echo "<input id=\"$Clavealimento\" type='checkbox' checked value=\"$Tipo_alimento\" name=\"$Clavealimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                       }     
                    }else{
                       if($registro['tipo_alimento']=='Desayuno'){
                            echo "<input id=\"$Clavealimento\" type='checkbox' name=\"$Clavealimento\" value=\"$Tipo_alimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                       }//if
                       else{
                            echo "<input id=\"$Clavealimento\" type='checkbox' value=\"$Tipo_alimento\" name=\"$Clavealimento\"\><label for=\"$Clavealimento\">
                            <span></span>$Tipo_alimento</label>";
                       }//else
                    }   
               }//while  
               ?> 
    </div>
    <br>
    <div class="form-style-4 ">
    
        <label for="transporte" class="transporte">Transporte:</label>
        <select name="transporte" id="transporte">
            <?php
               $query = "select transporte from actividad where id_actividad=$id";
                $result = mysqli_query($link, $query) or die("Query 1 failed");
                while ($registro = mysqli_fetch_array($result)) {
                    $id2=$registro['transporte'];
               }
               $query = "SELECT clavetransporte,tipo_transporte FROM transporte ORDER BY tipo_transporte ASC";
               $result = mysqli_query($link, $query) or die("Query 1 failed");
               
               while ($registro = mysqli_fetch_array($result)) {
                   
                   if($registro['tipo_transporte']==$id2){
                       echo "<option selected value=".$registro['clavetransporte'].">".$registro['tipo_transporte']."</option>";   
                   }//if
                   
                   else{
                   
                       echo "<option value=".$registro['clavetransporte'].">".$registro['tipo_transporte']."</option>";
                   }//else
                   
               }//while  
               ?>
            </select> 
        <label for="tag_numero"> Tag Número:</label>
        <?php
            $query = "SELECT tag_numero FROM actividad WHERE id_actividad=$id";
            $result = mysqli_query($link, $query) or die("Query 1 failed");
            while ($registro = mysqli_fetch_array($result)) {
                echo"<input required type='text' id='tag_numero' name='tag_numero' size='2' value='".$registro['tag_numero']."'>";
            }
        ?>
        <label for="notas-transporte">Notas:</label>
        <?php
            $query = "SELECT notas_transporte FROM actividad WHERE id_actividad=$id";
            $result = mysqli_query($link, $query) or die("Query 1 failed");
            while ($registro = mysqli_fetch_array($result)) {
                echo"<input name='notas-transporte' required type='text' id='notas-transporte' size='30' value='".$registro['notas_transporte']."'>";
            }
        ?>
    </div>
    <br>
    <div class="form-style-4 ">
        <label for="apoyo" class="apoyo">Apoyo:</label>
        <?php
            $query = "SELECT apoyo FROM actividad WHERE id_actividad=$id";
            $result = mysqli_query($link, $query) or die("Query 1 failed");
            while ($registro = mysqli_fetch_array($result)) {
                echo"<input readonly='readonly' type='text' required id='apoyo' name='apoyo' size='40' value='".$registro['apoyo']."'>";
            }
        ?>
        <label for="notas">Notas:</label>
        <?php
            $query = "SELECT notas FROM actividad WHERE id_actividad=$id";
            $result = mysqli_query($link, $query) or die("Query 1 failed");
            while ($registro = mysqli_fetch_array($result)) {
                echo" <input type='text' required name='notas' id='notas' size='40' value='".$registro['notas']."'>";
            }
        ?>
    </div>
    <br><div class="form-style-4">
    <?php
        echo "<input type='submit' id='Modificar-actividad' class='$id' value='Modificar Actividad'/>";
    ?>
    </div>
    </div>
<?php

mysqli_close($link);
?>