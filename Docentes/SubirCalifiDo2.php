<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: IniciarSesionDo.php");
    exit;
}
 
// php populate html table from mysql database





?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <meta http-equiv="refresh" content="5">-->
    <title>Docentes</title>
    
    
    
    
    <link rel="stylesheet" href="../pure/0.5.0/pure-min.css">
    <link rel="stylesheet" href="../bootstrap/4.0.0/css/bootstrap.min.css" 
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
          crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
            crossorigin="anonymous">
    </script>
    <script src="../ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
            crossorigin="anonymous"></script>
    <script src="../bootstrap/4.0.0/js/bootstrap.min.js" 
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
            crossorigin="anonymous"></script>
    

    
    
  
  

    
    <style type="text/css">
        body  { 
			  
			  background-color: ghostwhite;
			  }
		header {
              background-color: #000000;

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
                        width: 94%;
                        height: auto;
                    }
        
        img.card {
              background-color: #0a6d7a;
              width:92%;
              position: absolute;
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

                            <a href="../home.php" class="btn btn-outline-light" role="button" >Inicio</a>
                            
                            <a href="Docentes.php" class="btn btn-outline-light" role="button" >Regresar a Docentes</a>
                            
                            <a href="SubirCalifiDo.php" class="btn btn-outline-light active" role="button" >Calificar Grupos</a>

                            <a href="logoutDo.php" class="btn btn-outline-light" role="button">Cerrar sesión</a>

                        </div>    
                    </div>
                
                
                


            </div>
        </div>
</header>
    
    
    
    
            <div class="container" style="padding-top:40px;">
            
                  <div class="row">
                      <div class="col-sm-12">
                          
                          

                        </div>
                      

                  
                  </div >
                  
              
        </div>
    
    
    
    
    <div class="container">
        
        
        
        <div id="accordion">
            
        
          <div class="card">
              
             
              
            <div class="card-header" id="heading1">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                  xcvbxcvb
                </button>
              </h5>
            </div>

            <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordion">
              <div class="card-body">
                  skdjfhgñlkdnñfokgvnsañedrglkfnñodkjnhññg
                  
                 
                  
                  
           
          
                  
                  
              </div>
            </div>
              
          </div>
            
            
            
            
          <div class="card">
              
            <div class="card-header" id="heading2">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                 wert
                </button>
              </h5>
            </div>
              
            <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
              <div class="card-body">
                
                  asodhiòakms`dovijpm,koipajoi
                  
              </div>
            </div>
              
          </div>
            
          <div class="card">
              
            <div class="card-header" id="heading3">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                  asdf
                </button>
              </h5>
            </div>
              
            <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
              <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
              
          </div>
            
            
        <div class="card">
              
            <div class="card-header" id="heading4">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                 dfgh
                </button>
              </h5>
            </div>
              
            <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
              <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
              
          </div>
            
            
        <div class="card">
              
            <div class="card-header" id="heading5">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                  sdfg
                </button>
              </h5>
            </div>
              
            <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
              <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
              
          </div>
            
            
            
        <div class="card" style="display:">
              
            <div class="card-header" id="heading6">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                  asdf
                </button>
              </h5>
            </div>
              
            <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion">
              <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
              
          </div>
            
            
            
            
            
            
          
            
            
        </div>
        
        
        
    </div>
    
    
    

    

    


    
      

    <div class="container-fluid">
        <div class="row" style="background:#0a6d7a; ">
            <div class="col-md-3 bordes" >
                <p></p>
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
                <p></p>
            </div>
            <div class="col-md-3 ">
                <p></p>
            </div>
        </div>


    </div>


</footer>

</body>
</html>