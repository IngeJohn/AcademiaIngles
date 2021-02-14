<?php
class Alumn
{
    private $id;
    private $numeroControl;
    private $curp;
	private $nombre;
	private $paterno;
	private $materno;
    private $sexo;
    private $fnacimiento;
    private $altaBaja;
    private $contrase;
    private $idgrupoActual;
    private $nivel;
    private $grupo;
    private $carrera;
    private $modalidad;
    private $periodo;
	private $idmaestro;
    private $idgrupo;
    private $idgrupoN;
    private $tipoProgramaBeca;
    private $titulo;
    private $direccion;
    private $estado;
    private $municipio;
    private $localidad;
    private $postal; 
    private $telefono;
    private $email;
    



	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}