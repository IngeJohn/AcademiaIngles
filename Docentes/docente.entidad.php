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
    private $estado;
    private $municipio;
    private $localidad;
    private $postal;
    private $telefono;
    private $email;
	private $idmaestro;
    private $rfc;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}