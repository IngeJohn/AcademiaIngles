<?php

session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){

    // Unset all of the session variables
    $_SESSION = array();
    
    // Destroy the session.
    session_destroy();
    
}

require_once "../Require/config.php";



//===========================================================================================================================


if ($stmt5 = $link->prepare("SELECT  periodo FROM periodoactual")) {
    $stmt5->execute();

    /* bind variables to prepared statement */
    $stmt5->bind_result($periActuBD2);

    /* fetch values */
$stmt5->fetch();

    /* close statement */
    $stmt5->close();
}



//===========================================================================================================================

function grupoInformacion($id){
    
    global $link;
    
    $nivel = $grupo = $carrera = $modalidad = $periodo = $idmaestro = "";
    
    if ($stmtm = $link->prepare("SELECT nivel, grupo, carrera, modalidad, periodo, idmaestro FROM gruposasignados WHERE idgrupo = '{$id}'")) {
        
        $stmtm->execute();

        /* bind variables to prepared statement */
        $stmtm->bind_result($nivel , $grupo , $carrera , $modalidad , $periodo , $idmaestro);

        /* fetch values */
        $stmtm->fetch();

        /* close statement */
        $stmtm->close();
        
        echo $nivel." ".$grupo." ".$carrera." ".$modalidad;
    }

}



 
// Define variables and initialize with empty values
$tipoProgramaBeca = $numeroControl = $confirm_numeroControl = $curp = $confirm_curp = $nombre = $paterno = $materno = $sexo = $direccion = $telefono = $estado = $municipio = $localidad = $fnacimiento = $email = $postal = $contrase = $confirm_contrase = $idgrupo = "";
$tipoProgramaBeca_err = $numeroControl_err = $confirm_numeroControl_err = $curp_err = $confirm_curp_err = $nombre_err = $paterno_err = $materno_err = $sexo_err = $direccion_err = $telefono_err = $estado_err =$municipio_err =$localidad_err = $fnacimiento_err = $email_err = $postal_err = $contrase_err = $confirm_contrase_err = $idgrupo_err = "";




if ($stmt4 = $link->prepare("SELECT periodo FROM periodoactual")) {
    $stmt4->execute();

    /* bind variables to prepared statement */
    $stmt4->bind_result($periodoactual);

    /* fetch values */
$stmt4->fetch();

    /* close statement */
    $stmt4->close();
}
    

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        //_________________
    
     if(empty(trim($_POST["email"]))){
        $email_err = "Introduce tu correo electrónico";
    } else{
         $email = trim($_POST["email"]);
            }         
    //_________________
    
     if(empty(trim($_POST["postal"]))){
        $postal_err = "Introduce tu código postal.";
    } else{
         $postal = trim($_POST["postal"]);
            } 
        //_________________
    
     if(empty(trim($_POST["idgrupo"]))){
        $idgrupo_err = "Selecciona un grupo.";
    } else{
         $idgrupo = trim($_POST["idgrupo"]);
            } 
        //_________________
    
    if(empty(trim($_POST["tipoProgramaBeca"]))){
        $tipoProgramaBeca_err = "Selecciona una opción.";
    } else{
         $tipoProgramaBeca = trim($_POST["tipoProgramaBeca"]);
            } 
        //_________________
    
     if(empty(trim($_POST["nombre"]))){
        $nombre_err = "Introduce tu nombre o nombres.";
    } else{
         $nombre = trim($_POST["nombre"]);
            } 
    //_________________
    
     if(empty(trim($_POST["paterno"]))){
         
         if(empty(trim($_POST["materno"]))){
             
                $materno_err = "¡Introduce por lo meno un apellido!";
                $paterno_err = "¡Introduce por lo meno un apellido!";
            } else{
             
                 $materno = trim($_POST["materno"]);
                 $paterno = ".";
                    } 
         
        
    } else{
         
         $paterno = trim($_POST["paterno"]);
         
          if(empty(trim($_POST["materno"]))){
             
                $materno = ".";
              
            } else{

                    $materno = trim($_POST["materno"]);;
              
                 } 
        } 
    //_________________
    

     if(empty(trim($_POST["sexo"]))){
        $sexo_err = "Introduce tu sexo (M = Mujer, H = Hombre).";
    } else{
         $sexo = trim($_POST["sexo"]);
            } 
    //_________________
    
     if(empty(trim($_POST["direccion"]))){
        $direccion_err = "Introduce tu dirección.";
    } else{
         $direccion = trim($_POST["direccion"]);
            } 
    //_________________
    
     if(strlen(trim($_POST["telefono"])) < 10){
        $telefono_err = "EL número de teléfono debe tener 10 dígitos.";
    } else{
         $telefono = trim($_POST["telefono"]);
            } 
            //_________________
    
     if(empty(trim($_POST["estado"]))){
        $estado_err = "Selecciona un estado.";
    } else{
         $estado = trim($_POST["estado"]);
            } 
            //_________________
    
     if(empty(trim($_POST["municipio"]))){
        $municipio_err = "Selecciona un municipio.";
    } else{
         $municipio = trim($_POST["municipio"]);
            } 
            //_________________
    
     if(empty(trim($_POST["localidad"]))){
        $localidad_err = "Selecciona una localidad.";
    } else{
         $localidad = trim($_POST["localidad"]);
            } 
      //_________________
    
     if(empty(trim($_POST["fnacimiento"]))){
        $fnacimiento_err = "Selecciona tu fecha de nacimiento.";
    } else{
         $fnacimiento = trim($_POST["fnacimiento"]);
            } 
        //_________________  //_________________
    
    

 
    // Validate numeroControl
    if(empty(trim($_POST["numeroControl"]))){
        $numeroControl_err = "Introduce tu Número de Control.";
    } elseif(strlen(trim($_POST["numeroControl"])) == 8){
        
        // Prepare a select statement
        $sql = "SELECT id FROM alumnos WHERE numeroControl = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_numeroControl);
            
            // Set parameters
            $param_numeroControl = trim($_POST["numeroControl"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $numeroControl_err = "Ese número de control ya existe en el sistema.";
                } else{
                    $numeroControl = trim($_POST["numeroControl"]);
                }
                // Validate confirm numeroControl
                if(empty(trim($_POST["confirm_numeroControl"]))){
                    $confirm_numeroControl_err = "Confirma el Número de Control.";     
                } else{
                    $confirm_numeroControl = trim($_POST["confirm_numeroControl"]);
                    if(empty($numeroControl_err) && ($numeroControl != $confirm_numeroControl)){
                        $confirm_numeroControl_err = "Los Números de Control no coinciden";
                    }
                }
                
                
            } else{
                echo "Oops! Algo salio mal, intenta más tarde.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    } else{
        
        $numeroControl_err = "El número de Control debe tener 8 dígitos.";
        
    }
    
    // Validate curp
    if(empty(trim($_POST["curp"]))){
        $curp_err = "Introduce tu CURP.";     
    } elseif(strlen(trim($_POST["curp"])) == 18){
        $curp = trim($_POST["curp"]);
    } else{
        $curp_err = "CURP debe tener 18 caracteres alfanuméricos.";
        
    }
    
    // Validate confirm CURP
    if(empty(trim($_POST["confirm_curp"]))){
        $confirm_curp_err = "Confirma el CURP.";     
    } else{
        $confirm_curp = trim($_POST["confirm_curp"]);
        if(empty($curp_err) && ($curp != $confirm_curp)){
            $confirm_curp_err = "Las CURPs no coinciden";
        }
    }
    
        // Validate contrase
    if(empty(trim($_POST["contrase"]))){
        $password_err = "Introduce una contraseña.";     
    } elseif(strlen(trim($_POST["contrase"])) < 6){
        $contrase_err = "LA contraseña debe ser de por lo menos 6 caracteres.";
    } else{
        $contrase = trim($_POST["contrase"]);
    }
    
    // Validate confirm contrase
    if(empty(trim($_POST["confirm_contrase"]))){
        $confirm_contrase_err = "Confirma la contraseña.";     
    } else{
        $confirm_contrase = trim($_POST["confirm_contrase"]);
        if(empty($contrase_err) && ($contrase != $confirm_contrase)){
            $confirm_contrase_err = "¡Las contraseñas no coinciden!.";
        }
    }
    

    // Check input errors before inserting in database
    if(empty($numeroControl_err) && empty($confirm_numeroControl_err) && empty($curp_err) && empty($confirm_curp_err) && empty($nombre_err) && empty($paterno_err) && empty($materno_err) && empty($sexo_err) && empty($idgrupo_err) && empty($fnacimiento_err) && empty($contrase_err) && empty($confirm_contrase_err)){
        
        
         if ($stmt5 = $link->prepare("SELECT idmaestro FROM gruposasignados WHERE  idgrupo = '$idgrupo' AND periodo = '$periActuBD2';")) {
             
                $stmt5->execute();

                /* bind variables to prepared statement */
                $stmt5->bind_result($idmaestro);

                /* fetch values */
                $stmt5->fetch();

                /* close statement */
                $stmt5->close();
            }
        
        
        
        // Prepare an insert statement
        $sql = "INSERT INTO alumnos (numeroControl, curp, nombre, paterno, materno, sexo, direccion, telefono, altaBaja, estado, municipio, localidad, fnacimiento,  email, postal, contrase, idgrupoActual) VALUES (?,?,?,?,?,?,?,?,'Alta',?,?,?,?,?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "issssssssssssiss", $param_numeroControl, $param_curp, $param_nombre, $param_paterno, $param_materno, $param_sexo, $param_direccion, $param_telefono, $param_estado, $param_municipio, $param_localidad, $param_fnacimiento, $param_email, $param_postal, $param_contrase, $param_idgrupoActual);
            
            // Set parameters
            $param_numeroControl = $numeroControl;
            $param_curp = $curp;
            $param_nombre = $nombre;
            $param_paterno = $paterno;
            $param_materno = $materno;
            $param_sexo = $sexo;
            $param_direccion = $direccion;
            $param_telefono = $telefono;
            $param_estado = $estado;
            $param_municipio = $municipio;
            $param_localidad = $localidad;
            $param_fnacimiento = $fnacimiento;
            $param_email = $email;
            $param_postal = $postal;
            $param_contrase = password_hash($contrase, PASSWORD_DEFAULT);
            $param_idgrupoActual = $idgrupo;
            

			
            //echo "si preparo el statement";
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
                $sql2 = "INSERT INTO niveles (numeroControl, idgrupo, estado, tipoProgramaBeca) VALUES ('{$numeroControl}','{$idgrupo}','En curso','{$tipoProgramaBeca}')";
                
                if($stmt2 = mysqli_prepare($link, $sql2)){
                    
                    
                    
                   if(mysqli_stmt_execute($stmt2)){
                       
                       // Redirect to home page
                        $message = "¡Te has inscrito con exito! Volver al inicio.";
                        echo "<script type='text/javascript'>alert('$message'); location.href='../home.php';</script>";
                       
                   }
                }
                
                
            } else{
                echo "Algo salio mal, intentalo más tarde."."Error: %s.\n", $stmt->error;
            }
        }
        // Close statement
        mysqli_stmt_close($stmt2);
        mysqli_stmt_close($stmt);
    }else{
        echo "<script type='text/javascript'>alert('Revisa los campos obligatorios.*');</script>";
    }
    // Close connection
    mysqli_close($link);
}


//========================================================================================================



require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new alumno();
$model = new alumnoModel();




?>
 
<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <title>Inscripción alumnos de nuevo ingreso</title>
    
    
    
    
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
    
    <script type="text/javascript" src="../direcciones/localidadesAlta.js"></script>
    
    <style type="text/css">
        body{
            background-color: slategray;
        }
		header {
              background-color: #000000;
              
               }
		.diviciones{
            background: #ffffff;
            padding: 40px 20px 20px 20px;
        }
        .centered{
            text-align:center;
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
        @media (max-width: 992px){
            .logo{
                width: 50%;
                height: auto;

            }
            
            
        }
        /* Para tablets*/
        @media screen and (max-width: 768px) {
            .logo{
                width: 80%;
                height: auto;
                padding: 10px 0 10px 0;
                
            }
          .btn{
                
                width:auto;
                height:30px;
                font-size: 11px;
                
            }

        }
        
        /*Para dispositivos moviles*/
        @media screen and (max-width: 400px) {
            
            .logo{
                width: 80%;
                height: auto;
                padding: 10px 0 10px 0;
                
            }
            
            .btn{
                
                width:auto;
                height:30px;
                font-size: 11px;
                
            }
            
            
            
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
                            
                            <a href="inscripcionAlumn.php" class="btn btn-outline-light active" role="button">Inscripción Nuevo Ingreso</a>

                            <a href="../home.php" class="btn btn-outline-light" role="button">&nbsp;Pulsa para salir&nbsp;</a>

                        </div>    
                    </div>
                
                
                


            </div>
        </div>

        
        
    </header>
    <div class="container diviciones">
	    
        <h2 class="centered">Registro de Alumnos de Nuevo Ingreso del periodo <?php  echo $periodoactual; ?></h2>
        <h3 class="centered">Lengua Extranjera Inglés Nivel I</h3>
        <p style="padding-top:30px">Los campos marcados con * son campos obligatorios.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <hr>
            <p style="font-size:24px;">Datos Personales</p>
            <div class= "row">
				
					<div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?> col-sm-4">
						<label>Nombre(s)*</label>
						<input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" autocomplete="off">
						<span class="text-danger"><?php echo $nombre_err; ?></span>
					</div> 
					<div class="form-group <?php echo (!empty($paterno_err)) ? 'has-error' : ''; ?> col-sm-4">
						<label>Apellido paterno*</label>
						<input type="text" name="paterno" class="form-control" value="<?php echo $paterno; ?> "autocomplete="off">
						<span class="text-danger"><?php echo $paterno_err; ?></span>
					</div> 
					<div class="form-group <?php echo (!empty($materno_err)) ? 'has-error' : ''; ?> col-sm-4">
						<label>Apellido materno*</label>
						<input type="text" name="materno" class="form-control" value="<?php echo $materno; ?>" autocomplete="off">
						<span class="text-danger"><?php echo $materno_err; ?></span>
					</div> 
                    
                    <div class="form-group <?php echo (!empty($fnacimiento_err)) ? 'has-error' : ''; ?> col-sm-4">
                        <label>Fecha de nacimiento (Año-mes-día)*</label>
                        <input id="datepicker" width="276" name="fnacimiento" class="form-control" autocomplete="off">
                        <span class="text-danger"><?php echo $fnacimiento_err; ?></span>
                    </div>
                    
                
                    <div class="form-group <?php echo (!empty($sexo_err)) ? 'has-error' : ''; ?> col-md-3">
						<label>Sexo*</label>
						<select class="form-control" name= "sexo" >
                            <option value ="<?php echo $sexo; ?>"><?php echo $sexo; ?></option>
							<option value ="H">Hombre</option>
                            <option value ="M">Mujer</option>
							<span class="text-danger"><?php echo $sexo_err; ?></span>
						</select> 
                        
					</div>
                    <div class="form-group col-md-6">
                        <div class="form-group <?php echo (!empty($curp_err)) ? 'has-error' : ''; ?> col-sm-12">
                            <label>CURP*</label>
                            <input type="text" name="curp" class="form-control" maxlength="18" value="<?php echo $curp; ?>" autocomplete="off">
                            <span class="text-danger"><?php echo $curp_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($confirm_curp_err)) ? 'has-error' : ''; ?> col-sm-12">
                            <label>Confirmar CURP*</label>
                            <input type="text" name="confirm_curp" class="form-control" maxlength="18" value="<?php echo $confirm_curp; ?>" autocomplete="off">
                            <span class="text-danger"><?php echo $confirm_curp_err; ?></span>
                        </div>
                    </div>
                    
                    
				</div>	
            <hr>
            <p style="font-size:24px;">Datos Escolares</p>
                <div class= "row">
                
                    <div class="form-group <?php echo (!empty($numeroControl_err)) ? 'has-error' : ''; ?> col-sm-3">
						<label>Número de control*</label>
						<input type="number" name="numeroControl" maxlength="8" class="form-control" value="<?php echo $numeroControl; ?>" autocomplete="off">
						<span class="text-danger"><?php echo $numeroControl_err; ?></span>
					</div>   
                    
                    <div class="form-group <?php echo (!empty($confirm_numeroControl_err)) ? 'has-error' : ''; ?> col-sm-3">
						<label>Confirma Número de Control*</label>
						<input type="number" name="confirm_numeroControl" maxlength="8" class="form-control" value="<?php echo $confirm_numeroControl; ?>" autocomplete="off">
						<span class="text-danger"><?php echo $confirm_numeroControl_err; ?></span>
					</div>  
                
                
                    <div class="form-group col-md-5"> 
                            <label>&nbsp;&nbsp;Grupo*</label>


                            <select class="custom-select custom-select mb-3" required name="idgrupo">
                                  <option value="" selected>Elige...</option>
                                   <?php foreach($model->Listar2() as $r): ?>
                                  <option value="<?php echo $r->__GET('idgrupo'); ?>" <?php if($r->__GET('idgrupo') == $alm->__GET('idgrupo')){echo "selected";}else{echo "";} ?>><?php echo grupoInformacion($r->__GET('idgrupo')); ?></option>
                                  <?php endforeach; ?>
                            </select>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label>&nbsp;&nbsp;¿Cuentas con alguna Beca o Programa?</label>
						<select class="form-control" name= "tipoProgramaBeca" >
                            <option value ="">Elije una opción</option>
							<option value ="Con Beca">Si</option>
							<option value ="Sin Beca">No</option>
						</select> 
                  </div>
                   
                    
					
				</div>	
            <hr>
            <p style="font-size:24px;">Información de contacto</p>
                <div class= "row">
                
				
				    <div class="form-group <?php echo (!empty($direccion_err)) ? 'has-error' : ''; ?> col-sm-4">
						<label>Domicilio</label>
						<input type="text" name="direccion" class="form-control" value="<?php echo $direccion; ?>" autocomplete="off">
						<span class="text-danger"><?php echo $direccion_err; ?></span>
					</div>
                
                
                  <div class="col-sm-3 form-group">
                        <label for="validationCustom03">Estado:</label>
                          <select class="form-control" name="estado" id="validationCustom03" onchange="ChangeEstList()" required value ="<?php echo $estado; ?>">
                            <option value="<?php if($estado !== ""){echo $estado;}else{echo "";} ?>"><?php if($estado !== ""){echo $estado;}else{echo "Elige una opción";} ?></option>
                            <option value="Aguascalientes">Aguascalientes</option>
                            <option value="Zacatecas">Zacatecas</option>
                          </select>
                        <div class="invalid-feedback">
                            Elige un Estado.
                        </div>
                      </div>
                      <div class="col-sm-3 form-group">
                        <label for="validationCustom04">Municipio:</label>
                         <select class="form-control" id="validationCustom04" name="municipio" onchange="ChangeMuniList()" required>
                             <option value ="<?php if($estado !== ""){echo $municipio;}else{echo "";} ?>"><?php if($municipio !== ""){echo $municipio;}else{echo "Elige una opción";} ?></option>
                          </select>
                        <div class="invalid-feedback">
                            Elige un Municipio.
                        </div>
                      </div>
                
                
                        <div class="col-sm-4 <?php echo (!empty($localidad_err)) ? 'has-error' : ''; ?> form-group">
                        <label for="validationCustom05">Localidad:</label>
                         <select class="form-control" id="validationCustom05" name="localidad" required>
                             <option value ="<?php if($estado !== ""){echo $localidad;}else{echo "";} ?>"><?php if($localidad !== ""){echo $localidad;}else{echo "Elige una opción";} ?></option>
                            </select>
                        <div class="invalid-feedback">
                            Elige una Locaidad...
                        </div>
                            <span class="text-danger"><?php echo $localidad_err; ?></span>
                      </div>
                    
                    <div class="form-group <?php echo (!empty($postal_err)) ? 'has-error' : ''; ?> col-sm-2">
						<label>Código Postal</label>
						<input type="text" name="postal" class="form-control" value="<?php echo $postal; ?>" autocomplete="off">
						<span class="text-danger"><?php echo $postal_err; ?></span>
					</div>    
                
					<div class="form-group <?php echo (!empty($telefono_err)) ? 'has-error' : ''; ?> col-sm-2">
						<label>Teléfono</label>
						<input type="text" name="telefono" class="form-control" value="<?php echo $telefono; ?>" autocomplete="off">
						<span class="text-danger"><?php echo $telefono_err; ?></span>
					</div>    
                    
                    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?> col-sm-3">
						<label>Correo electrónico</label>
						<input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="tu_correo@ejemplo.com" autocomplete="off">
						<span class="text-danger"><?php echo $email_err; ?></span>
					</div>   
				
				
			</div> 
            <hr>
            <p style="font-size:24px;">Seguridad</p>
            
            <div class="form-group <?php echo (!empty($contrase_err)) ? 'has-error' : ''; ?> col-sm-3">
						<label>Crea una contraseña*</label>
						<input type="password" name="contrase" class="form-control" value="<?php echo $contrase; ?>" autocomplete="off">
						<span class="text-danger"><?php echo $contrase_err; ?></span>
					</div>
					<div class="form-group <?php echo (!empty($confirm_ccontrase_err)) ? 'has-error' : ''; ?> col-sm-3">
						<label>Confirma contraseña*</label>
						<input type="password" name="confirm_contrase" class="form-control" value="<?php echo $confirm_contrase; ?>" autocomplete="off">
						<span class="text-danger"><?php echo $confirm_contrase_err; ?></span>
					</div>
            <hr>
            <div class="form-group col-sm-4">
                        <br>
						<input type="submit" class="btn btn-primary" value="Guardar cambios">
					</div>

        </form>
    </div>  
    
    
    
    
    
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
    
    
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            locale: 'es-es',
            format: 'yyyy/mm/dd'
        });
        $('#datepicker').val('<?php echo $fnacimiento; ?>');
    </script>


</body>
</html>