<?php
// Include config file
require_once "../Require/config.php";

class CalifiModel
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

			$stm = $this->pdo->prepare("SELECT id, numeroControl, nombre, paterno, materno FROM alumnos, gruposasignados WHERE alumnos.idgrupoActual = gruposasignados.idgrupo 
                                            AND gruposasignados.periodo = '".$_SESSION['periodoDB']."'");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Califi();
				
				$alm->__SET('id',              $r->id);
                $alm->__SET('numeroControl',   $r->numeroControl);
                $alm->__SET('nombre',          $r->nombre);
                $alm->__SET('paterno',         $r->paterno);
                $alm->__SET('materno',         $r->materno);

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
				$alm = new Califi();
				
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
    
    
	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT numeroControl, nombre, paterno, materno FROM alumnos WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Califi();

			    $alm->__SET('numeroControl',      $r->numeroControl);
                $alm->__SET('nombre',             $r->nombre);
                $alm->__SET('paterno',            $r->paterno);
                $alm->__SET('materno',            $r->materno);

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
			$stm = $this->pdo->prepare("UPDATE alumnos SET altaBaja = 'Baja' WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    

	public function Registrar(Califi $data)
	{
		try 
		{
                
                 $sql = "INSERT INTO historiales_estadisticos (estadistico,periodo,comentario) 
		        VALUES (?, ?, ?)";

                $this->pdo->prepare($sql)
                     ->execute(
                    array(
                        $data->__GET('estadistico'), 
                        $data->__GET('periodo'), 
                        $data->__GET('comentario')
                        )
                    );
		
                
   
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}