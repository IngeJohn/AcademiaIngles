<?php

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedinA"]) && $_SESSION["loggedinA"] === true){
    
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session.
    session_destroy();
}
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedinAl"]) && $_SESSION["loggedinAl"] === true){
    
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session.
    session_destroy();
}
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedinDo"]) && $_SESSION["loggedinDo"] === true){
    
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session.
    session_destroy();
}
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedinAd"]) && $_SESSION["loggedinAd"] === true){
    
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session.
    session_destroy();
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITSL - Academia de Inglés</title>
    
    
    <link rel="stylesheet" href="bootstrap/4.5.3/dist/css/bootstrap.min.css" 
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
          crossorigin="anonymous">
    
    <script src="jquery/3.5.1/jquery-3.5.1.slim.min.js" 
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
            crossorigin="anonymous"></script>
    
    <script src="bootstrap/4.5.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" 
            crossorigin="anonymous"></script>
    
    <script src="ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
    
    <link rel="icon" href="imagenes/itsl2.png">
    
    
    <style type="text/css">
        
        html {
                /*If you had a black or close to black background*/
                background-color: #000000;
            }
        
        body{
            display: none;
            background-image: linear-gradient(to bottom, #0a6d7a 580px, white  30%);

            }
        
        header{
            background-color: #000000;
               }
        
        footer{
            background: #000000;
              }
        
        .logo{
            width: 50%;
            height: auto;
            padding-top: 30px;
        }

        .lista{
            color: white;
            font-size: 15px;
            text-align: left;
            font-weight: 600;
              }

        .mainfoto{
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
            width: 100%;
            height: auto;
                 }
        
        .remove-padding{
            padding:  0;
            margin:  0;
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
        

        
        

        

/*===================================================================================================*/
                /* Extra small devices (phones, 600px and down) col-xs white */
        @media only screen and (max-width: 600px) {
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
                font-size: 12px;
                padding:0 0 0 40px;
            }
            #inf{
                color:white; 
                font-size: 17px;
                text-align:center; 
                padding: 20px 8px;
            }
            
        }

        /* Small devices (portrait tablets and large phones, 600px and up) col-sm yellow */
        @media only screen and (min-width: 600px) {
            
            
            body{

                background-image: linear-gradient(to bottom, #0a6d7a 860px, white  20%);
                
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
                font-size: 12px;
                padding: 0 0 0 40px;
            }
            #inf{
                color:white; 
                font-size: 17px;
                text-align:center; 
                padding: 20px 8px;
            }
            
            
        }

        /* Medium devices (landscape tablets, big phones, NOTE 4, 768px and up) col-md pink */
        @media only screen and (min-width: 768px) {
            
            body{

                background-image: linear-gradient(to bottom, #0a6d7a 560px, white  20%);
                
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
                font-size: 12px;
                padding: 0 0 0 0;
            }
            #inf{
                color:white; 
                font-size: 17px;
                text-align:center; 
                padding: 20px 8px;
            }
            
            
        }

        /* Large devices (laptops/desktops, 992px and up)  col-lg purple */
        @media only screen and (min-width: 992px) {
            
            body{

                background-image: linear-gradient(to bottom, #0a6d7a 630px, white  20%);
                
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
                font-size: 12px;
            }
            #inf{
                color:white; 
                font-size: 23px;
                text-align:center; 
                padding: 30px 10px;
            }
            
            
        }

        /* Extra large devices, my laptop, (large laptops and desktops, 1200px and up) col-xl red */
        @media only screen and (min-width: 1200px) {
            
            body{

                background-image: linear-gradient(to bottom, #0a6d7a 700px, white  20%);
                
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
                font-size: 15px;
            }
            
            #inf{
                color:white; 
                font-size: 28px;
                text-align:center; 
                padding: 30px 10px;
            }
            
        }
            
        /* Extra large devices, my monitor (large laptops and desktops, 1200px and up) col-xl green */
        @media only screen and (min-width: 1600px) {
            
           
            
        }
            
        
        



    </style>
    
        <script type="text/javascript">

            $(document).ready(function() {
                    $("body").css("display", "none");
                    $("body").fadeIn(1000);
            });

        </script>
    
    </head>


    <body>

        <header>

            <div class="container-fluid">

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-8">
                        <img class="logo" src="imagenes/itslnobreLargo.png" >
                    </div>
                    <div class="col-sm-4 col-md-3" style="text-align:center; padding-top:20px; ">
                        <img src="imagenes/TecNMwhite.png" width="150px" height="auto" >
                    </div>

                </div>
                
                
                
                
                

                    <div class="row justify-content-md-center">

                        <div class="col-md-12 d-none d-sm-block" style="text-align:center;">


                            <div class="btn-group dropdown" role="group">

                                <a href="home.php" class="btn btn-outline-light active" role="button" aria-pressed="true" >&nbsp;&nbsp;Inicio&nbsp;</a>

                                <div class=" btn-group dropdown " role="group" > 

                                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Estudiantes
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <a class="dropdown-item" href="Alumnos/inscripcionAlumn.php" "dropdown-item">Inscripción</a>
                                        <a class="dropdown-item" href="Alumnos/reinscripcionAlumn.php" "dropdown-item">Reinscripción</a>
                                        <a class="dropdown-item" href="Alumnos/califiVeri.php" "dropdown-item">Consulta calificaciones</a>
                                        <a class="dropdown-item" href="Alumnos/horarioAl.php" "dropdown-item">Consultar Horario</a>
                                    </div>

                                </div >

                                <div class=" btn-group dropdown " role="group" > 

                                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Docentes
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                        <a class="dropdown-item" href="Docentes/IniciarSesionDo.php" "dropdown-item">Acceso Docentes</a>
                                    </div>

                                </div >

                                <div class=" btn-group dropdown " role="group" > 

                                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Administración
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                        <a class="dropdown-item" href="Administradores/IniciarSesionAd.php" "dropdown-item">Administración</a>
                                    </div>

                                </div >

                            </div>    
                        </div>


                    </div>
                
                
                
                
                
                
                <div class="row justify-content-md-center collapse" id="navbarToggleExternalContent" >

                        <div class="col-xs-12 col-sm-12 d-block d-sm-none" style="text-align:center;" >


                            <div class="btn-group-vertical btn-block dropdown" role="group">

                                <a href="home.php" class="btn btn-outline-light btn-block active" role="button" aria-pressed="true" >&nbsp;&nbsp;Inicio&nbsp;</a>

                                <div class=" btn-group dropdown " role="group" > 

                                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Estudiantes
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        <a class="dropdown-item" href="Alumnos/inscripcionAlumn.php" "dropdown-item">Inscripción</a>
                                        <a class="dropdown-item" href="Alumnos/reinscripcionAlumn.php" "dropdown-item">Reinscripción</a>
                                        <a class="dropdown-item" href="Alumnos/califiVeri.php" "dropdown-item">Consulta calificaciones</a>
                                        <a class="dropdown-item" href="Alumnos/horarioAl.php" "dropdown-item">Consultar Horario</a>
                                    </div>

                                </div >

                                <div class=" btn-group dropdown " role="group" > 

                                    <button class="btn btn-outline-light btn-block dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Docentes
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                        <a class="dropdown-item" href="Docentes/IniciarSesionDo.php" "dropdown-item">Acceso Docentes</a>
                                    </div>

                                </div >

                                <div class=" btn-group dropdown " role="group" > 

                                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                        Administración
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                        <a class="dropdown-item" href="Administradores/IniciarSesionAd.php" "dropdown-item">Administración</a>
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


    <div class="container" style="padding: 20px 0 20px 0; background:#0a6d7a; overflow: hidden">
           <div class="row justify-content-between">
                <div class="col-sm-12 col-md-4 col-lg-3" style="text-align:center; padding: 20px 0;">
                    <img src="imagenes/TecNMwhite.png" width="200px" height="auto" >

                </div>
               
               <div class="col-sm-12 col-md-6 col-lg-5" style="padding:20px 0">
                   <div class="row">
                    <div class="col-8 col-xs-9 col-sm-5 col-md-6 col-lg-6 lista">
                        <p  style="line-height: 2;">
                            > &nbsp; Superación personal<br>
                            > &nbsp; Mejores oportunidades<br>
                            > &nbsp; Profesionales de calidad<br>
                            > &nbsp; Bolsa de trabajo<br>
                            > &nbsp; Al alcance de tu mano
                        </p>
                    
                    </div>
                    <div class="col-8 col-xs-9 col-sm-5 col-md-6 col-lg-6 lista">
                        <p  style="line-height: 2;">
                            > &nbsp; Superación personal<br>
                            > &nbsp; Mejores oportunidades<br>
                            > &nbsp; Profesionales de calidad<br>
                            > &nbsp; Bolsa de trabajo<br>
                            > &nbsp; Al alcance de tu mano
                        </p>
            
                    </div>
               </div>
               
               
               </div>
            
                 
            </div>

    </div>



    <div class="container contenedor">
        <div class="row " >
            <div class="col-sm-12 ">
                <div class="row">
                    <div class="col-sm-12 col-md-8 remove-padding">
                            <img class="mainfoto" src="imagenes/study.jpg" >
                    </div>
                    <div class="col-sm-12 col-md-4" style=" background-color:#15859A; border-top-right-radius: 8px; border-bottom-right-radius: 8px;">
                        <div >
                            <p id="inf">"English is a universal language used in many countries, including México. ITSL English Academy is offering classes as part of your curriculum"</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12" style="text-align: left; ">
                        <p class="subtitulo" style="font-zise: 22px;">ITSL - Academia de Inglés</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row" >
                      <div class="col-sm-12" >
                            <img src="imagenes/itslnobreLargo.png" width="100%" height="auto" style="padding-left:80px; padding-right:20px; padding-top:5px;">
                      </div>
        </div>
    </div>


     <div class="container-fluid">
         <div class="row" style="background:#0a6d7a; ">
            <div class="col-md-3 bordes d-none  d-md-block" >
                
            </div>
            <div class="col-md-6 bordes" >

                <div class="row">
                    <div class="col-md-6" >
                        
                    </div>

                    <div class="col-md-6 " >
                         <p class="tituloRedes">Siguenos en redes sociales</p>
                         <p class="redes">
                            <img class="iconos" src="imagenes/face.png">&emsp;Facebook<br>
                            <img class="iconos" src="imagenes/insta.png">&emsp;Instagram<br>
                            <img class="iconos" src="imagenes/twi.png">&emsp;Twitter<br>
                            <img class="iconos" src="imagenes/yt.png">&emsp;YouTube<br>
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

                    <div class="col-md-3 bordes">

                        <p><img src="imagenes/itslnobreLargo.png" style="width:60%; height:auto; padding-top:20px; "></p>

                        <p class="pie-letras">© 2020 ITSL - English Academy</p>

                    </div>

                    <div class="col-md-6 bordes d-none  d-md-block">

                    </div>

                    <div class="col-md-3 d-none  d-md-block">

                        <p></p>

                    </div>

                </div>


            </div>


        </footer>

    </body>
    
</html>