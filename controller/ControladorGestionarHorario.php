<?php
require_once('../model/ModeloGestionarHorario.php');

function handler() {
	$res = "";
	$typeQuery = $_REQUEST['typeQuery'];

	$zona = set_obj();

	if ($typeQuery == "infoPGD") {
		$infoDia = $zona->get();
		$zona2 = set_obj();
		$infoHorario = $zona2->getHorario();
		$zona3 = set_obj();
		$infoMateria = $zona3->getMateria();

		$array = array(
			'materia' => $infoMateria,
			'horario' => $infoHorario,
			'dias' => $infoDia
		);

		$res = json_encode($array);
	}else if ($typeQuery == "insertAltaHorario") {
		$idHorario = $_REQUEST['horario'];
		$idMateria= $_REQUEST['materia'];
		$idDia = $_REQUEST['dia'];
		$hi = $_REQUEST['horaI'];
		$hf = $_REQUEST['horaF'];
		
		$zona->datos($idHorario,$idMateria,$idDia,$hi,$hf);

		$res = $zona->set();
	}elseif ($typeQuery == "searchHorario") {
		$nombreP = $_REQUEST['nombre'];
		$zona->stringQuery($nombreP);

		$profesores = $zona->getAltaHorario();

		$res = json_encode($profesores);
	}elseif ($typeQuery == "selectAltaHorario") {
		$id = $_REQUEST['idMateriaHorario'];
		$zona->stringQuery($id);

		$profesores = $zona->getInfoAltaHorario();

		$res = json_encode($profesores);
	}elseif ($typeQuery == "EditarAltaHorario") {
		$idHorario = $_REQUEST['horario'];
		$idMateria= $_REQUEST['materia'];
		$idDia = $_REQUEST['dia'];
		$hi = $_REQUEST['horaI'];
		$hf = $_REQUEST['horaF'];
		$id = $_REQUEST['idHorarioMateria'];

		$zona->datos($idHorario,$idMateria,$idDia,$hi,$hf);
		$zona->stringQuery($id);

		$res = $zona->edit();
	}elseif ($typeQuery == "eliminar") {
		$idH = $_REQUEST['idHorarioM'];

		$res = $zona->deleteAltaHorario();
	}

	echo $res;
}

function set_obj(){

$obj = new Modelo_Horario();
return $obj;

}

handler();

?>