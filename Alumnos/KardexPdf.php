<?php
    // Initialize the session
    session_start();
    
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedinAl"]) || $_SESSION["loggedinAl"] !== true){
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
            $this->Ln(15);
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
    

    
    $consulta = "SELECT gruposasignados.nivel, gruposasignados.grupo, gruposasignados.modalidad, gruposasignados.periodo, niveles.promedio, niveles.estado 
FROM niveles, gruposasignados WHERE niveles.numeroControl = {$_SESSION["numeroControl"]} AND gruposasignados.idgrupo = niveles.idgrupo;";
    //$resultado = $mysqli->query($consulta);
    
    $result = mysqli_query($link, $consulta);
    if (!$result) {
        $message  = 'Invalid query: ' . mysqli_error() . "\n";
        $message .= 'Whole query: ' . $consulta;
        die($message);
    }
    
    
    $contador = 0;
    
    $dataRow1 = array();
    $dataRow2 = array();
    $dataRow3 = array();
    $dataRow4 = array();
    $dataRow5 = array();
    $dataRow6 = array();
    $dataRow7 = array();
    $dataRow8 = array();
    $dataRow9 = array();
    
    
    while($row = mysqli_fetch_array($result)){
        
        if($contador == 0){
            
            for ($i = 0; $i <= 5; $i++) {
                
                $dataRow1[$i] = $row[$i];
                
            }
            
        }
        if($contador == 1){
            for ($i = 0; $i <= 5; $i++) {
                
                $dataRow2[$i] = $row[$i];
                
            }
        }
        if($contador == 2){
            for ($i = 0; $i <= 5; $i++) {

                $dataRow3[$i] = $row[$i];

            }
        }
        if($contador == 3){
            for ($i = 0; $i <= 5; $i++) {
                
                $dataRow4[$i] = $row[$i];
                
            }
        }
        if($contador == 4){
            for ($i = 0; $i <= 5; $i++) {
                
                $dataRow5[$i] = $row[$i];
                
            }
        }
        if($contador == 5){
            for ($i = 0; $i <= 5; $i++) {
                
                $dataRow6[$i] = $row[$i];
                
            }
        }
        if($contador == 6){
            for ($i = 0; $i <= 5; $i++) {
                
                $dataRow7[$i] = $row[$i];
                
            }
        }
        if($contador == 7){
            for ($i = 0; $i <= 5; $i++) {
                
                $dataRow8[$i] = $row[$i];
                
            }
        }
        if($contador == 8){
            for ($i = 0; $i <= 5; $i++) {
                
                $dataRow9[$i] = $row[$i];
                
            }
        }
        if($contador == 9){
            for ($i = 0; $i <= 5; $i++) {
                
                $dataRow10[$i] = $row[$i];
                
            }
        }
        
        $contador++;
        
    }
    
    
    // Instanciation of inherited class
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Courier','',12);
        
        $pdf->Cell(40,6,utf8_decode("NÚMERO DE CONTROL: ".$_SESSION["numeroControl"]),0,1,'L');
        $pdf->Cell(40,6,utf8_decode('ASIGNATURA: LENGUA EXTRANJERA'),0,1,'L');
        $pdf->Cell(0,6,utf8_decode("NOMBRE DEL ALUMNO: ".strtoupper($_SESSION["nombre"]." ".$_SESSION["paterno"]." ".$_SESSION["materno"])),0,1,'L');
        $pdf->Cell(40,6,utf8_decode(""),0,1,'L');
        //$pdf->Cell(40,6,utf8_decode(""),0,1,'L');
        
        
        $pdf->SetFont('Courier','B',10);
        $pdf->Cell(15,9,utf8_decode('Nivel'),0,0,'L');
        $pdf->Cell(25,9,utf8_decode('Grupo'),0,0,'L');
        $pdf->Cell(30,9,utf8_decode('Modalidad'),0,0,'L');
        $pdf->Cell(30,9,utf8_decode('Periodo'),0,0,'L');
        $pdf->Cell(45,9,utf8_decode('Calificación'),0,0,'L');
        $pdf->Cell(30,9,utf8_decode('Estado'),0,1,'L');
        //$pdf->Ln(20);
        
        $li = 76;
        
        //Linea <hr>
        $pdf->Line(10,76,200,76);
        
        
    $pdf->SetFont('Courier','',10);	
    $num = 1;
    

    if(isset($dataRow1[0])){
        $pdf->Cell(20,10," ".$dataRow1[0],0,0,'L',0);
        $pdf->Cell(18,10,$dataRow1[1],0,0,'L',0);
        $pdf->Cell(33,10,$dataRow1[2],0,0,'L',0);
        $pdf->Cell(35,10,$dataRow1[3],0,0,'L',0);
        $pdf->Cell(36,10,$dataRow1[4],0,0,'L',0);
        $pdf->Cell(30,10,$dataRow1[5],0,1,'L',0);
        $li = $li+10;
    }else{

    }

    if(isset($dataRow2[0])){
        $pdf->Cell(20,10," ".$dataRow2[0],0,0,'L',0);
        $pdf->Cell(18,10,$dataRow2[1],0,0,'L',0);
        $pdf->Cell(33,10,$dataRow2[2],0,0,'L',0);
        $pdf->Cell(35,10,$dataRow2[3],0,0,'L',0);
        $pdf->Cell(36,10,$dataRow2[4],0,0,'L',0);
        $pdf->Cell(30,10,$dataRow2[5],0,1,'L',0);
        $li = $li+10;
    }else{
        
    }

    if(isset($dataRow3[0])){
        $pdf->Cell(20,10," ".$dataRow3[0],0,0,'L',0);
        $pdf->Cell(18,10,$dataRow3[1],0,0,'L',0);
        $pdf->Cell(33,10,$dataRow3[2],0,0,'L',0);
        $pdf->Cell(35,10,$dataRow3[3],0,0,'L',0);
        $pdf->Cell(36,10,$dataRow3[4],0,0,'L',0);
        $pdf->Cell(30,10,$dataRow3[5],0,1,'L',0);
        $li = $li+10;
    }else{
        
    }

    if(isset($dataRow4[0])){
        $pdf->Cell(20,10," ".$dataRow4[0],0,0,'L',0);
        $pdf->Cell(18,10,$dataRow4[1],0,0,'L',0);
        $pdf->Cell(33,10,$dataRow4[2],0,0,'L',0);
        $pdf->Cell(35,10,$dataRow4[3],0,0,'L',0);
        $pdf->Cell(36,10,$dataRow4[4],0,0,'L',0);
        $pdf->Cell(30,10,$dataRow4[5],0,1,'L',0);
        $li = $li+10;
    }else{
        
    }

    if(isset($dataRow5[0])){
        $pdf->Cell(20,10," ".$dataRow5[0],0,0,'L',0);
        $pdf->Cell(18,10,$dataRow5[1],0,0,'L',0);
        $pdf->Cell(33,10,$dataRow5[2],0,0,'L',0);
        $pdf->Cell(35,10,$dataRow5[3],0,0,'L',0);
        $pdf->Cell(36,10,$dataRow5[4],0,0,'L',0);
        $pdf->Cell(30,10,$dataRow5[5],0,1,'L',0);
        $li = $li+10;
    }else{
       
    }


    if(isset($dataRow6[0])){
        $pdf->Cell(20,10," ".$dataRow6[0],0,0,'L',0);
        $pdf->Cell(18,10,$dataRow6[1],0,0,'L',0);
        $pdf->Cell(33,10,$dataRow6[2],0,0,'L',0);
        $pdf->Cell(35,10,$dataRow6[3],0,0,'L',0);
        $pdf->Cell(36,10,$dataRow6[4],0,0,'L',0);
        $pdf->Cell(30,10,$dataRow6[5],0,1,'L',0);
        $li = $li+10;
    }else{
        
    }


    if(isset($dataRow7[0])){
        $pdf->Cell(20,10," ".$dataRow7[0],0,0,'L',0);
        $pdf->Cell(18,10,$dataRow7[1],0,0,'L',0);
        $pdf->Cell(33,10,$dataRow7[2],0,0,'L',0);
        $pdf->Cell(35,10,$dataRow7[3],0,0,'L',0);
        $pdf->Cell(36,10,$dataRow7[4],0,0,'L',0);
        $pdf->Cell(30,10,$dataRow7[5],0,1,'L',0);
        $li = $li+10;
    }else{
       
    }

        
    if(isset($dataRow8[0])){
        $pdf->Cell(20,10," ".$dataRow8[0],0,0,'L',0);
        $pdf->Cell(18,10,$dataRow8[1],0,0,'L',0);
        $pdf->Cell(33,10,$dataRow8[2],0,0,'L',0);
        $pdf->Cell(35,10,$dataRow8[3],0,0,'L',0);
        $pdf->Cell(36,10,$dataRow8[4],0,0,'L',0);
        $pdf->Cell(30,10,$dataRow8[5],0,1,'L',0);
        $li = $li+10;
    }else{
       
    }    
    
    
    if(isset($dataRow9[0])){
        $pdf->Cell(20,10," ".$dataRow9[0],0,0,'L',0);
        $pdf->Cell(18,10,$dataRow9[1],0,0,'L',0);
        $pdf->Cell(33,10,$dataRow9[2],0,0,'L',0);
        $pdf->Cell(35,10,$dataRow9[3],0,0,'L',0);
        $pdf->Cell(36,10,$dataRow9[4],0,0,'L',0);
        $pdf->Cell(30,10,$dataRow9[5],0,1,'L',0);
        $li = $li+10;
    }else{
       
    }
        
    $pdf->Line(10,$li,200,$li);
        

        
    
    
    
    //while($row = $result->fetch_assoc()){
    //	//$pdf->Cell(45,10,utf8_decode('NIVEL '),0,0,'L',0);
    //	$pdf->Cell(17,10,"Nivel ".$num,0,0,'R',0);
    //	$pdf->Cell(53,10,$row['calificacion'],0,1,'R',0);
    //	$num++;
    //}
    
    
    $pdf->Output();
?>