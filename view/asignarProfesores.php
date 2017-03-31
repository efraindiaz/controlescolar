<?php

$asinarProfesor =
'<div class="row">
		<h1 class="text-center">Asignar Profesores</h1>
		<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
		<hr>
		<div class="form-group">
			<div class="alert alert-danger" id="feedbackAlertAsignarProfesores" role="alert" style="display:none;">
				Verifique sus datos por favor!
			</div>
		</div>
		<form class="formAsignarProfesor" method="post">
			<input type="hidden" name="typeQuery" class="typeQuery" value="insertAsignarProfesor">
			<div class="form-group">
				<label for="carrera">Carrera</label>
				<select class="carrera form-control" name="carrera">
					<option selected="" disabled value="0">Selecciona una carrera</option>
				</select>
			</div>
			<div class="form-group">
				<label for="grupo">Grupo</label>
				<select class="grupo form-control" name="grupo">
					<option selected="" disabled value="0">Selecciona un grupo</option>
				</select>
			</div>
			<div class="form-group">
				<label for="profesor">Profesor</label>
				<select class="profesor form-control" name="profesor">
					<option selected="" disabled value="0">Selecciona un profesor</option>
				</select>
			</div>
			<hr>
			<div class="col-md-12" style="margin-top: 15px;">
				<div class="actions pull-right">	
					<input type="button" class="btn btn-primary" id="btnAsignarProfesor" value="Guardar">
				</div>
			</div>
		</form>
		</div>
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id="modalProfesorAsignado" data-element="" data-keyboard="false" data-backdrop="static">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header modalHeaderAsignarProfesor">
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

echo $asinarProfesor;

?>

