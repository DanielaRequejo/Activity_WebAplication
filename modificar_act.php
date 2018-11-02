<?php
    $user     = 'root';
    $password = 'root';
    $db       = 'proyecto';
    $host     = 'localhost';
    $port     = 3306;
    $link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
    mysqli_select_db($link, $db) or die("No selecciono base de datos");
    
    $id=$_POST['id_actividad'];
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
//,fecha='$fecha_inicio' ,fecha_fin='$fecha_fin'
    $query ="update actividad set clavetipoactividad='$clave_actividad', id_mes='$mes', hora_ini='$hora_inicio', hora_fin='$hora_fin',clavedirigido='$dirigido',id_empleadoa='$responsable_act',id_empleado='$elaboro',id_empleadoad='$responsable_admin',id_prio='$prioridad', titulo_platica='$platica',id_colegios='$colegio',id_grado='$grado',num='$num_participantes',expositor_1='$exp_1evento',expositor_2='$exp_2evento',turno='$turno',clavealimento='$rep_alimentos',transporte='$transporte',tag_numero='$tag_numero',notas_transporte='$notas_transporte',apoyo='$apoyo',notas='$notas',tipo_visita='$tipo_visita',tipo_platica='$tipo_platica' where id_actividad=$id";
    $result = mysqli_query($link, $query) or die("Query 1 failed");

    mysqli_close($link);
    include('semana.php');
?>