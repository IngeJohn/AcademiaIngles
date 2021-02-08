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

$dataRow4 = "<tr style='text-align:center;'>
                <th>Inglés</th>
                <td>$matriculaTotalCLEM</td>
                <td>$matriculaTotalCLEH</td>
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
                            
                            <a href="AdministradorFormatoRecopilacion.php" class="btn btn-outline-light" role="button" >Formato de Recopilación LE</a>
                            
                            <a href="AdministradorReportes.php" class="btn btn-outline-light active" role="button" >Reporte Trimestral 1</a>
                            
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
                <h1 class="centrado">TECNOLÓGICO NACIONAL DE MÉXICO</h1>
                <h2 class="centrado">SECRETARÍA DE EXTENSIÓN Y VINCULACIÓN</h2>
                <h2 class="centrado">DIRECCIÓN DE EDUCACIÓN CONTINUA Y A DISTANCIA</h2>
                <h3 class="centrado">Programa Coordinador de Lenguas Extrangeras (PCLE)</h3>
                <h3 class="centrado">Reporte Estadistístico de la Coordinación de Lenguas Extranjeras (CLE)</h3>
            </div>
            
            <div class="col-sm-6">
                
                <p><b>Instituto Tecnológico Superior de Loreto </b></p>
                
            </div>
            
            <div class="col-sm-6">    
                
                <p><b> Trimestre: <?php if($per == 1){echo "ene-jun ".$year;}elseif($per == 2){echo  "ago-dic ".$year;} ?></b></p>
                
            </div>
            
            <div class="col-sm-6">
                
                <table class="table table-bordered table-dark" style="width:80%;">
                    <thead>
                        <tr style="text-align: center;">
                            <th style="width:50%;"> <p><b>Matricula Total de Alumnos del TecnológicoL</b></p></th>
                            <th style="width:50%;"> <p><b><?php echo matriculaTotal($periActuBD,$link); ?></b></p></th>
                        </tr>
                    </thead>
                </table>
                
            </div>
            
            <div class="col-sm-6">
                
                <p><b>Fecha de Elaboración:</b> <?php echo $fecha; ?></p>
                
            </div>
            
            <div class="col-sm-12">
                
                
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr style="text-align:center;">
                            <th  rowspan="2">Idioma</th>
                            <th colspan="2">Población Atendida por la CLE (Estudiantes del Tecnológico)</th>
                            <th colspan="2">Población (Estudiantes del Tecnológico) cursando una Lengua Extranjera a través del Progarama Bécalos</th>
                            <th colspan="2">Población (Estudiantes del Tecnológico) cursando una Lengua Extranjera a través de Aplicación, Programa y/o Escuela diferente a la CLE y PROGRAMA BÉCALOS</th>
                            <th colspan="2">Estudiantes que ya cuentan con inglés en el nivel B1 de acuerdo al Marco Común Europeo de Referencia (MCER) (H)</th>
                            <th colspan="2">Estudiantes del tecnológico que no estan estudiando idioma (anexar justificación o razón en formato word) (I)</th>
                            <th colspan="3">Población del Tecnológico Atendida (Comunidad del Tecnológico)(J)</th>   

                        </tr>
                        <tr style='text-align:center;'>
                            <th>M</th>
                            <th>H</th>
                            <th>M</th>
                            <th>H</th>
                            <th>M</th>
                            <th>H</th>
                            <th>M</th>
                            <th>H</th>
                            <th>M</th>
                            <th>H</th>
                            <th>M</th>
                            <th>H</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $dataRow1; echo $dataRow3.$dataRow2;?>
                        
                    </tbody>
                </table>
                
                <table class="table table-bordered table-dark" style="width:70%">
                    <thead>
                        <tr style="text-align:center;">
                            <th  rowspan="2">Idioma</th>
                            <th colspan="2">Población Atendida por la CLE (Público Externo) (K)</th>
                            <th colspan="2">Profesores adscritos al TecNM Atendidos por la CLE (L)</th>
                            <th colspan="3">Modalidad Internacional</th>   

                        </tr>
                        <tr style='text-align:center;'>
                            <th>M</th>
                            <th>H</th>
                            <th>M</th>
                            <th>H</th>
                            <th>País</th>
                            <th>M</th>
                            <th>H</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $dataRow4; echo $dataRow6.$dataRow5;?>
                        
                    </tbody>
                </table>
                    
                <p><b>Subdirección: </b></p>
                <p><b>Datos del Contacto Subdirección: </b></p>
                <p><b>Nombre: </b><b> | Teléfono oficina: </b><b> | Ext.: </b></p>
                <p><b>Departamento: </b></p>
                <p><b>Datos del Contacto Departemento: </b></p>
                <p><b>Nombre: </b><b> | Teléfono oficina: </b><b> | Ext.: </b></p>
                <p><b>Coordinador de la CLE: </b></p>
                <p><b>Correo Electrónico Institucional: </b><b> | Correo eletrónico alterno: </b></p>
                <p><b>Número de Oficina: </b><b> | Ext.: </b></p>
                <p><b>Número de Celular: </b></p>
                <p>*Nota: Otros (especificar), abrir los campos necesarios en caso de que existan más programas académicos de lenguas extranjeras.</p>
                
                
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