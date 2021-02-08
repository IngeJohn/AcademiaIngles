<?php



class HorarioModel
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

			$stm = $this->pdo->prepare("SELECT idgrupo, carrera FROM gruposasignados WHERE NOT EXISTS (SELECT idgrupo FROM horarios WHERE gruposasignados.idgrupo = horarios.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."');");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Horario();
				
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

			$stm = $this->pdo->prepare("SELECT horarios.id, horarios.idgrupo, horarios.lunes, horarios.martes, horarios.miercoles, horarios.jueves, horarios.viernes, horarios.sabadoC, horarios.sabadoT FROM horarios, gruposasignados WHERE horarios.idgrupo = gruposasignados.idgrupo AND gruposasignados.periodo = '".$_SESSION['periodoDB']."' ORDER BY horarios.id DESC");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Horario();
				
				$alm->__SET('id',                     $r->id);
                $alm->__SET('idgrupo',                $r->idgrupo);
                $alm->__SET('lunes',                  $r->lunes);
                $alm->__SET('martes',                 $r->martes);
                $alm->__SET('miercoles',              $r->miercoles);
                $alm->__SET('jueves',                 $r->jueves);
                $alm->__SET('viernes',                $r->viernes);
                $alm->__SET('sabadoC',                $r->sabadoC);
                $alm->__SET('sabadoT',                $r->sabadoT);

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
				$alm = new Horario();
				
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
    
    
    public function Listar3()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM docentes");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Horario();
				
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
			$stm = $this->pdo->prepare("SELECT * FROM horarios WHERE id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Horario();

			    $alm->__SET('id',                     $r->id);
                $alm->__SET('idgrupo',                $r->idgrupo);
                $alm->__SET('lunes',                  $r->lunes);
                $alm->__SET('martes',                 $r->martes);
                $alm->__SET('miercoles',              $r->miercoles);
                $alm->__SET('jueves',                 $r->jueves);
                $alm->__SET('viernes',                $r->viernes);
                $alm->__SET('sabadoC',                $r->sabadoC);
                $alm->__SET('sabadoT',                $r->sabadoT);

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

	public function Actualizar(Horario $data)
	{
		try 
		{
			$sql = "UPDATE horarios SET  
                        idgrupo         = ?,
                        lunes           = ?,
                        martes          = ?,
                        miercoles       = ?,
                        jueves          = ?, 
                        viernes         = ?,
                        sabadoC         = ?,
                        sabadoT         = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
                    
                    $data->__GET('idgrupo'),
                    $data->__GET('lunes'),
                    $data->__GET('martes'),
                    $data->__GET('miercoles'),
                    $data->__GET('jueves'),
                    $data->__GET('viernes'),
                    $data->__GET('sabadoC'),
                    $data->__GET('sabadoT'),
                    $data->__GET('id')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Horario $data)
	{
		try 
		{
            $sql = "INSERT INTO horarios (idgrupo,lunes,martes,miercoles,jueves,viernes,sabadoC,sabadoT) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                        $data->__GET('idgrupo'),
                        $data->__GET('lunes'),
                        $data->__GET('martes'),
                        $data->__GET('miercoles'),
                        $data->__GET('jueves'),
                        $data->__GET('viernes'),
                        $data->__GET('sabadoC'),
                        $data->__GET('sabadoT')
                    )
                );
        
        
		
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}