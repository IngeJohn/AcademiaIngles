<?php

// Include config file
require_once "../Require/config.php";

class finalPModel
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

			$stm = $this->pdo->prepare("SELECT * FROM liberatipos");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new finalP();
				
				$alm->__SET('liberacion',     $r->liberacion);

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

			$stm = $this->pdo->prepare("SELECT * FROM alumnos 
WHERE NOT EXISTS (SELECT liberaciones.id FROM liberaciones 
WHERE liberaciones.numeroControl = alumnos.numeroControl );");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new finalP();
				
                $alm->__SET('numeroControl',         $r->numeroControl);
                $alm->__SET('idgrupoActual',         $r->idgrupoActual);
                

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
				$alm = new finalP();
				
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
    
    
    
public function Listar3()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT id, numeroControl, liberacion FROM liberaciones");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new finalP();
				
				$alm->__SET('id',    $r->id);
				$alm->__SET('numeroControl', $r->numeroControl);
                $alm->__SET('liberacion', $r->liberacion);

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
			$stm = $this->pdo->prepare("SELECT * FROM liberaciones WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new finalP();

            $alm->__SET('id',                   $r->id);
            $alm->__SET('numeroControl',        $r->numeroControl);
            $alm->__SET('liberacion',           $r->liberacion);
            $alm->__SET('liberacionTipo',       $r->liberacionTipo);
            $alm->__SET('comentario',           $r->comentario);
            $alm->__SET('promedioFinal',        $r->promedioFinal);
            $alm->__SET('fecha',                $r->fecha);
            $alm->__SET('periodo',              $r->periodo);
            $alm->__SET('puntaje',              $r->puntaje);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    

    
    public function Obtener2($numeroControl)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT id, numeroControl, nombre, paterno, materno, idgrupoActual AS idgrupo FROM alumnos WHERE numeroControl = ?");
			          

			$stm->execute(array($numeroControl));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new finalP();

                $alm->__SET('numeroControl',    $r->numeroControl);
                $alm->__SET('idgrupo',          $r->idgrupo);
                $alm->__SET('nombre',           $r->nombre);
                $alm->__SET('paterno',          $r->paterno);
                $alm->__SET('materno',          $r->materno);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Actualizar(finalP $data)
	{
		try 
		{
            $sql = "UPDATE liberaciones SET  
                        liberacion         = ?,
						liberacionTipo     = ?,
                        comentario         = ?,
                        promedioFinal      = ?,
                        periodo            = ?,
                        fecha              = ?,
                        puntaje            = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
                    
                    $data->__GET('liberacion'),                   
                    $data->__GET('liberacionTipo'),
                    $data->__GET('comentario'),
                    $data->__GET('promedioFinal'),
                    $data->__GET('periodo'),
                    $data->__GET('fecha'),
                    $data->__GET('puntaje'),
                    $data->__GET('id')
                    
					)
				);
            
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Registrar(finalP $data)
	{
		try 
		{
		$sql2 = "INSERT INTO liberaciones (numeroControl,liberacion,liberacionTipo,comentario,promedioFinal,fecha,periodo,puntaje) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql2)
			     ->execute(
				array(
                    
                    $data->__GET('numeroControl'),                   
                    $data->__GET('liberacion'),
                    $data->__GET('liberacionTipo'),
					$data->__GET('comentario'),
                    $data->__GET('promedioFinal'),
                    $data->__GET('fecha'),
                    $data->__GET('periodo'),
                    $data->__GET('puntaje')
                    
					)
				);
            
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}