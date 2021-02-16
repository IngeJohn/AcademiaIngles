<?php

// Include config file
require_once "../Require/config.php";

date_default_timezone_set('America/Mexico_City');

 // $peri = "";  
                $per = "";  
                $mes = date("n"); 
                $year = date("Y"); 

                if ($mes >= 1 && $mes <= 6){
                    $per = 1;
                    //$peri = "Periodo: ".$per."-".$year;
                }else if($mes >= 8 && $mes <= 12){
                    $per = 2;
                    //$peri = "Periodo: ".$per."-".$year;

                }


                $periodoActu = $per."-".$year;


class GruposModel
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
            
            global $periActuBD;

			$stm = $this->pdo->prepare("SELECT * FROM gruposasignados WHERE periodo = '".$periActuBD."' ORDER BY idgrupo DESC");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Grupos();
				
				$alm->__SET('idgrupo',     $r->idgrupo);
                $alm->__SET('idmaestro',   $r->idmaestro);
                $alm->__SET('nivel',       $r->nivel);
                $alm->__SET('grupo',       $r->grupo);
                $alm->__SET('carrera',     $r->carrera);
                $alm->__SET('modalidad',   $r->modalidad);
                $alm->__SET('periodo',     $r->periodo);

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
				$alm = new Grupos();
				
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

			$stm = $this->pdo->prepare("SELECT * FROM docentes");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Grupos();
				
				$alm->__SET('nombre',    $r->nombre);
				$alm->__SET('paterno',   $r->paterno);
				$alm->__SET('materno',   $r->materno);
				$alm->__SET('idmaestro', $r->idmaestro);
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

	public function Obtener($idgrupo)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM gruposasignados WHERE idgrupo = ?");
			          

			$stm->execute(array($idgrupo));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Grupos();
   
			    $alm->__SET('idgrupo',     $r->idgrupo);
                $alm->__SET('idmaestro',   $r->idmaestro);
                $alm->__SET('nivel',       $r->nivel);
                $alm->__SET('grupo',       $r->grupo);
                $alm->__SET('carrera',     $r->carrera);
                $alm->__SET('modalidad',   $r->modalidad);
                $alm->__SET('periodo',     $r->periodo);

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
			$stm = $this->pdo->prepare("UPDATE gruposasignados SET roll = '0' WHERE idgrupo = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Grupos $data)
	{
		try 
		{
			$sql = "UPDATE gruposasignados SET  
                        idmaestro   = ?,
                        nivel       = ?,
                        grupo       = ?,
                        carrera     = ?,
                        modalidad   = ?,
                        periodo     = ?
				    WHERE idgrupo = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
                    $data->__GET('idmaestro'),
                    $data->__GET('nivel'),
                    $data->__GET('grupo'),
                    $data->__GET('carrera'),
                    $data->__GET('modalidad'),
                    $data->__GET('periodo'),
                    $data->__GET('idgrupo')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Grupos $data)
	{
		try 
		{
		$sql = "INSERT INTO gruposasignados (idmaestro,nivel,grupo,carrera,modalidad,periodo) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
				$data->__GET('idmaestro'),
                $data->__GET('nivel'),
                $data->__GET('grupo'),
                $data->__GET('carrera'),
                $data->__GET('modalidad'),
                $data->__GET('periodo'),
				)
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}