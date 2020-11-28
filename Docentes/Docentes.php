<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: IniciarSesionDo.php");
    exit;
}
 
// Include config file
require_once "../Require/config.php";


 
// Define variables and initialize with empty values
$new_password = $confirm_password = $old_password = "";
$new_password_err = $confirm_password_err = $old_password_err = "";



$query = "SELECT gruposasignados.nivel, gruposasignados.grupo, gruposasignados.carrera, gruposasignados.modalidad, periodoactual.periodo FROM academia_ingles.gruposasignados, academia_ingles.periodoactual WHERE gruposasignados.periodo = periodoactual.periodo AND periodoactual.idperiodoactual = '1' AND gruposasignados.idmaestro = {$_SESSION["idmaestro"]};";

//$query = "SELECT  nivel, grupo, carrera, modalidad FROM `gruposasignados` WHERE idmaestro = {$_SESSION["idmaestro"]}";

$result = mysqli_query($link, $query);

if (!$result) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

$dataRow = "";

while($row = mysqli_fetch_array($result))
{
    
    $dataRow = $dataRow."<tr><td>&nbsp;$row[0]</td>"."<td>&nbsp;$row[1]</td>"."<td>&nbsp;$row[2]</td>"."<td>&nbsp;$row[3]</td></tr>";
    
}


$query2 = "SELECT  periodo FROM periodoactual WHERE  idperiodoactual ='1'";

$result2 = mysqli_query($link, $query2);

if (!$result2) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query2;
    die($message);
}

$dataRow2 = "";

$row2 = mysqli_fetch_array($result2);

$dataRow2 = $row2["periodo"];




 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate old password
    if(empty(trim($_POST["old_password"]))){
        $old_password_err = "Inroduce tu contraseña actual.";     
    } elseif(strlen(trim($_POST["old_password"])) < 6){
        $old_password_err = "La contraseña debe ser de 6 digitos.";
    } else{
        $old_password = trim($_POST["old_password"]);
        if(password_verify($old_password,$_SESSION["contraseña"])){
            
    }else{
            $old_password_err = "La contraseña que ingresaste no coincide con tu contraseña actual.";
        }}
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Inroduce una nueva contraseña.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "La contraseña debe ser de 6 digitos.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirma la contraseña.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "La contraseña no coincide.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE docentes SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                //session_destroy();
                header("location: Docentes.php");
                exit();
            } else{
                echo "Uups! Algo salio mal, intenta más tarde.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}

//=========================================================================================================
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
		      font: 14px sans-serif;  
			  color: white;
			  background-color: #0a6d7a;
			  }
		header {
              background-color: #000000;
              padding: 3px;
              text-align: center;
              font-size: 30px;
              color: white;
              }
        .botones {
            padding:10px 40px 0 0;  
            text-align:right;
            
            
        }
        .bienvenida {
            padding:10px 0 0 40px;
            
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
  <h1 style="padding:10px;">Academia de Inglés del Instituto Tecnológico Superior de Loreto</h1>
</header>
    <div class="container-fluid">
        <div class="row justify-content-between">
            <div class="col-12 col-sm-12 col-md-6 col-lg-7 bienvenida">
        <p style="font-size:22px;"><b>Bienvenido(a): </b> <?php echo htmlspecialchars("Lic. ".$_SESSION["nombre"]); echo htmlspecialchars(" ".$_SESSION["paterno"]);echo htmlspecialchars(" ".$_SESSION["materno"]);?></p>
            </div>
            <div class= "col-12 col-sm-12 col-md-6 col-lg-5 align-self-end botones">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#modal1">Cambiar Contraseña</button>
                <a href="logoutDo.php" class="btn btn-light">Cerrar sesión</a>
            </div>
        </div>
    </div>
    
    
    
    
<!-- Large modal -->


<div class="modal fade bd-example-modal-lg" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="color:black">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Cambiar Contraseña</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
          <div class="container">
            <div class="row">
                <div class = col-sm-12>
                    
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
                        <div class="modal-body">
                            <div class="form-group row <?php echo (!empty($old_password_err)) ? 'has-error' : ''; ?>">
                                <label>Contraseña actual</label>
                                <input type="password" name="old_password" class="form-control" value="<?php echo $old_password; ?>">
                                <span class="help-block text-danger"><?php echo $old_password_err; ?></span>
                            </div>
                            <div class="form-group row <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                                <label>Contraseña nueva</label>
                                <input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
                                <span class="help-block text-danger"><?php echo $new_password_err; ?></span>
                            </div>
                            <div class="form-group row <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                                <label>Confirma nueva contraseña</label>
                                <input type="password" name="confirm_password" class="form-control mb-2">
                                <span class="help-block text-danger"><?php echo $confirm_password_err; ?></span>
                            </div>
                        </div>
                        <div class="form-group row modal-footer">
                            <input type="submit" class="btn btn-primary" value="Guardar cambios">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                        
      
                </div> 
            </div> 
        </div> 
      
    </div>
  </div>
</div>

<!-- Large modal 2 -->


<div class="modal fade bd-example-modal-lg" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" style="color:black">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Actualizar Datos</h4>
        <button id="myBtn4" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
        <div class= "container">
                <div class= "row">
                    <div class="pure-g">
                        <div class="pure-u-1-2">
                          <div>  
                            <form action="?action=actualizar&id" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                                <div class="modal-body">
                                    <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />

                                    <table style="width:400px; color:black;" >
                                        <tr>
                                            <th style="text-align:left; ">Dirección</th>
                                            <td><input type="text" name="direccion" value="<?php echo $alm->__GET('direccion'); ?>" style="width:220%;" /></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:left;">Teléfono</th>
                                            <td><input type="text" name="telefono" value="<?php echo $alm->__GET('telefono'); ?>" style="width:70%;" /></td>
                                        </tr>
                                        <tr>
                                            <th style="text-align:left;">Email</th>
                                            <td><input type="text" name="email" value="<?php echo $alm->__GET('email'); ?>" style="width:220%;" /></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button id="myBtn3" type="submit" class="btn btn-primary">Actualizar</button>
                                    <button id="myBtn2" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                </div>
                            </form>
                         </div>
                         
                        </div>
                    </div>
                </div>
			</div>
      
         
    </div>
  </div>
</div>

    
    <hr>
    
    <div class="container" >
            <div class="collapse" id="collapse1">
              <div class="card card-body" style="color:black;">
                  <?php foreach($model->Listar() as $r): ?> 
                  <div class="row">
                      <div class="col">
                          
                              <p style="font-size: 18px;"><b>Información del Docente</b></p>
                              <p><b>Nombre: </b><?php echo "Lic. ".$r->__GET('nombre'); echo " ".$r->__GET('paterno'); echo " ".$r->__GET('materno'); ?></p>
                              <p><b>Sexo: </b><?php echo $r->__GET('sexo'); ?></p>
                              <p><b>No. de Empleado: </b><?php echo $r->__GET('idmaestro'); ?></p>
                              <p><b>CURP: </b><?php echo $r->__GET('curp'); ?></p>
                              <p><b>No. del ISSSTE: </b><?php echo $r->__GET('n_issste'); ?></p>
                              <hr>
                              <p><b>Información de Contacto</b></p>
                              <p><b>Dirección: </b><?php echo $r->__GET('direccion'); ?></p>
                              <p><b>Teléfono: </b><?php echo $r->__GET('telefono'); ?></p>
                              <p><b>Email: </b><?php echo $r->__GET('email'); ?></p>
                          
                      </div>
                  
                  </div >
                  <div class="row">
                      <div class="col">
                          
                          <p><a id="myBtn1" href="?action=editar&id=<?php echo $r->id; ?>" class="btn btn-primary">Actualizar Información</a>
                          <button id="myBtn6" type="button" class="btn btn-dark">Cerrar</button>
                          </p>
                          
                          
                      </div>
                  </div>
                  
                  <?php endforeach; ?>
              </div>
                
            </div>
        </div>
    
    <br>
    
    
    
        <div class="container" >
            <div class="collapse" id="collapse2">
              <div class="card card-body" style="color:black;">
                  
                  <div class="row">
                      <div class="col-9">
                          
                              <p style="font-size: 18px;"><b>Niveles y Grupos Asignados Periodo <?php echo $dataRow2;?></b></p>
                              
                          
                              <div class="table-responsive">  
                    
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nivel</th>
                                            <th>Grupo</th>
                                            <th>Carrera</th>
                                            <th>Modalidad</th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php echo $dataRow;?>
                                    </tbody>
                                </table>
                              </div>

                         
                          
                      </div>
                  
                  </div >
                  <div class="row">
                      <div class="col">
                          
                          <p>
                              <a href="" class="btn btn-primary">Ver listas de alumnos</a>
                              <button id="myBtn8" type="button" class="btn btn-dark">Cerrar</button>
                          </p>
                          
                          
                      </div>
                  </div>
                  
                  
              </div>
                
            </div>
        </div>
    
    
    
    
    

	<div class= "container-fluid">
        <div class= "row justify-content-center">
            <div class="col-sm-4">
                <p style="text-align:center;">Selecciona una opción</p>
            </div>
        </div>
		<div class= "row justify-content-center">
            
			<div class= "col-7 col-sm-7 col-md-3 col-lg-2">
				 <p><a id="myBtn5"  role="button">
                    <img class="cuadros card"  alt="Grupos Asignados" src="../imagenes/profesores1.png" >
                    </a></p>
                 
			</div>
			<div class= "col-7 col-sm-7 col-md-3 col-lg-2">
				 <p><a href="SubirCalifiDo.php">
                    <img class="cuadros card"  alt="Subir Calificaciones" src="../imagenes/calificaciones.png" >
                    </a></p>
			</div>
			<div class= "col-7 col-sm-7 col-md-3 col-lg-2">
				 
				 <p><a id="myBtn7" role="button">
                    <img class="cuadros card"  alt="Subir Documentos" src="../imagenes/grupos.png" >
                    </a></p>
			</div>
            
		</div>

		</div>
    
    
        
    
    
    
  
    
    
    
    
        
    
    <hr>
    
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
        var counter2 = -1;
        $(document).ready(function(){
              $("#myBtn5").click(function(){
                $("#collapse1").collapse('toggle');
                  counter2 = counter2 * -1;
                  localStorage.setItem("counter2", counter2);
              });
              $(".btn-success").click(function(){
                $("#collapse1").collapse('show');
              });
              $("#myBtn6").click(function(){
                $("#collapse1").collapse('hide');
                  counter2 = counter2 * -1;
                  localStorage.setItem("counter2", counter2);
              });
            counter2 = localStorage.getItem("counter2");
            if(counter2 > 0 ){
                $("#collapse1").collapse('show');
            }else{
                $("#collapse1").collapse('hide');
            }
        });
    </script>
    
    
    
        <script>
        var counter3 = -1;
        $(document).ready(function(){
              $("#myBtn7").click(function(){
                $("#collapse2").collapse('toggle');
                  counter3 = counter3 * -1;
                  localStorage.setItem("counter3", counter3);
              });
              $(".btn-success").click(function(){
                $("#collapse2").collapse('show');
              });
              $("#myBtn8").click(function(){
                $("#collapse2").collapse('hide');
                  counter3 = counter3 * -1;
                  localStorage.setItem("counter3", counter3);
              });
            counter3 = localStorage.getItem("counter3");
            if(counter3 > 0 ){
                $("#collapse2").collapse('show');
            }else{
                $("#collapse2").collapse('hide');
            }
        });
    </script>
    
    
    
    
    
   <script>
       
        var counter1 = 0;
        // Get the modal
        var modal = document.getElementById("modal2");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn1");
        
        // Get the button that save data
        var btn2 = document.getElementById("myBtn2");
       
        // Get the button that save data
        var btn3 = document.getElementById("myBtn3");
       
       // Get the button that save data
        var btn4 = document.getElementById("myBtn4");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            counter1 = 1;
            localStorage.setItem("counter1", counter1);
        }
        
         // When the user clicks the button, close the modal 
        btn2.onclick = function() {
            counter1 = 0;
            localStorage.setItem("counter1", counter1);
        }
         // When the user clicks the button, close the modal 
        btn3.onclick = function() {
            counter1 = 0;
            localStorage.setItem("counter1", counter1);
        }
         // When the user clicks the button, close the modal 
        btn4.onclick = function() {
            counter1 = 0;
            localStorage.setItem("counter1", counter1);
        }

        counter1 = localStorage.getItem("counter1");
        if(counter1 != 0 ){
            $('#modal2').modal('show');
           }else{
               $('#modal2').modal('none');
           }
    </script>
	
	

</body>
</html>