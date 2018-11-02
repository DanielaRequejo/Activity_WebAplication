<!--Tabla donde se imprimen los empleados-->
<script>
     $("div.oculto").slideToggle("fast");
</script>
<div class="oculto">
    <br><br>
    <div class="group">
        <input class="datos" type="text" id="nombre" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Nombre</label>
    </div>
    <div class="group">
        <input class="datos" type="text" id="app" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Ap. Paterno</label>
    </div>
    <div class="group">  
        <input class="datos" type="text" id="apm" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Ap. Materno</label>
    </div>
    <div class="group">
        <input class="datos" type="text" id="correo" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Correo</label>
    </div>
    <div class="group">
        <input class="datos" type="text" id="puesto" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Puesto</label>
    </div>
        <br><br>
    <input type="submit" id="agregar" class="agregar" value="Agregar" size="10">
</div>
    <input type="submit" name="enviar" value="Nuevo Empleado" class="btn2">
<table>
    <tr>
        <th style='font-weight: bold'>Nombre</th>
        <th style='font-weight: bold'>Ap. Paterno</th>
        <th style='font-weight: bold'>Ap. Materno</th>
        <th style='font-weight: bold'>Correo</th>
        <th style='font-weight: bold'>Puesto</th>
        <th style='font-weight: bold' colspan="2">Opciones</th>
    </tr>
<?php

/*************************************************************************
 *Imprime empleados.                                                     *
 *Imprime los empleados.                                                 *
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
$query = "select id_empleado,nombre,ap_paterno,ap_materno,correo, puesto from empleado";
$result = mysqli_query($link, $query) or die("Query 1 failed");

//Imprime los empleados.
echo "<h1>Empleados</h1>";
while ($registro = mysqli_fetch_array($result)) {
    echo "
        <tr>
          <td width='150'>" . $registro['nombre'] . "</td>
          <td width='150'>" . $registro['ap_paterno'] . "</td>
          <td width='150'>" . $registro['ap_materno'] . "</td>
          <td width='150'>" . $registro['correo'] . "</td>
          <td width='200'>" . $registro['puesto'] . "</td>
          <td id=" . $registro['id_empleado'] . " class='editar_u'><span><i class='fa fa-pencil-square-o fa-2x'></i></span></td>
          <td id=" . $registro['id_empleado'] . " class='borrar_u'><span><i class='fa fa-trash-o fa-2x'></i></span></td>
        </tr>";
}
    mysqli_close($link);
?>
</table>