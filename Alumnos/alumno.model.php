<?php

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
                $alm->__SET('telefono', $r->telefono);
				$alm->__SET('nivelActual', $r->nivelActual);
				$alm->__SET('grupoActual', $r->grupoActual);
                $alm->__SET('carrera', $r->carrera);
                $alm->__SET('modalidad', $r->modalidad);
				$alm->__SET('idmaestroActual', $r->idmaestroActual);

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
            $alm->__SET('telefono', $r->telefono);
			$alm->__SET('nivelActual', $r->nivelActual);
			$alm->__SET('grupoActual', $r->grupoActual);
            $alm->__SET('carrera', $r->carrera);
            $alm->__SET('modalidad', $r->modalidad);
			$alm->__SET('idmaestroActual', $r->idmaestroActual);

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
                        localidad       = ?
				    WHERE numeroControl = '".$_SESSION['numeroControl']."'";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
                    $data->__GET('direccion'),
                    $data->__GET('telefono'),
                    $data->__GET('estado'), 
                    $data->__GET('municipio'), 
                    $data->__GET('localidad')
					//$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	
}