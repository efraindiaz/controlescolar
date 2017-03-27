<?php
require_once('../model/ModeloPruba.php');


function handler() {

$zona = set_obj();
$nombres = $_REQUEST['hola'];
$apellido = $_REQUEST['comoestas'];

$resultado = $zona->datos($nombres, $apellido);
$res = $zona->set();

echo $res;
}

function set_obj(){

$obj = new Modelo_Prueba();
return $obj;

}

handler();

?>