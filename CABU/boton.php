<?php

//header('Content-Type: text/html; charset=UTF-8');
//utf8_decode("TelÃ©fono: ");
//echo utf8mb4_unicode_ci("TelÃ©fono: ");


$Apellidos = $_POST['Apellidos'];
$Nombre = $_POST['Nombre'];
$Edad = $_POST['Edad'];
$Direccion = $_POST['Direccion'];
$NT = $_POST['NT'];
$Telefono = $_POST['Telefono'];
$Curso = $_POST['Curso'];

$header = "X-Mailer: PHP/" . phpversion() . "\r\n";
$header .= "Mime-Version: 1.0 \r\n"; 
$header .= "Content-Type: text/plain";

$message = utf8_decode('Este mensaje fue enviado por: ' . $Nombre . "\r\n");
$message .= utf8_decode("Sus apellidos son: " . $Apellidos . "\r\n");
$message .= utf8_decode("Su tutor es: " . $NT . "\r\n");
$message .= utf8_decode("Teléfono de contacto: " . $Telefono . "\r\n");
$message .= utf8_decode("Su curso es: " . $Curso . "\r\n");

$para= 'Centro_Asesoria_BU@outlook.es';
$asunto= utf8_decode('Pre-inscripción');

 
mail($para, $asunto, $message);


	require('../CABU/fpdf.php');
	error_reporting(0);


	$doc=new FPDF();

	$doc->AddPage('LANDSCAPE');
	$doc->SetFont('Arial','B',12);
	$doc->Ln();
	$doc->SetY(45);
	$doc->Cell(0, 5, 'Datos del estudiante.',1,0,'C');
	$doc->SetFont('Arial','',18);
	$doc->Ln(20);
	$doc->Cell(100,14,utf8_decode('Nombre: '.$_POST['Nombre']) ,0,2,'L');
	$doc->Cell(100,14,utf8_decode('Apellidos: '.$_POST['Apellidos']) ,0,2,'L');
	$doc->Cell(100,14,utf8_decode('Edad: '.$_POST['Edad']) ,0,2,'L');
	$doc->Cell(100,14,utf8_decode('Dirección: '.$_POST['Direccion']) ,0,2,'L');
	$doc->Cell(100,14,utf8_decode('Nombre del Tutor: '.$_POST['NT']) ,0,2,'L');
	$doc->Cell(100,14,utf8_decode('Teléfono: '.$_POST['Telefono']) ,0,2,'L');
	$doc->Cell(100,14,utf8_decode('Curso: '.$_POST['Curso']) ,0,2,'L');


	$doc->Output('I','Ficha Pre-inscripción.pdf');




//header("Location: inicio.html");
?>