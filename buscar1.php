<?php
     $user     = 'root';
   $password = 'root';
   $db       = 'proyecto';
   $host     = 'localhost';
   $port     = 3306;
   $link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
    mysqli_select_db($link, $db) or die("No selecciono base de datos");
    $id= $_POST['id'];
    $colegio= $_POST['colegio'];
    $query="select nombre from empleado left join prio_colegio using(id_empleado) where id_colegios=$id";

    $result = mysqli_query($link, $query) or die("Query 1 failed");
    while ($registro = mysqli_fetch_array($result)) {
        echo $registro['nombre'];
    }
    
?>