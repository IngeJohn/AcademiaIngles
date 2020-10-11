<?php
// Include config file
require_once "../Require/config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $category = $nombre = $paterno = $materno = $numeroControl = $grupo = $nivelActual = $idmaestro = "";
$username_err = $password_err = $confirm_password_err = $category_err = $nombre_err = $paterno_err = $materno_err = $numeroControl_err = $grupo_err = $nivelActual_err = $idmaestro_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        //_________________
    
     if(empty(trim($_POST["numeroControl"]))){
        $numeroControl_err = "Please enter control number.";
    } else{
         $numeroControl = trim($_POST["numeroControl"]);
            }   
        //_________________
    
     if(empty(trim($_POST["grupo"]))){
        $grupo_err = "Please enter grupo.";
    } else{
         $grupo = trim($_POST["grupo"]);
            } 
        //_________________
    
     if(empty(trim($_POST["nivelActual"]))){
        $nivelActual_err = "Please enter nivelActual.";
    } else{
         $nivelActual = trim($_POST["nivelActual"]);
            } 
        //_________________
    
     if(empty(trim($_POST["idmaestro"]))){
        $idmaestro_err = "Please enter idmaestro.";
    } else{
         $idmaestro = trim($_POST["idmaestro"]);
            } 			
    
        //_________________
    
     if(empty(trim($_POST["nombre"]))){
        $nombre_err = "Please enter name.";
    } else{
         $nombre = trim($_POST["nombre"]);
            } 
    //_________________
    
     if(empty(trim($_POST["paterno"]))){
        $paterno_err = "Please enter lastname.";
    } else{
         $paterno = trim($_POST["paterno"]);
            } 
    //_________________
    
     if(empty(trim($_POST["materno"]))){
        $materno_err = "Please enter mother´s lastname.";
    } else{
         $materno = trim($_POST["materno"]);
            } 

 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM alumnos WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    //_________________
    
 //    if(empty(trim($_POST["category"]))){
 //       $category_err = "Please enter category.";
 //   } elseif(strlen(trim($_POST["category"])) < 1){
 //       $category_err = "category must have atleast 1 characters.";
//    } elseif(trim($_POST["category"]) > 4){
//        $category_err = "category must be : 1, 2, 3 o 4.";
 //   }else{
  //       $category = trim($_POST["category"]);
   //         } 

         

    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($category_err)&& empty($nombre_err) && empty($paterno_password_err) && empty($materno_err) && empty($numeroControl_err) && empty($grupo_err) && empty($nivelActual_err) && empty($idmaestro_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO alumnos (username, password, category, nombre, paterno, materno, numeroControl, grupoActual, nivelActual, idmaestroActual, estado) VALUES (?, ?, '1', ?, ?, ?, ?,?,?,?,'1')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_username, $param_password, $param_nombre, $param_paterno, $param_materno, $param_numeroControl, $param_grupo, $param_nivelActual, $param_idmaestro);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            //$param_category = $category;
            $param_nombre = $nombre;
            $param_paterno = $paterno;
            $param_materno = $materno;
            $param_numeroControl = $numeroControl;
			$param_grupo = $grupo;
			$param_nivelActual = $nivelActual;
			$param_idmaestro = $idmaestro;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
				$message = "wrong answer";
                echo "<script type='text/javascript'>alert('$message');</script>";
                header("location: registerAlumnos.php");
            } else{
                echo "Something went wrong. Please try again later.";
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
    <title>Registro de Usuarios</title>
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
        <p>Llena esta forma para crear una cuenta nueva.</p>
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
							<option value ="2">2</option>
							<option value ="3">3</option>
							<option value ="4">4</option>
							<option value ="5">5</option>
							<option value ="6">6</option>
						</select> 

					

						
						
						<select name= "grupo" >
							<option value ="A">A</option>
							<option value ="B">B</option>
							<option value ="C">C</option>
							<option value ="D">D</option>
							<option value ="E">E</option>
							<option value ="F">F</option>
						</select> 
					</div>
					
				</div> 
				</div> 	
				<div class= "col-sm-6">
				<div class= "demo-content">
				<div class="form-group <?php echo (!empty($idmaestro_err)) ? 'has-error' : ''; ?>">
						<label>Maestro</label>
						<input type="text" name="idmaestro" class="form-control" value="<?php echo $idmaestro; ?>">
						<span class="help-block"><?php echo $idmaestro_err; ?></span>
					</div>
					<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
						<label>Nombre de usuario</label>
						<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
						<span class="help-block"><?php echo $username_err; ?></span>
					</div>    
					<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
						<label>Contraseña</label>
						<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
						<span class="help-block"><?php echo $password_err; ?></span>
					</div>
					<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
						<label>Confirmar contraseña</label>
						<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
						<span class="help-block"><?php echo $confirm_password_err; ?></span>
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