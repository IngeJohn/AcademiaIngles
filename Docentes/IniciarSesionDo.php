<?php

// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: Require/logout.php");
}
// Include config file
require_once "../Require/config.php";
 
// Define variables and initialize with empty values
$username = $password = $category = $idmaestro = $nombre = $paterno = $materno = $hashed_password ="";
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
        $sql = "SELECT id, username, password, category, nombre, paterno, materno, idmaestro FROM docentes WHERE username = ?";
        
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
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $category, $nombre, $paterno, $materno, $idmaestro);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;   
                            $_SESSION["category"] = $category;
                            $_SESSION["nombre"] = $nombre;
                            $_SESSION["paterno"] = $paterno;
                            $_SESSION["materno"] = $materno;
							$_SESSION["idmaestro"] = $idmaestro;
                            $_SESSION["contraseña"] = $hashed_password;
							
                            
                            static $cate ;
                            $cate = "yo";
                            if($_SESSION["category"] == 1){
                                $cate;
                                $cate = "Estudiante";
                                header("location: Estudiantes.php");
                            }elseif($_SESSION["category"] == 2){
                                $cate ;
                                $cate = "Docente";
                                header("location: Docentes.php");
                            }elseif($_SESSION["category"] == 3){
                                $cate ;
                                $cate = "Contador";
                                header("location: Contadores.php");
                            }elseif($_SESSION["category"] == 4){
                                $cate ;
                                $cate = "Administrador";
                                // Redirect user to welcome page
                                header("location: Administrador.php");
                            } 
                            
                            
                            
                            
                            
                            
                            
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "La contraseña que ingresaste no es valida.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No se encontro una cuenta con ese nombre.";
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
    <title>ITSL - Academia de Inglés</title>
    
    <link rel="stylesheet" href="../bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="../npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="../ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="../imagenes/itsl2.png">
    <style type="text/css">
        body{
            background-color: #0a6d7a;
            font-size: 16px;
            }
        header{
            background-color: #000000;
               }

        footer{
            background: #000000;
              }

        .baner{
        background: #15859A;
        color: white;


              }

        .foto{
             background: #15859A;

             }
        
        
        
        .lista{
            padding-left: 10px;
            color: white;
            font-size: 13px;
            text-align: left;
              }
        .contenedor{
            position: relative;
            width: 85%;
              }
        .mainfoto{
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
            width: 100%;
            height: auto;
                 }
        .subtitulo{
            position: relative;
            left:15px;
            bottom: 49px;
            padding: 13px 20px 13px 20px;
            width: 96%;
            color: white;
            background: black;
            opacity: .75;
            border-radius: 8px;
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
        .remove-padding{
            padding:  0;
            margin:  0;
        }
        
        .logo{
            width: 40%;
            height: auto;
            
        }
        
        #inf{
            color:white; 
            font-size: 2vw;  
            font-family:Verdana; 
            text-align:center; 
            transform: scale(.9, 1);
        }
        
        
        
        /*para pantallas de PC*/
        @media (max-width: 992px){
            .logo{
                width: 50%;
                height: auto;

            }
            .subtitulo{
                position: relative;
                left:15px;
                bottom: 34px;
                padding: 5px 0px 5px 20px;
                width: 96%;
                color: white;
                background: black;
                opacity: .75;
                border-radius: 8px;
            }
            .lista{
                margin-left: 30px;
            }
            #inf{
                color:white; 
                font-size: 1.8vw;  
                font-family:Verdana; 
                text-align:center; 
                transform: scale(.9, 1);
            }
            .caja{
                background: #ffffff;
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
            .subtitulo{
                position: relative;
                left:15px;
                bottom: 135px;
                padding: 5px 0px 5px 20px;
                width: 96%;
                color: white;
                background: black;
                opacity: 0.75;
                border-radius: 8px;
            }
            #inf{
                color:white; 
                font-size: 2vw;  
                font-family:Verdana; 
                text-align:center; 
                transform: scale(.9, 1);
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
            .subtitulo{
                position: relative;
                left:15px;
                bottom: 250px;
                padding: 5px 0px 5px 20px;
                width: 96%;
                color: white;
                background: black;
                opacity: 0.75;
                border-radius: 8px;
            }
            #inf{
                color:white; 
                font-size: 6vw;  
                font-family:Verdana; 
                text-align:center; 
                transform: scale(.9, 1);
            }
            
            
            
        }

            
        
        



    </style>
</head>


<body>

    <header>
        
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">


                    <img class="logo" src="../imagenes/itslnobreLargo.png" >



                </div>
                
                <div class="row">
                    <div class="col-lg-10">
                    
                    </div>
                    <div class="col-lg-2" >


                        <div class="btn-group dropdown" role="group">

                            <a href="../home.php" class="btn btn-outline-light " role="button" aria-pressed="true" >&nbsp;&nbsp;Inicio&nbsp;</a>

                            <div class=" btn-group dropdown " role="group" > 

                                <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    Estudiantes
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <a class="dropdown-item" href="../Alumnos/inscripcionAlumn.php" "dropdown-item">Inscripción</a>
                                    <a class="dropdown-item" href="../Alumnos/reinscripcionAlumn.php" "dropdown-item">Reinscripción</a>
                                    <a class="dropdown-item" href="../Alumnos/alumnos.php" "dropdown-item">Consulta calificaciones</a>
                                </div>

                            </div >

                            <div class=" btn-group dropdown " role="group" > 

                                <button class="btn btn-outline-light dropdown-toggle active" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    Docentes
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                    <a class="dropdown-item active" href="../Docentes/IniciarSesionDo.php" "dropdown-item">Acceso Docentes</a>
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
        </div>

    </header>




    <div class="container-fluid">
        <div class="row ">
            <div class="col-sm-4" style="text-align:center; padding:100px 0 0 90px; ">
                <img src="../imagenes/teacher.png" width="200px" height="auto" >

            </div>
            
            <div class="col-sm-4" style="padding: 50px 0 100px 0; font-size: 14px;">
                <div class="p-4 mb-2 bg-light text-dark">
                    <p><a href="../home.php"><u>Inicio</u></a> > Acceso Docentes</p>
                    <p style="font-size:24px;">Acceso Docentes</p>
                    <p>Por favor ingrese sus credenciales para inicar sesión.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Nombre de Usuario</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>    
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Contraseña</label>
                            <input type="password" name="password" class="form-control">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Iniciar Sesión">
                        </div>
                    </form>
                </div>
                
            </div>
            <div class="col-sm-4" style="text-align:center; padding:100px 0 0 0; ">
                <img src="../imagenes/TecNMwhite.png" width="300px" height="auto" >

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