/*BEGIN FUNCTION TO PROFESOR*/
//desplega la vista formulario profesor

var idProf = ""; //id del profesor

$(document).on('click','.newProfesor', function(e){
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'view/newProfesor.php',
		success: function(data){
			console.log("Agregar Profesor");
			if (data!="") {
				$('#render').html(data);
				$.ajax({
					type: 'POST',
					url: 'controller/ControladorProfesor.php',
					data:{
						typeQuery: "select"
					},
					success:function(data){
						var dataJSon = eval(data);
						for (var i in dataJSon) {
							$('.nivel').append('<option value="'+dataJSon[i].id_nivel+'">'+dataJSon[i].nivel+'</option>')
						}
					}
				});
			}
		}
	});
});

//ajax para agregar un nuevo profesor a la base de datos
$(document).on('click', '#btnAceptarNewProfesor', function(e){
	var datos = $('.formProfesor').serialize();

	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'controller/ControladorProfesor.php',
		data: datos,
		success: function(data){
			console.log(data);
			if (data = 'OK') {
				setTimeout(function(){
					$('.modalHeaderProfesor').css("background-color", "#6FDE76");
					$('#feedbackTextHeader').html("Correcto!");
					$('#feedbackTextBody').html("El profesor fué ingresado correctamente! :)");
					$('#modalProfesorCreado').modal('show');
				}, 100);
				setTimeout(function(){
					$('#modalProfesorCreado').modal('hide');
				}, 2000);
			}
		}
	});
});

//despliega la vista formulario editar profesor
$(document).on('click','.editProfesor',function(e){
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'view/searchProfesor.php',
		success: function(data){
			console.log("Editar Profesor");
			if (data!="") {
				$('#render').html(data);
			}
		}
	})
});

//INICIA FUNCION AUTOSUGGEST PARA BUSCAR Y TRAER LA INFORMACION DE LOS PROFESORES
$(document).on('keyup','#Profesores',function(e){
	console.log("Buscando Profesores");
	e.preventDefault();
	var typeQuery = $('.typeQuery').val();
	var nombre = $('#Profesores').val();
	var data = {
			typeQuery: typeQuery,
			nombre: nombre
		}
	if (nombre == "") {
		$('.emptyProfesores').remove();
		$('.datosProfesores').hide();
	}else{
		$.ajax({
			type: 'POST',
			url: 'controller/ControladorProfesor.php',
			data: data,
			success: function(data){
				console.log("Mostrando Porfesores");
				$('.datosProfesores').hide();
				$('.emptyProfesores').remove();
				$('.tableProfesores tbody').empty();
				var dataJSon = eval(data);
				console.log(dataJSon.length);
				if (dataJSon == 0) {
					$('#render').append('<p class="bg-warning emptyProfesores">Sin Resultados</p>');
				}else{
					$('.datosProfesores').show();
					for (var i in dataJSon) {
						$('.tableProfesores tbody').append('<tr><td>'+dataJSon[i].matricula+'</td><td>'+dataJSon[i].nombres+'</td><td class="acciones"><a onclick="editarProfesor('+dataJSon[i].id_profesor+')"><span class="glyphicon glyphicon-edit edit" aria-hidden="true"></span></a><a onclick="eliminarProfesor('+dataJSon[i].id_profesor+')"><span class="glyphicon glyphicon-trash delete" aria-hidden="true"></span></a></td></tr>');
					}
				}
			}
		});
	}
});
//FIN FUNCION AUTOSUGGEST PARA BUSCAR Y TRAER LA INFORMACION DE LOS PROFESORES

//FUNCION PARA MOSTRAR LA VISTA PARA EDITAR UN PROFESOR
function editarProfesor(idProfesor){
	console.log("editar " +idProfesor);
	$.ajax({
		type: 'POST',
		url: 'view/editProfesor.php',
		success: function(data){
			if (data!="") {
				$('#render').html(data);
				$.ajax({
					type: 'POST',
					url: 'controller/ControladorProfesor.php',
					data:{
						typeQuery: "select"
					},
					success:function(data){
						var dataJSon = eval(data);
						for (var i in dataJSon) {
							$('.nivel').append('<option value="'+dataJSon[i].id_nivel+'">'+dataJSon[i].nivel+'</option>')
						}
						var typeQuery = "editar";
						var data = {
							typeQuery: typeQuery,
							idProfesor: idProfesor
						}

						$.ajax({
							type: 'POST',
							url: 'controller/ControladorProfesor.php',
							data:data,
							success:function(data){
								var dataP = eval(data);
								$('.idProfesor').val(dataP[0].id_profesor);
								$('.matricula').val(dataP[0].matricula);
								$('.nombre').val(dataP[0].nombres);
								$('.apellidoM').val(dataP[0].apellido_materno);
								$('.apellidoP').val(dataP[0].apellido_paterno);
								$('.contraseña').val(dataP[0].contraseña);
								$('.nivel > option[value="'+dataP[0].id_nivel_sistema+'"]').attr('selected', 'selected');
							}
						});
					}
				});
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
		}
	});
});
//FIN FUNCION PARA ACTUALIZAR DATOS DEL PROFESOR

//FUNCION PARA ELIMINAR A UN PROFESOR
function eliminarProfesor(idProfesor){
	console.log("elimina " +idProfesor);
}
//FIN UNCION PARA ELIMINAR A  UN PROFESOR

/*END FUNCTION TO PROFESOR*/

/*BEGIN FUNCTION FOR PREINSCRIPCION*/

/*END FUNCTION FOR PREINSCRIPCION*/

/*BEGIN FUNCTION FOR PREINSCRIPCION*/
/*$(document).on('click','.preinscripcionAlumno',function(){
	$.ajax({
		type: 'POST',
		url: 'view/editProfesor.php',
		success: function(data){
			if (data!="") {
				$('#render').html(data);
			}
		}
	})
});*/
/*END FUNCTION FOR PREINSCRIPCION*/