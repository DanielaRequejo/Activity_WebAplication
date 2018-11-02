<?php
   //Variables que almacenan los datos para poder ingresar a la base de datos.
   $user     = 'root';
   $password = 'root';
   $db       = 'proyecto';
   $host     = 'localhost';
   $port     = 3306;
   $link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
       mysqli_select_db($link, $db) or die("No selecciono base de datos");
   
    echo "<h1>Edición de Colegio</h1>";
   ?>

<table class="colegio">
    <tr>
        <th style='font-weight: bold'>Id_Colegio</th>
        <th style='font-weight: bold'>Nombre</th>
    </tr>
<?php
    $id_c = $_POST['id'];
    $query = "select id_colegios,colegio from colegios where id_colegios=$id_c";
    $result = mysqli_query($link, $query) or die("Query 1 failed");
    while ($registro = mysqli_fetch_array($result)) {
        echo "
            <tr>
                <td width='150'>" . $registro['id_colegios'] . "</td>
                <td>" . $registro['colegio'] . "</td>
            </tr>";
    }
?>
</table>

<div class="boton">
    <input type="text" id ="Modificacion" name="Modificacion" placeholder="Modificación">
    <?php
        $id_c = $_POST['id'];
        $query ="select id_colegios,colegio from colegios where id_colegios=$id_c";
        $result = mysqli_query($link,$query) or die("Query 1 failed");
        while ($registro = mysqli_fetch_array($result)){
            echo "<input type='submit' name='enviar' value='Modificar' id='".$registro['id_colegios']."' class='btn1'>";
        }
        mysqli_close($link);
    ?>
</div> 