<?php

// Include config file
require_once "../Require/config.php";

class contraAlModel
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

			$stm = $this->pdo->prepare("SELECT * FROM alumnos ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new contraAl();
				
				$alm->__SET('id', $r->id);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('paterno', $r->paterno);
				$alm->__SET('materno', $r->materno);
				$alm->__SET('contrase', $r->contrase);
                $alm->__SET('numeroControl', $r->numeroControl);

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
				$alm = new contraAl();
				
				$alm->__SET('titulo', $r->titulo);
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

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM alumnos WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new contraAl();

			$alm->__SET('id', $r->id);
			$alm->__SET('nombre', $r->nombre);
			$alm->__SET('paterno', $r->paterno);
			$alm->__SET('materno', $r->materno);
			$alm->__SET('numeroControl', $r->numeroControl);
            $alm->__SET('contrase', $r->contrase);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Actualizar(contraAl $data)
	{
		try 
		{
			$sql = "UPDATE alumnos SET  
						contrase = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('contrase'),
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
}
?>