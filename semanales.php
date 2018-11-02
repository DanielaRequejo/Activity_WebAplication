<style>
    h1 {
    font-size: 3em;
    margin: .67em 0;
}
</style>
<table>
    <tr>
        <th style='font-weight: bold'>Enero</th>
        <th style='font-weight: bold'>Descargar</th>
        <th style='font-weight: bold'>Febrero</th>
        <th style='font-weight: bold'>Descargar</th>
        <th style='font-weight: bold'>Marzo</th>
        <th style='font-weight: bold'>Descargar</th>
        <th style='font-weight: bold'>Abril</th>
        <th style='font-weight: bold'>Descargar</th>
    </tr>
<?php
    echo "<h1>Semanales</h1>";
    $user     = 'root';
    $password = 'root';
    $db       = 'proyecto';
    $host     = 'localhost';
    $port     = 3306;
    $link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
    mysqli_select_db($link, $db) or die("No selecciono base de datos");
    $x=1;
    $y=1;
    while($x<=4){
         echo"<tr>
          <td style='font-size: .8em' width='150'>Semana: ".$x."</td>
          <td id='".$y."' class='bajar'><span><i class='fa fa-download fa-2x'></i></span></td>
          <td style='font-size: .8em' width='150'>Semana: ".$x."</td>
          <td id='".($y+4)."' class='bajar'><span><i class='fa fa-download fa-2x'></i></span></td>
          <td style='font-size: .8em' width='150'>Semana: ".$x."</td>
          <td id='".($y+8)."' class='bajar'><span><i class='fa fa-download fa-2x'></i></span></td>
          <td style='font-size: .8em' width='150'>Semana: ".$x."</td>
          <td id='".($y+12)."' class='bajar'><span><i class='fa fa-download fa-2x'></i></span></td>
          </tr>";
        $x++;
        $y++;
    }
    mysqli_close($link);
?>
    <tr>
        <th style='font-weight: bold'>Mayo </th>
        <th style='font-weight: bold'>Descargar</th>
        <th style='font-weight: bold'>Junio </th>
        <th style='font-weight: bold'>Descargar</th>
        <th style='font-weight: bold'>julio </th>
        <th style='font-weight: bold'>Descargar</th>
        <th style='font-weight: bold'>Agosto </th>
        <th style='font-weight: bold'>Descargar</th>
    </tr>
<?php
    $x=1;
    while($x<=4){
         echo"<tr>
          <td style='font-size: .8em' width='150'>Semana: ".$x."</td>
          <td id='".($y+12)."' class='bajar'><span><i class='fa fa-download fa-2x'></i></span></td>
          <td style='font-size: .8em' width='150'>Semana: ".$x."</td>
          <td id='".($y+16)."' class='bajar'><span><i class='fa fa-download fa-2x'></i></span></td>
          <td style='font-size: .8em' width='150'>Semana: ".$x."</td>
          <td id='".($y+20)."' class='bajar'><span><i class='fa fa-download fa-2x'></i></span></td>
          <td style='font-size: .8em' width='150'>Semana: ".$x."</td>
          <td id='".($y+24)."' class='bajar'><span><i class='fa fa-download fa-2x'></i></span></td>
          </tr>";
        $x++;
        $y++;
    }
    mysqli_close($link);
?>
    <tr>
        <th style='font-weight: bold'>Septiembre</th>
        <th style='font-weight: bold'>Descargar</th>
        <th style='font-weight: bold'>Octubre</th>
        <th style='font-weight: bold'>Descargar</th>
        <th style='font-weight: bold'>Noviembre</th>
        <th style='font-weight: bold'>Descargar</th>
        <th style='font-weight: bold'>Diciembre</th>
        <th style='font-weight: bold'>Descargar</th>
    </tr>
<?php
    $x=1;
    while($x<=4){
         echo"<tr>
          <td style='font-size: .8em' width='150'>Semana: ".$x."</td>
          <td id='".($y+24)."' class='bajar'><span><i class='fa fa-download fa-2x'></i></span></td>
          <td style='font-size: .8em' width='150'>Semana: ".$x."</td>
          <td id='".($y+28)."' class='bajar'><span><i class='fa fa-download fa-2x'></i></span></td>
          <td style='font-size: .8em' width='150'>Semana: ".$x."</td>
          <td id='".($y+32)."' class='bajar'><span><i class='fa fa-download fa-2x'></i></span></td>
          <td style='font-size: .8em' width='150'>Semana: ".$x."</td>
          <td id='".($y+36)."' class='bajar'><span><i class='fa fa-download fa-2x'></i></span></td>
          </tr>";
        $x++;
        $y++;
    }
    mysqli_close($link);
?>
</table>