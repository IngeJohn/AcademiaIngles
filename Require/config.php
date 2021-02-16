<?php
/*Databse credentials. Assuming you are running MySQL
server with default settings (user 'root' with no password)*/

$host = 'mysql:host=localhost;dbname=academia_ingles';
$us = 'academia_ingles';
$pss = 'a98450153_-';
$db = 'academia_ingles';

define('DB_SERVER', 'localhost');
define('DB_USERNAME', $us);
define('DB_PASSWORD', $pss);
define('BD_NAME', $db);

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, BD_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//'mysql:host=localhost;dbname=academia_ingles', 'academia_ingles', 'a98450153_-'



if ($stmt = $link->prepare("SELECT  periodo, periodoAnterior FROM periodoactual")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($periActuBD, $periodoAnt);

    /* fetch values */
    $stmt->fetch();

    /* close statement */
    $stmt->close();
}

?>