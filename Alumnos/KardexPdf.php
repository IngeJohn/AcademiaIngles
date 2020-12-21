<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: califiVeri.php");
    exit;
}



require('../fpdf181/fpdf.php');
require_once "../Require/config.php";
class PDF extends FPDF{
    // Page header
    function Header(){
        // Logo
        $this->Image('../imagenes/logo5.png',11,2,180);
        $this->Ln(20);
        // Arial bold 15
        $this->SetFont('Courier','',11);
        // Move to the right
        //$this->Cell(60);
        // Title
        //$this->Cell(60,10,utf8_decode('Nombre            : Jonathan'),1,1,'C');
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer(){
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Courier','I',8);
        // Page number
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }
}

// php populate html table from mysql database



$consulta = "SELECT calificaciones.calificacion FROM calificaciones, alumnos WHERE calificaciones.numeroControl = {$_SESSION["numeroControl"]} AND calificaciones.numeroControl = alumnos.numeroControl AND calificaciones.nivel = alumnos.nivelActual";
//$resultado = $mysqli->query($consulta);

$result = mysqli_query($link, $consulta);
if (!$result) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query1;
    die($message);
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Courier','',12);

    $pdf->Cell(50,6,utf8_decode($_SESSION["numeroControl"]),0,1,'L');
    //$pdf->Cell(50,6,utf8_decode('ASIGNATURA:'),0,0,'L');
	$pdf->Cell(50,6,utf8_decode('LENGUA EXTRANJER'),0,1,'L');
	//$pdf->Cell(50,6,utf8_decode('Numero de Control:'),0,0,'L');
	//$pdf->Cell(50,6,utf8_decode('Nombre:'),0,0,'L');
	$pdf->Cell(50,6,utf8_decode(strtoupper($_SESSION["nombre"]." ".$_SESSION["paterno"]." ".$_SESSION["materno"])),0,1,'L');



    $pdf->SetFont('Courier','B',10);
	$pdf->Cell(50,9,utf8_decode('Nivel'),0,0,'L');
    $pdf->Cell(30,9,utf8_decode('Calificación'),0,0,'R');
    $pdf->Cell(30,9,utf8_decode('Periodo'),0,1,'R');
    //$pdf->Ln(20);

    //Linea <hr>
	$pdf->Line(10,75,200,75);
    $pdf->Line(10,138,200,138);
	
$pdf->SetFont('Courier','',10);	
$num = 1;


    $pdf->Cell(17,10,"Nivel ".$num,0,0,'R',0);
	$pdf->Cell(53,10,$_SESSION['pro1'],0,0,'R',0);
    $pdf->Cell(40,10,$_SESSION['periodo1'],0,1,'R',0);

    $pdf->Cell(17,10,"Nivel ".$num,0,0,'R',0);
	$pdf->Cell(53,10,$_SESSION['pro2'],0,0,'R',0);
    $pdf->Cell(40,10,$_SESSION['periodo2'],0,1,'R',0);

    $pdf->Cell(17,10,"Nivel ".$num,0,0,'R',0);
	$pdf->Cell(53,10,$_SESSION['pro3'],0,0,'R',0);
    $pdf->Cell(40,10,$_SESSION['periodo3'],0,1,'R',0);

    $pdf->Cell(17,10,"Nivel ".$num,0,0,'R',0);
	$pdf->Cell(53,10,$_SESSION['pro4'],0,0,'R',0);
    $pdf->Cell(40,10,$_SESSION['periodo4'],0,1,'R',0);

    $pdf->Cell(17,10,"Nivel ".$num,0,0,'R',0);
	$pdf->Cell(53,10,$_SESSION['pro5'],0,0,'R',0);
    $pdf->Cell(40,10,$_SESSION['periodo5'],0,1,'R',0);

    $pdf->Cell(17,10,"Nivel ".$num,0,0,'R',0);
	$pdf->Cell(53,10,$_SESSION['pro6'],0,0,'R',0);
    $pdf->Cell(40,10,$_SESSION['periodo6'],0,1,'R',0);

//while($row = $result->fetch_assoc()){
//	//$pdf->Cell(45,10,utf8_decode('NIVEL '),0,0,'L',0);
//	$pdf->Cell(17,10,"Nivel ".$num,0,0,'R',0);
//	$pdf->Cell(53,10,$row['calificacion'],0,1,'R',0);
//	$num++;
//}


$pdf->Output();
?>