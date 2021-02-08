<?php
class Admin
{
	private $nombre;
	private $paterno;
	private $materno;
	private $idmaestro;
    private $roll;
    private $titulo;



	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}