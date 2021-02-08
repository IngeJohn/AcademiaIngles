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

function talumnospormateria($niv,$carr,$idmaes,$perio,$uniT){
    
    global $link;
    
    if ($stmt = $link->prepare("SELECT COUNT(calificaciones.numeroControl) FROM calificaciones, gruposasignados WHERE gruposasignados.idmaestro = '{$idmaes}' AND gruposasignados.periodo = '{$perio}' AND gruposasignados.carrera = '{$carr}' AND gruposasignados.nivel = '{$niv}' AND calificaciones.idgrupo = gruposasignados.idgrupo AND calificaciones.unidadTema = '{$uniT}';")) {
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


function talumnospormateria1aOp($niv,$carr,$idmaes,$perio,$uniT){
    
    global $link;
    
    if ($stmt = $link->prepare("SELECT COUNT(calificaciones.numeroControl) FROM calificaciones, gruposasignados WHERE gruposasignados.idmaestro = '{$idmaes}' AND gruposasignados.periodo = '{$perio}' AND gruposasignados.carrera = '{$carr}' AND gruposasignados.nivel = '{$niv}' AND gruposasignados.idgrupo = calificaciones.idgrupo AND calificaciones.oportunidad = '1aOp' AND calificaciones.calificacion >= 70 AND calificaciones.unidadTema = '{$uniT}';")) {
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


function talumnospormateria2aOp($niv,$carr,$idmaes,$perio,$uniT){
    
    global $link;
    
    if ($stmt = $link->prepare("SELECT COUNT(calificaciones.numeroControl) FROM calificaciones, gruposasignados WHERE gruposasignados.idmaestro = '{$idmaes}' AND gruposasignados.periodo = '{$perio}' AND gruposasignados.carrera = '{$carr}' AND gruposasignados.nivel = '{$niv}' AND gruposasignados.idgrupo = calificaciones.idgrupo AND calificaciones.oportunidad = '2aOp' AND calificaciones.calificacion >= 70 AND unidadTema = '{$uniT}';")) {
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


function talumnosrepro1ay2aOp($niv,$carr,$idmaes,$perio,$uniT){
    
    global $link;
    
    if ($stmt = $link->prepare("SELECT COUNT(calificaciones.numeroControl) FROM calificaciones, gruposasignados WHERE gruposasignados.idmaestro = '{$idmaes}' AND gruposasignados.periodo = '{$perio}' AND gruposasignados.carrera = '{$carr}' AND gruposasignados.nivel = '{$niv}' AND calificaciones.oportunidad = '1aOp' AND calificaciones.calificacion <= 69 AND calificaciones.unidadTema = '{$uniT}';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($talumnos);

    /* fetch values */
    $stmt->fetch();
    /* close statement */
    $stmt->close();
  }
    if ($stmt1 = $link->prepare("SELECT COUNT(calificaciones.numeroControl) FROM calificaciones, gruposasignados WHERE gruposasignados.idmaestro = '{$idmaes}' AND gruposasignados.periodo = '{$perio}' AND gruposasignados.carrera = '{$carr}' AND gruposasignados.nivel = '{$niv}' AND calificaciones.oportunidad = '2aOp' AND calificaciones.calificacion <= 69 AND calificaciones.unidadTema = '{$uniT}';")) {
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


function talumnosbajas($niv,$carr,$idmaes,$perio){
    
    global $link;
    
    if ($stmt = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, niveles, gruposasignados WHERE gruposasignados.idmaestro = '{$idmaes}' AND gruposasignados.periodo = '{$perio}' AND gruposasignados.carrera = '{$carr}' AND gruposasignados.nivel = '{$niv}' AND niveles.idgrupo = gruposasignados.idgrupo AND alumnos.altaBaja = 'Baja' ;")) {
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


function numeroparciales($niv,$carr,$idmaes,$perio){
    
    global $link;
    
    if ($stmt = $link->prepare("SELECT COUNT(distinct calificaciones.unidadTema) FROM calificaciones, gruposasignados WHERE gruposasignados.idmaestro = '{$idmaes}' AND gruposasignados.periodo = '{$perio}' AND gruposasignados.carrera = '{$carr}' AND gruposasignados.nivel = '{$niv}' AND calificaciones.idgrupo = gruposasignados.idgrupo;")) {
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


function numerogrupos($idmaes,$perio){
    
    global $link;
    
    if ($stmt = $link->prepare("SELECT COUNT(idgrupo) FROM gruposasignados WHERE idmaestro = '{$idmaes}' AND periodo = '{$perio}';")) {
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
function asignaturasdiferentes($idmaes,$perio){
    
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
function carreraAv($carr){
    
    if($carr === 'Sistemas Computacionales'){
        
        return 'ISC';
        
    }elseif($carr === 'Industrial'){
        
        return 'IND';
        
    }elseif($carr === 'Gestión Empresarial'){
        
        return 'IGE';
        
    }elseif($carr === 'Mecatrónica'){
        
        return 'MECA';
        
    }
    
}

function romanos($numer){
    
    if($numer == 1){
        
        return 'I';
        
    }elseif($numer == 2){
        
        return 'II';
        
    }elseif($numer == 3){
        
        return 'III';
        
    }elseif($numer == 4){
        
        return 'IV';
        
    }elseif($numer == 5){
        
        return 'V';
        
    }elseif($numer == 6){
        
        return 'VI';
        
    }elseif($numer == 7){
        
        return 'VII';
        
    }elseif($numer == 8){
        
        return 'VIII';
        
    }elseif($numer == 9){
        
        return 'IX';
        
    }elseif($numer == 10){
        
        return 'X';
        
    }
    
}






$query = "SELECT DISTINCT gruposasignados.nivel, gruposasignados.carrera, calificaciones.unidadTema FROM gruposasignados, calificaciones WHERE gruposasignados.idmaestro =         {$_SESSION["idmaestro"]} AND gruposasignados.periodo = '{$periActuBD}' AND gruposasignados.idgrupo = calificaciones.idgrupo ORDER BY unidadTema ASC ;";

$result = mysqli_query($link, $query);

if (!$result) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

$dataRow = "";



while($row = mysqli_fetch_array($result))
{
    $talumnospormateria = talumnospormateria($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$row[2]);
    $talumnospormateria1aOp = talumnospormateria1aOp($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$row[2]);
    $talumnospormateria2aOp = talumnospormateria2aOp($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$row[2]);
    $talumnosrepro1ay2aOp = talumnosrepro1ay2aOp($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD,$row[2]);
    $talumnosbajas = talumnosbajas($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD);
    $numeroparciales = numeroparciales($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD);
    $carreraAv =  carreraAv($row[1]);
    $romanos = romanos($row[2]);
    $C = (100/$talumnospormateria)*$talumnosrepro1ay2aOp;
    $E = (100/$talumnospormateria)*($talumnospormateria1aOp+$talumnospormateria2aOp);
    $porcenbajas = round($talumnosbajas / ( $talumnospormateria / 100 ),2);
    
    $dataRow = $dataRow."<tr style='text-align:center;'>
                                <td>Inglés $row[0]</td>
                                <td>$romanos / $row[0]º</td>
                                <td>$carreraAv</td>
                                <td>$talumnospormateria</td> 
                                <td>$talumnospormateria1aOp</td>
                                <td>$talumnospormateria2aOp</td>
                                <td>$C%</td>
                                <td>$talumnosrepro1ay2aOp</td>
                                <td>$E</td>
                                <td>$talumnosbajas</td>
                                <td>$porcenbajas%</td>
                            </tr>";
    

    
}


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
                        </tr>" ;


//=====================================================================================================================
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Docentes</title>
    
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
              background-color: #000000;

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
                            
                            <a href="Docentes.php" class="btn btn-outline-light" role="button" >Regresar a Docentes</a>
                            
                            <a href="Reportes.php" class="btn btn-outline-light active" role="button" >Reporte 1</a>
                            
                            <a href="Reportes.php" class="btn btn-outline-light" role="button" >Reporte 2</a>
                            
                            <a href="Reportes.php" class="btn btn-outline-light" role="button" >Reporte 3</a>
                            
                            <a href="Reportes.php" class="btn btn-outline-light" role="button" >Reporte 4</a>
                            
                            <a href="Reportes.php" class="btn btn-outline-light" role="button" >Reporte Final</a>
                            
                            <a href="logoutDo.php" class="btn btn-outline-light" role="button">Cerrar sesión</a>

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
                <h1>Reporte Parcial</h1>
                <h2>INSTITUTO TECNOLÓGICO SUPERIOR DE LORETO</h2>
                <h3>SUBDIRECCIÓN ACADÉMICA</h3>
                
                <p><b>DEPARTEMENTO DE: </b></p>
                <p><b>REPORTE PARCIAL: 1 | DEL SEMESTRE: <?php if($per == 1){echo "ene-jun ".$year;}elseif($per == 2){echo  "ago-dic ".$year;} ?> </b></p>
                <p><b>Profesor(a): Ing. </b><?php echo $_SESSION['nombre']." ".$_SESSION['paterno']." ".$_SESSION['materno']; ?></p>
                <p><b>No. de Grupos Atendidos: </b><?php echo numerogrupos($_SESSION['idmaestro'],$periActuBD,$link); ?> <b>| No. de Asignaturas diferentes: </b><?php echo asignaturasdiferentes($_SESSION['idmaestro'],$periActuBD,$link); ?></p>
                
                <table class="table table-bordered table-dark">
                    <thead>
                        <tr style="text-align:center;">
                            <th rowspan="2">ASIGNATURA</th>
                            <th rowspan="2">UNIDAD / SEMESTRE</th>
                            <th rowspan="2">CARRERA</th>
                            <th rowspan="2">A</th>
                            <th colspan="2">B</th>
                            <th>C</th>   
                            <th>D</th>  
                            <th>E</th>
                            <th>F</th>  
                            <th>G</th>
                             

                        </tr>
                        <tr  style="text-align:center;">
                            <th>EP</th>
                            <th>ES</th>
                            <th></th>   
                            <th></th>  
                            <th></th> 
                            <th></th>
                            <th></th>
                             
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $dataRow; echo $dataRow2;?>
                        
                    </tbody>
                </table>
                
                <br>
                
                <p class='inte'>A = TOTAL DE ALUMNOS(AS) POR MATERIA<br>
                    B = NO. DE ALUMNOS(AS) QUE ALCANZARON LAS COMPETENCIAS (EP= EVALUACIÓN DE PRIMERA OPORTUNIDAD, ES= EVALUACIÓN DE SEGUNDA OPORTUNIDAD).<br>
                    C = % DE ALUMNOS(AS) QUE ALCANZARON LAS COMPETENCIAS POR UNIDAD O UNIDADES TEMÁTICAS EN AMBAS OPORTUNIDADES (EP+ES). SOLAMENTE EN EL REPORTE FINAL<br>
                    D = NO. DE ALUMNOS(AS) QUE NO ALCANZARON LAS COMPETENCIAS EN EVALUACIÓN DE
                     PRIMERA OPORTUNIDAD O EN SU CASO EN AMBAS OPORTUNIDADES<br>  
                    E = % DE ALUMNOS(AS) QUE NO ALCANZARON LAS COMPETENCIAS POR UNIDAD O UNIDADES TEMÁTICAS PARA EL REPORTE FINAL.<br>
                    F = NO. DE ALUMNOS(AS) QUE DESERTARON DURANTE EL SEMESTRE EN LA MATERIA (ALUMNOS DADOS DE BAJA).<br> 
                    G = % DE ALUMNOS(AS) QUE DESERTARON EN LA MATERIA, TOMANDO COMO DESERCIÓN CUANDO EL ALUMNO(A) SE DA DE BAJA DE LA MATERIA O BAJA DEFINITIVA DURANTE EL CICLO ESCOLAR<br>
                    </p>
                <br>
                
                <p class='inte'>NOTAS.<br>
                1.	La sumatoria de todas las columnas con % deberá dar el 100%<br>
                2.	Los alumnos(as) que se incluirán en le columna D son todos los alumnos no acreditados.<br>
                3.	Este registro deberá de acompañarse con sus respectivas listas de calificaciones que avalen los datos presentados.<br>
                *Este registro deberá de acompañarse con sus respectivas listas de calificaciones que avalen los datos presentados.</p>
                
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