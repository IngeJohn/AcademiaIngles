<?php

session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedinAd"]) && $_SESSION["loggedinAd"] === true){

    // Unset all of the session variables
    $_SESSION = array();
    
    // Destroy the session.
    session_destroy();
    
}
// Include config file
require_once "../Require/config.php";
 
// Define variables and initialize with empty values
$username = $password = $idmaestro = $nombre = $paterno = $materno = $hashed_password = $roll = $titulo = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Porfavor introduce tu nombre de usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Pofavor introduce tu contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password, nombre, paterno, materno, idmaestro, roll, titulo FROM docentes WHERE username = ? AND roll = 1 ";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password, $nombre, $paterno, $materno, $idmaestro, $roll, $titulo);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedinAd"] = true;
                            $_SESSION["username"] = $username;   
                            $_SESSION["nombre"] = $nombre;
                            $_SESSION["paterno"] = $paterno;
                            $_SESSION["materno"] = $materno;
							$_SESSION["idmaestro"] = $idmaestro;
                            $_SESSION["contraseña"] = $hashed_password;
                            $_SESSION["roll"] = $roll;
                            $_SESSION["nombreCompleto"] = $titulo." ".$nombre." ".$paterno." ".$materno;
                            
                            
                            
                            if ($stmt3 = $link->prepare("SELECT  periodo, periodoAnterior FROM periodoactual")) {
                                $stmt3->execute();

                                /* bind variables to prepared statement */
                                $stmt3->bind_result($periActuBD, $periAnteriorBD);

                                /* fetch values */
                                $stmt3->fetch();

                                    /* close statement */
                                    $stmt3->close();
                                }
                            
                            
                            
                            
                            $_SESSION['periodoDB'] = $periActuBD;
                            $_SESSION['periodoAnteriorDB'] = $periAnteriorBD;
							
                                // Redirect user to welcome page
                                header("location: Administrador.php");
                            
                            
                            
                            
                            
                            
                            
                            
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "La contraseña que ingresaste no es valida.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No se encontro una cuenta con ese nombre o no tienes privilegios de administrador.";
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
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administradores - ITSL Inglés</title>
    
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
<style type="text/css">
        body{
            background-color: #283747;
            
            }
        header{
            background-color: #000000;
               }

        footer{
            background: #000000;
              }



        .foto{
             background: #15859A;

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
        
       .logo{
            width: 50%;
            height: auto;
            padding-top: 30px;
        }
        
        
        
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

        }
        
        /*Para dispositivos moviles*/
        @media screen and (max-width: 400px) {
            
            .logo{
                width: 80%;
                height: auto;
                padding: 10px 0 10px 0;
                
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

                                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Estudiantes
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <a class="dropdown-item" href="../Alumnos/inscripcionAlumn.php" "dropdown-item">Inscripción</a>
                                        <a class="dropdown-item" href="../Alumnos/reinscripcionAlumn.php" "dropdown-item">Reinscripción</a>
                                        <a class="dropdown-item" href="../Alumnos/califiVeri.php" "dropdown-item">Consulta calificaciones</a>
                                        <a class="dropdown-item" href="../Alumnos/horarioAl.php" "dropdown-item">Consultar Horario</a>
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

                                    <button class="btn btn-outline-light dropdown-toggle active" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Administración
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                        <a class="dropdown-item active" href="IniciarSesionAd.php" "dropdown-item">Administración</a>
                                    </div>

                                </div >

                            </div>    
                        </div>


                    </div>
                
                
                
                
                
                
                <div class="row justify-content-md-center collapse" id="navbarToggleExternalContent" >

                        <div class="col-xs-12 col-sm-12 d-block d-sm-none" style="text-align:center;" >


                            <div class="btn-group-vertical btn-block dropdown" role="group">

                                <a href="../home.php" class="btn btn-outline-light btn-block" role="button" aria-pressed="true" >&nbsp;&nbsp;Inicio&nbsp;</a>

                                <div class=" btn-group dropdown " role="group" > 

                                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Estudiantes
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <a class="dropdown-item" href="../Alumnos/inscripcionAlumn.php" "dropdown-item">Inscripción</a>
                                        <a class="dropdown-item" href="../Alumnos/reinscripcionAlumn.php" "dropdown-item">Reinscripción</a>
                                        <a class="dropdown-item" href="../Alumnos/califiVeri.php" "dropdown-item">Consulta calificaciones</a>
                                        <a class="dropdown-item" href="../Alumnos/horarioAl.php" "dropdown-item">Consultar Horario</a>
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

                                    <button class="btn btn-outline-light dropdown-toggle active" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Administración
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                        <a class="dropdown-item active" href="IniciarSesionAd.php" "dropdown-item">Administración</a>
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

<br><br><br><br><br><br>




    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-4" style="text-align:center; padding:0 0 0 0; ">
                <img src="../imagenes/admin1.png" width="210px" height="auto" >

            </div>
            
            <div class="col-sm-4" style="padding: 0 0 0 0; font-size: 14px;">
                <div class="p-4 mb-2 bg-light text-dark">
                    <p style="font-size:24px;">Acceso Administradores</p>
                    <p>Por favor ingrese sus credenciales para inicar sesión.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre de Usuario</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="text-danger"><?php echo $username_err; ?></span>
                        </div>    
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control">
                            <span class="text-danger"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Iniciar Sesión">
                        </div>
                    </form>
                </div>
                
            </div>
            <div class="col-sm-4" style="text-align:center; padding:0 0 0 0; ">
                <img src="../imagenes/admin2.png" width="190px" height="auto" >

            </div>
            
        </div>
        
    </div>

    
<hr>

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