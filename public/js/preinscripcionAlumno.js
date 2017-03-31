//limpiar formulario de la preinscripcion
function clearFormPreinscripcion(){
	$('.nombreA').val("");
	$('.apellidoP').val("");
	$('.apellidoM').val("");
	$('.curp').val("");
	$('.tel-cel').val("");
	$('.email').val("");
	$('.promedio').val("");
	$('.carreras > option[value=0]').removeAttr('selected');
	$('.carreras > option[value=0]').attr('selected', 'selected');
}

//VALIDAR CAMPOS VACIOS PARA LA PREINSCRIPCION
function validateProfesor(){
	var name = $('.nombreA').val("");
	var ap = $('.apellidoP').val("");
	var am = $('.apellidoM').val("");
	var curp = $('.curp').val("");
	var tl = $('.tel-cel').val("");
	var mail = $('.email').val("");
	var prom =  $('.promedio').val("");
	var carre = $('.carreras').val();
	var res = false;
	
	if (name = "" || ap == "" || am == "" || curp == "" || tl == "" || mail == "" || prom == "" || carre == 0 || carre == null) {
		res = true;
	}

	return res;
}

//Va
//mostrar vista de la preinscripcion
$(document).on('click', '.preinscripcionAlumno', function(e){
	console.log("preinscripcion");
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'view/preinscripcion_Alumno.php',
		success: function(data){
			console.log("Alta preinscripción Alumno");
			if (data!="") {
				$('#render').html(data);
				$.ajax({
					type:'POST',
					url:  'controller/ControladorPreinscripcionAlumno.php',
					data:{
						typeQuery: "selectCarreras"
					},
					success:function(data){
						var dataJSon = eval(data);
						for (var i in dataJSon) {
							$('.carreras').append('<option value="'+dataJSon[i].id_carrera+'">'+dataJSon[i].nombre+'</option>');
						}
					}
				});
			}
		}
	});
});


//insertar preinscripcion del alumno
$(document).on('click', '#btnAceptarPreinscripcion', function(e){
	var datos = $('.formPreinscripcionAlumno').serialize();
	
	var insert = validateProfesor();

	if (insert == true) {
		$('#feedbackAlertPreinscripcion').hide();
		setTimeout(function(){
			$('#feedbackAlertPreinscripcion').show();
		}, 100);
		setTimeout(function(){
			$('#feedbackAlertPreinscripcion').hide();
		}, 1500);
	}else{
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: 'controller/ControladorPreinscripcionAlumno.php',
			data: datos,
			success: function(data){
				console.log(data);
				if (data == 'OK') {
					setTimeout(function(){
						$('.modalHeaderPreinscripcion').css("background-color", "#5cb85c");
						$('#feedbackTextHeader').html("Correcto!");
						$('#feedbackTextBody').html("La preinscripción fue realizada correctamente! :)");
						$('#modalPreinscripcionCreado').modal('show');
					}, 100);
					setTimeout(function(){
						$('#modalPreinscripcionCreado').modal('hide');
					}, 2000);
					clearFormPreinscripcion();
				}else if (data == 'error') {
					setTimeout(function(){
						$('.modalHeaderProfesor').css("background-color", "red");
						$('#feedbackTextHeader').html("Incorrecto!");
						$('#feedbackTextBody').html("Ha ocurrido algun problema, por favor intentelo de nuevo! :(");
						$('#modalPreinscripcionCreado').modal('show');
					}, 100);
					setTimeout(function(){
						$('#modalPreinscripcionCreado').modal('hide');
					}, 2000);
				}
			}
		});
	}	
});