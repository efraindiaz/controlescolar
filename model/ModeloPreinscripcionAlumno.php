<?php

require_once('db_abstract_model.php');

class Modelo_Preinscripcion_Alumno extends DBAbstractModel {
	var $nombres;
	var $apellidoM;
	var $apellidoP;
	var $curp;
	var $telcel;
	var $email;
	var $carrera;
	var $promedio;
	var $queryString;

	public function datos($nombres, $apellidoM,  $apellidoP, $curp, $telcel, $email, $carrera, $promedio){
		$this->nombres = $nombres;
		$this->apellidoM = $apellidoM;
		$this->apellidoP = $apellidoP;
		$this->curp = $curp;
		$this->telcel = $telcel;
		$this->email = $email;
		$this->carrera = $carrera;
		$this->promedio = $promedio;
	}

	public function stringQuery($queryString){
		$this->queryString = $queryString;
	}

	public function get(){
		$this->query = "SELECT * FROM carrera";
		$carreras = $this->get_results_from_query();

		return $carreras;
	}

	public function set() {
		$this->query = "INSERT INTO pre_inscripcion_alumno (nombres, apellido_materno, apellido_paterno, curp, telefono_celular, correo_electronico, carrera, promedio_escolar) VALUES ('$this->nombres','$this->apellidoM','$this->apellidoP','$this->curp','$this->telcel','$this->email','$this->carrera','$this->promedio')";

		$res = $this->execute_single_query();

		return $res;
	}
 
	public function edit() {

	}

	public function delete($tzonclave='') {

	}

	# Método constructor
	function __construct() {
	$this->db_name = 'control_escolar';
	}
	# Método destructor del objeto
	function __destruct() {
	unset($this);
	}
}
?>