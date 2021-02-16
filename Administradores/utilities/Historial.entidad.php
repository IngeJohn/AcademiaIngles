<?php
class Historial
{
    private $id;
    private $estadistico;
    private $periodo;
	private $comentario;
	private $fecha;
    private $idmaestro;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}