<?php
class Horario
{
    private $id;
	private $idgrupo;
    private $lunes;
    private $martes;
    private $miercoles;
    private $jueves;
    private $viernes;
    private $sabadoC;
    private $sabadoT;
    private $nombre;
    private $paterno;
    private $materno;
    private $titulo;



	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}