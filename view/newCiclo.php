<?php

$formNewCiclo =

'<div class="row">
	<h1 class="text-center">Registrar Ciclo Escolar</h1>

	<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
		<form class="formCiclo" method="post">
		<input type="hidden" name="typeQuery" class="typeQuery" value="insert">
		<hr>

			<table class="form-group">
				<div class="form-group">
					<label>Inicio del ciclo:</label>
					<input type="date" name="inicio" class="form-control inicio">
				</div>

				<div class="form-group">
					<label>Fin del ciclo:</label>
					<input type="date" name="fin" class="form-control fin">
				</div class="form-group">

				<label for="estado">Estado del ciclo</label>
					<select name="estado" class="estado form-control">
							<option value="limpio"></option>
							<option value="0">Inactivo</option>
							<option value="1">Activo</option>
					</select>
					
			<div class="col-md-12" style="margin-top: 15px;">
				<div class="actions pull-right">
					<input type="submit" value="Guardar Ciclo" class="btn btn-success" id="btnAceptarNewCiclo">
				</div class="form-group">
			</div>
			</table>
		<hr>
		</form>
		</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalProfesorCreado" data-element="" data-keyboard="false" data-backdrop="static">
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

print ($formNewCiclo);
 ?>