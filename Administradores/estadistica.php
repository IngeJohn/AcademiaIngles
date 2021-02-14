<?php

// Include config file
require_once "../Require/config.php";



date_default_timezone_set('America/Mexico_City');

    $peri = 0;  
    $per = 0;
    $per2 = 0;
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

if($per == 2){
    
    $per2 = 1;
    
}elseif($per == 1){
    
    $per2 = 2;
    
}

$ingreso = $per2."-".$year-3;

//================================================================================================================================================


if ($stmt = $link->prepare("SELECT  periodo FROM periodoactual")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($periActuBD);

    /* fetch values */
$stmt->fetch();

    /* close statement */
    $stmt->close();
}


//=====================================================================================================================================
//   Matricula Total de Alumnos del Tecnológico

if ($stmt1 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."';")) {
    $stmt1->execute();

    /* bind variables to prepared statement */
    $stmt1->bind_result($totalAlumnos);

    /* fetch values */
   $stmt1->fetch();
    /* close statement */
    $stmt1->close();
  }

//=====================================================================================================================================
//   Matricula Total de Alumnos del Tecnológico Hombres

if ($stmt2 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' 
                                AND alumnos.sexo = 'H';")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($totalAlumnosH);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }

//=====================================================================================================================================
//   Matricula Total de Alumnos del Tecnológico Mujeres

if ($stmt3 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.sexo = 'M';")) {
    $stmt3->execute();

    /* bind variables to prepared statement */
    $stmt3->bind_result($totalAlumnosM);

    /* fetch values */
   $stmt3->fetch();
    /* close statement */
    $stmt3->close();
    
    
  }

//=====================================================================================================================================
//   Total de facilitadores del Tecnológico 

if ($stmt4 = $link->prepare("SELECT COUNT(idmaestro) FROM docentes
                                WHERE altaBaja = 'Alta';")) {
    $stmt4->execute();

    /* bind variables to prepared statement */
    $stmt4->bind_result($totalMaestros);

    /* fetch values */
   $stmt4->fetch();
    /* close statement */
    $stmt4->close();
    
    
  }
//=====================================================================================================================================
//   Total de facilitadores del Tecnológico con certificación
 
if ($stmt4 = $link->prepare("SELECT COUNT(idmaestro) FROM docentes
                                WHERE altaBaja = 'Alta' AND certificacion = 'Sin certificación';")) {
    $stmt4->execute();

    /* bind variables to prepared statement */
    $stmt4->bind_result($totalMaestrosSinCerti);

    /* fetch values */
   $stmt4->fetch();
    /* close statement */
    $stmt4->close();
    
    
  }

$totalMaestrosConCerti = $totalMaestros - $totalMaestrosSinCerti;

//=====================================================================================================================================
//   Total de estudiantes egresados satisfactoriamente
 
if ($stmt = $link->prepare("SELECT COUNT(numeroControl) FROM liberaciones
                                WHERE liberaion = 'Liberado' AND periodo = '".$_SESSION['periodoDB']."';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosLiberadosPeriodoActual);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }
//=====================================================================================================================================
//   Total de alumnos ingresados en el primer semestre de los que se liberan en el periodo actual
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados 
	WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$ingreso."';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosIngresoMenos3);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }


if($totalalumnosIngresoMenos3 != 0){
    
    $eficienciaTerminal = (100 / $totalalumnosIngresoMenos3) * $totalalumnosLiberadosPeriodoActual;
    
}else{
    
    $eficienciaTerminal = 0;
    
}

//=====================================================================================================================================
//   Estudiantes con liberación del idioma con nivel B1 Hombres
 
if ($stmt = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
	                               WHERE alumnos.idgrupoActual = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                    AND alumnos.certificacion = 'Nivel B1' AND alumnos.sexo = 'H';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosB1H);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Estudiantes con liberación del idioma con nivel B1 Mujeres
 
if ($stmt = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
	                               WHERE alumnos.idgrupoActual = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                    AND alumnos.certificacion = 'Nivel B1' AND alumnos.sexo = 'M';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosB1M);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Estudiantes con liberación del idioma con nivel B2 Hombres
 
if ($stmt = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
	                               WHERE alumnos.idgrupoActual = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                    AND alumnos.certificacion = 'Nivel B2' AND alumnos.sexo = 'H';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosB2H);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Estudiantes con liberación del idioma con nivel B2 Mujeres
 
if ($stmt = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
	                               WHERE alumnos.idgrupoActual = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                    AND alumnos.certificacion = 'Nivel B2' AND alumnos.sexo = 'M';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosB2M);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Estudiantes con Beca Hombres
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND niveles.tipoProgramaBeca = 'Con Beca' AND alumnos.sexo = 'H'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosBecaH);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }


//=====================================================================================================================================
//   Estudiantes con Beca Mujeres
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND niveles.tipoProgramaBeca = 'Con Beca' AND alumnos.sexo = 'M'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosBecaM);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }


//=====================================================================================================================================
//   Estudiantes dados de Baja
 
if ($stmt = $link->prepare("SELECT COUNT(altasbajas.numeroControl) FROM altasbajas
                                WHERE fecha LIKE '$year%' AND altaBaja = 'Baja'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosBaja);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }
//=====================================================================================================================================
//   Estudiantes dados de Baja Hombre
 
if ($stmt = $link->prepare("SELECT COUNT(altasbajas.numeroControl) FROM altasbajas, alumnos
                                WHERE altasbajas.fecha LIKE '$year%' AND altasbajas.altaBaja = 'Baja'
                                AND altasbajas.numeroControl = alumnos.numeroControl
                                AND alumnos.sexo = 'H'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosBajaH);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }
//=====================================================================================================================================
//   Estudiantes dados de Baja Mujer
 
if ($stmt = $link->prepare("SELECT COUNT(altasbajas.numeroControl) FROM altasbajas, alumnos
                                WHERE altasbajas.fecha LIKE '$year%' AND altasbajas.altaBaja = 'Baja'
                                AND altasbajas.numeroControl = alumnos.numeroControl
                                AND alumnos.sexo = 'M'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosBajaM);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Estudiantes con con Beca Mujeres
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo LIKE '%".$year."%'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 1")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNnivel1);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//============================================================================================================




?>