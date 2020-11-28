<?php
// Include config file
require_once "../Require/config.php";
 
// Define variables and initialize with empty values
$numeroControl = $confirm_numeroControl = $curp = $confirm_curp = $nombre = $paterno = $materno = $sexo = $direccion = $telefono = $grupo = $nivelActual = $estado = $municipio = $localidad = $fnacimiento = $modalidad = $carrera = $periodoactual = "";
$numeroControl_err = $confirm_numeroControl_err = $curp_err = $confirm_curp_err = $category_err = $nombre_err = $paterno_err = $materno_err = $sexo_err = $direccion_err = $telefono_err = $grupo_err = $nivelActual_err = $estado_err =$municipio_err =$localidad_err = $fnacimiento_err = $modalidad_err = $carrera_err = $periodoactual_err = "";





        // Prepare a select statement
        $sql = "SELECT periodo FROM periodoactual WHERE idperiodoactual = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_idperiodoactual);
            
            // Set parameters
            $param_idperiodoactual = '1';
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if idperiodoactual exists, if yes then verify 
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $param_periodoactual );
                    if(mysqli_stmt_fetch($stmt)){
                        
                            $periodoactual = $param_periodoactual;
                            // Store data in session variables
                            
                        
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $periodoactual_err = "No se encontro información con de el periodo actual.";
                }
            } else{
                echo "Ooops! Algo salio mal. Por favor intenta más tarde.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        //_________________
    
      
        //_________________
    
     if(empty(trim($_POST["grupo"]))){
        $grupo_err = "Selecciona tu grupo.";
    } else{
         $grupo = trim($_POST["grupo"]);
            } 
        //_________________
    
     if(empty(trim($_POST["nivelActual"]))){
        $nivelActual_err = "Selecciona el nivel de inglés al que te estas inscribiendo.";
    } else{
         $nivelActual = trim($_POST["nivelActual"]);
            } 
        //_________________		
    
        //_________________
    
     if(empty(trim($_POST["nombre"]))){
        $nombre_err = "Introduce tu nombre o nombres.";
    } else{
         $nombre = trim($_POST["nombre"]);
            } 
    //_________________
    
     if(empty(trim($_POST["paterno"]))){
        $paterno_err = "Introduce tu apellido paterno.";
    } else{
         $paterno = trim($_POST["paterno"]);
            } 
    //_________________
    
     if(empty(trim($_POST["materno"]))){
        $materno_err = "Introduce tu apellido materno.";
    } else{
         $materno = trim($_POST["materno"]);
            } 
    //_________________
    
     if(empty(trim($_POST["sexo"]))){
        $sexo_err = "Introduce tu sexo (F = femenino, M = masculino).";
    } else{
         $sexo = trim($_POST["sexo"]);
            } 
    //_________________
    
     if(empty(trim($_POST["direccion"]))){
        $direccion_err = "Introduce tu dirección.";
    } else{
         $direccion = trim($_POST["direccion"]);
            } 
    //_________________
    
     if(empty(trim($_POST["telefono"]))){
        $telefono_err = "Introduce tu número de teléfono.";
    } elseif(strlen(trim($_POST["telefono"])) < 10){
        $telefono_err = "EL número de teléfono debe tener 10 dígitos.";
    } else{
         $telefono = trim($_POST["telefono"]);
            } 
            //_________________
    
     if(empty(trim($_POST["estado"]))){
        $estado_err = "Selecciona un estado.";
    } else{
         $estado = trim($_POST["estado"]);
            } 
            //_________________
    
     if(empty(trim($_POST["municipio"]))){
        $municipio_err = "Selecciona un municipio.";
    } else{
         $municipio = trim($_POST["municipio"]);
            } 
            //_________________
    
     if(empty(trim($_POST["localidad"]))){
        $localidad_err = "Selecciona una localidad.";
    } else{
         $localidad = trim($_POST["localidad"]);
            } 
      //_________________
    
     if(empty(trim($_POST["fnacimiento"]))){
        $fnacimiento_err = "Selecciona tu fecha de nacimiento.";
    } else{
         $fnacimiento = trim($_POST["fnacimiento"]);
            } 
        //_________________  //_________________
    
     if(empty(trim($_POST["modalidad"]))){
        $modalidad_err = "Selecciona una modalidad.";
    } else{
         $modalidad= trim($_POST["modalidad"]);
            } 
        //_________________  //_________________
    
     if(empty(trim($_POST["carrera"]))){
        $carrera_err = "Selecciona una carrera.";
    } else{
         $carrera = trim($_POST["carrera"]);
            } 
        //_________________
    
    
    

 
    // Validate numeroControl
    if(empty(trim($_POST["numeroControl"]))){
        $numeroControl_err = "Introduce tu Número de Control.";
    } elseif(strlen(trim($_POST["numeroControl"])) < 8){
        $numeroControl_err = "El número de Control debe tener 8 dígitos.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM alumnos WHERE numeroControl = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_numeroControl);
            
            // Set parameters
            $param_numeroControl = trim($_POST["numeroControl"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $numeroControl_err = "Este número de control ya existe en el sistema.";
                } else{
                    $numeroControl = trim($_POST["numeroControl"]);
                }
                // Validate confirm numeroControl
                if(empty(trim($_POST["confirm_numeroControl"]))){
                    $confirm_numeroControl_err = "Confirma el Número de Control.";     
                } else{
                    $confirm_numeroControl = trim($_POST["confirm_numeroControl"]);
                    if(empty($numeroControl_err) && ($numeroControl != $confirm_numeroControl)){
                        $confirm_numeroControl_err = "Los Números de Control no coinciden";
                    }
                }
                
                
            } else{
                echo "Oops! Algo salio mal, intenta más tarde.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate curp
    if(empty(trim($_POST["curp"]))){
        $curp_err = "Introduce tu CURP.";     
    } elseif(strlen(trim($_POST["curp"])) < 18){
        $curp_err = "CURP debe tener 18 caracteres alfanuméricos.";
    } else{
        $curp = trim($_POST["curp"]);
    }
    
    // Validate confirm CURP
    if(empty(trim($_POST["confirm_curp"]))){
        $confirm_curp_err = "Confirma el CURP.";     
    } else{
        $confirm_curp = trim($_POST["confirm_curp"]);
        if(empty($curp_err) && ($curp != $confirm_curp)){
            $confirm_curp_err = "Las CURPs no coinciden";
        }
    }

    // Check input errors before inserting in database
    if(empty($numeroControl_err) && empty($confirm_numeroControl_err) && empty($curp_err) && empty($confirm_curp_err) && empty($nombre_err) && empty($paterno_err) && empty($materno_err) && empty($sexo_err) && empty($direccion_err) && empty($estado_err) && empty($municipio_err) && empty($loclidad_err) && empty($telefono_err) && empty($grupo_err) && empty($nivelActual_err) && empty($fnacimiento_err) && empty($modalidad_err) && empty($carrera_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO alumnos (numeroControl, curp, nombre, paterno, materno, sexo, direccion, telefono, grupoActual, nivelActual, estadoAcademico, estado, municipio, localidad, fnacimiento, modalidad, carrera, periodoActual) VALUES (?,?,?,?,?,?,?,?,?,?,'1',?,?,?,?,?,?,'{$periodoactual}')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssssssssssss", $param_numeroControl, $param_curp, $param_nombre, $param_paterno, $param_materno, $param_sexo, $param_direccion, $param_telefono, $param_grupo, $param_nivelActual, $param_estado, $param_municipio, $param_localidad, $param_fnacimiento, $param_modalidad, $param_carrera);
            
            // Set parameters
            $param_numeroControl = $numeroControl;
            $param_curp = $curp;
            $param_nombre = $nombre;
            $param_paterno = $paterno;
            $param_materno = $materno;
            $param_sexo = $sexo;
            $param_direccion = $direccion;
            $param_telefono = $telefono;
			$param_grupo = $grupo;
			$param_nivelActual = $nivelActual;
            $param_estado = $estado;
            $param_municipio = $municipio;
            $param_localidad = $localidad;
            $param_fnacimiento = $fnacimiento;
            $param_modalidad = $modalidad;
            $param_carrera = $carrera;
			
            echo "si preparo el statement";
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to home page
				$message = "¡Te has inscrito con exito! Volver al inicio.";
                echo "<script type='text/javascript'>alert('$message'); location.href='../home.php';</script>";
                
            } else{
                echo "Algo salio mal, intentalo más tarde."."Error: %s.\n", $stmt->error;
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
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <title>Inscripción alumnos de nuevo ingreso</title>
    
    <script src="../jquery/3.3.1/jquery-3.3.1.min.js"></script>
    
    <link rel="stylesheet" 
          href="../bootstrap/4.0.0/css/bootstrap.min.css" 
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
          crossorigin="anonymous">
    
    <script src="../gijgo/1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="../gijgo/1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="../gijgo/1.9.13/js/messages/messages.es-es.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/Alumnos/css/ex.css" type="text/css" />
    
    <style type="text/css">
        body{ font: 14px sans-serif; }
		header {
              background-color: #000000;
              padding: 3px;
              text-align: center;
              font-size: 30px;
              color: white;
               }
		.demo-content{
        background: #ffffff;
		padding-top: 40px;
        padding-left: 40px;
        padding-right: 100px;
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
        
        
        body {
    font: 14px/1.3 verdana, arial, helvetica, sans-serif;
    }
h1 {
    font-size:1.3em;
    margin: 1em 0 1.4em;
    }
a:link {
    color:#33c;
    }
a:visited {
    color:#339;
    }
ul {
    margin:1.4em 0 2em;
    }
ul li {
    margin-bottom:.8em;
    }
    </style>
</head>
<body>
    <header>
        <h2>Academia de Inglés del Instituto Tecnológico Superior de Loreto</h2>
    </header>
    <div class="container-fluid demo-content">
	    <p><a href="../home.php"><u>Inicio</u></a> > Registrar Alumnos</p>
        <h2>Registro de Alumnos de Nuevo Ingreso del periodo <?php  echo $periodoactual; ?></h2>
        <p>Llena esta forma para inscribirte en el curso de Inglés</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <hr>
            <p>Datos Personales</p>
            <div class= "row">
				
					<div class="form-group <?php echo (!empty($nombre_err)) ? 'has-error' : ''; ?> col-sm-3">
						<label>Nombre(s)</label>
						<input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>">
						<span class="text-danger"><?php echo $nombre_err; ?></span>
					</div> 
					<div class="form-group <?php echo (!empty($paterno_err)) ? 'has-error' : ''; ?> col-sm-3">
						<label>Apellido paterno</label>
						<input type="text" name="paterno" class="form-control" value="<?php echo $paterno; ?>">
						<span class="text-danger"><?php echo $paterno_err; ?></span>
					</div> 
					<div class="form-group <?php echo (!empty($materno_err)) ? 'has-error' : ''; ?> col-sm-3">
						<label>Apellido materno</label>
						<input type="text" name="materno" class="form-control" value="<?php echo $materno; ?>">
						<span class="text-danger"><?php echo $materno_err; ?></span>
					</div> 
                    
                    <div class="form-group <?php echo (!empty($fnacimiento_err)) ? 'has-error' : ''; ?> col-sm-3">
                        <label>Fecha de nacimiento (Año-mes-día)</label>
                        <input id="datepicker" width="276" name="fnacimiento" class="form-control" value="<?php echo $fnacimiento; ?>"/>
                        <span class="text-danger"><?php echo $fnacimiento_err; ?></span>
                    </div>
                    
                
                    <div class="form-group col-md-2">
						<label>Sexo</label>
						<select class="form-control" name= "sexo" >
                            <option value =" "> </option>
							<option value ="H">Hombre</option>
                            <option value ="M">Mujer</option>
							
						</select> 
                        
					</div>
                
                    <div class="form-group <?php echo (!empty($curp_err)) ? 'has-error' : ''; ?> col-sm-3">
						<label>CURP</label>
						<input type="text" name="curp" class="form-control" value="<?php echo $curp; ?>">
						<span class="text-danger"><?php echo $curp_err; ?></span>
					</div>
					<div class="form-group <?php echo (!empty($confirm_curp_err)) ? 'has-error' : ''; ?> col-sm-3">
						<label>Confirmar CURP</label>
						<input type="text" name="confirm_curp" class="form-control" value="<?php echo $confirm_curp; ?>">
						<span class="text-danger"><?php echo $confirm_curp_err; ?></span>
					</div>
                    
				</div>	
            <hr>
            <p>Datos Escolares</p>
                <div class= "row">
                
                    <div class="form-group <?php echo (!empty($numeroControl_err)) ? 'has-error' : ''; ?> col-sm-3">
						<label>Número de control</label>
						<input type="text" name="numeroControl" class="form-control" value="<?php echo $numeroControl; ?>">
						<span class="text-danger"><?php echo $numeroControl_err; ?></span>
					</div>   
                    
                    <div class="form-group <?php echo (!empty($confirm_numeroControl_err)) ? 'has-error' : ''; ?> col-sm-3">
						<label>Confirma Número de Control</label>
						<input type="text" name="confirm_numeroControl" class="form-control" value="<?php echo $confirm_numeroControl; ?>">
						<span class="text-danger"><?php echo $confirm_numeroControl_err; ?></span>
					</div>  
                
                
                    <div class="form-group col-md-3"> 
                            <label>&nbsp;&nbsp;Carrera   </label>


                            <select class="form-control" name= "carrera" >
                                <option value =" "> </option>
                                <option value ="Sistemas Computacionales">Sistemas Computacionales</option>
                                <option value ="Industrial">Industrial</option>
                                <option value ="Mecatrónica">Mecatrónica</option>
                                <option value ="Gestión Empresarial">Gestión Empresarial</option>

                            </select> 
                    </div>
                    <div class="form-group col-md-3"> 
                            <label>&nbsp;&nbsp;Modalidad   </label>


                            <select class="form-control" name= "modalidad" >
                                <option value =" "> </option>
                                <option value ="Escolarizado">Escolarizado</option>
                                <option value ="Sabatino">Sabatino</option>
                                <option value ="Verano">Verano</option>
                                

                            </select> 
                    </div>
                
                
                
                
					<div class="form-group col-md-1">
						<label>Nivel  </label>
						<select class="form-control" name= "nivelActual" >
							<option value ="1" selected>1</option>
							
						</select> 

                    </div>
                        
						
				    <div class="form-group col-md-1">
                        <label>&nbsp;&nbsp;Grupo   </label>
						<select class="form-control" name= "grupo" >
                            <option value =" "> </option>
							<option value ="A">A</option>
							<option value ="B">B</option>
							<option value ="C">C</option>
							<option value ="D">D</option>
							<option value ="E">E</option>
							<option value ="F">F</option>
                            <option value ="G">G</option>
                            <option value ="H">H</option>
                            <option value ="I">I</option>
						</select> 
                  </div>
                    
					
				</div>	
            <hr>
            <p>Información de contacto</p>
                <div class= "row">
                
				
				    <div class="form-group <?php echo (!empty($direccion_err)) ? 'has-error' : ''; ?> col-sm-4">
						<label>Domicilio</label>
						<input type="text" name="direccion" class="form-control" value="<?php echo $direccion; ?>">
						<span class="text-danger"><?php echo $direccion_err; ?></span>
					</div>
                
                
                  <div class="col-sm-3 form-group">
                        <label for="validationCustom03">Estado:</label>
                          <select class="form-control" name="estado" id="validationCustom03" onchange="ChangeEstList()" required>
                            <option value="">Elige una opción... </option>
                            <option value="Zacatecas">Zacatecas</option>
                            <option value="Aguascalientes">Aguascalientes</option>
                          </select>
                        <div class="invalid-feedback">
                            Elige un Estado.
                        </div>
                      </div>
                      <div class="col-sm-3 form-group">
                        <label for="validationCustom04">Municipio:</label>
                         <select class="form-control" id="validationCustom04" name="municipio" onchange="ChangeMuniList()" required></select>
                        <div class="invalid-feedback">
                            Elige un Municipio.
                        </div>
                      </div>
                
                
                        <div class="col-sm-4 form-group">
                        <label for="validationCustom05">Localidad:</label>
                         <select class="form-control" id="validationCustom05" name="localidad" required></select>
                        <div class="invalid-feedback">
                            Elige una Locaidad...
                        </div>
                      </div>
                
					<div class="form-group <?php echo (!empty($telefono_err)) ? 'has-error' : ''; ?> col-sm-2">
						<label>Teléfono</label>
						<input type="text" name="telefono" class="form-control" value="<?php echo $telefono; ?>">
						<span class="text-danger"><?php echo $telefono_err; ?></span>
					</div>    
				
				
			</div> 
            <hr>
            <div class="form-group col-sm-4">
                        <br>
						<input type="submit" class="btn btn-primary" value="Guardar">
						<input type="reset" class="btn btn-danger" value="Limpiar campos">
					</div>

        </form>
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
    <script type="text/javascript">
        var estYmuni = {};
        estYmuni['Zacatecas'] = ['Elige...','Loreto', 'Luis Moya', 'Noria de Ángles', 'Ojocaliente', 'Pinos', 'Villa González Ortega', 'Villa Gracía'];
        estYmuni['Aguascalientes'] = ['Elige...','Rincón de Romos', 'Cosío', 'Tepezalá', 'Asientos','Pavellón de Arteaga','San francisdo de los Romos','El Llano'];
        

        function ChangeEstList() {
            var estList = document.getElementById("validationCustom03");
            var muniList = document.getElementById("validationCustom04");
            var selEst = estList.options[estList.selectedIndex].value;
            //alert("si entro en la función ChangeMunList()".concat(selEst));
            while (muniList.options.length) {
                muniList.remove(0);
            }
            var ests = estYmuni[selEst];
            //alert("si entro en la función ChangeMunList()  ".concat(estYmuni[selEst]));
            if (ests) {
                var i;
                for (i = 0; i < ests.length; i++) {
                    var est = new Option(ests[i], ests[i]);
                    muniList.options.add(est);
                }
            }
            localStorage.setItem("ests", ests);
            //alert(ests);
        } 

    </script>
    
    
    <script type="text/javascript">
        
        
        var muniYloca = {};
        muniYloca['Loreto'] = ['Elige...',
                          'Bimbaletes',
                            'Carboneras (Los Lobos)',
                            'Charco Largo (San Jacinto)',
                            'Colonia Agrícola Vicente Guerrero',
                            'Colonia Hidalgo (El Tecolote)',
                            'Colonia Victoria (El Cuije)',
                            'Crisóstomos',
                            'Ejido Hidalgo',
                            'El Álamo',
                            'El Bajío (El Rosal)',
                            'El Becerro',
                            'El Cajetillo',
                            'El Carreño (Las Palmas)',
                            'El Carreño',
                            'El Chaparral',
                            'El Crucero [Rancho]',
                            'El Durazno',
                            'El Forastero (Raymundo Chavarría O.) [Rancho]',
                            'El Gordillo',
                            'El Hinojo',
                            'El Lobo',
                            'El Maguey',
                            'El Mastranto',
                            'El Matorral',
                            'El Mezquite',
                            'El Montoro',
                            'El Paraíso',
                            'El Prieto',
                            'El Puente (La Alamedita)',
                            'El Ranchito',
                            'El Refugio',
                            'El Rincón (José Rodríguez Carrera)',
                            'El Rincón (Luis Acevedo Sagredo)',
                            'El Rocío',
                            'El Salitre (El Bajío)',
                            'El Socorro',
                            'El Solitario (El Injerto) [Rancho]',
                            'El Tecolote (El Dormido)',
                            'El Tepetate',
                            'El Verde',
                            'El Vergel',
                            'Emilio Carranza (Arenal del Picacho)',
                            'Ezequiel Martínez',
                            'Felipe Carrillo Puerto (Carrillo Puerto)',
                            'Jesús González Montañez',
                            'Jesús María',
                            'La Alquería',
                            'La Amapola',
                            'La Biznaga',
                            'La Cascarona',
                            'La Concepción',
                            'La Embarcación (El Paraíso)',
                            'La Florida',
                            'La Huerta',
                            'La Lagunita',
                            'La Loma (El Bajío)',
                            'La Luz',
                            'La Mesita (Ojo de Agua de la Mesita)',
                            'La Presita (El Paraíso)',
                            'La Providencia (El Milagro)',
                            'La Puerta de la Mesa (María Santos Cruz R.)',
                            'La Salita (Guadalupe Moreno)',
                            'La Soledad (El Borrado)',
                            'La Soledad',
                            'La Ternera (Zenón Hernández)',
                            'La Tinaja',
                            'La Victoria',
                            'Larrañaga (Jorge Martínez)',
                            'Las Agujas (Monte de las Burras)',
                            'Las Canteritas (Manuel Rodríguez Hernández)',
                            'Las Estacas',
                            'Las Floridas (Gómez de Palacio)',
                            'Las Pintas',
                            'Las Playas',
                            'Linares',
                            'Loc. sin Nombre (Guadalupe Zacarías Aréchiga)',
                            'Lomas del Paraíso',
                            'Loreto',
                            'Los Cedros (Francisco Acevedo)',
                            'Los Cuates',
                            'Los Patos (El Dormido)',
                            'Los Rosarios (El Rosario)',
                            'Monte Grande',
                            'Norias de Guadalupe',
                            'Norias de la Venta',
                            'Norias de San Miguel',
                            'Ojo de Agua',
                            'Pozo San Matías',
                            'Rancho Dos Arbolitos',
                            'Rancho el Nogal',
                            'Rancho Zamora (David López Trinidad)',
                            'Salvador Salas Velázquez',
                            'San Blas',
                            'San Cayetano',
                            'San Isidro (El Salitrillo)',
                            'San Isidro (La Soledad)',
                            'San Isidro',
                            'San José de la Lechuguilla (El Calvario)',
                            'San José',
                            'San Marcos',
                            'San Matías',
                            'San Pedro',
                            'San Ramón',
                            'Santa Ana (Motor Amarillo)',
                            'Santa Cruz de las Palomas (Jesús Salas Elías)',
                            'Santa Elena',
                            'Santa María de los Ángeles',
                            'Santa Teresa (David López Trinidad) [Rancho]',
                            'Tanque de la Joya',
                            'Tanque de la Venada',
                            'Tierra Blanca',
                            'Unidad de Riego el Pajonal',
                            'Valle de San Francisco'];
        
        muniYloca['Luis Moya'] = ['Elige...',
                            'Acuña [Granja]',
                            'Barranquillas (Barranquilla)',
                            'Coecillo',
                            'Colonia Hidalgo',
                            'Colonia Julián Adame (Charco de la Gallina)',
                            'Colonia Lázaro Cárdenas',
                            'Colonia Ricardo Flores Magón (Anexo de Casas Coloradas)',
                            'Colonia Veinte de Noviembre',
                            'Domecq (Invido) [Industrias Vinícolas]',
                            'El Alazán (Roberto Franco)',
                            'El Cenizo',
                            'El Coecillo [Viñedos]',
                            'El Duraznillo',
                            'El Fresno',
                            'El Gran Chaparral',
                            'El Lagunero',
                            'El Llano',
                            'El Mezquital',
                            'El Mezquite Largo [Rancho]',
                            'El Milagro [Viñedos]',
                            'El Retiro [Rancho]',
                            'Enfriadora de Leche',
                            'Esteban S. Castorena (Casas Coloradas)',
                            'Flor del Valle [Rancho]',
                            'Gemelo',
                            'Kalúa [Balneario y Restaurante]',
                            'La Esperanza',
                            'La Loma',
                            'La Loma',
                            'La Loma [Rancho]',
                            'La Loma Dos',
                            'La Manga (Las Mangas)',
                            'La Mojina [Rancho]',
                            'La Palmita',
                            'La Pila',
                            'La Primavera',
                            'La Purísima',
                            'La Raya',
                            'La Soledad [Rancho]',
                            'Las Carmelitas (Jesús Betancourt) [Granja]',
                            'Las Liebres [Rancho]',
                            'Las Palomas',
                            'Las Palomas (Jorge Ortiz Luévano)',
                            'Leyva [Granja]',
                            'Los Alacranes',
                            'Los Badillo [Rancho]',
                            'Los Conejos (Arturo Adame)',
                            'Los Conejos (Jorge Adame)',
                            'Los Griegos (Griegos)',
                            'Los Pocitos',
                            'Los Sauces (Miguel Cardona)',
                            'Luis Moya',
                            'Maluz [Granja]',
                            'María Guadalupe Ramírez Diosdado',
                            'Milpa Alta [Rancho]',
                            'Nicasio Cardona Luévano',
                            'Ninguno',
                            'Noria de Molinos',
                            'Nuestra Señora de la Soledad [Viñedos]',
                            'Paty [Viñedos]',
                            'Pozo San Dimas (José García)',
                            'Rancho Casillas',
                            'Rancho del Padre',
                            'Rancho Dolores',
                            'Rancho Flores',
                            'Rancho Marcelita',
                            'Rancho Matanuzka (Alberto Guerrero)',
                            'San Ángel',
                            'San Antonio [Rancho]',
                            'San Diego',
                            'San Felipe [Rancho]',
                            'San Isidro',
                            'San Jorge',
                            'San José (El Huarache) [Rancho]',
                            'San José de Buenavista [Viñedo]',
                            'San Miguel (Salvador Alba Gómez)',
                            'San Rafael',
                            'Santa Fe',
                            'Santa María [Rancho]',
                            'Santa Rita [Rancho]',
                            'Sociedad Reyes (Pozo Diez)',
                            'Teresita [Viñedos]'];
        
        muniYloca['Noria de Ángles'] = ['Elige...', 
                            'Ampliación la Honda',
                            'Antártida Chilena',
                            'Bella Vista',
                            'Colonia Alvarado (El Gallinero)',
                            'Colonia Benito Juárez (Coyotes)',
                            'Colonia Francisco I. Madero',
                            'Colonia Independencia (La Soledad)',
                            'Colonia Lázaro Cárdenas',
                            'Colonia Madero (Madero)',
                            'Colonia Pozo Colorado',
                            'Colonia San Francisco (San Francisco)',
                            'De Guadalupe [Granjas]',
                            'El Blanquito',
                            'El Chaparral',
                            'El Lucero (San Carlos)',
                            'El Matorral',
                            'El Palmarito',
                            'El Salado',
                            'El Salvador',
                            'El Samaritano (Pozo Número Nueve)',
                            'El Socorro [Granja]',
                            'El Tepozán',
                            'Genaro [Estación]',
                            'General Guadalupe Victoria (Estación la Honda)',
                            'General Lauro G. Caloca (El Rascón)',
                            'Ignacio Zaragoza (San Diego)',
                            'La Curva [Rancho]',
                            'La Grulla',
                            'La Larga',
                            'La Puerta de la Venta',
                            'La Trinidad',
                            'Las Hondillas',
                            'Las Huertas',
                            'Loma Bonita',
                            'Loma de San Antonio',
                            'Los Cortés',
                            'Los Reyes [Rancho]',
                            'Maravillas',
                            'Noria de Ángeles',
                            'Norias de San Juan (San Juan)',
                            'Playas del Refugio (Huertas de Maravillas)',
                            'Pozo el Huizache (Rubén Serna)',
                            'Puerta de Puebla',
                            'Puerto de Juan Alberto',
                            'Rancho Dávila',
                            'Rancho Nuevo de Morelos (De Guadalupe)',
                            'Rancho Nuevo de Morelos (El Sagrado Corazón)',
                            'Real de Ángeles',
                            'San Agustín de las Cuevas',
                            'San Antonio de la Mula',
                            'San Juan',
                            'Santa Rosa'];



        function ChangeMuniList() {
            
            var munList = document.getElementById("validationCustom04");
            var locList = document.getElementById("validationCustom05");
            var selMun= munList.options[munList.selectedIndex].value;
            //alert("si entro en la función ChangeMunList()".concat(selMun));
            while (locList.options.length) {
                locList.remove(0);
            }
            var locs = muniYloca[selMun];
            if (locs) {
                var j;
                for (j = 0; j < locs.length; j++) {
                    var loc = new Option(locs[j], locs[j]);
                    locList.options.add(loc);
                }
            }
            //alert("si entro en la función ChangeMunList()".concat(locs));
        } 

    </script>
    
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            locale: 'es-es',
            format: 'yyyy/mm/dd'
        });
    </script>


</body>
</html>