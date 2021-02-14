<?php
class AlumnModel
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

			$stm = $this->pdo->prepare("SELECT * FROM gruposasignados WHERE (periodo = '1-2000') OR (periodo = '".$_SESSION['periodoDB']."') ");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Alumn();
				
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

			$stm = $this->pdo->prepare("SELECT * FROM alumnos WHERE idgrupoActual != 1 ORDER BY id DESC");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Alumn();
				
				$alm->__SET('id',              $r->id);
                $alm->__SET('numeroControl',   $r->numeroControl);
                $alm->__SET('curp',            $r->curp);
                $alm->__SET('nombre',          $r->nombre);
                $alm->__SET('paterno',         $r->paterno);
                $alm->__SET('materno',         $r->materno);
                $alm->__SET('sexo',            $r->sexo);
                $alm->__SET('fnacimiento',     $r->fnacimiento);
                $alm->__SET('altaBaja',        $r->altaBaja);
                $alm->__SET('contrase',        $r->contrase);
                $alm->__SET('idgrupoActual',   $r->idgrupoActual);

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
				$alm = new Alumn();
				
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
				$alm = new Alumn();
				
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
    
    
    	public function Listar4()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM alumnos WHERE idgrupoActual =1");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Alumn();
				
				$alm->__SET('id',              $r->id);
                $alm->__SET('numeroControl',   $r->numeroControl);
                $alm->__SET('curp',            $r->curp);
                $alm->__SET('nombre',          $r->nombre);
                $alm->__SET('paterno',         $r->paterno);
                $alm->__SET('materno',         $r->materno);
                $alm->__SET('sexo',            $r->sexo);
                $alm->__SET('fnacimiento',     $r->fnacimiento);
                $alm->__SET('altaBaja',        $r->altaBaja);
                $alm->__SET('contrase',        $r->contrase);
                $alm->__SET('idgrupoActual',   $r->idgrupoActual);

				$result[] = $alm;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    
    
    
    
    public function Listar5()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM alumnos ORDER BY paterno ASC");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$alm = new Alumn();
				
				$alm->__SET('id',              $r->id);
                $alm->__SET('numeroControl',   $r->numeroControl);
                $alm->__SET('curp',            $r->curp);
                $alm->__SET('nombre',          $r->nombre);
                $alm->__SET('paterno',         $r->paterno);
                $alm->__SET('materno',         $r->materno);
                $alm->__SET('sexo',            $r->sexo);
                $alm->__SET('fnacimiento',     $r->fnacimiento);
                $alm->__SET('altaBaja',        $r->altaBaja);
                $alm->__SET('contrase',        $r->contrase);
                $alm->__SET('idgrupoActual',   $r->idgrupoActual);

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
			$stm = $this->pdo->prepare("SELECT alumnos.id, alumnos.numeroControl, alumnos.curp, alumnos.nombre, alumnos.paterno, alumnos.materno, alumnos.sexo,
 alumnos.fnacimiento, alumnos.altaBaja, alumnos.contrase, alumnos.idgrupoActual, niveles.id AS idgrupoN, niveles.tipoProgramaBeca
FROM alumnos, niveles WHERE alumnos.id = ? AND alumnos.idgrupoActual = niveles.idgrupo AND alumnos.numeroControl = niveles.numeroControl");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Alumn();

			    $alm->__SET('id',              $r->id);
                $alm->__SET('numeroControl',   $r->numeroControl);
                $alm->__SET('curp',            $r->curp);
                $alm->__SET('nombre',          $r->nombre);
                $alm->__SET('paterno',         $r->paterno);
                $alm->__SET('materno',         $r->materno);
                $alm->__SET('sexo',            $r->sexo);
                $alm->__SET('fnacimiento',     $r->fnacimiento);
                $alm->__SET('altaBaja',        $r->altaBaja);
                $alm->__SET('contrase',        $r->contrase);
                $alm->__SET('idgrupoActual',   $r->idgrupoActual);
                $alm->__SET('idgrupoN',        $r->idgrupoN);
                $alm->__SET('tipoProgramaBeca', $r->tipoProgramaBeca);

			return $alm;
            
            
            
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    public function Obtener2($id)
	{
		try 
		{
			$stm = $this->pdo->prepare("SELECT alumnos.id, alumnos.numeroControl, alumnos.curp, alumnos.nombre, alumnos.paterno, alumnos.materno, alumnos.sexo,
 alumnos.fnacimiento, alumnos.altaBaja, alumnos.contrase, alumnos.idgrupoActual FROM alumnos WHERE alumnos.id = ? ");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Alumn();

			    $alm->__SET('id',              $r->id);
                $alm->__SET('numeroControl',   $r->numeroControl);
                $alm->__SET('curp',            $r->curp);
                $alm->__SET('nombre',          $r->nombre);
                $alm->__SET('paterno',         $r->paterno);
                $alm->__SET('materno',         $r->materno);
                $alm->__SET('sexo',            $r->sexo);
                $alm->__SET('fnacimiento',     $r->fnacimiento);
                $alm->__SET('altaBaja',        $r->altaBaja);
                $alm->__SET('contrase',        $r->contrase);
                $alm->__SET('idgrupoActual',   $r->idgrupoActual);

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
			$stm = $this->pdo->prepare("SELECT * FROM alumnos WHERE id = ? ");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$alm = new Alumn();

			    $alm->__SET('id',              $r->id);
                $alm->__SET('numeroControl',   $r->numeroControl);
                $alm->__SET('curp',            $r->curp);
                $alm->__SET('nombre',          $r->nombre);
                $alm->__SET('paterno',         $r->paterno);
                $alm->__SET('materno',         $r->materno);
                $alm->__SET('sexo',            $r->sexo);
                $alm->__SET('fnacimiento',     $r->fnacimiento);
                $alm->__SET('altaBaja',        $r->altaBaja);
                $alm->__SET('contrase',        $r->contrase);
                $alm->__SET('idgrupoActual',   $r->idgrupoActual);
                $alm->__SET('direccion',   $r->direccion);
                $alm->__SET('estado',   $r->estado);
                $alm->__SET('municipio',   $r->municipio);
                $alm->__SET('localidad',   $r->localidad);
                $alm->__SET('postal',   $r->postal);
                $alm->__SET('telefono',   $r->telefono);
                $alm->__SET('email',   $r->email);

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

	public function Actualizar(Alumn $data)
	{
		try 
		{     
            if($data->__GET('idgrupoN')!=NULL){
                
                    $sql = "UPDATE alumnos SET  
                                numeroControl   = ?,
                                curp            = ?,
                                nombre          = ?,
                                paterno         = ?,
                                materno         = ?,
                                sexo            = ?,
                                fnacimiento     = ?,
                                altaBaja        = ?,
                                contrase        = ?,
                                idgrupoActual   = ?
                            WHERE id = ?";

                    $this->pdo->prepare($sql)
                         ->execute(
                        array(

                            $data->__GET('numeroControl'),
                            $data->__GET('curp'),
                            $data->__GET('nombre'), 
                            $data->__GET('paterno'), 
                            $data->__GET('materno'),
                            $data->__GET('sexo'),
                            $data->__GET('fnacimiento'),
                            $data->__GET('altaBaja'),
                            $data->__GET('contrase'),
                            $data->__GET('idgrupoActual'),
                            $data->__GET('id')
                            )
                        );

                    //=================================================================================

                    $sql3 = "UPDATE niveles SET  
                                idgrupo = ?,
                                tipoProgramaBeca = ?
                            WHERE id = ?";

                    $this->pdo->prepare($sql3)
                         ->execute(
                        array(

                            $data->__GET('idgrupoActual'), 
                            $data->__GET('tipoProgramaBeca'), 
                            $data->__GET('idgrupoN')
                            )
                        );
            }else{
                
                $sql = "UPDATE alumnos SET  
                                numeroControl   = ?,
                                curp            = ?,
                                nombre          = ?,
                                paterno         = ?,
                                materno         = ?,
                                sexo            = ?,
                                fnacimiento     = ?,
                                altaBaja        = ?,
                                contrase        = ?,
                                idgrupoActual   = ?
                            WHERE id = ?";

                    $this->pdo->prepare($sql)
                         ->execute(
                        array(

                            $data->__GET('numeroControl'),
                            $data->__GET('curp'),
                            $data->__GET('nombre'), 
                            $data->__GET('paterno'), 
                            $data->__GET('materno'),
                            $data->__GET('sexo'),
                            $data->__GET('fnacimiento'),
                            $data->__GET('altaBaja'),
                            $data->__GET('contrase'),
                            $data->__GET('idgrupoActual'),
                            $data->__GET('id')
                            )
                        );
                
                
                
                
                
                
            }
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    
    
    	public function Actualizar2(Alumn $data)
	{
		try 
		{
			$sql = "UPDATE alumnos SET  
                        numeroControl   = ?,
                        curp            = ?,
						nombre          = ?,
                        paterno         = ?,
                        materno         = ?,
                        sexo            = ?,
                        fnacimiento     = ?,
                        altaBaja        = ?,
                        contrase        = ?,
                        idgrupoActual   = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				array(
                    
                    $data->__GET('numeroControl'),
                    $data->__GET('curp'),
					$data->__GET('nombre'), 
                    $data->__GET('paterno'), 
                    $data->__GET('materno'),
                    $data->__GET('sexo'),
                    $data->__GET('fnacimiento'),
                    $data->__GET('altaBaja'),
                    $data->__GET('contrase'),
                    $data->__GET('idgrupoActual'),
                    $data->__GET('id')
					)
				);

            
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Alumn $data)
	{
		try 
		{
            if($data->__GET('idgrupoActual')=='1'){
                
                 $sql = "INSERT INTO alumnos (numeroControl,curp,nombre,paterno,materno,sexo,fnacimiento,altaBaja,contrase,idgrupoActual) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $this->pdo->prepare($sql)
                     ->execute(
                    array(
                        $data->__GET('numeroControl'), 
                        $data->__GET('curp'), 
                        $data->__GET('nombre'), 
                        $data->__GET('paterno'), 
                        $data->__GET('materno'),
                        $data->__GET('sexo'),
                        $data->__GET('fnacimiento'),
                        $data->__GET('altaBaja'),
                        $data->__GET('contrase'),
                        $data->__GET('idgrupoActual')
                        )
                    );
		
                
            }else{
                
                
                $sql = "INSERT INTO alumnos (numeroControl,curp,nombre,paterno,materno,sexo,fnacimiento,altaBaja,contrase,idgrupoActual) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                $this->pdo->prepare($sql)
                     ->execute(
                    array(
                        $data->__GET('numeroControl'), 
                        $data->__GET('curp'), 
                        $data->__GET('nombre'), 
                        $data->__GET('paterno'), 
                        $data->__GET('materno'),
                        $data->__GET('sexo'),
                        $data->__GET('fnacimiento'),
                        $data->__GET('altaBaja'),
                        $data->__GET('contrase'),
                        $data->__GET('idgrupoActual')
                        )
                    );
            
                    $sql2 = "INSERT INTO niveles (numeroControl, idgrupo, estado, tipoProgramaBeca) VALUES (?, ?, 'En curso', ?)";

                    $this->pdo->prepare($sql2)
                         ->execute(
                        array(
                            $data->__GET('numeroControl'), 
                            $data->__GET('idgrupoActual'),
                            $data->__GET('tipoProgramaBeca')
                            )
			         );
            }
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    
    	public function Registrar2(Alumn $data)
	{
		try 
		{
		$sql = "INSERT INTO alumnos (numeroControl,curp,nombre,paterno,materno,sexo,fnacimiento,altaBaja,contrase,idgrupoActual) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
			array(
                $data->__GET('numeroControl'), 
                $data->__GET('curp'), 
				$data->__GET('nombre'), 
				$data->__GET('paterno'), 
				$data->__GET('materno'),
                $data->__GET('sexo'),
                $data->__GET('fnacimiento'),
                $data->__GET('altaBaja'),
                $data->__GET('contrase'),
                $data->__GET('idgrupoActual')
				)
			);
            
            
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}