<?php
class Pago
{
    private $id;
    private $numeroControl;
    private $inscripcionPagoEstado;
    private $libroPagoEstado;
    private $comentarioPagos;
    private $nombre;
    private $paterno;
    private $materno;
    private $roll;
    private $idgrupo;
    private $titulo;



	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}