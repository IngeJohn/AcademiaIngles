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
    
    if ($stmt = $link->prepare("SELECT COUNT(numeroControl) FROM alumnos WHERE periodoActual = '{$periActuBD}';")) {
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
    
    if ($stmt = $link->prepare("SELECT COUNT(numeroControl) FROM alumnos WHERE periodoActual = '{$periActuBD}' AND sexo = 'H';")) {
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
    
    if ($stmt = $link->prepare("SELECT COUNT(numeroControl) FROM alumnos WHERE periodoActual = '{$periActuBD}' AND sexo = 'M';")) {
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
                <th class='inte'>Inglés</th>
                <td class='inte'>$matriculaTotalCLEM</td>
                <td class='inte'>$matriculaTotalCLEH</td>
                <td class='inte'></td>
                <td class='inte'></td>
                <td class='inte'></td>
                <td class='inte'></td>
                <td class='inte'></td>
                <td class='inte'></td>
                <td class='inte'></td>
                <td class='inte'></td>
                <td class='inte'></td>
                <td class='inte'></td>
                <td class='inte'></td>
            </tr>";

$dataRow2 = "<tr style='text-align:center;'>
                            <th class='inte'>TOTAL</th>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                        </tr>" ;

$dataRow3 = "<tr style='text-align:center;'>
                            <th class='inte'>Francés</th>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th class='inte'>Alemán</th>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th class='inte'>Italiano</th>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th class='inte'>Japones</th>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th class='inte'>Portugués</th>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th class='inte'>Otros (especifiar)*</th>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                        </tr>" ;

$dataRow4 = "<tr style='text-align:center;'>
                <th class='inte'>Inglés</th>
                <td class='inte'>$matriculaTotalCLEM</td>
                <td class='inte'>$matriculaTotalCLEH</td>
                <td class='inte'></td>
                <td class='inte'></td>
                <td class='inte'></td>
                <td class='inte'></td>
                <td class='inte'></td>
            </tr>";

$dataRow5 = "<tr style='text-align:center;'>
                            <th class='inte'>TOTAL</th>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                        </tr>" ;

$dataRow6 = "<tr style='text-align:center;'>
                            <th class='inte'>Francés</th>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th class='inte'>Alemán</th>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th class='inte'>Italiano</th>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th class='inte'>Japones</th>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th class='inte'>Portugués</th>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                        </tr>
                        <tr style='text-align:center;'>
                            <th class='inte'>Otros (especifiar)*</th>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
                            <td class='inte'></td>
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

    <link rel="icon" href="../imagenes/itsl2.png">
    
    <style type="text/css">
        
        body{
            
            font-size: 9px;
            line-height: 1em;
        }
        
        .page-header, .page-header-space {
          height: 1px;
        }

        .page-footer, .page-footer-space {
          height: 10px;

        }

        .page-footer {
          position: fixed;
          bottom: 0;
          width: 100%;
        }

        .page-header {
          position: fixed;
          top: 0mm;
          width: 100%;
        }

        .page {
          page-break-after: always;
        }

        @page {
          margin: 20mm
        }
        @media screen {
            div.divFooter {
                display: none;
            }
            div.divHeader {
                display: none;
            }
        }

        @media print {
            
            @page {size: landscape}
            thead {display: table-header-group;} 
            tfoot {display: table-footer-group;}

            button {display: none;}

            body {margin: 0;}
            
            .content-block, table {
                
                
                page-break-inside: avoid;
                
            }

            
        }
        
        
        .centrado{
            text-align:center;
            padding: 1px !important; 
            margin: 1px !important;
        }
        
        .inte{
            padding: 2px !important; 
            margin: 2px !important;
        }



        
    </style>
</head>
<body>
    <header class="page-header divFooter">
          <div class="container-fluid">

            <div class="row">
                
                
                <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 divHeader">
                </div>
              
                
                
                


            </div>
        </div>
    </header>

    
    <footer class="page-footer divFooter">
         <div class="container">
             <div class="row">
                <div class="col-sm-12 divFooter">
             <!--       <img class="logo" src="../imagenes/footer.PNG" > -->
                 </div>
             </div>


        </div>


    </footer>
    
    
    
    
    
    <table class="container">

    <thead>
      <tr>
        <td>
          <!--place holder for the fixed-position header-->
          <div class="page-header-space"></div>
        </td>
      </tr>
    </thead>
        
        
           <tbody>
      <tr>
        <td> 
        
        
        <!--content-->
        
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="text-align:center; font-weight: bold; padding: 0 !important; margin: 0 !important;">
                
                <p style="font-size:16px;" class="centrado">TECNOLÓGICO NACIONAL DE MÉXICO</p>
                <p style="font-size:10px;" class="centrado">SECRETARÍA DE EXTENSIÓN Y VINCULACIÓN</p>
                <p style="font-size:10px;" class="centrado">DIRECCIÓN DE EDUCACIÓN CONTINUA Y A DISTANCIA</p>
                <p class="centrado">Programa Coordinador de Lenguas Extrangeras (PCLE)</p>
                <p class="centrado">Reporte Estadistístico de la Coordinación de Lenguas Extranjeras (CLE)</p>
                <button type="button" onClick="window.print()" style="background: pink">¡PULSA PARA IMPRIMIR!</button>
                <button type="button" onClick="window.close()" style="background: lightblue">¡PULSA PARA CERRAR!</button>
            </div>
            
            <div class="col-sm-6">
                
                <p><b>Instituto Tecnológico Superior de Loreto </b></p>
                
            </div>
            
            <div class="col-sm-6">    
                
                <p><b> Trimestre: <?php if($per == 1){echo "ene-jun ".$year;}elseif($per == 2){echo  "ago-dic ".$year;} ?></b></p>
                
            </div>
            
            <div class="col-sm-6">
                
                <table class="table table-bordered" style="width:50%;">
                    <thead>
                        <tr style="text-align: center;">
                            <th class="inte" style="width:50%;"> <p><b>Matricula Total de Alumnos del TecnológicoL</b></p></th>
                            <th class="inte" style="width:50%;"> <p><b><?php echo matriculaTotal($periActuBD,$link); ?></b></p></th>
                        </tr>
                    </thead>
                </table>
                
            </div>
            
            <div class="col-sm-6">
                
                <p><b>Fecha de Elaboración:</b> <?php echo $fecha; ?></p>
                
            </div>
            
            <div class="col-sm-12">
                
                
                <table class="table table-bordered" >
                    <thead>
                        <tr style="text-align:center;">
                            <th style="width:14%;" rowspan="2" class="inte">Idioma</th>
                            <th style="width:14%;" colspan="2" class="inte">Población Atendida por la CLE (Estudiantes del Tecnológico)</th>
                            <th style="width:14%;" colspan="2" class="inte">Población (Estudiantes del Tecnológico) cursando una Lengua Extranjera a través del Progarama Bécalos</th>
                            <th style="width:14%;" colspan="2" class="inte">Población (Estudiantes del Tecnológico) cursando una Lengua Extranjera a través de Aplicación, Programa y/o Escuela diferente a la CLE y PROGRAMA BÉCALOS</th>
                            <th style="width:14%;" colspan="2" class="inte">Estudiantes que ya cuentan con inglés en el nivel B1 de acuerdo al Marco Común Europeo de Referencia (MCER) (H)</th>
                            <th style="width:14%;" colspan="2" class="inte">Estudiantes del tecnológico que no estan estudiando idioma (anexar justificación o razón en formato word) (I)</th>
                            <th style="width:16%;" colspan="3" class="inte">Población del Tecnológico Atendida (Comunidad del Tecnológico)(J)</th>   

                        </tr>
                        <tr style='text-align:center;'>
                            <th class="inte">M</th>
                            <th class="inte">H</th>
                            <th class="inte">M</th>
                            <th class="inte">H</th>
                            <th class="inte">M</th>
                            <th class="inte">H</th>
                            <th class="inte">M</th>
                            <th class="inte">H</th>
                            <th class="inte">M</th>
                            <th class="inte">H</th>
                            <th class="inte">M</th>
                            <th class="inte">H</th>
                            <th class="inte">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $dataRow1; echo $dataRow3.$dataRow2;?>
                        
                    </tbody>
                </table>
                
            </div>
            
            <div class="col-sm-12 content-block">
                
                <table class="table table-bordered" style="width:70%">
                    <thead>
                        <tr style="text-align:center;">
                            <th rowspan="2" class="inte">Idioma</th>
                            <th colspan="2" class="inte">Población Atendida por la CLE (Público Externo) (K)</th>
                            <th colspan="2" class="inte">Profesores adscritos al TecNM Atendidos por la CLE (L)</th>
                            <th colspan="3" class="inte">Modalidad Internacional</th>   

                        </tr>
                        <tr style='text-align:center;'>
                            <th class="inte">M</th>
                            <th class="inte">H</th>
                            <th class="inte">M</th>
                            <th class="inte">H</th>
                            <th class="inte">País</th>
                            <th class="inte">M</th>
                            <th class="inte">H</th>
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
    
    
     <!-- end content-->
            
                    </td>
      </tr>
    </tbody>
            
            
            

    <tfoot>
      <tr>
        <td>
          <!--place holder for the fixed-position footer-->
          <div class="page-footer-space"></div>
        </td>
      </tr>
    </tfoot>

  </table>





	

</body>
</html>