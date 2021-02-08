<?php



class ParciFechaModel
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


	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM parcialfechas");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new ParciFecha();
				
				$alm->__SET('idparcialFechas',        $r->idparcialFechas);
                $alm->__SET('numeroParcial',          $r->numeroParcial);
                $alm->__SET('fechaInicio',            $r->fechaInicio);
                $alm->__SET('fechaTermino',           $r->fechaTermino);

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
				$alm = new ParciFecha();
				
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
				$alm = new ParciFecha();
				
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


	public function Obtener($idparcialFechas)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT * FROM parcialfechas WHERE idparcialFechas = ?");
			          

			$stm->execute(array($idparcialFechas));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new ParciFecha();

			    $alm->__SET('idparcialFechas',              $r->idparcialFechas);
                $alm->__SET('numeroParcial',                $r->numeroParcial);
                $alm->__SET('fechaInicio',                  $r->fechaInicio);
                $alm->__SET('fechaTermino',                 $r->fechaTermino);

			return $alm;
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($idparcialFechas)
	{
		try 
		{
			$stm = $this->pdo->prepare("UPDATE alumnos SET estadoActual = '0' WHERE id = ?");			          

			$stm->execute(array($idparcialFechas));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar(ParciFecha $data)
	{
		try 
		{
			$sql = "UPDATE parcialfechas SET  
                        numeroParcial           = ?,
                        fechaInicio          = ?,
                        fechaTermino       = ?
				    WHERE idparcialFechas = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
                    
                    $data->__GET('numeroParcial'),
                    $data->__GET('fechaInicio'),
                    $data->__GET('fechaTermino'),
                    $data->__GET('idparcialFechas')
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(ParciFecha $data)
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