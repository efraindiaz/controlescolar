
$(function(){

	//EVENTOS
	
	$('#formulario').click(function(){
		
		buscarFormulario();
		//alert("hola mundo")
	});

	$('#busqueda').click(function(){
		campoBusqueda();
	});

	$('#inputRTB').keyup(function(){

		//var clave = $('#inputRTB').val();

		alert("hola")

	});

	
	//RENDER
	function buscarFormulario(){

		$.ajax({
			type:'POST',
			url: 'view/form-test.php',
			data: null,
			success: function(resp){
				if(resp!=""){					
					$('#render').html(resp);
				}
			}
		});
	}

	function campoBusqueda(){

		$.ajax({
			type:'POST',
			url: 'view/campo-busqueda.php',
			data: null,
			success: function(resp){
				if(resp!=""){					
					$('#render').html(resp);
				}
			}
		});

		console.log("busqueda")
	}


	

});

$(function(){

	$('#test').onclick(function(){
		// body...
		alert("alert");
	})


});

function saludo(){
	alert("hola mundo");
}

