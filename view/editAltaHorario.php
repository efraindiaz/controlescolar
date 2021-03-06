<?php

$altaHorario =
'<div class="row">
		<h1 class="text-center">Editar Alta Horario</h1>
		<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
		<hr>
		<div class="form-group">
			<div class="alert alert-danger" id="feedbackAlertEditAltaHorario" role="alert" style="display:none;">
				Verifique sus datos por favor!
			</div>
		</div>
		<form class="formEditAltaHorario" method="post">
			<input type="hidden" name="typeQuery" class="typeQuery" value="EditarAltaHorario">
			<input type="hidden" name="idHorarioMateria" class="idHorarioMateria">
			<div class="form-group">
				<label for="horario">Horario</label>
				<select class="horario form-control" name="horario">
					<option selected="" disabled value="0">Selecciona Horario</option>
				</select>
			</div>
			<div class="form-group">
				<label for="grupo">Materia</label>
				<select class="materia form-control" name="materia">
					<option selected="" disabled value="0">Selecciona Materia</option>
				</select>
			</div>
			<div class="form-group">
				<label for="dia">Dias</label>
				<select class="dia form-control" name="dia">
					<option selected="" disabled value="0">Selecciona Dia</option>
				</select>
			</div>
			<div class="form-group">
				<label for="horaI">Hora Inicia</label>
				<input type="time" name="horaI" step="1" class="horaI form-control">
			</div>
			<div class="form-group">
				<label for="horaF">Hora Inicia</label>
				<input type="time" name="horaF" step="1" class="horaF form-control">
			</div>
			<hr>
			<div class="col-md-12" style="margin-top: 15px;">
				<div class="actions pull-right">	
					<input type="button" class="btn btn-primary" id="btnEditarAltaHorario" value="Guardar">
				</div>
			</div>
		</form>
		</div>
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id="modalEditAltaHorario" data-element="" data-keyboard="false" data-backdrop="static">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header modalHeaderEditAltaHorario">
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

echo $altaHorario;
?>

