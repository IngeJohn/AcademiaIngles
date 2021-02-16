<?php

// Include config file
require_once "../Require/config.php";


class DocenteModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
        
        global $host,$db,$pss,$us;
        
		try
		{
			$this->pdo = new PDO($host,$us,$pss);
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

			$stm = $this->pdo->prepare("SELECT * FROM docentes WHERE username = '".$_SESSION['username']."'");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Docente();
				
				$alm->__SET('username', $r->username);
                $alm->__SET('curp', $r->curp);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('paterno', $r->paterno);
				$alm->__SET('materno', $r->materno);
                $alm->__SET('sexo', $r->sexo);
                $alm->__SET('direccion', $r->direccion);
                $alm->__SET('estado', $r->estado);
                $alm->__SET('municipio', $r->municipio);
                $alm->__SET('localidad', $r->localidad);
                $alm->__SET('postal', $r->postal);
                $alm->__SET('telefono', $r->telefono);
				$alm->__SET('email', $r->email);
				$alm->__SET('rfc', $r->rfc);
				$alm->__SET('idmaestro', $r->idmaestro);
                $alm->__SET('fnacimiento',    $r->fnacimiento);
                $alm->__SET('nivelAcademico', $r->nivelAcademico);
                $alm->__SET('altaBaja', $r->altaBaja);
                $alm->__SET('titulo', $r->titulo);
                $alm->__SET('certificacion', $r->certificacion);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    
    
    	public function Listar2($n,$g,$c,$m,$p)
	{
		try
		{
			$result = array();
            
           // $n = 2;
         //   $g = "A";
          //      $c = "Industrial";
          //      $m = "Escolarizado";
          //      $p = "1-2021";
            
			$stm = $this->pdo->prepare("SELECT nombre, paterno, materno FROM alumnos WHERE idmaestroActual = '".$_SESSION['idmaestro']."' AND nivelActual = '".$n."' AND grupoActual = '".$g."' AND carrera = '".$c."' AND modalidad = '".$m."' AND periodoActual = '".$p."';");
            
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Docente();
				
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('paterno', $r->paterno);
				$alm->__SET('materno', $r->materno);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    
    

	public function Obtener($idmaestro)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM docentes WHERE username = '".$_SESSION['username']."'");
			          

			$stm->execute(array($idmaestro));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Docente();

			$alm->__SET('username', $r->username);
            $alm->__SET('curp', $r->curp);
			$alm->__SET('nombre', $r->nombre);
			$alm->__SET('paterno', $r->paterno);
			$alm->__SET('materno', $r->materno);
            $alm->__SET('sexo', $r->sexo);
            $alm->__SET('direccion', $r->direccion);
            $alm->__SET('estado', $r->estado);
            $alm->__SET('municipio', $r->municipio);
            $alm->__SET('localidad', $r->localidad);
            $alm->__SET('postal', $r->postal);
            $alm->__SET('telefono', $r->telefono);
			$alm->__SET('email', $r->email);
			$alm->__SET('rfc', $r->rfc);
			$alm->__SET('idmaestro', $r->idmaestro);
            $alm->__SET('fnacimiento',    $r->fnacimiento);
            $alm->__SET('nivelAcademico', $r->nivelAcademico);
            $alm->__SET('altaBaja', $r->altaBaja);
            $alm->__SET('titulo', $r->titulo);
            $alm->__SET('certificacion', $r->certificacion);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



	public function Actualizar(Docente $data)
	{
		try 
		{
			$sql = "UPDATE docentes SET 
                        direccion       = ?, 
                        estado       = ?, 
                        municipio       = ?, 
                        localidad       = ?, 
                        postal       = ?, 
                        telefono        = ?, 
                        email           = ? 
				    WHERE username = '".$_SESSION['username']."'";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
                    $data->__GET('direccion'),
                    $data->__GET('estado'),
                    $data->__GET('municipio'),
                    $data->__GET('localidad'),
                    $data->__GET('postal'),
                    $data->__GET('telefono'),
                    $data->__GET('email')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	
}