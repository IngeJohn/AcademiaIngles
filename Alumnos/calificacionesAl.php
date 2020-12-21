<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: califiVeri.php");
    exit;
}

// Include config file
require_once "../Require/config.php";


//// php populate html table from mysql database
//date_default_timezone_set('UTC');
//
//    $peri = "";  
//    $per = "";  
//    $mes = date("n"); 
//    $year = date("Y"); 
//
//if ($mes >= 1 && $mes <= 6){
//    $per = 1;
//    $_SESSION["periodo"] = $peri = $per."-".$year;
//}else if($mes >= 8 && $mes <= 12){
//    $per = 2;
//    $_SESSION["periodo"] = $peri = $per."-".$year;
//}



$consulta1 = "SELECT  periodo, grupo FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '1'";
$consulta2 = "SELECT  periodo, grupo FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '2'";
$consulta3 = "SELECT  periodo, grupo FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '3'";
$consulta4 = "SELECT  periodo, grupo FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '4'";
$consulta5 = "SELECT  periodo, grupo FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '5'";
$consulta6 = "SELECT  periodo, grupo FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '6'";
$consulta7 = "SELECT  periodo, grupo FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '7'";
$consulta8 = "SELECT  periodo, grupo FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '8'";
$consulta9 = "SELECT  periodo, grupo FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '9'";

$resul1 = mysqli_query($link, $consulta1);
$resul2 = mysqli_query($link, $consulta2);
$resul3 = mysqli_query($link, $consulta3);
$resul4 = mysqli_query($link, $consulta4);
$resul5 = mysqli_query($link, $consulta5);
$resul6 = mysqli_query($link, $consulta6);
$resul7 = mysqli_query($link, $consulta7);
$resul8 = mysqli_query($link, $consulta8);
$resul9 = mysqli_query($link, $consulta9);

if (!$resul1) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $consulta1;
    die($message);
}
if (!$resul2) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $consulta2;
    die($message);
}
if (!$resul3) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $consulta3;
    die($message);
}
if (!$resul4) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $consulta4;
    die($message);
}
if (!$resul5) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $consulta5;
    die($message);
}
if (!$resul6) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $consulta6;
    die($message);
}
if (!$resul7) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $consulta7;
    die($message);
}

if (!$resul8) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $consulta8;
    die($message);
}

if (!$resul9) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $consulta9;
    die($message);
}


$row1 = mysqli_fetch_array($resul1);

if(isset($row1["periodo"])){
    $_SESSION["periodo1"] = $row1["periodo"];
}
if(isset($row1["grupo"])){
$_SESSION["grupo1"] = $row1["grupo"];
}

$row2 = mysqli_fetch_array($resul2);

if(isset($row2["periodo"])){
    $_SESSION["periodo2"] = $row2["periodo"];
}
if(isset($row2["grupo"])){
    $_SESSION["grupo2"] = $row2["grupo"];
}

$row3 = mysqli_fetch_array($resul3);

if(isset($row3["periodo"])){
    $_SESSION["periodo3"] = $row3["periodo"];
}
if(isset($row3["grupo"])){
    $_SESSION["grupo3"] = $row3["grupo"];
}

$row4 = mysqli_fetch_array($resul4);

if(isset($row4["periodo"])){
    $_SESSION["periodo4"] = $row4["periodo"];
}
if(isset($row4["grupo"])){
    $_SESSION["grupo4"] = $row4["grupo"];
}

$row5 = mysqli_fetch_array($resul5);

if(isset($row5["periodo"])){
    $_SESSION["periodo5"] = $row5["periodo"];
}
if(isset($row5["grupo"])){
    $_SESSION["grupo5"] = $row5["grupo"];
}

$row6 = mysqli_fetch_array($resul6);

if(isset($row6["periodo"])){
    $_SESSION["periodo6"] = $row6["periodo"];
}
if(isset($row6["grupo"])){
    $_SESSION["grupo6"] = $row6["grupo"];
}

$row7 = mysqli_fetch_array($resul7);

if(isset($row7["periodo"])){
    $_SESSION["periodo7"] = $row7["periodo"];
}
if(isset($row7["grupo"])){
    $_SESSION["grupo7"] = $row7["grupo"];
}

$row8 = mysqli_fetch_array($resul8);

if(isset($row8["periodo"])){
    $_SESSION["periodo8"] = $row8["periodo"];
}
if(isset($row8["grupo"])){
    $_SESSION["grupo8"] = $row8["grupo"];
}

$row9 = mysqli_fetch_array($resul6);

if(isset($row9["periodo"])){
    $_SESSION["periodo9"] = $row9["periodo"];
}
if(isset($row9["grupo"])){
    $_SESSION["grupo9"] = $row9["grupo"];
}





if(isset($_SESSION["periodo1"], $_SESSION["grupo1"])){
    $cons1 = "SELECT docentes.nombre, docentes.paterno, docentes.materno FROM docentes, gruposasignados WHERE docentes.idmaestro = gruposasignados.idmaestro     AND gruposasignados.periodo = '{$_SESSION["periodo1"]}' AND gruposasignados.nivel = '1' AND gruposasignados.grupo = '{$_SESSION["grupo1"]}'";
    
    $resu1 = mysqli_query($link, $cons1);
    
    if (!$resu1) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $cons1;
    die($message);
    }
    
    $rowM1 = mysqli_fetch_array($resu1);

    if(isset($rowM1["nombre"], $rowM1["paterno"], $rowM1["materno"])){
        $_SESSION["nombreM1"] = $rowM1["nombre"]." ".$rowM1["paterno"]." ".$rowM1["materno"];
    }
}

if(isset($_SESSION["periodo2"], $_SESSION["grupo2"])){
    $cons2 = "SELECT docentes.nombre, docentes.paterno, docentes.materno FROM docentes, gruposasignados WHERE docentes.idmaestro = gruposasignados.idmaestro     AND gruposasignados.periodo = '{$_SESSION["periodo2"]} ' AND gruposasignados.nivel = '2' AND gruposasignados.grupo = '{$_SESSION["grupo2"]}'";
    
    $resu2 = mysqli_query($link, $cons2);
    
    if (!$resu2) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $cons2;
    die($message);
    }
    
    $rowM2 = mysqli_fetch_array($resu2);

    if(isset($rowM2["nombre"], $rowM2["paterno"], $rowM2["materno"])){
        $_SESSION["nombreM2"] =  $rowM2["nombre"]." ".$rowM2["paterno"]." ".$rowM2["materno"];
    }

}

if(isset($_SESSION["periodo3"], $_SESSION["grupo3"])){
    $cons3 = "SELECT docentes.nombre, docentes.paterno, docentes.materno FROM docentes, gruposasignados WHERE docentes.idmaestro = gruposasignados.idmaestro     AND gruposasignados.periodo = '{$_SESSION["periodo3"]}'  AND gruposasignados.nivel = '3' AND gruposasignados.grupo = '{$_SESSION["grupo3"]}'";
    
    $resu3 = mysqli_query($link, $cons3);
    
    if (!$resu3) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $cons3;
    die($message);
    }
    
    $rowM3 = mysqli_fetch_array($resu3);

    if(isset($rowM3["nombre"], $rowM3["paterno"], $rowM3["materno"])){
        $_SESSION["nombreM3"] =  $rowM3["nombre"]." ".$rowM3["paterno"]." ".$rowM3["materno"];
    }

}

if(isset($_SESSION["periodo4"], $_SESSION["grupo4"])){
    $cons4 = "SELECT docentes.nombre, docentes.paterno, docentes.materno FROM docentes, gruposasignados WHERE docentes.idmaestro = gruposasignados.idmaestro     AND gruposasignados.periodo = '{$_SESSION["periodo4"]} ' AND gruposasignados.nivel = '4' AND gruposasignados.grupo = '{$_SESSION["grupo4"]}'";
    
    $resu4 = mysqli_query($link, $cons4);
    
    if (!$resu4) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $cons4;
    die($message);
    }
    
    $rowM4 = mysqli_fetch_array($resu4);

    if(isset($rowM4["nombre"], $rowM4["paterno"], $rowM4["materno"])){
        $_SESSION["nombreM4"] =  $rowM4["nombre"]." ".$rowM4["paterno"]." ".$rowM4["materno"];
    }
}

if(isset($_SESSION["periodo5"], $_SESSION["grupo5"])){
    $cons5 = "SELECT docentes.nombre, docentes.paterno, docentes.materno FROM docentes, gruposasignados WHERE docentes.idmaestro = gruposasignados.idmaestro     AND gruposasignados.periodo = '{$_SESSION["periodo5"]}'  AND gruposasignados.nivel = '5' AND gruposasignados.grupo = '{$_SESSION["grupo5"]}'";
    
    $resu5 = mysqli_query($link, $cons5);
    
    if (!$resu5) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $cons5;
    die($message);
    }
    
    $rowM5 = mysqli_fetch_array($resu5);

    if(isset($rowM5["nombre"], $rowM5["paterno"], $rowM5["materno"])){
        $_SESSION["nombreM5"] =  $rowM5["nombre"]." ".$rowM5["paterno"]." ".$rowM5["materno"];
    }
}

if(isset($_SESSION["periodo6"], $_SESSION["grupo6"])){
    $cons6 = "SELECT docentes.nombre, docentes.paterno, docentes.materno FROM docentes, gruposasignados WHERE docentes.idmaestro = gruposasignados.idmaestro     AND gruposasignados.periodo = '{$_SESSION["periodo6"]}'  AND gruposasignados.nivel = '6' AND gruposasignados.grupo = '{$_SESSION["grupo6"]}'";
    
    $resu6 = mysqli_query($link, $cons6);
    
    if (!$resu6) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $cons6;
    die($message);
    }
    
    $rowM6 = mysqli_fetch_array($resu6);

    if(isset($rowM6["nombre"], $rowM6["paterno"], $rowM6["materno"])){
        $_SESSION["nombreM6"] =  $rowM6["nombre"]." ".$rowM6["paterno"]." ".$rowM6["materno"];
    }
}

if(isset($_SESSION["periodo7"], $_SESSION["grupo7"])){
    $cons7 = "SELECT docentes.nombre, docentes.paterno, docentes.materno FROM docentes, gruposasignados WHERE docentes.idmaestro = gruposasignados.idmaestro     AND gruposasignados.periodo = '{$_SESSION["periodo7"]}'  AND gruposasignados.nivel = '7' AND gruposasignados.grupo = '{$_SESSION["grupo7"]}'";
    
    $resu7 = mysqli_query($link, $cons7);
    
    if (!$resu7) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $cons7;
    die($message);
    }
    
    $rowM7 = mysqli_fetch_array($resu7);

    if(isset($rowM7["nombre"], $rowM7["paterno"], $rowM7["materno"])){
        $_SESSION["nombreM7"] =  $rowM7["nombre"]." ".$rowM7["paterno"]." ".$rowM7["materno"];
    }
}

if(isset($_SESSION["periodo8"], $_SESSION["grupo8"])){
    $cons8 = "SELECT docentes.nombre, docentes.paterno, docentes.materno FROM docentes, gruposasignados WHERE docentes.idmaestro = gruposasignados.idmaestro     AND gruposasignados.periodo = '{$_SESSION["periodo8"]}'  AND gruposasignados.nivel = '8' AND gruposasignados.grupo = '{$_SESSION["grupo8"]}'";
    
    $resu8 = mysqli_query($link, $cons8);
    
    if (!$resu8) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $cons8;
    die($message);
    }
    
    $rowM8 = mysqli_fetch_array($resu8);

    if(isset($rowM8["nombre"], $rowM8["paterno"], $rowM8["materno"])){
        $_SESSION["nombreM8"] =  $rowM8["nombre"]." ".$rowM8["paterno"]." ".$rowM8["materno"];
    }
}

if(isset($_SESSION["periodo9"], $_SESSION["grupo9"])){
    $cons9 = "SELECT docentes.nombre, docentes.paterno, docentes.materno FROM docentes, gruposasignados WHERE docentes.idmaestro = gruposasignados.idmaestro     AND gruposasignados.periodo = '{$_SESSION["periodo9"]}'  AND gruposasignados.nivel = '9' AND gruposasignados.grupo = '{$_SESSION["grupo9"]}'";
    
    $resu9 = mysqli_query($link, $cons9);

    if (!$resu9) {
        $message  = 'Invalid query: ' . mysqli_error() . "\n";
        $message .= 'Whole query: ' . $cons9;
        die($message);
    }
    
    $rowM9 = mysqli_fetch_array($resu9);

    if(isset($rowM9["nombre"], $rowM9["paterno"], $rowM9["materno"])){
        $_SESSION["nombreM9"] =  $rowM9["nombre"]." ".$rowM9["paterno"]." ".$rowM9["materno"];
    }

}




$querypa1 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '1'";
$querypa2 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '2'";
$querypa3 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '3'";
$querypa4 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '4'";
$querypa5 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '5'";
$querypa6 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '6'";
$querypa7 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '7'";
$querypa8 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '8'";
$querypa9 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '9'";

$query1 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '1'";
$query2 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '2'";
$query3 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '3'";
$query4 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '4'";
$query5 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '5'";
$query6 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '6'";
$query7 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '7'";
$query8 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '8'";
$query9 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '9'";

$queryp1 = "SELECT  promedio FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '1'";
$queryp2 = "SELECT  promedio FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '2'";
$queryp3 = "SELECT  promedio FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '3'";
$queryp4 = "SELECT  promedio FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '4'";
$queryp5 = "SELECT  promedio FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '5'";
$queryp6 = "SELECT  promedio FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '6'";
$queryp7 = "SELECT  promedio FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '7'";
$queryp8 = "SELECT  promedio FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '8'";
$queryp9 = "SELECT  promedio FROM niveles WHERE  numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = '9'";

// resultpa1 
$resultpa1 = mysqli_query($link, $querypa1);
$resultpa2 = mysqli_query($link, $querypa2);
$resultpa3 = mysqli_query($link, $querypa3);
$resultpa4 = mysqli_query($link, $querypa4);
$resultpa5 = mysqli_query($link, $querypa5);
$resultpa6 = mysqli_query($link, $querypa6);
$resultpa7 = mysqli_query($link, $querypa7);
$resultpa8 = mysqli_query($link, $querypa8);
$resultpa9 = mysqli_query($link, $querypa9);


if (!$resultpa1) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa1;
    die($message);
}

if (!$resultpa2) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa2;
    die($message);
}

if (!$resultpa3) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa3;
    die($message);
}

if (!$resultpa4) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa4;
    die($message);
}

if (!$resultpa5) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa5;
    die($message);
}

if (!$resultpa6) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa6;
    die($message);
}

if (!$resultpa7) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa7;
    die($message);
}

if (!$resultpa8) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa8;
    die($message);
}

if (!$resultpa9) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa9;
    die($message);
}




$display1 = $display2 = $display3 = $display4 = $display5 = $display6 = $display7 = $display8 = $display9 = "";

// result1 
$result1 = mysqli_query($link, $query1);

if ($result1->num_rows === 0){
    $display1="display:none;";
}

if (!$result1) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query1;
    die($message);
    
}
// result2 
$result2 = mysqli_query($link, $query2);

if ($result2->num_rows === 0){
    $display2 ="display:none;";
}

if (!$result2) {
    $message  ='Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query2;
    die($message);
}
// result3 
$result3 = mysqli_query($link, $query3);

if ($result3->num_rows === 0){
    $display3 ="display:none;";
} 

if (!$result3) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query3;
    die($message);
}
// result4 
$result4 = mysqli_query($link, $query4);

if ($result4->num_rows === 0){
    $display4 ="display:none;";
}

if (!$result4) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query4;
    die($message);
}
// result5 
$result5 = mysqli_query($link, $query5);

if ($result5->num_rows === 0){
    $display5 ="display:none;";
}

if (!$result5) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query5;
    die($message);
}
// result6 
$result6 = mysqli_query($link, $query6);

if ($result6->num_rows === 0){
    $display6 ="display:none;";
}

if (!$result6) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query6;
    die($message);
}
// result7 
$result7 = mysqli_query($link, $query7);

if ($result7->num_rows === 0){
    $display7 ="display:none;";
}

if (!$result7) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query7;
    die($message);
}
// result8 
$result8 = mysqli_query($link, $query8);

if ($result8->num_rows === 0){
    $display8 ="display:none;";
}

if (!$result8) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query8;
    die($message);
}
// result9 
$result9 = mysqli_query($link, $query9);

if ($result9->num_rows === 0){
    $display9 ="display:none;";
}

if (!$result9) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query9;
    die($message);
}



// resultp1
$resultp1 = mysqli_query($link, $queryp1);

if (!$resultp1) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp1;
    die($message);
}
// resultp2 
$resultp2 = mysqli_query($link, $queryp2);

if (!$resultp2) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp2;
    die($message);
}
// resultp3 
$resultp3 = mysqli_query($link, $queryp3);

if (!$resultp3) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp3;
    die($message);
}
// resultp4 
$resultp4 = mysqli_query($link, $queryp4);

if (!$resultp4) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp4;
    die($message);
}
// resultp5
$resultp5 = mysqli_query($link, $queryp5);

if (!$resultp5) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp5;
    die($message);
}
// resultp6 
$resultp6 = mysqli_query($link, $queryp6);

if (!$resultp6) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp6;
    die($message);
}
// resultp7 
$resultp7 = mysqli_query($link, $queryp7);

if (!$resultp7) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp7;
    die($message);
}
// resultp8 
$resultp8 = mysqli_query($link, $queryp8);

if (!$resultp8) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp8;
    die($message);
}
// resultp9 
$resultp9 = mysqli_query($link, $queryp9);

if (!$resultp9) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp9;
    die($message);
}

$dataRowpa1 = "";
$dataRowpa2 = "";
$dataRowpa3 = "";
$dataRowpa4 = "";
$dataRowpa5 = "";
$dataRowpa6 = "";
$dataRowpa7 = "";
$dataRowpa8 = "";
$dataRowpa9 = "";

$dataRow1 = "";
$dataRow2 = "";
$dataRow3 = "";
$dataRow4 = "";
$dataRow5 = "";
$dataRow6 = "";
$dataRow7 = "";
$dataRow8 = "";
$dataRow9 = "";

$dataRowp1 = "";
$dataRowp2 = "";
$dataRowp3 = "";
$dataRowp4 = "";
$dataRowp5 = "";
$dataRowp6 = "";
$dataRowp7 = "";
$dataRowp8 = "";
$dataRowp9 = "";

$color = "";
$td = "</td>";

$counter1 = 0;
$counter2 = 0;
$counter3 = 0;
$counter4 = 0;
$counter5 = 0;
$counter6 = 0;
$counter7 = 0;
$counter8 = 0;
$counter9 = 0;

$color1 = "";
$color2 = "";
$color3 = "";
$color4 = "";
$color5 = "";
$color6 = "";
$color7 = "";
$color8 = "";
$color9 = "";

$est1 = "";
$est2 = "";
$est3 = "";
$est4 = "";
$est5 = "";
$est6 = "";
$est7 = "";
$est8 = "";
$est9 = "";



while($rowpa1 = mysqli_fetch_array($resultpa1)){
    
    $dataRowpa1 = $dataRowpa1."<th>&nbsp;$rowpa1[0]</th>";
    
}

while($row1 = mysqli_fetch_array($result1)){
    if ($row1[0] >= 70){
        $color = '<td style="color:#66F60E;font-weight: bold;">';
            
    }else{
        $color = '<td style="color:red;font-weight: bold;">';
            
        $counter1++;
    }
    
    $dataRow1 = $dataRow1.$color.$row1[0].$td;
    if ($counter1 > 0 ){
        $color1 = 'style="color:red;"';
        $est1 = "Nivel No acreditado";
    }else{
        $color1 = 'style="color:#66F60E;"';
        $est1 = "Nivel Acreditado";
    }
    
}

while($rowpa2 = mysqli_fetch_array($resultpa2)){
    
    $dataRowpa2 = $dataRowpa2."<th>&nbsp;$rowpa2[0]</th>";
    
}


while($row2 = mysqli_fetch_array($result2)){
    if ($row2[0] >= 70){
        $color = '<td style="color:#66F60E;font-weight: bold;">';
            
    }else{
        $color = '<td style="color:red;font-weight: bold;">';
        $counter2++;
            
    }
    
    $dataRow2 = $dataRow2.$color.$row2[0].$td;
    if ($counter2 > 0 ){
        $color2 = 'style="color:red;"';
        $est2 = "Nivel No acreditado";
    }else{
        $color2 = 'style="color:#66F60E;"';
        $est2 = "Nivel Acreditado";
    }
    
}

while($rowpa3 = mysqli_fetch_array($resultpa3)){
    
    $dataRowpa3 = $dataRowpa3."<th>&nbsp;$rowpa3[0]</th>";
    
}


while($row3 = mysqli_fetch_array($result3)){
    if ($row3[0] >= 70){
        $color = '<td style="color:#66F60E;font-weight: bold;">';
            
    }else{
        $color = '<td style="color:red;font-weight: bold;">';
        $counter3++;
            
    }
    
    $dataRow3 = $dataRow3.$color.$row3[0].$td;
    if ($counter3 > 0 ){
        $color3 = 'style="color:red;"';
        $est3 = "Nivel No acreditado";
    }else{
        $color3 = 'style="color:#66F60E;"';
        $est3 = "Nivel Acreditado";
    }
}

while($rowpa4 = mysqli_fetch_array($resultpa4)){
    
    $dataRowpa4 = $dataRowpa4."<th>&nbsp;$rowpa4[0]</th>";
    
}

while($row4 = mysqli_fetch_array($result4)){
    if ($row4[0] >= 70){
        $color = '<td style="color:#66F60E;font-weight: bold;">';
            
    }else{
        $color = '<td style="color:red;font-weight: bold;">';
        $counter4++;
            
    }
    
    $dataRow4 = $dataRow4.$color.$row4[0].$td;
    if ($counter4 > 0 ){
        $color4 = 'style="color:red;"';
        $est4 = "Nivel No acreditado";
    }else{
        $color4 = 'style="color:#66F60E;"';
        $est4 = "Nivel Acreditado";
    }
}

while($rowpa5 = mysqli_fetch_array($resultpa5)){
    
    $dataRowpa5 = $dataRowpa5."<th>&nbsp;$rowpa5[0]</th>";
    
}


while($row5 = mysqli_fetch_array($result5)){
    if ($row5[0] >= 70){
        $color = '<td style="color:#66F60E;font-weight: bold;">';
            
    }else{
        $color = '<td style="color:red;font-weight: bold;">';
        $counter5++;
            
    }
    
    $dataRow5 = $dataRow5.$color.$row5[0].$td;
    if ($counter5 > 0 ){
        $color5 = 'style="color:red;"';
        $est5 = "Nivel No acreditado";
    }else{
        $color5 = 'style="color:#66F60E;"';
        $est5 = "Nivel Acreditado";
    }
    
}


while($rowpa6 = mysqli_fetch_array($resultpa6)){
    
    $dataRowpa6 = $dataRowpa6."<th>&nbsp;$rowpa6[0]</th>";
    
}
while($row6 = mysqli_fetch_array($result6)){
    if ($row6[0] >= 70){
        $color = '<td style="color:#66F60E;font-weight: bold;">';
            
    }else{
        $color = '<td style="color:red;font-weight: bold;">';
        $counter6++;
            
    }
    
    $dataRow6 = $dataRow6.$color.$row6[0].$td;
    if ($counter6 > 0 ){
        $color6 = 'style="color:red;"';
        $est6 = "Nivel No acreditado";
    }else{
        $color6 = 'style="color:#66F60E;"';
        $est6 = "Nivel Acreditado";
    }
}

while($rowpa7 = mysqli_fetch_array($resultpa7)){
    
    $dataRowpa7 = $dataRowpa7."<th>&nbsp;$rowpa7[0]</th>";
    
}
while($row7 = mysqli_fetch_array($result7)){
    if ($row7[0] >= 70){
        $color = '<td style="color:#66F60E;font-weight: bold;">';
            
    }else{
        $color = '<td style="color:red;font-weight: bold;">';
        $counter7++;
            
    }
    
    $dataRow7 = $dataRow7.$color.$row7[0].$td;
    if ($counter7 > 0 ){
        $color7 = 'style="color:red;"';
        $est7 = "Nivel No acreditado";
    }else{
        $color7 = 'style="color:#66F60E;"';
        $est7 = "Nivel Acreditado";
    }
}

while($rowpa8 = mysqli_fetch_array($resultpa8)){
    
    $dataRowpa8 = $dataRowpa8."<th>&nbsp;$rowpa8[0]</th>";
    
}
while($row8 = mysqli_fetch_array($result8)){
    if ($row8[0] >= 70){
        $color = '<td style="color:#66F60E;font-weight: bold;">';
            
    }else{
        $color = '<td style="color:red;font-weight: bold;">';
        $counter8++;
            
    }
    
    $dataRow8 = $dataRow8.$color.$row8[0].$td;
    if ($counter8 > 0 ){
        $color8 = 'style="color:red;"';
        $est8 = "Nivel No acreditado";
    }else{
        $color8 = 'style="color:#66F60E;"';
        $est8 = "Nivel Acreditado";
    }
}

while($rowpa9 = mysqli_fetch_array($resultpa9)){
    
    $dataRowpa9 = $dataRowpa9."<th>&nbsp;$rowpa9[0]</th>";
    
}
while($row9 = mysqli_fetch_array($result9)){
    if ($row9[0] >= 70){
        $color = '<td style="color:#66F60E;font-weight: bold;">';
            
    }else{
        $color = '<td style="color:red;font-weight: bold;">';
        $counter9++;
            
    }
    
    $dataRow9 = $dataRow9.$color.$row9[0].$td;
    if ($counter9 > 0 ){
        $color9 = 'style="color:red;"';
        $est9 = "Nivel No acreditado";
    }else{
        $color9 = 'style="color:#66F60E;"';
        $est9 = "Nivel Acreditado";
    }
}





$rowp1 = mysqli_fetch_array($resultp1);

if(isset($rowp1["promedio"])){
    $_SESSION["pro1"] = $dataRowp1 = $rowp1["promedio"];
}

$rowp2 = mysqli_fetch_array($resultp2);

if(isset($rowp2["promedio"])){
    $_SESSION["pro2"] = $dataRowp2 = $rowp2["promedio"];
}

$rowp3 = mysqli_fetch_array($resultp3);

if(isset($rowp3["promedio"])){
    $_SESSION["pro3"] = $dataRowp3 = $rowp3["promedio"];
}

$rowp4 = mysqli_fetch_array($resultp4);

if(isset($rowp4["promedio"])){
    $_SESSION["pro4"] = $dataRowp4 = $rowp4["promedio"];
}

$rowp5 = mysqli_fetch_array($resultp5);

if(isset($rowp5["promedio"])){
    $_SESSION["pro5"] = $dataRowp5 = $rowp5["promedio"];
}

$rowp6 = mysqli_fetch_array($resultp6);

if(isset($rowp6["promedio"])){
    $_SESSION["pro6"] = $dataRowp6 = $rowp6["promedio"];
}

$rowp7 = mysqli_fetch_array($resultp7);

if(isset($rowp6["promedio"])){
    $_SESSION["pro7"] = $dataRowp7 = $rowp6["promedio"];
}

$rowp8 = mysqli_fetch_array($resultp8);

if(isset($rowp8["promedio"])){
    $_SESSION["pro8"] = $dataRowp8 = $rowp8["promedio"];
}

$rowp9= mysqli_fetch_array($resultp9);

if(isset($rowp9["promedio"])){
    $_SESSION["pro9"] = $dataRowp9 = $rowp9["promedio"];
}


mysqli_close($link);


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITSL - Consultar calificaciones</title>
    
    <link rel="stylesheet" href="../bootstrap/4.5.3/dist/css/bootstrap.min.css" 
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
          crossorigin="anonymous">
    
    <script src="../jquery/3.5.1/jquery-3.5.1.slim.min.js" 
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
            crossorigin="anonymous"></script>
    
    <script src="../bootstrap/4.5.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" 
            crossorigin="anonymous"></script>
    
    <link rel="icon" href="../imagenes/itsl2.png">
    
    <style type="text/css">
		body{
            background-color: #EAFAF1;
            
            }
        .logo{
            width: 50%;
            height: auto;
            padding-top: 30px;
        }
        header{
            background-color: #000000;
               }

        footer{
            background: #000000;
              }

        .redes{
            padding-left: 10px;
            color: white;
            font-size: 13px;
            line-height: 2;
                 }
        .tituloRedes{
            color: lightgray;
            padding-left: 10px;
            font-size: 16px;
        }
        .acerca{
            color: white;
            font-size: 13px;
            padding-left: 10px;
            line-height: 1.7;
               }
        .pie-letras{
            color: white;
            font-size: 13px;
            line-height: 1.7;
            padding-bottom: 20px;
         }
        .iconos{
            width: 18px;
            height: auto;
            padding-bottom: 3px;
        }
       .bordes{
            border-right-style:dotted;
            border-right-color:lightgray;
            border-right-width: 1px;
            margin: 20px 0 20px 0;
            height: 150px;
        }
        @media (max-width: 980px){

        }
                /*para pantallas de PC*/
        @media (max-width: 992px){
            .logo{
                width: 50%;
                height: auto;

            }
            
            
        }
        /* Para tablets*/
        @media screen and (max-width: 768px) {
            .logo{
                width: 80%;
                height: auto;
                padding: 10px 0 10px 0;
                
            }

        }
        
        /*Para dispositivos moviles*/
        @media screen and (max-width: 400px) {
            
            .logo{
                width: 80%;
                height: auto;
                padding: 10px 0 10px 0;
                
            }
            
        }
        div#tabla1 {
            display: none;
        }
        hr {
            border: none;
            height: 1px;
            /* Set the hr color */
            color: darkslategrey; /* old IE */
            background-color: darkgrey; /* Modern Browsers */
        }




    </style>
</head>


<body>

    <header>
        
            
        <div class="container-fluid">

            <div class="row">
                
                
                <div class="col-lg-8 col-xs-12 col-sm-12 col-md-12">
                    <img class="logo" src="../imagenes/itslnobreLargo.png" >
                </div>
                <div class="col-sm-4" style="text-align:center; padding-top:20px; ">
                    <img src="../imagenes/TecNMwhite.png" width="150px" height="auto" >
                </div>
                
                
                
                
               
                    
                    <div class="col-sm-12" style="text-align: center;">


                        <div class="btn-group" role="group">

                            <a href="../home.php" class="btn btn-outline-light" role="button" >Inicio</a>
                            
                            <a href="calificacionesAl.php" class="btn btn-outline-light active" role="button">Consulta de calificaciones</a>

                            <a href="califiVeri.php" class="btn btn-outline-light" role="button">Consultar otro estudiante</a>

                        </div>    
                    </div>
                
                
                


            </div>
        </div>

    </header>




    
    <div class="container" style="padding:60px 0 50px 0">
        <div class="row">
            <div class="col-sm-8" style="border: 2px solid black; border-radius: 5px;  padding: 20px;">
                <p><b>Información del alumno</b></p>
                <p><b>Alumno:</b> <?php echo $_SESSION["nombre"]." ".$_SESSION["paterno"]." ".$_SESSION["materno"]; ?>
                <p><b>Número de control:</b> <?php echo $_SESSION["numeroControl"]; ?></p>
                <a href="KardexPdf.php" target="_newtab" class="btn btn-primary">Imprimir Kardex</a>
            </div>
        </div>
    </div>
    
    
    
    
    
    <div class="container">

        <div class="row">
            <div class = "col-sm-7" style="<?php echo $display1;?>">
                <p style="font-size:20px;">Nivel 1 &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;periodo: <?php echo $_SESSION["periodo1"];?> &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Docente: Lic. <?php echo $_SESSION["nombreM1"];?></p>
                <div class="table-responsive">  
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Parcial</th>
                                <?php echo $dataRowpa1;?>

                            </tr>
                        </thead>
                        <tbody>
                            <th>Puntaje</th>
                            <?php echo $dataRow1;?>
                        </tbody>
                    </table>
                  </div>
                <p ><strong>Promedio: &nbsp;</strong><strong <?php echo $color1; ?>><?php echo $dataRowp1; echo "&nbsp; | &nbsp;".$est1;?></strong></p> 
                
                <p><b>Nivel equivalente: </b>A1</p>
                <label><b>Comentario: </b></label>
                
                <div style="border: 2px solid black; border-radius: 5px;  padding: 20px; ">
                  
                  <p>Excelente trabajo, excento en el parcial 3 y 5.</p>
                </div>
                
                <hr>
            </div>

            <div class = "col-sm-7" style="<?php echo $display2;?>">
                <p style="font-size:20px;">Nivel 2 &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;periodo: <?php echo $_SESSION["periodo2"];?>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Docente: Lic. <?php echo $_SESSION["nombreM2"];?></p>  
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Parcial</th>
                                <?php echo $dataRowpa2;?>
                            </tr>
                        </thead>
                        <tbody>
                            <th>Puntaje</th>
                            <?php echo $dataRow2;?>
                        </tbody>
                    </table>
              </div>
              <p ><strong>Promedio: &nbsp;</strong><strong <?php echo $color2; ?>><?php echo $dataRowp2; echo "&nbsp; | &nbsp;".$est2;?></strong></p> 
                
                
                 <p><b>Nivel equivalente: </b>A1</p>
                <label><b>Comentario: </b></label>
                
                <div style="border: 2px solid black; border-radius: 5px;  padding: 20px; ">
                  
                  <p>Excelente trabajo, excento en el parcial 3 y 5.</p>
                </div>
                
                
              <hr>
            </div>

            <div class = "col-sm-7" style="<?php echo $display3;?>">
                <p style="font-size:20px;">Nivel 3 &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;periodo: <?php echo $_SESSION["periodo3"];?>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Docente: Lic. <?php echo $_SESSION["nombreM3"];?></p>  
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Parcial</th>
                                <?php echo $dataRowpa3;?>
                            </tr>
                        </thead>
                        <tbody>
                            <th>Puntaje</th>
                            <?php echo $dataRow3;?>
                        </tbody>
                    </table>
                </div>
                <p ><strong>Promedio: &nbsp;</strong><strong <?php echo $color3; ?>><?php echo $dataRowp3; echo "&nbsp; | &nbsp;".$est3;?></strong></p> 
                
                 <p><b>Nivel equivalente: </b>A1</p>
                <label><b>Comentario: </b></label>
                
                <div style="border: 2px solid black; border-radius: 5px;  padding: 20px; ">
                  
                  <p>Excelente trabajo, excento en el parcial 3 y 5.</p>
                </div>
                
                
                
                <hr>
            </div>
        

        
            <div class = "col-sm-7" style="<?php echo $display4;?>">
                <p style="font-size:20px;">Nivel 4 &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;periodo: <?php echo $_SESSION["periodo4"];?>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Docente: Lic. <?php echo $_SESSION["nombreM4"];?></p>
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Parcial</th>
                                <?php echo $dataRowpa4;?>
                            </tr>
                        </thead>
                        <tbody>
                            <th>Puntaje</th>
                            <?php echo $dataRow4;?>
                        </tbody>
                    </table>
                </div>
                <p ><strong>Promedio: &nbsp;</strong><strong <?php echo $color4; ?>><?php echo $dataRowp4; echo "&nbsp; | &nbsp;".$est4;?></strong></p> 
                
                 <p><b>Nivel equivalente: </b>A1</p>
                <label><b>Comentario: </b></label>
                
                <div style="border: 2px solid black; border-radius: 5px;  padding: 20px; ">
                  
                  <p>Excelente trabajo, excento en el parcial 3 y 5.</p>
                </div>
                
                
                <hr>
            </div>

            <div class = "col-sm-7" style="<?php echo $display5;?>">
                <p style="font-size:20px;">Nivel 5 &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;periodo: <?php echo $_SESSION["periodo5"];?>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Docente: Lic. <?php echo $_SESSION["nombreM5"];?></p> 	  
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Parcial</th>
                                <?php echo $dataRowpa5;?>
                            </tr>
                        </thead>
                        <tbody>
                            <th>Puntaje</th>
                            <?php echo $dataRow5;?>
                        </tbody>
                    </table>
                </div>
                <p ><strong>Promedio: &nbsp;</strong><strong <?php echo $color5; ?>><?php echo $dataRowp5; echo "&nbsp; | &nbsp;".$est5;?></strong></p> 
                
                
                 <p><b>Nivel equivalente: </b>A1</p>
                <label><b>Comentario: </b></label>
                
                <div style="border: 2px solid black; border-radius: 5px;  padding: 20px; ">
                  
                  <p>Excelente trabajo, excento en el parcial 3 y 5.</p>
                </div>
                
                
                <hr>
            </div>

            <div class = "col-sm-7" style="<?php echo $display6;?>">
                <p style="font-size:20px;">Nivel 6 &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;periodo: <?php echo $_SESSION["periodo6"];?>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Docente: Lic. <?php echo $_SESSION["nombreM6"];?></p> 	  
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Parcial</th>
                                <?php echo $dataRowpa6;?>
                            </tr>
                        </thead>
                        <tbody>
                            <th>Puntaje</th>
                            <?php echo $dataRow6;?>
                        </tbody>
                    </table>
                </div>
                <p ><strong>Promedio: &nbsp;</strong><strong <?php echo $color6; ?>><?php echo $dataRowp6; echo "&nbsp; | &nbsp;".$est6;?></strong></p> 
                
                 <p><b>Nivel equivalente: </b>A1</p>
                <label><b>Comentario: </b></label>
                
                <div style="border: 2px solid black; border-radius: 5px;  padding: 20px; ">
                  
                  <p>Excelente trabajo, excento en el parcial 3 y 5.</p>
                </div>
                
                
                <hr>
            </div>
            
            <div class = "col-sm-7" style="<?php echo $display7;?>">
                <p style="font-size:20px;">Nivel 7 &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;periodo: <?php echo $_SESSION["periodo7"];?>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Docente: Lic. <?php echo $_SESSION["nombreM7"];?></p> 	  
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Parcial</th>
                                <?php echo $dataRowpa7;?>
                            </tr>
                        </thead>
                        <tbody>
                            <th>Puntaje</th>
                            <?php echo $dataRow7;?>
                        </tbody>
                    </table>
                </div>
                <p ><strong>Promedio: &nbsp;</strong><strong <?php echo $color7; ?>><?php echo $dataRowp7; echo "&nbsp; | &nbsp;".$est7;?></strong></p> 
                
                 <p><b>Nivel equivalente: </b>A1</p>
                <label><b>Comentario: </b></label>
                
                <div style="border: 2px solid black; border-radius: 5px;  padding: 20px; ">
                  
                  <p>Excelente trabajo, excento en el parcial 3 y 5.</p>
                </div>
                
                
                <hr>
            </div>
            
            <div class = "col-sm-7" style="<?php echo $display8;?>">
                <p style="font-size:20px;">Nivel 8 &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;periodo: <?php echo $_SESSION["periodo8"];?>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Docente: Lic. <?php echo $_SESSION["nombreM8"];?></p> 	  
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Parcial</th>
                                <?php echo $dataRowpa8;?>
                            </tr>
                        </thead>
                        <tbody>
                            <th>Puntaje</th>
                            <?php echo $dataRow8;?>
                        </tbody>
                    </table>
                </div>
                <p ><strong>Promedio: &nbsp;</strong><strong <?php echo $color8; ?>><?php echo $dataRowp8; echo "&nbsp; | &nbsp;".$est8;?></strong></p> 
                
                 <p><b>Nivel equivalente: </b>A1</p>
                <label><b>Comentario: </b></label>
                
                <div style="border: 2px solid black; border-radius: 5px;  padding: 20px; ">
                  
                  <p>Excelente trabajo, excento en el parcial 3 y 5.</p>
                </div>
                
                
                <hr>
            </div>
            
            <div class = "col-sm-7" style="<?php echo $display9;?>">
                <p style="font-size:20px;">Nivel 9 &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;periodo: <?php echo $_SESSION["periodo9"];?>&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Docente: Lic. <?php echo $_SESSION["nombreM6"];?></p> 	  
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Parcial</th>
                                <?php echo $dataRowpa9;?>
                            </tr>
                        </thead>
                        <tbody>
                            <th>Puntaje</th>
                            <?php echo $dataRow9;?>
                        </tbody>
                    </table>
                </div>
                <p ><strong>Promedio: &nbsp;</strong><strong <?php echo $color9; ?>><?php echo $dataRowp9; echo "&nbsp; | &nbsp;".$est9;?></strong></p> 
                
                 <p><b>Nivel equivalente: </b>A1</p>
                <label><b>Comentario: </b></label>
                
                <div style="border: 2px solid black; border-radius: 5px;  padding: 20px; ">
                  
                  <p>Excelente trabajo, excento en el parcial 3 y 5.</p>
                </div>
                
                
                <hr>
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row" style="background:#0a6d7a; ">
            <div class="col-md-3 bordes" >
                <p></p>
            </div>
            <div class="col-md-6 bordes" >

                <div class="row">
                    <div class="col-md-6" >
                        
                    </div>

                    <div class="col-md-6 " >
                         <p class="tituloRedes">Siguenos en redes sociales</p>
                         <p class="redes">
                            <img class="iconos" src="../imagenes/face.png">&emsp;Facebook<br>
                            <img class="iconos" src="../imagenes/insta.png">&emsp;Instagram<br>
                            <img class="iconos" src="../imagenes/twi.png">&emsp;Twitter<br>
                            <img class="iconos" src="../imagenes/yt.png">&emsp;YouTube<br>
                        </p>
                    </div>
                </div>
            </div>


        <div class="col-md-3 tituloRedes" style=" margin: 20px 0 20px 0;">
            <p style="color: lightgray; padding-left:10px;">Acerca de está Página Web</p>
            <p class="acerca">
                Cookies<br>
                Privacy policy<br>
            </p>
        </div>
    </div>

    </div>








<footer>
        <div class="container-fluid">
         <div class="row" style="background: black; color:white; text-align:center; ">
            <div class="col-md-3 bordes ">
                <p><img src="../imagenes/itslnobreLargo.png" style="width:60%; height:auto; padding-top:20px; "></p>
                <p class="pie-letras">© 2020 ITSL - English Academy</p>
            </div>
            <div class="col-md-6 bordes">
                <p></p>
            </div>
            <div class="col-md-3 ">
                <p></p>
            </div>
        </div>


    </div>


</footer>

</body>
</html>