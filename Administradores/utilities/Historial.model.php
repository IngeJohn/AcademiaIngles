<?php

// Include config file
require_once "../Require/config.php";

class HistorialModel
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

			$stm = $this->pdo->prepare("SELECT * FROM historiales_estadisticos ORDER BY id DESC");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Historial();
				
				$alm->__SET('id',            $r->id);
                $alm->__SET('estadistico',   $r->estadistico);
                $alm->__SET('periodo',       $r->periodo);
                $alm->__SET('comentario',    $r->comentario);
                $alm->__SET('fecha',         $r->fecha);
                $alm->__SET('idmaestro',     $r->idmaestro);

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
			$stm = $this->pdo->prepare("SELECT * FROM historiales_estadisticos WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Historial();

			    $alm->__SET('id',            $r->id);
                $alm->__SET('estadistico',   $r->estadistico);
                $alm->__SET('periodo',       $r->periodo);
                $alm->__SET('comentario',    $r->comentario);
                $alm->__SET('fecha',         $r->fecha);
                $alm->__SET('idmaestro',     $r->idmaestro);

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

    

	public function Registrar(Historial $data)
	{
		try 
		{
                
                 $sql = "INSERT INTO historiales_estadisticos (estadistico,periodo,comentario,idmaestro) 
		        VALUES (?, ?, ?, ?)";

                $this->pdo->prepare($sql)
                     ->execute(
                    array(
                        $data->__GET('estadistico'), 
                        $data->__GET('periodo'), 
                        $data->__GET('comentario'),
                        $data->__GET('idmaestro')
                        )
                    );
		
                
   
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}