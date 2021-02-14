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

//==================================================================================================================================================

if ($stmtfe = $link->prepare("SELECT fechaInicio, fechaTermino FROM parcialfechas WHERE numeroParcial = 'FINAL'")) {
        
        $stmtfe->execute();

        /* bind variables to prepared statement */
        $stmtfe->bind_result($inicio, $termino);

        /* fetch values */
        $stmtfe->fetch();

        /* close statement */
        $stmtfe->close();

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

function talumnospormateria($idg,$uniT){
    
    global $link,$termino;
    
    $talumnospormateria = 0;
    
    if ($stmt = $link->prepare("SELECT COUNT(calificaciones.numeroControl) FROM calificaciones, gruposasignados, alumnos 
WHERE gruposasignados.idgrupo = '$idg'
AND calificaciones.numeroControl = alumnos.numeroControl 
AND gruposasignados.idgrupo = calificaciones.idgrupo 
AND calificaciones.unidadTema = '$uniT' AND alumnos.altaBaja = 'Alta'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($talumnospormateria);

    /* fetch values */
    $stmt->fetch();
    /* close statement */
    $stmt->close();
        
        
                        //Alumnos despues
                //=============================================
                    if ($stmt2 = $link->prepare("SELECT DISTINCT COUNT(altasbajas.numeroControl)
                        FROM niveles, gruposasignados, altasbajas 
                        WHERE gruposasignados.idgrupo = '$idg'  
                        AND niveles.idgrupo = gruposasignados.idgrupo 
                        AND niveles.numeroControl = altasbajas.numeroControl
                        AND altasbajas.altaBaja = 'Baja' AND (altasbajas.fecha > '$termino') ORDER BY altasbajas.id DESC;")) {

                            $stmt2->execute();

                            /* bind variables to prepared statement */
                            $stmt2->bind_result($talumnos2);

                            /* fetch values */
                            $stmt2->fetch();
                            /* close statement */
                            $stmt2->close();
                          }

        
        
        
  }
    
    
    
    
    
    
    
    

    
    return $talumnospormateria+$talumnos2;
    
}

//================================================================================================================================================


function talumnospormateria1aOp($idg,$uniT){
    
    global $link,$termino;
    
    $talumnos = 0;
    
    if ($stmt = $link->prepare("SELECT COUNT(calificaciones.numeroControl) 
                                FROM calificaciones, gruposasignados, alumnos WHERE gruposasignados.idgrupo = '$idg' 
                                AND gruposasignados.idgrupo = calificaciones.idgrupo 
                                AND alumnos.numeroControl = calificaciones.numeroControl
                                AND calificaciones.oportunidad = '1aOp' 
                                AND calificaciones.calificacion >= 70 AND calificaciones.unidadTema = '$uniT'
                                AND alumnos.altabaja = 'Alta';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($talumnos);

    /* fetch values */
    $stmt->fetch();
    /* close statement */
    $stmt->close();
        
        
        
                //Alumnos despues
                //=============================================
                    if ($stmt2 = $link->prepare("SELECT COUNT(altasbajas.numeroControl) FROM altasbajas, calificaciones, gruposasignados WHERE altasbajas.fecha > '$termino' 
                                                    AND calificaciones.idgrupo = '$idg' 
                                                    AND altasbajas.numeroControl = calificaciones.numeroControl
                                                    AND gruposasignados.idgrupo = calificaciones.idgrupo
                                                    AND calificaciones.unidadTema = '$uniT' 
                                                    AND altasbajas.altaBaja = 'Baja'  AND calificaciones.oportunidad = '1aOp' AND calificaciones.calificacion >= 70;")) {

                            $stmt2->execute();

                            /* bind variables to prepared statement */
                            $stmt2->bind_result($talumnos2);

                            /* fetch values */
                            $stmt2->fetch();
                            /* close statement */
                            $stmt2->close();
                          }

        
        
  }

    
    
    
    
    
    
    
    
    return $talumnos+$talumnos2;
    
}

//================================================================================================================================================


function talumnospormateria2aOp($idg,$uniT){
    
    global $link,$termino;
    
    $talumnos = 0;
    
    if ($stmt = $link->prepare("SELECT COUNT(calificaciones.numeroControl) 
                                FROM calificaciones, gruposasignados, alumnos WHERE gruposasignados.idgrupo = '$idg' 
                                AND gruposasignados.idgrupo = calificaciones.idgrupo 
                                AND alumnos.numeroControl = calificaciones.numeroControl
                                AND calificaciones.oportunidad = '2aOp' 
                                AND calificaciones.calificacion >= 70 AND calificaciones.unidadTema = '$uniT'
                                AND alumnos.altabaja = 'Alta';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($talumnos);

    /* fetch values */
    $stmt->fetch();
    /* close statement */
    $stmt->close();
        
        
        
                //Alumnos despues
                //=============================================
                    if ($stmt2 = $link->prepare("SELECT COUNT(altasbajas.numeroControl) FROM altasbajas, calificaciones, gruposasignados WHERE altasbajas.fecha > '$termino' 
                                                    AND calificaciones.idgrupo = '$idg' 
                                                    AND altasbajas.numeroControl = calificaciones.numeroControl
                                                    AND gruposasignados.idgrupo = calificaciones.idgrupo
                                                    AND calificaciones.unidadTema = '$uniT' 
                                                    AND altasbajas.altaBaja = 'Baja'  AND calificaciones.oportunidad = '2aOp' AND calificaciones.calificacion >= 70;")) {

                            $stmt2->execute();

                            /* bind variables to prepared statement */
                            $stmt2->bind_result($talumnos2);

                            /* fetch values */
                            $stmt2->fetch();
                            /* close statement */
                            $stmt2->close();
                          }

        
        
  }

    
    
    
    
    
    
    
    
    return $talumnos+$talumnos2;
    
}

//================================================================================================================================================


function talumnosrepro1ay2aOp($idg, $uniT){
    
    global $link,$termino;
    
    $talumnos = 0;
    $alumnos2 = 0;
    $talumno3 = 0;
    $alumnos4 = 0;
    
    if ($stmt = $link->prepare("SELECT COUNT(calificaciones.numeroControl) 
                                FROM calificaciones, gruposasignados, alumnos WHERE gruposasignados.idgrupo = '$idg' 
                                AND gruposasignados.idgrupo = calificaciones.idgrupo 
                                AND alumnos.numeroControl = calificaciones.numeroControl
                                AND calificaciones.oportunidad = '1aOp' 
                                AND calificaciones.calificacion <= 69 AND calificaciones.unidadTema = '$uniT'
                                AND alumnos.altabaja = 'Alta';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($talumnos);

    /* fetch values */
    $stmt->fetch();
    /* close statement */
    $stmt->close();
        
        
        
                //Alumnos despues
                //=============================================
                    if ($stmt2 = $link->prepare("SELECT COUNT(altasbajas.numeroControl) FROM altasbajas, calificaciones, gruposasignados WHERE altasbajas.fecha > '$termino' 
                                                    AND calificaciones.idgrupo = '$idg' 
                                                    AND altasbajas.numeroControl = calificaciones.numeroControl
                                                    AND gruposasignados.idgrupo = calificaciones.idgrupo
                                                    AND calificaciones.unidadTema = '$uniT' 
                                                    AND altasbajas.altaBaja = 'Baja'  AND calificaciones.oportunidad = '1aOp' AND calificaciones.calificacion <= 69;")) {

                            $stmt2->execute();

                            /* bind variables to prepared statement */
                            $stmt2->bind_result($talumnos2);

                            /* fetch values */
                            $stmt2->fetch();
                            /* close statement */
                            $stmt2->close();
                          }

        
        
  }
    
    
    if ($stmt3 = $link->prepare("SELECT COUNT(calificaciones.numeroControl) 
                                FROM calificaciones, gruposasignados, alumnos WHERE gruposasignados.idgrupo = '$idg' 
                                AND gruposasignados.idgrupo = calificaciones.idgrupo 
                                AND alumnos.numeroControl = calificaciones.numeroControl
                                AND calificaciones.oportunidad = '2aOp' 
                                AND calificaciones.calificacion <= 69 AND calificaciones.unidadTema = '$uniT'
                                AND alumnos.altabaja = 'Alta';")) {
    $stmt3->execute();

    /* bind variables to prepared statement */
    $stmt3->bind_result($talumnos3);

    /* fetch values */
    $stmt3->fetch();
    /* close statement */
    $stmt3->close();
        
        
        
                //Alumnos despues
                //=============================================
                    if ($stmt4 = $link->prepare("SELECT COUNT(altasbajas.numeroControl) FROM altasbajas, calificaciones, gruposasignados WHERE altasbajas.fecha > '$termino' 
                                                    AND calificaciones.idgrupo = '$idg' 
                                                    AND altasbajas.numeroControl = calificaciones.numeroControl
                                                    AND gruposasignados.idgrupo = calificaciones.idgrupo
                                                    AND calificaciones.unidadTema = '$uniT' 
                                                    AND altasbajas.altaBaja = 'Baja'  AND calificaciones.oportunidad = '2aOp' AND calificaciones.calificacion <= 69;")) {

                            $stmt4->execute();

                            /* bind variables to prepared statement */
                            $stmt4->bind_result($talumnos4);

                            /* fetch values */
                            $stmt4->fetch();
                            /* close statement */
                            $stmt4->close();
                          }

        
        
  }
    
    
    
    
    
    
    
    return $talumnos + $talumnos2 + $talumnos3 + $talumnos4;
    
    
    
    
    
    
    
    

    
}

//================================================================================================================================================


function talumnosbajas($idg){
    
    global $link,$inicio,$termino;
    
    if ($stmt = $link->prepare("SELECT DISTINCT COUNT(altasbajas.numeroControl)
FROM niveles, gruposasignados, altasbajas 
WHERE gruposasignados.idgrupo = '$idg'  
AND niveles.idgrupo = gruposasignados.idgrupo 
AND niveles.numeroControl = altasbajas.numeroControl
AND altasbajas.altaBaja = 'Baja' AND (altasbajas.fecha BETWEEN '$inicio' AND '$termino') ORDER BY altasbajas.id DESC;")) {
        
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




$query = "SELECT DISTINCT gruposasignados.nivel, gruposasignados.carrera, calificaciones.unidadTema, gruposasignados.grupo, gruposasignados.idgrupo FROM gruposasignados, calificaciones WHERE gruposasignados.idmaestro = {$_SESSION["idmaestro"]} AND gruposasignados.periodo = '{$periActuBD}' AND (calificaciones.fecha BETWEEN '$inicio' AND '$termino') AND gruposasignados.idgrupo = calificaciones.idgrupo ORDER BY nivel ASC, unidadTema ASC;";

$result = mysqli_query($link, $query);

if (!$result) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

$dataRow = "";



while($row = mysqli_fetch_array($result))
{
    
    $F = talumnosbajas($row[4]);
    
    //A = TOTAL DE ALUMNOS(AS) POR MATERIA
    $A = talumnospormateria($row[4],$row[2]);  
    
    $A = $A + $F;
    
    //B = NO. DE ALUMNOS(AS) QUE ALCANZARON LAS COMPETENCIAS (EP= EVALUACIÓN DE PRIMERA OPORTUNIDAD, 
    
    $B1aOp = talumnospormateria1aOp($row[4],$row[2]);
    
    //B - ES= EVALUACIÓN DE SEGUNDA OPORTUNIDAD).
    
    $B2aOp = talumnospormateria2aOp($row[4],$row[2]);
    
    // C = % DE ALUMNOS(AS) QUE ALCANZARON LAS COMPETENCIAS POR UNIDAD O UNIDADES TEMÁTICAS EN AMBAS OPORTUNIDADES (EP+ES). SOLAMENTE EN EL REPORTE FINAL
    
    $div = 0;
    
    if(isset($A) && $A != 0){ $div = 100/$A;   }else{$div = 0;} 
    
   
    $C = round( $div *($B1aOp+$B2aOp),2);
    
    //D = NO. DE ALUMNOS(AS) QUE NO ALCANZARON LAS COMPETENCIAS EN EVALUACIÓN DE PRIMERA OPORTUNIDAD O EN SU CASO EN AMBAS OPORTUNIDADES
    
    $D = talumnosrepro1ay2aOp($row[4],$row[2]); 
    
    //E = % DE ALUMNOS(AS) QUE NO ALCANZARON LAS COMPETENCIAS POR UNIDAD O UNIDADES TEMÁTICAS PARA EL REPORTE FINAL.
    
    
    $E = round( $div *$D,2);
    
    //F = NO. DE ALUMNOS(AS) QUE DESERTARON DURANTE EL SEMESTRE EN LA MATERIA (ALUMNOS DADOS DE BAJA).
    
    
    
    //G = % DE ALUMNOS(AS) QUE DESERTARON EN LA MATERIA, TOMANDO COMO DESERCIÓN CUANDO EL ALUMNO(A) SE DA DE BAJA DE LA MATERIA O BAJA DEFINITIVA DURANTE EL CICLO ESCOLAR
    
    //$G = round($F / ( $A / 100 ),2);
    
    
    if(isset($A) && $A != 0){  $G = round($F / ( $A / 100 ),2); }else{$G = 0;}
    
    
    
    $numeroparciales = numeroparciales($row[0],$row[1],$_SESSION['idmaestro'],$periActuBD);
    $carreraAv =  carreraAv($row[1]);
    $romanos = romanos($row[2]);
    
    
    
    
    $dataRow = $dataRow."<tr style='text-align:center;'>
                                <td class='inte'>Inglés $row[0]</td>
                                <td class='inte'>$romanos / $row[0]º $row[3]</td>
                                <td class='inte'>$carreraAv</td>
                                <td class='inte'>$A</td> 
                                <td class='inte'>$B1aOp</td>
                                <td class='inte'>$B2aOp</td>
                                <td class='inte'>$C%</td>
                                <td class='inte'>$D</td>
                                <td class='inte'>$E%</td>
                                <td class='inte'>$F</td>
                                <td class='inte'>$G%</td>
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
                            <td class='inte'></td>
                            <td class='inte'></td>
                        </tr>" ;


//=====================================================================================================================
?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporte FINAL</title>
    
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
            font-size: 14px;
        }

        
        .page-header, .page-header-space {
          height: 110px;
        }

        .page-footer, .page-footer-space {
          height: 180px;

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
                    <img src="../imagenes/enca.PNG" width="auto" height="103px">
                </div>
              
                
                
                


            </div>
        </div>
    </header>

    
    <footer class="page-footer divFooter">
         <div class="container">
             <div class="row">
                <div class="col-sm-12 divFooter">
                    <img class="logo" src="../imagenes/footer.PNG" height="210px" >
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
                <p><b>REPORTE: FINAL | DEL SEMESTRE: <?php if($per == 1){echo "ene-jun ".$year;}elseif($per == 2){echo  "ago-dic ".$year;} ?> </b></p>
                <p><b>Profesor(a): </b><?php echo $_SESSION['titulo']." ".$_SESSION['nombre']." ".$_SESSION['paterno']." ".$_SESSION['materno']; ?></p>
                <p><b>No. de Grupos Atendidos: </b><?php echo numerogrupos($_SESSION['idmaestro'],$periActuBD,$link); ?> <b>| No. de Asignaturas diferentes: </b><?php echo asignaturasdiferentes($_SESSION['idmaestro'],$periActuBD,$link); ?></p>
                
                <table class="table table-bordered" style="background-color: transparent !important;">
                    <thead>
                        <tr style="text-align:center;">
                            <th CLASS="inte" rowspan="2">ASIGNATURA</th>
                            <th CLASS="inte" rowspan="2">UNIDAD / SEMESTRE</th>
                            <th CLASS="inte" rowspan="2">CARRERA</th>
                            <th CLASS="inte" rowspan="2">A</th>
                            <th CLASS="inte" colspan="2">B</th>
                            <th CLASS="inte" >C</th>   
                            <th CLASS="inte" >D</th>  
                            <th CLASS="inte" >E</th>
                            <th CLASS="inte" >F</th>  
                            <th CLASS="inte" >G</th>
                             

                        </tr>
                        <tr  style="text-align:center;">
                            <th CLASS="inte" >EP</th>
                            <th CLASS="inte" >ES</th>
                            <th CLASS="inte" ></th>   
                            <th CLASS="inte" ></th>  
                            <th CLASS="inte" ></th> 
                            <th CLASS="inte" ></th>
                            <th CLASS="inte" ></th>
                             
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $dataRow; echo $dataRow2;?>
                        
                    </tbody>
                </table>
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