<?php
// Include config file
require_once "../Require/config.php";
 
// Define variables and initialize with empty values
$numeroControl = $curp = $confirm_curp = $category = $nombre = $paterno = $materno = $direccion = $telefono = $grupo = $nivelActual = "";
$numeroControl_err = $curp_err = $confirm_curp_err = $category_err = $nombre_err = $paterno_err = $materno_err = $direccion_err = $telefono_err = $grupo_err = $nivelActual_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        //_________________
    
      
        //_________________
    
     if(empty(trim($_POST["grupo"]))){
        $grupo_err = "Selecciona tu grupo.";
    } else{
         $grupo = trim($_POST["grupo"]);
            } 
        //_________________
    
     if(empty(trim($_POST["nivelActual"]))){
        $nivelActual_err = "Selecciona el nivel de inglés al que te estas inscribiendo.";
    } else{
         $nivelActual = trim($_POST["nivelActual"]);
            } 
        //_________________		
    
        //_________________
    
     if(empty(trim($_POST["nombre"]))){
        $nombre_err = "Introduce tu nombre o nombres.";
    } else{
         $nombre = trim($_POST["nombre"]);
            } 
    //_________________
    
     if(empty(trim($_POST["paterno"]))){
        $paterno_err = "Introduce tu apellido paterno.";
    } else{
         $paterno = trim($_POST["paterno"]);
            } 
    //_________________
    
     if(empty(trim($_POST["materno"]))){
        $materno_err = "Introduce tu apellido materno.";
    } else{
         $materno = trim($_POST["materno"]);
            } 
    //_________________
    
     if(empty(trim($_POST["direccion"]))){
        $direccion_err = "Introduce tu dirección.";
    } else{
         $direccion = trim($_POST["direccion"]);
            } 
    //_________________
    
     if(empty(trim($_POST["telefono"]))){
        $telefono_err = "Introduce tu número de teléfono.";
    } elseif(strlen(trim($_POST["telefono"])) < 10){
        $telefono_err = "EL número de teléfono debe tener 10 dígitos.";
    } else{
         $telefono = trim($_POST["telefono"]);
            } 
    

 
    // Validate numeroControl
    if(empty(trim($_POST["numeroControl"]))){
        $numeroControl_err = "Introduce tu Número de Control.";
    } elseif(strlen(trim($_POST["numerControl"])) < 8){
        $numeroControl_err = "El número de Control debe tener 18 dígitos.";
    } else{
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
                    $numeroControl_err = "Este número de control ya existe en el sistema.";
                } else{
                    $numeroControl = trim($_POST["numeroControl"]);
                }
            } else{
                echo "Oops! Algo salio mal, intenta más tarde.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate curp
    if(empty(trim($_POST["curp"]))){
        $curp_err = "Introduce tu CURP.";     
    } elseif(strlen(trim($_POST["curp"])) < 18){
        $curp_err = "CURP debe tener 18 caracteres alfanuméricos.";
    } else{
        $curp = trim($_POST["curp"]);
    }
    
    // Validate confirm CURP
    if(empty(trim($_POST["confirm_curp"]))){
        $confirm_curp_err = "Confirma el CURP.";     
    } else{
        $confirm_cup = trim($_POST["confirm_curp"]);
        if(empty($curp_err) && ($curp != $confirm_curp)){
            $confirm_curp_err = "Las CURPs no coinciden.";
        }
    }

    // Check input errors before inserting in database
    if(empty($numeroControl_err) && empty($curp_err) && empty($confirm_curp_err) && empty($category_err)&& empty($nombre_err) && empty($paterno_err) && empty($materno_err) && empty($direccion_err) && empty($telefono_err) && empty($grupo_err) && empty($nivelActual_err) && empty($idmaestro_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO alumnos (numeroControl, curp, category, nombre, paterno, materno, direccion, telefono, grupoActual, nivelActual, estado) VALUES (?,?,'1',?,?,?,?,?,?,?,'1')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_numeroControl, $param_curp, $param_nombre, $param_paterno, $param_materno, $param_direccion, $param_telefono, $param_grupo, $param_nivelActual);
            
            // Set parameters
            $param_numeroControl = $numeroControl;
            $param_curp = $curp;
            //$param_category = $category;
            $param_nombre = $nombre;
            $param_paterno = $paterno;
            $param_materno = $materno;
            $param_direccion = $direccion;
            $param_telefono = $telefono;
			$param_grupo = $grupo;
			$param_nivelActual = $nivelActual;
			
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
				$message = "Respuesta incorrecta";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("location: registerAlumnos.php");
            } else{
                echo "Algo salio mal, intentalo más tarde.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscripción alumnos de nuevo ingreso</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
		header {
              background-color: #000000;
              padding: 3px;
              text-align: center;
              font-size: 30px;
              color: white;
               }
		.demo-content{
        background: #ffffff;
		padding-top: 40px;
        padding-left: 40px;
        padding-right: 100px;
    }
    </style>
</head>
<body>
    <header>
        <h2>Academia de Inglés del Instituto Tecnológico Superior de Loreto</h2>
    </header>
    <div class="container-fluid demo-content">
	    <p><a href="Administrador.php"><u>Ménu Principal</u></a> > Registrar Alumnos</p>
        <h2>Registro de Alumnos</h2>
        <p>Llena esta forma para inscribirte en el curso de Inglés</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class= "row">
				<div class= "col-sm-6">
				<div class= "demo-content">
					<div class="form-group <?php echo (!empty($numeroControl_err)) ? 'has-error' : ''; ?>">
						<label>Numero de control</label>
						<input type="text" name="numeroControl" class="form-control" value="<?php echo $numeroControl; ?>">
						<span class="help-block"><?php echo $numeroControl_err; ?></span>
					</div>             
					<div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?>">
						<label>Nombre(s)</label>
						<input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
						<span class="help-block"><?php echo $nombre_err; ?></span>
					</div> 
					<div class="form-group <?php echo (!empty($paterno_err)) ? 'has-error' : ''; ?>">
						<label>Apellido paterno</label>
						<input type="text" name="paterno" class="form-control" value="<?php echo $paterno; ?>">
						<span class="help-block"><?php echo $paterno_err; ?></span>
					</div> 
					<div class="form-group <?php echo (!empty($materno_err)) ? 'has-error' : ''; ?>">
						<label>Apellido materno</label>
						<input type="text" name="materno" class="form-control" value="<?php echo $materno; ?>">
						<span class="help-block"><?php echo $materno_err; ?></span>
					</div> 
					
					<div class="form-group">

						<label>Nivel     /    Grupo   </label>
						
						
						<select name= "nivelActual" >
							<option value ="1">1</option>
							
						</select> 

					

						
						
						<select name= "grupo" >
							<option value ="A">A</option>
							<option value ="B">B</option>
							<option value ="C">C</option>
							<option value ="D">D</option>
							<option value ="E">E</option>
							<option value ="F">F</option>
                            <option value ="G">G</option>
                            <option value ="H">H</option>
                            <option value ="I">I</option>
						</select> 
					</div>
					
				</div> 
				</div> 	
				<div class= "col-sm-6">
				<div class= "demo-content">
				<div class="form-group <?php echo (!empty($direccion_err)) ? 'has-error' : ''; ?>">
						<label>Dirección</label>
						<input type="text" name="direccion" class="form-control" value="<?php echo $direccion; ?>">
						<span class="help-block"><?php echo $direccion_err; ?></span>
					</div>
					<div class="form-group <?php echo (!empty($telefono_err)) ? 'has-error' : ''; ?>">
						<label>Teléfono</label>
						<input type="text" name="telefono" class="form-control" value="<?php echo $telefono; ?>">
						<span class="help-block"><?php echo $telefono_err; ?></span>
					</div>    
					<div class="form-group <?php echo (!empty($curp_err)) ? 'has-error' : ''; ?>">
						<label>CURP</label>
						<input type="text" name="curp" class="form-control" value="<?php echo $curp; ?>">
						<span class="help-block"><?php echo $curp_err; ?></span>
					</div>
					<div class="form-group <?php echo (!empty($confirm_curp_err)) ? 'has-error' : ''; ?>">
						<label>Confirmar CURP</label>
						<input type="text" name="confirm_curp" class="form-control" value="<?php echo $confirm_curp; ?>">
						<span class="help-block"><?php echo $confirm_curp_err; ?></span>
					</div>
					
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Guardar">
						<input type="reset" class="btn btn-default" value="Reiniciar">
					</div>
				</div> 
				</div> 
			</div> 

        </form>
    </div>    
</body>
</html>