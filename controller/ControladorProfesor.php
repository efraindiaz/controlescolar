<?php
require_once('../model/ModeloProfesor.php');

function handler() {
	$res = "";
	$typeQuery = $_REQUEST['typeQuery'];

	$zona = set_obj();

	if ($typeQuery == "insert") {
		$nivel = $_REQUEST['nivel'];
		$matricula = $_REQUEST['matricula'];
		$pass = $_REQUEST['contraseña'];
		$nombres = $_REQUEST['nombre'];
		$ap_mat = $_REQUEST['apellidoM'];
		$ap_pat = $_REQUEST['apellidoP'];
		$status = 1;

		$zona->datos($nivel, $matricula,$pass,$nombres,$ap_mat,$ap_pat,$status);
		$res = $zona->set();

	}elseif ($typeQuery == "search") {
		$nombreP = $_REQUEST['nombre'];
		$zona->stringQuery($nombreP);

		$profesores = $zona->getProfesores();

		$res = json_encode($profesores);
	}elseif ($typeQuery == "editar") {
		$idProfesor = $_REQUEST['idProfesor'];

		$zona->stringQuery($idProfesor);
		$profesores = $zona->getProfesor();

		$res = json_encode($profesores);
	}elseif ($typeQuery == "select") {
		$niveles = $zona->getNivelSistema();
		
		$res = json_encode($niveles);
	}elseif ($typeQuery == "update") {
		$idProfesore = $_REQUEST['idProfesor'];
		$zona->stringQuery($idProfesore);

		$nivele = $_REQUEST['nivel'];
		$matriculae = $_REQUEST['matricula'];
		$passe = $_REQUEST['contraseña'];
		$nombrese = $_REQUEST['nombre'];
		$ap_mate = $_REQUEST['apellidoM'];
		$ap_pate = $_REQUEST['apellidoP'];
		$statuse = 1;

		$zona->datos($nivele, $matriculae,$passe,$nombrese,$ap_mate,$ap_pate,$statuse);

		$res = $zona->edit();
	}

	echo $res;
}

function set_obj(){

$obj = new Modelo_Profesor();
return $obj;

}

handler();

?>