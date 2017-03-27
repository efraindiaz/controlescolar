<?php

require_once('db_abstract_model.php');

class Modelo_Profesor extends DBAbstractModel {
	var $nivel;
	var $matricula;
	var $contraseña;
	var $nombres;
	var $apellidoM;
	var $apellidoP;
	var $status;
	var $queryString;

	public function datos($nivel, $matricula, $contraseña, $nombres, $apellidoM,  $apellidoP, $status){
		$this->nivel = $nivel;
		$this->matricula = $matricula;
		$this->contraseña = $contraseña;
		$this->nombres = $nombres;
		$this->apellidoM = $apellidoM;
		$this->apellidoP = $apellidoP;
		$this->status = $status;
	}

	public function stringQuery($queryString){
		$this->queryString = $queryString;
	}

	public function get(){

	}

	public function getNivelSistema(){
		$this->query = "SELECT * FROM nivel_sistema";
		$niveles = $this->get_results_from_query();

		return $niveles;
	}

	public function getProfesores() {
		$this->query = "SELECT id_profesor, nombres, matricula FROM profesor WHERE nombres LIKE '$this->queryString%'";
		$profesores = $this->get_results_from_query();
		
		return $profesores;
	}

	public function getProfesor(){
		$this->query = "SELECT * FROM profesor WHERE id_profesor = '$this->queryString'";
		$profesor = $this->get_results_from_query();

		return $profesor;
	}

	public function set() {
		$this->query = "INSERT INTO profesor (id_nivel_sistema, matricula, contraseña, nombres, apellido_materno, apellido_paterno, estado) VALUES ('$this->nivel', '$this->matricula','$this->contraseña','$this->nombres','$this->apellidoM','$this->apellidoP','$this->status')";

		$res = $this->execute_single_query();

		return $res;
	}
 
	public function edit() {
		$this->query = "UPDATE profesor SET id_nivel_sistema = '$this->nivel', matricula='$this->matricula', contraseña='$this->contraseña', nombres='$this->nombres', apellido_materno='$this->apellidoM', apellido_paterno='$this->apellidoP' WHERE id_profesor = '$this->queryString'";

		$res = $this->execute_single_query();

		return $res;
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