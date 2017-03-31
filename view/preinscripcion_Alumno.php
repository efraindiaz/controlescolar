<?php

$formPreinscripcionAlumno = 
	'<div class="row">
		<h1 class="text-center">Preinscripción Del Alumno</h1>
		<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
			<hr>
			<form class="formPreinscripcionAlumno" method="post">
				<input type="hidden" name="typeQuery" class="typeQuery" value="insert">
				<div class="form-group">
					<label for="nombreA">Nombre(s)</label>
					<input type="text" name="nombreA" class="form-control nombreA">
				</div>
				<div class="form-group">
					<label for="apellidoP">Apellido Paterno</label>
					<input type="text" name="apellidoP" class="form-control apellidoP">
				</div>
				<div class="form-group">
					<label for="apellidoM">Apellido Materno</label>
					<input type="text" name="apellidoM" class="form-control apellidoM">
				</div>
				<div class="form-group">
					<label for="curp">CURP</label>
					<input type="text" name="curp" class="form-control curp">
				</div>
				<div class="form-group">
					<label for="tel-cel">Telefono - Celular</label>
					<input type="text" name="tel-cel" class="form-control tel-cel">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" placeholder="Ingrese Correo Electronico" class="form-control email">
				</div>
				<div class="form-group">
					<label for="carreras">Carrera a cursar</label>
					<select name="carreras" class="carreras form-control">
						<option selected="" value="0" disabled>Seleccione carrera</option>
					</select>
				</div>
				<div class="form-group">
					<label for="promedio">Promedio Escolar</label>
					<input type="text" name="promedio" class="form-control promedio">
				</div>
			
				<hr>
				<div class="form-group">
					<div class="alert alert-danger" id="feedbackAlertPreinscripcion" role="alert" style="display:none;">
						Verifique sus datos por favor!
					</div>
				</div>
				<div class="col-md-12" style="margin-top: 15px;">
					<div class="actions pull-right">	
						<input type="button" class="btn btn-success" id="btnAceptarPreinscripcion" value="Aceptar">
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id="modalPreinscripcionCreado" data-element="" data-keyboard="false" data-backdrop="static">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header modalHeaderPreinscripcion">
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

echo $formPreinscripcionAlumno;

?>
