//Estatus de reinscripcion
var statusReinscripcion = "";

//MOSTAR INFORMACION PARA LA REINSCRIPCION
$(document).on('click', '.infoReinscripcion', function(e){
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'view/infoReinscripcion.php',
		success:function(data){
			console.log(statusReinscripcion);
			$('#render').html(data);
		}
	});
});

//MOSTAR VISTA PARA RELAIZAR LA REINSCRIPCION
$(document).on('click', '.Reinscripcion', function(e){
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'view/realizarReinscripcion.php',
		success:function(data){
			if (statusReinscripcion == 'OK') {
				$('#render').html('<div class="alert alert-success" role="alert">Felicidades se ha hecho la Reinscripcion correctamente</div>');	
			}else{
				$('#render').html(data);
				MA();
			}
		}
	});
});

//MOSTRAR NOMBRE,MATRICULA DEL ALUMNO
function MA(){
	var idLogin = $('.idLogin').val();
	var typeQuery = $('.typeQuery').val();

	console.log(idLogin, typeQuery);
	$.ajax({
		type: 'POST',
		dataType: 'JSON',
		url: 'controller/ControladorGestionarReinscripcion.php',
		data:{
			idLogin: idLogin,
			typeQuery: typeQuery
		},
		success:function(data){
			console.log(data.materias.length);
			$('.nombreA').html(data.NMT[0].nombreAlum);
			$('.matricula').html(data.NMT[0].matriculaAlum);
			$('.carrera').html(data.CC[0].nombreCarrera);
			$('.cuatrimestre').html(data.CC[0].nuCuatri);
			$('.turno').html(data.NMT[0].turnoAlum);

			$('select#materia').append('<option value="0" selected="" disabled="">Seleccione una materia</option>');
			for (var i = 0; i < data.materias.length; i++) {
				$('select#materia').append('<option value="'+data.materias[i].idMateria+'">'+data.materias[i].nameMateria+'</option>');
			}
		}
	});
}


//INSERTAR REINSCRIPCION A LA BASE DE DATOS	
$(document).on('click','#btnAceptarReinscripcion', function(){
	var idLogin = $('.idLogin').val();

	var carrera = $('.carrera').html();
	var cuatrimestre = $('.cuatrimestre').html();
	var turno = $('.turno').html();
	var materia1 = $('.materia1').val();
	var materia2 = $('.materia2').val();
	var materia3 = $('.materia3').val();
	var materia4 = $('.materia4').val();
	var materia5 = $('.materia5').val();
	var materia6 = $('.materia6').val();
	var materia7 = $('.materia7').val();
	var materia8 = $('.materia8').val();
	var materia9 = $('.materia9').val();
	if (materia1 == null || materia1==  0 || materia2 == null || materia2==  0 || materia3 == null || materia3==  0 || materia4 == null || materia4==  0 || materia5 == null || materia5==  0 || materia6 == null || materia6==  0 || materia7 == null || materia7==  0 || materia8 == null || materia8==  0 || materia9 == null || materia9==  0)  {
		$('#feedbackAlertAltaReinscripcion').hide();
		setTimeout(function(){
			$('#feedbackAlertAltaReinscripcion').show();
		}, 100);
		setTimeout(function(){
			$('#feedbackAlertAltaReinscripcion').hide();
		}, 1500);
	}else{
		if (statusReinscripcion != "") {
			$('#render').html('<div class="alert alert-success" role="alert">Felicidades se ha hecho la Reinscripcion correctamente</div>');	
		}else{
			$.ajax({
				type: 'POST',
				data:{
					typeQuery: "insert",
					idLogin: idLogin,
					carrera: carrera,
					cuatrimestre: cuatrimestre,
					turno: turno,
					materia1: materia1,
					materia2: materia2,
					materia3: materia3,
					materia4: materia4,
					materia5: materia5,
					materia6: materia6,
					materia7: materia7,
					materia8: materia8,
					materia9: materia9
				},
				url: 'controller/ControladorGestionarReinscripcion.php',
				success:function(data){
					if (data == 'OK') {
						statusReinscripcion = data;
						$('#render').html('<div class="alert alert-success" role="alert">Felicidades se ha hecho la Reinscripcion correctamente</div>');				
					}
				}
			});
		}
	}
});