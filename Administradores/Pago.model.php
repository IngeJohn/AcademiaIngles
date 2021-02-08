<?php



class PagoModel
{
	private $pdo;

	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = new PDO('mysql:host=localhost;dbname=academia_ingles', 'academia_ingles', 'a98450153_-');
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

			$stm = $this->pdo->prepare("SELECT * FROM gruposasignados WHERE periodo = '".$_SESSION['periodoDB']."'");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Pago();
				
				$alm->__SET('idgrupo',          $r->idgrupo);
                $alm->__SET('nivel',            $r->nivel);
                $alm->__SET('grupo',            $r->grupo);
                $alm->__SET('carrera',          $r->carrera);
                $alm->__SET('modalidad',        $r->modalidad);
                $alm->__SET('periodo',          $r->periodo);
                $alm->__SET('idmaestro',        $r->idmaestro);

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

			$stm = $this->pdo->prepare("SELECT * FROM niveles");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Pago();
				
				$alm->__SET('id',                     $r->id);
                $alm->__SET('numeroControl',          $r->numeroControl);
                $alm->__SET('idgrupo',                $r->idgrupo);
                $alm->__SET('inscripcionPagoEstado',  $r->inscripcionPagoEstado);
                $alm->__SET('libroPagoEstado',        $r->libroPagoEstado);
                $alm->__SET('comentarioPagos',        $r->comentarioPagos);

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
				$alm = new Pago();
				
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
				$alm = new Pago();
				
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
    
    
    public function Listar4()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM niveles, gruposasignados WHERE gruposasignados.periodo = '".$_SESSION['periodoDB']."' AND gruposasignados.idgrupo = niveles.idgrupo ORDER BY id DESC;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Pago();
				
				$alm->__SET('id',                     $r->id);
                $alm->__SET('numeroControl',          $r->numeroControl);
                $alm->__SET('idgrupo',                $r->idgrupo);
                $alm->__SET('inscripcionPagoEstado',  $r->inscripcionPagoEstado);
                $alm->__SET('libroPagoEstado',        $r->libroPagoEstado);
                $alm->__SET('comentarioPagos',        $r->comentarioPagos);

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
			$stm = $this->pdo->prepare("SELECT * FROM niveles WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Pago();

			    $alm->__SET('id',                     $r->id);
                $alm->__SET('numeroControl',          $r->numeroControl);
                $alm->__SET('idgrupo',                $r->idgrupo);
                $alm->__SET('inscripcionPagoEstado',  $r->inscripcionPagoEstado);
                $alm->__SET('libroPagoEstado',        $r->libroPagoEstado);
                $alm->__SET('comentarioPagos',        $r->comentarioPagos);

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
			$stm = $this->pdo->prepare("UPDATE alumnos SET estadoActual = '0' WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(Pago $data)
	{
		try 
		{
			$sql = "UPDATE niveles SET  
                        inscripcionPagoEstado = ?,
                        libroPagoEstado       = ?,
                        comentarioPagos       = ? 
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
                    
                    $data->__GET('inscripcionPagoEstado'),
                    $data->__GET('libroPagoEstado'),
                    $data->__GET('comentarioPagos'),
                    $data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Pago $data)
	{
		try 
		{
            
        

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                        $data->__GET('numeroControl'),
                        $data->__GET('carrera'),
                        $data->__GET('idgrupo'),
                        $data->__GET('inscripcionPagoEstado'),
                        $data->__GET('libroPagoEstado'),
                        $data->__GET('comentarioPagos')
                    )
                );
          
        
		
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}