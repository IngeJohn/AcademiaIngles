<?php
class noti
{
	private $nombre;
	private $paterno;
	private $materno;
	private $idmaestro;
    private $titulo;
    private $mensaje;
    private $fecha;
    private $id;
    private $tipomensaje;



	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}