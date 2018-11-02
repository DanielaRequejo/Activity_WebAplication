<?php

/*************************************************************************
 *Borrar Reposicion Horas.                                                        *
 *Eliminara los empleados que se desean eliminar.                        *
 *       Autores:                                                        *
 *Montserrat Devars Peralta.                                             *
 *David Eduardo Parra Mercado.                                           *
 *Daniela Requejo Fernandez.                                             *
 *                                                                       *
 *Ultima modificacion: 04 de Mayo de 2017.                              *
 *                                                                       *
 *************************************************************************/

//Variables para abrir la base de datos.
$id_h     = $_POST['id'];
$fecha    =$_POST['fecha'];
$user     = 'root';
$password = 'root';
$db       = 'proyecto';
$host     = 'localhost';
$port     = 3306;

//Abre la base de datos y elimina la reposicion.
$link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
mysqli_select_db($link, $db) or die("No selecciono base de datos");
$query1 = "update rep_horas set fecha_pago ='$fecha' where id_horas=$id_h";
$result1 = mysqli_query($link, $query1) or die("Query 1 failed");
include("reposicion.php")
?>