<script>
     $("div.oculto4").slideToggle("fast");
</script>
<div class="oculto4">
    <br><br>
    <div class="group">
        <input class="datos" type="text" id="nombre" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Nombre</label>
    </div>
    <div class="group">
        <input class="datos" type="text" id="act" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Actividad</label>
    </div>
    <p>Hora Inicio:
    <select id="hora_inicio">
              <option value="0" selected="selected">Selección</option>
              <option value="7:00">7:00</option>
              <option value="8:00">8:00</option>
              <option value="9:00">9:00</option>
              <option value="10:00">10:00</option>
              <option value="11:00">11:00</option>
              <option value="12:00">12:00</option>
              <option value="13:00">13:00</option>
              <option value="14:00">14:00</option>
              <option value="15:00">15:00</option>
              <option value="16:00">16:00</option>
              <option value="17:00">17:00</option>
              <option value="18:00">18:00</option>
              <option value="19:00">19:00</option>
              <option value="20:00">20:00</option>
              <option value="21:00">21:00</option>
              <option value="22:00">22:00</option>
        </select></p>
    <br><br>
    <p>Hora Fin:
    <select id="hora_fin">
              <option value="0" selected="selected">Selección</option>
              <option value="7:00">7:00</option>
              <option value="8:00">8:00</option>
              <option value="9:00">9:00</option>
              <option value="10:00">10:00</option>
              <option value="11:00">11:00</option>
              <option value="12:00">12:00</option>
              <option value="13:00">13:00</option>
              <option value="14:00">14:00</option>
              <option value="15:00">15:00</option>
              <option value="16:00">16:00</option>
              <option value="17:00">17:00</option>
              <option value="18:00">18:00</option>
              <option value="19:00">19:00</option>
              <option value="20:00">20:00</option>
              <option value="21:00">21:00</option>
              <option value="22:00">22:00</option>
        </select></p>
    <br>
    <div class="group">
        <input placeholder="              Sábado o Domingo" class="datos" type="text" id="dia" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>D&iacute;a</label>
    </div>
    <div class="group">
        <input placeholder="              dd/mm/aaaa" class="datos" type="text" id="fecha" required>
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Fecha</label>
    </div>
        <br><br><br><br>
    <input type="submit" id="agregar4" class="agregar" value="Agregar" size="10">
</div>
    <input type="submit" name="enviar" value="Nueva Reposici&oacute;n" class="rep">

<table>
    <tr>
        <th style='font-weight: bold'>Id_Reposici&oacute;n</th>
        <th style='font-weight: bold'>Nombre</th>
        <th style='font-weight: bold'>Hora Inicio</th>
        <th style='font-weight: bold'>Hora Fin</th>
        <th style='font-weight: bold'>D&iacute;a</th>
        <th style='font-weight: bold'>Actividad</th>
        <th style='font-weight: bold'>Fecha</th>
        <th style='font-weight: bold'>Pago Realizado</th>
        <th style='font-weight: bold' >Realizar</th>
    </tr>
<?php

/*************************************************************************
 *Imprime Reposición de Horas.                                                      *
 *Imprime los reposiciones.                                                  *
 *       Autores:                                                        *
 *Montserrat Devars Peralta.                                             *
 *David Eduardo Parra Mercado.                                           *
 *Daniela Requejo Fernandez.                                             *
 *                                                                       *
 *Ultima modificacion: 4 de Mayo de 2017.                              *
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
$query = "select id_horas,nombre,hora_inicio,hora_fin,dia,actividad,fecha, fecha_pago from rep_horas";
$result = mysqli_query($link, $query) or die("Query 1 failed");

//Imprime los rep.
echo "<h1>Reposici&oacute;n de Horas </h1>";
while ($registro = mysqli_fetch_array($result)) {
    echo "
        <tr>
          <td width='150'>" . $registro['id_horas'] . "</td>
          <td>" . $registro['nombre'] . "</td>
          <td>" . $registro['hora_inicio'] . "</td>
          <td>" . $registro['hora_fin'] . "</td>
          <td>" . $registro['dia'] . "</td>
          <td>" . $registro['actividad'] . "</td>
          <td>" . $registro['fecha'] . "</td>
          <td id='fechas'>".$registro['fecha_pago']."</td>
          <td id=" . $registro['id_horas'] . " class='borrar_horas'><span><i class='fa fa-check-square fa-2x'></i></span></td>
        </tr>";
}
?>
</table>