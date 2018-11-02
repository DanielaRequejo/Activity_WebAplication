<?php

$user     = 'root';
$password = 'root';
$db       = 'proyecto';
$host     = 'localhost';
$port     = 3306;
$nom      = $_POST['nombre'];
$ap_paterno  = $_POST['ap_paterno'];
$ap_materno  = $_POST['ap_materno'];
$correo  = $_POST['correo'];
$puesto  = $_POST['puesto'];

//Abre la base de datos e inicia sesion.
$link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
mysqli_select_db($link, $db) or die("No selecciono base de datos");
$query = "INSERT into empleado(nombre,ap_paterno,ap_materno,correo,puesto) values ('$nom', '$ap_paterno','$ap_materno','$correo','$puesto')";
$result = mysqli_query($link, $query) or die("Query 1 failed");
$query="select id_empleado from empleado where nombre='$nom' and ap_paterno ='$ap_paterno' and ap_materno ='$ap_materno'";
$result = mysqli_query($link, $query) or die("Query 2 failed");
 while ($registro = mysqli_fetch_array($result)) {
     $id=$registro['id_empleado'];
}
$query="update empleado set id_empleadoa='$id', id_empleadoad='$id' where id_empleado='$id'";
$result = mysqli_query($link, $query) or die("Query 3 failed");
$cp="04";
$val= rand(100,999);
$cp=$cp.$val;
$query="update empleado set cp='$cp' where id_empleado='$id'";
$result = mysqli_query($link, $query) or die("Query 1 failed");
mysqli_close($link);
include('empleados.php');
?>