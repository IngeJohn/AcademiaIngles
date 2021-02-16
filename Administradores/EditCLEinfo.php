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
//=================================================================================================================================================================================


 
    // Close connection
    mysqli_close($link);


//=========================================================================================================



//====================================================================================================



require_once 'utilities/CLE.entidad.php';
require_once 'utilities/CLE.model.php';

// Logica
$alm = new CLE();
$model = new CLEModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
            $alm->__SET('id',              $_REQUEST['id']);
			$alm->__SET('subdireccion',          $_REQUEST['subdireccion']);
			$alm->__SET('subdireccionNombre',         $_REQUEST['subdireccionNombre']);
			$alm->__SET('subTelOfi',         $_REQUEST['subTelOfi']);
            $alm->__SET('subTelOfiExt',        $_REQUEST['subTelOfiExt']);
            $alm->__SET('departamento',            $_REQUEST['departamento']);
            $alm->__SET('departamentoNombre',            $_REQUEST['departamentoNombre']);
            $alm->__SET('depTelOfi',             $_REQUEST['depTelOfi']);
			$alm->__SET('depTelOfiExt',       $_REQUEST['depTelOfiExt']);
            $alm->__SET('cleCoordinador',            $_REQUEST['cleCoordinador']);
            $alm->__SET('emailCoordi',        $_REQUEST['emailCoordi']);
            $alm->__SET('emailCoordiAlter',     $_REQUEST['emailCoordiAlter']);
            $alm->__SET('coorTelOfi',          $_REQUEST['coorTelOfi']);
            $alm->__SET('coorTelOfiExt',          $_REQUEST['coorTelOfiExt']);
            $alm->__SET('coorTelCel',  $_REQUEST['coorTelCel']);
			

			$model->Actualizar($alm);
			header('Location: EditCLEinfo.php');
			break;
            
        case 'registrar':
			$alm->__SET('subdireccion',          $_REQUEST['subdireccion']);
			$alm->__SET('subdireccionNombre',         $_REQUEST['subdireccionNombre']);
			$alm->__SET('subTelOfi',         $_REQUEST['subTelOfi']);
            $alm->__SET('subTelOfiExt',        $_REQUEST['subTelOfiExt']);
            $alm->__SET('departamento',            $_REQUEST['departamento']);
            $alm->__SET('departamentoNombre',            $_REQUEST['departamentoNombre']);
            $alm->__SET('depTelOfi',             $_REQUEST['depTelOfi']);
			$alm->__SET('depTelOfiExt',       $_REQUEST['depTelOfiExt']);
            $alm->__SET('cleCoordinador',            $_REQUEST['cleCoordinador']);
            $alm->__SET('emailCoordi',        $_REQUEST['emailCoordi']);
            $alm->__SET('emailCoordiAlter',     $_REQUEST['emailCoordiAlter']);
            $alm->__SET('coorTelOfi',          $_REQUEST['coorTelOfi']);
            $alm->__SET('coorTelOfiExt',          $_REQUEST['coorTelOfiExt']);
            $alm->__SET('coorTelCel',  $_REQUEST['coorTelCel']);
            
			$model->Registrar($alm);
			header('Location: EditCLEinfo.php');
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
    <title>Registrar / Modificar CLE Información</title>
    
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
                            
                            <a href="EditCLEinfo.php" class="btn btn-outline-light active" role="button" >Registrar / Modificar CLE Información</a>
                            
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
                  
                <p>Esta página te permite actualizar la información de los jefes, encargados y Coordinadores de la Academia de Inglés. Solo presiona el botón verde de la tabla inferior para cargar la información en la tabla de edición que se encuentra en la parte superior.  <br>Has las modificaciones necesarias y presiona el botón azul para guardar cambios. </p>


                      
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
           
        <div class="col-sm-12" style="font-size:16px;">
   
              <div>  
                <form action="?action=<?php echo $alm->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" style="">
                    
                    
                    
                    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
                    
                    <table class="table table-bordered table-dark table-sm"  >
                        <tr>
                            <th>Subdirección</th>
                            <th>Sub-Nombre</th>
                            <th>Sub-Teléfono</th>
                            <th>Sub-Extención</th>
                            
                            
                            
                        <tr>
                           <td >  
                                <select class="custom-select custom-select mb-3" name="subdireccion">
                                  <option value="" selected>Elige...</option>
                                  <option value="Subdirección Académica" <?php if($alm->__GET('subdireccion')==='Subdirección Académica'){echo "selected";}else{echo "";} ?>>Subdirección Académica</option>
                                  <option value="" <?php if($alm->__GET('subdireccion')==NULL){echo "selected";}else{echo "hidden";} ?>>Sin Asignar</option>

                                </select> 
                            </td>
                           <td >  
                                <input type="text" name="subdireccionNombre" class="form-control" value="<?php  echo $alm->__GET('subdireccionNombre');?>"> 
                            </td>
                            <td >  
                                <input type="text" name="subTelOfi" class="form-control" value="<?php echo $alm->__GET('subTelOfi'); ?>"> 
                            </td>
                            <td >  
                                <input type="text" name="subTelOfiExt" class="form-control" value="<?php echo $alm->__GET('subTelOfiExt'); ?>">  
                            </td>
                            
                            
                        </tr>
                        <tr>
                            
                            <th>Departamento</th>
                            <th>Dep-Nombre</th>
                            <th>Dep-Teléfono</th>
                            <th>Dep-Extención</th>
                            
                            
                        <tr>
                           <td >  
                               <select class="custom-select custom-select mb-3" name="departamento">
                                  <option value="" selected>Elige...</option>
                                  <option value="Subdirección Académica" <?php if($alm->__GET('departamento')==='Subdirección Académica'){echo "selected";}else{echo "";} ?>>Subdirección Académica</option>
                                  <option value="" <?php if($alm->__GET('departamento')==NULL){echo "selected";}else{echo "hidden";} ?>>Sin Asignar</option>

                                </select>
                            </td>
                           <td >  
                                <input type="text" name="departamentoNombre" class="form-control" value="<?php echo $alm->__GET('departamentoNombre'); ?>"> 
                            </td>
                            <td >  
                                <input type="text" name="depTelOfi" class="form-control" value="<?php echo $alm->__GET('depTelOfi'); ?>"> 
                            </td>
                            <td >  
                                <input type="text" name="depTelOfiExt" class="form-control" value="<?php echo $alm->__GET('depTelOfiExt'); ?>"> 
                            </td>
                            
                            
                        </tr>
                        <tr>
                            <th>CLE Coordinador(a)</th>
                            <th>Email</th>
                            <th>Email alternativo</th>
                            <th>Teléfono Oficina</th>
                        </tr>
                        <tr>
                            <td >   
                                <input type="text" name="cleCoordinador" class="form-control" value="<?php echo $alm->__GET('cleCoordinador'); ?>"> 
                            </td>
                            <td >  
                                <input type="text" name="emailCoordi" class="form-control" value="<?php echo $alm->__GET('emailCoordi'); ?>"> 
                            </td>
                            <td >  
                                <input type="text" name="emailCoordiAlter" class="form-control" value="<?php echo $alm->__GET('emailCoordiAlter'); ?>"> 
                            </td>
                            <td colspan="1">
                                <input type="text" name="coorTelOfi" class="form-control" value="<?php echo $alm->__GET('coorTelOfi'); ?>"> 
                            </td>
                        </tr>
                        <tr>
                            <th>Ext</th>
                            <th>Teléfono Celular</th>
                            <th></th>
                            <th>Función</th>
                        </tr>
                        <tr>
                            <td >   
                                <input type="text" name="coorTelOfiExt" class="form-control" value="<?php echo $alm->__GET('coorTelOfiExt'); ?>"> 
                            </td>
                            <td > 
                                <input type="text" name="coorTelCel" class="form-control" value="<?php echo $alm->__GET('coorTelCel'); ?>"> 
                            </td>
                            <td >  
                                
                            </td>
                            <td colspan="1">
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </td>
                        </tr>
                    </table>
                </form>
				</div>
            
            
                        </div>
           
        <div class="col-sm-12"style="font-size:16px;">
            
            <div>
                <br>
                <!--<input type="text" id="myInput" class="form-control" placeholder="Filtro...">-->
            </div>
				
				
             <div class=" ex3">  
			 
                <table class="table table-bordered table-dark table-sm"  id="myTable" >
				<?php foreach($model->Listar() as $r): ?>
                    <thead style="text-align:center; font-size:14px;">
					
                        <tr>
                            <th>Subdirección</th>
                            <th>Sub-Nombre</th>
                            <th>Sub-Teléfono</th>
                            <th>Sub-Extención</th>
                            


                        </tr>
                    </thead>
                    
                    <tbody id="tab-id" style="text-align:center;">
                        <tr>
                            <td><?php echo $r->__GET('subdireccion'); ?></td>
                            <td><?php echo $r->__GET('subdireccionNombre'); ?></td>
                            <td><?php echo $r->__GET('subTelOfi'); ?></td>
                            <td><?php echo $r->__GET('subTelOfiExt'); ?></td>
                            <td rowspan="4">
                                <a class="btn btn-success" href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                            </td>
                            
                        </tr>
                        <tr>
                            
                            <th>Departamento</th>
                            <th>Dep-Nombre</th>
                            <th>Dep-Teléfono</th>
                            <th>Dep-Extención</th>
                            
                            
                        <tr>
                            <tr>
                            
                            <td><?php echo $r->__GET('departamento'); ?></td>
                            <td><?php echo $r->__GET('departamentoNombre'); ?></td>
                            <td><?php echo $r->__GET('depTelOfi'); ?></td>
                            <td><?php echo $r->__GET('depTelOfiExt'); ?></td>
                            
                            
                        <tr>
                            <tr>
                            
                            <th>CLE Coordinador(a)</th>
                            <th>Email</th>
                            <th>Email alternativo</th>
                            <th>Teléfono Oficina</th>
                            
                            
                        <tr>
                            <tr>
                            
                            <td><?php echo $r->__GET('cleCoordinador'); ?></td>
                            <td><?php echo $r->__GET('emailCoordi'); ?></td>
                            <td><?php echo $r->__GET('emailCoordiAlter'); ?></td>
                            <td><?php echo $r->__GET('coorTelOfi'); ?></td>
                            
                            
                        <tr>
                            <tr>
                            <tr>
                            
                            <th>Ext</th>
                            <th>Teléfono Celular</th>
                            <th></th>
                            <th></th>
                            
                            
                        <tr>
                            <tr>
                            
                            <td><?php echo $r->__GET('coorTelOfiExt'); ?></td>
                            <td><?php echo $r->__GET('coorTelCel'); ?></td>
                            <td></td>
                            <td></td>
                            
                            
                        <tr>
                    </tbody>
                        
                    <?php endforeach; ?>
                </table>     
              </div>
           
        </div>
        </div>
    </div>
    
    
    
    
    
    
    

    
    
    
    
    
    

    
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