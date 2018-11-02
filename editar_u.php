<table>
    <tr>
        <th style='font-weight: bold'>Nombre</th>
        <th style='font-weight: bold'>Ap. Paterno</th>
        <th style='font-weight: bold'>Ap. Materno</th>
        <th style='font-weight: bold'>Correo</th>
        <th style='font-weight: bold'>Puesto</th>
    </tr>
<?php
    $id_u = $_POST['id'];
    echo "<h1>Edición de Empleado</h1>";
    $user = 'root';
    $password = 'root';
    $db = 'proyecto';
    $host = 'localhost';
    $port = 3306;
    $link=mysqli_connect($host, $user, $password) or die("No se puede conectar");
    mysqli_select_db($link,$db) or die("No selecciono base de datos");
    $query ="select id_empleado,nombre,ap_paterno,ap_materno,correo, puesto from empleado where id_empleado=$id_u";
    $result = mysqli_query($link,$query) or die("Query 1 failed");
    while ($registro = mysqli_fetch_array($result)){
          echo "
	    <tr>
          <td width='150'>".$registro['nombre']."</td>
          <td width='150'>".$registro['ap_paterno']."</td>
          <td width='150'>".$registro['ap_materno']."</td>
          <td width='150'>".$registro['correo']."</td>
          <td width='200'>".$registro['puesto']."</td>
        </tr>";
    }
?>
</table>

<div class="container">
  <div class="selected-item">
    <p>Ha seleccionado: <span>Empty</span></p>
  </div>
  <div class="dropdown">
    <span class="selLabel">Seleccione una Opción</span>
    <input type="hidden" name="cd-dropdown">
    <ul class="dropdown-list">
      <li data-value="1"><span>nombre</span></li>
      <li data-value="2"><span>ap_paterno</span></li>
      <li data-value="3"><span>ap_materno</span></li>
      <li data-value="4"><span>correo</span></li>
      <li data-value="5"><span>puesto</span></li>
    </ul>
  </div>
</div>
<div class="boton">
    <input type="text" id ="Modificacion" name="Modificacion" placeholder="Modificación">
    <?php
        $id_u = $_POST['id'];
        $query ="select id_empleado,nombre,ap_paterno,ap_materno,correo, puesto from empleado where id_empleado=$id_u";
        $result = mysqli_query($link,$query) or die("Query 1 failed");
        while ($registro = mysqli_fetch_array($result)){
            echo "<input type='submit' name='enviar' value='Modificar' id='".$registro['id_empleado']."' class='btn'>";
        }
        mysqli_close($link);
    ?>
</div> 