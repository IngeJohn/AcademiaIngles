<?php
class Grupos
{
	private $idmaestro;
    private $nivel;
    private $grupo;
    private $carrera;
    private $modalidad;
    private $periodo;
    private $idgrupo;
    private $titulo;



	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}