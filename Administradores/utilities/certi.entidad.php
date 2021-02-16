<?php
class certi
{
	private $id;
	private $certificacion;
	private $descripcion;
	private $liberacion;



	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}