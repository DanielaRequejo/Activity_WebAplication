<!--Tabla donde se imprimen los colegios-->
<script>
     $("div.oculto1").slideToggle("fast");
</script>
<div class="oculto1">
    <br><br>
    <div class="group">
        <input class="datos" type="text" id="nombre" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Nombre</label>
    </div>
        <br><br>
    <input type="submit" id="agregar1" class="agregar" value="Agregar" size="10">
</div>
    <input type="submit" name="enviar" value="Nuevo Colegio" class="colbtn">

<table>
    <tr>
        <th style='font-weight: bold'>Id_Colegio</th>
        <th style='font-weight: bold'>Nombre</th>
        <th style='font-weight: bold' colspan="2">Opciones</th>
    </tr>
<?php

/*************************************************************************
 *Imprime Colegios.                                                      *
 *Imprime los colegios.                                                  *
 *       Autores:                                                        *
 *Montserrat Devars Peralta.                                             *
 *David Eduardo Parra Mercado.                                           *
 *Daniela Requejo Fernandez.                                             *
 *                                                                       *
 *Ultima modificacion: 22 de Marzo de 2017.                              *
 *                                                                       *
 *************************************************************************/

//Variables que almacenan los datos para poder ingresar a la base de datos.
$user     = 'root';
$password = 'root';
$db       = 'proyecto';
$host     = 'localhost';
$port     = 3306;

//Abre la base de datos e inicia sesion.
$link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
mysqli_select_db($link, $db) or die("No selecciono base de datos");
$query = "select id_colegios,colegio from colegios limit 0, 4000";
$result = mysqli_query($link, $query) or die("Query 1 failed");

//Imprime los colegios.
echo "<h1>Colegios</h1>";
while ($registro = mysqli_fetch_array($result)) {
    echo "
        <tr>
          <td width='150'>" . $registro['id_colegios'] . "</td>
          <td>" . $registro['colegio'] . "</td>
          <td id=" . $registro['id_colegios'] . " class='editar_c'><span><i class='fa fa-pencil-square-o fa-2x'></i></span></td>
          <td id=" . $registro['id_colegios'] . " class='borrar_c'><span><i class='fa fa-trash-o fa-2x'></i></span></td>
        </tr>";
}
    mysqli_close($link);
?>
</table>