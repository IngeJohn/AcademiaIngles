<?php
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../Alumnos/logoutAl.php");
}
// Include config file
require_once "../Require/config.php";
 
// Define variables and initialize with empty values
$numeroControl = $curp = $nombre = $paterno = $materno = $sexo = $direccion = $telefono =$nivelActual = $idmaestroActual = $estado = $modalidad = "";
$numeroControl_err = $curp_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if numero de control is empty
    if(empty(trim($_POST["numeroControl"]))){
        $numeroControl_err = "* El campo Número de Control está vacío.";
    } else{
        $numeroControl = trim($_POST["numeroControl"]);
    }
    
    // Check if curp is empty
    if(empty(trim($_POST["curp"]))){
        $curp_err = "* El campo CURP está vacío.";
    } else{
        $curp = trim($_POST["curp"]);
    }
    
    // Validate credentials
    if(empty($numeroControl_err) && empty($curp_err)){
        // Prepare a select statement
        $sql = "SELECT id, numeroControl, curp FROM alumnos WHERE numeroControl = ? ";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_numeroControl);
            
            // Set parameters
            $param_numeroControl = $numeroControl;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify curp
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $numeroControl, $curp2 );
                    if(mysqli_stmt_fetch($stmt)){
                        if($curp == $curp2){
                            // curp is correct, so start a new session
                            session_start();
                            echo "se inicio sesion";
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;   
                            $_SESSION["numeroControl"] = $numeroControl;
                            $_SESSION["curp"] = $curp;
                           
                            
                            header("location: reinscripcionAlumn.php");
                            
                            
                        } else{
                            // Display an error message if password is not valid
                            $curp_err = "El número de CURP que ingresaste no es valido.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $numeroControl_err = "No se encontro información con ese número de control.";
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
    
    <link rel="stylesheet" href="../bootstrap/3.3.7/css/bootstrap.css">
    
    
    <link rel="icon" href="../imagenes/itsl2.png">
    <style type="text/css">
        body{
            background-image: linear-gradient(to bottom, #0a6d7a 580px, white  30%);
            background-size: cover;
            background-repeat: no-repeat;
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
        a:link{
            color: white;
            padding: 16px;
            padding-top: 20px;
              }
        a:visited{
            color: white;

              }
        a:hover {
            color: lightgray;
            text-decoration: none;
              }
        .menu{
            padding: 15px 0 0 0;
            text-align: center;
             }
        .menuImagen{
            text-align: center;
            padding: 3px;
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
            bottom: 48px;
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
        @media (max-width: 980px){
            .subtitulo{
                opacity: 1;
                bottom: 3px;
                left:10px;
            }
            .lista{
                margin-left: 30px;
            }
        }




    </style>
</head>


<body>

    <header>
        
            
        
        

         <div class="container-fluid" >
             <div class="row">
		          <div class="col-sm-4 menuImagen" >
                        <img src="../imagenes/itslnobreLargo.png" width="70%" height="auto">
                  </div>
                  <div class="col-sm-4" >
                          <div class="row">
                             <div class="col-sm-4" >

                                    <p class="menu">
                                      <a href="../home.php" >Inicio</a>
                                      </p>

                              </div>
                              <div class="col-sm-4">

                                    <p class="menu">
                                      
                                     </p>

                              </div>
                              <div class="col-sm-4">

                                    <p class="menu">
                                        
                                     </p>

                              </div>
                            </div>
                  </div>

                 <div class="col-sm-4" >

                     <!-- Columna vacia -->

                 </div>
            </div>
        </div>

    </header>


<div class="container-fluid">
        <div class="row" style="padding-bottom: 10px; padding-top: 20px; background:#0a6d7a">
            <div class="col-sm-4" style="text-align:center; padding-bottom:20px; ">
                <img src="../imagenes/TecNMwhite.png" width="200px" height="auto" >

            </div>

            

            <div class="col-sm-6">
                <div class="lista">
                        <p  style="line-height: 2; font-size: 30px;">
                            <br>Reinscripción, ingresa tus datos.
                            
                        </p>
                </div>

            </div>
             
        </div>
</div>

    <div class="container-fluid">
        <div class="row" style="padding-bottom: 10px; padding-top: 20px; background:white">
            <div class="col-sm-4" style="text-align:center; padding-bottom:20px; "></div>
            
            <div class="col-sm-4" style="text-align:center; padding-bottom:20px; ">
                
                    <div>
                        
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="form-group <?php echo (!empty($numeroControl_err)) ? 'has-error' : ''; ?>">
                                <p>Ver estado de alumno para reinscripción</p>
                                <label><br>Número de Control</label>
                                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" name="numeroControl" class="form-control" value="<?php echo $numeroControl; ?>" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                                <span class="help-block"><?php echo $numeroControl_err; ?></span>
                            </div>    
                            <div class="form-group <?php echo (!empty($curp_err)) ? 'has-error' : ''; ?>">
                                <label>CURP</label>
                                <input type="text" name="curp" onkeydown="upperCaseF(this)" maxlength="18" class="form-control" autocomplete="off" readonly onfocus="this.removeAttribute('readonly');">
                                <span class="help-block"><?php echo $curp_err; ?></span>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Enviar">
                            </div>
                            
                        </form>
                    </div>
                
            </div>
            <div class="col-sm-4" style="text-align:center; padding-bottom:20px; "></div>
            
        </div>
    </div>

     <div class="container-fluid">
         <div class="row" style="background:#0a6d7a; ">
            <div class="col-md-3 bordes" >
                <p><br><br><br><br><br><br></p>
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
                    <p><br><br><br><br><br></p>
                </div>
                <div class="col-md-3 ">
                    <p></p>
                </div>
            </div>


        </div>


    </footer>
    
    <script>
        function upperCaseF(a){
            setTimeout(function(){
            a.value = a.value.toUpperCase();
            }, 1);
        }
    </script>
    

</body>
</html>