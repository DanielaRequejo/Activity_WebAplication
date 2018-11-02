<?php
//Variables que almacenan los datos para poder ingresar a la base de datos.
$user     = 'root';
$password = 'root';
$db       = 'proyecto';
$host     = 'localhost';
$port     = 3306;

//Abre la base de datos e inicia sesion.
$link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
mysqli_select_db($link, $db) or die("No selecciono base de datos");

$id = $_POST['id'];
$id1=0;
$nombre =$_POST['nombre'];
$query="select clavetipoactividad from actividades where nombreactividad='$nombre'";
$result = mysqli_query($link, $query) or die("Query 1 failed");
while ($registro = mysqli_fetch_array($result)) {
    $id1=$registro['clavetipoactividad'];
}
$query1 = "delete from actividad where id_actividad=$id and clavetipoactividad=$id1";
$result1 = mysqli_query($link, $query1) or die("Query 2 failed");
mysqli_close($link);
include("semana.php");
?>