$(function(){


	$('#altaPeriodoCuatri').click(function(){

		var typeQuery = 'searchIfoCiclo'
		$.ajax({
		type: 'POST',
		url: 'controller/ControladorGestionarCuatrimestre.php', //url ahora apunta a controlador
		data: {typeQuery: typeQuery},
		success:function(data){
			$('#render').html(data);
		}
	});
		
	});

	$('#editarPeriodoCuatri').click(function(){
		
		displayForEdit();

	});

	$('#AddMateriasCuatri').click(function(){
		displayForAddSubject();
	});


})

function displayForEdit(){
	var aux = 'forEdit';
	$.ajax({
		type: 'POST',
		url: 'view/GestionarPeriodoView/BuscarCuatriView.php',
		data: {restrict:aux},
		success:function(data){
			$('#render').html(data);
		}
	});
}

function displayForAddSubject(){
	var aux = 'forAddSubject';
	$.ajax({
		type: 'POST',
		url: 'view/GestionarPeriodoView/BuscarCuatriView.php',
		data: {restrict:aux},
		success:function(data){
			$('#render').html(data);
		}
	});
}

//funcion desde formulario para nuevo cuatrimestre
$(document).on('click', '#btnSaveCuat', function(e){

		console.log("entrando a funcion dentro de form")

		e.preventDefault();
		var datos = $('#newPCForm').serialize();
		$.ajax({
			type: 'POST',
			url: 'controller/ControladorGestionarCuatrimestre.php',
			data: datos,
			success: function(resp){
				alert(resp);
			}
		});
});

//Modificando cuatrimestre
$(document).on('click', '#btnUpdateCuat', function(e){
	
		console.log("entrando a funcion dentro de form")

		e.preventDefault();
		var datos = $('#updatePCForm').serialize();
		$.ajax({
			type: 'POST',
			url: 'controller/ControladorGestionarCuatrimestre.php',
			data: datos,
			success: function(resp){
				displayForEdit();
			}
		});
});

/*
$(document).on('click', '#btnSaveCuatMat', function(e){
	
		console.log("entrando a funcion dentro de form")

		e.preventDefault();
		//var datos = $('#newPCForm').serialize();
		$.ajax({
			type: 'POST',
			url: 'controller/ControladorGestionarCuatrimestre.php',
			data: datos,
			success: function(resp){
				alert(resp);
			}
		});
	});
*/

/****************************Realtime Listar cuatrimestres para modificar info**********************************/

$(document).on('keyup','#campoForUpdate',function(e){

	e.preventDefault();
	var typeQuery = 'search';
	var campo = $('#campoForUpdate').val();
	var datos = {
			typeQuery: typeQuery,
			campo: campo
		}

	$.ajax({
			type: 'POST',
			url: 'controller/ControladorGestionarCuatrimestre.php',
			data: datos,
			success: function(resp){
				$('#listaCuatrisFilter').html(resp);
			}
		});


	
});

//Desplegamos formulario con la informacion del cuatristre a modificar
function searchInfoForUpdate(idCuatri){

	var typeQuery = 'searchInfoForUpdate';
	var campo = idCuatri;
	var datos = {
			typeQuery: typeQuery,
			campo: campo
		}

	$.ajax({
			type: 'POST',
			url: 'controller/ControladorGestionarCuatrimestre.php',
			data: datos,
			success: function(resp){
				console.log(resp)
				$('#render').html(resp);
			}
		});
}

/****************************JS para proceso asignar materias*********************************/


//Realtime listar cuatrimestres para asignar materias
$(document).on('keyup','#campoForAddSubjects',function(e){

	e.preventDefault();
	var typeQuery = 'searchForSubject';
	var campo = $('#campoForAddSubjects').val();
	var datos = {
			typeQuery: typeQuery,
			campo: campo
		}

	$.ajax({
			type: 'POST',
			url: 'controller/ControladorGestionarCuatrimestre.php',
			data: datos,
			success: function(resp){
				$('#listaCuatrisFilter').html(resp);
			}
		});


	
});

//Render view para proceso de asignar materias
function displayAddSubject(refCuatri){

	var typeQuery = 'displayAddSubject';
	var campo = refCuatri;
	var datos = {
			typeQuery: typeQuery,
			campo: campo
		}

	$.ajax({
			type: 'POST',
			url: 'controller/ControladorGestionarCuatrimestre.php',
			data: datos,
			success: function(resp){
				$('#render').html(resp);
			}
		});

}

//Realtime para listar materias

$(document).on('keyup','#RTSearchSubject',function(e){

	e.preventDefault();
	var typeQuery = 'RTMaterias';
	var campo = $('#RTSearchSubject').val();
	console.log(campo);
	var datos = {
			typeQuery: typeQuery,
			campo: campo
		}

	$.ajax({
			type: 'POST',
			url: 'controller/ControladorGestionarCuatrimestre.php',
			data: datos,
			success: function(resp){
				$('#resultadosMaterias').html(resp);
			}
		});


	
});

//selecionar materia e incrustarla en tabla

function addNewSubject(idMateria, codMateria, nombre){

	var idMateria = idMateria;
	var codMateria = codMateria;
	var nombreMateria = nombre; 

	/*** Creando elementos ***/
	var nuevaMateria = document.createElement("tr"),

				nuevoTdId = document.createElement("td"),

				nuevoTdCod = document.createElement("td"),

				nuevoTdNombre = document.createElement("td"),				

				nuevoInputId = document.createElement("input"),

				nuevoInputCod = document.createElement("input"),

				nuevoInputNombre = document.createElement("input");

	/***** Añadiendo atributos a elementos *****/
	//Input para Codigo
	nuevoInputId.type = "text";
	nuevoInputId.value = idMateria;
	nuevoInputId.name = "id_meteria[]";
	nuevoInputId.className = "form-control text-center code";
	nuevoInputId.id = "myinput";
	//nuevoInputId.readOnly = true;
	nuevoInputId.addEventListener("click", eliminarMateriaTabla);
	//Input para Codigo materia
	nuevoInputCod.type = "text";
	nuevoInputCod.value = codMateria;
	nuevoInputCod.name = "codMateria[]"
	nuevoInputCod.className = 'form-control text-center pr';
	nuevoInputCod.readOnly = true;
	nuevoInputCod.addEventListener("click", eliminarMateriaTabla);
	//Input para Nombre
	nuevoInputNombre.type = "text";
	nuevoInputNombre.value = nombreMateria;
	nuevoInputNombre.name = "nombreMateria[]";
	nuevoInputNombre.className = 'form-control text-center desc';
	nuevoInputNombre.readOnly = true;
	nuevoInputNombre.addEventListener("click", eliminarMateriaTabla);

	nuevoTdId.appendChild(nuevoInputId);
	nuevoTdCod.appendChild(nuevoInputCod);
	nuevoTdNombre.appendChild(nuevoInputNombre);
	//tr 
	nuevaMateria.appendChild(nuevoTdId);
	nuevaMateria.appendChild(nuevoTdCod);
	nuevaMateria.appendChild(nuevoTdNombre);
	//a lista
	$('#RTSearchSubject').val('');
	$('#resultadosMaterias').empty();
	$('#RTSearchSubject').focus();
	$('#text-ref').css('display','none');
	$('#lista').append(nuevaMateria);



	

}

function eliminarMateriaTabla(){

}

$(document).on('click', '#btnSaveSubjects', function(e){

		e.preventDefault();
		var datos = $('#SubjectListForm').serialize();		
		$.ajax({
			type: 'POST',
			url: 'controller/ControladorGestionarCuatrimestre.php',
			data: datos,
			success: function(resp){
				alert(resp);
			}
		});
});

//remover materia de tabla

//guardando campos campos 

//ATRR JQ
/*
var idMateria = idMateria;
	var codMateria = codMateria;
	var nombre = nombre; 

	var tr = $('<tr/>')
	var td = $('<td/>')
	var input = $('<input/>');

	var inputId = input.

	var inputCodMat = input.attr({
		value:nombre
	});

	$('#').
*/


