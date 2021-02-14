<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedinAd"]) || $_SESSION["loggedinAd"] !== true ){
    header("location: logoutAd.php");
    
}


// Check if the user is logged in, if not then redirect to login page
if($_SESSION["roll"] !== 1){
    header("location: logoutAd.php");
}
 
// Include config file
require_once "../Require/config.php";

date_default_timezone_set('America/Mexico_City');

    $peri = "";  
    $per = "";  
    $mes = date("n"); 
    $year = date("Y"); 

if ($mes >= 1 && $mes <= 6){
    $per = 1;
    $peri = "Periodo: ".$per."-".$year;
}else if($mes >= 8 && $mes <= 12){
    $per = 2;
    $peri = "Periodo: ".$per."-".$year;
    
}


$periodoActu = $per."-".$year;




//================================================================================================================================================


if ($stmt3 = $link->prepare("SELECT  periodo FROM periodoactual")) {
    $stmt3->execute();

    /* bind variables to prepared statement */
    $stmt3->bind_result($periActuBD);

    /* fetch values */
    $stmt3->fetch();

    /* close statement */
    $stmt3->close();
}



//=====================================================================================================================

$numeroControl = $_POST['varname'];



function NombreAlumno($numeroC){
    
    global $link;
    
    $nombre = $paterno = $materno = "";
    
    if ($stmtm = $link->prepare("SELECT nombre, paterno, materno FROM alumnos WHERE numeroControl = '{$numeroC}'")) {
        
        $stmtm->execute();

        /* bind variables to prepared statement */
        $stmtm->bind_result($nombre, $paterno, $materno);

        /* fetch values */
        $stmtm->fetch();

        /* close statement */
        //$stmtm->close();
        
        return strtoupper($nombre." ".$paterno." ".$materno);
    }

}






function niveles($numCon){
    
    
    global $link;
    
    $dataRow = "";
    
    
    
    $sql = "SELECT  niveles.promedio, niveles.promedio2, niveles.comentario, niveles.estado, 
                    gruposasignados.nivel, gruposasignados.grupo, gruposasignados.carrera, gruposasignados.modalidad,
                    gruposasignados.periodo 
                    FROM niveles, gruposasignados WHERE niveles.idgrupo = gruposasignados.idgrupo AND numeroControl = '".$numCon."';";
       
    $result = mysqli_query($link, $sql);

        if (!$result) {
            $message  = 'Invalid query: ' . mysqli_error() . "\n";
            $message .= 'Whole query: ' . $sql;
            die($message);

        }
        while($row = mysqli_fetch_array($result)){
            
            if(isset($row[0])){
                
                
                
                $dataRow = $dataRow."<table class='table'>
                                            <tr>
                                                <th>Asidgnatura</th>
                                                <th>Calificación 1aOp</th>
                                                <th>Calificación 2aOp</th>
                                                <th>Acreditación</th>
                                                <th colspan='1'>Comentarios</th>
                                                <th>Periodo</th>
                                            </tr>
                                            <tr>
                                                <td>Inglés $row[4]</td>
                                                <td>$row[0]</td>
                                                <td>$row[1]</td>
                                                <td>$row[3]</td>
                                                <td colspan='1'>$row[2]</td>
                                                <td>$row[8]</td>
                                            </tr>
                                            
                                            
                                        </table> " ;
                
                       
                
                
            }

        }
    
    
    return $dataRow;
}



?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KARDEX</title>
    
    <link rel="stylesheet" href="../bootstrap/4.5.3/dist/css/bootstrap.min.css" 
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
          crossorigin="anonymous">
    
        <script src="../jquery/3.5.1/jquery-3.5.1.slim.min.js" 
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
            crossorigin="anonymous"></script>
    
        <script src="../bootstrap/4.5.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" 
            crossorigin="anonymous"></script>
    
    
    <link rel="stylesheet" href="../pure/0.5.0/pure-min.css">


    
    
    
            
    
    <link rel="icon" href="../imagenes/itsl2.png">
    
    
    
    
    
    
    
    <style type="text/css">
        body{
            font-size: 14px;
        }

        
        .page-header, .page-header-space {
          height: 110px;
        }

        .page-footer, .page-footer-space {
          height: 180px;

        }

        .page-footer {
          position: fixed;
          bottom: 0;
          width: 100%;
        }

        .page-header {
          position: fixed;
          top: 0mm;
          width: 100%;
        }

        .page {
          page-break-after: always;
        }

        @page {
          margin: 20mm
        }
        @media screen {
            div.divFooter {
                display: none;
            }
            div.divHeader {
                display: none;
            }
        }

        @media print {
           thead {display: table-header-group;} 
           tfoot {display: table-footer-group;}

           button {display: none;}

           body {margin: 0;}
        }
        
        .centrado{
            text-align:center;
            padding: 1px !important; 
            margin: 1px !important;
        }
        
        .inte{
            padding: 2px !important; 
            margin: 2px !important;
        }



        
    </style>
</head>
<body>
    <header class="page-header divFooter">
          <div class="container-fluid">

            <div class="row">
                
                
                <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 divHeader">
                    <img src="../imagenes/enca.PNG" width="auto" height="103px">
                </div>
              
                
                
                


            </div>
        </div>
    </header>

    
    <footer class="page-footer divFooter">
         <div class="container">
             <div class="row">
                <div class="col-sm-12 divFooter">
                    <img class="logo" src="../imagenes/footer.PNG" height="210px" >
                 </div>
             </div>


        </div>


    </footer>
    
    
    
    
    
    <table class="container">

    <thead>
      <tr>
        <td>
          <!--place holder for the fixed-position header-->
          <div class="page-header-space"></div>
        </td>
      </tr>
    </thead>
        
        
           <tbody>
      <tr>
        <td> 
             <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" onClick="window.print()" style="background: pink">¡PULSA PARA IMPRIMIR!</button>
                        <button type="button" onClick="window.close()" style="background: lightblue">¡PULSA PARA CERRAR!</button>
                        <h3 class="centrado">Instituto Tecnológico Superior de Loreto</h3>
                        <h3 class="centrado">Academia de Inglés</h3>
                        
                        
                        <p><b>KARDEX</b></p>
                        <table class='table table-sm'  style='width:10%; border: 1px solid gray; text-align:center;'>
                            <tr>
                                <th>
                                    <?php echo $numeroControl; ?>
                                </th>
                            </tr>
                        </table>
                        
                        <p><?php echo nombreAlumno($numeroControl); ?></p>
                        
                        <?php  echo niveles($numeroControl);  ?>
                        
                    </div>
                    
                 </div>
            </div>
    
            <!--end of content-->
        </td>
      </tr>
    </tbody>
            
            
            

    <tfoot>
      <tr>
        <td>
          <!--place holder for the fixed-position footer-->
          <div class="page-footer-space"></div>
        </td>
      </tr>
    </tfoot>

  </table>





	

</body>
</html>