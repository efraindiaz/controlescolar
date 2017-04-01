
<?php 

/*******************************************/
//MODULO GESTIONAR PERIODO CUATRIMESTRAL
/******************************************/
// Controlador desarrllado por Efrain Diaz
// para la materia de Reingenieria

require_once('../model/ModeloGestionarCuatrimestre.php');
function handler() {
	$res = "";
	$typeQuery = $_POST['typeQuery'];

	$zona = set_obj();
	$zonaAux = set_obj();


	/************************************************************************/
	//---> PROCESO ALTA CUATRIMESTRE

	//Inserta nuevo cuatrimestre
	if ($typeQuery == "insert") {

		$id_ciclo = $_POST['id_ciclo'];
		$numero_cuatri = $_POST['numero_cuatri'];
		$fecha_ini = $_POST['fecha_ini'];
		$fecha_fin = $_POST['fecha_fin'];
		$stado_cuatri = $_POST['stado_cuatri'];				
		
		$zona->datosNewCuatri($id_ciclo,$numero_cuatri, $fecha_ini,$fecha_fin,$stado_cuatri);
		$res = $zona->set();


	}
	//busca informacion para formulario nuevo cuatrimestre
	elseif($typeQuery == "searchIfoCiclo"){

		//buscamos informacion del ciclo escolar para campo select*
		$data = $zona->getDatoForNewCuatri();
		//retornamos vista con campos en tag select
		require_once('../view/GestionarPeriodoView/AltaPeriodoView.php');

	}

	/*************************************************************************/
	//---> PROCESO EDITAR CUATRIMESTRE / CERRAR CUATRIMESTRE - STATUS

	//Despliega listado de cuatrimestres on boton para modificar campos
	elseif ($typeQuery == "search") {

		$campo = $_POST['campo'];
		$btn = 'update';
		$zona->stringQuery($campo);
		$listCuatrimestre = $zona->getRTCuatrimestre();
		require_once('../view/GestionarPeriodoView/ListarCuatrimestresLayout.php');

	}
	//Despliega formulario con informacion del cuatrimestre
	elseif ($typeQuery == "searchInfoForUpdate") {

		$campo = $_POST['campo'];
		$zona->stringQuery($campo);
		//busca info de cuatri
		$cuatri = $zona->getFullCuatri();
		//Vista form modificar cuatri
		require_once('../view/GestionarPeriodoView/EditarCuatriView.php');
	}

    //edit Cuatri
	elseif ($typeQuery == "editPC") {

		$campo = $_POST['id_cuatri'];
		$numero_cuatri = $_POST['numero_cuatri'];
		$fecha_ini = $_POST['fecha_ini'];
		$fecha_fin = $_POST['fecha_fin'];
		$stado_cuatri = $_POST['stado_cuatri'];
		$zona->stringQuery($campo);
		//busca info de cuatri
		$zona->datosEditCuatri($numero_cuatri, $fecha_ini, $fecha_fin, $stado_cuatri);
		$editCuatri = $zona->edit();

		//Vista form modificar cuatri
		//require_once('../view/GestionarPeriodoView/EditarCuatriView.php');
	}

	

	/**************************************************************************/


	/*************************************************************************/
	//---> PROCESO ASIGNAR MATERIAS CUATRIMESTRE

	//Listamos cuatrimestres con boton para asignar materias
	elseif($typeQuery == "searchForSubject"){
		$campo = $_POST['campo'];
		$btn = 'addSubject';
		$zona->stringQuery($campo);
		$listCuatrimestre = $zona->getRTCuatrimestre();
		require_once('../view/GestionarPeriodoView/ListarCuatrimestresLayout.php');
	}

	//Desplegamos panel para agregar materias

	elseif($typeQuery == "displayAddSubject"){
		//busca info del cuatri
		$campo = $_POST['campo'];
		$zona->stringQuery($campo);
		$infoCuatri = $zona->get();
		$infoCarreras = $zonaAux->getCarreras();
		require_once('../view/GestionarPeriodoView/AsignarMateriasLayout.php');
	}

	//Despliega lista de materias en tiempo real
	elseif ($typeQuery == "RTMaterias"){

		$campo = $_POST['campo'];
		$zona->stringQuery($campo);
		$listMaterias = $zona->getRTMaterias();
		$total = count($listMaterias);
		require_once('../view/GestionarPeriodoView/ListarMateriasLayout.php');

	}

	//Guarda las materias al cuatri con un for

	elseif($typeQuery == "guardarMaterias"){


		for ($i=0; $i < count($_POST['id_meteria']); $i++) {

			$id_meteria = $_POST['id_meteria'][$i];

			$id_carrera = $_POST['id_carrera'];

			$id_cuatrimestre = $_POST['id_cuatrimestre'];

			$zona->datosAddSubject($id_meteria, $id_carrera, $id_cuatrimestre);

			$res = $zona->setCauatriCarrera();
		}

	}

	/*************************************************************************/

	echo $res;
}

function set_obj(){

$obj = new Modelo_GestionarCuatrimestre();
return $obj;

}

handler();

 ?>