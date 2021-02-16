<?php

// Include config file
require_once "../Require/config.php";

class CLEModel
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

			$stm = $this->pdo->prepare("SELECT * FROM cle");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new CLE();
				
				$alm->__SET('id',                  $r->id);
                $alm->__SET('subdireccion',        $r->subdireccion);
                $alm->__SET('subdireccionNombre',  $r->subdireccionNombre);
                $alm->__SET('subTelOfi',           $r->subTelOfi);
                $alm->__SET('subTelOfiExt',        $r->subTelOfiExt);
                $alm->__SET('departamento',        $r->departamento);
                $alm->__SET('departamentoNombre',  $r->departamentoNombre);
                $alm->__SET('depTelOfi',           $r->depTelOfi);
                $alm->__SET('depTelOfiExt',        $r->depTelOfiExt);
                $alm->__SET('cleCoordinador',      $r->cleCoordinador);
                $alm->__SET('emailCoordi',         $r->emailCoordi);
                $alm->__SET('emailCoordiAlter',    $r->emailCoordiAlter);
                $alm->__SET('coorTelOfi',          $r->coorTelOfi);
                $alm->__SET('coorTelOfiExt',       $r->coorTelOfiExt);
                $alm->__SET('coorTelCel',          $r->coorTelCel);

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
				$alm = new CLE();
				
				$alm->__SET('nombre',    $r->nombre);
				$alm->__SET('paterno',   $r->paterno);
				$alm->__SET('materno',   $r->materno);
				$alm->__SET('idmaestro', $r->idmaestro);
                $alm->__SET('roll',      $r->roll);

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
			$stm = $this->pdo->prepare("SELECT * FROM cle WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new CLE();

			$alm->__SET('id',                 $r->id);
            $alm->__SET('subdireccion',       $r->subdireccion);
            $alm->__SET('subdireccionNombre', $r->subdireccionNombre);
            $alm->__SET('subTelOfi',          $r->subTelOfi);
            $alm->__SET('subTelOfiExt',       $r->subTelOfiExt);
            $alm->__SET('departamento',       $r->departamento);
            $alm->__SET('departamentoNombre', $r->departamentoNombre);
            $alm->__SET('depTelOfi',          $r->depTelOfi);
            $alm->__SET('depTelOfiExt',       $r->depTelOfiExt);
            $alm->__SET('cleCoordinador',     $r->cleCoordinador);
            $alm->__SET('emailCoordi',        $r->emailCoordi);
            $alm->__SET('emailCoordiAlter',   $r->emailCoordiAlter);
            $alm->__SET('coorTelOfi',         $r->coorTelOfi);
            $alm->__SET('coorTelOfiExt',      $r->coorTelOfiExt);
            $alm->__SET('coorTelCel',         $r->coorTelCel);

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
			          ->prepare("UPDATE cle SET roll = '0' WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(CLE $data)
	{
		try 
		{
			$sql = "UPDATE cle SET  
						subdireccion        = ?,
                        subdireccionNombre  = ?,
                        subTelOfi           = ?,
                        subTelOfiExt        = ?,
                        departamento        = ?,
                        departamentoNombre  = ?,
                        depTelOfi           = ?,
                        depTelOfiExt        = ?,
                        cleCoordinador      = ?,
                        emailCoordi         = ?,
                        emailCoordiAlter    = ?,
                        coorTelOfi          = ?,
                        coorTelOfiExt       = ?,
                        coorTelCel          = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
                    
					$data->__GET('subdireccion'), 
                    $data->__GET('subdireccionNombre'), 
                    $data->__GET('subTelOfi'),
                    $data->__GET('subTelOfiExt'),
                    $data->__GET('departamento'),
                    $data->__GET('departamentoNombre'),
                    $data->__GET('depTelOfi'),
                    $data->__GET('depTelOfiExt'),
                    $data->__GET('cleCoordinador'),
                    $data->__GET('emailCoordi'),
                    $data->__GET('emailCoordiAlter'),
                    $data->__GET('coorTelOfi'),
                    $data->__GET('coorTelOfiExt'),
                    $data->__GET('coorTelCel'),
                    $data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(CLE $data)
	{
		try 
		{
		$sql = "INSERT INTO cle ( subdireccion, subdireccionNombre, subTelOfi,subTelOfiExt, departamento, departamentoNombre, depTelOfi, depTelOfiExt, cleCoordinador, emailCoordi, emailCoordiAlter, coorTelOfi, coorTelOfiExt, coorTelCel ) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('subdireccion'), 
				$data->__GET('subdireccionNombre'), 
				$data->__GET('subTelOfi'),
                $data->__GET('subTelOfiExt'),
                $data->__GET('departamento'),
                $data->__GET('departamentoNombre'),
                $data->__GET('depTelOfi'),
				$data->__GET('depTelOfiExt'),
                $data->__GET('cleCoordinador'),
                $data->__GET('emailCoordi'),
                $data->__GET('emailCoordiAlter'),
                $data->__GET('coorTelOfi'),
                $data->__GET('coorTelOfiExt'),
                $data->__GET('coorTelCel')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}