<?php
class CLE
{
	private $id;
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
    private $coorTelOfiExt;
    private $coorTelCel;



	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}