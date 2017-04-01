//JS por Efrain Diaz para Modulo Gestionar Periodo
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

//muestra formulario para editar materia
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

//formulario para añadir materias
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

$(document).on('submit', '#newPCForm', function(e){
	e.preventDefault();
	var datos = $('#newPCForm').serialize();		
		$.ajax({
			type: 'POST',
			url: 'controller/ControladorGestionarCuatrimestre.php',
			data: datos,
			success: function(resp){
				//alert(resp)
				$('#notificationSuccess').css('display','block')
				$('#newPCForm')[0].reset();
			}
		});
});


//Modificando cuatrimestre
$(document).on('submit', '#updatePCForm', function(e){

		e.preventDefault();
		var datos = $('#updatePCForm').serialize();
		$.ajax({
			type: 'POST',
			url: 'controller/ControladorGestionarCuatrimestre.php',
			data: datos,
			success: function(resp){				
				$('#notificationSuccess').css('display','block')
			}
		});
});


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
//Creando elementos con Javascript nativo

function addNewSubject(idMateria, codMateria, nombre){

	var idMateria = idMateria;
	var codMateria = codMateria;
	var nombreMateria = nombre;
	var aux = true;

	$('input[name^="id_meteria"]').each(function() {

	 	if($(this).val() == idMateria){

	 		aux = false;
	 		$('#RTSearchSubject').val('');
			$('#resultadosMaterias').empty();
			$('#RTSearchSubject').focus();
	 	}

	});
	if(aux){
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
	nuevoInputId.className = "form-control text-center id";
	nuevoInputId.id = "keyInput";
	//nuevoInputId.readOnly = true;
	nuevoInputId.addEventListener("click", eliminarMateriaTabla);
	//Input para Codigo materia
	nuevoInputCod.type = "text";
	nuevoInputCod.value = codMateria;
	nuevoInputCod.name = "codMateria[]"
	nuevoInputCod.className = 'form-control text-center code';
	nuevoInputCod.readOnly = true;
	nuevoInputCod.addEventListener("click", eliminarMateriaTabla);
	//Input para Nombre
	nuevoInputNombre.type = "text";
	nuevoInputNombre.value = nombreMateria;
	nuevoInputNombre.name = "nombreMateria[]";
	nuevoInputNombre.className = 'form-control text-center materia';
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

	$('#contenedor-save-btn').css('display', 'block');
	} 	

}

//Remover materia de tabla
function eliminarMateriaTabla(){
	var auxDel = 0;
	$(this).closest('tr').remove();

	//Verificamos si elemento exeiste, si no, quitamos boton
	if ( $("#keyInput").length ) {

	}
	else{
		$('#contenedor-save-btn').css('display', 'none');
	}

}

//Asignar materias al cuatrimestre
$(document).on('click', '#btnSaveSubjects', function(e){

		e.preventDefault();
		var datos = $('#SubjectListForm').serialize();		
		$.ajax({
			type: 'POST',
			url: 'controller/ControladorGestionarCuatrimestre.php',
			data: datos,
			success: function(resp){
				$('#notificationSuccess').css('display','block')
				$('#lista').html('');
			}
		});
});


//CSS hover al remover materia de tabla
$(document).on({
    mouseenter: function () {
        //stuff to do on mouse enter
        $(this).css('background-color', '#EF5350');
        $(this).css('color', '#fff');
        $(this).css('text-decoration', 'line-through');        
    },
    mouseleave: function () {
        //stuff to do on mouse leave
        $(this).css('background-color', '#eee');
        $(this).css('color', '#555');
        $(this).css('text-decoration', 'none');
    }
}, ".id, .code, .materia");

//Validar fecha inicio/fin de campaña
function myDate(){

	//var minVal = $('#myDateStart').val();

	var minVal = document.getElementById("myDateStart").value;
	document.getElementById("myDateEnd").value = minVal;
	document.getElementById("myDateEnd").min = minVal;
}

function backToDisplayForEdit(){
	displayForEdit();
}

