<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedinAd"]) || $_SESSION["loggedinAd"] !== true ){
    header("location: logoutAd.php");
    
}


// Check if the user is logged in, if not then redirect to login page
if($_SESSION["roll"] !== 1){
    header("location: logoutAd.php");
}
// Include config file
require_once "../Require/config.php";



date_default_timezone_set('America/Mexico_City');

    $peri = "";  
    $per = "";  
    $mes = date("n"); 
    $year = date("Y"); 
    $day = date("d");

    $fecha = $day."-".$mes."-".$year;

if ($mes >= 1 && $mes <= 6){
    $per = 1;
    $peri = "Periodo: ".$per."-".$year;
}else if($mes >= 8 && $mes <= 12){
    $per = 2;
    $peri = "Periodo: ".$per."-".$year;
    
}


$periodoActu = $per."-".$year;




//================================================================================================================================================


if ($stmt3 = $link->prepare("SELECT  periodo FROM periodoactual")) {
    $stmt3->execute();

    /* bind variables to prepared statement */
    $stmt3->bind_result($periActuBD);

    /* fetch values */
$stmt3->fetch();

    /* close statement */
    $stmt3->close();
}





//==============================================================================================================================================



if ($stmtU = $link->prepare("SELECT username FROM docentes WHERE idmaestro = '{$_SESSION['idmaestro']}';")) {
    $stmtU->execute();

    /* bind variables to prepared statement */
    $stmtU->bind_result($usuario);

    /* fetch values */
   $stmtU->fetch();
    /* close statement */
    $stmtU->close();
  }

//================================================================================================================================================

function matriculaTotal(){
    
    global $link,$periActuBD;
    
    if ($stmt = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados WHERE gruposasignados.periodo = '{$periActuBD}' AND gruposasignados.idgrupo = alumnos.idgrupoActual;")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($matriculaTotal);

    /* fetch values */
    $stmt->fetch();
    /* close statement */
    $stmt->close();
  }
    
    return $matriculaTotal;
    
}


//================================================================================================================================================


function matriculaTotalCLEH(){
    
    global $link,$periActuBD;
    
    if ($stmt = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados WHERE gruposasignados.periodo = '{$periActuBD}' AND gruposasignados.idgrupo = alumnos.idgrupoActual AND alumnos.sexo = 'H';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($talumnos);

    /* fetch values */
    $stmt->fetch();
    /* close statement */
    $stmt->close();
  }
    
    return $talumnos;
    
}

//================================================================================================================================================


function matriculaTotalCLEM(){
    
    global $link,$periActuBD;
    
    if ($stmt = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados WHERE gruposasignados.periodo = '{$periActuBD}' AND gruposasignados.idgrupo = alumnos.idgrupoActual AND alumnos.sexo = 'M';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($talumnos);

    /* fetch values */
    $stmt->fetch();
    /* close statement */
    $stmt->close();
  }
    
    return $talumnos;
    
}

//================================================================================================================================================


function talumnosrepro1ay2aOp($niv,$carr,$idmaes,$perio,$par,$link){
    
    global $link;
    
    if ($stmt = $link->prepare("SELECT COUNT(numeroControl) FROM calificaciones WHERE idmaestro = '{$idmaes}' AND periodo = '{$perio}' AND carrera = '{$carr}' AND nivel = '{$niv}' AND oportunidad = '1aOp' AND calificacion <= 69 AND parcial = '{$par}';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($talumnos);

    /* fetch values */
    $stmt->fetch();
    /* close statement */
    $stmt->close();
  }
    if ($stmt1 = $link->prepare("SELECT COUNT(numeroControl) FROM calificaciones WHERE idmaestro = '{$idmaes}' AND periodo = '{$perio}' AND carrera = '{$carr}' AND nivel = '{$niv}' AND oportunidad = '2aOp' AND calificacion <= 69 AND parcial = '{$par}';")) {
    $stmt1->execute();

    /* bind variables to prepared statement */
    $stmt1->bind_result($talumnos2);

    /* fetch values */
    $stmt1->fetch();
    /* close statement */
    $stmt1->close();
  }
    
    return $talumnos+$talumnos2;
    
}

//================================================================================================================================================


function talumnosbajas($niv,$carr,$idmaes,$perio,$link){
    
    global $link;
    
    if ($stmt = $link->prepare("SELECT COUNT(numeroControl) FROM alumnos WHERE idmaestroActual = '{$idmaes}' AND periodoActual = '{$perio}' AND carrera = '{$carr}' AND nivelActual = '{$niv}' AND estadoAcademico = 0 ;")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($talumnos);

    /* fetch values */
    $stmt->fetch();
    /* close statement */
    $stmt->close();
  }
    
    return $talumnos;
    
}

//================================================================================================================================================


function numeroparciales($niv,$carr,$idmaes,$perio,$link){
    
    global $link;
    
    if ($stmt = $link->prepare("SELECT COUNT(distinct parcial) FROM calificaciones WHERE idmaestro = '{$idmaes}' AND periodo = '{$perio}' AND carrera = '{$carr}' AND nivel = '{$niv}';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($talumnos);

    /* fetch values */
    $stmt->fetch();
    /* close statement */
    $stmt->close();
  }
    
    return $talumnos;
    
}

//================================================================================================================================================


function numerogrupos($idmaes,$perio,$link){
    
    global $link;
    
    if ($stmt = $link->prepare("SELECT COUNT(id) FROM gruposasignados WHERE idmaestro = '{$idmaes}' AND periodo = '{$perio}';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($talumnos);

    /* fetch values */
    $stmt->fetch();
    /* close statement */
    $stmt->close();
  }
    
    return $talumnos;
    
}



//================================================================================================================================================
function asignaturasdiferentes($idmaes,$perio,$link){
    
    global $link;
    
    if ($stmt = $link->prepare("SELECT count(distinct nivel) FROM academia_ingles.gruposasignados WHERE idmaestro = '{$idmaes}' AND periodo = '{$perio}';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($talumnos);

    /* fetch values */
    $stmt->fetch();
    /* close statement */
    $stmt->close();
  }
    
    return $talumnos;
    
}



//================================================================================================================================================

$matriculaTotal = matriculaTotal();
$matriculaTotalCLEM = matriculaTotalCLEM();
$matriculaTotalCLEH = matriculaTotalCLEH();
   // $talumnospormateria = talumnospormateria($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$row[2],$link);
    //$talumnospormateria1aOp = talumnospormateria1aOp($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$row[2],$link);
    //$talumnospormateria2aOp = talumnospormateria2aOp($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$row[2],$link);
   // $talumnosrepro1ay2aOp = talumnosrepro1ay2aOp($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$row[2],$link);
  //  $talumnosbajas = talumnosbajas($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$link);
  //  $numeroparciales = numeroparciales($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$link);

$dataRow1 = "<tr style='text-align:center;'>
                <th>Inglés</th>
                <td>$matriculaTotalCLEM</td>
                <td>$matriculaTotalCLEH</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>";

$dataRow2 = "<tr style='text-align:center;'>
                            <th>TOTAL</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>" ;

$dataRow3 = "<tr style='text-align:center;'>
                            <th>Francés</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th>Alemán</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th>Italiano</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th>Japones</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th>Portugués</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th>Otros (especifiar)*</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>" ;



//=====================================================================================================================





$dataRow4 = "<tr style='text-align:center;'>
                <th>Inglés</th>
                <td>$matriculaTotalCLEM</td>
                <td>$matriculaTotalCLEH</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>";

$dataRow5 = "<tr style='text-align:center;'>
                            <th>TOTAL</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>" ;

$dataRow6 = "<tr style='text-align:center;'>
                            <th>Francés</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th>Alemán</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th>Italiano</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th>Japones</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th>Portugués</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th>Otros (especifiar)*</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>" ;


//=====================================================================================================================
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reportes</title>
    
    <link rel="stylesheet" href="../bootstrap/4.5.3/dist/css/bootstrap.min.css" 
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
          crossorigin="anonymous">
    
        <script src="../jquery/3.5.1/jquery-3.5.1.slim.min.js" 
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
            crossorigin="anonymous"></script>
    
        <script src="../bootstrap/4.5.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" 
            crossorigin="anonymous"></script>
    
    
    <link rel="stylesheet" href="../pure/0.5.0/pure-min.css">
    


    
    <script type="text/javascript" src="../direcciones/localidadesReins.js"></script>

    
    
    
    
            
    
    <link rel="icon" href="../imagenes/itsl2.png">
    
    
    
    
    
    
    
    <style type="text/css">
        body  { 
			  
			  background-color: ghostwhite;
            font-size: 11px;
			  }
		header {
              background-color: #21476F;

              }

        .logo{
            width: 50%;
            height: auto;
            padding-top: 30px;
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
        
        
        /*para pantallas de PC*/
        @media (max-width: 1100px){

            
        }
        
        
        /*para pantallas de PC*/
        @media (max-width: 992px){

        
            
        }
        /* Para tablets*/
        @media screen and (max-width: 768px) {

            
        }
        /* Para tablets*/
        @media screen and (max-width: 616px) {

            
        }
        
        /*Para dispositivos moviles*/
        @media screen and (max-width: 400px) {
            
            
        }
        .centrado{
            text-align:center;
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
                            
                            <a href="Administrador.php" class="btn btn-outline-light" role="button" >Página Principal Administradores</a>
                            
                            <a href="AdministradorReportesRecopilacion.php" class="btn btn-outline-light active" role="button" >Formato de Recopilación LE</a>
                            
                            <a href="AdministradorReportes.php" class="btn btn-outline-light " role="button" >Reporte Trimestral 1</a>
                            
                            <a href="Reportes.php" class="btn btn-outline-light" role="button" >Reporte Trimestral 2</a>
                            
                            <a href="logoutAd.php" class="btn btn-outline-light" role="button">Cerrar sesión</a>

                        </div>    
                    </div>
                
                
                


            </div>
        </div>
</header>

    
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <br>
                <a target='_blank' href="ReportesPrint.php" class="btn btn-primary active" role="button" >Versión para imprimir</a>
                <h3 >FORMATO DE RECOPILACIÓN DE INFORMACIÓN SOBRE LENGUAS EXTRANJERAS</h3>
            </div>
            
            <div class="col-sm-12">
                
                <table class="table table-bordered table-sm" style="width:100%;">
                    <thead>
                        <tr style="text-align: center; font-size: 11px;">
                            <th > <p><b>Instituto Tecnológico:</b></p></th>
                            <th > <p><b>Superior de Loreto</b></p></th>
                            <th > <p><b>Nombre del Responsable del reporte:</b></p></th>
                            <th > <p><b>Poner Nombre aquí</b></p></th>
                        </tr>
                    </thead>
                </table>
                <table class="table table-bordered table-sm" style="width:100%;">
                    <thead>
                        <tr style="text-align: center; font-size: 11px;">
                            <th > <p><b>Cargo del responsable que elbora el reporte:</b></p></th>
                            <th > <p><b>COORDINACIÓN DE LA CLE</b></p></th>
                            <th > <p><b>Área de adscripción</b></p></th>
                            <th > <p><b>Dirección Academica</b></p></th>
                        </tr>
                    </thead>
                </table>
                <table class="table table-bordered table-sm" style="width:100%;">
                    <thead>
                        <tr style="text-align: center; font-size: 11px;">
                            <th > <p><b>Correo electrónico oficial:</b></p></th>
                            <th > <p><b>poner correo aquí</b></p></th>
                            <th > <p><b>Teléfono oficina</b></p></th>
                            <th > <p><b></b></p></th>
                            <th > <p><b>Ext:</b></p></th>
                        </tr>
                    </thead>
                </table>
                
            </div>
        

            
            <div class="col-sm-12">
                
                
                <table class="table table-bordered table-sm" style="width:100%;">
                    <thead>
                        <tr>
                            <th colspan="14">Periodo enero-diciembre 2021</th>
                        </tr>
                        <tr style="text-align:center;">
                            <th rowspan="2">Lenguas Extranjeras impartidas en el campus</th>
                            <th colspan="2">Estudiantes  participantes por género</th>
                            <th rowspan="2">¿Su coordinación de Lenguas Extranjeras está registrada por el TecNM? (si, no)</th>
                            <th rowspan="2">Estructura de los cursos de Lenguas Extranjeras que se ofertan     </th>
                            <th rowspan="2">Número de facilitadores integrados al servicio</th>
                            <th rowspan="2">Número de facilitadores certificados (indique los tipos de certificación con sus respectivos niveles y/o bandas obtenidas) </th>
                            <th rowspan="2">Porcentaje de la eficiencia terminal con base en el ingreso  </th>  
                            <th colspan="2">Estudiantes con liberación del idioma con nivel B1</th>
                            <th colspan="2">Estudiantes con liberación del idioma con nivel B2</th>
                            <th rowspan="2">Esquema organizacional de la coordinación </th>
                            <th rowspan="2">Infraestructura destinada para la enseñanza de Lenguas Extranjeras (capacidad instalada y equipamiento)</th>

                        </tr>
                        <tr style='text-align:center;'>
                            
                            <th>Hombre</th>
                            <th>Mujeres</th>
                            <th>Hombre</th>
                            <th>Mujeres</th>
                            <th>Hombre</th>
                            <th>Mujeres</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $dataRow1; echo $dataRow3.$dataRow2;?>
                        
                    </tbody>
                </table>
                
                
                 <table class="table table-bordered table-sm" style="width:100%;">
                    <thead>
                        <tr>
                            <th colspan="15">Periodo enero-junio 2021</th>
                        </tr>
                        <tr style="text-align:center;">
                            <th rowspan="2">Lenguas Extranjeras impartidas en el campus</th>
                            <th colspan="2">Estudiantes  participantes por género</th>
                            <th rowspan="2">¿Su coordinación de Lenguas Extranjeras está registrada por el TecNM? (si, no)</th>
                            <th rowspan="2">Estructura de los cursos de Lenguas Extranjeras que se ofertan     </th>
                            <th rowspan="2">Número de facilitadores integrados al servicio</th>
                            <th rowspan="2">Número de facilitadores certificados (indique los tipos de certificación con sus respectivos niveles y/o bandas obtenidas) </th>
                            <th rowspan="2">Usuario atendidos por idioma</th>
                            <th rowspan="2">Porcentaje de la eficiencia terminal con base en el ingreso  </th>  
                            <th colspan="2">Estudiantes con liberación del idioma con nivel B1</th>
                            <th colspan="2">Estudiantes con liberación del idioma con nivel B2</th>
                            <th rowspan="2">Esquema organizacional de la coordinación </th>
                            <th rowspan="2">Infraestructura destinada para la enseñanza de Lenguas Extranjeras (capacidad instalada y equipamiento)</th>

                        </tr>
                        <tr style='text-align:center;'>
                            
                            <th>Hombre</th>
                            <th>Mujeres</th>
                            <th>Hombre</th>
                            <th>Mujeres</th>
                            <th>Hombre</th>
                            <th>Mujeres</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $dataRow4; echo $dataRow6.$dataRow5;?>
                        
                    </tbody>
                </table>
                
            
                
                
            </div>
        </div>
    </div>
    
    
    
    

    
    <div class="container-fluid" style="padding-top:300px;">
        <hr>
         <div class="row" style="background:#0a6d7a; ">
            <div class="col-md-3 bordes" >
                
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

                </div>
                <div class="col-md-3 ">
                    <p></p>
                </div>
            </div>


        </div>


    </footer>


	

</body>
</html>