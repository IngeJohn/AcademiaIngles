<?php

// Include config file
require_once "../Require/config.php";

class certiModel
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

			$stm = $this->pdo->prepare("SELECT * FROM certificaciones ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new certi();
				
				$alm->__SET('id', $r->id);
				$alm->__SET('certificacion', $r->certificacion);
				$alm->__SET('descripcion', $r->descripcion);


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
				$alm = new certi();
				
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

    	public function Listar3()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM liberatipos ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new certi();
				
				$alm->__SET('id', $r->id);
				$alm->__SET('liberacion', $r->liberacion);
				$alm->__SET('descripcion', $r->descripcion);


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
			          ->prepare("SELECT * FROM certificaciones WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new certi();

			$alm->__SET('id', $r->id);
			$alm->__SET('certificacion', $r->certificacion);
			$alm->__SET('descripcion', $r->descripcion);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    
    public function Obtener2($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM liberatipos WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new certi();

			$alm->__SET('id', $r->id);
			$alm->__SET('liberacion', $r->liberacion);
			$alm->__SET('descripcion', $r->descripcion);

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

	public function Actualizar(certi $data)
	{
		try 
		{
			$sql = "UPDATE certificaciones SET  
						certificacion = ?,
                        descripcion   = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('certificacion'),
                    $data->__GET('descripcion'),
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    
	public function Actualizar2(certi $data)
	{
		try 
		{
			$sql = "UPDATE liberatipos SET  
						liberacion = ?,
                        descripcion   = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('liberacion'),
                    $data->__GET('descripcion'),
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    
	public function Registrar(certi $data)
	{
		try 
		{
		$sql = "INSERT INTO certificaciones (certificacion,descripcion) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('certificacion'), 
				$data->__GET('descripcion')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
	public function Registrar2(certi $data)
	{
		try 
		{
		$sql = "INSERT INTO liberatipos (liberacion,descripcion) 
		        VALUES (?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('liberacion'), 
				$data->__GET('descripcion')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}