<?php
    $id_u = $_POST['id'];
    $modi = $_POST['modificacion'];
    $inf = $_POST['info'];
    $user = 'root';
    $password = 'root';
    $db = 'proyecto';
    $host = 'localhost';
    $port = 3306;
    $link=mysqli_connect($host, $user, $password) or die("No se puede conectar");
    mysqli_select_db($link,$db) or die("No selecciono base de datos");
    $query ="UPDATE empleado SET $inf='$modi' WHERE id_empleado=$id_u";
    $result = mysqli_query($link,$query) or die("Query 1 failed edicion");
    mysqli_close($link);
    include('editar_u.php');
?>
