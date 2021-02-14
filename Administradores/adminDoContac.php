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
    
}
//================================================================================================================================================





function maestroID($id){
    
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



require_once 'Docen.entidad.php';
require_once 'Docen.model.php';

// Logica
$alm = new Docen();
$model = new DocenModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
       

		case 'editar':
			$alm = $model->Obtener($_REQUEST['idmaestro']);
			break;
	}
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Información de Contacto Alumnos</title>
    
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
          height:700px;
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
                            
                            <a href="adminAlumnContac.php" class="btn btn-outline-light active" role="button" >Información de Contacto Alumnos</a>
                            
                            <a href="Administrador.php" class="btn btn-outline-light" role="button">Regresar</a>
                            
                            <a href="logoutAd.php" class="btn btn-outline-light" role="button">Cerrar Sesión</a>

                        </div>    
                    </div>
                
                
                


            </div>
        </div>
</header>

    <div class="container">
        <div class="row"> 
            <div class="col-sm-7" style="padding-top:20px; font-size:16px;">
                
                <?php foreach($model->Listar2() as $r): ?> 
                
                <p><b>Bienvenido: </b><?php echo $r->__GET('titulo')." ".$r->__GET('nombre')." ".$r->__GET('paterno')." ".$r->__GET('materno'); ?> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre de usuario: </b><?php echo $_SESSION['username'];?></p>
                
                <?php endforeach; ?>
                <hr>
                 
            </div>
            
        <div class="col-sm-5 y"  >
            <div class="x">Instituto Tecnológico Superior de Loreto</div> <hr>
        </div>
           
       
            
            
            
        <div class="col-sm-7" style="font-size:16px;">
   
              <div>  
                  <p>Información del Docente</p>
                    
                    
                    
                    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
                  
                  <table class="table table-sm">
                        <tr>
                          <th>Nombre: </th>
                          <td>
                              
                              <?php echo $alm->__GET('titulo')." ".$alm->__GET('nombre')." ".$alm->__GET('paterno')." ".$alm->__GET('materno');?>
                            
                            </td>
                        </tr>
                      
                      
                        <tr>
                          <th>Docente ID: </th>
                          <td>
                              
                              <?php echo $alm->__GET('idmaestro');?> 
                            
                            </td>
                        </tr>
                      
                      
                      
                      <tr>
                        <th>Fecha de nacimiento: </th>
                          <td>
                          
                              <?php echo $alm->__GET('fnacimiento');?>
                          
                          </td>
                      </tr>
                      
                      
                      <tr>
                        <th>Sexo: </th>
                          <td>
                          
                              <?php echo $alm->__GET('sexo');?>
                          
                          </td>
                      </tr>
                      
                      
                      
                      <tr>
                        <th>CURP: </th>
                          <td>
                          
                              <?php echo $alm->__GET('curp');?>
                          
                          </td>
                      </tr>
                      
                      
                      <tr>
                        <th>RFC: </th>
                          <td>
                          
                              <?php echo $alm->__GET('rfc');?>
                          
                          </td>
                      </tr>
                      
                      
                      
                      <tr>
                        <th>Dirección: </th>
                          <td>
                          
                              <?php echo $alm->__GET('direccion');?>
                          
                          </td>
                      </tr>
                      
                      
                      
                      <tr>
                        <th>Estado: </th>
                          <td>
                          
                              <?php echo $alm->__GET('estado');?>
                          
                          </td>
                      </tr>
                      
                      
                      
                      <tr>
                        <th>Municipio</th>
                          <td>
                          
                              <?php echo $alm->__GET('municipio');?>
                          
                          </td>
                      </tr>
                      
                      
                      <tr>
                        <th>Localidad</th>
                          <td>
                          
                              <?php echo $alm->__GET('localidad');?>
                          
                          </td>
                      </tr>
                      
                      
                      <tr>
                        <th>Código Postal</th>
                          <td>
                          
                              <?php echo $alm->__GET('postal');?>
                          
                          </td>
                      </tr>
                      
                      
                      <tr>
                        <th>Teléfono</th>
                          <td>
                          
                              <?php echo $alm->__GET('telefono');?>
                          
                          </td>
                      </tr>
                      
                      
                      <tr>
                        <th>Correo Electronico</th>
                          <td>
                          
                              <?php echo $alm->__GET('email');?>
                          
                          </td>
                      </tr>
                      
                      <tr>
                        <th>Certificación</th>
                          <td>
                          
                              <?php echo $alm->__GET('certificacion');?>
                          
                          </td>
                      </tr>
                      
                      <tr>
                        <th>Nivel Académico</th>
                          <td>
                          
                              <?php echo $alm->__GET('nivelAcademico');?>
                          
                          </td>
                      </tr>
                      
                      <tr>
                        <th>Fecha de Ingreso</th>
                          <td>
                          
                              <?php echo $alm->__GET('fecha');?>
                          
                          </td>
                      </tr>
                      
                      <tr>
                        <th>Alta / Baja</th>
                          <td>
                          
                              <?php echo $alm->__GET('altaBaja');?>
                          
                          </td>
                      </tr>
                      
                      
                      
                    </table>
                  
                  
                  
                  
                

                    
                   
                 
                          
            </div>
            
            
        </div>
            
            
            
            
            
            
           
        <div class="col-sm-5"style="font-size:16px;">
            
            <div>
                <input type="text" id="myInput" class="form-control" placeholder="Filtro...">
            </div>
				
				
             <div class=" ex3">  
			 
                <table class="table table-bordered table-dark table-sm"  id="myTable" >
				
                    <thead style="text-align:center; font-size:14px;">
					
                        <tr>
                            <th>Nombre completo</th>
                            <th>Docente ID</th>
                            <th>Selector</th>
                            


                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                    <tbody id="tab-id" style="text-align:center;">
                        <tr>
                            <td><?php echo $r->__GET('nombre')." ".$r->__GET('paterno')." ".$r->__GET('materno'); ?></td>
                            <td><?php echo $r->__GET('idmaestro'); ?></td>
                            <td>
                                <a class="btn btn-success" href="?action=editar&idmaestro=<?php echo $r->idmaestro; ?>">Elejir</a>
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