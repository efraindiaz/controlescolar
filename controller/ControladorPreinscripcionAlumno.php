<?php
require_once('../model/ModeloPreinscripcionAlumno.php');

function handler() {
	$res = "";
	$typeQuery = $_REQUEST['typeQuery'];

	$zona = set_obj();

	if ($typeQuery == "selectCarreras") {
		$carreras = $zona->get();
		
		$res = json_encode($carreras);
	}else if ($typeQuery == "insert") {
		$nombres = $_REQUEST['nombreA'];
		$ap_mat = $_REQUEST['apellidoM'];
		$ap_pat = $_REQUEST['apellidoP'];
		$curp = $_REQUEST['curp'];
		$telcel = $_REQUEST['tel-cel'];
		$email = $_REQUEST['email'];
		$carrera = $_REQUEST['carreras'];
		$promedio = $_REQUEST['promedio'];

		$zona->datos($nombres,$ap_mat,$ap_pat,$curp,$telcel,$email,$carrera, $promedio);
		$res = $zona->set();
	}

	echo $res;
}

function set_obj(){

$obj = new Modelo_Preinscripcion_Alumno();
return $obj;

}

handler();

?>