<?php
//Controlador desarrollado por Aguayo Gonzalez Carlos Arturo

require_once('db_abstract_model.php');

class Modelo_Alumno extends DBAbstractModel {
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

	public function getAlumnos() {
		$this->query = "SELECT id_alumno, nombres, matricula FROM alumno WHERE nombres LIKE '$this->queryString%'";
		$alumnos = $this->get_results_from_query();
		
		return $alumnos;
	}

	public function getAlumno(){
		$this->query = "SELECT * FROM alumno WHERE id_alumno = '$this->queryString'";
		$alumno = $this->get_results_from_query();

		return $alumno;
	}

	public function set() {
		$this->query = "INSERT INTO alumno (id_nivel_sistema, matricula, contraseña, nombres, apellido_materno, apellido_paterno, estado) VALUES ('$this->nivel', '$this->matricula','$this->contraseña','$this->nombres','$this->apellidoM','$this->apellidoP','$this->status')";

		$res = $this->execute_single_query();

		return $res;
	}
 
	public function edit() {
		$this->query = "UPDATE alumno SET id_nivel_sistema = '$this->nivel', matricula='$this->matricula', contraseña='$this->contraseña', nombres='$this->nombres', apellido_materno='$this->apellidoM', apellido_paterno='$this->apellidoP' WHERE id_alumno = '$this->queryString'";

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