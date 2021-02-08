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

if(isset($dataRow11[0])){$titulo = $dataRow11[0]."-".$dataRow11[1]."-".$dataRow11[2]."-".$dataRow11[3]."-".$dataRow11[4];

$fileName = date('d-m-Y')."_".$titulo.".xls";

//Set header information to export data in excel format
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$fileName);

//Set variable to false for heading
$heading = false;


echo utf8_decode("\nInstituto Tecnológico Superior de Loreto\n");

echo utf8_decode("\nAcademia de Inglés\n");

echo utf8_decode("\nLista de Alumos de ".$dataRow11[0].$dataRow11[1]. " de la carrera de Ingeniería (en) ".$dataRow11[2]." | Modalidad: ".$dataRow11[3]." | Periodo: ".$dataRow11[4]." \n");
                        
echo utf8_decode("\nProfesor: ".$_SESSION['titulo']." ".$_SESSION["nombre"]." ".$_SESSION["paterno"]." ".$_SESSION["materno"]." \n");

echo utf8_decode("\nNombre del alumno\tNúmero de Control\n");

    for($i=0; $i <= 60; $i++){
                                
        if(isset($numeros11[$i])){

            echo utf8_decode(alumnos($numeros11[$i],$dataRow11[0], $link)."\t".$numeros11[$i]. "\n");

        } 
    }
    
exit();
}
?>