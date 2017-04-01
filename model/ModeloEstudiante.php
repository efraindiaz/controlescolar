<?php
//Controlador desarrollado por Aguayo Gonzalez Carlos Arturo

require_once('db_abstract_model.php');

class Modelo_Estudiante extends DBAbstractModel {
	var $imgPerfil;
	var $fechaN;
	var $claveC;
	var $estadoN;
	var $municipio;
	var $estadoC;
	var $numeroE;
	var $numeroI;
	var $colonia;
	var $ciudadAc;
	var $telefonoCe;
	var $telefonoCa;
	var $correoE;
	var $queryString;

	public function datos($imgPerfil, $fechaN, $claveC, $estadoN, $municipio,  $estadoC, $numeroE, $numeroI, $colonia, $ciudadAc, $telefonoCe, $telefonoCa, $correoE){
		$this->imgPerfil = $imgPerfil;
		$this->fechaN = $fechaN;
		$this->claveC = $claveC;
		$this->estadoN = $estadoN;
		$this->municipio = $municipio;
		$this->estadoC = $estadoC;
		$this->numeroE = $numeroE;
		$this->numeroI = $numeroI;
		$this->colonia = $colonia;
		$this->ciudadAc = $ciudadAc;
		$this->telefonoCe = $telefonoCe;
		$this->telefonoCa = $telefonoCa;
		$this->correoE = $correoE;
	}

	public function stringQuery($queryString){
		$this->queryString = $queryString;
	}

	public function get(){

	}

	public function getNivelSistema(){
		$this->query = "SELECT * FROM nivel_sistema";
		$niveles = $this->get_results_from_query();

		return $niveles;
	}

	public function getAlumnos() {
		$this->query = "SELECT id_alumno, nombres, matricula FROM alumno WHERE nombres LIKE '$this->queryString%'";
		$alumnos = $this->get_results_from_query();
		
		return $alumnos;
	}

	public function getAlumno(){
		$this->query = "SELECT * FROM alumno WHERE id_alumno = '$this->queryString'";
		$alumno = $this->get_results_from_query();

		return $alumno;
	}

	public function set() {
		$this->query = "INSERT INTO alumno (id_nivel_sistema, matricula, contraseña, nombres, apellido_materno, apellido_paterno, estado) VALUES ('$this->nivel', '$this->matricula','$this->contraseña','$this->nombres','$this->apellidoM','$this->apellidoP','$this->status')";

		$res = $this->execute_single_query();

		return $res;
	}
 
	public function edit() {
		$this->query = "UPDATE perfil_alumno SET imgPerfil = '$this->img_perfil', fechaN = '$this->fecha_de_nacimiento', claveC = '$this->clave_curp', estadoN = '$this->estado_nacimiento', municipio = '$this->municipio', estadoC = '$this->estado_civil', numeroE = '$this->numero_externo', numeroI = '$this->numero_interno', colonia = '$this->colonia', ciudadAc = '$this->ciudad_actual', telefonoCe = '$this->telefono_celular', telefonoCa = '$this->telefono_casa', correoE = '$this->correo_electronico' WHERE id_alumno = '$this->queryString'";


		$res = $this->execute_single_query();

		return $res;
	}

	public function delete($tzonclave='') {

	}

	# Método constructor
	function __construct() {
	$this->db_name = 'control_escolar';
	}
	# Método destructor del objeto
	function __destruct() {
	unset($this);
	}
}
?>