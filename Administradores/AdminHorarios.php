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
            $alm->__SET('idgrupo',      $_REQUEST['idgrupo']);
            $alm->__SET('lunes',        $_REQUEST['lunes']);
            $alm->__SET('martes',       $_REQUEST['martes']);
            $alm->__SET('miercoles',    $_REQUEST['miercoles']);
            $alm->__SET('jueves',       $_REQUEST['jueves']);
            $alm->__SET('viernes',      $_REQUEST['viernes']);
            $alm->__SET('sabadoC',      $_REQUEST['sabadoC']);
            $alm->__SET('sabadoT',      $_REQUEST['sabadoT']);
			

			$model->Actualizar($alm);
            
			header('Location: adminHorarios.php');
			break;
            
        case 'registrar':
            
            $alm->__SET('idgrupo',      $_REQUEST['idgrupo']);
            $alm->__SET('lunes',        $_REQUEST['lunes']);
            $alm->__SET('martes',       $_REQUEST['martes']);
            $alm->__SET('miercoles',    $_REQUEST['miercoles']);
            $alm->__SET('jueves',       $_REQUEST['jueves']);
            $alm->__SET('viernes',      $_REQUEST['viernes']);
            $alm->__SET('sabadoC',      $_REQUEST['sabadoC']);
            $alm->__SET('sabadoT',      $_REQUEST['sabadoT']);
			
            
			$model->Registrar($alm);
			header('Location: adminHorarios.php');
			break;
            

		case 'editar':

			$alm = $model->Obtener($_REQUEST['id']);
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
                            
                            <a href="AdminHorarios.php" class="btn btn-outline-light active" role="button" >Registrar / Actualizar Horarios</a>
                            
                            <a href="VerHorarios.php" class="btn btn-outline-light" role="button" >Ver Horarios</a>
                            
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
           
        <div class="col-sm-12">
   
              <div> <?php if(isset($_SESSION["alerta"])){$_SESSION["alerta"]=$_SESSION["alerta"];}else{$_SESSION["alerta"]="";} ?>
                <form action="?action=<?php echo $alm->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" onsubmit="return confirm('Presiona OK para continuar.');">
                    
                    
                    
                    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
                    <input type="hidden" name="promfinal" value="<?php echo $alm->__GET('promfinal'); ?>" />
                    <input type="hidden" name="periodoActual" value="<?php echo $alm->__GET('periodoActual'); ?>" />
                    <input type="hidden" name="contrase" value="<?php echo $alm->__GET('contrase'); ?>" />

                    
                    <table class="table table-bordered table-dark table-sm"  >
                        <tr>
                            <th>Lunes</th>
                            <th>Martes</th>
                            <th>Miercoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                            
                        </tr>
                         <tr>
                            <td >  
                                <select class="custom-select custom-select mb-3" name="lunes">
                                  <option value="" selected>Elige...</option>
                                  <option value="8:00am - 9:00am" <?php if($alm->__GET('lunes')=='8:00am - 9:00am'){echo "selected";}else{echo "";} ?>>8:00am - 9:00am</option>
                                  <option value="9:00am - 10:00am" <?php if($alm->__GET('lunes')=='9:00am - 10:00am'){echo "selected";}else{echo "";} ?>>9:00am - 10:00am</option>
                                  <option value="10:00am - 11:00am" <?php if($alm->__GET('lunes')=='10:00am - 11:00am'){echo "selected";}else{echo "";} ?>>10:00am - 11:00am</option>
                                  <option value="11:00am - 12:00pm" <?php if($alm->__GET('lunes')=='11:00am - 12:00pm'){echo "selected";}else{echo "";} ?>>11:00am - 12:00pm</option>
                                  <option value="12:00pm - 1:00pm" <?php if($alm->__GET('lunes')=='12:00pm - 1:00pm'){echo "selected";}else{echo "";} ?>>12:00pm - 1:00pm</option>
                                  <option value="1:00pm - 2:00pm" <?php if($alm->__GET('lunes')=='1:00pm - 2:00pm'){echo "selected";}else{echo "";} ?>>1:00pm - 2:00pm</option>
                                  <option value="2:00pm - 3:00pm" <?php if($alm->__GET('lunes')=='2:00pm - 3:00pm'){echo "selected";}else{echo "";} ?>>2:00pm - 3:00pm</option>
                                  <option value="3:00pm - 4:00pm" <?php if($alm->__GET('lunes')=='3:00pm - 4:00pm'){echo "selected";}else{echo "";} ?>>3:00pm - 4:00pm</option>
                                  <option value="4:00pm - 5:00pm" <?php if($alm->__GET('lunes')=='4:00pm - 5:00pm'){echo "selected";}else{echo "";} ?>>4:00pm - 5:00pm</option>
                                  <option value="5:00pm - 6:00pm" <?php if($alm->__GET('lunes')=='5:00pm - 6:00pm'){echo "selected";}else{echo "";} ?>>5:00pm - 6:00pm</option>
                                  <option value="6:00pm - 7:00pm" <?php if($alm->__GET('lunes')=='6:00pm - 7:00pm'){echo "selected";}else{echo "";} ?>>6:00pm - 7:00pm</option>
                                  <option value="" <?php if($alm->__GET('lunes')==''){echo "selected";}else{echo "";} ?>></option>
                        
                                </select>
                            </td>
                            <td >  
                                <select class="custom-select custom-select mb-3" name="martes">
                                  <option value="" selected>Elige...</option>
                                  <option value="8:00am - 9:00am" <?php if($alm->__GET('martes')=='8:00am - 9:00am'){echo "selected";}else{echo "";} ?>>8:00am - 9:00am</option>
                                  <option value="9:00am - 10:00am" <?php if($alm->__GET('martes')=='9:00am - 10:00am'){echo "selected";}else{echo "";} ?>>9:00am - 10:00am</option>
                                  <option value="10:00am - 11:00am" <?php if($alm->__GET('martes')=='10:00am - 11:00am'){echo "selected";}else{echo "";} ?>>10:00am - 11:00am</option>
                                  <option value="11:00am - 12:00pm" <?php if($alm->__GET('martes')=='11:00am - 12:00pm'){echo "selected";}else{echo "";} ?>>11:00am - 12:00pm</option>
                                  <option value="12:00pm - 1:00pm" <?php if($alm->__GET('martes')=='12:00pm - 1:00pm'){echo "selected";}else{echo "";} ?>>12:00pm - 1:00pm</option>
                                  <option value="1:00pm - 2:00pm" <?php if($alm->__GET('martes')=='1:00pm - 2:00pm'){echo "selected";}else{echo "";} ?>>1:00pm - 2:00pm</option>
                                  <option value="2:00pm - 3:00pm" <?php if($alm->__GET('martes')=='2:00pm - 3:00pm'){echo "selected";}else{echo "";} ?>>2:00pm - 3:00pm</option>
                                  <option value="3:00pm - 4:00pm" <?php if($alm->__GET('martes')=='3:00pm - 4:00pm'){echo "selected";}else{echo "";} ?>>3:00pm - 4:00pm</option>
                                  <option value="4:00pm - 5:00pm" <?php if($alm->__GET('martes')=='4:00pm - 5:00pm'){echo "selected";}else{echo "";} ?>>4:00pm - 5:00pm</option>
                                  <option value="5:00pm - 6:00pm" <?php if($alm->__GET('martes')=='5:00pm - 6:00pm'){echo "selected";}else{echo "";} ?>>5:00pm - 6:00pm</option>
                                  <option value="6:00pm - 7:00pm" <?php if($alm->__GET('martes')=='6:00pm - 7:00pm'){echo "selected";}else{echo "";} ?>>6:00pm - 7:00pm</option>
                                  <option value="" <?php if($alm->__GET('martes')==''){echo "selected";}else{echo "";} ?>></option>
                        
                                </select>
                            </td>
                            <td >  
                                <select class="custom-select custom-select mb-3" name="miercoles">
                                  <option value="" selected>Elige...</option>
                                  <option value="8:00am - 9:00am" <?php if($alm->__GET('miercoles')=='8:00am - 9:00am'){echo "selected";}else{echo "";} ?>>8:00am - 9:00am</option>
                                  <option value="9:00am - 10:00am" <?php if($alm->__GET('miercoles')=='9:00am - 10:00am'){echo "selected";}else{echo "";} ?>>9:00am - 10:00am</option>
                                  <option value="10:00am - 11:00am" <?php if($alm->__GET('miercoles')=='10:00am - 11:00am'){echo "selected";}else{echo "";} ?>>10:00am - 11:00am</option>
                                  <option value="11:00am - 12:00pm" <?php if($alm->__GET('miercoles')=='11:00am - 12:00pm'){echo "selected";}else{echo "";} ?>>11:00am - 12:00pm</option>
                                  <option value="12:00pm - 1:00pm" <?php if($alm->__GET('miercoles')=='12:00pm - 1:00pm'){echo "selected";}else{echo "";} ?>>12:00pm - 1:00pm</option>
                                  <option value="1:00pm - 2:00pm" <?php if($alm->__GET('miercoles')=='1:00pm - 2:00pm'){echo "selected";}else{echo "";} ?>>1:00pm - 2:00pm</option>
                                  <option value="2:00pm - 3:00pm" <?php if($alm->__GET('miercoles')=='2:00pm - 3:00pm'){echo "selected";}else{echo "";} ?>>2:00pm - 3:00pm</option>
                                  <option value="3:00pm - 4:00pm" <?php if($alm->__GET('miercoles')=='3:00pm - 4:00pm'){echo "selected";}else{echo "";} ?>>3:00pm - 4:00pm</option>
                                  <option value="4:00pm - 5:00pm" <?php if($alm->__GET('miercoles')=='4:00pm - 5:00pm'){echo "selected";}else{echo "";} ?>>4:00pm - 5:00pm</option>
                                  <option value="5:00pm - 6:00pm" <?php if($alm->__GET('miercoles')=='5:00pm - 6:00pm'){echo "selected";}else{echo "";} ?>>5:00pm - 6:00pm</option>
                                  <option value="6:00pm - 7:00pm" <?php if($alm->__GET('miercoles')=='6:00pm - 7:00pm'){echo "selected";}else{echo "";} ?>>6:00pm - 7:00pm</option>
                                  <option value="" <?php if($alm->__GET('miercoles')==''){echo "selected";}else{echo "";} ?>></option>
                        
                                </select>
                            </td>
                             <td >  
                                <select class="custom-select custom-select mb-3" name="jueves">
                                  <option value="" selected>Elige...</option>
                                  <option value="8:00am - 9:00am" <?php if($alm->__GET('jueves')=='8:00am - 9:00am'){echo "selected";}else{echo "";} ?>>8:00am - 9:00am</option>
                                  <option value="9:00am - 10:00am" <?php if($alm->__GET('jueves')=='9:00am - 10:00am'){echo "selected";}else{echo "";} ?>>9:00am - 10:00am</option>
                                  <option value="10:00am - 11:00am" <?php if($alm->__GET('jueves')=='10:00am - 11:00am'){echo "selected";}else{echo "";} ?>>10:00am - 11:00am</option>
                                  <option value="11:00am - 12:00pm" <?php if($alm->__GET('jueves')=='11:00am - 12:00pm'){echo "selected";}else{echo "";} ?>>11:00am - 12:00pm</option>
                                  <option value="12:00pm - 1:00pm" <?php if($alm->__GET('jueves')=='12:00pm - 1:00pm'){echo "selected";}else{echo "";} ?>>12:00pm - 1:00pm</option>
                                  <option value="1:00pm - 2:00pm" <?php if($alm->__GET('jueves')=='1:00pm - 2:00pm'){echo "selected";}else{echo "";} ?>>1:00pm - 2:00pm</option>
                                  <option value="2:00pm - 3:00pm" <?php if($alm->__GET('jueves')=='2:00pm - 3:00pm'){echo "selected";}else{echo "";} ?>>2:00pm - 3:00pm</option>
                                  <option value="3:00pm - 4:00pm" <?php if($alm->__GET('jueves')=='3:00pm - 4:00pm'){echo "selected";}else{echo "";} ?>>3:00pm - 4:00pm</option>
                                  <option value="4:00pm - 5:00pm" <?php if($alm->__GET('jueves')=='4:00pm - 5:00pm'){echo "selected";}else{echo "";} ?>>4:00pm - 5:00pm</option>
                                  <option value="5:00pm - 6:00pm" <?php if($alm->__GET('jueves')=='5:00pm - 6:00pm'){echo "selected";}else{echo "";} ?>>5:00pm - 6:00pm</option>
                                  <option value="6:00pm - 7:00pm" <?php if($alm->__GET('jueves')=='6:00pm - 7:00pm'){echo "selected";}else{echo "";} ?>>6:00pm - 7:00pm</option>
                                  <option value="" <?php if($alm->__GET('jueves')==''){echo "selected";}else{echo "";} ?>></option>
                        
                                </select>
                            </td>
                             <td >  
                                <select class="custom-select custom-select mb-3" name="viernes">
                                  <option value="" selected>Elige...</option>
                                  <option value="8:00am - 9:00am" <?php if($alm->__GET('viernes')=='8:00am - 9:00am'){echo "selected";}else{echo "";} ?>>8:00am - 9:00am</option>
                                  <option value="9:00am - 10:00am" <?php if($alm->__GET('viernes')=='9:00am - 10:00am'){echo "selected";}else{echo "";} ?>>9:00am - 10:00am</option>
                                  <option value="10:00am - 11:00am" <?php if($alm->__GET('viernes')=='10:00am - 11:00am'){echo "selected";}else{echo "";} ?>>10:00am - 11:00am</option>
                                  <option value="11:00am - 12:00pm" <?php if($alm->__GET('viernes')=='11:00am - 12:00pm'){echo "selected";}else{echo "";} ?>>11:00am - 12:00pm</option>
                                  <option value="12:00pm - 1:00pm" <?php if($alm->__GET('viernes')=='12:00pm - 1:00pm'){echo "selected";}else{echo "";} ?>>12:00pm - 1:00pm</option>
                                  <option value="1:00pm - 2:00pm" <?php if($alm->__GET('viernes')=='1:00pm - 2:00pm'){echo "selected";}else{echo "";} ?>>1:00pm - 2:00pm</option>
                                  <option value="2:00pm - 3:00pm" <?php if($alm->__GET('viernes')=='2:00pm - 3:00pm'){echo "selected";}else{echo "";} ?>>2:00pm - 3:00pm</option>
                                  <option value="3:00pm - 4:00pm" <?php if($alm->__GET('viernes')=='3:00pm - 4:00pm'){echo "selected";}else{echo "";} ?>>3:00pm - 4:00pm</option>
                                  <option value="4:00pm - 5:00pm" <?php if($alm->__GET('viernes')=='4:00pm - 5:00pm'){echo "selected";}else{echo "";} ?>>4:00pm - 5:00pm</option>
                                  <option value="5:00pm - 6:00pm" <?php if($alm->__GET('viernes')=='5:00pm - 6:00pm'){echo "selected";}else{echo "";} ?>>5:00pm - 6:00pm</option>
                                  <option value="6:00pm - 7:00pm" <?php if($alm->__GET('viernes')=='6:00pm - 7:00pm'){echo "selected";}else{echo "";} ?>>6:00pm - 7:00pm</option>
                                  <option value="" <?php if($alm->__GET('viernes')==''){echo "selected";}else{echo "";} ?>></option>
                        
                                </select>
                            </td>
                             
                        </tr>
                    </table>
                    
                    
                    
                    
                    <table class="table table-bordered table-dark"  >
                        
                        <tr>
                            <th colspan="2">Sabado | comienzo - final</th>
                            <th>Información del Grupo</th>
                            <th>Función</th>
                        </tr>
                         <tr><td>  
                                <select class="custom-select custom-select mb-3" name="sabadoC">
                                  <option value="" selected>Elige...</option>
                                  <option value="8:00am" <?php if($alm->__GET('sabadoC')=='8:00am'){echo "selected";}else{echo "";} ?>>8:00am</option>
                                    
                                  <option value="8:30am" <?php if($alm->__GET('sabadoC')=='8:30am'){echo "selected";}else{echo "";} ?>>8:30am</option>
                                    
                                  <option value="9:00am" <?php if($alm->__GET('sabadoC')=='9:00am'){echo "selected";}else{echo "";} ?>>9:00am</option>
                                  <option value="9:30am" <?php if($alm->__GET('sabadoC')=='9:30am'){echo "selected";}else{echo "";} ?>>9:30am</option>
                                    
                                  <option value="10:00am" <?php if($alm->__GET('sabadoC')=='10:00am'){echo "selected";}else{echo "";} ?>>10:00am</option>
                                  <option value="10:30am" <?php if($alm->__GET('sabadoC')=='10:30am'){echo "selected";}else{echo "";} ?>>10:30am</option>
                                    
                                  <option value="11:00am" <?php if($alm->__GET('sabadoC')=='11:00am'){echo "selected";}else{echo "";} ?>>11:00am</option>
                                  <option value="11:30am" <?php if($alm->__GET('sabadoC')=='11:30am'){echo "selected";}else{echo "";} ?>>11:30am</option>
                                    
                                  <option value="12:00pm" <?php if($alm->__GET('sabadoC')=='12:00pm'){echo "selected";}else{echo "";} ?>>12:00pm</option>
                                  <option value="12:30pm" <?php if($alm->__GET('sabadoC')=='12:30pm'){echo "selected";}else{echo "";} ?>>12:30pm</option>
                                    
                                  <option value="1:00pm" <?php if($alm->__GET('sabadoC')=='1:00pm'){echo "selected";}else{echo "";} ?>>1:00pm</option>
                                  <option value="1:30pm" <?php if($alm->__GET('sabadoC')=='1:30pm'){echo "selected";}else{echo "";} ?>>1:30pm</option>
                                    
                                  <option value="2:00pm" <?php if($alm->__GET('sabadoC')=='2:00pm'){echo "selected";}else{echo "";} ?>>1:00pm</option>
                                  <option value="2:30pm" <?php if($alm->__GET('sabadoC')=='2:30pm'){echo "selected";}else{echo "";} ?>>1:30pm</option> 
                                     
                                  <option value="3:00pm" <?php if($alm->__GET('sabadoC')=='3:00pm'){echo "selected";}else{echo "";} ?>>2:00pm</option>
                                  <option value="3:30pm" <?php if($alm->__GET('sabadoC')=='3:30pm'){echo "selected";}else{echo "";} ?>>2:30pm</option>
                                     
                                  <option value="4:00pm" <?php if($alm->__GET('sabadoC')=='4:00pm'){echo "selected";}else{echo "";} ?>>3:00pm</option>
                                  <option value="44:30pm" <?php if($alm->__GET('sabadoC')=='4:30pm'){echo "selected";}else{echo "";} ?>>3:30pm</option>
                                     
                                  <option value="5:00pm" <?php if($alm->__GET('sabadoC')=='5:00pm'){echo "selected";}else{echo "";} ?>>4:00pm</option>
                                  <option value="5:30pm" <?php if($alm->__GET('sabadoC')=='5:30pm'){echo "selected";}else{echo "";} ?>>4:30pm</option>
                                     
                                  <option value="6:00pm" <?php if($alm->__GET('sabadoC')=='6:00pm'){echo "selected";}else{echo "";} ?>>5:00pm</option>
                                  <option value="6:30pm" <?php if($alm->__GET('sabadoC')=='6:30pm'){echo "selected";}else{echo "";} ?>>5:30pm</option>
                                     
                                  <option value="7:00pm" <?php if($alm->__GET('sabadoC')=='7:00pm'){echo "selected";}else{echo "";} ?>>6:00pm</option>
                                  <option value="7:30pm" <?php if($alm->__GET('sabadoC')=='7:30pm'){echo "selected";}else{echo "";} ?>>7:30pm</option>
                                    
                                  <option value="" <?php if($alm->__GET('sabadoC')==''){echo "selected";}else{echo "";} ?>>Comienza</option>
                        
                                </select>
                                 
                                 
                            </td>
                             <td>
                                 <select class="custom-select custom-select mb-3" name="sabadoT">
                                  <option value="" selected>Elige...</option>
                                  <option value="8:30am" <?php if($alm->__GET('sabadoT')=='8:30am'){echo "selected";}else{echo "";} ?>>8:30am</option>
                                     
                                  <option value="9:00am" <?php if($alm->__GET('sabadoT')=='9:00am'){echo "selected";}else{echo "";} ?>>9:00am</option>
                                  <option value="9:30am" <?php if($alm->__GET('sabadoT')=='9:30am'){echo "selected";}else{echo "";} ?>>9:30am</option>
                                     
                                  <option value="10:00am" <?php if($alm->__GET('sabadoT')=='10:00am'){echo "selected";}else{echo "";} ?>>10:00am</option>
                                  <option value="10:30am" <?php if($alm->__GET('sabadoT')=='10:30am'){echo "selected";}else{echo "";} ?>>10:30am</option>
                                     
                                  <option value="11:00am" <?php if($alm->__GET('sabadoT')=='11:00am'){echo "selected";}else{echo "";} ?>>11:00am</option>
                                  <option value="11:30am" <?php if($alm->__GET('sabadoT')=='11:30am'){echo "selected";}else{echo "";} ?>>11:30am</option>
                                     
                                  <option value="12:00pm" <?php if($alm->__GET('sabadoT')=='12:00pm'){echo "selected";}else{echo "";} ?>>12:00pm</option>
                                  <option value="12:30pm" <?php if($alm->__GET('sabadoT')=='12:30pm'){echo "selected";}else{echo "";} ?>>12:30pm</option>
                                     
                                  <option value="1:00pm" <?php if($alm->__GET('sabadoT')=='1:00pm'){echo "selected";}else{echo "";} ?>>1:00pm</option>
                                  <option value="1:30pm" <?php if($alm->__GET('sabadoT')=='1:30pm'){echo "selected";}else{echo "";} ?>>1:30pm</option>
                                     
                                  <option value="2:00pm" <?php if($alm->__GET('sabadoT')=='2:00pm'){echo "selected";}else{echo "";} ?>>1:00pm</option>
                                  <option value="2:30pm" <?php if($alm->__GET('sabadoT')=='2:30pm'){echo "selected";}else{echo "";} ?>>1:30pm</option> 
                                     
                                  <option value="3:00pm" <?php if($alm->__GET('sabadoT')=='3:00pm'){echo "selected";}else{echo "";} ?>>2:00pm</option>
                                  <option value="3:30pm" <?php if($alm->__GET('sabadoT')=='3:30pm'){echo "selected";}else{echo "";} ?>>2:30pm</option>
                                     
                                  <option value="4:00pm" <?php if($alm->__GET('sabadoT')=='4:00pm'){echo "selected";}else{echo "";} ?>>3:00pm</option>
                                  <option value="44:30pm" <?php if($alm->__GET('sabadoT')=='4:30pm'){echo "selected";}else{echo "";} ?>>3:30pm</option>
                                     
                                  <option value="5:00pm" <?php if($alm->__GET('sabadoT')=='5:00pm'){echo "selected";}else{echo "";} ?>>4:00pm</option>
                                  <option value="5:30pm" <?php if($alm->__GET('sabadoT')=='5:30pm'){echo "selected";}else{echo "";} ?>>4:30pm</option>
                                     
                                  <option value="6:00pm" <?php if($alm->__GET('sabadoT')=='6:00pm'){echo "selected";}else{echo "";} ?>>5:00pm</option>
                                  <option value="6:30pm" <?php if($alm->__GET('sabadoT')=='6:30pm'){echo "selected";}else{echo "";} ?>>5:30pm</option>
                                     
                                  <option value="7:00pm" <?php if($alm->__GET('sabadoT')=='7:00pm'){echo "selected";}else{echo "";} ?>>6:00pm</option>
                                  <option value="7:30pm" <?php if($alm->__GET('sabadoT')=='7:30pm'){echo "selected";}else{echo "";} ?>>7:30pm</option>
                                  <option value="" <?php if($alm->__GET('sabadoT')==''){echo "selected";}else{echo "";} ?>>Termina</option>
                        
                                </select>
                            </td>
                            <td colspan="1" >
                                <select class="custom-select custom-select mb-3" name="idgrupo">
                                  <option value="" selected>Elige...</option>
                                   <?php foreach($model->Listar0() as $r): ?>
                                  <option value="<?php echo $r->__GET('idgrupo'); ?>" <?php if($r->__GET('idgrupo') == $alm->__GET('idgrupo')){echo "selected";}else{echo "";} ?>><?php echo grupoID($r->__GET('idgrupo')); ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </td>
                            <td colspan="1">
                                <a href="AdminHorarios.php" class="btn btn-danger btn-sm">Limpiar campos</a>
                                <button type="submit" class="btn btn-primary btn-sm">Guardar cambios</button>
                            </td>
                        </tr>
                    </table>
                </form>
				</div>
            
            
                        </div>
           
        <div class="col-sm-12"style="font-size:16px;">
            
            <div>
                <input type="text" id="myInput" class="form-control" placeholder="Filtro Horarios...">
            </div>
				
				
             <div class=" ex3">  
			 
                <table class="table table-bordered table-dark table-sm"  id="myTable" >
				
                    <thead style="text-align:center; font-size:14px;">
					
                        <tr>
                            <th>Nombre Docente</th>
                            <th>Información del Grupo</th>
                            <th>Función</th>
                            


                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                    <tbody id="tab-id" style="text-align:center;">
                        <tr>
                            <td><?php echo nombreMaestro($r->__GET('idgrupo')); ?></td>
                            <td><?php echo grupoID($r->__GET('idgrupo')); ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
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