<?php

session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedinAl"]) && $_SESSION["loggedinAl"] === true){

    // Unset all of the session variables
    $_SESSION = array();
    
    // Destroy the session.
    session_destroy();
    
}
// Include config file
require_once "../Require/config.php";


 
// Define variables and initialize with empty values
$numeroControl = $contrase = $nivelActual = $hashed_contrase = $nombre = $paterno = $materno = "";
$numeroControl_err = $contrase_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if numero de control is empty
    if(empty(trim($_POST["numeroControl"]))){
        $numeroControl_err = "* El campo Número de Control está vacío.";
    } else{
        $numeroControl = trim($_POST["numeroControl"]);
    }
    
    // Check if contrase is empty
    if(empty(trim($_POST["contrase"]))){
        $contrase_err = "* ¡Olvidaste introducir tu contraseña!.";
    } else{
        $contrase = trim($_POST["contrase"]);
    }
    
    // Validate credentials
    if(empty($numeroControl_err) && empty($contrase_err)){
        // Prepare a select statement
        $sql = "SELECT id, numeroControl, curp, contrase,nombre, paterno, materno FROM alumnos WHERE numeroControl = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_numeroControl);
            
            // Set parameters
            $param_numeroControl = $numeroControl;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify contraseña
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $numeroControl, $curp, $hashed_contrase, $nombre, $paterno, $materno);
                    
                    if(mysqli_stmt_fetch($stmt)){
                        
                        if(password_verify($contrase, $hashed_contrase)){
                            // password is correct, so start a new session
                            
                          //  echo $hashed_contrase;
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedinAl"] = true;
                            $_SESSION["numeroControl"] = $numeroControl;
                            
                            
                            header("location: horarioAlVer.php");
   
                            
                        } else{
                            // Display an error message if password is not valid
                            $contrase_err = "Verifica que tu contraseña sea la correcta.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $numeroControl_err = "Número de Control no valido";
                }
            } else{
                echo "Oops! Algo salio mal. Por favor intenta más tarde.";
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
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <title>Consultar Horarios</title>
    
    
    
    
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
            background-color: darkorange;
        }
		header {
              background-color: black;
              
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

                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-8">
                        <img class="logo" src="../imagenes/itslnobreLargo.png" >
                    </div>
                    <div class="col-sm-4 col-md-3" style="text-align:center; padding-top:20px; ">
                        <img src="../imagenes/TecNMwhite.png" width="150px" height="auto" >
                    </div>

                </div>
                
                
                
                
                

                    <div class="row justify-content-md-center">

                        <div class="col-md-12 d-none d-sm-block" style="text-align:center;">


                            <div class="btn-group dropdown" role="group">

                                <a href="../home.php" class="btn btn-outline-light" role="button" aria-pressed="true" >&nbsp;&nbsp;Inicio&nbsp;</a>

                                <div class=" btn-group dropdown " role="group" > 

                                    <button class="btn btn-outline-light dropdown-toggle active" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Estudiantes
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <a class="dropdown-item" href="inscripcionAlumn.php" "dropdown-item">Inscripción</a>
                                        <a class="dropdown-item" href="reinscripcionAlumn.php" "dropdown-item">Reinscripción</a>
                                        <a class="dropdown-item" href="califiVeri.php" "dropdown-item">Consulta calificaciones</a>
                                        <a class="dropdown-item active" href="horarioAl.php" "dropdown-item">Consultar Horario</a>
                                    </div>

                                </div >

                                <div class=" btn-group dropdown " role="group" > 

                                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Docentes
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                        <a class="dropdown-item" href="../Docentes/IniciarSesionDo.php" "dropdown-item">Acceso Docentes</a>
                                    </div>

                                </div >

                                <div class=" btn-group dropdown " role="group" > 

                                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Administración
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                        <a class="dropdown-item" href="../Administradores/IniciarSesionAd.php" "dropdown-item">Administración</a>
                                    </div>

                                </div >

                            </div>    
                        </div>


                    </div>
                
                
                
                
                
                
                <div class="row justify-content-md-center collapse" id="navbarToggleExternalContent" >

                        <div class="col-xs-12 col-sm-12 d-block d-sm-none" style="text-align:center;" >


                            <div class="btn-group-vertical btn-block dropdown" role="group">

                                <a href="../home.php" class="btn btn-outline-light btn-block active" role="button" aria-pressed="true" >&nbsp;&nbsp;Inicio&nbsp;</a>

                                <div class=" btn-group dropdown " role="group" > 

                                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Estudiantes
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <a class="dropdown-item" href="inscripcionAlumn.php" "dropdown-item">Inscripción</a>
                                        <a class="dropdown-item" href="reinscripcionAlumn.php" "dropdown-item">Reinscripción</a>
                                        <a class="dropdown-item" href="califiVeri.php" "dropdown-item">Consulta calificaciones</a>
                                        <a class="dropdown-item active" href="horarioAl.php" "dropdown-item">Consultar Horario</a>
                                    </div>

                                </div >

                                <div class=" btn-group dropdown " role="group" > 

                                    <button class="btn btn-outline-light btn-block dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Docentes
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                        <a class="dropdown-item" href="../Docentes/IniciarSesionDo.php" "dropdown-item">Acceso Docentes</a>
                                    </div>

                                </div >

                                <div class=" btn-group dropdown " role="group" > 

                                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Administración
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                        <a class="dropdown-item" href="../Administradores/IniciarSesionAd.php" "dropdown-item">Administración</a>
                                    </div>

                                </div >

                            </div>   
                            
                        </div>


                    </div>
                  




            </div>
            
            <nav class="navbar navbar-expnad-lg navbar-light bg-light d-block d-sm-none">
                <button class="navbar-toggler d-block d-sm-none" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                </button>
            </nav>

        </header>
    
    <br><br><br><br>
    
    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-4" style="text-align:center; padding:50px 0 0 0; ">
                <img src="../imagenes/hor.png" width="290px" height="auto" >

            </div>
            
            <div class="col-sm-4" style="padding: 50px 0 100px 0; font-size: 14px;">
                <div class="p-4 mb-2 bg-light text-dark">
                
                    <p style="font-size:24px;">Consulta de Horarios</p>
                    <p>Por favor ingresa tu Número de Control y contraseña.</p>
                    
                         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        
                        
                        <div class="form-group <?php echo (!empty($numeroControl_err)) ? 'has-error' : ''; ?>">
                            <label>Número de Control</label>
                            <input type="text" name="numeroControl" maxlength="8" class="form-control" value="<?php echo $numeroControl; ?>">
                            <span class="text-danger"><?php echo $numeroControl_err; ?></span>
                        </div>    
                        
                        <div class="form-group <?php echo (!empty($contrase_err)) ? 'has-error' : ''; ?>">
                            <label>Contraseña</label>
                            <input type="password" name="contrase" class="form-control">
                            <span class="text-danger"><?php echo $contrase_err; ?></span>
                            <a href="recupeContra.php">¿Olvidaste tu contraseña?</a>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Iniciar Sesión">
                            
                        </div>
                        
                        
                    </form>
                    
                    
                </div>
                
            </div>
            <div class="col-sm-4" style="text-align:center; padding:35px 0 0 0; ">
                <img src="../imagenes/hor2.png" width="250px" height="auto" >

            </div>
            
        </div>
        
    </div>
    
    


    
    
    <br><br><br>
    
    
    
    
    
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