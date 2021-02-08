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



if ($stmtU = $link->prepare("SELECT username FROM docentes WHERE idmaestro = '{$_SESSION['idmaestro']}';")) {
    $stmtU->execute();

    /* bind variables to prepared statement */
    $stmtU->bind_result($usuario);

    /* fetch values */
   $stmtU->fetch();
    /* close statement */
    $stmtU->close();
  }



if ($stmt1 = $link->prepare("SELECT COUNT(*) FROM alumnos;")) {
    $stmt1->execute();

    /* bind variables to prepared statement */
    $stmt1->bind_result($totalAlumnos);

    /* fetch values */
   $stmt1->fetch();
    /* close statement */
    $stmt1->close();
  }

if ($stmt2 = $link->prepare("SELECT periodo, periodoAnterior FROM periodoactual;")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($periodoActual, $periodoAnterior);

    /* fetch values */
   $stmt2->fetch();
    /* close statement */
    $stmt2->close();
  }

if ($stmt3 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados WHERE gruposasignados.periodo = '{$periodoActual}' AND alumnos.idgrupoActual = gruposasignados.idgrupo;")) {
    $stmt3->execute();

    /* bind variables to prepared statement */
    $stmt3->bind_result($tAlumnosPA);

    /* fetch values */
   $stmt3->fetch();
    /* close statement */
    $stmt3->close();
  }   

if ($stmt4 = $link->prepare("SELECT COUNT(sexo) FROM alumnos WHERE sexo = 'H';")) {
    $stmt4->execute();

    /* bind variables to prepared statement */
    $stmt4->bind_result($tHombres);

    /* fetch values */
   $stmt4->fetch();
    /* close statement */
    $stmt4->close();
  }

if ($stmt5 = $link->prepare("SELECT COUNT(sexo) FROM alumnos WHERE sexo = 'M';")) {
    $stmt5->execute();

    /* bind variables to prepared statement */
    $stmt5->bind_result($tMujeres);

    /* fetch values */
   $stmt5->fetch();
    /* close statement */
    $stmt5->close();
  }

if ($stmt6 = $link->prepare("SELECT COUNT(alumnos.numeroControl) FROM alumnos, gruposasignados WHERE gruposasignados.periodo = '{$periodoAnterior}' AND alumnos.idgrupoActual = gruposasignados.idgrupo;")) {
    $stmt6->execute();

    /* bind variables to prepared statement */
    $stmt6->bind_result($tAlumnosPAn);

    /* fetch values */
   $stmt6->fetch();
    /* close statement */
    $stmt6->close();
  }


if ($stmt7 = $link->prepare("SELECT COUNT(estado) FROM niveles;")) {
    $stmt7->execute();

    /* bind variables to prepared statement */
    $stmt7->bind_result($tEstadoNiveles);

    /* fetch values */
   $stmt7->fetch();
    /* close statement */
    $stmt7->close();
  }

if ($stmt8 = $link->prepare("SELECT COUNT(estado) FROM niveles WHERE estado = 'No Acreditado';")) {
    $stmt8->execute();

    /* bind variables to prepared statement */
    $stmt8->bind_result($tEstadoNivNoAcreditados);

    /* fetch values */
   $stmt8->fetch();
    /* close statement */
    $stmt8->close();
  }

if ($stmt9 = $link->prepare("SELECT COUNT(estado) FROM niveles WHERE periodo = '$periodoActual';")) {
    $stmt9->execute();

    /* bind variables to prepared statement */
    $stmt9->bind_result($tEstadoNivelesPeriodo);

    /* fetch values */
   $stmt9->fetch();
    /* close statement */
    $stmt9->close();
  }

if ($stmt10 = $link->prepare("SELECT COUNT(estado) FROM niveles WHERE estado = 'No Acreditado' AND periodo = '$periodoActual';")) {
    $stmt10->execute();

    /* bind variables to prepared statement */
    $stmt10->bind_result($tEstadoNivNoAcreditadosPeriodo);

    /* fetch values */
   $stmt10->fetch();
    /* close statement */
    $stmt10->close();
  }

if ($stmt9 = $link->prepare("SELECT COUNT(estado) FROM niveles WHERE periodo = '$periodoAnterior';")) {
    $stmt9->execute();

    /* bind variables to prepared statement */
    $stmt9->bind_result($tEstadoNivelesPeriodoAnterior);

    /* fetch values */
   $stmt9->fetch();
    /* close statement */
    $stmt9->close();
  }

if ($stmt10 = $link->prepare("SELECT COUNT(estado) FROM niveles WHERE estado = 'No Acreditado' AND periodo = '$periodoAnterior';")) {
    $stmt10->execute();

    /* bind variables to prepared statement */
    $stmt10->bind_result($tEstadoNivNoAcreditadosPeriodoAnterior);

    /* fetch values */
   $stmt10->fetch();
    /* close statement */
    $stmt10->close();
  }





 //===================================================================================================================================================================================
// Define variables and initialize with empty values
$new_password = $confirm_password = $old_password = $usuario = $usuario_err = $param_usuario = $usuario_nue = "";
$new_password_err = $confirm_password_err = $old_password_err = "";



$query = "SELECT gruposasignados.nivel, gruposasignados.grupo, gruposasignados.carrera, gruposasignados.modalidad, periodoactual.periodo FROM academia_ingles.gruposasignados, academia_ingles.periodoactual WHERE gruposasignados.periodo = periodoactual.periodo AND periodoactual.idperiodoactual = '1' AND gruposasignados.idmaestro = {$_SESSION["idmaestro"]};";

//$query = "SELECT  nivel, grupo, carrera, modalidad FROM `gruposasignados` WHERE idmaestro = {$_SESSION["idmaestro"]}";

$result = mysqli_query($link, $query);

if (!$result) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

$dataRow = "";

while($row = mysqli_fetch_array($result))
{
    
    $dataRow = $dataRow."<tr><td>&nbsp;$row[0]</td>"."<td>&nbsp;$row[1]</td>"."<td>&nbsp;$row[2]</td>"."<td>&nbsp;$row[3]</td></tr>";
    
}




$query2 = "SELECT  periodo FROM periodoactual WHERE  idperiodoactual ='1'";

$result2 = mysqli_query($link, $query2);

if (!$result2) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query2;
    die($message);
}

$dataRow2 = "";

$row2 = mysqli_fetch_array($result2);

$dataRow2 = $row2["periodo"];



 //====================================================================================================================

if(isset($_POST['boton1'])){

       // Validate username
    if(empty(trim($_POST["usuario"]))){
        $usuario_err = "Introduce un nombre se usuario.";
    } else{
        
        // Prepare a select statement
        $sqlu = "SELECT username FROM docentes WHERE username = ? ";
        
        if($stmtu = mysqli_prepare($link, $sqlu)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmtu, "s", $param_usuario);
            
            // Set parameters
            $param_usuario = trim($_POST["usuario"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmtu)){
                /* store result */
                mysqli_stmt_store_result($stmtu);
                
                if(mysqli_stmt_num_rows($stmtu) == 1){
                    $usuario_err = "Ese nombre de usuario ya existe en el sistema.";
                } else{
                    $usuario_nue = trim($_POST["usuario"]);
                }            
                
            } else{
                $usuario_err = "Error ¡intenta más tarde!";
                    echo "<script>window.alert($usuario_err)</script>";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmtu);
    }
    
     // Check input errors before inserting in database
    if(empty($usuario_err)){
        
        // Prepare an insert statement
        $sqlus = "UPDATE docentes SET username = ? WHERE idmaestro = '{$_SESSION['idmaestro']}'";
         
        if($stmtus = mysqli_prepare($link, $sqlus)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmtus, "s", $param_usuario);
            
            // Set parameters
            $param_usuario = $usuario_nue;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmtus)){
                
                       // Redirect to home page
                        $message = "¡Nombre de usario registrado con exito! Cerrando Sesión...";
                        echo "<script type='text/javascript'>alert('$message'); location.href='logoutAd.php'; counterua1 = 0;
            localStorage.setItem('counterua1', 0);</script>";
        
            } else{
                echo "Algo salio mal, intentalo más tarde."."Error: %s.\n", $stmt->error;
                $message = "¡Nombre de usario registrado con exito!";

            }
        }
        // Close statement
        mysqli_stmt_close($stmtus);

    }
}
 
    


//=======================================================================================================
// Processing form data when form is submitted
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
        $sql = "UPDATE docentes SET password = ? WHERE idmaestro = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["idmaestro"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                 $message = "¡Contraseña registrada con exito! Cerrando Sesión...";
                echo "<script type='text/javascript'>alert('$message'); location.href='logoutAd.php';</script>";
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
require_once 'administrador.entidad.php';
require_once 'administrador.model.php';

// Logica
$alm = new Docente();
$model = new DocenteModel();



if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('idmaestro',       $_REQUEST['idmaestro']);
            $alm->__SET('direccion',       $_REQUEST['direccion']);
            $alm->__SET('estado',          $_REQUEST['estado']);
            $alm->__SET('municipio',       $_REQUEST['municipio']);
            $alm->__SET('localidad',       $_REQUEST['localidad']);
            $alm->__SET('postal',          $_REQUEST['postal']);
            $alm->__SET('telefono',        $_REQUEST['telefono']);
            $alm->__SET('email',           $_REQUEST['email']);
            $alm->__SET('fnacimiento',     $_REQUEST['fnacimiento']);

			$model->Actualizar($alm);
			header('Location: Administrador.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_SESSION['idmaestro']);
			break;
	}
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administración</title>
    
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
        
        
        .cuadros {
                width: 100%;
                height: auto;
                
                
            }
        .cuadros:hover {
                -webkit-transform: scale(1.03);
                -ms-transform: scale(1.03);
                transform: scale(1.03);
                    }
        
        img.card {
              background-color: #0a6d7a;
              width:80%;
              position: sticky;
              box-shadow: 0 6px 6px 0 rgba(0, 0, 0, 0.2), 0 8px 20px 0 rgba(0, 0, 0, 0.19);
              
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
            .cuadros {
                width: 160px;
                height: auto;
                
            }
            .cuadros:hover {
                        width: 170px;
                        height: auto;
                    }
            
        }
        
        
        /*para pantallas de PC*/
        @media (max-width: 992px){
            .cuadros {
                width: 180px;
                height: auto;
                
            }
            .cuadros:hover {
                        width: 190px;
                        height: auto;
                    }
            .botones {
            padding:0 36px 0 0;  
            text-align:right;
        }
            
        }
        /* Para tablets*/
        @media screen and (max-width: 768px) {
            img.card{
                width: 58%;
                display: block;
                margin-left: auto;
                margin-right: auto;
                
            }
            
        }
        /* Para tablets*/
        @media screen and (max-width: 616px) {
            img.card{
                width: 74%;
                
                
            }
            
        }
        
        /*Para dispositivos moviles*/
        @media screen and (max-width: 400px) {
            
            
        }
        
             #g1 {
        width:300px; height:200px;
        display: inline-block;
        margin: 1em;
      }

      #g2, #g3, #g4 {
        width:300px; height:200px;
        display: inline-block;
        margin: 1em;
      }

        
    </style>
    
    <script src="raphael.min.js"></script>
    <script src="justgage.min.js"></script>
    
    <script>
      var g1, g2, g3, g4;

      window.onload = function(){
        var g1 = new JustGage({
          id: "g1",
          value: <?php if($tEstadoNiveles != 0){echo ((100/$tEstadoNiveles)*$tEstadoNivNoAcreditados);}else{echo 0;} ?>,
          min: 0,
          max: 100,
          title: "Uno",
          label: "Total BD"
        });

        var g2 = new JustGage({
          id: "g2",
          value:  <?php if($tEstadoNivelesPeriodo != 0){ echo ((100/$tEstadoNivelesPeriodo)*$tEstadoNivNoAcreditadosPeriodo);}else{echo 0;}  ?>,
          min: 0,
          max: 100,
          title: "Small Buddy",
          label:" <?php echo $periodoActual; ?>"
        });

        var g3 = new JustGage({
          id: "g3",
          value: <?php if($tEstadoNivelesPeriodoAnterior != 0){ echo ((100/$tEstadoNivelesPeriodoAnterior)*$tEstadoNivNoAcreditadosPeriodoAnterior);}else{echo 0;} ?>,
          min: 0,
          max: 100,
          title: "Tiny Lad",
          label: "<?php echo $periodoAnterior; ?>"
        });

        //setInterval(function() {
       //   g1.refresh(Math.random() * 100);
   //       g2.refresh(Math.random() * 100);
     //     g3.refresh(Math.random() * 100);
   //     }, 2500);
      };
    </script>
    
 
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

                            <a href="../home.php" class="btn btn-outline-light" role="button" >Inicio</a>
                            
                            <a href="Administrador.php" class="btn btn-outline-light active" role="button" >Administradores</a>
                            
                            <a href="AdministradorReportes.php" class="btn btn-outline-light" role="button" >Reportes</a>
                            
                            <a href="Administrador.php" class="btn btn-outline-light" role="button" data-toggle="modal" data-target="#modal1">Cambiar contraseña</a>
                            
                            <a class="btn btn-outline-light" role="button" id="botonu">Cambiar Nombre de Usuario</a>

                            <a href="logoutAd.php" class="btn btn-outline-light" role="button">Cerrar sesión</a>

                        </div>    
                    </div>
                
            </div>
        </div>
</header>

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

    
    
    
    
    
<div class="modal fade bd-example-modal-lg" id="modal5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="color:black">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Cambiar Nombre de Usuario</h4>
        <button type="button" id="btnu3" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
          <div class="container">
            <div class="row">
                <div class = col-sm-12 style="padding:20px;">
                    
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                        <div class="modal-body">
                            
                            <div class="form-group row <?php echo (!empty($usuario_err)) ? 'has-error' : ''; ?>">
                                <label>Nuevo nombre de usuario</label>
                                <input type="text" name="usuario" class="form-control mb-2">
                                <span class="help-block text-danger"><?php echo $usuario_err; ?></span>
                            </div>
                        </div>
                        <div class="form-group row modal-footer">
                            <input type="submit" name="boton1" class="btn btn-primary" value="Guardar cambios">
                            <button type="button" id="botonu2" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                        
      
                </div> 
            </div> 
        </div> 
      
    </div>
  </div>
</div>
    
    
    
<!-- Large modal 2 -->


<div class="modal fade bd-example-modal-lg" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="color:black">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Actualizar Datos de Contacto</h3>
        <button id="myBtn4" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
        <div class= "container">
                <div class= "row">
                    <div class="pure-g">

                        
                        
                        
                        <div class="pure-u-1-2">
                          <div>  
                            <form action="?action=actualizar&id" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                                <div class="modal-body">
                                <input type="hidden" name="idmaestro" value="<?php echo $alm->__GET('idmaestro'); ?>" />

                                <table style="width:400px; color:black;" >
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Domicilio</b><input type="text" name="direccion" value="<?php echo $alm->__GET('direccion'); ?>"  /></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Estado</b><select class="form-control" name="estado" id="validationCustom03" onchange="ChangeEstList()" required>
                                                <option value="">Elige...</option>
                                                <option value="Aguascalientes">Aguascalientes</option>
                                                <option value="Zacatecas">Zacatecas</option>
                                              </select>
                                        </td>
                                    </tr>
                                    <tr>
                                    
                                        <th style="text-align:left;"></th>
                                        <td><b>Municipio</b><select class="form-control" id="validationCustom04" name="municipio" onchange="ChangeMuniList()" required ><option value=""><?php echo $alm->__GET('municipio'); ?></option></select></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Localidad</b><select class="form-control" id="validationCustom05" name="localidad" required ><option value=""><?php echo $alm->__GET('localidad'); ?></option></select></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Código Postal</b><input type="number" name="postal" value="<?php echo $alm->__GET('postal'); ?>" style="width:auto;" /></td>
                                        
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Teléfono</b><input type="text" name="telefono" value="<?php echo $alm->__GET('telefono'); ?>" style="width:auto;" /></td>
                                        
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Email</b><input type="text" name="email" value="<?php echo $alm->__GET('email'); ?>" /></td>
                                    </tr>
                                </table>
                                </div>
                                <div class="modal-footer">
                                <button id="myBtn3" type="submit" class="btn btn-primary">Actualizar</button>
                                <button id="myBtn2" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                               </div>
                            </form>
                         </div>
                         
                        </div> 
                        
                    </div>
                </div>
			</div>
   
    </div>
  </div>
</div>

    
    <div class="container" style="padding-top: 20px;">  
        
        
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                    <a class="nav-link" style="color:black">Usuario: <?php echo $_SESSION['username']; ?></a>
              </li>
              <li class="nav-item">
                    <a class="nav-link" id="inf-tab" data-toggle="tab" href="#inf" role="tab" aria-controls="inf" aria-selected="true">Información Personal Administrador</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link" id="ITSL-tab" data-toggle="tab" href="#ITSL" role="tab" aria-controls="ITSL" aria-selected="false">Academia Inlgés Gráficas</a>
              </li>
             <li class="nav-item">
                    <a class="nav-link" id="CLE-tab" data-toggle="tab" href="#CLE" role="tab" aria-controls="CLE" aria-selected="false">CLE Información</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link active" id="Opciones-tab" data-toggle="tab" href="#Opciones" role="tab" aria-controls="Opciones" aria-selected="false">Herramientas</a>
              </li>
        </ul>
 

        <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade " id="inf" role="tabpanel" aria-labelledby="inf-tab">
                    <?php foreach($model->Listar() as $r): ?> 
                      <div class="row">
                          <div class="col-sm-4" style="border: 2px solid gray; border-radius: 5px; text-align:left; padding: 20px;">

                              <p style="font-size: 18px;"><b>Información Personal</b></p>

                              <p><b>Nombre: </b><?php echo $r->__GET('titulo')." ".$r->__GET('nombre')." ".$r->__GET('paterno')." ".$r->__GET('materno'); ?></p>
                              <p><b>Fecha de nacimiento: </b><?php echo $r->__GET('fnacimiento'); ?></p>
                              <p><b>Sexo: </b><?php echo $r->__GET('sexo'); ?></p>
                              <p><b>CURP: </b><?php echo $r->__GET('curp'); ?></p>
                              <p><b>RFC: </b><?php echo $r->__GET('rfc'); ?></p>

                            </div>
                          
                          <div class="col-sm-4" style="border: 2px solid gray; border-radius: 5px; text-align:left; padding: 20px;">

                              <p style="font-size: 18px;"><b>Datos académicos</b></p>
                              <p><b>Certificación: </b><?php echo $r->__GET('certificacion'); ?></p>
                              <p><b>Nivel de estudios: </b><?php echo $r->__GET('nivelAcademico'); ?></p>
                              <p><b>Estado Académinco: </b><?php echo $r->__GET('altaBaja'); ?></p>
                              <p><b>Maestro ID: </b><?php echo $r->__GET('idmaestro'); ?></p>
                              <p><b>Certificación: </b>B2</p>
                            
                              
                          </div>
                          
                          
                            <div class="col-sm-4" style="border: 2px solid gray; border-radius: 5px; text-align:left; padding: 20px;">

                              <p style="font-size: 18px;"><b>Información de Contacto</b></p>
                              <p><b>Domicilio: </b><?php echo $r->__GET('direccion'); ?></p>
                              <p><b>Estado: </b><?php echo $r->__GET('estado'); ?></p>
                              <p><b>Municipio: </b><?php echo $r->__GET('municipio'); ?></p>
                              <p><b>Localidad: </b><?php echo $r->__GET('localidad'); ?></p>
                              <p><b>Código postal: </b><?php echo $r->__GET('postal'); ?></p>
                              <p><b>Teléfono: </b><?php echo $r->__GET('telefono'); ?></p>
                              <p><b>Email: </b><?php echo $r->__GET('email'); ?></p>
                              <p><a id="myBtn1" href="?action=editar&idmaestro=<?php echo $r->idmaestro; ?>" class="btn btn-primary">Actualizar Información</a>
                              </p>
                          </div>
                          
                          
                      </div >
                  
                      <?php endforeach; ?>
                  
                  
                  
            </div>
              <div class="tab-pane fade" id="ITSL" role="tabpanel" aria-labelledby="ITSL-tab">
                     <?php foreach($model->Listar() as $r): ?> 
                      <div class="row">
                          <div class="col-sm-12" style="border: 2px solid gray; border-radius: 5px; ">

                              <p style="font-size: 18px;"><b>Datos ITSL - Academia de Inglés</b></p>
                              
                              <hr>
                            
                              
                               <p style="text-align:center;"><b>Tabla Datos Generales</b></p>
                              <table class="table table-bordered table-dark" style="width:100%; font-size: 14px;">
                                  <thead style="text-align:center;">
                                    <tr>
                                    
                                        <th>Número total de alumnos registrados en la Base de Datos</th>
                                        <th>Número total de alumnos (Hombre) registrados en la Base de Datos</th>
                                        <th>Número total de alumnas registradas en la Base de Datos</th>
                                        <th>Número total de estudiantes registrados en el periodo actual <?php echo $periodoActual; ?></th>
                                        <th>Número total de estudiantes registrados en el periodo anterior <?php echo $periodoAnterior; ?></th>
                                      
                                   </tr>
                                  </thead>
                                  <tbody style="text-align:center;">
                                      <tr>
                                          <td><?php echo $totalAlumnos; ?></td>
                                          <td><?php echo $tHombres; ?></td>
                                          <td><?php echo $tMujeres; ?></td>
                                          <td><?php echo $tAlumnosPA; ?></td>
                                          <td><?php echo $tAlumnosPAn; ?></td>

                                      </tr>
                                    
                                  </tbody>
                                  
                                </table>
                              
                                  <h1 style="padding-top:10px; text-align:center;">Índice de reprobados.</h1>
                                    <div id="g1"><p style="text-align:center;"><?php echo $tEstadoNivNoAcreditados." reprobados de ".$tEstadoNiveles; ?></p></div>
                                    <div id="g2"><p style="text-align:center;"><?php echo $tEstadoNivNoAcreditadosPeriodo." reprobados de ".$tEstadoNivelesPeriodo; ?></p></div>
                                    <div id="g3"><p style="text-align:center;"><?php echo $tEstadoNivNoAcreditadosPeriodoAnterior." reprobados de ".$tEstadoNivelesPeriodoAnterior; ?></p></div>

                              
                             <hr>
                              <p style="text-align:center;"><b>Tabla Datos por Nivel Periodo <?php echo $periodoActual; ?></b></p>
                              <table class="table table-bordered table-dark" style="width:100%; font-size:14px;">
                                  <thead style="text-align:center;">
                                    <tr>
                                    <th>No. Nivel</th>
                                    <th>No. total alumnos por nivel</th>
                                      <th>No. total mujeres por nivel</th>
                                      <th>No. total hombres por nivel</th>
                                   </tr>
                                  </thead>
                                  <tbody style="text-align:center;">
                                    <tr>
                                        <td>1</td>
                                        <td>875</td>
                                        <td>750</td>
                                        <td>230</td>
                                    </tr>
                                    
                                  </tbody>
                                  
                                </table>

                              
                            </div>
                          
                        
                          
                          
                          
                          

                      </div >

                      <?php endforeach; ?>

                    
            </div>
            
            
            
            <div class="tab-pane fade" id="CLE" role="tabpanel" aria-labelledby="CLE-tab">
                     <?php foreach($model->Listar2() as $r): ?> 
                      <div class="row">
                          <div class="col-sm-12" style="border: 2px solid gray; border-radius: 5px; ">

                <br>
                <h1 class="centrado">TECNOLÓGICO NACIONAL DE MÉXICO</h1>
                <h2 class="centrado">SECRETARÍA DE EXTENSIÓN Y VINCULACIÓN</h2>
                <h2 class="centrado">DIRECCIÓN DE EDUCACIÓN CONTINUA Y A DISTANCIA</h2>
                <h3 class="centrado">Programa Coordinador de Lenguas Extrangeras (PCLE)</h3>
                <h3 class="centrado">Reporte Estadistístico de la Coordinación de Lenguas Extranjeras (CLE)</h3>
                
                
                
                <p><b>Instituto Tecnológico Superior de Loreto </b></p>
                  <hr>            
                <p><b>Subdirección: </b><?php echo $r->__GET('subdireccion'); ?></p>
                <p><b>Datos del Contacto Subdirección: </b></p>
                <p><b>Nombre: </b><?php echo $r->__GET('subdireccionNombre'); ?><b> &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp; Teléfono oficina: </b><?php echo $r->__GET('subTelOfi'); ?><b> &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp; Ext.: </b><?php echo $r->__GET('subTelOfiExt'); ?></p>
                
                <hr>
                              
                <p><b>Departamento: </b></p>
                <p><b>Datos del Contacto Departemento: </b><?php echo $r->__GET('departamento'); ?></p>
                <p><b>Nombre: </b><?php echo $r->__GET('departamentoNombre'); ?><b> &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp; Teléfono oficina: </b><?php echo $r->__GET('depTelOfi'); ?><b> &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp; Ext.: </b><?php echo $r->__GET('depTelOfiExt'); ?></p>
                
                <hr>
                              
                <p><b>Coordinador de la CLE: </b><?php echo $r->__GET('cleCoordinador'); ?></p>
                <p><b>Correo Electrónico Institucional: </b><?php echo $r->__GET('emailCoordi'); ?><b> &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp; Correo eletrónico alterno: </b><?php echo $r->__GET('emailCoordiAlter'); ?></p>
                <p><b>Número de Oficina: </b><?php echo $r->__GET('coorTelOfi'); ?><b> &nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp; Ext.: </b><?php echo $r->__GET('coorTelOfiExt'); ?></p>
                <p><b>Número de Celular: </b><?php echo $r->__GET('coorTelCel'); ?></p>
                
            </div>
                          
                        
                          
                      </div >

                      <?php endforeach; ?>

                    
            </div>
            
            
            
            
              <div class="tab-pane fade show active" id="Opciones" role="tabpanel" aria-labelledby="Opciones-tab">
            
            	<div class= "container">
                    <div class= "row justify-content-center">
                        <div class="col-sm-4">
                            <p style="text-align:center; font-size:22px;">Herramientas Alumnos</p>
                        </div>
                    </div>
                    <div class= "row justify-content-center">

                       
                        <div class= "col-7 col-sm-7 col-md-3 col-lg-3">

                             <p><a href="adminAlumn.php">
                                <img class="cuadros card"  alt="Registrar / modificar Alumnos" src="../imagenes/estudiantes.png" >
                                </a></p>
                        </div>
                        
                        <div class= "col-7 col-sm-7 col-md-3 col-lg-3">
                             <p><a href="adminAlumnReinscripciones.php">
                                <img class="cuadros card"  alt="Inscripciones." src="../imagenes/Inscrip.png" >
                                </a></p>
                        </div>
                        <div class= "col-7 col-sm-7 col-md-3 col-lg-3">
                             <p><a href="adminAlumnNiveles.php">
                                <img class="cuadros card"  alt="Ver / modificar Niveles." src="../imagenes/NivelesAl.png" >
                                </a></p>

                        </div>
                        <div class= "col-7 col-sm-7 col-md-3 col-lg-3">
                             <p><a href="adminPagos.php">
                                <img class="cuadros card"  alt="Ver / registrar pagos." src="../imagenes/PagosA.png" >
                                </a></p>

                        </div>
                        

                    </div>
                    <div class= "row justify-content-center">

                       
                        <div class= "col-7 col-sm-7 col-md-3 col-lg-3">

                             <p><a href="adminAlumnContac.php">
                                <img class="cuadros card"  alt="Alumnos Inforamción de Contacto" src="../imagenes/Contacto.png" >
                                </a></p>
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        

                    </div>
                    
                    <div class= "row justify-content-center">
                        <div class="col-sm-12">
                            <hr>
                            <p style="text-align:center; font-size:22px;">Herramientas Docentes</p>
                        </div>
                        
                        
                        <div class= "col-7 col-sm-7 col-md-3 col-lg-3">
                             <p><a href="adminDocen.php">
                                <img class="cuadros card"  alt="registrar / modificar Docentes." src="../imagenes/profesores.png" >
                                </a></p>
                        </div>
                        
                        <div class= "col-7 col-sm-7 col-md-3 col-lg-3">

                             <p><a href="asigGrupos.php">
                                <img class="cuadros card"  alt="Asignar Grupos" src="../imagenes/AsignarGrupos.png" >
                                </a></p>
                        </div>
                        
                        <div class= "col-7 col-sm-7 col-md-3 col-lg-3">
                             <p><a href="AdminHorarios.php">
                                <img class="cuadros card"  alt="crear / modificar Horarios." src="../imagenes/horarios.png" >
                                </a></p>
                        </div>

                    </div>
                    
                    
                    <div class= "row justify-content-center">
                        
                        <div class= "col-7 col-sm-7 col-md-3 col-lg-3">
                             <p><a href="adminDocen.php">
                                <img class="cuadros card"  alt="registrar / modificar Docentes." src="../imagenes/ContactoDo.png" >
                                </a></p>
                        </div>
                        
                        <div class= "col-7 col-sm-7 col-md-3 col-lg-3">
                             <p><a href="AdminParcialesFechas.php">
                                <img class="cuadros card"  alt="Parciales Fechas." src="../imagenes/Parci.png" >
                                </a></p>
                        </div>
                        
                        
                        

                       

                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    <div class= "row justify-content-center">
                        <div class="col-sm-12">
                            <hr>
                            <p style="text-align:center; font-size:22px;">Herramientas Administrador</p>
                        </div>

                        <div class= "col-7 col-sm-7 col-md-3 col-lg-3">
                             <p><a href="adminMod.php">
                                <img class="cuadros card"  alt="Asignar Roles Administradores" src="../imagenes/administradores.png" >
                                </a></p>

                        </div>
                        
                        
                        <div class= "col-7 col-sm-7 col-md-3 col-lg-3">

                             <p><a href="adminContra.php">
                                <img class="cuadros card"  alt="Administrar contraseñas" src="../imagenes/adminContra.png" >
                                </a></p>
                        </div>
                        <div class= "col-7 col-sm-7 col-md-3 col-lg-3">

                             <p><a href="EditCLEinfo.php">
                                <img class="cuadros card"  alt="CLE" src="../imagenes/CLEinformation.png" >
                                </a></p>
                        </div>

                    </div>

                    </div>
            
            </div>
            
        </div>
    
    </div>
    
    
    
        <div class="container" style="padding-top:40px;">
            <div class="collapse" id="collapse1">
              <div class="card card-body" style="color:black;">
            
                  
                   </div>
                  </div>
              
        </div>
    
    
    
    
    
    
    
    
    <br>
    
    
    
    
    

    
    
    
        <div class="container" >
            <div class="collapse" id="collapse2">
              <div class="card card-body" style="color:black;">
                  
                  <div class="row">
                      <div class="col-9">
                          
                              <p style="font-size: 18px;"><b>Niveles y Grupos Asignados Periodo <?php echo $dataRow2;?></b></p>
                              
                          
                              <div class="table-responsive">  
                    
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nivel</th>
                                            <th>Grupo</th>
                                            <th>Carrera</th>
                                            <th>Modalidad</th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $dataRow;?>
                                    </tbody>
                                </table>
                              </div>

                         
                          
                      </div>
                  
                  </div >
                  <div class="row">
                      <div class="col">
                          
                          <p>
                              <a href="" class="btn btn-primary">Ver listas de alumnos</a>
                              <button id="myBtn8" type="button" class="btn btn-dark">Cerrar</button>
                          </p>
                          
                          
                      </div>
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
       
        var countercon1 = 0;

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn1");
        
        // Get the button that save data
        var btn2 = document.getElementById("myBtn2");
       
        // Get the button that save data
        var btn3 = document.getElementById("myBtn3");
       
       // Get the button that save data
        var btn4 = document.getElementById("myBtn4");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            countercon1 = 1;
            localStorage.setItem("countercon1", countercon1);
        }
        
         // When the user clicks the button, close the modal 
        btn2.onclick = function() {
            countercon1 = 0;
            localStorage.setItem("countercon1", countercon1);
        }
         // When the user clicks the button, close the modal 
        btn3.onclick = function() {
            countercon1 = 0;
            localStorage.setItem("countercon1", countercon1);
        }
         // When the user clicks the button, close the modal 
        btn4.onclick = function() {
            countercon1 = 0;
            localStorage.setItem("countercon1", countercon1);
        }

        countercon1 = localStorage.getItem("countercon1");
        if(countercon1 == 1 ){
            $('#modal2').modal('show');
            $('.nav-tabs a[href="#inf"]').tab('show')
           }else{
               $('#modal2').modal('none');
           }
    </script>
           <script>
       
        var counterua1 = 0;

        // Get the button that opens the modal
        var btnu = document.getElementById("botonu");
        
        // Get the button that save data
        var btnu2 = document.getElementById("botonu2");
               
        var btnu3 = document.getElementById("botonu3");


        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btnu.onclick = function() {
            counterua1 = 1;
            localStorage.setItem("counterua1", counterua1);
            // location.href='Docentes.php';
             $('#modal5').modal('show');
        }
        
         // When the user clicks the button, close the modal 
        btnu2.onclick = function() {
            counterua1 = 0;
            localStorage.setItem("counterua1", counterua1);
        }
         // When the user clicks the button, close the modal 
        btnu3.onclick = function() {
            counterua1 = 0;
            localStorage.setItem("counterua1", counterua1);
        }

        counterua1 = localStorage.getItem("counterua1");
        if(counterua1 != 0 ){
               $('#modal5').modal('show');
           }else{
               $('#modal5').modal('none');
           }
    </script>
	
	

</body>
</html>