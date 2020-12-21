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
    <title>Docentes</title>
    
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
                            
                            <a href="Docentes.php" class="btn btn-outline-light active" role="button" >Docentes</a>
                            
                            <a href="calificacionesAl.php" class="btn btn-outline-light" role="button" data-toggle="modal" data-target="#modal1">Cambiar contraseña</a>

                            <a href="logoutDo.php" class="btn btn-outline-light" role="button">Cerrar sesión</a>

                        </div>    
                    </div>
                
                
                


            </div>
        </div>
</header>

    
    
    
    
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
                                        <th style="text-align:left;"></th>
                                        <td><b>Domicilio</b><input type="text" name="direccion" value="<?php echo $alm->__GET('direccion'); ?>"  /></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Estado</b><select class="form-control" name="estado" id="validationCustom03" onchange="ChangeEstList()" required>
                                                <option value="">Elige...</option>
                                                <option value="Aguascalientes">Aguascalientes</option>
                                                <option value="Zacatecas">Zacatecas</option>
                                              </select>
                                        </td>
                                    </tr>
                                    <tr>
                                    
                                        <th style="text-align:left;"></th>
                                        <td><b>Municipio</b><select class="form-control" id="validationCustom04" name="municipio" onchange="ChangeMuniList()" required ><option value=""><?php echo $alm->__GET('municipio'); ?></option></select></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Localidad</b><select class="form-control" id="validationCustom05" name="localidad" required ><option value=""><?php echo $alm->__GET('localidad'); ?></option></select></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Código Postal</b><input type="number" name="postal" value="<?php echo $alm->__GET('postal'); ?>" style="width:auto;" /></td>
                                        
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Teléfono</b><input type="text" name="telefono" value="<?php echo $alm->__GET('telefono'); ?>" style="width:auto;" /></td>
                                        
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Email</b><input type="text" name="email" value="<?php echo $alm->__GET('email'); ?>" /></td>
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

    

    
    
    
    
    
        <div class="container" style="padding-top:40px;">
            <div class="collapse" id="collapse1">
              <div class="card card-body" style="color:black;">
            
                  <?php foreach($model->Listar() as $r): ?> 
                  <div class="row">
                      <div class="col-sm-6" style="border: 2px solid black; border-radius: 5px; text-align:left; padding: 20px;">
                          
                          <p style="font-size: 18px;"><b>Información Personal</b></p>
                          
                          <p><b>Nombre: </b><?php echo "Lic. ".$r->__GET('nombre'); echo " ".$r->__GET('paterno'); echo " ".$r->__GET('materno'); ?></p>
                          <p><b>Sexo: </b><?php echo $r->__GET('sexo'); ?></p>
                          <p><b>No. de Empleado: </b><?php echo $r->__GET('idmaestro'); ?></p>
                          <p><b>CURP: </b><?php echo $r->__GET('curp'); ?></p>
                          <p><b>RFC: </b><?php echo $r->__GET('rfc'); ?></p>
                          
                        </div>
                        <div class="col-sm-6" style="border: 2px solid black; border-radius: 5px; text-align:left; padding: 20px;">
                          
                          <p style="font-size: 18px;"><b>Información de Contacto</b></p>
                          <p><b>Domicilio: </b><?php echo $r->__GET('direccion'); ?></p>
                          <p><b>Estado: </b><?php echo $r->__GET('estado'); ?></p>
                          <p><b>Municipio: </b><?php echo $r->__GET('municipio'); ?></p>
                          <p><b>Localidad: </b><?php echo $r->__GET('localidad'); ?></p>
                          <p><b>Código postal: </b><?php echo $r->__GET('postal'); ?></p>
                          <p><b>Teléfono: </b><?php echo $r->__GET('telefono'); ?></p>
                          <p><b>Email: </b><?php echo $r->__GET('email'); ?></p>
                          <p><a id="myBtn1" href="?action=editar&id=<?php echo $r->id; ?>" class="btn btn-primary">Actualizar Información</a>
                          </p>
                      </div>
                  
                  </div >
                  <div class="row">
                      <div class="col">
                          
                          
                          
                          
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
    
    
    

    
    
    

	<div class= "container">
        <div class= "row justify-content-center">
            <div class="col-sm-4">
                <p style="text-align:center;">Selecciona una opción</p>
            </div>
        </div>
		<div class= "row justify-content-center">
            
			<div class= "col-7 col-sm-7 col-md-3 col-lg-2">
				 <p><a   role="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                    <img class="cuadros card"  alt="Grupos Asignados" src="../imagenes/profesores1.png" >
                    </a></p>
                 
			</div>
			<div class= "col-7 col-sm-7 col-md-3 col-lg-2">
				 <p><a href="SubirCalifiDo.php">
                    <img class="cuadros card"  alt="Subir Calificaciones" src="../imagenes/calificaciones.png" >
                    </a></p>
			</div>
			<div class= "col-7 col-sm-7 col-md-3 col-lg-2">
				 
				 <p><a role="button"  data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
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