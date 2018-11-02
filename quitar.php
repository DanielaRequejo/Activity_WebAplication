<?php
    $user     = 'root';
    $password = 'root';
    $db       = 'proyecto';
    $host     = 'localhost';
    $port     = 3306;
    $link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
    mysqli_select_db($link, $db) or die("No selecciono base de datos");
    $id=$_POST['id'];
    $query="update actividad set regreso=0 where id_actividad=$id";
    $result = mysqli_query($link, $query) or die("Query 1 failed");
    mysqli_close($link);
    include('rembolso.php');
?>