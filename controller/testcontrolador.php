<?php
require_once('../model/testmodelo.php');

$campo = $_POST['campo'];

function handler($campo) {

$zona = set_obj();

$resultado = $zona->getCampo($campo);

//require_once('view/VistaIndex.php');

print var_dump($resultado);

}

function set_obj(){

$obj = new Modelo_Index();
return $obj;

}

handler($campo);

?>