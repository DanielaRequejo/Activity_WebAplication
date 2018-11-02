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
   
   echo "<h1>Actividades</h1>";
   ?>

<!--http://codepen.io/north-of-rapture/pen/rWqega/-->

 <link rel="stylesheet" href="css/calendario_actividad_nueva.css">
    <script src="js/actividades.js"></script>
<style>
    
    h1 {
    font-size: 3em;
    margin: .67em 0;
}
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
<div class="form">

    <div class="form-style-4 ">
       <label for="tipo-actividad">Tipo de Actividad:</label>
            <select id="tipo-actividad" name="tipo-actividad">
            <?php
               //Abre la base de datos e inicia sesion.
               $query = "SELECT clavetipoactividad, nombreactividad FROM actividades ORDER BY nombreactividad ASC";
               $result = mysqli_query($link, $query) or die("Query 1 failed");
               
               while ($registro = mysqli_fetch_array($result)) {
                 
                   if($registro['clavetipoactividad']==0){
                       echo "<option selected value=".$registro['clavetipoactividad'].">".$registro['nombreactividad']."</option>";   
                   }//if
                   else{
                       echo "<option value=".$registro['clavetipoactividad'].">".$registro['nombreactividad']."</option>";
                  
                   }//else
               }//while  
            ?>
                </select>
            <label for="clave">Clave:</label>
            <input type="text" name="clave" id="clave" readonly="readonly" value="0" size="2"/>
    </div>
    <br>
    <div class="form-style-4 ">
        <label for="datepicker" class="fec_fin">Fecha de Inicio:</label>
        <input name="datepicker" type="text" id="datepicker" size="10" required/> 
        <label for="hora_inicio" class="fec_cont">Hora de Inicio:</label>
        <input name="hora_inicio" type="time" min="07:00" max="21:40" value="07:00" id="hora_inicio" required>
        <label for="datepicker2" class="fec_cont">Fecha de Fin:</label>
        <input name="datepicker2" type="text" id="datepicker2" size="10" required>
        <label for="hora_fin" class="fec_cont">Hora de Fin:</label>
        <input type="time" min="07:00" max="22:00" value="07:00"name="hora_fin" id="hora_fin" required>
    </div>
    <br>
    <div class="form-style-4">
        <label for="dirigido" class="dirig">Dirigido a:</label>
        <select id="dirigido" name="dirigido">
            <?php
               //Abre la base de datos e inicia sesion.
               $query = "SELECT clavedirigido,nombredirigo FROM dirigido ORDER BY nombredirigo ASC";
               $result = mysqli_query($link, $query) or die("Query 1 failed");
               
               while ($registro = mysqli_fetch_array($result)) {
                   
                    if($registro['nombredirigo']=='Ninguno'){
                       echo "<option selected value=".$registro['clavedirigido'].">".$registro['nombredirigo']."</option>";   
                   }//if
                   
                   else{
                   
                       echo "<option value=".$registro['clavedirigido'].">".$registro['nombredirigo']."</option>";
                   }//else
                   
               }//while  
               ?>
            </select>
        <label for="responsable_admin">Responsable (Admisión):</label>
        <input type="text" name="responsable_admin" id="responsable_admin" readonly="readonly" size="11"/>
        <label for="responsable-act">Responsable (Act):</label>
        <input type="text" id="responsable-act" name="responsable_act" readonly="readonly" size="11"/>
    </div>
    <br>
    <div class="form-style-4 ">
        <label for="prioridad" class="prioridad">Prioridad:</label>
        <select id="prioridad" name="prioridad">
            <?php
               //Abre la base de datos e inicia sesion.
               $query = "SELECT id_prio,prioridad FROM prioridades ORDER BY prioridad ASC";
               $result = mysqli_query($link, $query) or die("Query 1 failed");
               
               while ($registro = mysqli_fetch_array($result)) {
                   
                    if($registro['claveprioridad']=='G1'){
                       echo "<option selected value=".$registro['id_prio'].">".$registro['prioridad']."</option>";   
                   }//if
                   
                   else{
                   
                       echo "<option value=".$registro['id_prio'].">".$registro['prioridad']."</option>";
                   }//else
                   
               }//while  
               ?>
        </select>
        <label for="platica">Plática:</label>
        <input type="text" id="platica" name="platica" size="40" required>
    </div>
    <br>
    <div class="form-style-4 ">
       <label class="elaboro" for="empleado">Elaboró:</label>
        <select name="empleado" id="empleado">
            <?php
               //Abre la base de datos e inicia sesion.
               $query = "SELECT id_empleado, nombre,ap_paterno,ap_materno FROM empleado ORDER BY nombre ASC";
               $result = mysqli_query($link, $query) or die("Query 1 failed");
               
               while ($registro = mysqli_fetch_array($result)) {
                   
                   if($registro['id_empleado']=='0'){
                       
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
               //Abre la base de datos e inicia sesion.
               $query = "SELECT id_colegios, colegio, cp FROM colegios ORDER BY colegio ASC";
               $result = mysqli_query($link, $query) or die("Query 1 failed");

               while ($registro = mysqli_fetch_array($result)) {
                   
                    if($registro['id_colegios']==0){
                       echo "<option selected value='".$registro['id_colegios']."' id='".$registro['cp']."' >".$registro['colegio']."</option>";   
                   }//if
                   
                   else{
                   
                       echo "<option value='".$registro['id_colegios']."' id='".$registro['cp']."'>".$registro['colegio']."</option>";
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
               //Abre la base de datos e inicia sesion.
               $query = "SELECT id_grado,grado FROM grado ORDER BY grado ASC";
               $result = mysqli_query($link, $query) or die("Query 1 failed");
               
               while ($registro = mysqli_fetch_array($result)) {
                   
                    if($registro['grado']=='Varios'){
                       echo "<option selected value=".$registro['id_grado'].">".$registro['grado']."</option>";   
                   }//if
                   
                   else{
                   
                       echo "<option value=".$registro['id_grado'].">".$registro['grado']."</option>";
                   }//else
                   
               }//while  
               ?>
            </select>
        <label for="num_participantes">Número de Participantes:</label>
        <input type="text" name="num_participantes" id="num_participantes" placeholder="0" size="3" required>
    </div>
    <br>
    <div class="form-style-4 ">
        <label for="exp_1evento" class="expositor">Expositor (1er Evento):</label>
        <input type="text" id="exp_1evento" size="30" required name="exp_1evento">
        <label for="tipo-visita">Tipo de Visita:</label>
        <input type="text" id="tipo-visita" size="30" required name="tipo-visita">
    </div>
    <br>
    <div class="form-style-4 ">
        <label for="tipo-platica" class="tipo-plat">Tipo de Plática:</label> 
        <input type="text" id="tipo-platica" size="60" name="tipo-platica" required>
        <label for="turno">Turno:</label>
        <input type="text" id="turno" size="20" required name="turno">
    </div>
    <br>
    <div class="form-style-4 ">
        <label for="exp_2evento" class="exp_2">Expositor (2do Evento):</label> 
        <input type="text" id="exp_2evento" size="20" required name="exp_2evento">
        <label for="alimento">Tipo de Alimentos:</label>
          <?php
               //Abre la base de datos e inicia sesion.
               $query = "SELECT clavealimento, tipo_alimento FROM proyecto.alimento ORDER BY clavealimento asc limit 0,3";
               $result = mysqli_query($link, $query) or die("Query 1 failed");
               
               while ($registro = mysqli_fetch_array($result)) {
                   
                   $Tipo_alimento = $registro['tipo_alimento'];
                    $Clavealimento =$registro['clavealimento'];
                 
                   if($registro['tipo_alimento']=='Desayuno'){
    
                        echo "<input id=\"$Clavealimento\" type='checkbox' name=\"$Clavealimento\" value=\"$Tipo_alimento\"\><label for=\"$Clavealimento\">
          <span></span>$Tipo_alimento</label>";
                   }//if
                 
                   else{
                       
                        echo "<input id=\"$Clavealimento\" type='checkbox' value=\"$Tipo_alimento\" name=\"$Clavealimento\"\><label for=\"$Clavealimento\">
          <span></span>$Tipo_alimento</label>";
                   }//else
                   
               }//while  
               ?> 
    </div>
    <br>
    <div class="form-style-4 ">
    
        <label for="transporte" class="transporte">Transporte:</label>
        <select name="transporte" id="transporte">
            <?php
               //Abre la base de datos e inicia sesion.
               $query = "SELECT clavetransporte,tipo_transporte FROM transporte ORDER BY tipo_transporte ASC";
                
                
               $result = mysqli_query($link, $query) or die("Query 1 failed");
               
               while ($registro = mysqli_fetch_array($result)) {
                   
                   if($registro['tipo_transporte']=='Ninguno'){
                       echo "<option selected value=".$registro['clavetransporte'].">".$registro['tipo_transporte']."</option>";   
                   }//if
                   
                   else{
                   
                       echo "<option value=".$registro['clavetransporte'].">".$registro['tipo_transporte']."</option>";
                   }//else
                   
               }//while  
               ?>
            </select> 
        <label for="tag_numero"> Tag Número:</label>
        <input required type="text" id="tag_numero" name="tag_numero" size="2" value="0">
        <label for="notas-transporte"> Notas:</label>
        <input name="notas-transporte" required type="text" id="notas-transporte" size="30">

    </div>
    <br>
    <div class="form-style-4 ">
        <label for="apoyo" class="apoyo">Apoyo:</label>
        <input readonly="readonly" type="text" required id="apoyo" name="apoyo" size="40">
        <label for="notas">Notas:</label>
        <input type="text" required name="notas" id="notas" size="40">
    </div>
    <br><div class="form-style-4">
    <input type="submit" id="Crear-actividad" value="Crear Actividad"/>
    </div>
    </div>
<?php

mysqli_close($link);
?>