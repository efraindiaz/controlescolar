<?php
# Importar modelo de abstracción de base de datos
require_once('db_abstract_model.php');

class Modelo_Index extends DBAbstractModel {
############################### PROPIEDADES ################################

// ctaid,ctadesc
/*public $ctadesc;
public $ctaid;
public $datos;*/
################################# MÉTODOS ##################################
# Traer datos de utperclavena agencia
public function get() {

$this->query = "SELECT * from contacts";


return  $this->get_results_from_query();

}
public function getCampo($campo) {

$this->query = "SELECT * from contacts where name LIKE '%".$campo."%'";


return  $this->get_results_from_query();

}

# Crear un nuevo 
public function set() {
}

# Modificar un 
public function edit() {

}
# Eliminar un 
public function delete($tzonclave='') {

}
# Método constructor
function __construct() {
$this->db_name = 'diary';
}
# Método destructor del objeto
function __destruct() {
unset($this);
}
}
?>