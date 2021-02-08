<?php

require_once "../../Require/config.php";




date_default_timezone_set('America/Mexico_City');

    $peri = "";  
    $per = "";  
    $mes = date("n"); 
    $year = date("Y"); 

if ($mes >= 1 && $mes <= 6){
    $per = 1;
    $peri = "Periodo: ".$per."-".$year;
}else if($mes >= 8 && $mes <= 12){
    $per = 2;
    $peri = "Periodo: ".$per."-".$year;
    
}


$periodoActu = $per."-".$year;






if ($stmt3 = $link->prepare("SELECT  periodo FROM periodoactual")) {
    $stmt3->execute();

    /* bind variables to prepared statement */
    $stmt3->bind_result($periActuBD);

    /* fetch values */
$stmt3->fetch();

    /* close statement */
    $stmt3->close();
}

//========================================================================================================
//Grupos

$query = "SELECT nivel, grupo, carrera, modalidad, periodo, idgrupo FROM gruposasignados WHERE idmaestro = {$_SESSION["idmaestro"]} AND periodo = '{$periActuBD}';";

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
    if($contador == 10){
        for ($i = 0; $i <= 5; $i++) {
            
            $dataRow11[$i] = $row[$i];
        
        }
    }
    if($contador == 11){
        for ($i = 0; $i <= 5; $i++) {
            
            $dataRow12[$i] = $row[$i];
        
        }
    }
    $contador++;
    
}






//=========================================================================================================
//Listado de números de control


function numeros( $idgrupo, $link3 ){
    
    
    $query3 = "SELECT numeroControl FROM alumnos 
    WHERE idgrupoActual = '{$idgrupo}' 
    ORDER BY paterno ASC;";


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
$numeros7 = array();
$numeros8 = array();
$numeros9 = array();
$numeros10 = array();
$numeros11 = array();
$numeros12 = array();


if(isset($dataRow1[5])){$numeros1 = numeros($dataRow1[5],$link);}
if(isset($dataRow2[5])){$numeros2 = numeros($dataRow2[5],$link);}
if(isset($dataRow3[5])){$numeros3 = numeros($dataRow3[5],$link);}
if(isset($dataRow4[5])){$numeros4 = numeros($dataRow4[5],$link);}
if(isset($dataRow5[5])){$numeros5 = numeros($dataRow5[5],$link);}
if(isset($dataRow6[5])){$numeros6 = numeros($dataRow6[5],$link);}
if(isset($dataRow7[5])){$numeros7 = numeros($dataRow7[5],$link);}
if(isset($dataRow8[5])){$numeros8 = numeros($dataRow8[5],$link);}
if(isset($dataRow9[5])){$numeros9 = numeros($dataRow9[5],$link);}
if(isset($dataRow10[5])){$numeros10 = numeros($dataRow10[5],$link);}
if(isset($dataRow11[5])){$numeros11 = numeros($dataRow11[5],$link);}
if(isset($dataRow12[5])){$numeros12 = numeros($dataRow12[5],$link);}



//=========================================================================================================
function alumnos($num, $idg, $link2){   
global $j;
    
$query2 = "SELECT alumnos.nombre, alumnos.paterno, alumnos.materno, calificaciones.calificacion, calificaciones.unidadTema, calificaciones.id, calificaciones.comentario FROM alumnos, calificaciones WHERE alumnos.numeroControl = calificaciones.numeroControl AND alumnos.numeroControl = '{$num}' AND calificaciones.idgrupo = '{$idg}' AND alumnos.idgrupoActual = calificaciones.idgrupo;";


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

    
    $query2 = "SELECT nombre , paterno, materno FROM alumnos WHERE numeroControl = '{$num}' ORDER BY paterno ASC;";


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


                $datos = $dataname
                               ;


        }




        return $datos;
    }

//=========================================================================================================


?>