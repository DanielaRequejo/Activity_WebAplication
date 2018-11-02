<?php


/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");

    $user     = 'root';
   $password = 'root';
   $db       = 'proyecto';
   $host     = 'localhost';
   $port     = 3306;
    $id= $_GET['id'];
$i=1;
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, "Actividad")
            ->setCellValue('B'.$i, "Mes")
            ->setCellValue('C'.$i, "Fecha_inicio")
            ->setCellValue('D'.$i, "Fecha_fin")
            ->setCellValue('E'.$i, "Hora_inicio")
            ->setCellValue('F'.$i, "Hora_fin")
            ->setCellValue('G'.$i, "Dirigido")
            ->setCellValue('H'.$i, "Responsable(actividad)")
            ->setCellValue('I'.$i, "Responsable(admisión)")
            ->setCellValue('J'.$i, "Elaboro")
            ->setCellValue('K'.$i, "Prioridad")
            ->setCellValue('L'.$i, "Titulo_Platica")
            ->setCellValue('M'.$i, "Colegio")
            ->setCellValue('N'.$i, "Grado")
            ->setCellValue('O'.$i, "Numero Participantes")
            ->setCellValue('P'.$i, "Expositor_1")
            ->setCellValue('Q'.$i, "Expositor_2")
            ->setCellValue('R'.$i, "Turno")
            ->setCellValue('S'.$i, "Alimentos")
            ->setCellValue('T'.$i, "Transporte")
            ->setCellValue('U'.$i, "Tag_Número")
            ->setCellValue('V'.$i, "Notas_Transporte")
            ->setCellValue('W'.$i, "Apoyo")
            ->setCellValue('X'.$i, "Notas");

   $link = mysqli_connect($host, $user, $password) or die("No se puede conectar");
    mysqli_select_db($link, $db) or die("No selecciono base de datos");
    $query="select id_actividad,coloractividad,nombreactividad, mes, fecha, fecha_fin, hora_ini, hora_fin, nombredirigo, e.nombre as nom, prioridad,titulo_platica,colegio,grado,num,expositor_1,expositor_2,turno,tipo_alimento,transporte,tag_numero,notas_transporte,apoyo,
    notas from actividad right join actividades using(clavetipoactividad) right join meses using(id_mes)
    right join dirigido using(clavedirigido) right join empleado as e using(id_empleado) right join 
    prioridades using(id_prio) right join colegios using(id_colegios) right join grado 
    using(id_grado) right join alimento using(clavealimento) where id_mes ='$id' order by fecha asc";
    $result = mysqli_query($link, $query) or die("Query 1 failed");
// Add some data
$i=2;
while ($registro = mysqli_fetch_array($result)) {
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $registro['nombreactividad'])
            ->setCellValue('B'.$i, $registro['mes'])
            ->setCellValue('C'.$i, $registro['fecha'])
            ->setCellValue('D'.$i, $registro['fecha_fin'])
            ->setCellValue('E'.$i, $registro['hora_ini'])
            ->setCellValue('F'.$i, $registro['hora_fin'])
            ->setCellValue('G'.$i, $registro['nombredirigo'])
            ->setCellValue('J'.$i, $registro['nom'])
            ->setCellValue('K'.$i, $registro['prioridad'])
            ->setCellValue('L'.$i, $registro['titulo_platica'])
            ->setCellValue('M'.$i, $registro['colegio'])
            ->setCellValue('N'.$i, $registro['grado'])
            ->setCellValue('O'.$i, $registro['num'])
            ->setCellValue('P'.$i, $registro['expositor_1'])
            ->setCellValue('Q'.$i, $registro['expositor_2'])
            ->setCellValue('R'.$i, $registro['turno'])
            ->setCellValue('S'.$i, $registro['tipo_alimento'])
            ->setCellValue('T'.$i, $registro['transporte'])
            ->setCellValue('U'.$i, $registro['tag_numero'])
            ->setCellValue('V'.$i, $registro['notas_transporte'])
            ->setCellValue('W'.$i, $registro['apoyo'])
            ->setCellValue('X'.$i, $registro['notas']);
    $i++;
    
}
$query="select nombre from actividad right join actividades using(clavetipoactividad) right join meses using(id_mes)
    right join dirigido using(clavedirigido) right join empleado as e using(id_empleadoa) right join 
    prioridades using(id_prio) right join colegios using(id_colegios) right join grado 
    using(id_grado) right join alimento using(clavealimento) where id_mes = '$id' order by fecha asc";
$result = mysqli_query($link, $query) or die("Query 1 failed");
// Add some data
$i=2;
while ($registro = mysqli_fetch_array($result)) {
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('H'.$i, $registro['nombre']);
    $i++;
    
}
$query="select puesto from actividad right join actividades using(clavetipoactividad) right join meses using(id_mes)
    right join dirigido using(clavedirigido) right join empleado as e using(id_empleado) right join 
    prioridades using(id_prio) right join colegios using(id_colegios) right join grado 
    using(id_grado) right join alimento using(clavealimento) where id_mes = '$id' order by fecha asc";
$result = mysqli_query($link, $query) or die("Query 1 failed");
// Add some data
$i=2;
while ($registro = mysqli_fetch_array($result)) {
    $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('I'.$i, $registro['puesto']);
    $i++;
    
}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="semanal.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
