<?php

// Include config file
require_once "../Require/config.php";

class DocenModel
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
    
    
    public function Listar0()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT certificacion FROM certificaciones");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Docen();
				
				$alm->__SET('certificacion',     $r->certificacion);

				$result[] = $alm;
			}

			return $result;
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

			$stm = $this->pdo->prepare("SELECT * FROM docentes ORDER BY idmaestro DESC;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Docen();
				
                $alm->__SET('nombre',          $r->nombre);
                $alm->__SET('paterno',         $r->paterno);
                $alm->__SET('materno',         $r->materno);
                $alm->__SET('username',        $r->username);
                $alm->__SET('sexo',            $r->sexo);
                $alm->__SET('curp',            $r->curp);
                $alm->__SET('rfc',             $r->rfc);
                $alm->__SET('idmaestro',       $r->idmaestro);
                $alm->__SET('roll',            $r->roll);
                $alm->__SET('password',        $r->password);
                $alm->__SET('fnacimiento',     $r->fnacimiento);
                $alm->__SET('altaBaja',        $r->altaBaja);
                $alm->__SET('nivelAcademico',  $r->nivelAcademico);
                $alm->__SET('titulo',          $r->titulo);
                $alm->__SET('certificacion',   $r->certificacion);
                $alm->__SET('direccion',       $r->direccion);
                $alm->__SET('estado',          $r->estado);
                $alm->__SET('municipio',       $r->municipio);
                $alm->__SET('localidad',       $r->localidad);
                $alm->__SET('postal',          $r->postal);
                $alm->__SET('telefono',        $r->telefono);

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
				$alm = new Docen();
				
				$alm->__SET('nombre',    $r->nombre);
				$alm->__SET('paterno',   $r->paterno);
				$alm->__SET('materno',   $r->materno);
				$alm->__SET('idmaestro', $r->idmaestro);
                $alm->__SET('roll',      $r->roll);
                $alm->__SET('titulo',    $r->titulo);

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
			$stm = $this->pdo->prepare("SELECT * FROM docentes WHERE idmaestro = ?");
			          

			$stm->execute(array($idmaestro));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Docen();

			$alm->__SET('nombre',          $r->nombre);
			$alm->__SET('paterno',         $r->paterno);
			$alm->__SET('materno',         $r->materno);
			$alm->__SET('username',        $r->username);
            $alm->__SET('sexo',            $r->sexo);
            $alm->__SET('curp',            $r->curp);
            $alm->__SET('rfc',             $r->rfc);
            $alm->__SET('idmaestro',       $r->idmaestro);
            $alm->__SET('roll',            $r->roll);
            $alm->__SET('password',        $r->password);
            $alm->__SET('fnacimiento',     $r->fnacimiento);
            $alm->__SET('altaBaja',        $r->altaBaja);
            $alm->__SET('nivelAcademico',  $r->nivelAcademico);
            $alm->__SET('titulo',          $r->titulo);
            $alm->__SET('certificacion',   $r->certificacion);
            $alm->__SET('direccion',       $r->direccion);
            $alm->__SET('estado',          $r->estado);
            $alm->__SET('municipio',       $r->municipio);
            $alm->__SET('localidad',       $r->localidad);
            $alm->__SET('postal',          $r->postal);
            $alm->__SET('telefono',        $r->telefono);
            $alm->__SET('fecha',           $r->fecha);
            $alm->__SET('email',           $r->email);
            
            

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

			$stm->execute(array($idmaestro));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Docen $data)
	{
		try 
		{
			$sql = "UPDATE docentes SET  
						nombre          = ?,
                        paterno         = ?,
                        materno         = ?,
                        username        = ?,
                        sexo            = ?,
                        curp            = ?,
                        rfc             = ?,
                        roll            = ?,
                        password        = ?,
                        fnacimiento     = ?,
                        altaBaja        = ?,
                        nivelAcademico  = ?,
                        titulo          = ?,
                        certificacion   = ?
				    WHERE idmaestro = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
                    
					$data->__GET('nombre'), 
                    $data->__GET('paterno'), 
                    $data->__GET('materno'),
                    $data->__GET('username'),
                    $data->__GET('sexo'),
                    $data->__GET('curp'),
                    $data->__GET('rfc'),
                    $data->__GET('roll'),
                    $data->__GET('password'),
                    $data->__GET('fnacimiento'),
                    $data->__GET('altaBaja'),
                    $data->__GET('nivelAcademico'),
                    $data->__GET('titulo'),
                    $data->__GET('certificacion'),
                    $data->__GET('idmaestro')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Docen $data)
	{
		try 
		{
		$sql = "INSERT INTO docentes (nombre,paterno,materno,username,sexo,curp,rfc,roll,password,fnacimiento,altaBaja,nivelAcademico,titulo,certificacion) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('nombre'), 
				$data->__GET('paterno'), 
				$data->__GET('materno'),
                $data->__GET('username'),
                $data->__GET('sexo'),
                $data->__GET('curp'),
                $data->__GET('rfc'),
                $data->__GET('roll'),
                $data->__GET('password'),
                $data->__GET('fnacimiento'),
                $data->__GET('altaBaja'),
                $data->__GET('nivelAcademico'),
                $data->__GET('titulo'),
                $data->__GET('certificacion')
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}