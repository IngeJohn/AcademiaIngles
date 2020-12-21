<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: califiVeri.php");
    exit;
}



//require('../fpdf181/fpdf.php');
require_once "../Require/config.php";


//========================================================================================================
//Grupos

$query = "SELECT gruposasignados.nivel, gruposasignados.grupo, gruposasignados.carrera, gruposasignados.modalidad, periodoactual.periodo FROM academia_ingles.gruposasignados, academia_ingles.periodoactual WHERE gruposasignados.periodo = periodoactual.periodo AND periodoactual.idperiodoactual = '1' AND gruposasignados.idmaestro = {$_SESSION["idmaestro"]};";

//$query = "SELECT  nivel, grupo, carrera, modalidad FROM `gruposasignados` WHERE idmaestro = {$_SESSION["idmaestro"]}";

$result = mysqli_query($link, $query);

if (!$result) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query;
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
$dataRow10 = array();
$dataRow11 = array();
$dataRow12 = array();

while($row = mysqli_fetch_array($result))
{
    if($contador == 0){
        
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow1[$i] = $row[$i];
            
        }
        
    }
    if($contador == 1){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow2[$i] = $row[$i];
            
        }
    }
    if($contador == 2){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow3[$i] = $row[$i];
        
        }
    }
    if($contador == 3){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow4[$i] = $row[$i];
        
        }
    }
    if($contador == 4){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow5[$i] = $row[$i];
        
        }
    }
    if($contador == 5){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow6[$i] = $row[$i];
        
        }
    }
    if($contador == 6){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow7[$i] = $row[$i];
        
        }
    }
    if($contador == 7){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow8[$i] = $row[$i];
        
        }
    }
    if($contador == 8){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow9[$i] = $row[$i];
        
        }
    }
    if($contador == 9){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow10[$i] = $row[$i];
        
        }
    }
    if($contador == 10){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow11[$i] = $row[$i];
        
        }
    }
    if($contador == 11){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow12[$i] = $row[$i];
        
        }
    }
    $contador++;
    
}






//=========================================================================================================
//Listado de números de control


function numeros( $nive, $grup, $carr, $idma, $moda, $peri, $link3 ){
    
    
    $query3 = "SELECT numeroControl FROM alumnos 
    WHERE nivelActual = '{$nive}' 
    AND grupoActual = '{$grup}'
    AND carrera = '{$carr}'
    AND idmaestroActual = '{$idma}' 
    AND modalidad = '{$moda}'
    AND periodoActual = '{$peri}' ORDER BY paterno ASC;";

    //$query = "SELECT  nivel, grupo, carrera, modalidad FROM `gruposasignados` WHERE idmaestro = {$_SESSION["idmaestro"]}";

    $result3 = mysqli_query($link3, $query3);

    if (!$result3) {
        $message  = 'Invalid query: ' . mysqli_error() . "\n";
        $message .= 'Whole query: ' . $query3;
        die($message);
    }

    $i = 0;

    $n = "";
    $numerosC = array();

    while($row = mysqli_fetch_array($result3))
    {

            $numerosC[$i] = $row[0];

            $i++;

    }
        
    return $numerosC;

}

//array para un nivel y un grupo.
$numeros1 = array();
$numeros2 = array();
$numeros3 = array();
$numeros4 = array();
$numeros5 = array();
$numeros6 = array();

if(isset($dataRow1[0])){$numeros1 = numeros($dataRow1[0],$dataRow1[1],$dataRow1[2],$_SESSION["idmaestro"],$dataRow1[3],$dataRow1[4],$link);}
if(isset($dataRow2[0])){$numeros2 = numeros($dataRow2[0],$dataRow2[1],$dataRow2[2],$_SESSION["idmaestro"],$dataRow2[3],$dataRow2[4],$link);}
if(isset($dataRow3[0])){$numeros3 = numeros($dataRow3[0],$dataRow3[1],$dataRow3[2],$_SESSION["idmaestro"],$dataRow3[3],$dataRow3[4],$link);}
if(isset($dataRow4[0])){$numeros4 = numeros($dataRow4[0],$dataRow4[1],$dataRow4[2],$_SESSION["idmaestro"],$dataRow4[3],$dataRow4[4],$link);}
if(isset($dataRow5[0])){$numeros5 = numeros($dataRow5[0],$dataRow5[1],$dataRow5[2],$_SESSION["idmaestro"],$dataRow5[3],$dataRow5[4],$link);}
if(isset($dataRow6[0])){$numeros6 = numeros($dataRow6[0],$dataRow6[1],$dataRow6[2],$_SESSION["idmaestro"],$dataRow6[3],$dataRow6[4],$link);}



//=========================================================================================================
function alumnos($num, $niv, $link2){   
global $j;
    
$query2 = "SELECT alumnos.nombre, alumnos.paterno, alumnos.materno, calificaciones.calificacion, calificaciones.parcial, calificaciones.id, calificaciones.comentario FROM alumnos, calificaciones WHERE alumnos.numeroControl = calificaciones.numeroControl AND alumnos.numeroControl = '{$num}' AND calificaciones.nivel = '{$niv}';";


$result2 = mysqli_query($link2, $query2);

if (!$result2) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query2;
    die($message);
}


$contador2 = 0;

$dataname = "";
$data1 = "";
$data2 = "";
$data3 = "";
$data4 = "";
$data5 = "";
$data6 = "";
$data7 = "";
$data8 = "";
$data9 = "";

$data1n = "";
$data2n = "";
$data3n = "";
$data4n = "";
$data5n = "";
$data6n = "";
$data7n = "";
$data8n = "";
$data9n = "";
    
$data1i = "";
$data2i = "";
$data3i = "";
$data4i = "";
$data5i = "";
$data6i = "";
$data7i = "";
$data8i = "";
$data9i = "";
    
$comentario = "";


if (mysqli_num_rows($result2)==0) { 

    
    $query2 = "SELECT nombre , paterno, materno FROM alumnos WHERE numeroControl = '{$num}';";


    $result2 = mysqli_query($link2, $query2);
    
    while($row = mysqli_fetch_array($result2)){

            if($contador2 == 0){

                $dataname = $row[0]." ".$row[1]." ".$row[2];

            }


            $contador2++;

        }


        $datos = $dataname;


        }else{

            while($row = mysqli_fetch_array($result2)){

                    if($contador2 == 0){

                        $dataname = $row[0]." ".$row[1]." ".$row[2];
                        $data1 = $row[3];
                        $data1n = $row[4];
                        $data1i = $row[5];
                        $comentario = $comentario."Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 1){
                        $data2 = $row[3];
                        $data2n = $row[4];
                        $data2i = $row[3];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 2){
                        $data3 = $row[3];
                        $data3n = $row[4];
                        $data3i = $row[5];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 3){
                        $data4 = $row[3];
                        $data4n = $row[4];
                        $data4i = $row[5];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 4){
                        $data5 = $row[3];
                        $data5n = $row[4];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 5){
                        $data6 = $row[3];
                        $data6n = $row[4];
                        $data5i = $row[5];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 6){
                        $data7 = $row[3];
                        $data7n = $row[4];
                        $data7i = $row[5];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 7){
                        $data8 = $row[3];
                        $data8n = $row[4];
                        $data8i = $row[5];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 8){
                        $data9 = $row[3];
                        $data9n = $row[4];
                        $data9i = $row[5];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }

                    $contador2++;

                }


                $datos = $dataname;


        }




        return $datos;
    }

//=========================================================================================================
date_default_timezone_set('America/Mexico_City');

if(isset($dataRow1[0])){$titulo = $dataRow1[0]."-".$dataRow1[1]."-".$dataRow1[2]."-".$dataRow1[3]."-".$dataRow1[4];

$fileName = date('d-m-Y')."_".$titulo.".xls";

//Set header information to export data in excel format
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$fileName);

//Set variable to false for heading
$heading = false;


echo utf8_decode("Instituto Tecnológico Superior de Loreto\n");

echo utf8_decode("Academia de Iglés\n");

echo utf8_decode("Ingeniería (en) ".$dataRow1[2]." | ".$dataRow1[3]." | ".$dataRow1[4]." \n");

echo utf8_decode("Lista de Alumos ".$dataRow1[0]." ".$dataRow1[1]. "\n");

    for($i=0; $i <= 60; $i++){
                                
        if(isset($numeros1[$i])){

            echo alumnos($numeros1[$i],$dataRow1[0], $link). "\n";

        } 
    }
    
exit();
}
?>