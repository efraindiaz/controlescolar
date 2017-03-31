<?php
require_once('../model/ModeloAlumno.php');

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

		$alumnos = $zona->getAlumnos();

		$res = json_encode($alumnos);
	}elseif ($typeQuery == "editar") {
		$idAlumno = $_REQUEST['idAlumno'];

		$zona->stringQuery($idAlumno);
		$alumnos = $zona->getAlumno();

		$res = json_encode($alumnos);
	}elseif ($typeQuery == "select") {
		$niveles = $zona->getNivelSistema();
		
		$res = json_encode($niveles);
	}elseif ($typeQuery == "update") {
		$idAlumn = $_REQUEST['idAlumno'];
		$zona->stringQuery($idAlumn);

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

$obj = new Modelo_Alumno();
return $obj;

}

handler();

?>