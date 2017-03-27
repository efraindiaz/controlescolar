
//DESPLEGAR VISTA DEL FORMULARIO PRUEBA
$(document).on('click', '#prueba', function(){
	console.log("boton prueba");

	$.ajax({
		type: 'POST',
		url: 'view/prueba.php',
		success:function(data){
			console.log(data);
			$('#render').html(data);
		}
	});
});

//AJAX PARA CREAR UN NOMBRE USUARIO

$(document).on('click', '#enviarPrueba', function(e){
	e.preventDefault();

	var data = $('.formPruebas').serialize();
	
	$.ajax({
		type: 'POST',
		url: 'controller/ControladorPrueba.php',
		data: data,
		success:function(data){
			console.log(data);
		}
	});
});