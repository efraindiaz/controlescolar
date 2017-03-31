<?php

$formNewAlumno =
	'<div class="row">
		<h1 class="text-center">Nuevo Alumno</h1>
		<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
		<hr>
		<form class="formAlumno" method="post">
			<input type="hidden" name="typeQuery" class="typeQuery" value="insert">
			<div class="form-group">
				<label for="nivel">Seleccione un nivel de usuario</label>
				<select class="nivel form-control" name="nivel">
				</select>
			</div>
			<div class="form-group">
				<label for="matricula">Matricula</label>
				<input type="text" name="matricula" placeholder="Ingrese Matricula" class="form-control matricula">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre(s)</label>
				<input type="text" name="nombre" placeholder="Ingrese su nombre" class="form-control nombre">
			</div>
			<div class="form-group">
				<label for="apellidoM">Apellido Materno</label>
				<input type="text" name="apellidoM" placeholder="Ingrese Apellido Materno" class="form-control apellidoM">
			</div>
			<div class="form-group">
				<label for="apellidoP">Apellido Paterno</label>
				<input type="text" name="apellidoP" placeholder="Ingrese Apellido Paterno" class="form-control apellidoP">
			</div>
			<div class="form-group">
				<label for="contraseña">Contraseña</label>
				<input type="text" name="contraseña" placeholder="Ingrese contraseña" class="form-control contraseña">
			</div>
			<hr>
			<div class="col-md-12" style="margin-top: 15px;">
				<div class="actions pull-right">	
					<input type="button" class="btn btn-success" id="btnAceptarNewAlumno" value="Aceptar">
				</div>
			</div>
		</form>
		</div>
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id="modalAlumnoCreado" data-element="" data-keyboard="false" data-backdrop="static">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header modalHeaderAlumno">
	        <h4 class="modal-title text-center" id="feedbackTextHeader" style="color: white;"></h4>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
		     	<p class="text-center" id="feedbackTextBody"></p>
	      	</div>
	      </div>
	    </div>
	  </div>
	</div>';

print($formNewAlumno);

?>
