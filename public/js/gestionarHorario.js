/*ALTA HORARIO*/

//LIMPIAR FORMULARIO ALTA HORARIO
function clearForm(){
	$('.horario > option[value=0]').removeAttr('selected');
	$('.horario > option[value=0]').attr('selected', 'selected');
	$('.materia > option[value=0]').removeAttr('selected');
	$('.materia > option[value=0]').attr('selected', 'selected');
	$('.dia > option[value=0]').removeAttr('selected');
	$('.dia > option[value=0]').attr('selected', 'selected');
}

//VALIDACION PARA NO ENVIAR CAMPOS VACIOS A LA BASEE DE DATOS
function validateForm(){
	var horario = $('.horario').val();
	var materia = $('.materia').val();
	var dia = $('.dia').val();
	var hi = $('.horaI').val();
	var hf = $('.horaF').val();
	var res = false;

	if (horario === 0 || horario ==  null || materia === 0 || materia ==  null || dia === 0 || dia ==  null || hi == "" || hf == "") {
		res = true;
	}

	return res;
}

//traer vista para alta horario
$(document).on('click','.altaHorario',function(){
	$.ajax({
		type: 'POST',
		url: 'view/altaHorario.php',
		success:function(data){
			$('#render').html(data);
			getInfo(); //TRAIGO INFO DEL HORARIO
		}
	});
});


//TRAER INFORMACION AL INICIO DE ALTA DE HORARIO
function getInfo(){
	$.ajax({
		type: 'POST',
		dataType: 'JSON',
		data:{
			typeQuery: "infoPGD"
		},
		url: 'controller/ControladorGestionarHorario.php',
		success:function(data){

			for (var i = 0; i < data.materia.length; i++) {
				$('select.materia').append('<option value="'+data.materia[i].id_materia+'">'+data.materia[i].nombre_materia+'</option>');
			}

			for (var i = 0; i < data.horario.length; i++) {
			 	$('select.horario').append('<option value="'+data.horario[i].id_horario+'">'+data.horario[i].descripcion+'</option>');
			}

			for (var i = 0; i < data.dias.length; i++) {
			 	$('select.dia').append('<option value="'+data.dias[i].id_dia+'">'+data.dias[i].dia_semana+'</option>');
			}
		}
	});
}

//INSERTAR UN NUEVO HORARIO
$(document).on('click', '#btnAltaHorario', function(){
	var formAltaHorario = $('.formAltaHorario').serialize();
	var enviar = validateForm();

	console.log(enviar);
	if (enviar == true) {//llamo la funcion para verificar si encontro campos vacion
		$('#feedbackAlertAltaHorario').hide();
		setTimeout(function(){
			$('#feedbackAlertAltaHorario').show();
		}, 100);
		setTimeout(function(){
			$('#feedbackAlertAltaHorario').hide();
		}, 1500);
	}else{
		$.ajax({
			type:'POST',
			data: formAltaHorario,
			url: 'controller/ControladorGestionarHorario.php',
			success:function(data){
				console.log(data);
				if (data == 'OK') {
					setTimeout(function(){
						$('.modalHeaderAltaHorario').css("background-color", "#5cb85c");
						$('#feedbackTextHeader').html("Correcto!");
						$('#feedbackTextBody').html("Alta Horario Correctamente! :)");
						$('#modalAltaHorario').modal('show');
					}, 100);
					setTimeout(function(){
						$('#modalAltaHorario').modal('hide');
					}, 2000);
					setTimeout(function(){
						clearForm();
					},2300);
				}
			}
		});
	}
});

/* FIN ALTA HORARIO*/

/*EDITAR HORARIO HORARIO*/

//traer vista para alta Horario
$(document).on('click','.editarHorario',function(){
	searchHorarioView();
});

function searchHorarioView(){
	$.ajax({
		type: 'POST',
		url: 'view/searchAltaHorario.php',
		success:function(data){
			$('#render').html(data);
		}
	});
}


//INICIA FUNCION AUTOSUGGEST PARA BUSCAR Y TRAER LA INFORMACION DE LOS PROFESORES
$(document).on('keyup','#searchaltaHorario',function(e){
	console.log("Buscando Alta de Horario");
	e.preventDefault();
	var typeQuery = $('.typeQuery').val();
	var nombre = $('#searchaltaHorario').val();
	var data = {
			typeQuery: typeQuery,
			nombre: nombre
		}
	if (nombre == "") {
		$('.emptyAltaHori').remove();
		$('.datosAltaHorario').hide();
	}else{
		$.ajax({
			type: 'POST',
			url: 'controller/ControladorGestionarHorario.php',
			data: data,
			success: function(data){
				console.log("Mostrando altaHorario");
				$('.datosAltaHorario').hide();
				$('.emptyAltaHori').remove();
				$('.tableAltaHorario tbody').empty();
				var dataJSon = eval(data);
				if (dataJSon == 0) {
					$('#render').append('<p class="bg-warning emptyAltaHori">Sin Resultados</p>');
				}else{
					$('.datosAltaHorario').show();
					for (var i in dataJSon) {
						$('.tableAltaHorario tbody').append('<tr><td>'+dataJSon[i].Hdescripcion+'</td><td>'+dataJSon[i].nameMateria+'</td><td>'+dataJSon[i].dia+'</td><td class="acciones"><a onclick="editarAltaHorario('+dataJSon[i].id_materia_horario+')"><span class="glyphicon glyphicon-edit edit" aria-hidden="true"></span></a><a onclick="eliminarAltaHorario('+dataJSon[i].id_materia_horario+')"><span class="glyphicon glyphicon-trash delete" aria-hidden="true"></span></a></td></tr>');
					}
				}
			}
		});
	}
});
//FIN FUNCION AUTOSUGGEST PARA BUSCAR Y TRAER LA INFORMACION DE LOS PROFESORES

//FUNCION PARA MOSTRAR LA VISTA PARA EDITAR UN ALTA DE HORARIO
function editarAltaHorario(idhorario){
	console.log("editar " +idhorario);
	$.ajax({
		type: 'POST',
		url: 'view/editAltaHorario.php',
		success: function(data){
			if (data!="") {
				$('#render').html(data);
				getInfo();
				$.ajax({
					type: 'POST',
					url: 'controller/ControladorGestionarHorario.php',
					data:{
						typeQuery: "selectAltaHorario",
						idMateriaHorario: idhorario
					},
					success:function(data){
						var dataJSon = eval(data);
						$('select.horario > option[value='+dataJSon[0].idHorario+']').attr('selected','selected');
						$('select.materia > option[value="'+dataJSon[0].idMateria+'"]').attr('selected', 'selected');
						$('select.dia > option[value="'+dataJSon[0].idDia+'"]').attr('selected', 'selected');
						$('.horaI').val(dataJSon[0].materia_ini);
						$('.horaF').val(dataJSon[0].materia_fin);
						$('.idHorarioMateria').val(dataJSon[0].id_materia_horario);
						$('#render').append('<p>'+dataJSon[0].idHorario+'</p>');
						console.log(dataJSon[0].idHorario);
					}
				});
			}
		}
	});
}
//FIN FUNCION PARA MOSTRAR LA VISTA PARA EDITAR UN ALTA DE HORARIO

//FUNCION PARA ACTUALIZAR DATOS DE Alta Horario
$(document).on('click', '#btnEditarAltaHorario', function(e){
	var datos = $('.formEditAltaHorario').serialize();
	var enviar = validateForm();

	console.log(enviar);
	if (enviar == true) {//llamo la funcion para verificar si encontro campos vacion
		$('#feedbackAlertEditAltaHorario').hide();
		setTimeout(function(){
			$('#feedbackAlertEditAltaHorario').show();
		}, 100);
		setTimeout(function(){
			$('#feedbackAlertEditAltaHorario').hide();
		}, 1500);
	}else{
	
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'controller/ControladorGestionarHorario.php',
			data: datos,
			success: function(data){
				console.log(data);
				if (data == 'OK') {
					setTimeout(function(){
						$('.modalHeaderEditAltaHorario').css("background-color", "#5cb85c");
						$('#feedbackTextHeader').html("Correcto!");
						$('#feedbackTextBody').html("El Horario fué actualizado correctamente! :)");
						$('#modalEditAltaHorario').modal('show');
					}, 100);
					setTimeout(function(){
						$('#modalEditAltaHorario').modal('hide');
					}, 2000);
					setTimeout(function(){
						searchHorarioView();
					}, 2300);
				}
			}
		});
	}
});
//FIN FUNCION PARA ACTUALIZAR DATOS DEL PROFESOR

//FUNCION PARA ELIMINAR Alta horario
function eliminarAltaHorario(idHorario){
	console.log("elimina " +idHorario);
	$.ajax({
		type:'POST',
		url: 'controller/ControladorGestionarHorario.php',
		data:{
			typeQuery: "eliminar",
			idHorarioM: idHorario
		},
		success:function(data){
			setTimeout(function(){
				$('#searchaltaHorario').val("");
				$('.datosAltaHorario').hide();
			}, 1000);
		}
	});
}