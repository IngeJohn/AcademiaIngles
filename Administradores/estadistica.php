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
                                AND gruposasignados.periodo = '".$_SESSION['periodoDB']."';")) {
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
//==========================================================================================================

//Porcentaje de estudiantes participantes Hombres


$porcentajeH = 0.0;
    
    
    if($totalAlumnos == 0){}else{$porcentajeH = round((100/$totalAlumnos)* $totalAlumnosH,2);}

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
//==========================================================================================================
//Porcentaje de estudiantes participantes Mujeres

$porcentajeM = 0.0;
    
    
    if($totalAlumnos == 0){}else{$porcentajeM = round((100/$totalAlumnos)* $totalAlumnosM,2);}


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
//   Total de facilitadores del Tecnológico sin certificación
 
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
//=====================================================================================================================================
//   Porcentaje de facilitadores del Tecnológico con certificación

$pocentajeMaestrosSinCertifi = 0.0;

if($totalMaestros == 0){}else{ $pocentajeMaestrosSinCertifi = (100/$totalMaestros)*$totalMaestrosSinCerti;}
//=====================================================================================================================================
//   Total de facilitadores del Tecnológico con certificación

$totalMaestrosConCerti = $totalMaestros - $totalMaestrosSinCerti;

//=====================================================================================================================================
//   Porcentaje de facilitadores del Tecnológico con certificación

$pocentajeMaestrosCertifi = 0.0;

if($totalMaestros == 0){}else{ $pocentajeMaestrosCertifi = (100/$totalMaestros)*$totalMaestrosConCerti;}



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
//   Estudiantes con liberación del idioma con nivel B1
 
if ($stmt = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
	                               WHERE alumnos.idgrupoActual = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                    AND alumnos.certificacion = 'Nivel B1';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosB1);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porcentaje de estudiantes con liberación del idioma con nivel B1

$porcentajeB1 = 0.0;


if($totalAlumnos == 0){}else{$porcentajeB1 = round((100/$totalAlumnos)* $totalalumnosB1,2);}


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
//   Porcentaje de estudiantes con liberación del idioma con nivel B1 Hombres

$porcentajeB1H = 0.0;


if($totalAlumnos == 0){}else{$porcentajeB1H = round((100/$totalAlumnos)* $totalalumnosB1H,2);}

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
//   Porcentaje de estudiantes con liberación del idioma con nivel B1 Mujeres

$porcentajeB1M = 0.0;


if($totalAlumnos == 0){}else{$porcentajeB1M = round((100/$totalAlumnos)* $totalalumnosB1M,2);}

//=====================================================================================================================================
//   Estudiantes con liberación del idioma con nivel B2
 
if ($stmt = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
	                               WHERE alumnos.idgrupoActual = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                    AND alumnos.certificacion = 'Nivel B2';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosB2);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porcentaje de estudiantes con liberación del idioma con nivel B2

$porcentajeB2 = 0.0;


if($totalAlumnos == 0){}else{$porcentajeB2 = round((100/$totalAlumnos)* $totalalumnosB2,2);}


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
//   Porcentaje de estudiantes con liberación del idioma con nivel B2 Hombres

$porcentajeB2H = 0.0;


if($totalAlumnos == 0){}else{$porcentajeB2H = round((100/$totalAlumnos)* $totalalumnosB2H,2);}

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
//   Porcentaje de estudiantes con liberación del idioma con nivel B2 Mujeres

$porcentajeB2M = 0.0;


if($totalAlumnos == 0){}else{$porcentajeB2M = round((100/$totalAlumnos)* $totalalumnosB2M,2);}


//=====================================================================================================================================
//   Estudiantes con Beca
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND niveles.tipoProgramaBeca = 'Con Beca'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosBeca);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   porcnetaje de estudiantes con Beca

$porcentajealumnosBeca = 0.0;


if($totalAlumnos == 0){}else{$porcentajealumnosBeca = round((100/$totalAlumnos)* $totalalumnosBeca,2);}
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
//   porcnetaje de estudiantes con Beca Hombres

$porcentajealumnosBecaH = 0.0;


if($totalAlumnos == 0){}else{$porcentajealumnosBecaH = round((100/$totalAlumnos)* $totalalumnosBecaH,2);}


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
//   porcnetaje de estudiantes con Beca Mujeres

$porcentajealumnosBecaM = 0.0;


if($totalAlumnos == 0){}else{$porcentajealumnosBecaM = round((100/$totalAlumnos)* $totalalumnosBecaM,2);}

//=====================================================================================================================================
//   Estudiantes dados de Baja
 
if ($stmt = $link->prepare("SELECT COUNT(altasbajas.numeroControl) FROM altasbajas, alumnos, gruposasignados
                                WHERE altasbajas.fecha LIKE '$year%' AND altasbajas.altaBaja = 'Baja'
                                AND altasbajas.numeroControl = alumnos.numeroControl
                                AND alumnos.idgrupoActual = gruposasignados.idgrupo ;")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosBaja);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porcentaje de deserción de estudiantes

$porventajeDesercion = 0.0;


if($totalAlumnos == 0){}else{$porventajeDesercion = round((100/$totalAlumnos )  * $totalalumnosBaja,2);}




//=====================================================================================================================================
//   Estudiantes dados de Baja Hombre
 
if ($stmt = $link->prepare("SELECT COUNT(altasbajas.numeroControl) FROM altasbajas, alumnos, gruposasignados
                                WHERE altasbajas.fecha LIKE '$year%' AND altasbajas.altaBaja = 'Baja'
                                AND altasbajas.numeroControl = alumnos.numeroControl
                                AND alumnos.idgrupoActual = gruposasignados.idgrupo
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
//   Porcentaje de deserción de estudiantes Hombre

$porventajeDesercionH = 0.0;


if($totalAlumnos == 0){}else{$porventajeDesercionH = round((100/$totalAlumnos )  * $totalalumnosBajaH,2);}
//=====================================================================================================================================
//   Estudiantes dados de Baja Mujer
 
if ($stmt = $link->prepare("SELECT COUNT(altasbajas.numeroControl) FROM altasbajas, alumnos, gruposasignados
                                WHERE altasbajas.fecha LIKE '$year%' AND altasbajas.altaBaja = 'Baja'
                                AND altasbajas.numeroControl = alumnos.numeroControl
                                AND alumnos.idgrupoActual = gruposasignados.idgrupo
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
//   Porcentaje de deserción de estudiantes Mujeres

$porventajeDesercionM = 0.0;


if($totalAlumnos == 0){}else{$porventajeDesercionM = round((100/$totalAlumnos )  * $totalalumnosBajaM,2);}





//=====================================================================================================================================
//   Total estudiantes  nivel 1
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 1")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel1);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 1

$porventajeNivel1 = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel1 = round((100/$totalAlumnos )  * $totalalumnosNivel1,2);}
//=====================================================================================================================================
//   Total de Alumnos participantes que atienden el Nivel 1 Hombres
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 1 AND alumnos.sexo = 'H'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel1H);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 1 Hombres

$porventajeNivel1H = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel1H = round((100/$totalAlumnos )  * $totalalumnosNivel1H,2);}

//=====================================================================================================================================
//   Total de Alumnos participantes que atienden el Nivel 1 Mujeres
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 1 AND alumnos.sexo = 'M'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel1M);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 1 Mujeres

$porventajeNivel1M = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel1M = round((100/$totalAlumnos )  * $totalalumnosNivel1M,2);}
//=====================================================================================================================================
//   Total estudiantes  nivel 2
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 2")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel2);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 2

$porventajeNivel2 = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel2 = round((100/$totalAlumnos )  * $totalalumnosNivel2,2);}
//=====================================================================================================================================
//   Total de Alumnos participantes que atienden el Nivel 2 Hombres
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 2 AND alumnos.sexo = 'H'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel2H);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 2 Hombres

$porventajeNivel2H = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel2H = round((100/$totalAlumnos )  * $totalalumnosNivel2H,2);}

//=====================================================================================================================================
//   Total de Alumnos participantes que atienden el Nivel 2 Mujeres
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 2 AND alumnos.sexo = 'M'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel2M);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 2 Mujeres

$porventajeNivel2M = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel2M = round((100/$totalAlumnos )  * $totalalumnosNivel2M,2);}


//=====================================================================================================================================
//   Total estudiantes  nivel 3
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 3")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel3);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 3

$porventajeNivel3 = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel3 = round((100/$totalAlumnos )  * $totalalumnosNivel3,2);}
//=====================================================================================================================================
//   Total de Alumnos participantes que atienden el Nivel 3 Hombres
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 3 AND alumnos.sexo = 'H'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel3H);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 3 Hombres

$porventajeNivel3H = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel3H = round((100/$totalAlumnos )  * $totalalumnosNivel3H,2);}

//=====================================================================================================================================
//   Total de Alumnos participantes que atienden el Nivel 3 Mujeres
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 3 AND alumnos.sexo = 'M'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel3M);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 3 Mujeres

$porventajeNivel3M = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel3M = round((100/$totalAlumnos )  * $totalalumnosNivel3M,2);}


//=====================================================================================================================================
//   Total estudiantes  nivel 4
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 4")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel4);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 4

$porventajeNivel4 = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel4 = round((100/$totalAlumnos )  * $totalalumnosNivel4,2);}
//=====================================================================================================================================
//   Total de Alumnos participantes que atienden el Nivel 4 Hombres
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 4 AND alumnos.sexo = 'H'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel4H);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 4 Hombres

$porventajeNivel4H = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel4H = round((100/$totalAlumnos )  * $totalalumnosNivel4H,2);}

//=====================================================================================================================================
//   Total de Alumnos participantes que atienden el Nivel 4 Mujeres
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 4 AND alumnos.sexo = 'M'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel4M);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 4 Mujeres

$porventajeNivel4M = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel4M = round((100/$totalAlumnos )  * $totalalumnosNivel4M,2);}


//=====================================================================================================================================
//   Total estudiantes  nivel 5
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 5")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel5);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 5

$porventajeNivel5 = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel5 = round((100/$totalAlumnos )  * $totalalumnosNivel5,2);}
//=====================================================================================================================================
//   Total de Alumnos participantes que atienden el Nivel 5 Hombres
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 5 AND alumnos.sexo = 'H'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel5H);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 5 Hombres

$porventajeNivel5H = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel5H = round((100/$totalAlumnos )  * $totalalumnosNivel5H,2);}

//=====================================================================================================================================
//   Total de Alumnos participantes que atienden el Nivel 5 Mujeres
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 5 AND alumnos.sexo = 'M'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel5M);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 5 Mujeres

$porventajeNivel5M = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel5M = round((100/$totalAlumnos )  * $totalalumnosNivel5M,2);}

//=====================================================================================================================================
//   Total estudiantes  nivel 6
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 6")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel6);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 6

$porventajeNivel6 = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel6 = round((100/$totalAlumnos )  * $totalalumnosNivel6,2);}
//=====================================================================================================================================
//   Total de Alumnos participantes que atienden el Nivel 6 Hombres
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 6 AND alumnos.sexo = 'H'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel6H);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 6 Hombres

$porventajeNivel6H = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel6H = round((100/$totalAlumnos )  * $totalalumnosNivel6H,2);}

//=====================================================================================================================================
//   Total de Alumnos participantes que atienden el Nivel 6 Mujeres
 
if ($stmt = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM niveles, gruposasignados, alumnos
                                WHERE niveles.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND gruposasignados.nivel = 6 AND alumnos.sexo = 'M'")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($totalalumnosNivel6M);

    /* fetch values */
   $stmt->fetch();
    /* close statement */
    $stmt->close();
    
    
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes que atienden el Nivel 6 Mujeres

$porventajeNivel6M = 0.0;


if($totalAlumnos == 0){}else{$porventajeNivel6M = round((100/$totalAlumnos )  * $totalalumnosNivel6M,2);}


//=====================================================================================================================================
//   Total alumnos participantes de la carrera de Ingeniería en Sistemas Computacionales

if ($stmt1 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' 
                                AND gruposasignados.carrera = 'Sistemas Computacionales';")) {
    $stmt1->execute();

    /* bind variables to prepared statement */
    $stmt1->bind_result($totalAlumnosSistemas);

    /* fetch values */
   $stmt1->fetch();
    /* close statement */
    $stmt1->close();
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes de la carrera de Ingeniería en Sistemas Computacionales

$porcentajesAlumnosSistemas = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosSistemas = round((100/$totalAlumnos )  * $totalAlumnosSistemas,2);}

//=====================================================================================================================================
//   Total alumnos participantes de la carrera de Ingeniería en Sistemas Computacionales Hombres

if ($stmt2 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' 
                                AND gruposasignados.carrera = 'Sistemas Computacionales' AND alumnos.sexo = 'H';")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($totalAlumnosSistemasH);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }
//=====================================================================================================================================
//   Porventaje de Alumnos participantes de la carrera de Ingeniería en Sistemas Computacionales Hombres

$porcentajesAlumnosSistemasH = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosSistemasH = round((100/$totalAlumnos )  * $totalAlumnosSistemasH,2);}
//=====================================================================================================================================
//   Total alumnos participantes de la carrera de Ingeniería en Sistemas Computacionales Mujeres

if ($stmt2 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' 
                                AND gruposasignados.carrera = 'Sistemas Computacionales' AND alumnos.sexo = 'M';")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($totalAlumnosSistemasM);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }
//=====================================================================================================================================
//   Porventaje de Alumnos participantes de la carrera de Ingeniería en Sistemas Computacionales Mujeres

$porcentajesAlumnosSistemasM = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosSistemasM = round((100/$totalAlumnos )  * $totalAlumnosSistemasM,2);}


//=====================================================================================================================================
//   Total alumnos participantes de la carrera de Ingeniería Mecatrónica

if ($stmt1 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' 
                                AND gruposasignados.carrera = 'Mecatrónica';")) {
    $stmt1->execute();

    /* bind variables to prepared statement */
    $stmt1->bind_result($totalAlumnosMecatronica);

    /* fetch values */
   $stmt1->fetch();
    /* close statement */
    $stmt1->close();
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes de la carrera de Ingeniería Mecatrónica

$porcentajesAlumnosMecatronica = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosMecatronica = round((100/$totalAlumnos )  * $totalAlumnosMecatronica,2);}

//=====================================================================================================================================
//   Total alumnos participantes de la carrera de Ingeniería Mecatrónica Hombres

if ($stmt2 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' 
                                AND gruposasignados.carrera = 'Mecatrónica' AND alumnos.sexo = 'H';")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($totalAlumnosMecatronicaH);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }
//=====================================================================================================================================
//   Porventaje de Alumnos participantes de la carrera de Ingeniería Mecatrónica Hombres

$porcentajesAlumnosMecatronicaH = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosMecatronicaH = round((100/$totalAlumnos )  * $totalAlumnosMecatronicaH,2);}
//=====================================================================================================================================
//   Total alumnos participantes de la carrera de Ingeniería Mecatrónica Mujeres

if ($stmt2 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' 
                                AND gruposasignados.carrera = 'Mecatrónica' AND alumnos.sexo = 'M';")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($totalAlumnosMecatronicaM);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }
//=====================================================================================================================================
//   Porventaje de Alumnos participantes de la carrera de Ingeniería Mecatrónica Mujeres

$porcentajesAlumnosMecatronicaM = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosMecatronicaM = round((100/$totalAlumnos )  * $totalAlumnosMecatronicaM,2);}


//=====================================================================================================================================
//   Total alumnos participantes de la carrera de Ingeniería Industrial

if ($stmt1 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' 
                                AND gruposasignados.carrera = 'Industrial';")) {
    $stmt1->execute();

    /* bind variables to prepared statement */
    $stmt1->bind_result($totalAlumnosIndustrial);

    /* fetch values */
   $stmt1->fetch();
    /* close statement */
    $stmt1->close();
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes de la carrera de Ingeniería Industrial

$porcentajesAlumnosIndustrial = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosIndustrial = round((100/$totalAlumnos )  * $totalAlumnosIndustrial,2);}

//=====================================================================================================================================
//   Total alumnos participantes de la carrera de Ingeniería Industrial Hombres

if ($stmt2 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' 
                                AND gruposasignados.carrera = 'Industrial' AND alumnos.sexo = 'H';")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($totalAlumnosIndustrialH);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }
//=====================================================================================================================================
//   Porventaje de Alumnos participantes de la carrera de Ingeniería Industrial Hombres

$porcentajesAlumnosIndustrialH = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosIndustrialH = round((100/$totalAlumnos )  * $totalAlumnosIndustrialH,2);}
//=====================================================================================================================================
//   Total alumnos participantes de la carrera de Ingeniería Industrial Mujeres

if ($stmt2 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' 
                                AND gruposasignados.carrera = 'Industrial' AND alumnos.sexo = 'M';")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($totalAlumnosIndustrialM);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }
//=====================================================================================================================================
//   Porventaje de Alumnos participantes de la carrera de Ingeniería Industrial Mujeres

$porcentajesAlumnosIndustrialM = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosIndustrialM = round((100/$totalAlumnos )  * $totalAlumnosIndustrialM,2);}


//=====================================================================================================================================
//   Total alumnos participantes de la carrera de Ingeniería en Gestión Empresarial

if ($stmt1 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' 
                                AND gruposasignados.carrera = 'Gestión Empresarial';")) {
    $stmt1->execute();

    /* bind variables to prepared statement */
    $stmt1->bind_result($totalAlumnosIGE);

    /* fetch values */
   $stmt1->fetch();
    /* close statement */
    $stmt1->close();
  }

//=====================================================================================================================================
//   Porventaje de Alumnos participantes de la carrera de Ingeniería en Gestión Empresarial

$porcentajesAlumnosIGE = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosIGE = round((100/$totalAlumnos )  * $totalAlumnosIGE,2);}

//=====================================================================================================================================
//   Total alumnos participantes de la carrera de Ingeniería en Gestión Empresarial Hombres

if ($stmt2 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' 
                                AND gruposasignados.carrera = 'Gestión Empresarial' AND alumnos.sexo = 'H';")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($totalAlumnosIGEH);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }
//=====================================================================================================================================
//   Porventaje de Alumnos participantes de la carrera de Ingeniería en Gestión Empresarial Hombres

$porcentajesAlumnosIGEH = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosIGEH = round((100/$totalAlumnos )  * $totalAlumnosIGEH,2);}
//=====================================================================================================================================
//   Total alumnos participantes de la carrera de Ingeniería en Gestión Empresarial Mujeres

if ($stmt2 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados 
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' 
                                AND gruposasignados.carrera = 'Gestión Empresarial' AND alumnos.sexo = 'M';")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($totalAlumnosIGEM);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }
//=====================================================================================================================================
//   Porventaje de Alumnos participantes de la carrera de Ingeniería en Gestión Empresarial Mujeres

$porcentajesAlumnosIGEM = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosIGEM = round((100/$totalAlumnos )  * $totalAlumnosIGEM,2);}


//=====================================================================================================================================
//   Total alumnos participantes que no alcanzaron las competencias

if ($stmt2 = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM alumnos, gruposasignados, niveles
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND gruposasignados.idgrupo = niveles.idgrupo
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND niveles.estado = 'No acreditado' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."';")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($totalAlumnosNoAcreditado);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }
//=====================================================================================================================================
//   Porventaje de alumnos participantes que no alcanzaron las competencias

$porcentajesAlumnosNoAcreditado = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosNoAcreditado = round((100/$totalAlumnos )  * $totalAlumnosNoAcreditado,2);}

//=====================================================================================================================================
//   Total alumnos participantes alcanzaron las competencias

if ($stmt2 = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM alumnos, gruposasignados, niveles
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND gruposasignados.idgrupo = niveles.idgrupo
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND niveles.estado = 'Acreditado' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."';")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($totalAlumnosAcreditado);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }
//=====================================================================================================================================
//   Porventaje de alumnos participantes que alcanzaron las competencias

$porcentajesAlumnosAcreditado = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosAcreditado = round((100/$totalAlumnos )  * $totalAlumnosAcreditado,2);}

//=====================================================================================================================================
//   Total alumnos participantes que alcanzaron las competencias Hombres

if ($stmt2 = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM alumnos, gruposasignados, niveles
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND gruposasignados.idgrupo = niveles.idgrupo
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND niveles.estado = 'Acreditado' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.sexo = 'H';")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($totalAlumnosAcreditadoH);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }
//=====================================================================================================================================
//   Porventaje de alumnos participantes que alcanzaron las competencias Hombres

$porcentajesAlumnosAcreditadoH = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosAcreditadoH = round((100/$totalAlumnos )  * $totalAlumnosAcreditadoH,2);}

//=====================================================================================================================================
//   Total alumnos participantes que no alcanzaron las competencias Mujeres

if ($stmt2 = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM alumnos, gruposasignados, niveles
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND gruposasignados.idgrupo = niveles.idgrupo
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND niveles.estado = 'Acreditado' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.sexo = 'M';")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($totalAlumnosAcreditadoM);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }
//=====================================================================================================================================
//   Porventaje de alumnos participantes que alcanzaron las competencias

$porcentajesAlumnosAcreditadoM = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosAcreditadoM = round((100/$totalAlumnos )  * $totalAlumnosAcreditadoM,2);}


//=====================================================================================================================================
//   Total alumnos participantes que no alcanzaron las competencias Hombres

if ($stmt2 = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM alumnos, gruposasignados, niveles
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND gruposasignados.idgrupo = niveles.idgrupo
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND niveles.estado = 'No acreditado' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.sexo = 'H';")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($totalAlumnosNoAcreditadoH);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }
//=====================================================================================================================================
//   Porventaje de alumnos participantes que no alcanzaron las competencias Hombres

$porcentajesAlumnosNoAcreditadoH = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosNoAcreditadoH = round((100/$totalAlumnos )  * $totalAlumnosNoAcreditadoH,2);}

//=====================================================================================================================================
//   Total alumnos participantes que no alcanzaron las competencias Mujeres

if ($stmt2 = $link->prepare("SELECT COUNT(niveles.numeroControl) FROM alumnos, gruposasignados, niveles
                                WHERE gruposasignados.idgrupo = alumnos.idgrupoActual 
                                AND gruposasignados.idgrupo = niveles.idgrupo
                                AND alumnos.numeroControl = niveles.numeroControl
                                AND niveles.estado = 'No acreditado' AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'
                                AND alumnos.sexo = 'M';")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($totalAlumnosNoAcreditadoM);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }
//=====================================================================================================================================
//   Porventaje de alumnos participantes que no alcanzaron las competencias

$porcentajesAlumnosNoAcreditadoM = 0.0;


if($totalAlumnos == 0){}else{$porcentajesAlumnosNoAcreditadoM = round((100/$totalAlumnos )  * $totalAlumnosNoAcreditadoM,2);}

?>