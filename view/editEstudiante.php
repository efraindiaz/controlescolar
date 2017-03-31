<?php

$formEditEstudiante = 
	'<div class="row">
		<h1 class="text-center">Actualizar Estudiante</h1>
		<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
		<hr>
		<form class="formEditEstudiante" method="post">
			<input type="hidden" name="typeQuery" class="typeQuery" value="update">
			<input type="hidden" name="idAlumno" class="idAlumno">
			<div class="form-group">
				<label for="img_perfil">Imagen de Perfil</label>
				<input type="text" name="img_perfil" placeholder="Imagen de Perfil " class="form-control img_perfil">
			</div>
			<div class="form-group">
				<label for="fechaN">Fecha de Nacimiento</label>
				<input type="text" name="fechaN" placeholder="Ingrese su Fecha de Nacimiento aaaa-mm-dd" class="form-control fechaN">
			</div>
			<div class="form-group">
				<label for="claveC">Clave Curp</label>
				<input type="text" name="ClaveC" placeholder="Ingrese Clave CURP" class="form-control ClaveC">
			</div>
			<div class="form-group">
				<label for="estadoN">Estado de Nacimiento</label>
				<input type="text" name="estadoN" placeholder="Ingrese Su Estado de Nacimiento" class="form-control estadoN">
			</div>
			<div class="form-group">
				<label for="municipio">Municipio</label>
				<input type="text" name="municipio" placeholder="Ingrese su Municipio" class="form-control municipio">
			</div>
			<div class="form-group">
				<label for="estadoC">Estado Civil</label>
				<input type="text" name="estadoC" placeholder="Ingrese su Estado Civil" class="form-control estadoC">
			</div>
			<div class="form-group">
				<label for="calle">Calle</label>
				<input type="text" name="calle" placeholder="Ingrese su Calle" class="form-control calle">
			</div>
			<div class="form-group">
				<label for="numeroE">Numero Externo</label>
				<input type="text" name="numeroE" placeholder="Ingrese su Numero Externo" class="form-control numeroE">
			</div>
			<div class="form-group">
				<label for="numeroI">Numero Interno *</label>
				<input type="text" name="numeroI" placeholder="Ingrese su Numero Interno" class="form-control numeroI">
			</div>
			<div class="form-group">
				<label for="colonia">Colonia</label>
				<input type="text" name="colonia" placeholder="Ingrese su Colonia" class="form-control colonia">
			</div>
			<div class="form-group">
				<label for="cp">Codigo Postal</label>
				<input type="text" name="cp" placeholder="Ingrese su Codigo Postal" class="form-control cp">
			</div>
			<div class="form-group">
				<label for="ciudadAc">Ciudad Actual</label>
				<input type="text" name="ciudadAc" placeholder="Ingrese su Ciudad Actual" class="form-control ciudadAc">
			</div>
			<div class="form-group">
				<label for="telefonoCe">Telefono Celular</label>
				<input type="text" name="telefonoCe" placeholder="Ingrese su Telefono Celular" class="form-control telefonoCe">
			</div>
			<div class="form-group">
				<label for="telefonoCa">Telefono de Casa</label>
				<input type="text" name="telefonoCa" placeholder="Ingrese su Telefono de Casa" class="form-control telefonoCa">
			</div>
			<div class="form-group">
				<label for="correo">Correo Electronico</label>
				<input type="text" name="correo" placeholder="Ingrese su Correo Electronico" class="form-control correo">
			</div>
			<hr>
			<div class="col-md-12" style="margin-top: 15px;">
				<div class="actions pull-right">	
					<input type="button" class="btn btn-success" id="btnEditarAlumno" value="Actualizar">
				</div>
			</div>
		</form>
		</div>
	</div>

	<div class="modal fade" tabindex="-1" role="dialog" id="modalAlumnoEditado" data-element="" data-keyboard="false" data-backdrop="static">
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

echo $formEditEstudiante;
?>