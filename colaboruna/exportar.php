<?php

session_start();


if (! empty($_SESSION["usuario"])) 
  {

		header('Content-Type: text/html; charset=UTF-8');  
      }else{
    echo "<script> alert('No ha iniciado sesión!'); </script>";
    header('Location: ../index.html');
  }

$key = $_SESSION['usuario'];

$conexion = mysqli_connect("mysql.hostinger.es","u864262604_hares","hares08","u864262604_hares");
$row = "SELECT fecha, sede, actividad, diasColabora, horaInicio, horaFinal, horasTotal FROM tb_registroHoras  WHERE identificador = '".$key."' ORDER BY fecha asc";
$row2 = "SELECT cedula, nombreCompleto FROM tb_usuarios WHERE usuario = '".$key."'";

$resp2 = mysqli_query($conexion, $row2);
$result2= mysqli_fetch_assoc($resp2);


require('../fpdf/fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../img/colabouna-ICON.png' , 10,8, 18 , 20,'PNG');
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 15, 'COLABORUNA', 0);

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, utf8_decode('Reporte de Horas Colaboración'), 0);
$pdf->Ln(16);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(150, 10, utf8_decode('Cédula: ').$result2['cedula'], 0);
$pdf->Ln(6);
$pdf->Cell(150, 10, 'Nombre: '.$result2['nombreCompleto'], 0);
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 8, 'Fecha', 0);
$pdf->Cell(40, 8, 'Sede', 0);
$pdf->Cell(40, 8, 'Actividad', 0);
$pdf->Cell(25, 8, utf8_decode('Día'), 0);
$pdf->Cell(25, 8, 'Hora Inicial', 0);
$pdf->Cell(25, 8, 'Hora Final', 0);
$pdf->Cell(15, 8, utf8_decode('Colaboración'), 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA

$resp= mysqli_query($conexion, $row);
while($result = mysqli_fetch_array($resp)){

	$total = $total + $result['horasTotal'];
	
	$pdf->Cell(20, 8, $result['fecha'], 0);
	$pdf->Cell(40, 8, utf8_decode($result['sede']), 0);
	$pdf->Cell(40, 8, $result['actividad'], 0);
	$pdf->Cell(25, 8, utf8_decode($result['diasColabora']), 0);
	$pdf->Cell(25, 8, $result['horaInicio'], 0);
	$pdf->Cell(25, 8, $result['horaFinal'], 0);
	$pdf->Cell(25, 8, $result['horasTotal']."h", 0);
	$pdf->Ln(8);
}
$pdf->Ln(8);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(114,8,'Total de Horas:' .$total,0);


$pdf->Output();
?>