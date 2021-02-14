<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedinA"]) && $_SESSION["loggedinA"] === true){
   
}else{
    header("location: ../Alumnos/logoutAl.php");
}
// Include config file
require_once "../Require/config.php";

date_default_timezone_set('America/Mexico_City');

    $peri = "";  
    $per = "";  
    $mes = date("n"); 
    $year = date("Y"); 

if ($mes >= 1 && $mes <= 6){
    $per = 1;
    $peri = "Periodo: ".$per."-".$year;
}else if($mes >= 8 && $mes <= 12){
    $per = 2;
    $peri = "Periodo: ".$per."-".$year;
    
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

//echo $periodoActu." ".$periActuBD;

if( $periActuBD !== $periodoActu ){
    
    $sql2 = "UPDATE periodoactual SET periodo ='$periodoActu', periodoAnterior ='$periActuBD';";
    
    if($stmt4 = mysqli_prepare($link, $sql2)){
        $stmt4->execute();
    }
    //echo("<p><script>alert('¡Periodo actualizado!');</script></p>");
}




//==============================================================================================================================================
function grupoInformacion($id){
    
    global $link;
    
    $nivel = $grupo = $carrera = $modalidad = $periodo = $idmaestro = "";
    
    if ($stmt8 = $link->prepare("SELECT nivel, grupo, carrera, modalidad, periodo, idmaestro FROM gruposasignados WHERE idgrupo = '{$id}'")) {
        
        $stmt8->execute();

        /* bind variables to prepared statement */
        $stmt8->bind_result($nivel , $grupo , $carrera , $modalidad , $periodo , $idmaestro);

        /* fetch values */
        $stmt8->fetch();

        /* close statement */
        $stmt8->close();
        
        return $nivel." ".$grupo." | ".$carrera." | ".$modalidad." | ".$periodo;
    }


}



//==============================================================================================================================================

$numeroControl = $curp = $nombre = $paterno = $materno = $sexo = $direccion = $altasBajas = $municipio = $localidad = $postal = $email = $telefono = $nivel = $idmaestro = $estado = $modalidad = $numeroNivel = " ";

// Define variables and initialize with empty values
$new_password = $confirm_password = $old_password = "";
$new_password_err = $confirm_password_err = $old_password_err = "";

// Prepare a select statement, checks for the las level.
        $sql = "SELECT id, numeroControl, curp, nombre, paterno, materno, sexo, direccion, estado, municipio, localidad, postal, email, telefono FROM alumnos WHERE numeroControl = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_numeroControl);
            
            // Set parameters
            $param_numeroControl = $_SESSION["numeroControl"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if data exists
                if(mysqli_stmt_num_rows($stmt) == 1){ 
                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $numeroControl, $curp, $nombre, $paterno, $materno, $sexo, $direccion, $estado, $municipio, $localidad, $postal, $email, $telefono);
                    if(mysqli_stmt_fetch($stmt)){
                         
                        
                        //echo "si entro\n";
                        } 
                    }else {
                          // echo "no se encontro nada";
                      }
                } 
            } else{
                echo "Oops! Algo salio mal. Por favor intenta más tarde.";
            }
        
        
        // Close statement
        mysqli_stmt_close($stmt);

$query = "SELECT promedio, estado, inscripcionPagoEstado, libroPagoEstado, idgrupo, promedio2 FROM niveles WHERE numeroControl = {$_SESSION["numeroControl"]}";


// resultNiv
$result = mysqli_query($link, $query);


if (!$result) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

$promedios = 0.0;

$dataRow = "";

$grupoInf = "";

while($row1 = mysqli_fetch_array($result)){
    
    if($row1[5] != "" && $row1[5] != 0){
        
        $promedios = $row1[5];
        
    }else{
        
        $promedios = $row1[0];
        
    }
    
    
    
    $grupoInf = grupoInformacion($row1[4]);
    
    $dataRow = $dataRow."<tr><td>$grupoInf</td><td>$promedios</td><td>$row1[1]</td><td>$row1[2]</td><td>$row1[3]</td><tr>"; 
}


// Close statement
$result->close();

//=================================================================================================================================================================



$numeroNivel = $estadoNivele = $periodoNivel = "";
$idgrupo = $nivel = $grupo = $carrera = $modalidad = $periodo = $idmaestro = "";

if ($stmt2 = $link->prepare("SELECT idgrupo, estado FROM niveles WHERE numeroControl = '{$_SESSION["numeroControl"]}' ORDER BY id DESC LIMIT 1;")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($idgrupo,$estadoDelNivel);

    /* fetch values */
$stmt2->fetch();



    /* close statement */
    $stmt2->close();
}
/* close connection */



if ($stmt7 = $link->prepare("SELECT nivel, grupo, carrera, modalidad, periodo, idmaestro FROM gruposasignados WHERE idgrupo = '{$idgrupo}' ORDER BY idgrupo DESC LIMIT 1;")) {
    $stmt7->execute();

    /* bind variables to prepared statement */
    $stmt7->bind_result($nivel, $grupo, $carrera, $modalidad, $periodo, $idmaestro);

    /* fetch values */
$stmt7->fetch();



    /* close statement */
    $stmt7->close();
}
/* close connection */



//==================================================================================================================================================================
$idmaestroSiguienteNivel = "";

$nivelMasUno = $nivel+1;



if($estadoDelNivel == "En curso"){
    
    $siguienteNivel = $nivel;
    
}else{
    
   $siguienteNivel = $nivel+1;
    
}


if ($stmtid = $link->prepare("SELECT idmaestro, idgrupo FROM gruposasignados WHERE grupo = '{$grupo}' AND nivel = '{$siguienteNivel}' AND carrera = '{$carrera}' AND modalidad = '{$modalidad}' AND periodo = '{$periActuBD}';")) {
    
    $stmtid->execute();

    /* bind variables to prepared statement */
    $stmtid->bind_result($idmaestroSiguienteNivel, $idgrupoSiguienteNivel);

    /* fetch values */
$stmtid->fetch();




    /* close statement */
    $stmtid->close();
}






//=========================================================================================================================================

function maestroID($id){
    try{
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

                return $titulo." ".$nombre." ".$paterno." ".$materno;
            }
        
        
    }catch(Exception $e)
		{
			die($e->getMessage());
		}


}



//=================================================================================================================================================================

$mensaje = "";
$color1 = "white";
$accion = "disabled";
$nombreMaestro = maestroID($idmaestroSiguienteNivel);

//========  Pruebas ==================





//========  Termina Pruebas ==================



if($nivel == NULL){
    
    $mensaje = "No se encontro información en el sistema.";
    $color1 = "black";
    $accion = "disabled";
    
}elseif($nivel == 6 && $estado == "Acreditado"){
    
    $mensaje = "Has acreditado todos los niveles.";
    $color1 = "black";
    $accion = "disabled";
    
}elseif($nivel != NULL && $periodo == $periActuBD && $estadoDelNivel == "En curso"){
    
    $mensaje = "Te has inscrito exitosamente en el curso de Inglés nivel #$nivel | Grupo $grupo | Carrera $carrera | Modalidad $modalidad
                <br>Tu Maestro(a) es $nombreMaestro";
    $color1 = "lightgreen";
    $accion = "disabled";
    
}elseif($nivel != NULL && $nivel % 2 != 0 && $per == 1 && $estadoDelNivel == "Acreditado"){
    
    $mensaje = "Puedes inscribirte en el curso de Inglés nivel #$nivelMasUno | Grupo $grupo | Carrera $carrera | Modalidad $modalidad
                <br>Tu Maestro(a) será $nombreMaestro";
    $color1 = "lightgreen";
    $accion = "";
    
}elseif($nivel != NULL && $nivel % 2 != 0 && $per == 1 && $estadoDelNivel == "No acreditado"){
    
    $mensaje = "No podrás inscribirte en el curso de Inglés nivel #$nivelMasUno | Grupo $grupo | Carrera $carrera | Modalidad $modalidad | 
                <br>ya que tu calificación del nivel #$nivel no fue satisfactoria y <br>deberás repetirlo en el siguiente periodo ya que en este no se oferta.<br>Nota: Es posible que se abra un grupo especial para alumnos atrasados. Consulta con tu coordinador(a).";
    $color1 = "red";
    $accion = "disabled";
    
}elseif($nivel != NULL && $nivel % 2 == 0 && $per == 1 && $estadoDelNivel == "No acreditado"){
    
    $mensaje = "Puedes inscribirte en el curso de Inglés nivel #$nivel, pero deberás solicitar la asistencia un administrador por cuestiones de disponibilidad.";
    $color1 = "orange";
    $accion = "disabled";
    
}elseif($nivel != NULL && $nivel % 2 == 0 && $per == 2 && $estadoDelNivel == "Acreditado"){
    
    $mensaje = "Puedes inscribirte en el curso de Inglés nivel #$nivelMasUno | Grupo $grupo | Carrera $carrera | Modalidad $modalidad
                <br>Tu Maestro(a) será $nombreMaestro";
    $color1 = "lightgreen";
    $accion = "";
}elseif($nivel != NULL && $nivel % 2 != 0 && $per == 2 && $estadoDelNivel == "Acreditado"){
    
    $mensaje = "No podras inscribirte en el curso de Inglés nivel #$nivelMasUno ya que no se oferta en este periodo.<br>Nota: Es posible que se abra un grupo especial para alumnos atrasados. Consulta con tu coordinador(a).";
    $color1 = "orange";
    $accion = "";
}elseif($nivel != NULL && $nivel % 2 == 0 && $per == 1 && $estadoDelNivel == "Acreditado"){
    
    $mensaje = "No podras inscribirte en el curso de Inglés nivel #$nivelMasUno ya que no se oferta en este periodo.<br>Nota: Es posible que se abra un grupo especial para alumnos atrasados. Consulta con tu coordinador(a).";
    $color1 = "orange";
    $accion = "";
}elseif($nivel != NULL && $numeroNivel == 6 && $per == 2 && $estadoDelNivel == "No acreditado"){
    
    $mensaje = "Tu calificación del nivel #$nivel no fue satisfactoria y <br>deberás repetirlo en el siguiente periodo ya que en este no se oferta.";
    $color1 = "red";
    $accion = "disabled";
    
}elseif($nivel != NULL && $nivel % 2 == 0 && $per == 2 && $estadoDelNivel == "No acreditado"){
    
    $mensaje = "No podrás inscribirte en el curso de Inglés nivel #$nivelMasUno | Grupo $grupo | Carrera $carrera | Modalidad $modalidad | 
                <br>ya que tu calificación del nivel #$nivel no fue satisfactoria y <br>deberás repetirlo en el siguiente periodo ya que en este no se oferta.";
    $color1 = "red";
    $accion = "disabled";
    
}
elseif($nivel != NULL && $nivel % 2 != 0 && $per == 2 && $estadoDelNivel == "No acreditado"){
    
    $mensaje = "Puedes inscribirte en el curso de Inglés nivel #$nivel, pero deberás solicitar la asistencia un administrador por cuestiones de disponibilidad.";
    $color1 = "orange";
    $accion = "disabled";
    
}

//==========================================================================================================================================
//Si el nivel existe no permitira esta acción, de lo contrario insertara la información en la base de datos.


$tipoProgramaBeca = $tipoProgramaBeca_err = "";

if(isset($_POST['reinscrip'])){  

            //_________________
    
    if(empty(trim($_POST["tipoProgramaBeca"]))){
        $tipoProgramaBeca_err = "Selecciona una opción.";
    } else{
         $tipoProgramaBeca = trim($_POST["tipoProgramaBeca"]);
            } 
        //_________________
  
    
    
    $sql1 =  "INSERT INTO niveles (numeroControl,idgrupo,estado,tipoProgramaBeca) VALUES ('".$_SESSION['numeroControl']."','".$idgrupoSiguienteNivel."','En curso','".$tipoProgramaBeca."')";
    
    if($stmt5 = mysqli_prepare($link, $sql1)){

        if(mysqli_stmt_execute($stmt5)){
            
             $sql1 = "UPDATE alumnos SET idgrupoActual ='{$idgrupoSiguienteNivel}' WHERE numeroControl = {$_SESSION["numeroControl"]}";
            
            if($stmt6 = mysqli_prepare($link, $sql1)){

                if(mysqli_stmt_execute($stmt6)){
                    
                    echo("<p><script>alert('¡Te has inscrito exitosamente!');location.replace('reinscripcionAlumn.php')</script></p>");
                    
                }
            }
            
        }
    }
    
    
}




//=======================================================================================================

    
if(isset($_POST['boton2'])){
    
    // Validate old password
    if(empty(trim($_POST["old_password"]))){
        $old_password_err = "Inroduce tu contraseña actual.";     
    } elseif(strlen(trim($_POST["old_password"])) < 6){
        $old_password_err = "La contraseña debe ser de 6 digitos.";
    } else{
        $old_password = trim($_POST["old_password"]);
        if(password_verify($old_password,$_SESSION["contraseña"])){
            
    }else{
            $old_password_err = "La contraseña que ingresaste no coincide con tu contraseña actual.";
        }}
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Inroduce una nueva contraseña.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "La contraseña debe ser de 6 digitos.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirma la contraseña.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "La contraseña no coincide.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE alumnos SET contrase = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                header("location: reinscripcionAlumn.php");
                exit();
            } else{
                echo "Uups! Algo salio mal, intenta más tarde.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}

//=========================================================================================================




//=========================================================================================================
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new Alumno();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('id',              $_REQUEST['id']);
            $alm->__SET('direccion',       $_REQUEST['direccion']);
            $alm->__SET('estado',       $_REQUEST['estado']);
            $alm->__SET('municipio',       $_REQUEST['municipio']);
            $alm->__SET('localidad',       $_REQUEST['localidad']);
            $alm->__SET('postal',       $_REQUEST['postal']);
            $alm->__SET('telefono',        $_REQUEST['telefono']);
            $alm->__SET('email',           $_REQUEST['email']);

			$model->Actualizar($alm);
			header('Location: reinscripcionAlumn.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_SESSION['numeroControl']);
			break;
	}
}

?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Reinscripción Alumnos</title>
        
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
            		body{
            background-color: white;
            
            }
        .logo{
            width: 50%;
            height: auto;
            padding-top: 30px;
        }
            header {
                  background-color: #000000;

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
        </style>
    </head>
<body>
    <header>
          <div class="container-fluid">

            <div class="row">
                
                
                <div class="col-lg-8 col-xs-12 col-sm-12 col-md-12">
                    <img class="logo" src="../imagenes/itslnobreLargo.png" >
                </div>
                <div class="col-sm-4" style="text-align:center; padding-top:20px; ">
                    <img src="../imagenes/TecNMwhite.png" width="150px" height="auto" >
                </div>
                
                
                
                
               
                    
                    <div class="col-sm-12" style="text-align: center;">


                        <div class="btn-group" role="group">

                            <a href="../home.php" class="btn btn-outline-light" role="button" >Ir al inicio</a>
                            
                            <a href="reinscripcionAlumn.php" class="btn btn-outline-light active" role="button">Reinscripción Alumnos</a>
                            
                            <a class="btn btn-outline-light" role="button" data-toggle="modal" data-target="#modal1">Cambiar contraseña</a>

                            <a href="reinscripcionVeri.php" class="btn btn-outline-light" role="button">&nbsp;Pulsa para salir&nbsp;</a>

                        </div>    
                    </div>
                
                
                


            </div>
        </div>
</header>
    <div class="container" style="background-color: white;">
        
        <div class="row" >
            
            
            <div class="col-sm-12">
            
                <h2><br>Datos del Alumno</h2>
            
            </div>
            
            
            
            
            <div class="col-sm-6"  style="border: 2px solid; border-radius: 5px; padding: 20px;">
        
                
              
                
                    <p style="font-size:20px;">Datos Personales</p>
        
                 <?php foreach($model->Listar() as $r): ?> 
                    <p><b>Nombre: </b><?php echo $r->__GET('nombre'); ?>&nbsp;<?php echo $r->__GET('paterno'); ?>&nbsp;<?php echo $r->__GET('materno'); ?></p>
                    <p><b>Fecha de nacimiento: </b><?php echo $r->__GET('fnacimiento'); ?></p>
                    <p><b>CURP: </b><?php echo $r->__GET('curp'); ?></p>
                    <p><b>Sexo: </b><?php echo $r->__GET('sexo'); ?></p>
                
                
                </div>
                <div class="col-sm-6"  style="border: 2px solid; border-radius: 5px; padding: 20px;">
                
                    <p style="font-size:20px;">Información de contacto</p>
                
                    <p><b>Dirección: </b><?php echo $r->__GET('direccion'); ?></p>
                    <p><b>Estado: </b><?php echo $r->__GET('estado'); ?></p>
                    <p><b>Municipio: </b><?php echo $r->__GET('municipio'); ?></p>
                    <p><b>Localidad: </b><?php echo $r->__GET('localidad'); ?></p>
                    <p><b>Código Postal: </b><?php echo $r->__GET('postal'); ?></p>
                    <p><b>Correo Electrónico: </b><?php echo $r->__GET('email'); ?></p>
                    <p><b>Teléfono: </b><?php echo $r->__GET('telefono'); ?></p>
                
                    <p><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalA">Actualizar Información</button></p>
                    
               
                
                
                </div>
            
                <div class="col-sm-12">
                    
                    <p style="font-size:20px;">Datos Academicos</p>
                    <p><b>Número de Control: </b><?php echo $r->__GET('numeroControl'); ?></p>
                    
                    
                <?php endforeach; ?>
                <?php foreach($model->Listar3($idgrupo) as $r): ?>
                    
                    
                    <p><b>Último nivel inscrito: </b> nivel <?php echo $r->__GET('nivel'); ?> del periodo: <?php echo $r->__GET('periodo'); ?></p>
                    <p><b>Grupo: </b><?php echo $r->__GET('grupo'); ?></p>
                    <p><b>Maestro: </b><?php echo maestroID($r->__GET('idmaestro')); ?></p>
                    <p><b>Carrera: </b><?php echo $r->__GET('carrera'); ?></p>
                    <p><b>Modalidad: </b><?php echo $r->__GET('modalidad'); ?></p>
                    
               
                        <p style="font-size:20px;">Historial Niveles</p>
                        	  
     
                            <table class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Información del grupo</th>
                                        <th>Calificación</th>
                                        <th>Estado</th>
                                        <th>Inscripción</th>
                                        <th>Libro</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo $dataRow;?>
                                </tbody>
                            </table>
                      
                    
                        
                    
                    
               <?php endforeach; ?>
                    
            </div>
            
        </div>
        
        
        
        
        
        

        
 <!-- Large modal -->


<div class="modal fade bd-example-modal-lg" id="modalA" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="color:black">
      <div class="modal-header">
        <h2 class="modal-title" id="exampleModalLabel">Actualizar Información de Contacto.</h2>
        <button id="myBtn4" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
        <div class= "container">
                <div class= "row">
        
                    <div class="col-sm-12">
                       
                          <div>  

                            <form action="?action=actualizar&id" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                                <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />

                                <table style="width:auto" >
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Domicilio</b><input type="text" name="direccion" value="<?php echo $direccion; ?>" style="width:150%;" /></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Estado</b><select class="form-control" name="estado" id="validationCustom03" onchange="ChangeEstList()" required>
                                                <option value="<?php echo $estado; ?>">Elige...(<?php echo $estado; ?>)</option>
                                                <option value="Aguascalientes">Aguascalientes</option>
                                                <option value="Zacatecas">Zacatecas</option>
                                              </select>
                                        </td>
                                    </tr>
                                    <tr>
                                    
                                        <th style="text-align:left;"></th>
                                        <td><b>Municipio</b><select class="form-control" id="validationCustom04" name="municipio" onchange="ChangeMuniList()" required ><option value="<?php echo $municipio; ?>"><?php echo $municipio; ?></option></select></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Localidad</b><select class="form-control" id="validationCustom05" name="localidad" required ><option value="<?php echo $localidad; ?>"><?php echo $localidad; ?></option></select></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Código Postal</b><input type="text" name="postal" value="<?php echo $postal; ?>" style="" /></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Email</b><input type="text" name="email" value="<?php echo $email; ?>" style="" /></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Teléfono</b><input type="text" name="telefono" value="<?php echo $telefono; ?>" style="" /></td>
                                    </tr>
                                </table>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Cancelar</button>
                            </div>
                            </form>

                         </div>
                         
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
			</div>
      
         
    </div>
  </div>
</div>
        
        
        
        <!-- Large modal -->


<div class="modal fade bd-example-modal-lg" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="color:black">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
          <div class="container">
            <div class="row">
                <div class = col-sm-12>
                    
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                        <div class="modal-body">
                            <div class="form-group row <?php echo (!empty($old_password_err)) ? 'has-error' : ''; ?>">
                                <label>Contraseña actual</label>
                                <input type="password" name="old_password" class="form-control" value="<?php echo $old_password; ?>">
                                <span class="help-block text-danger"><?php echo $old_password_err; ?></span>
                            </div>
                            <div class="form-group row <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                                <label>Contraseña nueva</label>
                                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                                <span class="help-block text-danger"><?php echo $new_password_err; ?></span>
                            </div>
                            <div class="form-group row <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <label>Confirma nueva contraseña</label>
                                <input type="password" name="confirm_password" class="form-control mb-2">
                                <span class="help-block text-danger"><?php echo $confirm_password_err; ?></span>
                            </div>
                        </div>
                        <div class="form-group row modal-footer">
                            <input type="submit" name="boton2" class="btn btn-primary" value="Guardar cambios">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                        
      
                </div> 
            </div> 
        </div> 
      
    </div>
  </div>
</div>

        
        <hr>
        <div class="container-fluid">
            <p style="font-size:26px;">Reinscripción &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo $peri; ?></p>
            <p>Toma en cuenta que para reinscribirte ya debes haber pagado tu cuota de reinscripción.</p>
            <p><b>Según la información registrada en el sistema: </b></p>
                
            <div style="font-size:28px; border: 2px solid <?php echo $color1; ?>; border-radius: 5px; text-align:center; padding: 20px;">
            
            
            <?php echo $mensaje ?>
            
            </div>
                
                <form method="POST">
                    <div class="form-group col-md-6">
                        <br>
                        <label>&nbsp;&nbsp;¿Cuentas con alguna Beca o Programa?</label>
						<select class="form-control" name= "tipoProgramaBeca" >
                            <option value ="">Elije una opción</option>
							<option value ="Si">Si</option>
							<option value ="No">No</option>
						</select> 
                    </div>
                    
                    <br><label>Presiona para reinscribirte</label><br><br>
                    <button type="submit" name="reinscrip" class="btn btn-primary" <?php echo $accion; ?>>Reinscripción</button>
                </form>
        
            <br><br><br>
            
        </div>
        
      </div>
    
    
    
    
    <?php $link->close(); ?>
    
    
    
     <div class="container-fluid">
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
    

        
    

    
</body>
</html>