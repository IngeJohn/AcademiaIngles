<?php
class NivModel
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
				$alm = new Niv();
				
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

			$stm = $this->pdo->prepare("SELECT * FROM niveles, gruposasignados WHERE gruposasignados.periodo = '".$_SESSION['periodoDB']."' AND gruposasignados.idgrupo = niveles.idgrupo ORDER BY id DESC;");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Niv();
				
				$alm->__SET('id',                    $r->id);
                $alm->__SET('numeroControl',         $r->numeroControl);
                $alm->__SET('estado',                $r->estado);
                $alm->__SET('promedio',              $r->promedio);
                $alm->__SET('promedio2',             $r->promedio2);
                $alm->__SET('idgrupo',               $r->idgrupo);
                $alm->__SET('comentario',            $r->comentario);
                $alm->__SET('oportunidad',           $r->oportunidad);
                $alm->__SET('tipoProgramaBeca',      $r->tipoProgramaBeca);
                $alm->__SET('libroPagoEstado',       $r->libroPagoEstado);
                $alm->__SET('inscripcionPagoEstado', $r->inscripcionPagoEstado);
                $alm->__SET('comentarioPagos',       $r->comentarioPagos);

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

			$stm = $this->pdo->prepare("SELECT alumnos.numeroControl, alumnos.idgrupoActual FROM alumnos, gruposasignados WHERE alumnos.altaBaja = 'Alta' AND gruposasignados.periodo = '".$_SESSION['periodoAnteriorBD']."' AND gruposasignados.idgrupo = alumnos.idgrupoActual;");
            
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Niv();
				
                $alm->__SET('numeroControl',    $r->numeroControl);
                $alm->__SET('idgrupoActual',    $r->idgrupoActual);

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
				$alm = new Niv();
				
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
				$alm = new Niv();
				
				$alm->__SET('nombre',    $r->nombre);
				$alm->__SET('paterno',   $r->paterno);
				$alm->__SET('materno',   $r->materno);
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
			$stm = $this->pdo->prepare("SELECT * FROM niveles WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Niv();

			    $alm->__SET('id',                    $r->id);
                $alm->__SET('numeroControl',         $r->numeroControl);
                $alm->__SET('idgrupo',               $r->idgrupo);
                $alm->__SET('estado',                $r->estado);
                $alm->__SET('tipoProgramaBeca',      $r->tipoProgramaBeca);
                $alm->__SET('libroPagoEstado',       $r->libroPagoEstado);
                $alm->__SET('inscripcionPagoEstado', $r->inscripcionPagoEstado);
                $alm->__SET('comentarioPagos',       $r->comentarioPagos);

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
			$stm = $this->pdo->prepare("SELECT * FROM alumnos WHERE numeroControl = ?");
			          

			$stm->execute(array($numeroControl));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Niv();

                $alm->__SET('numeroControl',    $r->numeroControl);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    public function Obtener3($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM niveles WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Niv();

			    $alm->__SET('id',               $r->id);
                $alm->__SET('numeroControl',    $r->numeroControl);
                $alm->__SET('idgrupo',          $r->idgrupo);
                $alm->__SET('estado',           $r->estado);
                $alm->__SET('tipoProgramaBeca', $r->tipoProgramaBeca);
                $alm->__SET('promedio',         $r->promedio);
                $alm->__SET('promedio2',        $r->promedio2);
                $alm->__SET('oportunidad',      $r->oportunidad);
                $alm->__SET('comentario',       $r->comentario);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function Actualizar(Niv $data)
	{
		try 
		{
			$sql = "UPDATE niveles SET  
                        numeroControl    = ?,
						idgrupo          = ?,
                        estado           = ?,
                        promedio         = ?,
                        promedio2        = ?,
                        comentario       = ?,
                        oportunidad      = ?,
                        tipoProgramaBeca = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
                    
                    $data->__GET('numeroControl'),
					$data->__GET('idgrupo'), 
                    $data->__GET('estado'),
                    $data->__GET('promedio'),
                    $data->__GET('promedio2'),
                    $data->__GET('comentario'),
                    $data->__GET('oportunidad'),
                    $data->__GET('tipoProgramaBeca'),
                    $data->__GET('id')
					)
				);
            
             $sql2 = "UPDATE alumnos SET  
                        idgrupoActual = ?
				    WHERE numeroControl = ?";

			$this->pdo->prepare($sql2)
			     ->execute(
				array(
                    
					$data->__GET('idgrupo'), 
                    $data->__GET('numeroControl')
					)
				);
            
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    
    
    	public function Actualizar2(Niv $data)
	{
		try 
		{
			$sql = "UPDATE niveles SET  
                        numeroControl    = ?,
						idgrupo          = ?,
                        tipoProgramaBeca = ?,
                        inscripcionPagoEstado = ?,
                        libroPagoEstado = ?,
                        comentarioPagos = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
                    
                    $data->__GET('numeroControl'),
					$data->__GET('idgrupo'), 
                    $data->__GET('tipoProgramaBeca'),
                    $data->__GET('inscripcionPagoEstado'),
                    $data->__GET('libroPagoEstado'),
                    $data->__GET('comentarioPagos'),
                    $data->__GET('id')
					)
				);
            
            $sql2 = "UPDATE alumnos SET  
                        idgrupoActual = ?
				    WHERE numeroControl = ?";

			$this->pdo->prepare($sql2)
			     ->execute(
				array(
                    
					$data->__GET('idgrupo'), 
                    $data->__GET('numeroControl')
					)
				);
            
            
            
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Niv $data)
	{
		try 
		{
		$sql = "INSERT INTO niveles (numeroControl,idgrupo,estado,tipoProgramaBeca,inscripcionPagoEstado,libroPagoEstado,comentarioPagos) 
		        VALUES (?, ?, 'En curso', ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
                $data->__GET('numeroControl'), 
				$data->__GET('idgrupo'), 
                $data->__GET('tipoProgramaBeca'),
                $data->__GET('inscripcionPagoEstado'),
                $data->__GET('libroPagoEstado'),
                $data->__GET('comentarioPagos')
                )
			);
            
            
            $sql2 = "UPDATE alumnos SET  
                        idgrupoActual = ?
				    WHERE numeroControl = ?";

			$this->pdo->prepare($sql2)
			     ->execute(
				array(
                    
					$data->__GET('idgrupo'), 
                    $data->__GET('numeroControl')
					)
				);
            
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}