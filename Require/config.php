<?php
/*Databse credentials. Assuming you are running MySQL
server with default settings (user 'root' with no password)*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'academia_ingles');
define('DB_PASSWORD', 'a98450153_-');
define('BD_NAME', 'academia_ingles');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, BD_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>