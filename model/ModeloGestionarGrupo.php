<?php

require_once('db_abstract_model.php');

class Modelo_AsignarProfesor extends DBAbstractModel {
	var $idCarrera;
	var $idProfesor;
	var $idGrupo;

	public function stringQuery($idCarrera){
		$this->idCarrera = $idCarrera;
	}

	public function datos($idProfesor, $idGrupo){
		$this->idProfesor = $idProfesor;
		$this->idGrupo = $idGrupo;
	}

	//get grupos from profesor
	public function getGrupos(){
		$this->query = "SELECT * FROM grupo WHERE id_carrera = '$this->idCarrera'";

		$grupos = $this->get_results_from_query();

		return $grupos;
	}

	public function getCarreras(){
		$this->query = "SELECT * FROM carrera";
		
		$carrera = $this->get_results_from_query();

		return $carrera;
	}

	public function get(){
		$this->query = "SELECT * FROM profesor";
		
		$profesor = $this->get_results_from_query();

		return $profesor;
	}

	public function set() {
		$this->query = "INSERT INTO lista_profesores (id_profesor, id_grupo) VALUES ('$this->idProfesor','$this->idGrupo')";

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