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


//=================================================================================================================================================================================
date_default_timezone_set('America/Mexico_City');

   // $peri = "";  
    $per = "";  
    $mes = date("n"); 
    $year = date("Y"); 

if ($mes >= 1 && $mes <= 6){
    $per = 1;
    //$peri = "Periodo: ".$per."-".$year;
}else if($mes >= 8 && $mes <= 12){
    $per = 2;
    //$peri = "Periodo: ".$per."-".$year;
    
}


$periodoActu = $per."-".$year;


if ($stmt3 = $link->prepare("SELECT  periodo FROM periodoactual")) {
    $stmt3->execute();

    /* bind variables to prepared statement */
    $stmt3->bind_result($periActuBD);

    /* fetch values */
$stmt3->fetch();

    /* close statement */
    $stmt3->close();
}



if( $periActuBD !== $periodoActu ){
    
    $sql2 = "UPDATE periodoactual SET periodo ='$periodoActu', periodoAnterior ='$periActuBD';";
    
    if($stmt4 = mysqli_prepare($link, $sql2)){
        $stmt4->execute();
    }
    //echo("<p><script>alert('¡Periodo actualizado!');</script></p>");
}

//=========================================================================================================

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
        $stmtm->close();
        
        echo $nombre." ".$paterno." ".$materno;
    }

}

//================================================================================================================================================
function maestroID($id){
    
    global $link;
    
    $nombre = $paterno = $materno = "";
    
    if ($stmtm = $link->prepare("SELECT nombre, paterno, materno FROM docentes WHERE idmaestro = '{$id}'")) {
        
        $stmtm->execute();

        /* bind variables to prepared statement */
        $stmtm->bind_result($nombre, $paterno, $materno);

        /* fetch values */
        $stmtm->fetch();

        /* close statement */
        $stmtm->close();
        
        echo $nombre." ".$paterno." ".$materno;
    }

}


//======================================================================================================================================================================

function horarios($id){
    
    global $link, $periActuBD;
    
    $nombre = $paterno = $materno = "";
    
    if ($stmt = $link->prepare("SELECT nombre, paterno, materno FROM docentes WHERE idmaestro = '{$id}'")) {
        
        $stmt->execute();

        /* bind variables to prepared statement */
        $stmt->bind_result($nombre, $paterno, $materno);

        /* fetch values */
        $stmt->fetch();

        /* close statement */
        $stmt->close();
        
        $nombreDocente = $nombre." ".$paterno." ".$materno;
    }
    
    
    
    
    
    
    
    
    
    
    
$query = "SELECT gruposasignados.nivel, gruposasignados.grupo, gruposasignados.carrera, gruposasignados.modalidad, horarios.lunes, horarios.martes, horarios.miercoles, horarios.jueves, horarios.viernes, horarios.sabadoC, horarios.sabadoT FROM horarios, gruposasignados WHERE gruposasignados.idmaestro = '{$id}' AND gruposasignados.periodo = '{$periActuBD}' AND horarios.idgrupo = gruposasignados.idgrupo";

$result = mysqli_query($link, $query);

if (!$result) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

$dataRow = "<table style='text-align:center;' class='table table-striped table-bordered table-dark'  id='myTable' >
              <tr>
                <th style='font-size:22px;' colspan='7'>$nombreDocente</th>
              </tr>";



while($row = mysqli_fetch_array($result))
{
    
    $dataRow = $dataRow." <tr>
                            <th colspan='7'>Grupo: ".$row[0].$row[1]." ".$row[2]." ".$row[3]." </th>
                          </tr>
                          <tr>
                            <th>Lunes</th>
                            <th>Martes</th>
                            <th>Miercoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                            <th colspan='2'>Sabado</th>
                          </tr>
                          <tr>
                            <td>{$row[4]}</td>
                            <td>{$row[5]}</td>
                            <td>{$row[6]}</td>
                            <td>{$row[7]}</td>
                            <td>{$row[8]}</td>
                            <td>{$row[9]}</td>
                            <td>{$row[10]}</td>
                          </tr>";
}
    
    $dataRow = $dataRow."</table><br><br>";
    
echo $dataRow;
    
}


//======================================================================================================================================================================


require_once 'Horario.entidad.php';
require_once 'Horario.model.php';

// Logica
$alm = new Horario();
$model = new HorarioModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
            $alm->__SET('id',           $_REQUEST['id']);
            $alm->__SET('idgrupo',        $_REQUEST['idgrupo']);
            $alm->__SET('lunes',        $_REQUEST['lunes']);
            $alm->__SET('martes',       $_REQUEST['martes']);
            $alm->__SET('miercoles',    $_REQUEST['miercoles']);
            $alm->__SET('jueves',       $_REQUEST['jueves']);
            $alm->__SET('viernes',      $_REQUEST['viernes']);
            $alm->__SET('sabadoC',       $_REQUEST['sabadoC']);
            $alm->__SET('sabadoT',       $_REQUEST['sabadoT']);
			

			$model->Actualizar($alm);
            $_SESSION["alerta"]="";
			header('Location: adminHorarios.php');
			break;
            
        case 'registrar':
            $alm->__SET('id',           $_REQUEST['id']);
            $alm->__SET('idgrupo',        $_REQUEST['idgrupo']);
            $alm->__SET('lunes',        $_REQUEST['lunes']);
            $alm->__SET('martes',       $_REQUEST['martes']);
            $alm->__SET('miercoles',    $_REQUEST['miercoles']);
            $alm->__SET('jueves',       $_REQUEST['jueves']);
            $alm->__SET('viernes',      $_REQUEST['viernes']);
            $alm->__SET('sabadoC',       $_REQUEST['sabadoC']);
            $alm->__SET('sabadoT',       $_REQUEST['sabadoT']);
			
            
			$model->Registrar($alm);
			header('Location: adminHorarios.php');
			break;
            

		case 'editar':
            $_SESSION["alerta"]="";
			$alm = $model->Obtener($_REQUEST['id']);
			break;
	}
}



?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Horarios</title>
    
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
    
    
    <style type="text/css">
        body  { 
			  
			  background-color: ghostwhite;
			  }
		header {
              background-color: #21476F;

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
        @media (max-width: 1100px){

            
        }
        
        
        /*para pantallas de PC*/
        @media (max-width: 992px){
 
        }
        /* Para tablets*/
        @media screen and (max-width: 768px) {
            
        }
        /* Para tablets*/
        @media screen and (max-width: 616px) {

            
        }
        
        /*Para dispositivos moviles*/
        @media screen and (max-width: 400px) {
            
            
        }
        div.ex3 {
          background-color: black;
          width: 100%;
          height:400px;
          overflow: auto;
        }
        
        
        
        
        div.x {
          
          width: 1000px;
          height: 100px;
          color: white;
          position: relative;
          animation: example 16s infinite;


        }
        div.y {
            margin-top: 15px;
           padding-top: 10px;
           background-color: blue;
                  width: 400px;
                  height:40px;
                  overflow: hidden;
        }

        @keyframes example {
          from {left: 500px;}
          to {left: -300px;}
        }


        
    </style>
    

    

    
</head>
<body>
    <header>
          <div class="container-fluid">

            <div class="row">
                
                

                         
                    <div class="col-sm-12" style="text-align: center;">


                        <div class="btn-group" role="group">
                            
                            <a href="AdminHorarios.php" class="btn btn-outline-light" role="button" >Registrar / Actualizar Horarios</a>
                            
                            <a href="VerHorarios.php" class="btn btn-outline-light active" role="button" >Ver Horarios</a>
                            
                            <a href="Administrador.php" class="btn btn-outline-light" role="button">Regresar</a>
                            
                            <a href="logoutAd.php" class="btn btn-outline-light" role="button">Cerrar Sesión</a>
                            
                            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target=".bd-example-modal-lg"> ? </button>

                        </div>    
                    </div>
                
                
                


            </div>
        </div>
</header>
    
    
    
    <!-- Large modal -->
        

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Instrucciones</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" style="padding:35px;">
                  
                <p>Para registra un nuevo horario:<br>
                  Elige un Docente y selecciona el nivel, grupo, carrera y modalidad<br>
                  No es necesario introducir el periodo, este se registrará automaticamente.<br>
                  Por último, elegir los horarios predefinidos para cada día y presionar el botón de guardar cambios. </p>

                      
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
    
    
    

    <div class="container">
        <div class="row"> 
            <div class="col-sm-7" style="padding-top:20px; font-size:16px;">
                
                <?php foreach($model->Listar2() as $r): ?> 
                
                <p><b>Bienvenido: </b><?php echo "Lic. ".$r->__GET('nombre'); echo " ".$r->__GET('paterno'); echo " ".$r->__GET('materno'); ?> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre de usuario: </b><?php echo $_SESSION['username'];?></p>
                
                <?php endforeach; ?>
                <hr>
                 
            </div>
            <div class="col-sm-5 y"  ><div class="x">Instituto Tecnológico Superior de Loreto</div> <hr></div>
           
           
        <div class="col-sm-12"style="font-size:16px;">
            

				<h2>Horarios - Periodo <?php echo $_SESSION["periodoBD"]; ?></h2>
				
             <div >  
			 
              
                        
            
                    <?php foreach($model->Listar3() as $r): ?>
              
                        <?php echo horarios($r->__GET('idmaestro')); ?>
                
                        
                    <?php endforeach; ?>
                  
              </div>
           
        </div>
        </div>
    </div>
    
    
    
    
    
    
    
<?php mysqli_close($link);?>
    
    
    
    
    
    

    
    <hr>
    
    <div class="container-fluid" style="padding-top:300px;">
        <hr>
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
    
    <script>

    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tab-id tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
        
        </script>
    
    
</body>
</html>