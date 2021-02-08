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
    private $fnacimiento;
    private $nivelAcademico;
    private $titulo;
    private $certificacion;
    private $altaBaja;
    
    
    private $subdireccion;
	private $subdireccionNombre;
    private $subTelOfi;
    private $subTelOfiExt;
    private $departamento;
    private $departamentoNombre;
    private $depTelOfi;
	private $depTelOfiExt;
    private $cleCoordinador;
    private $emailCoordi;
    private $emailCoordiAlter;
    private $coorTelOfi;
    private $coorTelCel;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}