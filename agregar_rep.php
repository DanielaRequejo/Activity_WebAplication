<?php

$user     = 'root';
$password = 'root';
$db       = 'proyecto';
$host     = 'localhost';
$port     = 3306;
$nom      = $_POST['nombre'];
$actividad  = $_POST['actividad'];
$hi      = $_POST['hora_inicio'];
$hf      = $_POST['hora_fin'];
$dia      = $_POST['dia'];
$fecha      = $_POST['fecha'];

//Abre la base de datos e inicia sesion.
$link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
mysqli_select_db($link, $db) or die("No selecciono base de datos");
$query = "INSERT into rep_horas(nombre,actividad,hora_inicio,hora_fin,dia,fecha) values ('$nom','$actividad','$hi','$hf','$dia','$fecha')";
$result = mysqli_query($link, $query) or die("Query 1 failed");
include ("reposicion.php");

?>