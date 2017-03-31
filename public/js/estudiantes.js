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
$(document).on('click','.editEstudiante',function(e){
	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'view/searchEstudiante.php',
		success: function(data){
			console.log("Editar Estudiante");
			if (data!="") {
				$('#render').html(data);
			}
		}
	})
});

//INICIA FUNCION AUTOSUGGEST PARA BUSCAR Y TRAER LA INFORMACION DE LOS Estudiantes
$(document).on('keyup','#Estudiantes',function(e){
	console.log("Buscando Estudiantes");
	e.preventDefault();
	var typeQuery = $('.typeQuery').val();
	var nombre = $('#Estudiantes').val();
	var data = {
			typeQuery: typeQuery,
			nombre: nombre
		}
	if (nombre == "") {
		$('.emptyEstudiantes').remove();
		$('.datosEstudiantes').hide();
	}else{
		$.ajax({
			type: 'POST',
			url: 'controller/ControladorEstudiante.php',
			data: data,
			success: function(data){
				console.log(data);
				$('.datosEstudiantes').hide();
				$('.emptyEstudiantes').remove();
				$('.tableEstudiantes tbody').empty();
				var dataJSon = eval(data);
				console.log(dataJSon.length);
				if (dataJSon == 0) {
					$('#render').append('<p class="bg-warning emptyEstudiantes">Sin Resultados</p>');
				}else{
					$('.datosEstudiantes').show();
					for (var i in dataJSon) {
						$('.tableEstudiantes tbody').append('<tr><td>'+dataJSon[i].matricula+'</td><td>'+dataJSon[i].nombres+'</td><td class="acciones"><a onclick="editarAlumno('+dataJSon[i].id_alumno+')"><span class="glyphicon glyphicon-edit edit" aria-hidden="true"></span></a><a onclick="eliminarAlumno('+dataJSon[i].id_alumno+')"><span class="glyphicon glyphicon-trash delete" aria-hidden="true"></span></a></td></tr>');
					}
				}
			}
		});
	}
});
//FIN FUNCION AUTOSUGGEST PARA BUSCAR Y TRAER LA INFORMACION DE LOS Estudiantes

//FUNCION PARA MOSTRAR LA VISTA PARA EDITAR UN Alumno
function editarAlumno(idAlumno){
	console.log("editar " +idAlumno);
	$.ajax({
		type: 'POST',
		url: 'view/editEstudiante.php',
		success: function(data){
			if (data!="") {
				$('#render').html(data);
				$.ajax({
					type: 'POST',
					url: 'controller/ControladorEstudiante.php',
					data:{
						typeQuery: "select"
					},
					success:function(data){
						var typeQuery = "editar";
						var data = {
							typeQuery: typeQuery,
							idAlumno: idAlumno
						}

						$.ajax({
							type: 'POST',
							url: 'controller/ControladorEstudiante.php',
							data:data,
							success:function(data){
								var dataP = eval(data);
								$('.idAlumno').val(dataP[0].id_alumno);
								$('.img_perfil').val(dataP[0].img_perfil);
								$('.fechaN').val(dataP[0].fecha_de_nacimiento);
								$('.claveC').val(dataP[0].clave_curp);
								$('.estadoN').val(dataP[0].estado_nacimiento);
								$('.municipio').val(dataP[0].municipio);
								$('.estadoC').val(dataP[0].estado_civil);
								$('.calle').val(dataP[0].calle);
								$('.numeroE').val(dataP[0].numero_externo);
								$('.numeroI').val(dataP[0].numero_interno);
								$('.colonia').val(dataP[0].colonia);
								$('.cp').val(dataP[0].cp);
								$('.ciudadAc').val(dataP[0].ciudad_actual);
								$('.telefonoCe').val(dataP[0].telefono_celular);
								$('.telefonoCa').val(dataP[0].telefono_casa);
								$('.correo').val(dataP[0].correo_electronico);
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
$(document).on('click', '#btnEditarEstudiante', function(e){
	var datos = $('.formEditEstudiante').serialize();

	e.preventDefault();
	$.ajax({
		type: 'POST',
		url: 'controller/ControladorEstudiante.php',
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