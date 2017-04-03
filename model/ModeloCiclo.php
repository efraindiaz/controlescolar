<?php

require_once('db_abstract_model.php');

class Modelo_Ciclo extends DBAbstractModel {
	var $inicio;
	var $fin;
	var $estado;
	var $queryString;

	public function datos($inicio, $fin, $estado){
		$this->inicio = $inicio;
		$this->fin = $fin;
		$this->estado = $estado;
	}

	public function stringQuery($queryString){
		$this->queryString = $queryString;
	}

	public function get(){

	}

	public function getCiclos() {
		$this->query = "SELECT id_ciclo, ciclo_ini, ciclo_fin, estado_ciclo FROM ciclo WHERE estado_ciclo LIKE '$this->queryString%'";
		$ciclos = $this->get_results_from_query();
		
		return $ciclos;
	}

	public function getCiclo(){
		$this->query = "SELECT * FROM ciclo WHERE id_ciclo = '$this->queryString'";
		$ciclo = $this->get_results_from_query();

		return $ciclo;
	}

	public function set() {
		$this->query = "INSERT INTO ciclo (ciclo_ini, ciclo_fin, estado_ciclo) VALUES ('$this->inicio','$this->fin','$this->estado')";

		$res = $this->execute_single_query();

		return $res;
	}
 
	public function edit() {
		$this->query = "UPDATE ciclo SET ciclo_ini='$this->inicio', ciclo_fin='$this->fin', estado_ciclo='$this->estado' WHERE id_ciclo = '$this->queryString'";

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