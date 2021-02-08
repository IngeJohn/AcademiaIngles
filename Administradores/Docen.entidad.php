<?php
class Docen
{
	private $nombre;
	private $paterno;
	private $materno;
    private $username;
    private $sexo;
    private $curp;
    private $rfc;
	private $idmaestro;
    private $roll;
    private $password;
    private $fnacimiento;
    private $nivelAcademico;
    private $titulo;
    private $certificacion;
    private $altaBaja;



	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}