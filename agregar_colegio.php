<?php

$user     = 'root';
$password = 'root';
$db       = 'proyecto';
$host     = 'localhost';
$port     = 3306;
$nom      = $_POST['nombre'];


//Abre la base de datos e inicia sesion.
$link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
mysqli_select_db($link, $db) or die("No selecciono base de datos");
$query = "INSERT into colegios(colegio) values ('$nom')";
$result = mysqli_query($link, $query) or die("Query 1 failed");
$query="select id_colegios from empleado where colegio='$nom'";
$result = mysqli_query($link, $query) or die("Query 2 failed");
 while ($registro = mysqli_fetch_array($result)) {
     $id=$registro['id_empleado'];
}
$cp="04";
$val= rand(100,999);
$cp=$cp.$val;
$query="update colegios set cp='$cp' where id_colegios='$id'";
$result = mysqli_query($link, $query) or die("Query 1 failed");
mysqli_close($link);
include('colegios.php');

?>