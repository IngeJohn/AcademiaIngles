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


if ($stmt3 = $link->prepare("SELECT  periodo, periodoAnterior FROM periodoactual")) {
    $stmt3->execute();

    /* bind variables to prepared statement */
    $stmt3->bind_result($periActuBD, $periodoAnteriorBD);

    /* fetch values */
$stmt3->fetch();

    /* close statement */
    $stmt3->close();
}

$_SESSION['periodoDB'] = $periActuBD;
$_SESSION['periodoAnteriorBD'] = $periodoAnteriorBD;


if( $periActuBD !== $periodoActu ){
    
    $sql2 = "UPDATE periodoactual SET periodo ='$periodoActu', periodoAnterior ='$periActuBD';";
    
    if($stmt4 = mysqli_prepare($link, $sql2)){
        $stmt4->execute();
    }
    
}


//==================================================================================================================================================================
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

//=========================================================================================================



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
        //$stmtm->close();
        
        echo $nombre." ".$paterno." ".$materno;
    }

}

//========================================================================================================





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

//========================================================================================================


require_once 'Niv.entidad.php';
require_once 'Niv.model.php';

// Logica
$alm = new Niv();
$model = new NivModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
            $alm->__SET('id',                     $_REQUEST['id']);
            $alm->__SET('numeroControl',          $_REQUEST['numeroControl']);
            $alm->__SET('idgrupo',                $_REQUEST['idgrupo']);
            $alm->__SET('tipoProgramaBeca',       $_REQUEST['tipoProgramaBeca']);
            $alm->__SET('inscripcionPagoEstado',  $_REQUEST['inscripcionPagoEstado']);
            $alm->__SET('libroPagoEstado',        $_REQUEST['libroPagoEstado']);
            $alm->__SET('comentarioPagos',        $_REQUEST['comentarioPagos']);
			

			$model->Actualizar2($alm);
            
			header('Location: adminAlumnReinscripciones.php');
			break;
            
            
        case 'registrar':
            
            $alm->__SET('numeroControl',            $_REQUEST['numeroControl']);
            $alm->__SET('idgrupo',                  $_REQUEST['idgrupo']);
            $alm->__SET('tipoProgramaBeca',         $_REQUEST['tipoProgramaBeca']);
            $alm->__SET('inscripcionPagoEstado',    $_REQUEST['inscripcionPagoEstado']);
            $alm->__SET('libroPagoEstado',          $_REQUEST['libroPagoEstado']);
            $alm->__SET('comentarioPagos',          $_REQUEST['comentarioPagos']);
            
			

			$model->Registrar($alm);
            
			header('Location: adminAlumnReinscripciones.php');
			break;
        
        case 'eliminar':
			$model->Eliminar($_REQUEST['id']);
			header('Location: index2.php');
			break;
        
		case 'editar':
			$alm = $model->Obtener($_REQUEST['id']);
			break;
            
        case 'obtener':
			$alm = $model->Obtener2($_REQUEST['numeroControl']);
			break;
	}
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reinscripciones</title>
    
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
                            
                            <a href="adminAlumnReinscripciones.php" class="btn btn-outline-light active" role="button" >Reinscripciones</a>
                            
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
                  
                <p>Para actualizar un pago de la inscripción de un alumno:</p>
                <p>Buscar por número de control y nivel en la caja de texto denominada "Filtro..."</p>
                <p>Para registrar un pago nuevo en la Base de Datos:</p>
                <p>Registrar los campos obligatorios marcados con una estrella * </p>
                  <p>Listado de campos obligatorios:</p>
                <p>Número de control, nivel, grupo, carrera, modalidad, nombre del maestro y la información de los pagos 
                  de la inscripción y el libro</p>
                <p>Datos opcionales:</p>
                  <P>- Comentario Pagos.</P>
                  <p>Nota: No es necesario introducir el periodo cuando se hace un registro nuevo, este se registra automáticamente.</p>

                      
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
                
                <p><b>Bienvenido: </b><?php echo $r->__GET('titulo')." ".$r->__GET('nombre')." ".$r->__GET('paterno')." ".$r->__GET('materno'); ?> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre de usuario: </b><?php echo $_SESSION['username'];?></p>
                
                <?php endforeach; ?>
                <hr>
                 
            </div>
            <div class="col-sm-5 y"  ><div class="x">Instituto Tecnológico Superior de Loreto</div> <hr></div>
           
        <div class="col-sm-12" style="font-size:16px;">
   
              <div>  
                <form action="?action=<?php echo $alm->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" onsubmit="return confirm('Presiona OK para continuar.');">
                    
                    
                    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
                    <input type="hidden" name="numeroControl" value="<?php echo $alm->__GET('numeroControl'); ?>" />

                    
                    <table class="table table-bordered table-dark"  >
                        <tr>
                            <th>Nombre Alumno <?php echo $alm->__GET('id'); ?></th>
                            <th>Número de Control</th>
                            <th>Nivel / Grupo / Carrera / Modalidad</th>
                            
                            
                            
                            
                        <tr>
                           <td >  
                                <?php if($alm->__GET('numeroControl')==""){ }else{echo NombreAlumno($alm->__GET('numeroControl'));}?>
                            </td>
                            
                           <td >  
                                <input type="text" name="numeroControl" class="form-control" value="<?php  echo $alm->__GET('numeroControl');?>">
                            </td>
                            <td >  
                                <select class="custom-select custom-select mb-3" name="idgrupo">
                                  <option value="" selected>Elige...</option>
                                   <?php foreach($model->Listar0() as $r): ?>
                                  <option value="<?php echo $r->__GET('idgrupo'); ?>" <?php if($r->__GET('idgrupo')==$alm->__GET('idgrupo')){echo "selected";}else{echo "";} ?>><?php echo grupoID($r->__GET('idgrupo')); ?></option>
                                  <?php endforeach; ?>
                                </select>
                            </td>
                            
                            
                            
                        </tr>
                        
                        <tr>
                            <th>Pago Inscripción</th>
                            <th>Pago Libro</th>
                            <th>Comentarios / Notas</th>
                            
                            
                            
                            
                        <tr>
                           <td >  
                                <select class="custom-select custom-select mb-3" name="inscripcionPagoEstado">
                                  <option value="" selected>Elige...</option>
                                  <option value="Pagado" <?php if($alm->__GET('inscripcionPagoEstado')=='Pagado'){echo "selected";}else{echo "";} ?>>Pagado</option>
                                  <option value="Pendiente" <?php if($alm->__GET('inscripcionPagoEstado')=='Pendiente'){echo "selected";}else{echo "";} ?>>Pendiente</option>
                                  <option value="" <?php if($alm->__GET('inscripcionPagoEstado')==''){echo "selected";}else{echo "";} ?>></option>
                        
                                </select>
                            </td>
                            <td >  
                                <select class="custom-select custom-select mb-3" name="libroPagoEstado">
                                  <option value="" selected>Elige...</option>
                                  <option value="Pagado" <?php if($alm->__GET('libroPagoEstado')=='Pagado'){echo "selected";}else{echo "";} ?>>Pagado</option>
                                  <option value="Pendiente" <?php if($alm->__GET('libroPagoEstado')=='Pendiente'){echo "selected";}else{echo "";} ?>>Pendiente</option>
                                  <option value="" <?php if($alm->__GET('libroPagoEstado')==''){echo "selected";}else{echo "";} ?>></option>
                        
                                </select>
                            </td>
                            <td rowspan="3">
                                
                                <textarea class="form-control" rows="5" id="comentarioPagos" name="comentarioPagos"><?php  echo $alm->__GET('comentarioPagos');?></textarea>
                            </td>
                            
                            
                            
                            
                        </tr>
                        
                       
                        <tr>
                            <th>
                                Programa o Beca
                            </th>
                            <th colspan="1" style="text-align:right;">
                                Funciones
                            </th>
                            
                            
                        </tr>
                        <tr>
                            <td >  
                                <select class="form-control" name= "tipoProgramaBeca" >
                                  <option value="" selected>Elige...</option>
                                  <option value="Si" <?php if($alm->__GET('tipoProgramaBeca')=='Si'){echo "selected";}else{echo "";} ?>>Si</option>
                                  <option value="No" <?php if($alm->__GET('tipoProgramaBeca')=='No'){echo "selected";}else{echo "";} ?>>No</option>
                                  <option value="" <?php if($alm->__GET('tipoProgramaBeca')==''){echo "selected";}else{echo "";} ?>></option>
                                </select> 
                            </td>
                            <th colspan="1" style="text-align:right;">
                                <a href="adminAlumnReinscripciones.php" class="btn btn-secondary">Limpiar campos</a>
                                <button type="submit" class="btn btn-primary">Guardar Datos</button>
                            </th>
                            
                            
                        </tr>
                         
                    </table>
                </form>
				</div>
            
            
        </div>
            
            
            
            
            
            
            
           
        <div class="col-sm-6"style="font-size:16px;">
            
            <div>
                <input type="text" id="myInput" class="form-control" placeholder="Alumnos Activos">
            </div>
				
				
             <div class=" ex3">  
			 
                <table class="table table-bordered table-dark"  id="myTable" >
				
                    <thead style="text-align:center; font-size:14px;">
					
                        <tr>
                            <th>Nombre completo</th>
                            <th>Número de Control</th>
                            <th>Información del Grupo</th>
                            <th>Selector</th>
                            


                        </tr>
                    </thead>
                    <?php foreach($model->Listar4() as $r): ?>
                    <tbody id="tab-id" style="text-align:center;">
                        <tr>
                            <td><?php if($r->__GET('numeroControl')==""){ }else{echo NombreAlumno($r->__GET('numeroControl'));}?></td>
                            <td><?php echo $r->__GET('numeroControl'); ?></td>
                            <td><?php echo grupoID($r->__GET('idgrupoActual')); ?></td>
                            <td>
                                <a class="btn btn-success" href="?action=obtener&numeroControl=<?php echo $r->numeroControl; ?>">Obtener</a>
                            </td>
                        </tr>
                    </tbody>
                        
                    <?php endforeach; ?>
                </table>     
              </div>
           
        </div>
            
        <div class="col-sm-6"style="font-size:16px;">
            
            <div>
                <input type="text" id="myInput" class="form-control" placeholder="Filtro Ya inscritos en el periodo <?php echo $periActuBD; ?>">
            </div>
				
				
             <div class=" ex3">  
			 
                <table class="table table-bordered table-dark"  id="myTable" >
				
                    <thead style="text-align:center; font-size:14px;">
					
                        <tr>
                            <th>Nombre completo</th>
                            <th>Número de Control</th>
                            <th>Información del Grupo</th>
                            <th>Selector</th>
                            


                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                    <tbody id="tab-id" style="text-align:center;">
                        <tr>
                            <td><?php if($r->__GET('numeroControl')==""){ }else{echo NombreAlumno($r->__GET('numeroControl'));}?></td>
                            <td><?php echo $r->__GET('numeroControl'); ?></td>
                            <td><?php echo grupoID($r->__GET('idgrupo')); ?></td>
                            <td>
                                <a class="btn btn-success" href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                            </td>
                        </tr>
                    </tbody>
                        
                    <?php endforeach; ?>
                </table>     
              </div>
           
        </div>
            
            
            
            
            
            
        </div>
    </div>
    
    
    
    
    
    
    

    
    
    
    <?php mysqli_close($link);   ?>
    
    

    
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