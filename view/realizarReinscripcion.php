<?php

$realizarReinscripcion = 
'<div class="row">
	<input type="hidden" name="typeQuery" class="typeQuery" value="infoAlumno">
	<h2 class="text-center">Realizar Reinscripción</h2>
	<div class="col-lg-6 col-md-8 col-lg-offset-3 col-md-offset-2">
		<hr>
		<div class="form-group">
			<label class="control-label">Nombre Del Alumno: </label>
			<p class="form-control-static nombreA" style="display: inline;">N</p>		
		</div>
		<div class="form-group">
			<label class="control-label">Matricula: </label>
			<p class="form-control-static matricula" style="display: inline;">N</p>		
		</div>
		<div class="form-group">
			<label class="control-label">Carrera: </label>
			<p class="form-control-static carrera" style="display: inline;">C</p>		
		</div>
		<div class="form-group">
			<label class="control-label">Cuatrimestre: </label>
			<p class="form-control-static cuatrimestre" style="display: inline;">CE</p>		
		</div>
		<div class="form-group">
			<label class="control-label">Turno: </label>
			<p class="form-control-static turno" style="display: inline;">T</p>		
		</div>
		<div class="form-group">
			<form class="form-inline">
			  	<label for="materia1">Materia 1: </label>
				<select name="materia1" id="materia" class="materia1 form-control"></select>
			</form>
		</div>
		<div class="form-group">
			<form class="form-inline">
			  	<label for="materia2">Materia 2: </label>
				<select name="materia2" id="materia" class="materia2 form-control"></select>
			</form>
		</div>
		<div class="form-group">
			<form class="form-inline">
			  	<label for="materia3">Materia 3: </label>
				<select name="materia3" id="materia" class="materia3 form-control"></select>	
			</form>
		</div>
		<div class="form-group">
			<form class="form-inline">
			  	<label for="materia4">Materia 4: </label>
				<select name="materia4" id="materia" class="materia4 form-control"></select>	
			</form>
		</div>
		<div class="form-group">
			<form class="form-inline">
			  	<label for="materia5">Materia 5: </label>
				<select name="materia5" id="materia" class="materia5 form-control"></select>
			</form>
		</div>
		<div class="form-group">
			<form class="form-inline">
			  	<label for="materia6">Materia 6: </label>
				<select name="materia6" id="materia" class="materia6 form-control"></select>	
			</form>
		</div>
		<div class="form-group">
			<form class="form-inline">
			  	<label for="materia7">Materia 7: </label>
				<select name="materia7" id="materia" class="materia7 form-control"></select>
			</form>
		</div>
		<div class="form-group">
			<form class="form-inline">
			  	<label for="materia8">Materia 8: </label>
				<select name="materia8" id="materia" class="materia8 form-control"></select>	
			</form>
		</div>
		<div class="form-group">
			<form class="form-inline">
			  	<label for="materia9">Materia 9: </label>
				<select name="materia9" id="materia" class="materia9 form-control"></select>	
			</form>
		</div>
		<div class="form-group">
		<label>Selecciona tu imagen</label><br/>
			<input type="file" name="file" id="file" required />

			<input type="hidden" id="token" name="token" value="1234">
		</div>
		<div class="form-group">
			<div class="alert alert-danger" id="feedbackAlertAltaReinscripcion" role="alert" style="display:none;">
				Verifique sus datos por favor!
			</div>
		</div>
		<hr>
		<div class="col-md-12" style="margin-top: 15px;">
			<div class="actions pull-left">	
				<input type="button" class="btn btn-primary" id="btnAceptarReinscripcion" value="Aceptar">
			</div>
		</div>
	</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalPreinscripcion" data-element="" data-keyboard="false" data-backdrop="static">
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

echo $realizarReinscripcion;

?>
