<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: alumnos.php");
    exit;
}

// Include config file
require_once "../Require/config.php";


// php populate html table from mysql database



$querypa1 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '1'";
$querypa2 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '2'";
$querypa3 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '3'";
$querypa4 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '4'";
$querypa5 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '5'";
$querypa6 = "SELECT  parcial FROM `calificaciones` WHERE numeroControl = {$_SESSION["numeroControl"]} AND nivel = '6'";


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
$resultpa1 = mysqli_query($link, $querypa1);
$resultpa2 = mysqli_query($link, $querypa2);
$resultpa3 = mysqli_query($link, $querypa3);
$resultpa4 = mysqli_query($link, $querypa4);
$resultpa5 = mysqli_query($link, $querypa5);
$resultpa6 = mysqli_query($link, $querypa6);


if (!$resultpa1) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa1;
    die($message);
}

if (!$resultpa2) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa2;
    die($message);
}

if (!$resultpa3) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa3;
    die($message);
}

if (!$resultpa4) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa4;
    die($message);
}

if (!$resultpa5) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa5;
    die($message);
}

if (!$resultpa6) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $querypa6;
    die($message);
}




$display="";
$displaymensaje="";
// result1 
$result1 = mysqli_query($link, $query1);
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
$result2 = mysqli_query($link, $query2);

if (!$result2) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query2;
    die($message);
}
// result3 
$result3 = mysqli_query($link, $query3);

if (!$result3) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query3;
    die($message);
}
// result4 
$result4 = mysqli_query($link, $query4);

if (!$result4) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query4;
    die($message);
}
// result5 
$result5 = mysqli_query($link, $query5);

if (!$result5) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query5;
    die($message);
}
// result6 
$result6 = mysqli_query($link, $query6);

if (!$result6) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query6;
    die($message);
}
// resultp1
$resultp1 = mysqli_query($link, $queryp1);

if (!$resultp1) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp1;
    die($message);
}
// resultp2 
$resultp2 = mysqli_query($link, $queryp2);

if (!$resultp2) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp2;
    die($message);
}
// resultp3 
$resultp3 = mysqli_query($link, $queryp3);

if (!$resultp3) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp3;
    die($message);
}
// resultp4 
$resultp4 = mysqli_query($link, $queryp4);

if (!$resultp4) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp4;
    die($message);
}
// resultp5
$resultp5 = mysqli_query($link, $queryp5);

if (!$resultp5) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp5;
    die($message);
}
// resultp6 
$resultp6 = mysqli_query($link, $queryp6);

if (!$resultp6) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryp6;
    die($message);
}

$dataRowpa1 = "";
$dataRowpa2 = "";
$dataRowpa3 = "";
$dataRowpa4 = "";
$dataRowpa5 = "";
$dataRowpa6 = "";

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

$color = "";
$td = "</td>";

$counter1 = 0;
$counter2 = 0;
$counter3 = 0;
$counter4 = 0;
$counter5 = 0;
$counter6 = 0;

$color1 = "";
$color2 = "";
$color3 = "";
$color4 = "";
$color5 = "";
$color6 = "";

$est1 = "";
$est2 = "";
$est3 = "";
$est4 = "";
$est5 = "";
$est6 = "";



while($rowpa1 = mysqli_fetch_array($resultpa1))
{
    
    $dataRowpa1 = $dataRowpa1."<th>&nbsp;$rowpa1[0]</th>";
    
}

while($row1 = mysqli_fetch_array($result1))
{
    if ($row1[0] >= 70){
        $color = '<td style="color:#66F60E;font-weight: bold;">';
            
    }else{
        $color = '<td style="color:red;font-weight: bold;">';
            
        $counter1++;
    }
    
    $dataRow1 = $dataRow1.$color.$row1[0].$td;
    if ($counter1 > 0 ){
        $color1 = 'style="color:red;"';
        $est1 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nivel No acreditado";
    }else{
        $color1 = 'style="color:#66F60E;"';
        $est1 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nivel Acreditado";
    }
    
}

while($rowpa2 = mysqli_fetch_array($resultpa2))
{
    
    $dataRowpa2 = $dataRowpa2."<th>&nbsp;$rowpa2[0]</th>";
    
}


while($row2 = mysqli_fetch_array($result2))
{
    if ($row2[0] >= 70){
        $color = '<td style="color:#66F60E;font-weight: bold;">';
            
    }else{
        $color = '<td style="color:red;font-weight: bold;">';
        $counter2++;
            
    }
    
    $dataRow2 = $dataRow2.$color.$row2[0].$td;
    if ($counter2 > 0 ){
        $color2 = 'style="color:red;"';
        $est2 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nivel No acreditado";
    }else{
        $color2 = 'style="color:#66F60E;"';
        $est2 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nivel Acreditado";
    }
    
}

while($rowpa3 = mysqli_fetch_array($resultpa3))
{
    
    $dataRowpa3 = $dataRowpa3."<th>&nbsp;$rowpa3[0]</th>";
    
}


while($row3 = mysqli_fetch_array($result3))
{
    if ($row3[0] >= 70){
        $color = '<td style="color:#66F60E;font-weight: bold;">';
            
    }else{
        $color = '<td style="color:red;font-weight: bold;">';
        $counter3++;
            
    }
    
    $dataRow3 = $dataRow3.$color.$row3[0].$td;
    if ($counter3 > 0 ){
        $color3 = 'style="color:red;"';
        $est3 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nivel No acreditado";
    }else{
        $color3 = 'style="color:#66F60E;"';
        $est3 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nivel Acreditado";
    }
}

while($rowpa4 = mysqli_fetch_array($resultpa4))
{
    
    $dataRowpa4 = $dataRowpa4."<th>&nbsp;$rowpa4[0]</th>";
    
}

while($row4 = mysqli_fetch_array($result4))
{
    if ($row4[0] >= 70){
        $color = '<td style="color:#66F60E;font-weight: bold;">';
            
    }else{
        $color = '<td style="color:red;font-weight: bold;">';
        $counter4++;
            
    }
    
    $dataRow4 = $dataRow4.$color.$row4[0].$td;
    if ($counter4 > 0 ){
        $color4 = 'style="color:red;"';
        $est4 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nivel No acreditado";
    }else{
        $color4 = 'style="color:#66F60E;"';
        $est4 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nivel Acreditado";
    }
}

while($rowpa5 = mysqli_fetch_array($resultpa5))
{
    
    $dataRowpa5 = $dataRowpa5."<th>&nbsp;$rowpa5[0]</th>";
    
}
while($row5 = mysqli_fetch_array($result5))
{
    if ($row5[0] >= 70){
        $color = '<td style="color:#66F60E;font-weight: bold;">';
            
    }else{
        $color = '<td style="color:red;font-weight: bold;">';
        $counter5++;
            
    }
    
    $dataRow5 = $dataRow5.$color.$row5[0].$td;
    if ($counter5 > 0 ){
        $color5 = 'style="color:red;"';
        $est5 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nivel No acreditado";
    }else{
        $color5 = 'style="color:#66F60E;"';
        $est5 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nivel Acreditado";
    }
    
}
while($rowpa6 = mysqli_fetch_array($resultpa6))
{
    
    $dataRowpa6 = $dataRowpa6."<th>&nbsp;$rowpa6[0]</th>";
    
}
while($row6 = mysqli_fetch_array($result6))
{
    if ($row6[0] >= 70){
        $color = '<td style="color:#66F60E;font-weight: bold;">';
            
    }else{
        $color = '<td style="color:red;font-weight: bold;">';
        $counter6++;
            
    }
    
    $dataRow6 = $dataRow6.$color.$row6[0].$td;
    if ($counter6 > 0 ){
        $color6 = 'style="color:red;"';
        $est6 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nivel No acreditado";
    }else{
        $color6 = 'style="color:#66F60E;"';
        $est6 = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nivel Acreditado";
    }
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



mysqli_close($link);


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
            background-image: linear-gradient(to bottom, #0a6d7a 200px, white  10%);
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
        hr {
            border: none;
            height: 1px;
            /* Set the hr color */
            color: darkslategrey; /* old IE */
            background-color: darkgrey; /* Modern Browsers */
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
                                      <a href="../Require/logout.php" >Inicio</a>
                                      </p>

                              </div>
                              <div class="col-sm-4">

                                    <p class="menu">
                                      <a href="../Alumnos/logoutAlcalifi.php">Consultar otro alumno</a>
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
                <div class="col-sm-3" style="text-align:center; padding-bottom:20px; ">
                    <img src="../imagenes/TecNMwhite.png" width="200px" height="auto" >

                </div>



                <div class="col-sm-6">
                    <div class="lista">
                            <p  style="line-height: 2; font-size: 30px;">
                                <br>Calificaciones por parcial y promedio final

                            </p>
                    </div>

                </div>

            </div>
    </div>

    
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                
            </div>
        </div>
    </div>
    
    
    
    
    
    <div class="container-fluid" style="margin: 100px; 0 0 0">

        <div class="row">
            <div class = "col-sm-7" style="<?php echo $display;?>">
                <p style="font-size:20px;">Nivel 1</p>
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
                <p ><strong>Promedio: </strong><strong <?php echo $color1; ?>><?php echo $dataRowp1; echo $est1;?></strong></p> 
                <hr>
            </div>

            <div class = "col-sm-7">
                <p style="font-size:20px;">Nivel 2</p>  
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Parcial</th>
                                <?php echo $dataRowpa2;?>
                            </tr>
                        </thead>
                        <tbody>
                            <th>Puntaje</th>
                            <?php echo $dataRow2;?>
                        </tbody>
                    </table>
              </div>
              <p ><strong>Promedio: </strong><strong <?php echo $color2; ?>><?php echo $dataRowp2; echo $est2;?></strong></p> 
              <hr>
            </div>

            <div class = "col-sm-7">
                <p style="font-size:20px;">Nivel 3</p>  
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Parcial</th>
                                <?php echo $dataRowpa3;?>
                            </tr>
                        </thead>
                        <tbody>
                            <th>Puntaje</th>
                            <?php echo $dataRow3;?>
                        </tbody>
                    </table>
                </div>
                <p ><strong>Promedio: </strong><strong <?php echo $color3; ?>><?php echo $dataRowp3; echo $est3;?></strong></p> 
                <hr>
            </div>
        

        
            <div class = "col-sm-7">
                <p style="font-size:20px;">Nivel 4</p>
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Parcial</th>
                                <?php echo $dataRowpa4;?>
                            </tr>
                        </thead>
                        <tbody>
                            <th>Puntaje</th>
                            <?php echo $dataRow4;?>
                        </tbody>
                    </table>
                </div>
                <p ><strong>Promedio: </strong><strong <?php echo $color4; ?>><?php echo $dataRowp4; echo $est4;?></strong></p> 
                <hr>
            </div>

            <div class = "col-sm-7">
                <p style="font-size:20px;">Nivel 5</p> 	  
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Parcial</th>
                                <?php echo $dataRowpa5;?>
                            </tr>
                        </thead>
                        <tbody>
                            <th>Puntaje</th>
                            <?php echo $dataRow5;?>
                        </tbody>
                    </table>
                </div>
                <p ><strong>Promedio: </strong><strong <?php echo $color5; ?>><?php echo $dataRowp5; echo $est5;?></strong></p> 
                <hr>
            </div>

            <div class = "col-sm-7">
                <p style="font-size:20px;">Nivel 6</p> 	  
                <div class="table-responsive">          
                    <table class="table" >
                        <thead>
                            <tr>
                                <th>Parcial</th>
                                <?php echo $dataRowpa6;?>
                            </tr>
                        </thead>
                        <tbody>
                            <th>Puntaje</th>
                            <?php echo $dataRow6;?>
                        </tbody>
                    </table>
                </div>
                <p ><strong>Promedio: </strong><strong <?php echo $color6; ?>><?php echo $dataRowp6; echo $est6;?></strong></p> 
                <hr>
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