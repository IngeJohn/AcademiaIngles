<?php
class finalP
{
    private $id;
    private $numeroControl;
    private $periodo;
    private $promedio;
    private $comentario;
    private $oportunidad;
    private $fecha;
    private $idgrupo;
    private $liberacionTipo;
    private $libroPagoEstado;
    private $idgrupoActual;
    private $titulo;
    private $promedioFinal;
    private $liberacion;
    private $puntaje;



	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}