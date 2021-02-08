<?php

//require_once "../Require/config.php";
// (1) DATABASE CONFIG
// ! CHANGE THESE TO YOUR OWN !
define('DB_HOST', 'localhost');
define('DB_NAME', 'academia_ingles');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'academia_ingles');
define('DB_PASSWORD', 'a98450153_-');

// (2) CONNECT TO DATABASE
try {
  $pdo = new PDO(
    "mysql:host=" . DB_HOST . ";charset=" . DB_CHARSET . ";dbname=" . DB_NAME,
    DB_USER, DB_PASSWORD, [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false ]
  );
} catch (Exception $ex) {
  die($ex->getMessage());
}



if ($stmt3 = $pdo->prepare("SELECT  periodo FROM periodoactual")) {
    $stmt3->execute();

    /* bind variables to prepared statement */
    $stmt3->bind_result($periActuBD);

    /* fetch values */
$stmt3->fetch();

    /* close statement */
    $stmt3->close();
}


// (3) SEARCH
$stmt = $pdo->prepare("SELECT numeroNivel, grupo, carrera, modalidad, idmaestro FROM alumnos WHERE numeroControl = ? AND periodo = '{$periActuBD}'");

$stmt->execute([$_POST['search']]);

$stmt->bind_result($numeroNivel, $grupo, $carrera, $modalidad, $idmaestro);

$stmt->fetch();


//$stmt1 = $pdo->prepare("SELECT lunes, martes, miercoles, jueves, viernes, sabado FROM alumnos WHERE numeroNivel = '{$numeroNivel}' AND grupo = '{$grupo}' AND carrera = '{$carrera}' AND modalidad = '{$modalidad}' AND idmaestro = '{$idmaestro}'");

$stmt1 = $pdo->prepare("SELECT lunes, martes, miercoles, jueves, viernes, sabado FROM horarios WHERE nivel = '2' AND grupo = 'A' AND carrera = 'Industrial' AND modalidad = 'Escolarizado' AND idmaestro = '3'");

$stmt1->execute();

$stmt1->fetch();

$results = $stmt1->fetch();

if (isset($_POST['ajax'])) {
    
    echo json_encode($results); 
    
}

?>