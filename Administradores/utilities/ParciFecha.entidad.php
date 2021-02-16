<?php
class ParciFecha
{
    private $idparcialFechas;
	private $numeroParcial;
    private $fechaInicio;
    private $fechaTermino;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}