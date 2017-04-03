<?php
require_once('../model/ModeloCiclo.php');

function handler() {
	$res = "";
	$typeQuery = $_REQUEST['typeQuery'];

	$zona = set_obj();

	if ($typeQuery == "insert") {
		
		$inicio = $_REQUEST['inicio'];
		$fin = $_REQUEST['fin'];
		$estado = $_REQUEST['estado'];
		$status = 1;

		$zona->datos($inicio,$fin,$estado);
		$res = $zona->set();

	}elseif ($typeQuery == "search") {
		$estadoC = $_REQUEST['estado'];
		$zona->stringQuery($estadoC);

		$ciclos = $zona->getCiclos();

		$res = json_encode($ciclos);
	}elseif ($typeQuery == "editar") {
		$idCiclo = $_REQUEST['idCiclo'];

		$zona->stringQuery($idCiclo);
		$ciclos = $zona->getCiclo();

		$res = json_encode($ciclos);
	}elseif ($typeQuery == "select") {
		$estados = $zona->getCiclo();
		
		$res = json_encode($estados);
	}elseif ($typeQuery == "update") {
		$idCicloe = $_REQUEST['idCiclo'];
		$zona->stringQuery($idCicloe);

		$inicioe = $_REQUEST['inicio'];
		$fine = $_REQUEST['fin'];
		$estadoe = $_REQUEST['estado'];
		$statuse = 1;

		$zona->datos($inicioe,$fine,$estadoe);

		$res = $zona->edit();
	}

	echo $res;
}

function set_obj(){

$obj = new Modelo_Ciclo();
return $obj;

}

handler();

?>