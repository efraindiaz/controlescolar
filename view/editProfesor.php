<?php

$formEditProfesor = 
	'<div class="row">
		<h1 class="text-center">Actualizar Profesor</h1>
		<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
		<hr>
		<div class="alert alert-danger col-md-6 col-md-offset-3" id="feedbackAlertProfesor" role="alert" style="display:none;">
		Verifique sus datos por favor!
		</div>
		<form class="formEditProfesor" method="post">
			<input type="hidden" name="typeQuery" class="typeQuery" value="update">
			<input type="hidden" name="idProfesor" class="idProfesor">
			<div class="form-group">
				<label for="nivel">Seleccione un nivel de usuario</label>
				<select class="nivel form-control" name="nivel">
					<option selected="" disabled value="0">Selecciona Nivel Del Profesor</option>
				</select>
			</div>
			<div class="form-group">
				<label for="matricula">Matricula</label>
				<input type="text" name="matricula" class="form-control matricula">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre(s)</label>
				<input type="text" name="nombre" class="form-control nombre">
			</div>
			<div class="form-group">
				<label for="apellidoM">Apellido Materno</label>
				<input type="text" name="apellidoM"  class="form-control apellidoM">
			</div>
			<div class="form-group">
				<label for="apellidoP">Apellido Paterno</label>
				<input type="text" name="apellidoP" class="form-control apellidoP">
			</div>
			<div class="form-group">
				<label for="contraseña">Contraseña</label>
				<input type="password" name="contraseña"  class="form-control contraseña">
			</div>
			<hr>
			<div class="col-md-12" style="margin-top: 15px;">
				<div class="actions pull-right">	
					<input type="button" class="btn btn-success" id="btnEditarProfesor" value="Actualizar">
				</div>
			</div>
		</form>
		</div>
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id="modalProfesorEditado" data-element="" data-keyboard="false" data-backdrop="static">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header modalHeaderProfesor">
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

echo $formEditProfesor;
?>