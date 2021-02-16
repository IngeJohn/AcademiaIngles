<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedinDo"]) || $_SESSION["loggedinDo"] !== true){
    header("location: IniciarSesionDo.php");
    exit;
}
 
// php populate html table from mysql database

 
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
    
    $nivel = $grupo = $carrera = $modalidad = $id = $periodo ="";
    
    if ($stmtg = $link->prepare("SELECT nivel, grupo, carrera, modalidad, periodo FROM gruposasignados WHERE idgrupo = '{$idg}'")) {
        
        $stmtg->execute();

        /* bind variables to prepared statement */
        $stmtg->bind_result($nivel, $grupo, $carrera, $modalidad, $periodo);

        /* fetch values */
        $stmtg->fetch();

        /* close statement */
        //$stmtm->close();
        
        
        
        if($nivel == ""){return "";}else{return $nivel." | ".$grupo." | ".$carrera." | ".$modalidad." | ".$periodo;}
    }

}
$inicio = $termino = "";

$unitem = $califi = $idparfe = $opor = "";

function calificaciones($numCon,$idg){
    
    global $link;
    
    global $unitem , $califi , $idparfe ;
    global $inicio , $termino ;
    $tu = 0;
    $prom = 0.0;
    $sum = 0.0;
    $op = '1aOp';
    
    if ($stmtg = $link->prepare("SELECT fechaInicio, fechaTermino FROM parcialfechas WHERE numeroParcial = 2")) {
        
        $stmtg->execute();

        /* bind variables to prepared statement */
        $stmtg->bind_result($inicio, $termino);

        /* fetch values */
        $stmtg->fetch();

        /* close statement */
        $stmtg->close();
        
        
        
            if ($stmt3 = $link->prepare("SELECT idparcialFechas FROM parcialfechas WHERE numeroParcial = 2")) {
                
                $stmt3->execute();

                /* bind variables to prepared statement */
                $stmt3->bind_result($idparfe);

                    /* fetch values */
                $stmt3->fetch();

                    /* close statement */
                    $stmt3->close();
                }
        
        
        
            if ($stmtk = $link->prepare("SELECT  calificacion, unidades, id, oportunidad FROM parciales WHERE idparcialFecha = '{$idparfe}' AND numeroControl = '{$numCon}'")) {
                
                $stmtk->execute();

                /* bind variables to prepared statement */
                $stmtk->bind_result($califi,$unitem, $id, $opor);

                    /* fetch values */
                $stmtk->fetch();

                    /* close statement */
                    $stmtk->close();
                
        }
            
    $query = "SELECT unidadTema, calificacion, oportunidad, fecha FROM calificaciones WHERE idgrupo = '$idg' AND numeroControl = '$numCon' AND 
        (fecha BETWEEN '$inicio' AND '$termino')";


        // resultNiv
        $result = mysqli_query($link, $query);


        if (!$result) {
            $message  = 'Invalid query: ' . mysqli_error() . "\n";
            $message .= 'Whole query: ' . $query;
            die($message);
        }
        if($result){ 

        $dataRow = "<tr>
                        <th>Unida #</th>
                        <th>Calificación</th>
                        <th>Tipo de Calificación</th>
                        <th>Fecha</th>
                    </tr>";

        while($row = mysqli_fetch_array($result)){
            
            $tu++;
            
            $sum = $sum + $row[1];

            $dataRow = $dataRow."<tr>
                                    <td>".$row[0]."</td>
                                    <td>".$row[1]."</td>
                                    <td>".$row[2]."</td>
                                    <td>".$row[3]."</td>"; 
        }


        // Close statement
        $result->close();
        
        if($tu !=0 ){$prom = round($sum / $tu,2);}
        
        if(isset($row[2])){
            
            if($row[2]=='2aOp'){$op = '2aOp';}
            
        }
        
    
        $dataRow = $dataRow."</tr>
                            <tr>
                                <th>Total Unidades</th>
                                <th>Promedio</th>
                                <th>Tipo de Calificación</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>$tu</td>
                                <td>$prom</td>
                                <td>$op</td>
                                <td></td>
                            </tr>
                            <input type='hidden' name='idparcialFecha' value='$idparfe' />
                            <input type='hidden' name='numeroControl' value='$numCon' />
                            <input type='hidden' name='idgrupo' value='$idg' />
                            <input type='hidden' name='calificacion' value='$prom' />
                            <input type='hidden' name='unidades' value='$tu' />
                            <input type='hidden' name='oportunidad' value='$op' />
                            <tr>
                                <th colspan='4' style='text-align:center;'>Registro en la Base de Datos:</th>
                            </tr>
                            <tr>
                                <th>Total Unidades</th>
                                <th>Promedio</th>
                                <th>Tipo de Calificación</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>$unitem</td>
                                <td>$califi</td>
                                <td>$opor</td>
                                <td></td>
                            </tr>";
            
            if($tu == 0){$dataRow = NULL;}
    
    return $dataRow;
        
        }
    }

}

//========================================================================================================


require_once 'utilities/parci.entidad.php';
require_once 'utilities/parci.model.php';

// Logica
$alm = new parci();
$model = new parciModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
            $alm->__SET('numeroControl',         $_REQUEST['numeroControl']);
            $alm->__SET('idgrupo',               $_REQUEST['idgrupo']);
            $alm->__SET('calificacion',          $_REQUEST['calificacion']);
            $alm->__SET('unidades',              $_REQUEST['unidades']);
            $alm->__SET('idparcialFecha',        $_REQUEST['idparcialFecha']);
            $alm->__SET('oportunidad',           $_REQUEST['oportunidad']);
            $alm->__SET('id',                    $_REQUEST['id']);
			

			$model->Actualizar($alm);
			header('Location: Parcial_2.php');
			break;
            
        case 'registrar':
            $alm->__SET('numeroControl',         $_REQUEST['numeroControl']);
            $alm->__SET('idgrupo',               $_REQUEST['idgrupo']);
            $alm->__SET('calificacion',          $_REQUEST['calificacion']);
            $alm->__SET('unidades',              $_REQUEST['unidades']);
            $alm->__SET('idparcialFecha',        $_REQUEST['idparcialFecha']);
            $alm->__SET('oportunidad',           $_REQUEST['oportunidad']);
			

			$model->Registrar($alm);
			header('Location: Parcial_2.php');
			break;
            

            

		case 'editar':
			$alm = $model->Obtener2($_REQUEST['numeroControl']);
			break;
            
        case 'editar2':
			$alm = $model->Obtener($_REQUEST['id']);
			break;
	}
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parcial 2</title>
    
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
            font-size:13px;
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
          height:250px;
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
                            
                            <a href="Parciales.php" class="btn btn-outline-light " role="button" >Parcial 1</a>
                            
                            <a href="Parcial_2.php" class="btn btn-outline-light active" role="button" >Parcial 2</a>
                            
                            <a href="Parcial_3.php" class="btn btn-outline-light " role="button" >Parcial 3</a>
                            
                            <a href="Parcial_4.php" class="btn btn-outline-light " role="button" >Parcial 4</a>
                            
                            <a href="Final.php" class="btn btn-outline-light " role="button" >Final</a>
                            
                            <a href="Docentes.php" class="btn btn-outline-light" role="button">Regresar</a>
                            
                            <a href="logoutDo.php" class="btn btn-outline-light" role="button">Cerrar Sesión</a>

                        </div>    
                    </div>
                
                
                


            </div>
        </div>
</header>

    <div class="container">
        <div class="row"> 
            <div class="col-sm-7" style="padding-top:20px; ">
                
                <?php foreach($model->Listar2() as $r): ?> 
                
                <p><b>Bienvenido: </b><?php echo $r->__GET('titulo')." ".$r->__GET('nombre')." ".$r->__GET('paterno')." ".$r->__GET('materno'); ?> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nombre de usuario: </b><?php echo $_SESSION['username'];?></p>
                
                <?php endforeach; ?>
                <hr>
                 
            </div>
            <div class="col-sm-5 y"  ><div class="x">Instituto Tecnológico Superior de Loreto</div> <hr></div>
           
        <div class="col-sm-7" >
   
              <div>  
                <form action="?action=<?php echo $alm->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" onsubmit="return confirm('Presiona OK para continuar.');">
                    
                            
                    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
                    
                    
                    

                    
                    <table class="table table-bordered table-dark table-sm"  >
                        <tr>
                            <th>Nombre Alumno</th>
                            <th>Número de Control</th>
                            <th colspan="2">Información del Grupo</th>
                            
                        </tr>   
                        <tr>
                           <td >  
                                <?php if($alm->__GET('numeroControl')==""){ }else{echo NombreAlumno($alm->__GET('numeroControl'));}?>
                            </td>
                           <td >  
                                <?php  echo $alm->__GET('numeroControl');?> 
                            </td>
                            <td colspan="2">  
                                <?php echo grupoID($alm->__GET('idgrupo')); ?>
                            </td>
                            
                            
                        </tr>
                        <tr>
                            <th colspan="4" style="text-align:center;">Unidades del Segundo Parcial</th>
                        </tr>
                        
                        <?php echo calificaciones($alm->__GET('numeroControl'),$alm->__GET('idgrupo'));  ?>
                        
                         <tr>
                            <td colspan="4" style="text-align:right;">
                                <a href="Parcial_2.php" class="btn btn-light btn-sm">Limpiar campos</a> &nbsp;&nbsp;&nbsp;
                                Función Actualizar / Registrar &nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary btn-sm">Guardar cambios</button>
                            </td>
                        </tr>
                    </table>
                </form>
				</div>
            
            
                        </div>
           
        <div class="col-sm-5">
            
            <div>
                <input type="text" id="myInput" class="form-control" placeholder="Falta calificar...">
            </div>
				
				
             <div class=" ex3">  
			 
                <table class="table table-bordered table-dark table-sm"  id="myTable" >
				
                    <thead style="text-align:center;">
					
                        <tr>
                            <th>Nombre completo</th>
                            <th>Información del Grupo</th>
                            <th>Selector</th>
                            


                        </tr>
                    </thead>
                    <?php foreach($model->Listar(2) as $r): ?>
                    <tbody id="tab-id" style="text-align:center;">
                        <tr>
                            <td><?php if($r->__GET('numeroControl')==""){ }else{echo NombreAlumno($r->__GET('numeroControl'));}?></td>
                            <td><?php echo grupoID($r->__GET('idgrupoActual')); ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" href="?action=editar&numeroControl=<?php echo $r->numeroControl; ?>">Editar</a>
                            </td>
                        </tr>
                    </tbody>
                        
                    <?php endforeach; ?>
                </table>     
              </div>
            <div>
                <input type="text" id="myInput2" class="form-control" placeholder="Parciales calificados...">
            </div>
				
				
             <div class=" ex3">  
			 
                <table class="table table-bordered table-dark table-sm"  id="myTable" >
				
                    <thead style="text-align:center; font-size:14px;">
					
                        <tr>
                            <th>Nombre</th>
                            <th>Calificacion Parcial #1</th>
                            <th>Selector</th>
                            


                        </tr>
                    </thead>
                    <?php foreach($model->Listar3(2) as $r): ?>
                    <tbody id="tab-id2" style="text-align:center;">
                        <tr>
                            <td><?php echo NombreAlumno($r->__GET('numeroControl'));?></td>
                            <td><?php echo $r->__GET('calificacion'); ?></td>
                            <td>
                                <a class="btn btn-success btn-sm" href="?action=editar2&id=<?php echo $r->id; ?>">Editar</a>
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
    
    
</body>
</html>