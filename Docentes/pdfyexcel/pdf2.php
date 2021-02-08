<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedinDo"]) || $_SESSION["loggedinDo"] !== true){
    header("location: califiVeri.php");
    exit;
}

require_once "pdfdatos.php";

    $nombres = "";
    $numero = 1;
    $carre = "";
    
    for($i=0; $i <= 60; $i++){
                                
        if(isset($numeros3[$i])){
            
            if($dataRow3[2] === 'Industrial'){
                $carre = "IND";
            }elseif($dataRow3[2] === 'Gestión Empresarial'){
                $carre = "IGE";
            }elseif($dataRow3[2] === 'Sistemas Computacionales'){
                $carre = "ISC";
            }elseif($dataRow3[2] === 'Mecatrónica'){
                $carre = "MECA";
            }
            
            $nombres = $nombres."<tr>
                                    <td class='inte' style='text-align:center;'>$numero</td>    
                                    <td class='inte'>".alumnos($numeros3[$i],$dataRow3[5], $link)."</td>
                                    <td class='inte' style='text-align:center;'>$numeros3[$i]</td>
                                    <td class='inte' style='text-align:center;'> $carre / $dataRow3[0] / $dataRow3[1] </td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                    <td class='inte'></td>
                                </tr>";
            $numero++;
        } 
    }



//======================================================================================================================
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reportes</title>
    
    <link rel="stylesheet" href="../../bootstrap/4.5.3/dist/css/bootstrap.min.css" 
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
          crossorigin="anonymous">
    
        <script src="../../jquery/3.5.1/jquery-3.5.1.slim.min.js" 
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
            crossorigin="anonymous"></script>
    
        <script src="../../bootstrap/4.5.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" 
            crossorigin="anonymous"></script>
    
    
    <link rel="stylesheet" href="../../pure/0.5.0/pure-min.css">

    <link rel="icon" href="../../imagenes/itsl2.png">
    
    <style type="text/css">
        
        body{
            
            font-size: 11px;
            line-height: 1em;
        }
        
        .page-header, .page-header-space {
          height: 1px;
        }

        .page-footer, .page-footer-space {
          height: 10px;

        }

        .page-footer {
          position: fixed;
          bottom: 0;
          width: 100%;
        }

        .page-header {
          position: fixed;
          top: 0mm;
          width: 100%;
        }

        .page {
          page-break-after: always;
        }

        @page {
          margin: 20mm
        }
        @media screen {
            div.divFooter {
                display: none;
            }
            div.divHeader {
                display: none;
            }
        }

        @media print {
            
            @page {size: landscape}
            thead {display: table-header-group;} 
            tfoot {display: table-footer-group;}

            button {display: none;}

            body {margin: 0;}


            
        }
        
        
        .centrado{
            text-align:center;
            padding: 2px !important; 
            margin: 2px !important;
        }
        
        .inte{
            padding: 4px 1px 4px 1px !important; 
            margin: 2px !important;
        }
        .inteW{
            padding: 4px 1px 4px 1px !important; 
            margin: 2px !important;
            color: white;
        }



        
    </style>
</head>
<body>
    <header class="page-header divFooter">
          <div class="container-fluid">

            <div class="row">
                
                
                <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 divHeader">
                </div>
              
                
                
                


            </div>
        </div>
    </header>

    
    <footer class="page-footer divFooter">
         <div class="container">
             <div class="row">
                <div class="col-sm-12 divFooter">
             <!--       <img class="logo" src="../imagenes/footer.PNG" > -->
                 </div>
             </div>


        </div>


    </footer>
    
    
    
    
    
    <table class="container">

    <thead>
      <tr>
        <td>
          <!--place holder for the fixed-position header-->
          <div class="page-header-space"></div>
        </td>
      </tr>
    </thead>
        
        
           <tbody>
      <tr>
        <td> 
        
        
        <!--content-->
        
    
    <div class="container">
        <div class="row">
            <div class="col-sm-12" style="text-align:center;  padding: 0 !important; margin: 0 !important;">
                <table style="width:100%">
                    <tr>
                        <th><img src="../../imagenes/TecNM.png" width="150px" height="auto" ></th>
                        <th><p style="font-size:16px; font-weight: bold;" class="centrado">INSTITUTO TECNOLÓGICO SUPERIOR DE LORETO</p>
                            <p style="font-size:14px; font-weight: bold;" class="centrado">ACTIVIDAD COMPLEMENTARIA</p>
                            <p style="font-size:14px; font-weight: bold;" class="centrado">LISTA DE ASISTENCIA OFICIAL</p>
                            <p class="centrado">PERIODO </p>
                            <button type="button" onClick="window.print()" style="background: pink">¡PULSA PARA IMPRIMIR!</button>
                            <button type="button" onClick="window.close()" style="background: lightblue">¡PULSA PARA CERRAR!</button>
                        </th>
                        <th> <img src="../../imagenes/itsl2.png" width="110px" height="auto" ></th>
                    </tr>
                </table>
                
            </div>
               
            <div class="col-sm-12">
                <table style="width:100%">
                    <tr>
                        <th rowspan="5" style="width:40%; text-align:left;"><p style="font-size:14px;"><br>INSTRUCTOR: <?php echo $_SESSION['titulo']." ".$_SESSION["nombre"]." ".$_SESSION["paterno"]." ".$_SESSION["materno"]; ?></p></th>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th style="text-align:right;">IND </th>
                        <td>&nbsp;&nbsp; INGENIERÍA INDSUTRIAL</td>
                    </tr>
                    <tr>
                        <th style="text-align:right;">IGE </th>
                        <td>&nbsp;&nbsp; INGENIERÍA EN GESTIÓN EMPRESARIAL</td>
                    </tr>
                    <tr>
                        <th style="text-align:right;">ISC </th>
                        <td>&nbsp;&nbsp; INGENIERÍA EN SISTEMAS COMPUTACIONALES</td>
                    </tr>
                    <tr>
                        <th style="text-align:right;">MECA </th>
                        <td>&nbsp;&nbsp; INGENIERÍA MECATRÓNICA</td>
                    </tr>
                </table>
                
                
            </div>
            
            


            <div class="col-sm-12">
                
                <br>
                <table class="table table-bordered" >
                    <thead>
                        <tr style="text-align:center;">
                            <th style="width:3%;" rowspan="2" class="inte">NO.</th>
                            <th style="width:30%;" rowspan="2" class="inte">NOMBRE</th>
                            <th style="width:8%;" rowspan="2" class="inte">NO. CONTROL</th>
                            <th style="width:10%;" rowspan="2" class="inte">CARRERA/ SEMESTRE/ GRUPO</th>
                            <th style="width:4%;" rowspan="1" class="inte">MES:</th>
                            <th style="width:45%;" colspan="32" class="inteW">ENERO - FEBRERO</th> 

                        </tr>
                        <tr style='text-align:center;'>
                            <th class="inte">DÍA:</th>
                            <th class="inteW">28</th>
                            <th class="inteW">29</th>
                            <th class="inteW">30</th>
                            <th class="inteW">31</th>
                            <th class="inteW">01</th>
                            <th class="inteW">02</th>
                            <th class="inteW">03</th>
                            <th class="inteW">04</th>
                            <th class="inteW">05</th>
                            <th class="inteW">06</th>
                            <th class="inteW">07</th>
                            <th class="inteW">08</th>
                            <th class="inteW">09</th>
                            <th class="inteW">10</th>
                            <th class="inteW">11</th>
                            <th class="inteW">12</th>
                            <th class="inteW">13</th>
                            <th class="inteW">14</th>
                            <th class="inteW">15</th>
                            <th class="inteW">16</th>
                            <th class="inteW">17</th>
                            <th class="inteW">18</th>
                            <th class="inteW">19</th>
                            <th class="inteW">20</th>
                            <th class="inteW">21</th>
                            <th class="inteW">22</th>
                            <th class="inteW">23</th>
                            <th class="inteW">24</th>
                            <th class="inteW">25</th>
                            <th class="inteW">26</th>
                            <th class="inteW">27</th>
                            <th class="inteW">28</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo $nombres;?>
                        
                    </tbody>
                </table>
                
            </div>
            

        </div>
    </div>
    
    
     <!-- end content-->
            
                    </td>
      </tr>
    </tbody>
            
            
            

    <tfoot>
      <tr>
        <td>
          <!--place holder for the fixed-position footer-->
          <div class="page-footer-space"></div>
        </td>
      </tr>
    </tfoot>

  </table>





	

</body>
</html>