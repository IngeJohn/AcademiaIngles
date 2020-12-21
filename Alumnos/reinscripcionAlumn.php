<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
   
}else{
    header("location: ../Alumnos/logoutAl.php");
}
// Include config file
require_once "../Require/config.php";

date_default_timezone_set('America/Mexico_City');

    $peri = "";  
    $per = "";  
    $mes = date("n"); 
    $year = date("Y"); 

if ($mes >= 1 && $mes <= 6){
    $per = 1;
    $peri = "Periodo: ".$per."-".$year;
}else if($mes >= 8 && $mes <= 12){
    $per = 2;
    $peri = "Periodo: ".$per."-".$year;
}



if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $sql1 = "UPDATE `academia_ingles`.`alumnos` SET `nivelActual`='6', `periodoActual`='2-2020' WHERE `numeroControl`= {$_SESSION["numeroControl"]}";
    
    if($stmt = mysqli_prepare($link, $sql)){
        
    }
    
    echo("<p><script>alert('¡Te has inscrito exitosamente!');</script></p>");

}





$numeroControl = $curp = $nombre = $paterno = $materno = $sexo = $direccion = $telefono = $nivelActual = $idmaestroActual = $estado = $modalidad = $numeroNivel = " ";



// Prepare a select statement, checks for the las level.
        $sql = "SELECT id, numeroControl, curp, nombre, paterno, materno, sexo, direccion, telefono, nivelActual, idmaestroActual FROM alumnos WHERE numeroControl = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_numeroControl);
            
            // Set parameters
            $param_numeroControl = $_SESSION["numeroControl"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if data exists
                if(mysqli_stmt_num_rows($stmt) == 1){ 
                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $numeroControl, $curp, $nombre, $paterno, $materno, $sexo, $direccion, $telefono, $nivelActual, $idmaestroActual);
                    if(mysqli_stmt_fetch($stmt)){
                            // Store data in session variables  
                            $_SESSION["nombre"] = $nombre;
                            $_SESSION["paterno"] = $paterno;
                            $_SESSION["materno"] = $materno;
                            $_SESSION["sexo"] = $sexo;
                            $_SESSION["direccion"] = $direccion;
                            $_SESSION["telefono"] = $telefono;
                            $_SESSION["nivelActual"] = $nivelActual;
                        
                        //echo "si entro\n";
                        } 
                    }else {
                          // echo "no se encontro nada";
                      }
                } 
            } else{
                echo "Oops! Algo salio mal. Por favor intenta más tarde.";
            }
        
        
        // Close statement
        mysqli_stmt_close($stmt);

$query = "SELECT  numeroNivel, estado, modalidad FROM `niveles` WHERE numeroControl = {$_SESSION["numeroControl"]}";


// resultNiv
$result = mysqli_query($link, $query);


if (!$result) {
    $message  = 'Invalid query: ' . mysqli_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}


$dataRow = "";

while($row1 = mysqli_fetch_array($result)){
    $dataRow = $dataRow."<tr><td>&nbsp;&nbsp;&nbsp;$row1[0]</td><td>$row1[1]</td><td>$row1[2]</td><tr>"; 
}




// Close statement
$result->close();



if ($stmt2 = $link->prepare("SELECT  numeroNivel, estado, modalidad FROM `niveles` WHERE numeroControl = {$_SESSION["numeroControl"]} AND numeroNivel = {$nivelActual}")) {
    $stmt2->execute();

    /* bind variables to prepared statement */
    $stmt2->bind_result($numeroNivel, $estado, $modalidad);

    /* fetch values */
$stmt2->fetch();

    
    


    /* close statement */
    $stmt2->close();
}
/* close connection */
$link->close();





$mensaje = "";
$color1 = "white";
$accion = "";
$mas1 = $_SESSION["nivelActual"];

$_SESSION["estado"] = $estado;
//$per = 1;
if(strcmp($_SESSION["estado"], 'En curso') === 0 ){
    
    $mensaje = $mensaje." ya estas inscrito en el nivel ".$_SESSION["nivelActual"]." del periodo ".$peri;
                $accion = "disabled";
    $color1 = "lightgreen";
 }else{         
    
    if (strcmp($_SESSION["estado"], 'No acreditado') === 0 ) {
        $color1 = "orange";
        $mensaje = ' No acreditaste el nivel '.$_SESSION["nivelActual"].', deberas repetir el mismo nivel.';
        if ($_SESSION["nivelActual"] & 1 ){
            //odd
            if (strcmp($per, '2') === 0 ){
                
                 $mensaje = $mensaje." El nivel ".$_SESSION["nivelActual"]." Si se oferta en este periodo.";

            }else{
                $mensaje = $mensaje." Ten en cuenta que el nivel ".$_SESSION["nivelActual"]." No se oferta en este periodo.";
                $accion = "disabled";
            }
        }else{
            //even
            if ( strcmp($per, '1') === 0){
                $color1 = "lightgreen";
                 $mensaje = $mensaje." El nivel ".$_SESSION["nivelActual"]." Si se oferta en este periodo.";
            }else{
                $mensaje = $mensaje." Ten en cuenta que el nivel ".$_SESSION["nivelActual"]." No se oferta en este periodo.";
                $accion = "disabled";
            }
        }
    }else if(strcmp($_SESSION["estado"], 'Acreditado') === 0 && strcmp($_SESSION["nivelActual"], '6') !== 0  ){
    //Odd
        
        
        if(($mas1+1) & 1){
            //Odd
            if(strcmp($per, '2') === 0 ){
                $color1 = "lightgreen";
                $mas1++;
                $mensaje =  "Acreditaste el nivel ".$_SESSION["nivelActual"].", si podrás inscribirte en el nivel ".$mas1++;
            }else{
                $mas1++;
                $color1 = "red";
                $accion = "disabled";
                $mensaje =  "Parece que perdiste un semestre, no podras reinscribirte en el nivel ". $mas1.", deberas esperar al siguiente periodo.";
            }
            
            
        }else{
            if(strcmp($per, '1') === 0 ){
                $color1 = "lightgreen";
                $mas1++;
                $mensaje =  "Te puedes registrar en el nivel ".$mas1;
            }else{
                $mas1++;
                $color1 = "red";
                $mensaje =  "Parece que perdiste un semestre, no podras reinscribirte este periodo en el nivel ".$mas1." ya que no se oferta, deberas esperar al siguiente periodo.";
                $accion = "disabled";
            }
            
        }
        

    }elseif(strcmp($_SESSION["estado"], 'Acreditado') === 0 && strcmp($_SESSION["nivelActual"], '6') === 0  ){
        $color1 = "lightgreen";
        $mensaje = 'Has acreditado todos los niveles.';
        $accion = "disabled";
    }else{
        $color1 = "black";
        $mensaje = 'Nada que mostrar.';
        $accion = "disabled";
    }

}
//=========================================================================================================
require_once 'alumno.entidad.php';
require_once 'alumno.model.php';

// Logica
$alm = new Alumno();
$model = new AlumnoModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('id',              $_REQUEST['id']);
            $alm->__SET('direccion',       $_REQUEST['direccion']);
            $alm->__SET('estado',          $_REQUEST['estado']);
            $alm->__SET('municipio',       $_REQUEST['municipio']);
            $alm->__SET('localidad',       $_REQUEST['localidad']);
            $alm->__SET('telefono',        $_REQUEST['telefono']);

			$model->Actualizar($alm);
			header('Location: reinscripcionAlumn.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_SESSION['numeroControl']);
			break;
	}
}

?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Reinscripción Alumnos</title>
        
        <link rel="stylesheet" href="../bootstrap/4.5.3/dist/css/bootstrap.min.css" 
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" 
          crossorigin="anonymous">
    
        <script src="../jquery/3.5.1/jquery-3.5.1.slim.min.js" 
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
            crossorigin="anonymous"></script>
    
        <script src="../bootstrap/4.5.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" 
            crossorigin="anonymous"></script>
    
    <link rel="icon" href="../imagenes/itsl2.png">
        <style type="text/css">
            		body{
            background-color: lightslategray;
            
            }
        .logo{
            width: 50%;
            height: auto;
            padding-top: 30px;
        }
            header {
                  background-color: #000000;

                   }
            .demo-content{
                background: #ffffff;
                padding-top: 40px;
                padding-left: 40px;
                padding-right: 100px;
                }
            /* The Modal (background) */
            .modal {
              display: none; /* Hidden by default */
              position: fixed; /* Stay in place */
              z-index: 1; /* Sit on top */
              padding-top: 50px; /* Location of the box */
              left: 0;
              top: 0;
              width: 100%; /* Full width */
              height: 100%; /* Full height */
              overflow: auto; /* Enable scroll if needed */
              background-color: rgb(0,0,0); /* Fallback color */
              background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
              background-color: #fefefe;
              margin: auto;
              padding: 20px;
              border: 1px solid #888;
              width: 80%;
            }

            /* The Close Button */
            .close {
              color: #aaaaaa;
              float: right;
              font-size: 28px;
              font-weight: bold;
            }

            .close:hover,
            .close:focus {
              color: #000;
              text-decoration: none;
              cursor: pointer;
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

                            <a href="../home.php" class="btn btn-outline-light" role="button" >Ir al inicio</a>
                            
                            <a href="reinscripcionAlumn.php" class="btn btn-outline-light active" role="button">Reinscripción Alumnos</a>

                            <a href="reinscripcionVeri.php" class="btn btn-outline-light" role="button">&nbsp;Pulsa para salir&nbsp;</a>

                        </div>    
                    </div>
                
                
                


            </div>
        </div>
</header>
    <div class="container demo-content">
        
        <div class="pure-g">
            <div class="pure-u-1-1">
        
                <h2><br>Datos del Alumno</h2>
                <hr>
                
                    <p style="font-size:20px;">Datos Personales</p>
        
                <?php foreach($model->Listar() as $r): ?> 
                    <p><b>Nombre: </b><?php echo $r->__GET('nombre'); ?>&nbsp;<?php echo $r->__GET('paterno'); ?>&nbsp;<?php echo $r->__GET('materno'); ?></p>
                    <p><b>Fecha de nacimiento: </b><?php echo $r->__GET('fnacimiento'); ?></p>
                    <p><b>CURP: </b><?php echo $r->__GET('curp'); ?></p>
                    <p><b>Sexo: </b><?php echo $r->__GET('sexo'); ?></p>
                
                
                <hr>
                
                    <p style="font-size:20px;">Información de contacto</p>
                
                    <p><b>Dirección: </b><?php echo $r->__GET('direccion'); ?>
                    <p><b>Estado: </b><?php echo $r->__GET('estado'); ?>
                    <p><b>Municipio: </b><?php echo $r->__GET('municipio'); ?>
                    <p><b>Localidad: </b><?php echo $r->__GET('localidad'); ?>
                    <p><b>Teléfono: </b><?php echo $r->__GET('telefono'); ?>
                    
                    <p><a id="myBtn" href="?action=editar&id=<?php echo $r->id; ?>" class="btn btn-primary">Actualizar Información</a></p>
                
                
                
                <hr>
                    <p style="font-size:20px;">Datos Academicos</p>
                    <p><b>Número de Control: </b><?php echo $r->__GET('numeroControl'); ?></p>
                    <p><b>Último nivel inscrito: </b><?php echo $r->__GET('nivelActual'); ?></p>
                    <p><b>Grupo: </b><?php echo $r->__GET('grupoActual'); ?></p>
                    <p><b>Maestro id: </b><?php echo $r->__GET('idmaestroActual'); ?>Pendiente</p>
                    <p><b>Carrera: </b><?php echo $r->__GET('carrera'); ?></p>
                    <p><b>Modalidad: </b><?php echo $r->__GET('modalidad'); ?></p>
                <br>
                        <p style="font-size:20px;">Historial Niveles</p>
                        	  
                        
                            <table class="table" style="width:400px">
                                <thead>
                                    <tr>
                                        <th>Nivel</th>
                                        <th>Estado</th>
                                        <th>Modalidad</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo $dataRow;?>
                                </tbody>
                            </table>
                      
                    
                        
                    
                    
               <?php endforeach; ?>
                    
            </div>
            
        </div>
        
        
        <!-- The Modal -->
        <div id="myModal" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
            <span class="close">&times;</span>
            <h3>Actualiza tu información de contacto</h3>
              <hr>
            <div class= "container">
                <div class= "row">
                    <div class="pure-g">
                        <div class="pure-u-1-2">
                          <div>  
                            <form action="?action=actualizar&id" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                                <input type="hidden" name="id" value="<?php echo $alm->__GET('id'); ?>" />

                                <table style="width:auto" >
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Domicilio</b><input type="text" name="direccion" value="<?php echo $alm->__GET('direccion'); ?>" style="width:150%;" /></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Estado</b><select class="form-control" style="font-size:16px; width:auto;"name="estado" id="validationCustom03" onchange="ChangeEstList()" required>
                                                <option value="">Elije una opcion...</option>
                                                <option value="Zacatecas">Zacatecas</option>
                                                <option value="Aguascalientes">Aguascalientes</option>
                                              </select>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Municipio</b><select class="form-control" id="validationCustom04" name="municipio" onchange="ChangeMuniList()" required style="font-size:16px; width:auto;"></select></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Localidad</b><select class="form-control" id="validationCustom05" name="localidad" required style=" font-size:16px;width:auto;"></select></td>
                                    </tr>
                                    <tr>
                                        <th style="text-align:left;"></th>
                                        <td><b>Teléfono</b><input type="text" name="telefono" value="<?php echo $alm->__GET('telefono'); ?>" style="width:auto;" /></td>
                                    </tr>
                                </table>
                                <hr>
                                <button id="myBtn2" type="submit" class="btn btn-primary">Guardar</button>
                                <button id="myBtn3" type="button" class="btn btn-secondary">Cancelar</button>
                            </form>
                         </div>
                         
                        </div>
                    </div>
                </div>
			</div>
          </div>

        </div>

        

        
        <hr>
        <div class="container-fluid">
            <p style="font-size:26px;">Reinscripción &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<?php echo $peri; ?></p>
            <p>Toma en cuenta que para reinscribirte ya debes haber pagado tu cuota de reinscripción.</p>
            <p><b>Según la información registrada en el sistema: </b></p>
                
            <div style="border: 2px solid <?php echo $color1; ?>; border-radius: 5px; text-align:center; padding: 20px;">
            
            
            <?php echo $mensaje ?>
            
            </div>
                
                <form method="POST">
                    <br><label>Presiona para reinscribirte</label><br><br>
                    <button type="submit" class="btn btn-primary" <?php echo $accion; ?>>Reinscripción</button>
                </form>
        
            <br><br><br>
            
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
                            'El Crucero',
                            'El Durazno',
                            'El Forastero',
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
                            'El Solitario (El Injerto)',
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
                            'El Mezquite Largo',
                            'El Milagro [Viñedos]',
                            'El Retiro',
                            'Enfriadora de Leche',
                            'Esteban S. Castorena (Casas Coloradas)',
                            'Flor del Valle',
                            'Gemelo',
                            'Kalúa [Balneario y Restaurante]',
                            'La Esperanza',
                            'La Loma',
                            'La Loma',
                            'La Loma',
                            'La Loma Dos',
                            'La Manga (Las Mangas)',
                            'La Mojina',
                            'La Palmita',
                            'La Pila',
                            'La Primavera',
                            'La Purísima',
                            'La Raya',
                            'La Soledad',
                            'Las Carmelitas (Jesús Betancourt) [Granja]',
                            'Las Liebres',
                            'Las Palomas',
                            'Las Palomas (Jorge Ortiz Luévano)',
                            'Leyva',
                            'Los Alacranes',
                            'Los Badillo',
                            'Los Conejos (Arturo Adame)',
                            'Los Conejos (Jorge Adame)',
                            'Los Griegos (Griegos)',
                            'Los Pocitos',
                            'Los Sauces (Miguel Cardona)',
                            'Luis Moya',
                            'Maluz [Granja]',
                            'María Guadalupe Ramírez Diosdado',
                            'Milpa Alta',
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
                            'San Antonio',
                            'San Diego',
                            'San Felipe',
                            'San Isidro',
                            'San Jorge',
                            'San José (El Huarache) [Rancho]',
                            'San José de Buenavista [Viñedo]',
                            'San Miguel (Salvador Alba Gómez)',
                            'San Rafael',
                            'Santa Fe',
                            'Santa María',
                            'Santa Rita',
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
        var counter1 = 0;
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        
        // Get the button that save data
        var btn2 = document.getElementById("myBtn2");
        
        // Get the button that save data
        var btn3 = document.getElementById("myBtn3");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
          modal.style.display = "block";
            counter1 = 1;
            localStorage.setItem("counter1", counter1);
        }
        
         // When the user clicks the button, close the modal 
        btn2.onclick = function() {
          modal.style.display = "none";
            counter1 = 0;
            localStorage.setItem("counter1", counter1);
        }
        
         // When the user clicks the button, close the modal 
        btn3.onclick = function() {
          modal.style.display = "none";
            counter1 = 0;
            localStorage.setItem("counter1", counter1);
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
            counter1 = 0;
            localStorage.setItem("counter1", counter1);
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
              counter1 = 0;
              localStorage.setItem("counter1", counter1);
          }
        }
        counter1 = localStorage.getItem("counter1");
        if(counter1 != 0 ){
            modal.style.display = "block";
           }
    </script>
    
</body>
</html>