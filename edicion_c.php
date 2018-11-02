<?php
    $id_c = $_POST['id'];
    $modi = $_POST['modificacion'];
    $user = 'root';
    $password = 'root';
    $db = 'proyecto';
    $host = 'localhost';
    $port = 3306;
    $link=mysqli_connect($host, $user, $password) or die("No se puede conectar");
    mysqli_select_db($link,$db) or die("No selecciono base de datos");
    $query ="UPDATE colegios SET colegio='$modi' WHERE id_colegios=$id_c";
    $result = mysqli_query($link,$query) or die("Query 1 failed edicion");
    mysqli_close($link);
    include('editar_c.php');
?>
