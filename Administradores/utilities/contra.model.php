<?php

// Include config file
require_once "../Require/config.php";

class contraModel
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

			$stm = $this->pdo->prepare("SELECT * FROM docentes ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new contra();
				
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('paterno', $r->paterno);
				$alm->__SET('materno', $r->materno);
				$alm->__SET('password', $r->password);
                $alm->__SET('idmaestro', $r->idmaestro);
                $alm->__SET('titulo', $r->titulo);


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
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM docentes WHERE idmaestro = '".$_SESSION['idmaestro']."'");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new contra();
				
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('paterno', $r->paterno);
				$alm->__SET('materno', $r->materno);
				$alm->__SET('idmaestro', $r->idmaestro);
                $alm->__SET('roll', $r->roll);
                $alm->__SET('titulo', $r->titulo);

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
			          ->prepare("SELECT * FROM docentes WHERE idmaestro = ?");
			          

			$stm->execute(array($idmaestro));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new contra();

			$alm->__SET('idmaestro', $r->idmaestro);
			$alm->__SET('nombre', $r->nombre);
			$alm->__SET('paterno', $r->paterno);
			$alm->__SET('materno', $r->materno);
			$alm->__SET('idmaestro', $r->idmaestro);
            $alm->__SET('password', $r->password);
            $alm->__SET('titulo', $r->titulo);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idmaestro)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("UPDATE docentes SET roll = '0' WHERE idmaestro = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(contra $data)
	{
		try 
		{
			$sql = "UPDATE docentes SET  
						password = ?
				    WHERE idmaestro = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('password'),
					$data->__GET('idmaestro')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
	public function Registrar(contra $data)
	{
		try 
		{
		$sql = "INSERT INTO docentes (nombre,paterno,materno,roll) 
		        VALUES (?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('nombre'), 
				$data->__GET('paterno'), 
				$data->__GET('materno'),
                $data->__GET('roll')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}