<?php
# Importar modelo de abstracción de base de datos
require_once('db_abstract_model.php');
class Modelo_Prueba extends DBAbstractModel {
	var $nombres;
	var $apellido;

	public function get() {

	$this->query = "SELECT * from profesor";

	return  $this->get_results_from_query();

	}

	//CONTTRUCTOR DE DATOS PARA UN INSERT
	public function datos($nombres, $apellido){
		$this->nombres = $nombres;
		$this->apellido = $apellido;
	}

	# Crear un nuevo 
	public function set() {
		$this->query = "INSERT INTO prueba (nombres, apellido)VALUES ('$this->nombres','$this->apellido')";

		$res = $this->execute_single_query();

		return $res;
	}

	# Modificar un 
	public function edit() {

	}
	# Eliminar un 
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
