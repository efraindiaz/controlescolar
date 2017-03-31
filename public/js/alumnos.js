/*BEGIN FUNCTION TO Alumno*/
//desplega la vista formulario Alumno
//Controlador desarrollado por Aguayo Gonzalez Carlos Arturo

var idAlum = ""; //id del Alumno

$(document).on('click','.newAlumno', function(e){
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'view/newAlumno.php',
		success: function(data){
			console.log("Agregar Alumno");
			if (data!="") {
				$('#render').html(data);
				$.ajax({
					type: 'POST',
					url: 'controller/ControladorAlumno.php',
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

//ajax para agregar un nuevo Alumno a la base de datos
$(document).on('click', '#btnAceptarNewAlumno', function(e){
	var datos = $('.formAlumno').serialize();

	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'controller/ControladorAlumno.php',
		data: datos,
		success: function(data){
			console.log(data);
			if (data = 'OK') {
				setTimeout(function(){
					$('.modalHeaderAlumno').css("background-color", "#6FDE76");
					$('#feedbackTextHeader').html("Correcto!");
					$('#feedbackTextBody').html("El Alumno fué ingresado correctamente! :)");
					$('#modalAlumnoCreado').modal('show');
				}, 100);
				setTimeout(function(){
					$('#modalAlumnoCreado').modal('hide');
				}, 2000);
			}
		}
	});
});

//despliega la vista formulario editar Alumno
$(document).on('click','.editAlumno',function(e){
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'view/searchAlumno.php',
		success: function(data){
			console.log("Editar Alumno");
			if (data!="") {
				$('#render').html(data);
			}
		}
	})
});

//INICIA FUNCION AUTOSUGGEST PARA BUSCAR Y TRAER LA INFORMACION DE LOS Alumnos
$(document).on('keyup','#Alumnos',function(e){
	console.log("Buscando Alumnos");
	e.preventDefault();
	var typeQuery = $('.typeQuery').val();
	var nombre = $('#Alumnos').val();
	var data = {
			typeQuery: typeQuery,
			nombre: nombre
		}
	if (nombre == "") {
		$('.emptyAlumnos').remove();
		$('.datosAlumnos').hide();
	}else{
		$.ajax({
			type: 'POST',
			url: 'controller/ControladorAlumno.php',
			data: data,
			success: function(data){
				console.log("Mostrando Alumnos");
				$('.datosAlumnos').hide();
				$('.emptyAlumnos').remove();
				$('.tableAlumnos tbody').empty();
				var dataJSon = eval(data);
				console.log(dataJSon.length);
				if (dataJSon == 0) {
					$('#render').append('<p class="bg-warning emptyAlumnos">Sin Resultados</p>');
				}else{
					$('.datosAlumnos').show();
					for (var i in dataJSon) {
						$('.tableAlumnos tbody').append('<tr><td>'+dataJSon[i].matricula+'</td><td>'+dataJSon[i].nombres+'</td><td class="acciones"><a onclick="editarAlumno('+dataJSon[i].id_alumno+')"><span class="glyphicon glyphicon-edit edit" aria-hidden="true"></span></a><a onclick="eliminarAlumno('+dataJSon[i].id_alumno+')"><span class="glyphicon glyphicon-trash delete" aria-hidden="true"></span></a></td></tr>');
					}
				}
			}
		});
	}
});
//FIN FUNCION AUTOSUGGEST PARA BUSCAR Y TRAER LA INFORMACION DE LOS Alumnos

//FUNCION PARA MOSTRAR LA VISTA PARA EDITAR UN Alumno
function editarAlumno(idAlumno){
	console.log("editar " +idAlumno);
	$.ajax({
		type: 'POST',
		url: 'view/editAlumno.php',
		success: function(data){
			if (data!="") {
				$('#render').html(data);
				$.ajax({
					type: 'POST',
					url: 'controller/ControladorAlumno.php',
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
							idAlumno: idAlumno
						}

						$.ajax({
							type: 'POST',
							url: 'controller/ControladorAlumno.php',
							data:data,
							success:function(data){
								var dataP = eval(data);
								$('.idAlumno').val(dataP[0].id_alumno);
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
//FIN FUNCION PARA MOSTRAR LA VISTA PARA EDITAR UN Alumno

//FUNCION PARA ACTUALIZAR DATOS DEL Alumno
$(document).on('click', '#btnEditarAlumno', function(e){
	var datos = $('.formEditAlumno').serialize();

	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'controller/ControladorAlumno.php',
		data: datos,
		success: function(data){
			console.log(data);
		}
	});
});
//FIN FUNCION PARA ACTUALIZAR DATOS DEL Alumno

//FUNCION PARA ELIMINAR A UN Alumno
function eliminarAlumno(idAlumno){
	console.log("elimina " +idAlumno);
}
//FIN UNCION PARA ELIMINAR A  UN Alumno

/*END FUNCTION TO Alumno*/

/*BEGIN FUNCTION FOR PREINSCRIPCION*/

/*END FUNCTION FOR PREINSCRIPCION*/

/*BEGIN FUNCTION FOR PREINSCRIPCION*/
/*$(document).on('click','.preinscripcionAlumno',function(){
	$.ajax({
		type: 'POST',
		url: 'view/editAlumno.php',
		success: function(data){
			if (data!="") {
				$('#render').html(data);
			}
		}
	})
});*/
/*END FUNCTION FOR PREINSCRIPCION*/