<?php

// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: Require/logout.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITSL - Academia de Inglés</title>
    
    <link rel="stylesheet" href="bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="icon" href="imagenes/itsl2.png">
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


                    <img class="logo" src="imagenes/itslnobreLargo.png" >



                </div>
                
                <div class="row">
                    <div class="col-lg-10">
                    
                    </div>
                    <div class="col-lg-2" >


                        <div class="btn-group dropdown" role="group">

                            <a href="home.php" class="btn btn-outline-light active" role="button" aria-pressed="true" >&nbsp;&nbsp;Inicio&nbsp;</a>

                            <div class=" btn-group dropdown " role="group" > 

                                <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    Estudiantes
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <a class="dropdown-item" href="Alumnos/inscripcionAlumn.php" "dropdown-item">Inscripción</a>
                                    <a class="dropdown-item" href="Alumnos/reinscripcionAlumn.php" "dropdown-item">Reinscripción</a>
                                    <a class="dropdown-item" href="Alumnos/alumnos.php" "dropdown-item">Consulta calificaciones</a>
                                </div>

                            </div >

                            <div class=" btn-group dropdown " role="group" > 

                                <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    Docentes
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenu3">
                                    <button class="dropdown-item" type="button">Action</button>
                                    <button class="dropdown-item" type="button">Another action</button>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                </div>

                            </div >

                            <div class=" btn-group dropdown " role="group" > 

                                <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    Administración
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenu4">
                                    <button class="dropdown-item" type="button">Administración</button>
                                    <button class="dropdown-item" type="button">Another action</button>
                                    <button class="dropdown-item" type="button">Something else here</button>
                                </div>

                            </div >

                        </div>    
                    </div>
                
                
                </div>

                    








            </div>
        </div>

    </header>


    <div class="container-fluid">
        <div class="row" style="padding-bottom: 10px; padding-top: 20px; background:#0a6d7a">
            <div class="col-sm-4" style="text-align:center; padding-bottom:20px; ">
                <img src="imagenes/TecNMwhite.png" width="200px" height="auto" >

            </div>

            <div class="col-sm-2" >


            </div>

            <!-- inicio de las listas -->

            <div class="col-sm-3">
                <div class="lista">
                        <p  style="line-height: 2;">
                            > &nbsp; Superación personal<br>
                            > &nbsp; Mejores oportunidades<br>
                            > &nbsp; Profesionales de calidad<br>
                            > &nbsp; Bolsa de trabajo<br>
                            > &nbsp; Al alcance de tu mano
                        </p>
                </div>

            </div>
             <div class="col-sm-3" >
                <div class="lista">
                        <p  style="line-height: 2;">
                            > &nbsp; Clases dinamicas<br>
                            > &nbsp; Desarrollo artistico<br>
                            > &nbsp; Evaluación TOEFL<br>
                            > &nbsp; Viajes educativos<br>
                            > &nbsp; Becas
                        </p>
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
                            <p id="inf"><br>"English is a universal language used in many countries, including México. ITSL English Academy is offering classes as part of your curriculum"<br></p>
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
            <div class="col-md-3 bordes" >
                
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
            <div class="col-md-3 bordes ">
                <p><img src="imagenes/itslnobreLargo.png" style="width:60%; height:auto; padding-top:20px; "></p>
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