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
        //$stmtm->close();
        
        echo $nombre." ".$paterno." ".$materno;
    }

}

//================================================================================================================================================
function nombreMaestro($idg){
    
    global $link;
    
    $titulo = $nombre = $paterno = $materno = $idmaestro = "";
    
    if ($stmtg = $link->prepare("SELECT idmaestro FROM gruposasignados WHERE idgrupo = '{$idg}'")) {
        
        $stmtg->execute();

        /* bind variables to prepared statement */
        $stmtg->bind_result($idmaestro);

        /* fetch values */
        $stmtg->fetch();

        /* close statement */
        $stmtg->close();
        

        
            if ($stmtu = $link->prepare("SELECT titulo, nombre, paterno, materno FROM docentes WHERE idmaestro = '{$idmaestro}'")) {
        
                $stmtu->execute();

                /* bind variables to prepared statement */
                $stmtu->bind_result($titulo , $nombre , $paterno , $materno);

                /* fetch values */
                $stmtu->fetch();

                /* close statement */
                $stmtu->close();

                echo $titulo." ".$nombre." ".$paterno." ".$materno;
            }
        

    }
    

}

//====================================================================================================



function grupoID($idg){
    
    global $link;
    
    $nivel = $grupo = $carrera = $modalidad = "";
    
    if ($stmtg = $link->prepare("SELECT nivel, grupo, carrera, modalidad FROM gruposasignados WHERE idgrupo = '{$idg}'")) {
        
        $stmtg->execute();

        /* bind variables to prepared statement */
        $stmtg->bind_result($nivel, $grupo, $carrera, $modalidad);

        /* fetch values */
        $stmtg->fetch();

        /* close statement */
        //$stmtm->close();
        
        return $nivel." | ".$grupo." | ".$carrera." | ".$modalidad;
    }

}

//====================================================================================================

require_once 'ParciFecha.entidad.php';
require_once 'ParciFecha.model.php';

// Logica
$alm = new ParciFecha();
$model = new ParciFechaModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
            
            $alm->__SET('idparcialFechas',    $_REQUEST['idparcialFechas']);
            $alm->__SET('numeroParcial',      $_REQUEST['numeroParcial']);
            $alm->__SET('fechaInicio',        $_REQUEST['fechaInicio']);
            $alm->__SET('fechaTermino',       $_REQUEST['fechaTermino']);
			

			$model->Actualizar($alm);
            
			header('Location: AdminParcialesFechas.php');
			break;
            

            

		case 'editar':

			$alm = $model->Obtener($_REQUEST['idparcialFechas']);
			break;
	}
}



?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrar / Actualizar Horarios</title>
    
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
                            
                            <a href="AdminParcialesFechas.php" class="btn btn-outline-light active" role="button" >Definir Parciales Fechas</a>
                            
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
           
        <div class="col-sm-8" style="font-size:16px;">
   
              <div> 
                <form action="?action=actualizar" method="post" onsubmit="return confirm('Presiona OK para continuar.');">
                    
                    
                    
                    <input type="hidden" name="idparcialFechas" value="<?php echo $alm->__GET('idparcialFechas'); ?>" />
                    <input type="hidden" name="numeroParcial" value="<?php echo $alm->__GET('numeroParcial'); ?>" />

                    
                    <table class="table table-bordered table-dark table-sm"  >
                        <tr>
                            <th>Parcial #</th>
                            <th>Frecha de Inicio</th>
                            <th>Fecha Termino</th>
                        </tr>
                         <tr>
                            <td >  
                                <?php echo $alm->__GET('numeroParcial'); ?>
                            </td>
                            <td >
                                <input id="datepicker" width="276" name="fechaInicio" class="form-control">
                                    <script>
                                        $('#datepicker').datepicker({
                                            uiLibrary: 'bootstrap4',
                                            locale: 'es-es',
                                            format: 'yyyy/mm/dd'
                                        });
                                        $('#datepicker').val('<?php echo $alm->__GET('fechaInicio'); ?>');
                                    </script>
                                
                            </td>
                            <td >  
                                <input id="datepicker2" width="276" name="fechaTermino" class="form-control">
                                    <script>
                                        $('#datepicker2').datepicker({
                                            uiLibrary: 'bootstrap4',
                                            locale: 'es-es',
                                            format: 'yyyy/mm/dd'
                                        });
                                        $('#datepicker2').val('<?php echo $alm->__GET('fechaTermino'); ?>');
                                    </script>
                               
                            </td>
                            
                        </tr>
               
                         <tr>
                            
                            <td colspan="3" style="text-align:right;">Fumciones: 
                                <a href="AdminParcialesFechas.php" class="btn btn-danger">Limpiar campos</a>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </td>
                        </tr>
                    </table>
                </form>
				</div>
            
            
                        </div>
           
        <div class="col-sm-8"style="font-size:16px;">
            
            <div>
                <input type="text" id="myInput" class="form-control" placeholder="Filtro Horarios...">
            </div>
				
				
             <div class=" ex3">  
			 
                <table class="table table-bordered table-dark table-sm"  id="myTable" >
				
                    <thead style="text-align:center; font-size:14px;">
					
                        <tr>
                            <th>Parcial #</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha Termino</th>
                            <th>Función</th>
                            


                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                    <tbody id="tab-id" style="text-align:center;">
                        <tr>
                            <td><?php echo $r->__GET('numeroParcial'); ?></td>
                            <td><?php echo $r->__GET('fechaInicio'); ?></td>
                            <td><?php echo $r->__GET('fechaTermino'); ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" href="?action=editar&idparcialFechas=<?php echo $r->idparcialFechas; ?>">Editar</a>
                            </td>
                        </tr>
                    </tbody>
                        
                    <?php endforeach; ?>
                </table>     
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