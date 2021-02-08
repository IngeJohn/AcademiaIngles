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

function maestroID($id){
    
    global $link;
    
    $titulo = $nombre = $paterno = $materno = "";
    
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

//=================================================================================================================================================================================


 
    // Close connection



//=========================================================================================================


require_once 'Grupos.entidad.php';
require_once 'Grupos.model.php';

// Logica
$alm = new Grupos();
$model = new GruposModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
            $alm->__SET('idgrupo',     $_REQUEST['idgrupo']);
			$alm->__SET('idmaestro',   $_REQUEST['idmaestro']);
            $alm->__SET('nivel',       $_REQUEST['nivel']);
            $alm->__SET('grupo',       $_REQUEST['grupo']);
            $alm->__SET('carrera',     $_REQUEST['carrera']);
            $alm->__SET('modalidad',   $_REQUEST['modalidad']);
            $alm->__SET('periodo',     $_REQUEST['periodo']);
			

			$model->Actualizar($alm);
			header('Location: asigGrupos.php');
			break;
            
        case 'registrar':
			$alm->__SET('idmaestro',  $_REQUEST['idmaestro']);
            $alm->__SET('nivel',      $_REQUEST['nivel']);
            $alm->__SET('grupo',      $_REQUEST['grupo']);
			$alm->__SET('carrera',    $_REQUEST['carrera']);
            $alm->__SET('modalidad',  $_REQUEST['modalidad']);
            $alm->__SET('periodo',    $periActuBD);
            
			$model->Registrar($alm);
			header('Location: asigGrupos.php');
			break;
            

		case 'editar':
			$alm = $model->Obtener($_REQUEST['idgrupo']);
			break;
	}
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar / Registrar Administradores</title>
    
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
          to {left: -450px;}
        }


        
    </style>
    

    

    
</head>
<body>
    <header>
          <div class="container-fluid">

            <div class="row">
                
                

                         
                    <div class="col-sm-12" style="text-align: center;">


                        <div class="btn-group" role="group">
                            
                            <a href="asigGrupos.php" class="btn btn-outline-light active" role="button" >Asignar Grupos</a>
                            
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
            <div class="col-sm-5 y"  ><div class="x">Instituto Tecnológico Superior de Loreto <span id="span"></span></div> <hr></div>
           
        <div class="col-sm-12" style="font-size:16px;">
   
              <div>  
                <form action="?action=<?php echo $alm->idgrupo > 0 ? 'actualizar' : 'registrar'; ?>" method="post" onsubmit="return confirm('Presiona OK para continuar.');">
                    
                    
                    
                    <input type="hidden" name="idgrupo" value="<?php echo $alm->__GET('idgrupo'); ?>" />
                    <input type="hidden" name="periodo" value="<?php echo $alm->__GET('periodo'); ?>" />
                    
                    <table class="table table-bordered table-dark"  >
                        <tr>
                            <th>Nivel</th>
                            <th>Grupo</th>
                            <th>Carrera</th>
                            <th>Modalidad</th>
                            
                            
                            
                        <tr>
                           <td >  
                                <select class="custom-select custom-select mb-3" name="nivel">
                                  <option value="" selected>Elige...</option>
                                  <option value="1" <?php if($alm->__GET('nivel')==1){echo "selected";}else{echo "";} ?>>1</option>
                                  <option value="2" <?php if($alm->__GET('nivel')==2){echo "selected";}else{echo "";} ?>>2</option>
                                  <option value="3" <?php if($alm->__GET('nivel')==3){echo "selected";}else{echo "";} ?>>3</option>
                                  <option value="4" <?php if($alm->__GET('nivel')==4){echo "selected";}else{echo "";} ?>>4</option>
                                  <option value="5" <?php if($alm->__GET('nivel')==5){echo "selected";}else{echo "";} ?>>5</option>
                                  <option value="6" <?php if($alm->__GET('nivel')==6){echo "selected";}else{echo "";} ?>>6</option>

                                </select>
                            </td>
                           <td >  
                                <select class="custom-select custom-select mb-3" name="grupo">
                                  <option value="" selected>Elige...</option>
                                  <option value="A" <?php if($alm->__GET('grupo')=='A'){echo "selected";}else{echo "";} ?>>A</option>
                                  <option value="B" <?php if($alm->__GET('grupo')=='B'){echo "selected";}else{echo "";} ?>>B</option>
                                  <option value="C" <?php if($alm->__GET('grupo')=='C'){echo "selected";}else{echo "";} ?>>C</option>
                                  <option value="D" <?php if($alm->__GET('grupo')=='D'){echo "selected";}else{echo "";} ?>>D</option>
                                  <option value="E" <?php if($alm->__GET('grupo')=='E'){echo "selected";}else{echo "";} ?>>E</option>
                                  <option value="F" <?php if($alm->__GET('grupo')=='F'){echo "selected";}else{echo "";} ?>>F</option>

                                </select>
                            </td>
                            <td >  
                                <select class="custom-select custom-select mb-3" name="carrera">
                                  <option value="" selected>Elige...</option>
                                  <option value="Sistemas Computacionales" <?php if($alm->__GET('carrera')=='Sistemas Computacionales'){echo "selected";}else{echo "";} ?>>Sistemas Computacionales</option>
                                  <option value="Gestión Empresarial" <?php if($alm->__GET('carrera')=='Gestión Empresarial'){echo "selected";}else{echo "";} ?>>Gestión Empresarial</option>
                                  <option value="Industrial" <?php if($alm->__GET('carrera')=='Industrial'){echo "selected";}else{echo "";} ?>>Industrial</option>
                                  <option value="Mecatrónica" <?php if($alm->__GET('carrera')=='Mecatrónica'){echo "selected";}else{echo "";} ?>>Mecatrónica</option>
                                </select>
                            </td>
                            <td >  
                                <select class="custom-select custom-select mb-3" name="modalidad">
                                  <option value="" selected>Elige...</option>
                                  <option value="Escolarizado" <?php if($alm->__GET('modalidad')=='Escolarizado'){echo "selected";}else{echo "";} ?>>Escolarizado</option>
                                  <option value="Sabatino" <?php if($alm->__GET('modalidad')=='Sabatino'){echo "selected";}else{echo "";} ?>>Sabatino</option>
                                  <option value="Verano" <?php if($alm->__GET('modalidad')=='Verano'){echo "selected";}else{echo "";} ?>>Verano</option>
                        
                                </select>
                            </td>
                            
                            
                        </tr>
                        <tr>
                            
                            <th>Periodo</th>
                            
                            <th>Maestro ID</th>
                            
                            <th>Nombre del Maestro</th>

                            <th>Función Actualizar / Registrar</th>
                            
                            
                        <tr>
                           <td >  
                               <?php echo $alm->__GET('periodo'); ?>
                            </td>
                            <td >  
                                <?php echo $alm->__GET('idmaestro'); ?>
                            </td>
                           <td >    
                               <select class="custom-select custom-select mb-3" name="idmaestro">
                                  <option value="" selected>Elige...</option>
                                   <?php foreach($model->Listar3() as $r): ?>
                                  <option value="<?php echo $r->__GET('idmaestro'); ?>" <?php if($r->__GET('idmaestro')==$alm->__GET('idmaestro')){echo "selected";}else{echo "";} ?>><?php echo maestroID($r->__GET('idmaestro')); ?></option>
                                  <?php endforeach; ?>
                                </select>
                                
                            </td>
                            
                            <td colspan="1">
                                <a href="asigGrupos.php" class="btn btn-danger">Limpiar campos</a>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </td>
                            
                            
                        </tr>
                    </table>
                </form>
				</div>
            
            
                        </div>
           
        <div class="col-sm-12"style="font-size:16px;">
            
            <div>
                <input type="text" id="myInput" class="form-control" placeholder="Filtro Grupos periodo: <?php echo $periActuBD; ?>...">
            </div>
				
				
             <div class=" ex3">  
			 
                <table class="table table-bordered table-dark"  id="myTable" >
				
                    <thead style="text-align:center; font-size:14px;">
					
                        <tr>
                            <th>Grupo</th>
                            <th>Nombre del Maestro</th>
                            <th>Docente ID</th>
                            <th>Selector</th>
                            


                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                    <tbody id="tab-id" style="text-align:center;">
                        <tr>
                            <td><?php echo $r->__GET('nivel').$r->__GET('grupo').", ".$r->__GET('carrera').", ".$r->__GET('modalidad').", ".$r->__GET('periodo'); ?></td>
                            <td><?php if($r->__GET('idmaestro')==NULL){echo "";}else{echo maestroID($r->__GET('idmaestro'));}  ?></td>
                            <td><?php echo $r->__GET('idmaestro'); ?></td>
                            <td>
                                <a class="btn btn-success" href="?action=editar&idgrupo=<?php echo $r->idgrupo; ?>">Editar</a>
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
        <script>

            $(document).ready(function(){
                $("#myInput2").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#tab-id2 tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                    });
                });
            });
        
        </script>
    
    <script>
        var span = document.getElementById('span');

        function time() {
          var midday = "AM";
          var d = new Date();
          var s = d.getSeconds();
          var m = d.getMinutes();
          var h = d.getHours();
            
          midday = (h >= 12) ? "PM" : "AM";
            
          h = (h == 0) ? 12 : ((h > 12) ? (h - 12): h);
            
          span.textContent = h + " : " + m + " : " + s + " " + midday;
        }

        setInterval(time, 1000);
    </script>
    
</body>
</html>