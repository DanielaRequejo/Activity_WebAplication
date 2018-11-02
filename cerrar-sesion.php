<?php
 //Variables que almacenan los datos para poder ingresar a la base de datos.
   $user     = 'root';
   $password = 'root';
   $db       = 'proyecto';
   $host     = 'localhost';
   $port     = 3306;
   $link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
       mysqli_select_db($link, $db) or die("No selecciono base de datos");
    mysqli_close($link);
    include('index.html');
?>