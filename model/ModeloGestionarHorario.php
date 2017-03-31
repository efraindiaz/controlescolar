<?php

require_once('db_abstract_model.php');

class Modelo_Horario extends DBAbstractModel {
	var $idHorario,$idMateria,$idDia,$HI,$HF;
	var $queryString;
	
	public function stringQuery($queryString){
		$this->queryString = $queryString;
	}
	
	public function datos($idHorario,$idMateria,$idDia,$HI,$HF){

		$this->idHorario = $idHorario;
		$this->idMateria = $idMateria;
		$this->idDia = $idDia;
		$this->HI = $HI;
		$this->HF = $HF;
	}

	public function getMateria(){
		$this->query = "SELECT * FROM materia";

		$infoMateria = $this->get_results_from_query();

		return $infoMateria;
	}

	public function getHorario(){
		$this->query = "SELECT * FROM horario";

		$infoGrupo = $this->get_results_from_query();

		return $infoGrupo;
	}

	public function get(){
		$this->query = "SELECT * FROM dia";
		
		$infoDia = $this->get_results_from_query();

		return $infoDia;
	}

	public function set() {
		$this->query = "INSERT INTO horario_materia (id_horario, id_materia, id_dia, materia_ini,materia_fin) VALUES ('$this->idHorario','$this->idMateria','$this->idDia','$this->HI','$this->HF')";

		$res = $this->execute_single_query();

		return $res;
	}
 
	public function edit() {
		$this->query = "UPDATE horario_materia SET id_horario = '$this->idHorario', id_materia='$this->idMateria', id_dia='$this->idDia', materia_ini='$this->HI', materia_fin='$this->HF' WHERE id_materia_horario = '$this->queryString'";

		$res = $this->execute_single_query();

		return $res;
	}

	public function delete($tzonclave='') {

	}

	public function getAltaHorario() {
		$this->query = "SELECT hm.id_materia_horario, h.descripcion as Hdescripcion, m.nombre_materia as nameMateria, d.dia_semana as dia FROM horario_materia hm INNER JOIN horario h ON hm.id_horario = h.id_horario INNER JOIN materia m ON hm.id_materia = m.id_materia INNER JOIN dia d ON hm.id_dia = d.id_dia WHERE descripcion LIKE '$this->queryString%'";
		$horario = $this->get_results_from_query();
		
		return $horario;
	}

	public function getInfoAltaHorario() {
		$this->query = "SELECT hm.id_materia_horario ,hm.materia_ini, hm.materia_fin , h.id_horario as idHorario, h.descripcion as Hdescripcion, m.id_materia as idMateria , m.nombre_materia as nameMateria, d.id_dia as idDia, d.dia_semana as dia FROM horario_materia hm INNER JOIN horario h ON hm.id_horario = h.id_horario INNER JOIN materia m ON hm.id_materia = m.id_materia INNER JOIN dia d ON hm.id_dia = d.id_dia WHERE hm.id_materia_horario = '$this->queryString'";
		$horario = $this->get_results_from_query();
		
		return $horario;
	}

	public function deleteAltaHorario($id){
		$this->query = "DELETE FROM horario_materia WHERE id_materia_horario = '$id'";

		$res = $this->execute_single_query();

		return $res;
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