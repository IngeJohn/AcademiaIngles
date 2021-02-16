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

require_once "../Require/config.php";


function nombreAdmin($id){
    
    global $link;
    
    $nombre = $paterno = $materno = $titulo = "";
    
    if ($stmtm = $link->prepare("SELECT titulo, nombre, paterno, materno FROM docentes WHERE idmaestro = '{$id}'")) {
        
        $stmtm->execute();

        /* bind variables to prepared statement */
        $stmtm->bind_result($titulo, $nombre, $paterno, $materno);

        /* fetch values */
        $stmtm->fetch();

        /* close statement */
        //$stmtm->close();
        
        echo $titulo." ".$nombre." ".$paterno." ".$materno;
    }

}





//==========================================================================================================


require_once 'utilities/Historial.entidad.php';
require_once 'utilities/Historial.model.php';

// Logica
$alm = new Historial();
$model = new HistorialModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{

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
    <title>Historial Estadística</title>
    
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
    


    
    <script type="text/javascript" src="../direcciones/localidadesReins.js"></script>

    
    
    
    
            
    
    <link rel="icon" href="../imagenes/itsl2.png">
    
    
    
    
    
    
    
    <style type="text/css">
        body  { 
			  
			  background-color: gray;
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
        .centrado{
            text-align:center;
        }
        div.ex3 {
          background-color: white;
          width: 100%;
          height:200px;
          overflow: auto;
        }

        
    </style>
</head>
<body>
    <header>
          <div class="container-fluid">

            <div class="row">

                
                
                
                
               
                    
                    <div class="col-sm-12" style="text-align: center;">


                        <div class="btn-group" role="group">
                            
                            <a href="Administrador.php" class="btn btn-outline-light" role="button" >Página Principal Administradores</a>
                            
                            <a href="AdministradorEstadistica.php" class="btn btn-outline-light" role="button" >Estadística</a>
                            
                            <a href="AdministradorEstadisticaH.php" class="btn btn-outline-light active" role="button" >Historial Estadística</a>
                            
                            <a href="logoutAd.php" class="btn btn-outline-light" role="button">Cerrar sesión</a>

                        </div>    
                    </div>
                
                
                


            </div>
        </div>
</header>
    

    
    
    <div class="container" style="background-color:white;">
        <div class="row">
            
            
            <div class="col-sm-12"style="font-size:16px;">
            
            <div>
                <input type="text" id="myInput" class="form-control" placeholder="Filtrar Tabla Hitorial Estadísticos...">
            </div>
				
				
             <div class=" ex3">  
			 
                <table class="table table-bordered table-dark table-sm"  id="myTable" >
				
                    <thead style="text-align:center; font-size:14px;">
					
                        <tr>
                            <th>Registro ID</th>
                            <th>Periodo</th>
                            <th>Registro generado por:</th>
                            <th>Fecha</th>
                            <th>Seleccionar</th>
                            


                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                    <tbody id="tab-id" style="text-align:center;">
                        <tr>
                            <td><?php echo $r->__GET('id'); ?></td>
                            <td><?php echo $r->__GET('periodo'); ?></td>
                            <td><?php echo nombreAdmin($r->__GET('idmaestro')); ?></td>
                            <td><?php echo $r->__GET('fecha'); ?></td>
                            <td>
                                <a class="btn btn-success  btn-sm" href="?action=editar&id=<?php echo $r->id; ?>">Seleccionar</a>
                            </td>
                        </tr>
                    </tbody>
                        
                    <?php endforeach; ?>
                </table>     
              </div>
           
        </div>
            
            
            
            
            
            <div class="col-sm-12" style="font-size:16px;">
   
              <div>  
                    
                    
                    
                    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
<br>
                    
                    <table class="table table-bordered table-dark table-sm"  >
                        <tr>
                            <th style="width:70%;">Comentario</th>
                            <th>Periodo</th>
                            
                            
                        <tr>
                            <td rowspan="3" colspan="1">  
                                 <textarea class="form-control" rows="5" id="comentario" name="comentario" placeholder="Comentario" disabled><?php  echo $alm->__GET('comentario');?></textarea>
                            </td>
                            <td >  
                                <input type="text" name="periodo" class="form-control" value="<?php echo $alm->__GET('periodo'); ?>" disabled>  
                            </td>
                           

                        </tr>
                        <tr>
                            <th>Fecha</th>
                        </tr>
                        <tr>
                            <td >  
                                <input type="text" name="fecha" class="form-control" value="<?php echo $alm->__GET('fecha');?>" disabled> 
                            </td>
                        </tr>
                       
                         
                    </table>
               
				</div>
            
            
            </div>
            <div class="col-sm-12">
                <br>
                <h2>ID No. <?php echo $alm->__GET('id');?> -  Datos Estadísticos | Periodo: <?php echo $alm->__GET('periodo')." | Fecha: ".$alm->__GET('fecha'); ?></h2>
                <hr>

            </div>
            
            <?php echo $alm->__GET('estadistico');?>
            
            
            
            
            
            
            
            
            
            
                
        
                
          </div>  
            
</div>
    
    
    
    

    
    <div class="container-fluid" style="padding-top:10px;">
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