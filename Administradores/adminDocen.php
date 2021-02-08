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



require_once 'Docen.entidad.php';
require_once 'Docen.model.php';

// Logica
$alm = new Docen();
$model = new DocenModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('nombre',          $_REQUEST['nombre']);
			$alm->__SET('paterno',         $_REQUEST['paterno']);
			$alm->__SET('materno',         $_REQUEST['materno']);
            $alm->__SET('username',        $_REQUEST['username']);
            $alm->__SET('sexo',            $_REQUEST['sexo']);
            $alm->__SET('curp',            $_REQUEST['curp']);
            $alm->__SET('rfc',             $_REQUEST['rfc']);
			$alm->__SET('idmaestro',       $_REQUEST['idmaestro']);
            $alm->__SET('roll',            $_REQUEST['roll']);
            $alm->__SET('password',        $_REQUEST['password']);
            $alm->__SET('fnacimiento',     $_REQUEST['fnacimiento']);
            $alm->__SET('altaBaja',        $_REQUEST['altaBaja']);
            $alm->__SET('nivelAcademico',  $_REQUEST['nivelAcademico']);
            $alm->__SET('titulo',          $_REQUEST['titulo']);
            $alm->__SET('certificacion',   $_REQUEST['certificacion']);
			

			$model->Actualizar($alm);
			header('Location: adminDocen.php');
			break;
            
        case 'registrar':
			$alm->__SET('nombre',          $_REQUEST['nombre']);
			$alm->__SET('paterno',         $_REQUEST['paterno']);
			$alm->__SET('materno',         $_REQUEST['materno']);
            $alm->__SET('username',        $_REQUEST['username']);
            $alm->__SET('sexo',            $_REQUEST['sexo']);
            $alm->__SET('curp',            $_REQUEST['curp']);
            $alm->__SET('rfc',             $_REQUEST['rfc']);
			$alm->__SET('idmaestro',       $_REQUEST['idmaestro']);
            $alm->__SET('roll',            $_REQUEST['roll']);
            $alm->__SET('password',        password_hash($_REQUEST['username'], PASSWORD_DEFAULT));
			$alm->__SET('fnacimiento',     $_REQUEST['fnacimiento']);
            $alm->__SET('altaBaja',        $_REQUEST['altaBaja']);
            $alm->__SET('nivelAcademico',  $_REQUEST['nivelAcademico']);
            $alm->__SET('titulo',          $_REQUEST['titulo']);
            $alm->__SET('certificacion',   $_REQUEST['certificacion']);
            
			$model->Registrar($alm);
			header('Location: adminDocen.php');
			break;
            

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
    <title>Modificar / Registrar Docentes</title>
    
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
                            
                            <a href="adminDocen.php" class="btn btn-outline-light active" role="button" >Registrar / Modificar Docentes</a>
                            
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
                
                <p><b>Bienvenido: </b><?php echo "Lic. ".$r->__GET('nombre'); echo " ".$r->__GET('paterno'); echo " ".$r->__GET('materno'); ?> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre de usuario: </b><?php echo $_SESSION['username'];?></p>
                
                <?php endforeach; ?>
                <hr>
                 
            </div>
            <div class="col-sm-5 y"  ><div class="x">Instituto Tecnológico Superio de Loreto</div> <hr></div>
           
        <div class="col-sm-12" style="font-size:16px;">
   
              <div>  
                <form action="?action=<?php echo $alm->idmaestro > 0 ? 'actualizar' : 'registrar'; ?>" method="post" onsubmit="return confirm('Presiona OK para continuar.');">
                    
                    
                    
                    <input type="hidden" name="idmaestro" value="<?php echo $alm->__GET('idmaestro'); ?>" />
                    <input type="hidden" name="password" value="<?php echo $alm->__GET('password'); ?>" />
                    <input type="hidden" name="roll" value="<?php echo $alm->__GET('roll'); ?>" />
                    
                    <table class="table table-bordered table-dark"  >
                        <tr>
                            <th>Titulo</th>
                            <th>Nombre(s)</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            
                            
                            
                            
                        <tr>
                            <td >  
                               <select class="custom-select custom-select mb-3" name="titulo">
                                  <option value="" selected>Elige...</option>
                                  <option value="Lic." <?php if($alm->__GET('titulo')==='Lic.'){echo "selected";}else{echo "";} ?>>Lic.</option>
                                  <option value="Ing." <?php if($alm->__GET('titulo')==='Ing.'){echo "selected";}else{echo "";} ?>>Ing.</option>
                                   <option value="M" <?php if($alm->__GET('titulo')==='M.'){echo "selected";}else{echo "";} ?>>M.</option>
                                  <option value="" <?php if($alm->__GET('titulo')==NULL){echo "selected";}else{echo "hidden";} ?>>Sin Asignar</option>

                                </select>
                            </td>
                           <td >  
                                <input type="text" name="nombre" class="form-control" value="<?php echo $alm->__GET('nombre');?>"> 
                            </td>
                           <td >  
                                <input type="text" name="paterno" class="form-control" value="<?php  echo $alm->__GET('paterno');?>"> 
                            </td>
                            <td >  
                                <input type="text" name="materno" class="form-control" value="<?php echo $alm->__GET('materno'); ?>"> 
                            </td>
                            
                            
                            
                        </tr>
                        <tr>
                            <th>Nombre de usuario</th>
                            <th>Sexo</th>
                            <th>CURP (18 caracteres)</th>
                            <th>RFC (11 caracteres)</th>
                            
                            
                            
                        <tr>
                            <td >  
                                <input type="text" name="username" class="form-control" value="<?php echo $alm->__GET('username'); ?>">  
                            </td>
                           <td >  
                               <select class="custom-select custom-select mb-3" name="sexo">
                                  <option value="" selected>Elige...</option>
                                  <option value="H" <?php if($alm->__GET('sexo')==='H'){echo "selected";}else{echo "";} ?>>Hombre</option>
                                  <option value="M" <?php if($alm->__GET('sexo')==='M'){echo "selected";}else{echo "";} ?>>Mujer</option>
                                  <option value="" <?php if($alm->__GET('sexo')==NULL){echo "selected";}else{echo "hidden";} ?>>Sin Asignar</option>

                                </select>
                            </td>
                           <td >  
                                <input type="text" name="curp" class="form-control" value="<?php echo $alm->__GET('curp'); ?>"> 
                            </td>
                            <td >  
                                <input type="text" name="rfc" class="form-control" value="<?php echo $alm->__GET('rfc'); ?>"> 
                            </td>
                            
                            
                            
                        </tr>
                        <tr>
                            <th>Fecha de nacimiento (Año-mes-día)</th>
                            <th>Alta / Baja</th>
                            <th>Nivel Académico</th>
                            <th>Certificación</th>
                        </tr>
                        <tr>
                            <td >   
                                <input id="datepicker" width="276" name="fnacimiento" class="form-control">
                                    <script>
                                        $('#datepicker').datepicker({
                                            uiLibrary: 'bootstrap4',
                                            locale: 'es-es',
                                            format: 'yyyy/mm/dd'
                                        });
                                        $('#datepicker').val('<?php echo $alm->__GET('fnacimiento'); ?>');
                                    </script>
                            </td>
                            <td >  
                                <select class="custom-select custom-select mb-3" name="altaBaja">
                                  <option value="" selected>Elige...</option>
                                  <option value="Alta" <?php if($alm->__GET('altaBaja')==='Alta'){echo "selected";}else{echo "";} ?>>Alta</option>
                                  <option value="Baja" <?php if($alm->__GET('altaBaja')==='Baja'){echo "selected";}else{echo "";} ?>>Baja</option>
                                  <option value="" <?php if($alm->__GET('altaBaja')==NULL){echo "selected";}else{echo "hidden";} ?>>Sin Asignar</option>

                                </select>
                            </td>
                            <td >  
                                <input type="text" name="nivelAcademico" class="form-control" value="<?php echo $alm->__GET('nivelAcademico'); ?>"> 
                            </td>
                            <td >  
                                <select class="custom-select custom-select mb-3" name="certificacion">
                                  <option value="" selected>Elige...</option>
                                  <option value="TOEFL" <?php if($alm->__GET('certificacion')==='TOEFL'){echo "selected";}else{echo "";} ?>>TOEFL</option>
                                  <option value="BULLATS" <?php if($alm->__GET('certificacion')==='BULLATS'){echo "selected";}else{echo "";} ?>>BULLATS</option>
                                  <option value="IELTS" <?php if($alm->__GET('certificacion')==='IELTS'){echo "selected";}else{echo "";} ?>>IELTS</option>
                                  <option value="TKT MODULO 1" <?php if($alm->__GET('certificacion')==='TKT MODULO 1'){echo "selected";}else{echo "";} ?>>TKT MODULO 1</option>
                                  <option value="TKT MODULO 2" <?php if($alm->__GET('certificacion')==='TKT MODULO 2'){echo "selected";}else{echo "";} ?>>TKT MODULO 2</option>
                                  <option value="TKT MODULO 3" <?php if($alm->__GET('certificacion')==='TKT MODULO 3'){echo "selected";}else{echo "";} ?>>TKT MODULO 3</option>
                                  <option value="" <?php if($alm->__GET('certificacion')==NULL){echo "selected";}else{echo "hidden";} ?>>Sin Asignar</option>

                                </select>
                            </td>
                            
                        </tr>
                        
                        <tr>
                            
                            <td colspan="4"><a href="adminDocen.php" class="btn btn-danger">Limpiar campos</a> &nbsp;&nbsp;&nbsp;
                                Función Actualizar / Registrar &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Guardar cambios</button></td>
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
			 
                <table class="table table-bordered table-dark"  id="myTable" >
				
                    <thead style="text-align:center; font-size:14px;">
					
                        <tr>
                            <th>Nombre completo</th>
                            <th>Nombre de usuario</th>
                            <th>Alta / Baja</th>
                            <th>Maestro ID</th>
                            <th>Rol Asignado</th>
                            <th>Selector</th>
                            


                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                    <tbody id="tab-id" style="text-align:center;">
                        <tr>
                            <td><?php echo $r->__GET('titulo')." ".$r->__GET('nombre')." ".$r->__GET('paterno')." ".$r->__GET('materno'); ?></td>
                            <td><?php echo $r->__GET('username'); ?></td>
                            <td><?php echo $r->__GET('altaBaja'); ?></td>
                            <td><?php echo $r->__GET('idmaestro'); ?></td>
                            <td><?php  if(($r->__GET('roll')) == 1){echo "Administrador";}elseif(($r->__GET('roll')) == ""){echo "Sin Asignar";}elseif(($r->__GET('roll')) == 0){echo "Docente";}?></td>
                            <td>
                                <a class="btn btn-success" href="?action=editar&idmaestro=<?php echo $r->idmaestro; ?>">Editar</a>
                            </td>
                        </tr>
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