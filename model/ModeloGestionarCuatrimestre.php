<?php
/*******************************************/
//MODULO GESTIONAR PERIODO CUATRIMESTRAL
/******************************************/
// Modelo desarrollado por Efrain Diaz
// para la materia de Reingenieria

require_once('db_abstract_model.php');

class Modelo_GestionarCuatrimestre extends DBAbstractModel {

	var $id_cuatri;
	var $id_ciclo;
	var $id_carrera;
	var $numero_cuatri;
	var $fecha_ini;
	var $fecha_fin;
	var $stado_cuatri;
	var $queryString;
	var $id_meteria;

	public function datosNewCuatri($id_ciclo,$numero_cuatri, $fecha_ini,$fecha_fin,$stado_cuatri){
		$this->id_ciclo = $id_ciclo;
		$this->numero_cuatri = $numero_cuatri;
		$this->fecha_ini = $fecha_ini;
		$this->fecha_fin = $fecha_fin;
		$this->stado_cuatri = $stado_cuatri;
	}

	public function datosAddSubject($id_meteria, $id_carrera, $id_cuatri){

		$this->id_meteria = $id_meteria;
		$this->id_carrera = $id_carrera;
		$this->id_cuatri = $id_cuatri;

	}

	public function datosEditCuatri($numero_cuatri, $fecha_ini, $fecha_fin, $stado_cuatri){
		$this->stado_cuatri = $stado_cuatri;
		$this->numero_cuatri = $numero_cuatri;
		$this->fecha_fin = $fecha_fin;
		$this->fecha_ini = $fecha_ini;
	}

	public function stringQuery($queryString){
		$this->queryString = $queryString;
	}

	public function getDatoForNewCuatri(){
		$this->query = "SELECT * FROM ciclo WHERE estado_ciclo = 1";
		$info = $this->get_results_from_query();
		return $info;
	}

	public function get(){
		$this->query = "SELECT * FROM cuatrimestre WHERE id_cuatri = '$this->queryString'";
		$cuatrimestre = $this->get_results_from_query();
		return $cuatrimestre;
	}

	public function getFullCuatri(){
		$this->query = "SELECT ciclo.ciclo_ini as ciclo_ini, ciclo.ciclo_fin as ciclo_fin, cu.id_cuatri as id_cuatri, cu.numero_cuatri as num_cuatri, cu.fecha_ini as cuatri_ini, cu.fecha_fin as cuatri_fin, cu.stado_cuatri as cuatri_status from cuatrimestre cu INNER JOIN ciclo on cu.id_ciclo = ciclo.id_ciclo  WHERE cu.id_cuatri = '$this->queryString'";

		$fullCuatri = $this->get_results_from_query();

		return $fullCuatri;

	}


	public function getRTCuatrimestre() {
		
		$this->query = "SELECT ciclo.ciclo_ini as ciclo_ini, ciclo.ciclo_fin as ciclo_fin, cu.id_cuatri as id_cuatri, cu.numero_cuatri as num_cuatri, cu.fecha_ini as cuatri_ini, cu.fecha_fin as cuatri_fin, cu.stado_cuatri as cuatri_status from cuatrimestre cu INNER JOIN ciclo on cu.id_ciclo = ciclo.id_ciclo WHERE cu.numero_cuatri LIKE '%$this->queryString%' OR cu.fecha_ini LIKE '%$this->queryString%' OR cu.fecha_fin LIKE '%$this->queryString%' OR cu.stado_cuatri LIKE '%$this->queryString%'";
		//$this->query = "SELECT * FROM cuatrimestre WHERE numero_cuatri LIKE '%$this->queryString%' OR fecha_ini LIKE '%$this->queryString%' OR fecha_fin LIKE '%$this->queryString%' OR stado_cuatri LIKE '%$this->queryString%'";
		$cuatrimestre = $this->get_results_from_query();
		
		return $cuatrimestre;
	}

	public function getRTMaterias(){
		//$this->query ="SELECT ciclo.ciclo_ini as ciclo_ini, ciclo.ciclo_fin as ciclo_fin, cu.id_cuatri as id_cuatri, cu.numero_cuatri as num_cuatri, cu.fecha_ini as cuatri_ini, cu.fecha_fin as cuatri_fin, cu.stado_cuatri as cuatri_status from cuatrimestre cu INNER JOIN ciclo on cu.id_ciclo = ciclo.id_ciclo WHERE codigo_materia LIKE '%$this->queryString%' OR nombre_materia LIKE '%$this->queryString%' OR des_materia LIKE '%$this->queryString%'";
		$this->query = "SELECT * FROM materia WHERE codigo_materia LIKE '%$this->queryString%' OR nombre_materia LIKE '%$this->queryString%' OR des_materia LIKE '%$this->queryString%'";
		$materias = $this->get_results_from_query();
		
		return $materias;
	}

	public function getCarreras(){
		$this->query = "SELECT * FROM carrera";
		$carrerasDisp = $this->get_results_from_query();
		return $carrerasDisp;
	}

	public function setCauatriCarrera(){
		$this->query = "INSERT INTO cuatri_carrera (id_meteria, id_carrera, id_cuatrimestre) VALUES('$this->id_meteria', '$this->id_carrera', '$this->id_cuatri')";
		$res = $this->execute_single_query();
		return $res;
	}

	public function set() {

		$this->query = "INSERT INTO cuatrimestre (id_ciclo, numero_cuatri, fecha_ini, fecha_fin, stado_cuatri) VALUES ('$this->id_ciclo', '$this->numero_cuatri','$this->fecha_ini','$this->fecha_fin','$this->stado_cuatri')";

		$res = $this->execute_single_query();

		return $res;
	}
 
	public function edit() {

		$this->query = "UPDATE cuatrimestre SET numero_cuatri = '$this->numero_cuatri', fecha_ini = '$this->fecha_ini', fecha_fin = '$this->fecha_fin', stado_cuatri = '$this->stado_cuatri' WHERE id_cuatri = '$this->queryString'";
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