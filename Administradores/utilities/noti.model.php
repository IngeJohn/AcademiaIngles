<?php

// Include config file
require_once "../Require/config.php";

class notiModel
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

			$stm = $this->pdo->prepare("SELECT * FROM mensajes ORDER BY fecha DESC ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new noti();
				
				$alm->__SET('id', $r->id);
				$alm->__SET('mensaje', $r->mensaje);
				$alm->__SET('fecha', $r->fecha);
				$alm->__SET('idmaestro', $r->idmaestro);
                $alm->__SET('tipomensaje', $r->tipomensaje);


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
				$alm = new noti();
				
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

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM mensajes WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new noti();

			$alm->__SET('id', $r->id);
            $alm->__SET('mensaje', $r->mensaje);
            $alm->__SET('fecha', $r->fecha);
            $alm->__SET('idmaestro', $r->idmaestro);
            $alm->__SET('tipomensaje', $r->tipomensaje);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
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

	public function Actualizar(noti $data)
	{
		try 
		{
			$sql = "UPDATE mensajes SET  
						mensaje      = ?,
                        idmaestro   = ?,
                        tipomensaje = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
					$data->__GET('mensaje'),
                    $data->__GET('idmaestro'),
                    $data->__GET('tipomensaje'),
					$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
	public function Registrar(noti $data)
	{
		try 
		{
		$sql = "INSERT INTO mensajes (mensaje,idmaestro,tipomensaje) 
		        VALUES (?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('mensaje'), 
				$data->__GET('idmaestro'), 
				$data->__GET('tipomensaje')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}