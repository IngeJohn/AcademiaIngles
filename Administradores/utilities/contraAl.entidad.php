<?php
class contraAl
{
	private $nombre;
	private $paterno;
	private $materno;
	private $numeroControl;
    private $id;
    private $contrase;
    private $titulo;



	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}