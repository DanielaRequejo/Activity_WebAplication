<?php
/*************************************************************************
 *Inicio de Sesion.                                                      *
 *Validacion para la seccion en la que se iniciara sesion a la actividad.*
 *       Autores:                                                        *
 *Montserrat Devars Peralta.                                             *
 *David Eduardo Parra Mercado.                                           *
 *Daniela Requejo Fernandez.                                             *
 *                                                                       *
 *Ultima modificacion: 14 de Marzo de 2017.                              *
 *                                                                       *
 *************************************************************************/

//Informacion para abrir la base de datos
$user     = 'root';
$password = 'root';
$db       = 'proyecto';
$host     = 'localhost';
$port     = 3306;

//Inicia la sesion en la base
$link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
mysqli_select_db($link, $db) or die("No selecciono base de datos");

//Pide usuario y contraseña
$formPassword1 = $_POST["formPassword1"];
$userName      = $_POST["userName"];

//Valida si es usuario o admon.
$query = sprintf("SELECT id_user from users where user='%s' and password='%s'", addslashes(mysqli_escape_string($link, $userName)), addslashes(mysqli_escape_string($link, $formPassword1)));
$result = mysqli_query($link,$query) or die("Query 1 failed");
//Busca el usuairo en la base de datos.
$x = 0;

while ($registro = mysqli_fetch_array($result)) {
    $x = $registro['id_user'];
}//while

if ($x == 0) {
    echo "<script type=\"text/javascript\">alert(\"Usuario incorrecto\");</script>";
    
    include("index.html");
}else if($x==2){
       include('app.html');
}else{
    include('app_u.html');
}
mysqli_close($link);
?>
