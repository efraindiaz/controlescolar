//traer vista para asignar profesores
$(document).on('click','.asignarProfesores',function(){
	$.ajax({
		type: 'POST',
		url: 'view/asignarProfesores.php',
		success:function(data){
			$('#render').html(data);
			profesores();
			carreras();
		}
	});
});

//FUNCION PARA TRAER PROFESORES A LA VISTA PROFESORES
function profesores(){
	$.ajax({
		type: 'POST',
		dataType: 'JSON',
		data:{
			typeQuery: "selectProfesor"
		},
		url: 'controller/ControladorGestionarGrupo.php',
		success:function(data){
			var profesores = data.length;
			for (var i = 0; i < profesores; i++) {
				$('select.profesor').append('<option value="'+data[i].id_profesor+'">'+data[i].nombres+' '+data[i].apellido_materno+' '+data[i].apellido_paterno+'</option>');
			}
		}
	});
}

//FUNCION PARA TRAER LAS CARRERAS A LA VISTA PROFESORES
function carreras(){
	$.ajax({
		type: 'POST',
		dataType: 'JSON',
		data:{
			typeQuery: "selectCarreras"
		},
		url: 'controller/ControladorGestionarGrupo.php',
		success:function(data){
			var carreras = data.length;
			for (var i = 0; i < carreras; i++) {
				$('select.carrera').append('<option value="'+data[i].id_carrera+'">'+data[i].nombre+'</option>');
			}
		}
	});
}

//FUNCION PARA TRAER LOS Grupos A LA VISTA PROFESORESs
$(document).on('change', '.carrera', function(){
	$('.grupo').empty();
	$('.grupo').append('<option selected="" disabled value="0">Selecciona un grupo</option>');
	grupo();
});


function grupo(){
	var idCarrera = $('.carrera').val();

	$.ajax({
		type: 'POST',
		dataType: 'JSON',
		data:{
			typeQuery: "selectGrupo",
			idCarrera: idCarrera
		},
		url: 'controller/ControladorGestionarGrupo.php',
		success:function(data){
			var carreras = data.length;
			for (var i = 0; i < carreras; i++) {
				$('select.grupo').append('<option value="'+data[i].id_grupo+'">'+data[i].nombre_grupo+'</option>');
			}
		}
	});
}

//INSEERTAR DATOS PARA ASIGNAR PROFESOR
$(document).on('click','#btnAsignarProfesor', function(){
	console.log("asignar profesores");
	var formAsignarProfesor = $('.formAsignarProfesor').serialize();
	var idCarrera = $('.carrera').val();
	
	var vacio = validateFormAsignarProf();
	console.log(vacio);
	if (vacio == true) {
		emptyInputs();
	}else{
		$.ajax({
			type: 'POST',
			data: formAsignarProfesor,
			url: 'controller/ControladorGestionarGrupo.php',
			success:function(data){
				console.log(data);
				if (data == 'OK') {
					setTimeout(function(){
						$('.modalHeaderAsignarProfesor').css("background-color", "#5cb85c");
						$('#feedbackTextHeader').html("Correcto!");
						$('#feedbackTextBody').html("Se Asigno el profesor correctamente! :)");
						$('#modalProfesorAsignado').modal('show');
					}, 100);
					setTimeout(function(){
						$('#modalProfesorAsignado').modal('hide');
					}, 2000);
					
						clearForm();
				}
			}
		});
	}
});


//LIMPIAR FORMULARIO ASIGNAR PROFESORES
function clearForm(){
	$('.carrera > option[value=0]').removeAttr('selected');
	$('.carrera > option[value=0]').attr('selected', 'selected');
	$('.grupo > option[value=0]').removeAttr('selected');
	$('.grupo > option[value=0]').attr('selected', 'selected');
	$('.profesor > option[value=0]').removeAttr('selected');
	$('.profesor > option[value=0]').attr('selected', 'selected');
}

//VALIDAR QUE LOS SELECT TENGAN UNA OPCION VALIDA
function validateFormAsignarProf(){
	var ca = $('.carrera').val();
	var gr = $('.grupo').val();
	var pro = $('.profesor').val();
	var res = false;

	if (ca == 0 || ca == null || gr == 0 || gr == null || pro == 0 || pro == null) {
		res = true;
	}

	return res;
}

//ALERTA PARA ERRORES DE VALIDACION
function emptyInputs(){
	$('#feedbackAlertAsignarProfesores').hide();
	setTimeout(function(){
		$('#feedbackAlertAsignarProfesores').show();
	}, 100);
	setTimeout(function(){
		$('#feedbackAlertAsignarProfesores').hide();
	}, 1500);
}


