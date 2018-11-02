<?php

$user     = 'root';
$password = 'root';
$db       = 'proyecto';
$host     = 'localhost';
$port     = 3306;
$nom      = $_POST['nombre'];
$ap_paterno  = $_POST['ap_paterno'];
$hora_inicio  = $_POST['inicio'];
$hora_fin  = $_POST['fin'];
$dia  = $_POST['dia'];
$id=0;
//Abre la base de datos e inicia sesion.
$link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
mysqli_select_db($link, $db) or die("No selecciono base de datos");
$query ="select id_empleado from empleado where nombre='$nom' and ap_paterno='$ap_paterno'";
$result = mysqli_query($link, $query) or die("Query 1 failed");
while ($registro = mysqli_fetch_array($result)) {
    $id=$registro['id_empleado'];
}

$query = "INSERT into hora_bloqueos(id_empleado,dia,hora_inicio,hora_fin) values ('$id', '$dia','$hora_inicio','$hora_fin')";
$result = mysqli_query($link, $query) or die("Query 1 failed");
mysqli_close($link);
include('horarios.php');
?>