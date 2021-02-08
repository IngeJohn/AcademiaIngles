<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedinDo"]) || $_SESSION["loggedinDo"] !== true){
    header("location: califiVeri.php");
    exit;
}

require_once "pdfdatos.php";


//=========================================================================================================
date_default_timezone_set('America/Mexico_City');

if(isset($dataRow7[0])){$titulo = $dataRow7[0]."-".$dataRow7[1]."-".$dataRow7[2]."-".$dataRow7[3]."-".$dataRow7[4];

$fileName = date('d-m-Y')."_".$titulo.".xls";

//Set header information to export data in excel format
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$fileName);

//Set variable to false for heading
$heading = false;


echo utf8_decode("\nInstituto Tecnológico Superior de Loreto\n");

echo utf8_decode("\nAcademia de Inglés\n");

echo utf8_decode("\nLista de Alumos de ".$dataRow7[0].$dataRow7[1]. " de la carrera de Ingeniería (en) ".$dataRow7[2]." | Modalidad: ".$dataRow7[3]." | Periodo: ".$dataRow7[4]." \n");
                        
echo utf8_decode("\nProfesor: ".$_SESSION['titulo']." ".$_SESSION["nombre"]." ".$_SESSION["paterno"]." ".$_SESSION["materno"]." \n");

echo utf8_decode("\nNombre del alumno\tNúmero de Control\n");

    for($i=0; $i <= 60; $i++){
                                
        if(isset($numeros7[$i])){

            echo utf8_decode(alumnos($numeros7[$i],$dataRow7[0], $link)."\t".$numeros7[$i]. "\n");

        } 
    }
    
exit();
}
?>