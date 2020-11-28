<?php
class Docente
{
    private $curp;
    private $username;
	private $nombre;
	private $paterno;
	private $materno;
    private $sexo;
    private $direccion;
    private $telefono;
    private $email;
	private $idmaestro;
    private $n_issste;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}