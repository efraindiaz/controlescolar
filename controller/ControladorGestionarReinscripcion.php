<?php
require_once('../model/ModeloGestionarReinscripcion.php');

function handler() {
	$res = "";
	$typeQuery = $_REQUEST['typeQuery'];

	$zona = set_obj();

	if ($typeQuery == "infoAlumno") {
		$idLogin = $_REQUEST['idLogin'];
		$zona->stringQuery($idLogin);
		$infoCC = $zona->getCC();
		$zona2 = set_obj();
		$zona2->stringQuery($idLogin);
		$infoNMT = $zona2->get();
		$zona3 = set_obj();
		$zona3->stringQuery($idLogin);
		$infomaterias = $zona3->getMaterias();


		$array = array(
			'NMT' => $infoNMT,
			'CC' => $infoCC,
			'materias' => $infomaterias
		);

		$res = json_encode($array);
	}else if ($typeQuery == "insert") {
		$idLogin = $_REQUEST['idLogin'];
		$carrera = $_REQUEST['carrera'];
		$cuatrimestre = $_REQUEST['cuatrimestre'];
		$turno = $_REQUEST['turno'];
		$materia1 = $_REQUEST['materia1'];
		$materia2 = $_REQUEST['materia2'];
		$materia3 = $_REQUEST['materia3'];
		$materia4 = $_REQUEST['materia4'];
		$materia5 = $_REQUEST['materia5'];
		$materia6 = $_REQUEST['materia6'];
		$materia7 = $_REQUEST['materia7'];
		$materia8 = $_REQUEST['materia8'];
		$materia9 = $_REQUEST['materia9'];

		
		$zona->stringQuery($idLogin);
		$zona->datos($carrera,$cuatrimestre,$turno, $materia1, $materia2, $materia3, $materia4, $materia5, $materia6, $materia7, $materia8,$materia9);

		$res = $zona->set();
	}

	echo $res;
}

function set_obj(){

$obj = new Modelo_Reinscripcion();
return $obj;

}

handler();

?>