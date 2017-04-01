<?php

/*******************************************/
//DBA
/******************************************/
// Adaptado por Efrain Diaz y Eduardo Tun
// para la materia de Reingenieria


abstract class DBAbstractModel {
protected $query;
protected $rows = array();
protected $arrayResult = array();
private $conn;
public $mensaje = "OK";
# métodos abstractos para ABM de clases que hereden
abstract protected function get();
abstract protected function set();
abstract protected function edit();
abstract protected function delete();
# los siguientes métodos pueden definirse con exactitud y
# no son abstractos
# Conectar a la base de datos
private function open_connection() {

//$conn =	null;
	$host = 'localhost';
	$db = 	'control_escolar';
	$user = 'root';
	$pwd = 	'';

	try {		
		$this->conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
		$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->conn->exec("SET CHARACTER SET UTF8");

	}
	catch (PDOException $e) {
	echo '<p>Cannot connect to database !!</p>';
	exit;
	}
	return $this->conn;

}
# Desconectar la base de datos
private function close_connection() {
$this->conn = null;
}

# Ejecutar un query simple del tipo INSERT, DELETE, UPDATE
protected function execute_single_query() {
	if($_POST) {

		try{
			$this->open_connection();
			$this->conn->query($this->query);
			$this->close_connection();
		}catch(PDOException $e){
			$this->mensaje = 'error'. $e;
		}

	} else {
	$this->mensaje = 'Metodo no permitido';
	}

	return $this->mensaje;
}
#aux
protected function execute_single_query1() {
	if($_GET) {
		try{
			$this->open_connection();
			$this->conn->query($this->query);
			$this->close_connection();
		}catch(PDOException $e){
			$this->mensaje = 'error';
		}
	} else {
	$this->mensaje = 'Metodo no permitido';
	}
}

#aux


# Traer resultados de una consulta en un Array
protected function get_results_from_query() {

	$this->conn = DBAbstractModel::open_connection();

	$result = $this->conn->query($this->query);

	$rows = $result->fetchAll();

	foreach ($rows as $contact) {

		$this->arrayResult[] = $contact;
	}

	return  $this->arrayResult;
}

}
?>