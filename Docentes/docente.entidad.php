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
    private $idmaestroActual;
    private $rfc;
    private $fnacimiento;
    private $nivelAcademico;
    private $altaBaja;
    private $titulo;
    private $certificacion;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}