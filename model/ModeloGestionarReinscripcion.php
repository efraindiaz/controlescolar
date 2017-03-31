<?php

require_once('db_abstract_model.php');

class Modelo_Reinscripcion extends DBAbstractModel {
	var $carrera,$cuatrimestre,$turno, $materia1, $materia2, $materia3, $materia4, $materia5, $materia6, $materia7, $materia8,$materia9;

	var $idUserLogin;

	public function datos($carrera,$cuatrimestre,$turno, $materia1, $materia2, $materia3, $materia4, $materia5, $materia6, $materia7, $materia8,$materia9){

		$this->carrera = $carrera;
		$this->cuatrimestre = $cuatrimestre;
		$this->turno = $turno;
		$this->materia1 = $materia1;
		$this->materia2 = $materia2;
		$this->materia3 = $materia3;
		$this->materia4 = $materia4;
		$this->materia5 = $materia5;
		$this->materia6 = $materia6;
		$this->materia7 = $materia7;
		$this->materia8 = $materia8;
		$this->materia9 = $materia9;
	}

	public function stringQuery($idUserLogin){
		$this->idUserLogin = $idUserLogin;
	}

	public function getMaterias(){
		$this->query = "SELECT ma.id_materia as idMateria, ma.nombre_materia as nameMateria FROM alumno al INNER JOIN grupo go ON al.id_grupo =  go.id_grupo INNER JOIN carrera ca ON go.id_carrera =  ca.id_carrera INNER JOIN cuatri_carrera cc ON cc.id_carrera = ca.id_carrera INNER JOIN materia ma ON ma.id_materia = cc.id_meteria WHERE al.id_alumno = '$this->idUserLogin'";

		$infoMaterias = $this->get_results_from_query();

		return $infoMaterias;
	}

	public function getCC(){
		$this->query = "SELECT ca.id_carrera as idCarrera, ca.nombre as nombreCarrera, cu.id_cuatri as idCuatri, cu.numero_cuatri as nuCuatri FROM alumno al INNER JOIN grupo go ON al.id_grupo =  go.id_grupo INNER JOIN carrera ca ON go.id_carrera =  ca.id_carrera JOIN cuatrimestre cu ON go.id_cuatrimestre = cu.id_cuatri WHERE al.id_alumno = '$this->idUserLogin'";

		$infoCC = $this->get_results_from_query();

		return $infoCC;
	}

	public function get(){
		$this->query = "SELECT al.nombres as nombreAlum, al.matricula as matriculaAlum, t.turno as turnoAlum FROM alumno al INNER JOIN grupo go ON al.id_grupo =  go.id_grupo INNER JOIN turno t ON go.id_turno =  t.id_turno WHERE al.id_alumno = '$this->idUserLogin'";
		
		$infoNMT = $this->get_results_from_query();

		return $infoNMT;
	}

	public function set() {
		$this->query = "INSERT INTO reinscripcion_alumno (id_alumno, carrera, cuatrimestre,turno,id_materia_1,id_materia_2,id_materia_3,id_materia_4,id_materia_5,id_materia_6,id_materia_7,id_materia_8,id_materia_9) VALUES ('$this->idUserLogin','$this->carrera','$this->cuatrimestre','$this->turno','$this->materia1','$this->materia2','$this->materia3','$this->materia4','$this->materia5','$this->materia6','$this->materia7','$this->materia8','$this->materia9')";

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