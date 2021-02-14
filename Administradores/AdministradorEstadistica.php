<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedinAd"]) || $_SESSION["loggedinAd"] !== true ){
    header("location: logoutAd.php");
    
}


// Check if the user is logged in, if not then redirect to login page
if($_SESSION["roll"] !== 1){
    header("location: logoutAd.php");
}

require_once "estadistica.php";


$tabla = " <div class='col-sm-6'>
            <table class='table table-bordered '>
                <tr>
                    <th style='width:50%;'>Matricula Total de Alumnos del Tecnológico</th>
                    <td style='text-align:center;'>
                       $totalAlumnos
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Estudiantes participantes Hombres</th>
                    <td style='text-align:center;'>
                        $totalAlumnosH 
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Estudiantes participantes Mujeres</th>
                    <td style='text-align:center;'>
                      $totalAlumnosM
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Número de facilitadores integrados al servicio</th>
                    <td style='text-align:center;'>
                         $totalMaestros
                    </td>
                </tr> 
                <tr>
                    <th style='width:50%;'>Número de facilitadores certificados</th>
                    <td style='text-align:center;'>
                          $totalMaestrosConCerti 
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Porcentaje de la eficiencia terminal con base en el ingreso</th>
                    <td style='text-align:center;'>
                          $eficienciaTerminal
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Total Alumnos dados de baja $year</th>
                    <td style='text-align:center;'>
                          $totalalumnosBaja 
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Total alumnos (hombres) dados de baja $year</th>
                    <td style='text-align:center;'>
                          $totalalumnosBajaH
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Total alumnas (mujeres) dadas de baja $year</th>
                    <td style='text-align:center;'>
                         $totalalumnosBajaM
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>  </th>
                    <td style='text-align:center;'>
                    
                        
                    
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>  </th>
                    <td style='text-align:center;'>
                    
                
                    
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>  </th>
                    <td style='text-align:center;'>
                    
                     
                    
                    </td>
                </tr>
            </table>
        </div>
        <div class='col-sm-6'>
            <table class='table table-bordered'>
                <tr>
                    <th style='width:50%;'>Estudiantes con liberación del idioma con nivel B1 Hombres</th>
                    <td style='text-align:center;'>
                        $totalalumnosB1H
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Estudiantes con liberación del idioma con nivel B1 Mujeres</th>
                    <td style='text-align:center;'>
                      $totalalumnosB1M
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Estudiantes con liberación del idioma con nivel B2 Hombres</th>
                    <td style='text-align:center;'>
                          $totalalumnosB2H
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Estudiantes con liberación del idioma con nivel B2 Mujeres</th>
                    <td style='text-align:center;'>
                      $totalalumnosB2M 
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Estudiantes con con Beca Hombres</th>
                    <td style='text-align:center;'>
                        $totalalumnosBecaH 
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Estudiantes con con Beca Mujeres</th>
                    <td style='text-align:center;'>
                        $totalalumnosBecaM
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Total alumnos participantes de la carrera de Ingeniería en Sistemas Computacionales</th>
                    <td style='text-align:center;'>
                    
                       
                    
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Total alumnos participantes de la carrera de Ingeniería Mecatrónica</th>
                    <td style='text-align:center;'>
                    
                      
                    
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Total alumnos participantes de la carrera de Ingeniería Insdutrial</th>
                    <td style='text-align:center;'>
                    
                      
                    
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>Total alumnos participantes de la carrera de Ingeniería en Gestión Empresarial</th>
                    <td style='text-align:center;'>
                    
               
                    
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>  </th>
                    <td style='text-align:center;'>
                    
                   
                    
                    </td>
                </tr>
                <tr>
                    <th style='width:50%;'>  </th>
                    <td style='text-align:center;'>
                    </td>
                </tr>
            </table>
        </div>
     </div>";


//====================================================================================================



require_once 'Historial.entidad.php';
require_once 'Historial.model.php';

// Logica
$alm = new Historial();
$model = new HistorialModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
        case 'registrar':
            $alm->__SET('estadistico',     $_REQUEST['estadistico']);
            $alm->__SET('periodo',         $_REQUEST['periodo']);
			$alm->__SET('comentario',      $_REQUEST['comentario']);
            
			$model->Registrar($alm);
			header('Location: AdministradorEstadistica.php');
			break;

	}
}


?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reportes</title>
    
    <link rel="stylesheet" href="../bootstrap/4.5.3/dist/css/bootstrap.min.css" 
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
          crossorigin="anonymous">
    
        <script src="../jquery/3.5.1/jquery-3.5.1.slim.min.js" 
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
            crossorigin="anonymous"></script>
    
        <script src="../bootstrap/4.5.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" 
            crossorigin="anonymous"></script>
    
    
    <link rel="stylesheet" href="../pure/0.5.0/pure-min.css">
    


    
    <script type="text/javascript" src="../direcciones/localidadesReins.js"></script>

    
    
    
    
            
    
    <link rel="icon" href="../imagenes/itsl2.png">
    
    
    
    
    
    
    
    <style type="text/css">
        body  { 
			  
			  background-color: ghostwhite;
			  }
		header {
              background-color: #21476F;

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
        @media (max-width: 1100px){

            
        }
        
        
        /*para pantallas de PC*/
        @media (max-width: 992px){

        
            
        }
        /* Para tablets*/
        @media screen and (max-width: 768px) {

            
        }
        /* Para tablets*/
        @media screen and (max-width: 616px) {

            
        }
        
        /*Para dispositivos moviles*/
        @media screen and (max-width: 400px) {
            
            
        }
        .centrado{
            text-align:center;
        }
        div.ex3 {
          background-color: black;
          width: 100%;
          height:200px;
          overflow: auto;
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
                            
                            <a href="Administrador.php" class="btn btn-outline-light" role="button" >Página Principal Administradores</a>
                            
                            <a href="AdministradorEstadistica.php" class="btn btn-outline-light active" role="button" >Estadística</a>
                            
                            <a href="AdministradorEstadisticaHistorial.php" class="btn btn-outline-light" role="button" >Historial Estadística</a>
                            
                            <a href="logoutAd.php" class="btn btn-outline-light" role="button">Cerrar sesión</a>

                        </div>    
                    </div>
                
                
                


            </div>
        </div>
</header>

    
    
    <div class="container">
        <div class="row">        
            
            <div class="col-sm-9">
                <h2>Datos Estadísticos | Periodo: <?php echo $_SESSION['periodoDB']; ?></h2>
                

            </div>
            
            <hr>
            <div class="col-sm-12" style="font-size:16px;">
   
              <div>  
                <form action="?action=<?php echo $alm->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" onsubmit="return confirm('Presiona OK para continuar.');">
                    
                    <input type="hidden" name="estadistico" value="<?php echo $tabla; ?>" />
                    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />
                    <input type="hidden" name="periodo" value="<?php echo $_SESSION['periodoDB']; ?>" />  
                    
                    
                    <table class="table table-bordered table-dark table-sm"  >
                        <tr>
                            <th style="width:70%;">Comentario       </th>
                            
                        <tr>
                            <td rowspan="3" colspan="1">  
                                 <textarea class="form-control" rows="5" id="comentario" name="comentario" placeholder="Comentario" ></textarea>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-sm">
                        <tr style="text-align:right;">
                            <th><button type="submit" class="btn btn-secondary">Guardar Estadística</button></th>
                        </tr>
                    </table>
                    
                    

                    
                    
                </form>
				</div>
            </div>
                
        <?php echo $tabla; ?>
                
          </div>  
            
</div>
    
    
    
    

    
    <div class="container-fluid" style="padding-top:300px;">
        <hr>
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

    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tab-id tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
        
    </script>
	

</body>
</html>