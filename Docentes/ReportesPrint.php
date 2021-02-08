<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedinDo"]) || $_SESSION["loggedinDo"] !== true){
    header("location: IniciarSesionDo.php");
    exit;
}
 
// Include config file
require_once "../Require/config.php";



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

function talumnospormateria($niv,$carr,$idmaes,$perio,$par,$link){
    
    global $link;
    
    if ($stmt = $link->prepare("SELECT COUNT(numeroControl) FROM calificaciones WHERE idmaestro = '{$idmaes}' AND periodo = '{$perio}' AND carrera = '{$carr}' AND nivel = '{$niv}' AND parcial = '{$par}';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($talumnospormateria);

    /* fetch values */
    $stmt->fetch();
    /* close statement */
    $stmt->close();
  }
    
    return $talumnospormateria;
    
}

//================================================================================================================================================


function talumnospormateria1aOp($niv,$carr,$idmaes,$perio,$par,$link){
    
    global $link;
    
    if ($stmt = $link->prepare("SELECT COUNT(numeroControl) FROM calificaciones WHERE idmaestro = '{$idmaes}' AND periodo = '{$perio}' AND carrera = '{$carr}' AND nivel = '{$niv}' AND oportunidad = '1aOp' AND calificacion >= 70 AND parcial = '{$par}';")) {
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


function talumnospormateria2aOp($niv,$carr,$idmaes,$perio,$par,$link){
    
    global $link;
    
    if ($stmt = $link->prepare("SELECT COUNT(numeroControl) FROM calificaciones WHERE idmaestro = '{$idmaes}' AND periodo = '{$perio}' AND carrera = '{$carr}' AND nivel = '{$niv}' AND oportunidad = '2aOp' AND calificacion >= 70 AND parcial = '{$par}';")) {
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

$query = "SELECT DISTINCT gruposasignados.nivel, gruposasignados.carrera, calificaciones.parcial FROM gruposasignados, calificaciones WHERE gruposasignados.idmaestro =         {$_SESSION["idmaestro"]} AND calificaciones.idmaestro = {$_SESSION["idmaestro"]} AND gruposasignados.periodo = '{$periActuBD}' AND calificaciones.periodo = '{$periActuBD}'     AND gruposasignados.carrera = calificaciones.carrera ORDER BY carrera ASC ;";

$result = mysqli_query($link, $query);

if (!$result) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

$dataRow = "";



while($row = mysqli_fetch_array($result))
{
    $talumnospormateria = talumnospormateria($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$row[2],$link);
    $talumnospormateria1aOp = talumnospormateria1aOp($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$row[2],$link);
    $talumnospormateria2aOp = talumnospormateria2aOp($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$row[2],$link);
    $talumnosrepro1ay2aOp = talumnosrepro1ay2aOp($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$row[2],$link);
    $talumnosbajas = talumnosbajas($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$link);
    $numeroparciales = numeroparciales($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$link);
    
    $porcenbajas = round($talumnosbajas / ( $talumnospormateria / 100 ),2);
    
    $dataRow = $dataRow."<tr style='text-align:center;'>
                            <td class='inte'>Inglés $row[0]</td>
                            <td class='inte'>$row[2] / $row[0]</td>
                            <td class='inte'>$row[1]</td>
                            <td class='inte'>$talumnospormateria</td>
                            <td class='inte'>$talumnospormateria1aOp</td>
                            <td class='inte'>$talumnospormateria2aOp</td>
                            <td class='inte'>$talumnosrepro1ay2aOp</td>
                            <td class='inte'>$talumnosbajas</td>
                            <td class='inte'>$porcenbajas%</td>
                        </tr>";
    

    
}


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

        
        .page-header, .page-header-space {
          height: 210px;
        }

        .page-footer, .page-footer-space {
          height: 150px;

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
           thead {display: table-header-group;} 
           tfoot {display: table-footer-group;}

           button {display: none;}

           body {margin: 0;}
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
                    <img src="../imagenes/headerReport.PNG" width="auto" height="210px">
                </div>
              
                
                
                


            </div>
        </div>
    </header>

    
    <footer class="page-footer divFooter">
         <div class="container">
             <div class="row">
                <div class="col-sm-12 divFooter">
                    <img class="logo" src="../imagenes/footer.PNG" >
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
        
        
        
        
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <button type="button" onClick="window.print()" style="background: pink">¡PULSA PARA IMPRIMIR!</button>
                <button type="button" onClick="window.close()" style="background: lightblue">¡PULSA PARA CERRAR!</button>
                <br>
                <p style="font-size:20px;" class="centrado"><b>Reporte Parcial y final de semestre</b></p>
                <p style="font-size:28px;" class="centrado"><b>INSTITUTO TECNOLÓGICO SUPERIOR DE LORETO</b></p>
                
                <p><b>DEPARTEMENTO DE: </b></p>
                <p><b>REPORTE PARCIAL: 1 | DEL SEMESTRE: <?php if($per == 1){echo "ene-jun ".$year;}elseif($per == 2){echo  "ago-dic ".$year;} ?> </b></p>
                <p><b>Profesor(a): Ing. </b><?php echo $_SESSION['nombre']." ".$_SESSION['paterno']." ".$_SESSION['materno']; ?></p>
                <p><b>No. de Grupos Atendidos: </b><?php echo numerogrupos($_SESSION['idmaestro'],$periActuBD,$link); ?> <b>| No. de Asignaturas diferentes: </b><?php echo asignaturasdiferentes($_SESSION['idmaestro'],$periActuBD,$link); ?></p>
                
                <table class="table table-bordered" style="background-color: transparent !important;">
                    <thead>
                        <tr style="text-align:center;">
                            <th class="inte">ASIGNATURA</th>
                            <th class="inte">UNIDAD / SEMESTRE</th>
                            <th class="inte">CARRERA</th>
                            <th class="inte">A</th>
                            <th class="inte">B-EP</th>
                            <th class="inte">B-ES</th>
                            <th class="inte">C</th>   
                            <th class="inte">D</th>  
                            <th class="inte">E</th>  

                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $dataRow; echo $dataRow2;?>
                        
                    </tbody>
                </table>
                    <br>
                <p class='inte'>A = TOTAL ALUMNOS(AS) POR MATERIA<br>
                B-EP = TOTAL ALUMNOS(AS) QUE ALCANZARON LAS COMPETENCIAS PRIMERA OPORTUNIDAD<br>
                B-ES = TOTAL ALUMNOS(AS) QUE ALCANZARON LAS COMPETENCIAS SEGUNDA OPORTUNIDAD<br>
                C = TOTAL DE ALUMNOS(AS) QUE NO ALCANZARON LAS COMPETENCIAS EN EVALUACIÓN DE PRIMERA OPORTUNIDAD O EN SU CASO EN AMBAS OPORTUNIDADES<br>
                D = NUMERO DE ALUMNOS(AS) QUE DESERTARON DURANTE EL SEMESTRE EN LA MATERIA (ALUMNOS DADOS DE BAJA).<br>
                E = % DE ALUMNOS(AS) QUE DESERTARON EN LA MATERIA, TOMANDO COMO DESERCIÓN CUANDO EL ALUMNO(A) SE DA DE BAJA DE LA MATERIA O BAJA DEFINITIVA DURANTE EL CICLO ESCOLAR</p>
                <br>
                
                <p class='inte'>NOTAS.<br>
                1.	La sumatoria de todas las columnas % deberá dar el 100%<br>
                2.	Los alumnos(as) que se incluirán en le columna D son todos los alumnos no acreditados.<br>
                3.	Este registro deberá de acompañarse con sus respectivas listas de calificaciones que avalen los datos presentados.<br>
                *Este registro deberá de acompañarse con sus respectivas listas de calificaciones que avalen los datos presentados.</p>

                
            </div>
            <div class="col-sm-6" style="text-align:center;">
                <p>DOCENTE</p>
                <br>
                <br>
                <p>_________________________________</p>
            </div>
            <div class="col-sm-6" style="text-align:center;">
                <p>JEFE(A) ÁREA ACADÉMICA</p>
                <br>
                <br>
                <p>_________________________________</p>
            </div>
        </div>
    </div>
    
            <!--end of content-->
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