<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: IniciarSesionDo.php");
    exit;
}

// php populate html table from mysql database



// Include config file
require_once "../Require/config.php";

$queryCali = "SELECT "


$queryN = "SELECT gruposasignados.nivel, gruposasignados.grupo, gruposasignados.carrera, gruposasignados.modalidad, periodoactual.periodo FROM academia_ingles.gruposasignados, academia_ingles.periodoactual WHERE gruposasignados.periodo = periodoactual.periodo AND periodoactual.idperiodoactual = '1' AND gruposasignados.idmaestro = {$_SESSION["idmaestro"]};";

$resultN = mysqli_query($link,$queryN);


if (!$resultN) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryN;
    die($message);
}

$dataRowN = "";

while($rowN = mysqli_fetch_array($resultN))
{  
    $dataRowN = $dataRowN."<option value='".$rowN[0].", ".$rowN[1].", ".$rowN[2].", ".$rowN[3]."'>".$rowN[0].$rowN[1]." " .$rowN[2]." " .$rowN[3]."</option>" ;
}



$queryR = "SELECT gruposasignados.nivel, gruposasignados.grupo, gruposasignados.carrera, gruposasignados.modalidad, periodoactual.periodo FROM academia_ingles.gruposasignados, academia_ingles.periodoactual WHERE gruposasignados.periodo = periodoactual.periodo AND periodoactual.idperiodoactual = '1' AND gruposasignados.idmaestro = {$_SESSION["idmaestro"]};";

//$query = "SELECT  nivel, grupo, carrera, modalidad FROM `gruposasignados` WHERE idmaestro = {$_SESSION["idmaestro"]}";

$resultR = mysqli_query($link, $queryR);

if (!$resultR) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryR;
    die($message);
}

$dataRowR = "";

while($rowR = mysqli_fetch_array($resultR))
{
    
    $dataRowR = $dataRowR."<tr><td>&nbsp;$rowR[0]</td>"."<td>&nbsp;$rowR[1]</td>"."<td>&nbsp;$rowR[2]</td>"."<td>&nbsp;$rowR[3]</td></tr>";
    
}


$queryR2 = "SELECT  periodo FROM periodoactual WHERE  idperiodoactual ='1'";

$resultR2 = mysqli_query($link, $queryR2);

if (!$resultR2) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $queryR2;
    die($message);
}

$dataRowR2 = "";

$rowR2 = mysqli_fetch_array($resultR2);

$dataRowR2 = $rowR2["periodo"];










$query1 = "SELECT alumnos.nombre, alumnos.paterno, alumnos.materno, alumnos.nivelActual, alumnos.grupoActual, gruposasignados.idmaestro 
	FROM alumnos, gruposasignados 
	WHERE alumnos.grupoActual = gruposasignados.grupo
    AND alumnos.nivelActual = gruposasignados.nivel
    AND alumnos.periodoActual = gruposasignados.periodo 
    AND gruposasignados.idmaestro = {$_SESSION["idmaestro"]} ORDER BY alumnos.nombre";
$query2 = "SELECT alumnos.nombre, alumnos.paterno, alumnos.materno, alumnos.nivelActual, alumnos.grupoActual, gruposasignados.idmaestro 
	FROM alumnos, gruposasignados 
	WHERE alumnos.grupoActual = gruposasignados.grupo
    AND alumnos.nivelActual = gruposasignados.nivel
    AND alumnos.periodoActual = gruposasignados.periodo 
    AND gruposasignados.idmaestro = {$_SESSION["idmaestro"]}";

$query3 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["idmaestro"]} AND nivel = '3'";
$query4 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["idmaestro"]} AND nivel = '4'";
$query5 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["idmaestro"]} AND nivel = '5'";
$query6 = "SELECT  calificacion FROM `calificaciones` WHERE numeroControl = {$_SESSION["idmaestro"]} AND nivel = '6'";





$display="";

// result1 
$result1 = mysqli_query($link, $query1);
if ($result1->num_rows === 0){
    $display="visibility: hidden;";
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

$dataRow1 = "";
$dataRow2 = "";
$dataRow3 = "";
$dataRow4 = "";
$dataRow5 = "";
$dataRow6 = "";

$i = 1;



while($row1 = mysqli_fetch_array($result1))
{  
    $dataRow1 = $dataRow1."<tr><td>".$i."&nbsp;&nbsp;&nbsp; ".$row1[0]." ".$row1[1]." ".$row1[2]."</td></tr>";
    $i++;
}




while($row2 = mysqli_fetch_array($result2))
{

    $dataRow2 = "<tr><td>".$i."&nbsp;&nbsp;&nbsp; ".$row1[0]." ".$row1[1]." ".$row1[2]."</td></tr>";

}



while($row3 = mysqli_fetch_array($result3))
{

    
    $dataRow3 = "<tr><td>".$i."&nbsp;&nbsp;&nbsp; ".$row1[0]." ".$row1[1]." ".$row1[2]."</td></tr>";

}


while($row4 = mysqli_fetch_array($result4))
{
    
    $dataRow4 = "<tr><td>".$i."&nbsp;&nbsp;&nbsp; ".$row1[0]." ".$row1[1]." ".$row1[2]."</td></tr>";

}


while($row5 = mysqli_fetch_array($result5))
{

    
    $dataRow5 = "<tr><td>".$i."&nbsp;&nbsp;&nbsp; ".$row1[0]." ".$row1[1]." ".$row1[2]."</td></tr>";

    
}

while($row6 = mysqli_fetch_array($result6))
{

    
    $dataRow6 = "<tr><td>".$i."&nbsp;&nbsp;&nbsp; ".$row1[0]." ".$row1[1]." ".$row1[2]."</td></tr>";
    
}



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
            background-image: linear-gradient(to bottom, #0a6d7a 20px, white  1%);
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
                                      <a href="../home.php" >Inicio</a>
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
                <div class="col-sm-3" style="text-align:center; padding-bottom:20px; ">
                    <img src="../imagenes/TecNMwhite.png" width="200px" height="auto" >

                </div>



                <div class="col-sm-9">
                    <div class="lista">
                            <p  style=" font-size: 30px;">
                                <br>Captura de calificaciones.

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
    
    
       <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <br>
                          <p style="font-size: 18px;"><b>Informacion de referencia:</b></p>
                              <p style="font-size: 16px;"><b>Niveles y grupos asignados al profesor <?php echo $_SESSION["nombre"]." ".$_SESSION["paterno"]." ".$_SESSION["materno"];?> del periodo <?php echo $dataRowR2;?></b></p>
                              
                          
                              <div class="table-responsive">  
                    
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nivel</th>
                                            <th>Grupo</th>
                                            <th>Carrera</th>
                                            <th>Modalidad</th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $dataRowR;?>
                                    </tbody>
                                </table>
                              </div>

                         
                          
                      </div>
            <div class="col-sm-8">
                <div class="form-group">
                    
                    
                    
                    <hr>
                    
                    <p style="font-size: 18px;"><b>Selecciona un grupo para calificar:</b></p>
                    
                    
                    

						
                        <label>&nbsp;&nbsp;Grupo </label>

						<select class="form-control" name= "grupo" >
							<?php echo $dataRowN; ?>
						</select> 
                    
                    
                    
                    <br><br>
                    <button type="button" class="btn btn-primary">Ver Grupo</button>
					</div>
                
            </div>
        </div>
        
    </div>
    
    
    <div class="container-fluid" style="margin: 100px; 0 0 0">

        <div class="row">
            <div class = "col-sm-8" style="<?php echo $display;?>">
                <p style="font-size:18px;">Modalidad: Escolarizado <br>Carrera: Sistemas Computacionales</p>
                <hr>
                <p style="font-size:18px;">Nivel 1 <br>Grupo A </p>
                <div class="table-responsive">  
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th># &nbsp;&nbsp;&nbsp;Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php echo $dataRow1;?>
                        </tbody>
                    </table>
                  </div>
                
                <hr>
            </div>
            
            
            <div class = "col-sm-8" style="<?php echo $display;?>">
                <p style="font-size:18px;">Nivel 1 <br>Grupo B </p>
                <div class="table-responsive">  
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th># &nbsp;&nbsp;&nbsp;Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php echo $dataRow1;?>
                        </tbody>
                    </table>
                  </div>
                
                <hr>
            </div>
            
            <div class = "col-sm-8" style="<?php echo $display;?>">
                <p style="font-size:18px;">Nivel 1 <br>Grupo C </p>
                <div class="table-responsive">  
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th># &nbsp;&nbsp;&nbsp;Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php echo $dataRow1;?>
                        </tbody>
                    </table>
                  </div>
                
                <hr>
            </div>
            
            <div class = "col-sm-8" style="<?php echo $display;?>">
                <p style="font-size:18px;">Nivel 1 <br>Grupo D </p>
                <div class="table-responsive">  
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th># &nbsp;&nbsp;&nbsp;Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php echo $dataRow1;?>
                        </tbody>
                    </table>
                  </div>
                
                <hr>
            </div>
            
            <div class = "col-sm-8" style="<?php echo $display;?>">
                <p style="font-size:18px;">Nivel 1 <br>Grupo E </p>
                <div class="table-responsive">  
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th># &nbsp;&nbsp;&nbsp;Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <?php echo $dataRow1;?>
                        </tbody>
                    </table>
                  </div>
                
                <hr>
            </div>
            
            
            
            
            <select name="campaignChange">

        
                <?php echo $dataRowG; ?>

            </select>
            
          


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