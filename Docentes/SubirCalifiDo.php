<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: IniciarSesionDo.php");
    exit;
}
 
// php populate html table from mysql database



// Include config file
require_once "../Require/config.php";



//========================================================================================================
//Grupos

$query = "SELECT gruposasignados.nivel, gruposasignados.grupo, gruposasignados.carrera, gruposasignados.modalidad, periodoactual.periodo FROM academia_ingles.gruposasignados, academia_ingles.periodoactual WHERE gruposasignados.periodo = periodoactual.periodo AND periodoactual.idperiodoactual = '1' AND gruposasignados.idmaestro = {$_SESSION["idmaestro"]};";

//$query = "SELECT  nivel, grupo, carrera, modalidad FROM `gruposasignados` WHERE idmaestro = {$_SESSION["idmaestro"]}";

$result = mysqli_query($link, $query);

if (!$result) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

$contador = 0;

$dataRow1 = array();
$dataRow2 = array();
$dataRow3 = array();
$dataRow4 = array();
$dataRow5 = array();
$dataRow6 = array();
$dataRow7 = array();
$dataRow8 = array();
$dataRow9 = array();
$dataRow10 = array();
$dataRow11 = array();
$dataRow12 = array();

while($row = mysqli_fetch_array($result))
{
    if($contador == 0){
        
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow1[$i] = $row[$i];
            
        }
        
    }
    if($contador == 1){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow2[$i] = $row[$i];
            
        }
    }
    if($contador == 2){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow3[$i] = $row[$i];
        
        }
    }
    if($contador == 3){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow4[$i] = $row[$i];
        
        }
    }
    if($contador == 4){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow5[$i] = $row[$i];
        
        }
    }
    if($contador == 5){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow6[$i] = $row[$i];
        
        }
    }
    if($contador == 6){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow7[$i] = $row[$i];
        
        }
    }
    if($contador == 7){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow8[$i] = $row[$i];
        
        }
    }
    if($contador == 8){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow9[$i] = $row[$i];
        
        }
    }
    if($contador == 9){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow10[$i] = $row[$i];
        
        }
    }
    if($contador == 10){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow11[$i] = $row[$i];
        
        }
    }
    if($contador == 11){
        for ($i = 0; $i <= 4; $i++) {
            
            $dataRow12[$i] = $row[$i];
        
        }
    }
    $contador++;
    
}






//=========================================================================================================
//Listado de números de control


function numeros( $nive, $grup, $carr, $idma, $moda, $peri, $link3 ){
    
    
    $query3 = "SELECT numeroControl FROM alumnos 
    WHERE nivelActual = '{$nive}' 
    AND grupoActual = '{$grup}'
    AND carrera = '{$carr}'
    AND idmaestroActual = '{$idma}' 
    AND modalidad = '{$moda}'
    AND periodoActual = '{$peri}' ORDER BY paterno ASC;";

    //$query = "SELECT  nivel, grupo, carrera, modalidad FROM `gruposasignados` WHERE idmaestro = {$_SESSION["idmaestro"]}";

    $result3 = mysqli_query($link3, $query3);

    if (!$result3) {
        $message  = 'Invalid query: ' . mysqli_error() . "\n";
        $message .= 'Whole query: ' . $query3;
        die($message);
    }

    $i = 0;

    $n = "";
    $numerosC = array();

    while($row = mysqli_fetch_array($result3))
    {

            $numerosC[$i] = $row[0];

            $i++;

    }
        
    return $numerosC;

}

//array para un nivel y un grupo.
$numeros1 = array();
$numeros2 = array();
$numeros3 = array();
$numeros4 = array();
$numeros5 = array();
$numeros6 = array();

if(isset($dataRow1[0])){$numeros1 = numeros($dataRow1[0],$dataRow1[1],$dataRow1[2],$_SESSION["idmaestro"],$dataRow1[3],$dataRow1[4],$link);}
if(isset($dataRow2[0])){$numeros2 = numeros($dataRow2[0],$dataRow2[1],$dataRow2[2],$_SESSION["idmaestro"],$dataRow2[3],$dataRow2[4],$link);}
if(isset($dataRow3[0])){$numeros3 = numeros($dataRow3[0],$dataRow3[1],$dataRow3[2],$_SESSION["idmaestro"],$dataRow3[3],$dataRow3[4],$link);}
if(isset($dataRow4[0])){$numeros4 = numeros($dataRow4[0],$dataRow4[1],$dataRow4[2],$_SESSION["idmaestro"],$dataRow4[3],$dataRow4[4],$link);}
if(isset($dataRow5[0])){$numeros5 = numeros($dataRow5[0],$dataRow5[1],$dataRow5[2],$_SESSION["idmaestro"],$dataRow5[3],$dataRow5[4],$link);}
if(isset($dataRow6[0])){$numeros6 = numeros($dataRow6[0],$dataRow6[1],$dataRow6[2],$_SESSION["idmaestro"],$dataRow6[3],$dataRow6[4],$link);}



//=========================================================================================================


$j = 0;



function alumnos($num, $niv, $link2){   
global $j;
    
$query2 = "SELECT alumnos.nombre, alumnos.paterno, alumnos.materno, calificaciones.calificacion, calificaciones.parcial, calificaciones.id, calificaciones.comentario FROM alumnos, calificaciones WHERE alumnos.numeroControl = calificaciones.numeroControl AND alumnos.numeroControl = '{$num}' AND calificaciones.nivel = '{$niv}';";


$result2 = mysqli_query($link2, $query2);

if (!$result2) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query2;
    die($message);
}


$contador2 = 0;

$dataname = "";
$data1 = "";
$data2 = "";
$data3 = "";
$data4 = "";
$data5 = "";
$data6 = "";
$data7 = "";
$data8 = "";
$data9 = "";

$data1n = "";
$data2n = "";
$data3n = "";
$data4n = "";
$data5n = "";
$data6n = "";
$data7n = "";
$data8n = "";
$data9n = "";
    
$data1i = "";
$data2i = "";
$data3i = "";
$data4i = "";
$data5i = "";
$data6i = "";
$data7i = "";
$data8i = "";
$data9i = "";
    
$comentario = "";


if (mysqli_num_rows($result2)==0) { 

    
    $query2 = "SELECT nombre , paterno, materno FROM alumnos WHERE numeroControl = '{$num}';";


    $result2 = mysqli_query($link2, $query2);
    
    while($row = mysqli_fetch_array($result2)){

            if($contador2 == 0){

                $dataname = $row[0]." ".$row[1]." ".$row[2];

            }


            $contador2++;

        }


        $datos = "<table style='width:70%'>
                            <tr>
                                <th>#".$j."</th>
                            </tr>
                              <tr>
                                <th>Nombre</th>
                                <th>|</th>
                                <th style='width:20%'>Parcial:</th>
                                <th>&nbsp;".$data1n."</th>
                                <th>&nbsp;".$data2n."</th>
                                <th>&nbsp;".$data3n."</th>
                                <th>&nbsp;".$data4n."</th>
                                <th>&nbsp;".$data5n."</th>
                                <th>&nbsp;".$data6n."</th>
                                <th>&nbsp;".$data7n."</th>
                                <th>&nbsp;".$data8n."</th>
                                <th>&nbsp;".$data9n."</th>
                              </tr>
                              <tr>
                                <td style='width:40%'>".$dataname."</td>
                                <th>|</th>
                                <th style='width:20%'>Calificación:</th>
                                <td>".$data1."</td>
                                <td>".$data2."</td>
                                <td>".$data3."</td>
                                <td>".$data4."</td>
                                <td>".$data5."</td>
                                <td>".$data6."</td>
                                <td>".$data7."</td>
                                <td>".$data8."</td>
                                <td>".$data9."</td>
                              </tr>
                              <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                              </tr>
                            </table>";


        }else{

            while($row = mysqli_fetch_array($result2)){

                    if($contador2 == 0){

                        $dataname = $row[0]." ".$row[1]." ".$row[2];
                        $data1 = $row[3];
                        $data1n = $row[4];
                        $data1i = $row[5];
                        $comentario = $comentario."Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 1){
                        $data2 = $row[3];
                        $data2n = $row[4];
                        $data2i = $row[3];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 2){
                        $data3 = $row[3];
                        $data3n = $row[4];
                        $data3i = $row[5];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 3){
                        $data4 = $row[3];
                        $data4n = $row[4];
                        $data4i = $row[5];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 4){
                        $data5 = $row[3];
                        $data5n = $row[4];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 5){
                        $data6 = $row[3];
                        $data6n = $row[4];
                        $data5i = $row[5];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 6){
                        $data7 = $row[3];
                        $data7n = $row[4];
                        $data7i = $row[5];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 7){
                        $data8 = $row[3];
                        $data8n = $row[4];
                        $data8i = $row[5];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }
                    if($contador2 == 8){
                        $data9 = $row[3];
                        $data9n = $row[4];
                        $data9i = $row[5];
                        $comentario = $comentario."<br>Parcial ".$row[4].": ".$row[6];
                    }

                    $contador2++;

                }


                $datos = "<table style='width:70%'>
                                      <tr>
                                        <th>#".$j."</th>
                                      </tr>
                                      <tr>
                                        <th>Nombre</th>
                                        <th>|</th>
                                        <th style='width:20%'>Parcial:</th>
                                        <th>&nbsp;".$data1n."</th>
                                        <th>&nbsp;".$data2n."</th>
                                        <th>&nbsp;".$data3n."</th>
                                        <th>&nbsp;".$data4n."</th>
                                        <th>&nbsp;".$data5n."</th>
                                        <th>&nbsp;".$data6n."</th>
                                        <th>&nbsp;".$data7n."</th>
                                        <th>&nbsp;".$data8n."</th>
                                        <th>&nbsp;".$data9n."</th>
                                      </tr>
                                      <tr>
                                        <td style='width:40%'>".$dataname."</td>
                                        <th>|</th>
                                        <th style='width:20%'>Calificación:</th>
                                        <td>".$data1."</td>
                                        <td>".$data2."</td>
                                        <td>".$data3."</td>
                                        <td>".$data4."</td>
                                        <td>".$data5."</td>
                                        <td>".$data6."</td>
                                        <td>".$data7."</td>
                                        <td>".$data8."</td>
                                        <td>".$data9."</td>
                                      </tr>
                                      <tr>
                                        <td>Comentarios:<br></td>
                                      </tr>
                                </table>
                                <table style='width:70%; border: 1px solid gray;'>
                                      
                                      <tr>
                                        <td>".$comentario."</td>
                                      </tr>
                                      <tr>
                                        <td></td>
                                      </tr>
                                    </table><br>";


        }




        return $datos;
    }

//=========================================================================================================


// Processing form data when form is submitted
//if($_SERVER["REQUEST_METHOD"] == "POST"){

$parcial = $parcial_err1 = $parcial_err2 = $calificacion = $calificacion_err1 = $calificacion_err2 = $comentario = $comentario_err = "";
$param_numeroControl = $param_nivel = $param_parcial = $param_calificacion = $param_idmaestro = "";

    
function calificar($numcon, $niv, $grup, $parcipost, $peri, $califipost, $idmas, $carr, $moda, $comen, $link4){      
    
    
    global $parcial,  $parcial_err1, $parcial_err2, $calificacion, $calificacion_err1, $calificacion_err2, $comentario, $comentario_err;
    global $param_numeroControl, $param_nivel, $param_parcial, $param_calificacion, $param_idmaestro;
    
    // Validate parcial
    if(empty(trim($_POST["parcial"]))){
        $parcial_err1 = "Elige un periodo.";     
    } else{

        $param_par ="";
    
        // Prepare a select statement
        $sql = "SELECT parcial FROM calificaciones WHERE numeroControl = '{$numcon}' AND nivel = '{$niv}' AND parcial = ? AND periodo = '{$peri}';";
        
        
        if($stmt = mysqli_prepare($link4, $sql)){
            
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_par);
            
            // Set parameters
            
            $param_par = trim($parcipost);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $parcial_err1 = "Ese parcial ya esta agregado.";
                    echo "<script>alert('Ese parcial ya esta agregado.');</script>";
                    
                } else{
                   $parcial = trim($parcipost);
                    
                }
    
    
            }else{
                echo "el stament salio mal";
            }
    
        }
     }
    
        // Validate calificacion
    if(empty(trim($califipost))){
        $calificacion_err1 = "Asigna una calificación.";  
        echo "<script>alert('Asigna una calificación.');</script>";
    } else{
        $calificacion = trim($califipost);
            
    }
 

        
    // Check input errors before updating the database
    if(empty($parcial_err1) && empty($calificacion_err1)){
        
        // Prepare an update statement
        $sql = "INSERT INTO calificaciones ( numeroControl, nivel, parcial, calificacion, idmaestro, grupo, carrera, periodo, modalidad, comentario) VALUES (?,?,?,?,?,?,?,?,?,?);";
        
        if($stmt = mysqli_prepare($link4, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss", $param_numeroControl, $param_nivel, $param_parcial, $param_calificacion, $param_idmaestro, $param_grupo, $param_carrera, $param_periodo, $param_modalidad, $param_comentario);
            
            // Set parameters
            $param_numeroControl = $numcon;
            $param_nivel = $niv;
            $param_parcial = $parcial;
            $param_calificacion = $calificacion;
            $param_idmaestro = $idmas;
            $param_grupo = $grup;
            $param_carrera = $carr;
            $param_periodo = $peri;
            $param_modalidad = $moda;
            $param_comentario = $comen;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
                header("location: SubirCalifiDo.php");
                exit();
            } else{
                echo "Uups! Algo salio mal, intenta más tarde.";
            }
        }else{
            echo "algo dalio mal";
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
   // mysqli_close($link);
}



//============================================================================================================================


function modificar($numcon, $niv, $grup, $parcipost, $peri, $califipost, $idmas, $carr, $moda, $comen, $link4){      
    
    
    global $parcial, $parcial_err1, $parcial_err2, $parcial_err3, $calificacion, $calificacion_err1, $calificacion_err2, $calificacion_err3,  $comentario, $comentario_err;
    global $param_numeroControl, $param_nivel, $param_parcial, $param_calificacion, $param_idmaestro;
    
    // Validate parcial
    if(empty(trim($_POST["parcial"]))){
        $parcial_err2 = "Elige un periodo.";     
    } else{

        $param_par ="";
    
        // Prepare a select statement
        $sql = "SELECT parcial FROM calificaciones WHERE numeroControl = '{$numcon}' AND nivel = '{$niv}' AND parcial = ? AND periodo = '{$peri}';";
        
        
        if($stmt = mysqli_prepare($link4, $sql)){
            
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_par);
            
            // Set parameters
            
            $param_par = trim($parcipost);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    
                    $parcial = trim($parcipost);
                    
                } else{
                   $parcial_err2 = "Esta función solo modifica.";
                    echo "<script>alert('Esta función solo modifica.');</script>";
                    
                }
    
    
            }else{
                echo "el stmt salio mal";
            }
    
        }
     }
    
        // Validate calificacion
    if(empty(trim($califipost))){
        $calificacion_err2 = "Asigna una calificacion.";     
    } else{
        $calificacion = trim($califipost);
            
    }
 

        
    // Check input errors before updating the database
    if(empty($parcial_err2) && empty($calificacion_err2)){
        
        // Prepare an update statement
        $sql = "UPDATE calificaciones SET calificacion = ?, comentario = ? WHERE parcial = ? AND numeroControl = ? AND nivel = ? AND idmaestro = ? AND grupo = ? AND carrera = ? AND periodo = ? AND modalidad = ?;";
        
        if($stmt = mysqli_prepare($link4, $sql)){
            echo "si entro";
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss", $param_calificacion, $param_comentario, $param_parcial, $param_numeroControl, $param_nivel, $param_idmaestro, $param_grupo, $param_carrera, $param_periodo, $param_modalidad);
            
            // Set parameters
            $param_numeroControl = $numcon;
            $param_nivel = $niv;
            $param_parcial = $parcial;
            $param_calificacion = $calificacion;
            $param_idmaestro = $idmas;
            $param_grupo = $grup;
            $param_carrera = $carr;
            $param_periodo = $peri;
            $param_modalidad = $moda;
            $param_comentario = $comen;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                //session_destroy();
                header("location: SubirCalifiDo.php");
                //exit();
            } else{
                echo "Uups! Algo salio mal, intenta más tarde.";
            }
        }else{
            echo "algo salio mal";
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
   // mysqli_close($link);
}

//============================================================================================================================


function promediar($numcon, $niv, $grup, $promediopost, $estado, $moda, $carr, $peri, $idmas, $comen, $link5){      
    
    
    global $parcial, $parcial_err1, $parcial_err2, $parcial_err3, $calificacion, $calificacion_err1, $calificacion_err2, $calificacion_err3,  $comentario, $comentario_err;
    global $param_numeroControl, $param_nivel, $param_parcial, $param_calificacion, $param_idmaestro;
    

    
        // Prepare a select statement
        $sql = "SELECT AVG(calificacion) FROM calificaciones WHERE numeroControl = '{$numcon}' AND nivel = '{$niv}' AND periodo = '{$peri}';";
        
        
        // resultp1
        $result = mysqli_query($link5, $sql);

        if (!$result) {
            $message  = 'Invalid query: ' . mysqli_error() . "\n";
            $message .= 'Whole query: ' . $sql;
            die($message);
        }



        
        // Prepare an update statement
        $sql = "INSERT INTO niveles(numeroControl, numeroNivel, grupo, promedio, estado, modalidad, carrera, periodo, idmaestro, comentario);";
        
        if($stmt = mysqli_prepare($link4, $sql)){
            echo "si entro";
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssss", $param_calificacion, $param_comentario, $param_parcial, $param_numeroControl, $param_nivel, $param_idmaestro, $param_grupo, $param_carrera, $param_periodo, $param_modalidad);
            
            // Set parameters
            $param_numeroControl = $numcon;
            $param_nivel = $niv;
            $param_parcial = $parcial;
            $param_calificacion = $calificacion;
            $param_idmaestro = $idmas;
            $param_grupo = $grup;
            $param_carrera = $carr;
            $param_periodo = $peri;
            $param_modalidad = $moda;
            $param_comentario = $comen;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                //session_destroy();
                header("location: SubirCalifiDo.php");
                //exit();
            } else{
                echo "Uups! Algo salio mal, intenta más tarde.";
            }
        }else{
            echo "algo salio mal";
        }
        
        // Close statement
        mysqli_stmt_close($stmt);

    
    // Close connection
   // mysqli_close($link);
}


//==========================================================================================================================
                  

function modales($mod1, $mod2, $mod3, $idmodal1, $idmodal2, $idmodal3 ){
    
    
    
    global $parcial_err1, $calificacion_err1, $parcial_err2, $calificacion_err2, $parcial_err3, $calificacion_err3, $comentario_err;

    $modales = "";

    $modales   =      "<!-- Large modal 1 -->

                <div class='modal fade bd-example-modal-lg' id='".$idmodal1."' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
                  <div class='modal-dialog modal-lg'>
                    <div class='modal-content' style='color:black'>
                      <div class='modal-header'>.
                        <h4 class='modal-title' id='exampleModalLabel'>Agregar calificación</h4>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>

                          
                                


                                    <form action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post'> 
                                        <div class='modal-body' style='padding: 0 100px'>


                                            <div class='form-group ".((!empty($parcial_err1)) ? 'has-error' : '')."col-md-4'>
                    
                                                <label>Parcial a calificar</label>
                                                <select class='form-control' name= 'parcial' >
                                                    <option value ='1'> 1 </option>
                                                    <option value ='2'> 2 </option>
                                                    <option value ='3'> 3 </option>
                                                    <option value ='4'> 4 </option>
                                                    <option value ='5'> 5 </option>
                                                    <option value ='6'> 6 </option>
                                                </select> 
                                                <span class='help-block text-danger'><?php echo $parcial_err1; ?></span>
                                            </div>


                                            <div class='form-group ".((!empty($calificacion_err1)) ? 'has-error' : '')." col-md-4'>
                                                <label>Calificación</label>
                                                <input type='number' name='calificacion' class='form-control mb-2'>
                                                <span class='help-block text-danger'>".$calificacion_err1."</span>
                                            </div>
                                            
                                            <div class='form-group ".((!empty($comentario_err)) ? 'has-error' : '')." col-md-12'>
                                                <label>Comentario</label>
                                                <textarea type='text' name='comentario' rows='3' class='form-control mb-2' placeholder='Escribe un comentario...'></textarea>
                                                <span class='help-block text-danger'>".$comentario_err."</span>
                                            </div>
                                            
                                        </div>
                                        <div class='form-group modal-footer'>
                                            <input type='submit' name='".$mod1."' class='btn btn-primary' value='Guardar cambios'>
                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                                        </div>
                                    </form>


                                
                         

                    </div>
                  </div>
                  </div>        
                  
                  
                  
               <!-- Large modal 2 -->

                                                            
                <div class='modal fade bd-example-modal-lg' id='".$idmodal2."' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
                  <div class='modal-dialog modal-lg'>
                    <div class='modal-content' style='color:black'>
                      <div class='modal-header'>
                        <h4 class='modal-title' id='exampleModalLabel'>Modificar Calificación</h4>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>

                          <div class='container'>
                            <div class='row'>
                                <div class = 'col-sm-12'>


                                <form action=' ".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post'> 
                                        <div class='modal-body' style='padding: 0 100px'>


                                            <div class='form-group ".((!empty($parcial_err2)) ? 'has-error' : '')." col-md-4'>
                    
                                                <label>Parcial a modificar</label>
                                                <select class='form-control' name= 'parcial' >
                                                    <option value ='1'> 1 </option>
                                                    <option value ='2'> 2 </option>
                                                    <option value ='3'> 3 </option>
                                                    <option value ='4'> 4 </option>
                                                    <option value ='5'> 5 </option>
                                                    <option value ='6'> 6 </option>
                                                </select> 
                                                <span class='help-block text-danger'>".$parcial_err2."</span>
                                            </div>


                                            <div class='form-group ".((!empty($calificacion_err2)) ? 'has-error' : '')." col-md-4'>
                                                <label>Calificación</label>
                                                <input type='number' name='calificacion' class='form-control mb-2'>
                                                <span class='help-block text-danger'>".$calificacion_err2."</span>
                                            </div>
                                            
                                            <div class='form-group ".((!empty($comentario_err)) ? 'has-error' : '')." col-md-12'>
                                                <label>Comentario</label>
                                                <textarea type='text' name='comentario' rows='3' class='form-control mb-2' placeholder='Escribe un comentario...'></textarea>
                                                <span class='help-block text-danger'>".$comentario_err."</span>
                                            </div>
                                            
                                        </div>

                                        <div class='form-group row modal-footer'>
                                            <input type='submit' name='".$mod2."' class='btn btn-primary' value='Guardar cambios'>
                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                                        </div>
                                    </form>


                                </div> 
                            </div> 
                        </div> 

                    </div>
                  </div>
                  </div>
        
        
        
        <!-- Large modal 3 -->

                                                            
                <div class='modal fade bd-example-modal-lg' id='".$idmodal3."' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
                  <div class='modal-dialog modal-lg'>
                    <div class='modal-content' style='color:black'>
                      <div class='modal-header'>
                        <h4 class='modal-title' id='exampleModalLabel'>Modificar Calificación</h4>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                        </button>
                      </div>

                          <div class='container'>
                            <div class='row'>
                                <div class = 'col-sm-12'>


                                <form action=' ".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post'> 
                                        <div class='modal-body' style='padding: 0 100px'>


                                            <div class='form-group ".((!empty($parcial_err3)) ? 'has-error' : '')." col-md-4'>
                    
                                                <label>Parcial a modificar</label>
                                                <select class='form-control' name= 'parcial' >
                                                    <option value ='1'> 1 </option>
                                                    <option value ='2'> 2 </option>
                                                    <option value ='3'> 3 </option>
                                                    <option value ='4'> 4 </option>
                                                    <option value ='5'> 5 </option>
                                                    <option value ='6'> 6 </option>
                                                </select> 
                                                <span class='help-block text-danger'>".$parcial_err3."</span>
                                            </div>


                                            <div class='form-group ".((!empty($calificacion_err3)) ? 'has-error' : '')." col-md-4'>
                                                <label>Calificación</label>
                                                <input type='number' name='calificacion' class='form-control mb-2'>
                                                <span class='help-block text-danger'>".$calificacion_err3."</span>
                                            </div>
                                            
                                            <div class='form-group ".((!empty($comentario_err)) ? 'has-error' : '')." col-md-12'>
                                                <label>Comentario</label>
                                                <textarea type='text' name='comentario' rows='3' class='form-control mb-2' placeholder='Escribe un comentario...'></textarea>
                                                <span class='help-block text-danger'>".$comentario_err."</span>
                                            </div>
                                            
                                        </div>

                                        <div class='form-group row modal-footer'>
                                            <input type='submit' name='".$mod3."' class='btn btn-primary' value='Guardar cambios'>
                                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>
                                        </div>
                                    </form>


                                </div> 
                            </div> 
                        </div> 

                    </div>
                  </div>
                  </div>";

                  
                  
                  
                  
    return $modales;
                  
    }
//==========================================================================================================================



require_once 'califimodi1.php';
require_once 'califimodi2.php';
require_once 'califimodi3.php';
require_once 'califimodi4.php';
require_once 'califimodi5.php';
require_once 'califimodi6.php';

//=====================================================================================================================




require_once 'docente.entidad.php';
require_once 'docente.model.php';

// Logica
$alm = new Docente();
$model = new DocenteModel();



if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('id',              $_REQUEST['id']);
            $alm->__SET('direccion',       $_REQUEST['direccion']);
            $alm->__SET('estado',       $_REQUEST['estado']);
            $alm->__SET('municipio',       $_REQUEST['municipio']);
            $alm->__SET('localidad',       $_REQUEST['localidad']);
            $alm->__SET('postal',       $_REQUEST['postal']);
            $alm->__SET('telefono',        $_REQUEST['telefono']);
            $alm->__SET('email',           $_REQUEST['email']);

			$model->Actualizar($alm);
			header('Location: Docentes.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_SESSION['idmaestro']);
			break;
	}
}

?>

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!--    <meta http-equiv="refresh" content="5">-->
    <title>Subir Calificaciones</title>
    
    
    
    <link rel="stylesheet" href="../bootstrap/4.5.3/dist/css/bootstrap.min.css" 
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
          crossorigin="anonymous">
    
        <script src="../jquery/3.5.1/jquery-3.5.1.slim.min.js" 
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
            crossorigin="anonymous"></script>
    
        <script src="../bootstrap/4.5.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" 
            crossorigin="anonymous"></script>
    
    
    
    <script>
        
        
      $(function() {
        // store a reference to the collapse div so that 
        // we don't have to keep looking it up in the dom
          const collapse1 = $("#collapse1");
          const collapse2 = $("#collapse2");
          const collapse3 = $("#collapse3");
          const collapse4 = $("#collapse4");
          const collapse5 = $("#collapse5");
          const collapse6 = $("#collapse6");
          

          
        // register a callback function to the collapse div that
        // will be called every time the collapse is opened.
        collapse1.on("shown.bs.collapse", function() {
            localStorage.setItem("collapse1", "show");
        });
        collapse2.on("shown.bs.collapse", function() {
            localStorage.setItem("collapse2", "show");
        });
        collapse3.on("shown.bs.collapse", function() {
            localStorage.setItem("collapse3", "show");
        });
        collapse4.on("shown.bs.collapse", function() {
            localStorage.setItem("collapse4", "show");
        });
        collapse5.on("shown.bs.collapse", function() {
            localStorage.setItem("collapse5", "show");
        });
        collapse6.on("shown.bs.collapse", function() {
            localStorage.setItem("collapse6", "show");
        });
          
          
          
          

        // register a callback function to the collapse div that
        // will be called every time the collapse is closed.
        collapse1.on("hidden.bs.collapse", function() {
            // since we know that that this function is called on
            // open, we'll set the localStorage value to "hide" 
            localStorage.setItem("collapse1", "hide");
        });
          collapse2.on("hidden.bs.collapse", function() {
            localStorage.setItem("collapse2", "hide");
        });
          collapse3.on("hidden.bs.collapse", function() {
            localStorage.setItem("collapse3", "hide");
        });
          collapse4.on("hidden.bs.collapse", function() {
            localStorage.setItem("collapse4", "hide");
        });
          collapse5.on("hidden.bs.collapse", function() {
            localStorage.setItem("collapse5", "hide");
        });
          collapse6.on("hidden.bs.collapse", function() {
            localStorage.setItem("collapse6", "hide");
        });

        // Since this function runs on page load (meaning only once), we can
        // check the value of localStorage from here and then call the
        // bootstrap collapse methods ourselves:

        // Check the value of the localStorage item
          const showCollapse1 = localStorage.getItem("collapse1");
          const showCollapse2 = localStorage.getItem("collapse2");
          const showCollapse3 = localStorage.getItem("collapse3");
          const showCollapse4 = localStorage.getItem("collapse4");
          const showCollapse5 = localStorage.getItem("collapse5");
          const showCollapse6 = localStorage.getItem("collapse6");

        // Manipulate the collapse based on the value of the localStorage item.
        // Note that the value is determined by lines 36 or 44. If you change those,
        // then make sure to check that the comparison on the next line is still valid.
          
          
        if (showCollapse1 === "show") {
            collapse1.collapse("show");
        } else {
            collapse1.collapse("hide");
        }
          if (showCollapse2 === "show") {
            collapse2.collapse("show");
        } else {
            collapse2.collapse("hide");
        }
          if (showCollapse3 === "show") {
            collapse3.collapse("show");
        } else {
            collapse3.collapse("hide");
        }
          if (showCollapse4 === "show") {
            collapse4.collapse("show");
        } else {
            collapse4.collapse("hide");
        }
          if (showCollapse5 === "show") {
            collapse5.collapse("show");
        } else {
            collapse5.collapse("hide");
        }
          if (showCollapse6 === "show") {
            collapse6.collapse("show");
        } else {
            collapse6.collapse("hide");
        }
      });
    </script>
    
    
    
    <script>
        
        setTimeout(() => { 
        // scroll position.
            $(window).scroll(function () {
                sessionStorage.scrollTop = $(this).scrollTop();
            });
            $(document).ready(function () {
                if (sessionStorage.scrollTop != "undefined") {
                    $(window).scrollTop(sessionStorage.scrollTop);
                }
            });
        }, 1000);
    </script>
    
    

    

      
    
    <link rel="icon" href="../imagenes/itsl2.png">
  
  

    
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
            
                  <?php foreach($model->Listar() as $r): ?> 
                  <div class="row">
                      <div class="col-sm-12">
                          
                          <p style="font-size: 22px;">Calificar Grupos Asignados al <?php echo " Lic. ".$r->__GET('nombre'); echo " ".$r->__GET('paterno'); echo " ".$r->__GET('materno'); ?></p>

                        </div>
                      

                  
                  </div >
                  
                  <?php endforeach; ?>  
              
        </div>
    
    
    
    
    <div class="container">
        
        <?php foreach($model->Listar() as $r): ?> 
        
        <div id="accordion">
            
        
          <div class="card">
              
             
              
            <div class="card-header" id="heading1">
              <h5 class="mb-0">
                <button class="btn btn-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                  <?php if(isset($dataRow1[0])){echo $dataRow1[0]." | ".$dataRow1[1]." | Ingeniería (en) ".$dataRow1[2]." | ".$dataRow1[3]." | ".$dataRow1[4];} ?>
                </button>
              </h5>
            </div>

            <div id="collapse1" class="collapse" aria-labelledby="heading1" data-parent="#accordion">
              <div class="card-body">
                 
                  
                  <?php 
                  
                         $j = 1;
                  
                          for($i=0; $i <= 60; $i++){
                                
                                  if(isset($numeros1[$i])){
                                      
                                         //  Número de control, Nivel y Conexión        
                                  echo alumnos($numeros1[$i],$dataRow1[0], $link);
                                      
                                    echo  "<a href='SubirCalifiDo.php' class='btn btn-success' role='button' data-toggle='modal' data-target='#modalac".$i."'>Calificar</a>
                                        <a href='SubirCalifiDo.php' class='btn btn-warning' role='button' data-toggle='modal' data-target='#modalm".$i."'>Modificar</a>
                                        <a href='SubirCalifiDo.php' class='btn btn-primary' role='button' data-toggle='modal' data-target='#modalp".$i."'>Calcular y Registrar Promedio</a>";
                                      echo modales( "btnPostMec".$i, "btnPostMem".$i, "btnPostMep".$i, "modalc".$i, "modalm".$i, "modalp".$i);
                                       $j++;
                                  echo "<hr>";

                                  } 
                            }
                  ?>
                  
              </div>
            </div>
              
          </div>
            
            
            
            
          <div class="card">
              
            <div class="card-header" id="heading2">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                  <?php if(isset($dataRow2[0])){echo $dataRow2[0]." | ".$dataRow2[1]." | Ingeniería (en) ".$dataRow2[2]." | ".$dataRow2[3]." | ".$dataRow2[4];} ?>
                </button>
              </h5>
            </div>
              
            <div id="collapse2" class="collapse" aria-labelledby="heading2" data-parent="#accordion">
              <div class="card-body">
                
                  <?php 
                  
                         $j = 1;
                         $modalc = $modalm = "btnPostMe";
                           $c = 201; $m = 202;
                  
                          for($i=0; $i <= 60; $i++){
                                
                                  if(isset($numeros2[$i])){
                                      
                                         //  Número de control, Nivel y Conexión        
                                  echo alumnos($numeros2[$i],$dataRow2[0], $link);
                                      
                                    echo  "<a href='SubirCalifiDo.php' class='btn btn-success' role='button' data-toggle='modal' data-target='#modal".$c."'>Calificar</a>
                                        <a href='SubirCalifiDo.php' class='btn btn-warning' role='button' data-toggle='modal' data-target='#modal".$m."'>Modificar</a>";
                                      echo modales( "btnPostMe".$c, "btnPostMe".$m, "modal".$c, "modal".$m);
                                      $c = $c + 2; $m = $m + 2; $j++;
                                  echo "<hr>";

                                  } 
                            }
                  ?>
                  
                  
                  
              </div>
            </div>
              
          </div>
            
          <div class="card">
              
            <div class="card-header" id="heading3">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                  <?php if(isset($dataRow3[0])){echo $dataRow3[0]." | ".$dataRow3[1]." | Ingeniería (en) ".$dataRow3[2]." | ".$dataRow3[3]." | ".$dataRow3[4];} ?>
                </button>
              </h5>
            </div>
              
            <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
              <div class="card-body">
                 <?php 
                  
                         $j = 1;
                         $modalc = $modalm = "btnPostMe";
                           $c = 401; $m = 402;
                  
                          for($i=0; $i <= 60; $i++){
                                
                                  if(isset($numeros3[$i])){
                                      
                                         //  Número de control, Nivel y Conexión        
                                  echo alumnos($numeros3[$i],$dataRow3[0], $link);
                                      
                                    echo  "<a href='SubirCalifiDo.php' class='btn btn-success' role='button' data-toggle='modal' data-target='#modal".$c."'>Calificar</a>
                                        <a href='SubirCalifiDo.php' class='btn btn-warning' role='button' data-toggle='modal' data-target='#modal".$m."'>Modificar</a>";
                                      echo modales( "btnPostMe".$c, "btnPostMe".$m, "modal".$c, "modal".$m);
                                      $c = $c + 2; $m = $m + 2; $j++;
                                  echo "<hr>";

                                  } 
                            }
                  ?>
              </div>
            </div>
              
          </div>
            
            
        <div class="card">
              
            <div class="card-header" id="heading4">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                  <?php if(isset($dataRow4[0])){echo $dataRow4[0]." | ".$dataRow4[1]." | Ingeniería (en) ".$dataRow4[2]." | ".$dataRow4[3]." | ".$dataRow4[4];} ?>
                </button>
              </h5>
            </div>
              
            <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
              <div class="card-body">
                 <?php 
                  
                         $j = 1;
                         $modalc = $modalm = "btnPostMe";
                           $c = 601; $m = 602;
                  
                          for($i=0; $i <= 60; $i++){
                                
                                  if(isset($numeros4[$i])){
                                      
                                         //  Número de control, Nivel y Conexión        
                                  echo alumnos($numeros4[$i],$dataRow4[0], $link);
                                      
                                    echo  "<a href='SubirCalifiDo.php' class='btn btn-success' role='button' data-toggle='modal' data-target='#modal".$c."'>Calificar</a>
                                        <a href='SubirCalifiDo.php' class='btn btn-warning' role='button' data-toggle='modal' data-target='#modal".$m."'>Modificar</a>";
                                      echo modales( "btnPostMe".$c, "btnPostMe".$m, "modal".$c, "modal".$m);
                                      $c = $c + 2; $m = $m + 2; $j++;
                                  echo "<hr>";

                                  } 
                            }
                  ?>
              </div>
            </div>
              
          </div>
            
            
        <div class="card">
              
            <div class="card-header" id="heading5">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                  <?php if(isset($dataRow5[0])){echo $dataRow5[0]." | ".$dataRow5[1]." | Ingeniería (en) ".$dataRow5[2]." | ".$dataRow5[3]." | ".$dataRow5[4];} ?>
                </button>
              </h5>
            </div>
              
            <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
              <div class="card-body">
                 <?php 
                  
                         $j = 1;
                         $modalc = $modalm = "btnPostMe";
                           $c = 801; $m = 802;
                  
                          for($i=0; $i <= 60; $i++){
                                
                                  if(isset($numeros5[$i])){
                                      
                                         //  Número de control, Nivel y Conexión        
                                  echo alumnos($numeros5[$i],$dataRow5[0], $link);
                                      
                                    echo  "<a href='SubirCalifiDo.php' class='btn btn-success' role='button' data-toggle='modal' data-target='#modal".$c."'>Calificar</a>
                                        <a href='SubirCalifiDo.php' class='btn btn-warning' role='button' data-toggle='modal' data-target='#modal".$m."'>Modificar</a>";
                                      echo modales( "btnPostMe".$c, "btnPostMe".$m, "modal".$c, "modal".$m);
                                      $c = $c + 2; $m = $m + 2; $j++;
                                  echo "<hr>";

                                  } 
                            }
                  ?>
              </div>
            </div>
              
          </div>
            
            
            
        <div class="card" style="display:">
              
            <div class="card-header" id="heading6">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                  <?php if(isset($dataRow6[0])){echo $dataRow6[0]." | ".$dataRow6[1]." | Ingeniería (en) ".$dataRow6[2]." | ".$dataRow6[3]." | ".$dataRow6[4];} ?>
                </button>
              </h5>
            </div>
              
            <div id="collapse6" class="collapse" aria-labelledby="heading6" data-parent="#accordion">
              <div class="card-body">
                 <?php 
                  
                         $j = 1;
                         $modalc = $modalm = "btnPostMe";
                           $c = 1001; $m = 1002;
                  
                          for($i=0; $i <= 60; $i++){
                                
                                  if(isset($numeros6[$i])){
                                      
                                         //  Número de control, Nivel y Conexión        
                                  echo alumnos($numeros6[$i],$dataRow6[0], $link);
                                      
                                    echo  "<a href='SubirCalifiDo.php' class='btn btn-success' role='button' data-toggle='modal' data-target='#modal".$c."'>Calificar</a>
                                        <a href='SubirCalifiDo.php' class='btn btn-warning' role='button' data-toggle='modal' data-target='#modal".$m."'>Modificar</a>";
                                      echo modales( "btnPostMe".$c, "btnPostMe".$m, "modal".$c, "modal".$m);
                                      $c = $c + 2; $m = $m + 2; $j++;
                                  echo "<hr>";

                                  } 
                            }
                  ?>
              </div>
            </div>
              
          </div>
            
            
            
            
            
            
          
            
            
        </div>
        <?php endforeach; ?>  
        
        
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