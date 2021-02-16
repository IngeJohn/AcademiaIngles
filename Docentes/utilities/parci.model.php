<?php

// Include config file
require_once "../Require/config.php";


class parciModel
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
    

    

	public function Listar($idfecha)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM alumnos, gruposasignados 
WHERE NOT EXISTS (SELECT parciales.numeroControl FROM gruposasignados, parciales 
WHERE parciales.numeroControl = alumnos.numeroControl  AND gruposasignados.idmaestro ='".$_SESSION['idmaestro']."'AND parciales.idparcialFecha = '".$idfecha."' ) 
AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' AND alumnos.idgrupoActual = gruposasignados.idgrupo");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new parci();
				
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
				$alm = new parci();
				
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
    
    
    
public function Listar3($idfecha)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT parciales.id, parciales.calificacion, parciales.unidades, parciales.numeroControl, parciales.idgrupo,  parciales.idparcialFecha FROM parciales, parcialfechas, gruposasignados WHERE parciales.idparcialFecha = parcialfechas.idparcialFechas AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' AND gruposasignados.idgrupo = parciales.idgrupo AND gruposasignados.idmaestro = '".$_SESSION['idmaestro']."' AND parciales.idparcialFecha = '".$idfecha."'");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new parci();
				
				$alm->__SET('id',    $r->id);
				$alm->__SET('calificacion',   $r->calificacion);
				$alm->__SET('unidades',   $r->unidades);
				$alm->__SET('numeroControl', $r->numeroControl);
                $alm->__SET('idgrupo', $r->idgrupo);
                $alm->__SET('idparcialFecha', $r->idparcialFecha);

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
			$stm = $this->pdo->prepare("SELECT * FROM parciales WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new parci();

			    $alm->__SET('id',                   $r->id);
                $alm->__SET('calificacion',         $r->calificacion);
                $alm->__SET('umidades',             $r->unidades);
                $alm->__SET('numeroControl',        $r->numeroControl);
                $alm->__SET('idgrupo',              $r->idgrupo);
                $alm->__SET('idparcialFecha',       $r->idparcialFecha);
                $alm->__SET('oportunidad',          $r->oportunidad);

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

			$alm = new parci();

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


	public function Actualizar(parci $data)
	{
		try 
		{
            $sql = "UPDATE parciales SET  
                        calificacion    = ?,
						unidades        = ?,
                        oportunidad     = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
                    
                    $data->__GET('calificacion'),                   
                    $data->__GET('unidades'),
                    $data->__GET('oportunidad'),
                    $data->__GET('id')
                    
					)
				);
            
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Registrar(parci $data)
	{
		try 
		{
		$sql2 = "INSERT INTO parciales (calificacion,unidades,numeroControl,idgrupo,idparcialFecha,oportunidad) 
		        VALUES (?, ?, ?, ?, ?, ?)";

			$this->pdo->prepare($sql2)
			     ->execute(
				array(
                    
                    $data->__GET('calificacion'),                   
                    $data->__GET('unidades'),
                    $data->__GET('numeroControl'),
					$data->__GET('idgrupo'),
                    $data->__GET('idparcialFecha'),
                    $data->__GET('oportunidad')
                    
					)
				);
            
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}