<?php
class contra
{
	private $nombre;
	private $paterno;
	private $materno;
	private $idmaestro;
    private $titulo;
    private $password;



	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}