<?php
require_once('model/ModeloIndex.php');


function handler() {

$zona = set_obj();

$resultado = $zona->get();

require_once('view/VistaIndex.php');



}

function set_obj(){

$obj = new Modelo_Index();
return $obj;

}

handler();

?>