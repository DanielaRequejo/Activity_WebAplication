<?php
   //Variables que almacenan los datos para poder ingresar a la base de datos.
   $user     = 'root';
   $password = 'root';
   $db       = 'proyecto';
   $host     = 'localhost';
   $port     = 3306;
   $link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
    mysqli_select_db($link, $db) or die("No selecciono base de datos");
   
    $clave_actividad = $_POST['clave'];
    $fecha_inicio = $_POST['datepicker'];
    $hora_inicio = $_POST['hora_inicio'];
    $fecha_fin = $_POST['datepicker2'];
    $hora_fin = $_POST['hora_fin'];

    $dirigido = $_POST['dirigido'];
    $responsable_admin= $_POST['responsable_admin'];
    $responsable_act= $_POST['responsable_act'];

    $prioridad = $_POST['prioridad'];
    $platica = $_POST['platica'];

    $elaboro = $_POST['empleado'];
    $colegio = $_POST['colegio'];
    $grado = $_POST['grado'];
    $num_participantes = $_POST['num_participantes'];
    $exp_1evento = $_POST['exp_1evento'];
    $tipo_visita = $_POST['tipo_visita'];
    $tipo_platica = $_POST['tipo_platica'];
    $turno = $_POST['turno'];

    $exp_2evento = $_POST['exp_2evento'];
    
    $desayuno= $_POST['desayuno'];
    $comida= $_POST['comida'];
    $cena= $_POST['cena'];
    $rep_alimentos=0;
    $transporte = $_POST['transporte'];
    $tag_numero = $_POST['tag_numero'];
    
    $apoyo = $_POST['apoyo'];
    $notas = $_POST['notas'];

    $notas_transporte = $_POST['notas_transporte'];

    //$mes=$_POST['fecha']; //se saca con el js
    $weekNum = date("W") - date("W",strtotime(date("Y-m-01")))+1;
    if ($weekNum==5){
        $weekNum=4;
    }
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
    if($desayuno!=null&&$comida!=null&&$cena!=null){
        $rep_alimentos=123;
    }else if($desayuno!=null&&$comida!=null&&$cena==null){
        $rep_alimentos=12;
    }else if($desayuno==null&&$comida!=null&&$cena!=null){
        $rep_alimentos=23;
    }else if($desayuno!=null&&$comida==null&&$cena==null){
        $rep_alimentos=1;
    }else if($desayuno==null&&$comida!=null&&$cena==null){
        $rep_alimentos=2;
    }else if($desayuno==null&&$comida==null&&$cena!=null){
        $rep_alimentos=3;
    }
    $saber=null;
    $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sábado');
    $tiempo= "$fecha_inicio";
    $tiempo=explode("/",$tiempo);
    $time=sprintf("%s-%s-%s",$tiempo[2],$tiempo[1],$tiempo[0]);
    $num=date('N', strtotime($time))-1;
    $fecha = $dias[$num];
    $query="select dia from hora_bloqueos where id_empleado = $elaboro and hora_inicio ='$hora_inicio' and dia='$fecha'";
        $result = mysqli_query($link, $query) or die("Query 2 failed");
        while ($registro = mysqli_fetch_array($result)) {
            $saber=$registro['dia'];
    }
    if($saber==null){
        $query ="INSERT INTO actividad (clavetipoactividad, id_mes,fecha, hora_ini,fecha_fin, hora_fin,clavedirigido,id_empleadoa,id_empleado,id_empleadoad,id_prio, titulo_platica,id_colegios,id_grado,num,expositor_1,expositor_2,turno,clavealimento,transporte,tag_numero,notas_transporte,apoyo,notas,tipo_visita,tipo_platica) VALUES ('$clave_actividad','$mes', '$fecha_inicio','$hora_inicio','$fecha_fin','$hora_fin','$dirigido','$responsable_act','$elaboro',' $responsable_admin','$prioridad','$platica','$colegio','$grado','$num_participantes','$exp_1evento','$exp_2evento','$turno','$rep_alimentos','$transporte','$tag_numero','$notas_transporte', '$apoyo','$notas','$tipo_visita','$tipo_platica')";
        $result = mysqli_query($link, $query) or die("Query 1 failed");

        $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sábado');
        $tiempo= "$fecha_inicio";
        $tiempo=explode("/",$tiempo);
        $time=sprintf("%s-%s-%s",$tiempo[2],$tiempo[1],$tiempo[0]);
        $num=date('N', strtotime($time))-1;
        $fecha = $dias[$num];
        if($fecha=="Sábado"){
            $query="select nombre from empleado where id_empleado = $elaboro";
            $result = mysqli_query($link, $query) or die("Query 2 failed");
            while ($registro = mysqli_fetch_array($result)) {
                $nom=$registro['nombre'];
            }
            $query="select nombreactividad from actividades where clavetipoactividad = $clave_actividad";
            $result = mysqli_query($link, $query) or die("Query 3 failed");
            while ($registro = mysqli_fetch_array($result)) {
                $actividad=$registro['nombreactividad'];
            }
            $query = "INSERT into rep_horas(nombre,actividad,hora_inicio,hora_fin,dia,fecha) values ('$nom','$actividad','$hora_inicio','$hora_fin','$fecha','$fecha_inicio')";
            $result = mysqli_query($link, $query) or die("Query 4 failed");
        }
    }else{
        echo "<script> alert('Esta Persona no puede realizar esa actividad dentro de esas horas'); </script>";
    }
    mysqli_close($link);
    include('semana.php');
?>