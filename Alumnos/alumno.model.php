<?php

// Include config file
require_once "../Require/config.php";


//===========================================================================================================================


if ($stmt3 = $link->prepare("SELECT  periodo FROM periodoactual")) {
    $stmt3->execute();

    /* bind variables to prepared statement */
    $stmt3->bind_result($periActuBD);

    /* fetch values */
$stmt3->fetch();

    /* close statement */
    $stmt3->close();
}



class AlumnoModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=academia_ingles', 'academia_ingles', 'a98450153_-');
			$this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		        
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM alumnos WHERE numeroControl = '".$_SESSION['numeroControl']."'");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Alumno();
				
				$alm->__SET('id', $r->id);
				$alm->__SET('numeroControl', $r->numeroControl);
                $alm->__SET('curp', $r->curp);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('paterno', $r->paterno);
				$alm->__SET('materno', $r->materno);
                $alm->__SET('sexo', $r->sexo);
                $alm->__SET('fnacimiento', $r->fnacimiento);
                $alm->__SET('direccion', $r->direccion);
                $alm->__SET('estado', $r->estado);
                $alm->__SET('municipio', $r->municipio);
                $alm->__SET('localidad', $r->localidad);
                $alm->__SET('postal', $r->postal);
                $alm->__SET('email', $r->email);
                $alm->__SET('telefono', $r->telefono);
				
                
                

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    
    public function Listar2()
	{
        
        global $periActuBD;
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM gruposasignados WHERE periodo = '".$periActuBD."' AND nivel = 1");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Alumno();
				
				$alm->__SET('idgrupo', $r->idgrupo);
				$alm->__SET('nivel', $r->nivel);
                $alm->__SET('grupo', $r->grupo);
				$alm->__SET('carrera', $r->carrera);
				$alm->__SET('modalidad', $r->modalidad);
				$alm->__SET('periodo', $r->periodo);
                $alm->__SET('idmaestro', $r->idmaestro);
				
                
                

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    
    public function Listar3($idgrupo)
	{
        
        global $periActuBD;
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM gruposasignados WHERE idgrupo = '".$idgrupo."'");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Alumno();
				
				$alm->__SET('idgrupo', $r->idgrupo);
				$alm->__SET('nivel', $r->nivel);
                $alm->__SET('grupo', $r->grupo);
				$alm->__SET('carrera', $r->carrera);
				$alm->__SET('modalidad', $r->modalidad);
				$alm->__SET('periodo', $r->periodo);
                $alm->__SET('idmaestro', $r->idmaestro);
				
                
                

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    
    
    

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM alumnos WHERE numeroControl = '".$_SESSION['numeroControl']."'");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Alumno();

			$alm->__SET('id', $r->id);
			$alm->__SET('numeroControl', $r->numeroControl);
            $alm->__SET('curp', $r->curp);
			$alm->__SET('nombre', $r->nombre);
			$alm->__SET('paterno', $r->paterno);
			$alm->__SET('materno', $r->materno);
            $alm->__SET('sexo', $r->sexo);
            $alm->__SET('fnacimiento', $r->fnacimiento);
            $alm->__SET('direccion', $r->direccion);
            $alm->__SET('estado', $r->estado);
            $alm->__SET('municipio', $r->municipio);
            $alm->__SET('localidad', $r->localidad);
            $alm->__SET('postal', $r->postal);
            $alm->__SET('email', $r->email);
            $alm->__SET('telefono', $r->telefono);
			
            
            

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



	public function Actualizar(Alumno $data)
	{
		try 
		{
			$sql = "UPDATE alumnos SET 
                        direccion       = ?, 
                        telefono        = ?,
                        estado          = ?,
                        municipio       = ?,
                        localidad       = ?,
                        postal          = ?,
                        email           = ?
				    WHERE numeroControl = '".$_SESSION['numeroControl']."'";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
                    $data->__GET('direccion'),
                    $data->__GET('telefono'),
                    $data->__GET('estado'), 
                    $data->__GET('municipio'), 
                    $data->__GET('localidad'),
                    $data->__GET('postal'),
                    $data->__GET('email')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    

	
}