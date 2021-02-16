<?php
class parci
{
    private $id;
    private $numeroControl;
    private $nivel;
    private $grupo;
    private $carrera;
    private $modalidad;
    private $periodo;
	private $idmaestro;
    private $estado;
    private $promedio;
    private $comentario;
    private $oportunidad;
    private $tipoProgramaBeca;
    private $idgrupo;
    private $inscripcionPagoEstado;
    private $libroPagoEstado;
    private $comentarioPagos;
    private $idgrupoActual;
    private $titulo;
    private $calificacion;
    private $unidades;
    private $idparcialFecha;



	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}