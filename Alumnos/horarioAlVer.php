<?php

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedinAl"]) || $_SESSION["loggedinAl"] !== true ){
    header("location: horarioAl.php");
    
}
    

// Include config file
require_once "../Require/config.php";

//================================================================================================================
 
if ($stmt3 = $link->prepare("SELECT  periodo FROM periodoactual")) {
    $stmt3->execute();

    /* bind variables to prepared statement */
    $stmt3->bind_result($periActuBD);

    /* fetch values */
$stmt3->fetch();

    /* close statement */
    $stmt3->close();
}


if ($stmt = $link->prepare("SELECT gruposasignados.nivel, gruposasignados.grupo, gruposasignados.carrera, gruposasignados.modalidad, gruposasignados.idmaestro, gruposasignados.idgrupo FROM niveles, gruposasignados WHERE niveles.numeroControl = '{$_SESSION["numeroControl"]}' AND gruposasignados.idgrupo = niveles.idgrupo AND gruposasignados.periodo = '{$periActuBD}'")) {
    
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($nivel, $grupo, $carrera, $modalidad, $idmaestro, $idgrupo);

    /* fetch values */
    $stmt->fetch();

    /* close statement */
    $stmt->close();
    
    
    if ($stmt1 = $link->prepare("SELECT  nombre, paterno, materno FROM alumnos WHERE numeroControl = '{$_SESSION["numeroControl"]}'")) {
        
        $stmt1->execute();

        /* bind variables to prepared statement */
        $stmt1->bind_result($nombreA, $paternoA, $maternoA);

        /* fetch values */
        $stmt1->fetch();

        /* close statement */
        $stmt1->close();
    }
    
    if ($stmt2 = $link->prepare("SELECT  nombre, paterno, materno FROM docentes WHERE idmaestro = '{$idmaestro}'")) {
        
        $stmt2->execute();

        /* bind variables to prepared statement */
        $stmt2->bind_result($nombreD, $paternoD, $maternoD);

        /* fetch values */
        $stmt2->fetch();

        /* close statement */
        $stmt2->close();
    }
    
    if ($stmt4 = $link->prepare("SELECT lunes, martes, miercoles, jueves, viernes, sabadoC, sabadoT FROM horarios WHERE idgrupo = '{$idgrupo}';")) {
        
        $stmt4->execute();

        /* bind variables to prepared statement */
        $stmt4->bind_result($lunes, $martes, $miercoles, $jueves, $viernes, $sabadoC, $sabadoT);

        /* fetch values */
        $stmt4->fetch();

        /* close statement */
        $stmt4->close();
    }

    
}
if(empty($nivel)){ echo "<script>window.alert('No estas inscrito en el periodo $periActuBD'); window.location = 'horarioAl.php';</script>";}

?>
 
<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <title>Información y Horarios</title>
    
    
    
    
    <link rel="stylesheet" href="../bootstrap/4.5.3/dist/css/bootstrap.min.css" 
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
          crossorigin="anonymous">
    
    <script src="../jquery/3.5.1/jquery-3.5.1.slim.min.js" 
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
            crossorigin="anonymous"></script>
    
    <script src="../bootstrap/4.5.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" 
            crossorigin="anonymous"></script>
    
    <link rel="icon" href="../imagenes/itsl2.png">
    
    <script src="../gijgo/1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="../gijgo/1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="../gijgo/1.9.13/js/messages/messages.es-es.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/ex/css/ex.css" type="text/css" />
    
    <script type="text/javascript" src="../direcciones/localidadesAlta.js"></script>
    
    <style type="text/css">
        body{
            background-color: #FAB92D;
        }
		header {
              background-color: #000000;
              
               }
		.diviciones{
            background: #ffffff;
            padding: 40px 20px 20px 20px;
        }
        .centered{
            text-align:center;
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
        @media (max-width: 992px){
            .logo{
                width: 50%;
                height: auto;

            }
            
            
        }
        /* Para tablets*/
        @media screen and (max-width: 768px) {
            .logo{
                width: 80%;
                height: auto;
                padding: 10px 0 10px 0;
                
            }


        }
        
        /*Para dispositivos moviles*/
        @media screen and (max-width: 400px) {
            
            .logo{
                width: 80%;
                height: auto;
                padding: 10px 0 10px 0;
                
            }
            

            
            
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
                
                
                
                
               
                    
                    <div class="col-sm-12" style="text-align: center; ">


                        <div class="btn-group" role="group">

                            <a href="../home.php" class="btn btn-outline-warning" role="button" >Ir al inicio</a>
                            
                            <a href="horarioAlVer.php" class="btn btn-outline-warning active" role="button">Tu información y Horario</a>

                            <a href="horarioAl.php" class="btn btn-outline-warning" role="button">&nbsp;Consultar otro Alumno&nbsp;</a>

                        </div>    
                    </div>
                
                
                


            </div>
        </div>

        
        
    </header>
       
<br>
    
    
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="border: 2px solid black; border-radius: 5px; padding: 20px;">
                <p><b>Nombre del Alumno: </b><?php echo $nombreA." ".$paternoA." ".$maternoA; ?></p>
                <p><b>Información del nivel: </b><?php echo $nivel.$grupo." | Ingeniería (en) ".$carrera." | ".$modalidad." | ".$periActuBD; ?></p>
                <p><b>Nombre del Maestro: </b><?php echo $nombreD." ".$paternoD." ".$maternoD; ?></p>
            </div>
            <div class="col-sm-12">
                <br>
                <h2>Horario</h2>
                <table class="table table-bordered table-dark" style="text-align:center;" >
                            <tr>
                                <th>Lunes</th>
                                <th>Martes</th>
                                <th>Miercoles</th>
                                <th>Jueves</th>
                                <th>Viernes</th>
                                <th colspan="2">Sabado</th>
                            </tr>
                             <tr>
                                 <td><?php echo $lunes; ?></td>
                                 <td><?php echo $martes; ?></td>
                                 <td><?php echo $miercoles; ?></td>
                                 <td><?php echo $jueves; ?></td>
                                 <td><?php echo $viernes; ?></td>
                                 <td><?php echo $sabadoC." - ".$sabadoT; ?></td>
                            </tr>
                        </table>
            </div>
        </div>
    </div>
    
    
    
<br>
    
        
<br>
        
<br>
        
<br>


    
    
    
    
    
    
    
    
 <div class="container-fluid">
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