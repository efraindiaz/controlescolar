<?php
require_once('../model/ModeloEstudiante.php');

function handler() {
	$res = "";
	$typeQuery = $_REQUEST['typeQuery'];

	$zona = set_obj();

	if ($typeQuery == "insert") {
		$imgPerfil = $_REQUEST['imgPerfil'];
		$fechaN = $_REQUEST['fechaN'];
		$claveC = $_REQUEST['claveC'];
		$estadoN = $_REQUEST['estadoN'];
		$municipio = $_REQUEST['municipio'];
		$estadoC = $_REQUEST['estadoC'];
		$numeroE = $_REQUEST['numeroE'];
		$numeroI = $_REQUEST['numeroI'];
		$colonia = $_REQUEST['colonia'];
		$ciudadAc = $_REQUEST['ciudadAc'];
		$telefonoCe = $_REQUEST['telefonoCe'];
		$telefonoCa = $_REQUEST['telefonoCa'];
		$correoE = $_REQUEST['correoE'];

		$zona->datos($imgPerfil, $fechaN,$claveC,$estadoC,$municipio,$estadoC,$numeroE,$numeroI,$colonia,$ciudadAc,$telefonoCe,$telefonoCa,$correoE);
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

		$imgPerfil = $_REQUEST['imgPerfil'];
		$fechaN = $_REQUEST['fechaN'];
		$claveC = $_REQUEST['claveC'];
		$estadoN = $_REQUEST['estadoN'];
		$municipio = $_REQUEST['municipio'];
		$estadoC = $_REQUEST['estadoC'];
		$numeroE = $_REQUEST['numeroE'];
		$numeroI = $_REQUEST['numeroI'];
		$colonia = $_REQUEST['colonia'];
		$ciudadAc = $_REQUEST['ciudadAc'];
		$telefonoCe = $_REQUEST['telefonoCe'];
		$telefonoCa = $_REQUEST['telefonoCa'];
		$correoE = $_REQUEST['correoE'];


		$zona->datos($imgPerfil, $fechaN,$claveC,$estadoN,$municipio,$estadoC,$numeroE,$numeroI,$colonia,$ciudadAc,$telefonoCe,$telefonoCa,$correoE);

		$res = $zona->edit();
	}

	echo $res;
}

function set_obj(){

$obj = new Modelo_Estudiante();
return $obj;

}

handler();

?>