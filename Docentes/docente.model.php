<?php

class DocenteModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=academia_ingles', 'root', 'a98450153_-');
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
				
				$alm->__SET('id', $r->id);
				$alm->__SET('username', $r->username);
                $alm->__SET('curp', $r->curp);
				$alm->__SET('nombre', $r->nombre);
				$alm->__SET('paterno', $r->paterno);
				$alm->__SET('materno', $r->materno);
                $alm->__SET('sexo', $r->sexo);
                $alm->__SET('direccion', $r->direccion);
                $alm->__SET('telefono', $r->telefono);
				$alm->__SET('email', $r->email);
				$alm->__SET('n_issste', $r->n_issste);
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
			          ->prepare("SELECT * FROM docentes WHERE username = '".$_SESSION['username']."'");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Docente();

			$alm->__SET('id', $r->id);
			$alm->__SET('username', $r->username);
            $alm->__SET('curp', $r->curp);
			$alm->__SET('nombre', $r->nombre);
			$alm->__SET('paterno', $r->paterno);
			$alm->__SET('materno', $r->materno);
            $alm->__SET('sexo', $r->sexo);
            $alm->__SET('direccion', $r->direccion);
            $alm->__SET('telefono', $r->telefono);
			$alm->__SET('email', $r->email);
			$alm->__SET('n_issste', $r->n_issste);
			$alm->__SET('idmaestro', $r->idmaestro);

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
                        telefono        = ?, 
                        email           = ? 
				    WHERE username = '".$_SESSION['username']."'";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
                    $data->__GET('direccion'),
                    $data->__GET('telefono'),
                    $data->__GET('email')
					//$data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	
}