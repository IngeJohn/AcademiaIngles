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

$_SESSION['periodoDB'] = $periActuBD;

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



require_once 'utilities/Niv.entidad.php';
require_once 'utilities/Niv.model.php';

// Logica
$alm = new Niv();
$model = new NivModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
            $alm->__SET('id',               $_REQUEST['id']);
            $alm->__SET('numeroControl',    $_REQUEST['numeroControl']);
            $alm->__SET('estado',           $_REQUEST['estado']);
            $alm->__SET('promedio',         $_REQUEST['promedio']);
            $alm->__SET('promedio2',        $_REQUEST['promedio2']);
			$alm->__SET('comentario',       $_REQUEST['comentario']);
            $alm->__SET('oportunidad',      $_REQUEST['oportunidad']);
            $alm->__SET('tipoProgramaBeca', $_REQUEST['tipoProgramaBeca']);
            $alm->__SET('idgrupo',          $_REQUEST['idgrupo']);
			

			$model->Actualizar($alm);
			header('Location: adminAlumnNiveles.php');
			break;
            

            

		case 'editar':
			$alm = $model->Obtener3($_REQUEST['id']);
			break;
	}
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ver / Modificar Niveles Alumnos</title>
    
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
                            
                            <a href="adminAlumnNiveles.php" class="btn btn-outline-light active" role="button" >Ver / Modificar Niveles Alumnos</a>
                            
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
                  
                <p>En esta sección podrás modificar la información y asignación de grupos de los alumnos. Solo tienes que seleccionar algún alumno de la tabla "Filtro", dándole clic en el botón verde que corresponde a cada alumno. Con esto la información se cargar en la tabla superior donde podrás modificar la información y asignación de grupo. Para finalizar, presiona el botón azul de guardar cambios.</p>

                      
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
                <form action="?action=actualizar" method="post" onsubmit="return confirm('Presiona OK para continuar.');">
                    
                    
                    
                    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />

                    
                    <table class="table table-bordered table-dark table-sm"  >
                        <tr>
                            <th>Nombre Alumno</th>
                            <th>Número de Control</th>
                            <th>Inforgamción del Grupo</th>
                            <th>Estado Acreditación</th>
                            
                        </tr>   
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
                            <td >  
                                <select class="custom-select custom-select mb-3" name="estado">
                                  <option value="" selected>Elige...</option>
                                  <option value="Acreditado" <?php if($alm->__GET('estado')==='Acreditado'){echo "selected";}else{echo "";} ?>>Acreditado</option>
                                  <option value="No acreditado" <?php if($alm->__GET('estado')==='No acreditado'){echo "selected";}else{echo "";} ?>>No acreditado</option>
                                    <option value="En curso" <?php if($alm->__GET('estado')==='En curso'){echo "selected";}else{echo "";} ?>>En curso</option>
                                  <option value="" <?php if($alm->__GET('estado')==NULL){echo "selected";}else{echo "hidden";} ?>>Sin Asignar</option>

                                </select>
                            </td>
                            
                            
                        </tr>
                        
                        <tr>
                            
                            <th>Calificación 1aOp</th>
                            <th>Calificación 2aOp</th>
                            <th colspan="2">Comentario calificación</th>
                            
                        </tr>
                        <tr>
                            
                            <td >  
                                <input type="text" name="promedio" class="form-control" value="<?php  echo $alm->__GET('promedio');?>">
                            </td>
                            <td >  
                                <input type="text" name="promedio2" class="form-control" value="<?php  echo $alm->__GET('promedio2');?>">
                            </td>
                            <td rowspan="2" colspan="2">  
                                 <textarea class="form-control" rows="5" id="comentario" name="comentario"><?php  echo $alm->__GET('comentario');?></textarea>
                            </td>
                            
                            
                        </tr>
                        <tr>
                            
                            
                            <th>Programa o Beca</th>
                            <th>Tipo de Calificación</th>
                        </tr>
                         <tr>
                            <td >  
                                <select class='form-control' name= 'tipoProgramaBeca' >
                                    <option value="" selected>Elige...</option>
                                    <option value="Si" <?php if($alm->__GET('tipoProgramaBeca')==='Si'){echo "selected";}else{echo "";} ?>>Si</option>
                                    <option value="No" <?php if($alm->__GET('tipoProgramaBeca')==='No'){echo "selected";}else{echo "";} ?>>No</option>
                                  <option value="" <?php if($alm->__GET('tipoProgramaBeca')==NULL){echo "selected";}else{echo "hidden";} ?>>Sin Asignar</option>
                                </select> 
                               
                            </td>
                             <td>
                                <select class='form-control' name= 'oportunidad' >
                                    <option value="" selected>Elige...</option>
                                    <option value="1aOp" <?php if($alm->__GET('oportunidad')==='1aOp'){echo "selected";}else{echo "";} ?>>1aOp</option>
                                    <option value="2aOp" <?php if($alm->__GET('oportunidad')==='2aOp'){echo "selected";}else{echo "";} ?>>2aOp</option>
                                  <option value="" <?php if($alm->__GET('oportunidad')==NULL){echo "selected";}else{echo "hidden";} ?>>Sin Asignar</option>
                                </select> 
                             
                             </td>
                            <td colspan="2" style="text-align:right;">
                                <a href="adminAlumnNiveles.php" class="btn btn-light btn-sm">Limpiar campos</a> &nbsp;&nbsp;&nbsp;
                                Función Actualizar / Registrar &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary btn-sm">Guardar cambios</button>
                            </td>
                        </tr>
                    </table>
                </form>
				</div>
            
            
                        </div>
           
        <div class="col-sm-12"style="font-size:16px;">
            
            <div>
                <input type="text" id="myInput" class="form-control" placeholder="Filtro...">
            </div>
				
				
             <div class=" ex3">  
			 
                <table class="table table-bordered table-dark table-sm"  id="myTable" >
				
                    <thead style="text-align:center; font-size:14px;">
					
                        <tr>
                            <th>Nombre completo</th>
                            <th>Número de Control</th>
                            <th>Estado</th>
                            <th>Información del Grupo</th>
                            <th>Selector</th>
                            


                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                    <tbody id="tab-id" style="text-align:center;">
                        <tr>
                            <td><?php if($r->__GET('numeroControl')==""){ }else{echo NombreAlumno($r->__GET('numeroControl'));}?></td>
                            <td><?php echo $r->__GET('numeroControl'); ?></td>
                            <td><?php echo $r->__GET('estado'); ?></td>
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
    
    
    
    
    
    
    
<?php  mysqli_close($link);?>
    
    
    
    
    
    

    
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