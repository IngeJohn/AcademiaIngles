<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedinAl"]) || $_SESSION["loggedinAl"] !== true){
   header("location: califiVeri.php");
   exit;
}

// Include config file
require_once "../Require/config.php";


//// php populate html table from mysql database
//date_default_timezone_set('UTC');
//
//    $peri = "";  
//    $per = "";  
//    $mes = date("n"); 
//    $year = date("Y"); 
//
//if ($mes >= 1 && $mes <= 6){
//    $per = 1;
//    $_SESSION["periodo"] = $peri = $per."-".$year;
//}else if($mes >= 8 && $mes <= 12){
//    $per = 2;
//    $_SESSION["periodo"] = $peri = $per."-".$year;
//}


//================================================================================================================









function nivel( $numcon, $idg ){
    
    
    $ni = $gr = $pr = $es = $mo = $ca = $pe = $im = $nombreMa = "";
    $co = "Sin comentarios.";
    $par = $cal = 0;
    
   global $link;
    
    
if ($stmt = $link->prepare("SELECT nivel, grupo, carrera, modalidad, periodo, idmaestro FROM gruposasignados WHERE idgrupo = '{$idg}';")) {
    $stmt->execute();

    /* bind variables to prepared statement */
    $stmt->bind_result($ni,$gr,$ca,$mo,$pe,$im);

    /* fetch values */
    $stmt->fetch();



    /* close statement */
    $stmt->close();
}
    
if ($stmt1 = $link->prepare("SELECT  promedio, estado, comentario FROM niveles WHERE  numeroControl = {$numcon} AND idgrupo = '{$idg}';")) {
    $stmt1->execute();

    /* bind variables to prepared statement */
    $stmt1->bind_result($pr,$es,$co);

    /* fetch values */
    $stmt1->fetch();



    /* close statement */
    $stmt1->close();
}
    
    //========================================================================================
    
    
    if ($stmt2 = $link->prepare("SELECT nombre, paterno, materno FROM docentes WHERE idmaestro = $im;")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($nom,$pat,$mat);

    /* fetch values */
    $stmt2->fetch();

    $nombreMa = $nom." ".$pat." ".$mat;

    /* close statement */
    $stmt2->close();
}
    
    
    
    
    //=========================================================================================
    
    $query3 = "SELECT unidadTema FROM calificaciones WHERE numeroControl = {$numcon} AND idgrupo = '{$idg}';";
    
    $result3 = mysqli_query($link, $query3);

    if (!$result3) {
        $message  = 'Invalid query: ' . mysqli_error() . "\n";
        $message .= 'Whole query: ' . $query3;
        die($message);
    }
    
    $query4 = "SELECT  calificacion FROM calificaciones WHERE numeroControl = {$numcon} AND idgrupo = '{$idg}';";
    
    $result4 = mysqli_query($link, $query4);

    if (!$result4) {
        $message  = 'Invalid query: ' . mysqli_error() . "\n";
        $message .= 'Whole query: ' . $query4;
        die($message);
    }
    
    
    $query5 = "SELECT  comentario FROM calificaciones WHERE numeroControl = {$numcon} AND idgrupo = '{$idg}';";
    
    $result5 = mysqli_query($link, $query5);

    if (!$result5) {
        $message  = 'Invalid query: ' . mysqli_error() . "\n";
        $message .= 'Whole query: ' . $query5;
        die($message);
    }
    
    
    $datarowpa = $color = $datarowca = "";
    $counter = 0;
    $td = "</td>";
    
    while($rowpa = mysqli_fetch_array($result3)){
    
        $datarowpa = $datarowpa."<th>&nbsp;$rowpa[0]</th>";

    }

    while($row3 = mysqli_fetch_array($result4)){
        if ($row3[0] >= 70){
            $color = '<td style="color:#66F60E;font-weight: bold;">';

        }else{
            $color = '<td style="color:red;font-weight: bold;">';

            $counter++;
        }

        $datarowca = $datarowca.$color.$row3[0].$td;
        
        if ($counter > 0 ){
            $color = 'style="color:red;"';
            
        }else{
            $color = 'style="color:#66F60E;"';
            
        }

    }
    
    $np = 1;
    $datarowco = "";
    
    while($rowco = mysqli_fetch_array($result5)){
        
        
        if(isset($rowco[0])){
            
        }else{
            $rowco[0] = "Sin comentario."; 
        }
        $datarowco = $datarowco."Unidad $np : $rowco[0] <br>";
        $np++;
    
        
    }
    
    if($pe !== ""){
        return "<div class='container'style='border: 2px solid lightgray; border-radius: 5px;>
                    <div class='row'>
                        <div class='col-sm-9'>
                        <p style='font-size:20px;'>Nivel $ni &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;periodo: $pe &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;Docente: Lic.  $nombreMa</p>
                        <div class='table-responsive'>  

                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>Unidad</th>
                                            {$datarowpa}

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <th>Puntaje</th>
                                        {$datarowca}
                                    </tbody>
                                </table>
                                <label><b>Comentarios por Unidad: </b></label>
                         </div><div style='border: 2px solid gray; border-radius: 5px;  padding: 20px; '>

                              <p>$datarowco</p>

                         </div><br>
                         <p ><strong>Promedio: &nbsp;</strong><strong {$color}> $pr &nbsp;</strong></p>
                         <p ><strong>Estado Nivel: &nbsp;</strong><strong {$color}> &nbsp;{$es}</strong></p>

                         <p><b>Nivel equivalente: </b>A1</p>
                         <label><b>Comentario promedio final: </b></label>

                         <div style='border: 2px solid gray; border-radius: 5px;  padding: 20px; '>

                              <p>$co</p>

                         </div>
                 </div>
                </div>
            </div>
            <br>
            <hr>";
    }
    

    
}


//===============================================================================================================================



$query = "SELECT idgrupo FROM niveles WHERE numeroControl = {$_SESSION["numeroControl"]}";


// resultNiv
$result = mysqli_query($link, $query);


if (!$result) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}


$dataRow = "";

$grupoInf = "";

while($row1 = mysqli_fetch_array($result)){
    
    $grupoInf = nivel($_SESSION["numeroControl"],$row1[0]);
    
    $dataRow = $dataRow.$grupoInf; 
}


// Close statement
$result->close();



//===================================================================================================================






?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITSL - Consultar calificaciones</title>
    
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
    
    <style type="text/css">
		body{
            background-color: #EAFAF1;
            
            }
        .logo{
            width: 50%;
            height: auto;
            padding-top: 30px;
        }
        header{
            background-color: #000000;
               }

        footer{
            background: #000000;
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
        @media (max-width: 980px){

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
        
            
        <div class="container-fluid">

            <div class="row">
                
                
                <div class="col-lg-8 col-xs-12 col-sm-12 col-md-12">
                    <img class="logo" src="../imagenes/itslnobreLargo.png" >
                </div>
                <div class="col-sm-4" style="text-align:center; padding-top:20px; ">
                    <img src="../imagenes/TecNMwhite.png" width="150px" height="auto" >
                </div>
                
                
                
                
               
                    
                    <div class="col-sm-12" style="text-align: center;">


                        <div class="btn-group" role="group">

                            <a href="../home.php" class="btn btn-outline-light" role="button" >Inicio</a>
                            
                            <a href="calificacionesAl.php" class="btn btn-outline-light active" role="button">Consulta de calificaciones</a>

                            <a href="califiVeri.php" class="btn btn-outline-light" role="button">Consultar otro estudiante</a>

                        </div>    
                    </div>
                
                
                


            </div>
        </div>

    </header>




    
    <div class="container" style="padding:60px 0 50px 0">
        <div class="row">
            <div class="col-sm-8" style="border: 2px solid black; border-radius: 5px;  padding: 20px;">
                <p><b>Información del alumno</b></p>
                <p><b>Alumno:</b> <?php echo $_SESSION["nombre"]." ".$_SESSION["paterno"]." ".$_SESSION["materno"]; ?>
                <p><b>Número de control:</b> <?php echo $_SESSION["numeroControl"]; ?></p>
                <a href="KardexPdf.php" target="_newtab" class="btn btn-primary">Imprimir Kardex</a>
            </div>
        </div>
    </div>
    

    <?php echo $dataRow; ?>

    
    
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





<?php mysqli_close($link);?>


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