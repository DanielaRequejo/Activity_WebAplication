<?php
     $user     = 'root';
   $password = 'root';
   $db       = 'proyecto';
   $host     = 'localhost';
   $port     = 3306;
   $link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
    mysqli_select_db($link, $db) or die("No selecciono base de datos");
    $cp= $_POST['cp'];
    $valores=substr($cp,-5,2);
    $query="select id_empleado, nombre, cp from proyecto.empleado where cp like '$valores%'";
    $nombre= array();
    $cp1=array();
    $id=array();
    $result = mysqli_query($link, $query) or die("Query 1 failed");
    while ($registro = mysqli_fetch_array($result)) {
        array_push($nombre,$registro['nombre']);
        array_push($cp1,$registro['cp']);
        array_push($id,$registro['id_empleado']);
    }
    $y=count($cp1);
    $x=0;
    $res=array();
    while($x<$y){
        array_push($res,abs($cp1[$x]-$cp));
        $x++;
    }
    $min = min($res);
    $x=0;
    $pos=0;
    while($x<$y){
        if($res[$x]==$min){
            $pos=$x;
        }
        $x++;
    }

    echo $id[$pos];
?>