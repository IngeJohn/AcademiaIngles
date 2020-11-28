<?php
class Alumno
{
	private $numeroControl;
    private $curp;
	private $nombre;
	private $paterno;
	private $materno;
    private $sexo;
    private $fnacimiento;
    private $direccion;
    private $estado;
    private $municipio;
    private $localidad;
    private $telefono;
    private $carrera;
    private $modalidad;
	private $nivelActual;
	private $grupoActual;
	private $idmaestroActual;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}