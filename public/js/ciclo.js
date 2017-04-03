/*BEGIN FUNCTION TO PROFESOR*/
//desplega la vista formulario ciclo

var idCiclo = ""; //id del ciclo

$(document).on('click','.newCiclo', function(e){
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'view/newCiclo.php',
		success: function(data){
			console.log("Agregar Ciclo");
			if (data!="") {
				$('#render').html(data);
				$.ajax({
					type: 'POST',
					url: 'controller/ControladorCiclo.php',
					data:{
						typeQuery: "select"
					},
					success:function(data){
						var dataJSon = eval(data);
						for (var i in dataJSon) {
							$('.estado').append('<option value="'+dataJSon[i].id_ciclo+'">'+dataJSon[i].estado+'</option>')
						}
					}
				});
			}
		}
	});
});

//ajax para agregar un nuevo profesor a la base de datos
$(document).on('click', '#btnAceptarNewCiclo', function(e){
	var datos = $('.formCiclo').serialize();

	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'controller/ControladorCiclo.php',
		data: datos,
		success: function(data){
			console.log(data);
			if (data = 'OK') {
				setTimeout(function(){
					$('.modalHeaderProfesor').css("background-color", "#6FDE76");
					$('#feedbackTextHeader').html("Correcto!");
					$('#feedbackTextBody').html("El ciclo escolar fue ingresado correctamente!");
					$('#modalProfesorCreado').modal('show');
				}, 100);
				setTimeout(function(){
					$('#modalProfesorCreado').modal('hide');
				}, 2000);
			}
		}
	});
});

//despliega la vista formulario editar ciclo
$(document).on('click','.editCiclo',function(e){
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'view/searchCiclo.php',
		success: function(data){
			console.log("Editar Ciclo");
			if (data!="") {
				$('#render').html(data);
			}
		}
	})
});

//INICIA FUNCION AUTOSUGGEST PARA BUSCAR Y TRAER LA INFORMACION DE LOS PROFESORES
$(document).on('keyup','#Ciclos',function(e){
	console.log("Buscando Ciclos");
	e.preventDefault();
	var typeQuery = $('.typeQuery').val();
	var nombre = $('#Ciclos').val();
	var data = {
			typeQuery: typeQuery,
			estado: nombre
		}
	if (nombre == "") {
		$('.emptyCiclos').remove();
		$('.datosCiclos').hide();
	}else{
		$.ajax({
			type: 'POST',
			url: 'controller/ControladorCiclo.php',
			data: data,
			success: function(data){
				console.log("Mostrando Ciclos");
				$('.datosCiclos').hide();
				$('.emptyCiclos').remove();
				$('.tableCiclos tbody').empty();
				var dataJSon = eval(data);
				console.log(dataJSon.length);
				if (dataJSon == 0) {
					$('#render').append('<p class="bg-warning emptyCiclos">Sin Resultados</p>');
				}else{
					$('.datosCiclos').show();
					for (var i in dataJSon) {
						$('.tableCiclos tbody').append('<tr><td>'+dataJSon[i].id_ciclo+'</td><td>'+dataJSon[i].ciclo_ini+'</td><td>'+dataJSon[i].ciclo_fin+'</td><td>'+dataJSon[i].estado_ciclo+'</td><td class="acciones"><a onclick="editarCiclos('+dataJSon[i].id_ciclo+')"><span class="glyphicon glyphicon-edit edit" aria-hidden="true"></span></a><a onclick="eliminarProfesor('+dataJSon[i].estado_ciclo+')"><span class="glyphicon glyphicon-trash delete" aria-hidden="true"></span></a></td></tr>');
					}
				}
			}
		});
	}
});
//FIN FUNCION AUTOSUGGEST PARA BUSCAR Y TRAER LA INFORMACION DE LOS PROFESORES

//FUNCION PARA MOSTRAR LA VISTA PARA EDITAR UN PROFESOR
function editarCiclos(idCiclo){
	console.log("editar " +idCiclo);
	$.ajax({
		type: 'POST',
		url: 'view/editCiclo.php',
		success: function(data){
			if (data!="") {
				$('#render').html(data);
				// $.ajax({
				// 	type: 'POST',
				// 	url: 'controller/ControladorCiclo.php',
				// 	data:{
				// 		typeQuery: "select"
				// 	},
				// 	success:function(data){
				// 		var dataJSon = eval(data);
						// for (var i in dataJSon) {
						// 	$('.estado').append('<option value="'+dataJSon[i].estado_ciclo+'">'+dataJSon[i].estado+'</option>')
						// }
						var typeQuery = "editar";
						var data = {
							typeQuery: typeQuery,
							idCiclo: idCiclo
						}
						$.ajax({
							type: 'POST',
							url: 'controller/ControladorCiclo.php',
							data:data,
							success:function(data){
								var dataP = eval(data);
								
								$('.idCiclo').val(dataP[0].idCiclo);
								$('.inicio').val(dataP[0].inicio);
								$('.fin').val(dataP[0].fin);
								$('.estado > option[value="'+dataP[0].estado_ciclo+'"]').attr('selected', 'selected');
								console.log(dataP);
							}
						});
					//}
				//});
			}
		}
	});
}
//FIN FUNCION PARA MOSTRAR LA VISTA PARA EDITAR UN PROFESOR

//FUNCION PARA ACTUALIZAR DATOS DEL PROFESOR
$(document).on('click', '#btnEditarProfesor', function(e){
	var datos = $('.formEditProfesor').serialize();

	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'controller/ControladorProfesor.php',
		data: datos,
		success: function(data){
			console.log(data);
			if (data == 'OK') {
					setTimeout(function(){
						$('.modalHeaderProfesor').css("background-color", "#5cb85c");
						$('#feedbackTextHeader').html("Correcto!");
						$('#feedbackTextBody').html("El profesor fué actualizado correctamente! :)");
						$('#modalProfesorEditado').modal('show');
					}, 100);
					setTimeout(function(){
						$('#modalProfesorEditado').modal('hide');
					}, 2000);

					setTimeout(function(){
						searchProfesor();
					}, 2400);
				}
		}
	});
});
//FIN FUNCION PARA ACTUALIZAR DATOS DEL PROFESOR

//FUNCION PARA ELIMINAR A UN PROFESOR
function eliminarProfesor(idProfesor){
	console.log("elimina " +idProfesor);
}