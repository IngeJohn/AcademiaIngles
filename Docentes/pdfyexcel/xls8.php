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

if(isset($dataRow9[0])){$titulo = $dataRow9[0]."-".$dataRow9[1]."-".$dataRow9[2]."-".$dataRow9[3]."-".$dataRow9[4];

$fileName = date('d-m-Y')."_".$titulo.".xls";

//Set header information to export data in excel format
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$fileName);

//Set variable to false for heading
$heading = false;


echo utf8_decode("\nInstituto Tecnológico Superior de Loreto\n");

echo utf8_decode("\nAcademia de Inglés\n");

echo utf8_decode("\nLista de Alumos de ".$dataRow9[0].$dataRow9[1]. " de la carrera de Ingeniería (en) ".$dataRow9[2]." | Modalidad: ".$dataRow9[3]." | Periodo: ".$dataRow9[4]." \n");
                        
echo utf8_decode("\nProfesor: ".$_SESSION['titulo']." ".$_SESSION["nombre"]." ".$_SESSION["paterno"]." ".$_SESSION["materno"]." \n");

echo utf8_decode("\nNombre del alumno\tNúmero de Control\n");

    for($i=0; $i <= 60; $i++){
                                
        if(isset($numeros9[$i])){

            echo utf8_decode(alumnos($numeros9[$i],$dataRow9[0], $link)."\t".$numeros9[$i]. "\n");

        } 
    }
    
exit();
}
?>