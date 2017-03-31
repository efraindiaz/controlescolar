<?php
require_once('../model/ModeloGestionarGrupo.php');

function handler() {
	$res = "";
	$typeQuery = $_REQUEST['typeQuery'];

	$zona = set_obj();

	if ($typeQuery == "selectProfesor") {

		$profesor = $zona->get();
		$res = json_encode($profesor);

	}else if ($typeQuery == "selectCarreras") {

		$carreras = $zona->getCarreras();
		$res = json_encode($carreras);
		
	}else if ($typeQuery == "selectGrupo") {
		$idCarrera = $_REQUEST['idCarrera'];
		$zona->stringQuery($idCarrera);
		$carreras = $zona->getGrupos();
		$res = json_encode($carreras);
		
	}else if ($typeQuery == "insertAsignarProfesor") {
		$idProfesor = $_REQUEST['profesor'];
		$idGrupo = $_REQUEST['grupo'];
		$zona->datos($idProfesor,$idGrupo);
		$carreras = $zona->set();
		$res = $carreras;	
	}

	echo $res;
}

function set_obj(){

$obj = new Modelo_AsignarProfesor();
return $obj;

}

handler();

?>