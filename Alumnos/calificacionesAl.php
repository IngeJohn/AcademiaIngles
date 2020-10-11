<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../home.php");
    exit;
}

isset($_SESSION["category"]);
static $cate ;
$cate = "yo";
if($_SESSION["category"] == 1){
    $cate;
    $cate = "Estudiante";
}elseif($_SESSION["category"] == 2){
    $cate ;
    $cate = "Docente";
}elseif($_SESSION["category"] == 3){
    $cate ;
    $cate = "Contador";
}elseif($_SESSION["category"] == 4){
    $cate ;
    $cate = "Administrador";
}
// php populate html table from mysql database

$hostname = "localhost";
$username = "root";
$password = "master";
$databaseName = "academia_ingles";

// connect to mysql
$connect = mysqli_connect($hostname, $username, $password, $databaseName);
// mysql select query
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

$querypa1 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '1'";


$query1 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '1'";
$query2 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '2'";
$query3 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '3'";
$query4 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '4'";
$query5 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '5'";
$query6 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '6'";

$queryp1 = "SELECT  round(AVG(calificacion),2) 'Promedio' FROM calificaciones WHERE  numeroControl = {$_SESSION["numeroControl"]} AND nivel = '1'";
$queryp2 = "SELECT  round(AVG(calificacion),2) 'Promedio' FROM calificaciones WHERE  numeroControl = {$_SESSION["numeroControl"]} AND nivel = '2'";
$queryp3 = "SELECT  round(AVG(calificacion),2) 'Promedio' FROM calificaciones WHERE  numeroControl = {$_SESSION["numeroControl"]} AND nivel = '3'";
$queryp4 = "SELECT  round(AVG(calificacion),2) 'Promedio' FROM calificaciones WHERE  numeroControl = {$_SESSION["numeroControl"]} AND nivel = '4'";
$queryp5 = "SELECT  round(AVG(calificacion),2) 'Promedio' FROM calificaciones WHERE  numeroControl = {$_SESSION["numeroControl"]} AND nivel = '5'";
$queryp6 = "SELECT  round(AVG(calificacion),2) 'Promedio' FROM calificaciones WHERE  numeroControl = {$_SESSION["numeroControl"]} AND nivel = '6'";

// resultpa1 
$resultpa1 = mysqli_query($connect, $querypa1);


if (!$resultpa1) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa1;
    die($message);
}



$display="";
$displaymensaje="";
// result1 
$result1 = mysqli_query($connect, $query1);
if ($result1->num_rows === 0){
    $display="visibility: hidden;";
    $displaymensaje="<p>No se encontraron calificaciones del nivel 1.</p>";
}

if (!$result1) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query1;
    die($message);
    
}
// result2 
$result2 = mysqli_query($connect, $query2);

if (!$result2) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query2;
    die($message);
}
// result3 
$result3 = mysqli_query($connect, $query3);

if (!$result3) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query3;
    die($message);
}
// result4 
$result4 = mysqli_query($connect, $query4);

if (!$result4) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query4;
    die($message);
}
// result5 
$result5 = mysqli_query($connect, $query5);

if (!$result5) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query5;
    die($message);
}
// result6 
$result6 = mysqli_query($connect, $query6);

if (!$result6) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query6;
    die($message);
}
// resultp1
$resultp1 = mysqli_query($connect, $queryp1);

if (!$resultp1) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp1;
    die($message);
}
// resultp2 
$resultp2 = mysqli_query($connect, $queryp2);

if (!$resultp2) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp2;
    die($message);
}
// resultp3 
$resultp3 = mysqli_query($connect, $queryp3);

if (!$resultp3) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp3;
    die($message);
}
// resultp4 
$resultp4 = mysqli_query($connect, $queryp4);

if (!$resultp4) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp4;
    die($message);
}
// resultp5
$resultp5 = mysqli_query($connect, $queryp5);

if (!$resultp5) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp5;
    die($message);
}
// resultp6 
$resultp6 = mysqli_query($connect, $queryp6);

if (!$resultp6) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp6;
    die($message);
}

$dataRowpa1 = "";

$dataRow1 = "";
$dataRow2 = "";
$dataRow3 = "";
$dataRow4 = "";
$dataRow5 = "";
$dataRow6 = "";
$dataRowp1 = "";
$dataRowp2 = "";
$dataRowp3 = "";
$dataRowp4 = "";
$dataRowp5 = "";
$dataRowp6 = "";




while($rowpa1 = mysqli_fetch_array($resultpa1))
{

    $dataRowpa1 = $dataRowpa1."<th>&nbsp;$rowpa1[0]</th>";
    
}

while($row1 = mysqli_fetch_array($result1))
{
    
    $dataRow1 = $dataRow1."<td>$row1[0]</td>";
    
}
while($row2 = mysqli_fetch_array($result2))
{
    $dataRow2 = $dataRow2."<td>$row2[0]</td>";
}
while($row3 = mysqli_fetch_array($result3))
{
    $dataRow3 = $dataRow3."<td>$row3[0]</td>";
}
while($row4 = mysqli_fetch_array($result4))
{
    $dataRow4 = $dataRow4."<td>$row4[0]</td>";
}
while($row5 = mysqli_fetch_array($result5))
{
    $dataRow5 = $dataRow5."<td>$row5[0]</td>";
}
while($row6 = mysqli_fetch_array($result6))
{
    $dataRow6 = $dataRow6."<td>$row6[0]</td>";
}

$rowp1 = mysqli_fetch_array($resultp1);

$dataRowp1 = $rowp1["Promedio"];

$rowp2 = mysqli_fetch_array($resultp2);

$dataRowp2 = $rowp2["Promedio"];

$rowp3 = mysqli_fetch_array($resultp3);

$dataRowp3 = $rowp3["Promedio"];

$rowp4 = mysqli_fetch_array($resultp4);

$dataRowp4 = $rowp4["Promedio"];

$rowp5 = mysqli_fetch_array($resultp5);

$dataRowp5 = $rowp5["Promedio"];

$rowp6 = mysqli_fetch_array($resultp6);

$dataRowp6 = $rowp6["Promedio"];


//echo htmlspecialchars($_SESSION["username"]);
//echo $cate;
//echo htmlspecialchars($_SESSION["idmaestroActual"]);
//echo $_SESSION["category"];
//echo $_SESSION["numeroControl"];
//echo "hola";


mysqli_close($connect);


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITSL - Academia de Inglés</title>
    
    <link rel="stylesheet" href="../bootstrap/3.3.7/css/bootstrap.css">
    
    
    <link rel="icon" href="../imagenes/itsl2.png">
    <style type="text/css">
        body{
            background-image: linear-gradient(to bottom, #0a6d7a 200px, white  20%);
            background-size: cover;
            background-repeat: no-repeat;
            font-size: 16px;
            }
        header{
            background-color: #000000;
               }

        footer{
            background: #000000;
              }

        .baner{
        background: #15859A;
        color: white;
              }

        .foto{
             background: #15859A;

             }
        a:link{
            color: white;
            padding: 16px;
            padding-top: 20px;
              }
        a:visited{
            color: white;

              }
        a:hover {
            color: lightgray;
            text-decoration: none;
              }
        .menu{
            padding: 15px 0 0 0;
            text-align: center;
             }
        .menuImagen{
            text-align: center;
            padding: 3px;
        }
        .lista{
            padding-left: 10px;
            color: white;
            font-size: 13px;
            text-align: left;
              }
        .contenedor{
            position: relative;
            width: 85%;
              }
        .mainfoto{
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
            width: 100%;
            height: auto;
                 }
        .subtitulo{
            position: relative;
            left:15px;
            bottom: 48px;
            padding: 13px 20px 13px 20px;
            width: 96%;
            color: white;
            background: black;
            opacity: .75;
            border-radius: 8px;
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
        .remove-padding{
            padding:  0;
            margin:  0;
        }
        @media (max-width: 980px){
            .subtitulo{
                opacity: 1;
                bottom: 3px;
                left:10px;
            }
            .lista{
                margin-left: 30px;
            }
        }
        div#tabla1 {
            display: none;
        }




    </style>
</head>


<body>

    <header>
        
        
        
            
        
        

         <div class="container-fluid" >
             <div class="row">
		          <div class="col-sm-4 menuImagen" >
                        <img src="../imagenes/itslnobreLargo.png" width="70%" height="auto">
                  </div>
                  <div class="col-sm-4" >
                          <div class="row">
                             <div class="col-sm-4" >

                                    <p class="menu">
                                      <a href="../" >Inicio</a>
                                      </p>

                              </div>
                              <div class="col-sm-4">

                                    <p class="menu">
                                      
                                     </p>

                              </div>
                              <div class="col-sm-4">

                                    <p class="menu">
                                        
                                     </p>

                              </div>
                            </div>
                  </div>

                 <div class="col-sm-4" >

                     <!-- Columna vacia -->

                 </div>
            </div>
        </div>

    </header>


    <div class="container-fluid">
            <div class="row" style="padding-bottom: 10px; padding-top: 20px; background:#0a6d7a">
                <div class="col-sm-4" style="text-align:center; padding-bottom:20px; ">
                    <img src="../imagenes/TecNMwhite.png" width="200px" height="auto" >

                </div>



                <div class="col-sm-6">
                    <div class="lista">
                            <p  style="line-height: 2; font-size: 30px;">
                                <br>Ingresa tus datos

                            </p>
                    </div>

                </div>

            </div>
    </div>

    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p>hola</p>
            </div>
        </div>
    </div>
    
    
    
    
    
    <div class="container" >

        <div class="row" >
            <div class = "col-sm-4" style="<?php echo $display;?>">
                <p style="font-size:28px;">Tabla Calificaciones nivel 1</p>
                <div class="table-responsive">  
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Parcial</th>
                                <?php echo $dataRowpa1;?>

                            </tr>
                        </thead>
                        <tbody>
                            <th>Puntaje</th>
                            <?php echo $dataRow1;?>
                        </tbody>
                    </table>
                  </div>
                <p><strong>Promedio: </strong><?php echo $dataRowp1;?></p> 
            </div>

            <div class = "col-sm-4">
                <p style="font-size:28px;">Tabla Calificaciones nivel 2</p>
                <p>Calificaciones por parcial y promedio</p> 	  
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>P1</th>
                                <th>P2</th>
                                <th>P3</th>
                                <th>P4</th>
                                <th>P5</th>
                                <th>P6</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $dataRow2;?>
                        </tbody>
                    </table>
              </div>
              <p>Promedio: <?php echo $dataRowp2;?></p> 
            </div>

            <div class = "col-sm-4">
                <p style="font-size:28px;">Tabla Calificaciones nivel 3</p>
                <p>Calificaciones por parcial y promedio</p> 	  
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>P1</th>
                                <th>P2</th>
                                <th>P3</th>
                                <th>P4</th>
                                <th>P5</th>
                                <th>P6</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $dataRow3;?>
                        </tbody>
                    </table>
                </div>
                <p>Promedio: <?php echo $dataRowp3;?></p> 
            </div>
        </div>

        <div class="row"  >
            <div class = "col-sm-4">
                <p style="font-size:28px;">Tabla Calificaciones nivel 4</p>
                <p>Calificaciones por parcial y promedio</p> 
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>P1</th>
                                <th>P2</th>
                                <th>P3</th>
                                <th>P4</th>
                                <th>P5</th>
                                <th>P6</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $dataRow4;?>
                        </tbody>
                    </table>
                </div>
                <p>Promedio: <?php echo $dataRowp4;?></p> 
            </div>

            <div class = "col-sm-4">
                <p style="font-size:28px;">Tabla Calificaciones nivel 5</p>
                <p>Calificaciones por parcial y promedio</p> 	  
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>P1</th>
                                <th>P2</th>
                                <th>P3</th>
                                <th>P4</th>
                                <th>P5</th>
                                <th>P6</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $dataRow5;?>
                        </tbody>
                    </table>
                </div>
                <p>Promedio: <?php echo $dataRowp5;?></p> 
            </div>

            <div class = "col-sm-4">
                <p style="font-size:28px;">Tabla Calificaciones nivel 6</p>
                <p>Calificaciones por parcial y promedio</p> 	  
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>P1</th>
                                <th>P2</th>
                                <th>P3</th>
                                <th>P4</th>
                                <th>P5</th>
                                <th>P6</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php echo $dataRow6;?>
                        </tbody>
                    </table>
                </div>
                <p>Promedio: <?php echo $dataRowp6;?></p> 
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row" style="background:#0a6d7a; ">
            <div class="col-md-3 bordes" >
                <p></p>
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
                <p></p>
            </div>
            <div class="col-md-3 ">
                <p></p>
            </div>
        </div>


    </div>


</footer>

</body>
</html>