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
<!--Tabla donde se imprimen los colegios-->
<table>
    <tr>
        <th style='font-weight: bold'>Id_Colegio</th>
        <th style='font-weight: bold'>Nombre</th>
        <th style='font-weight: bold' colspan="2">Opciones</th>
    </tr>
<?php
/*************************************************************************
 *Borrar Colegio.                                                      *
 *Eliminara los colegios que se desea eliminar.*
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


//Elimina el colegio que se selecciono.
$id_c   = $_POST['id'];
$query1 = "delete from colegios where id_colegios=$id_c";
$result1 = mysqli_query($link, $query1) or die("Query 1 failed");
$query = "select id_colegios,colegio from colegios";
$result = mysqli_query($link, $query) or die("Query 2 failed");

//Imprime la tabla que tiene la base de datos.
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