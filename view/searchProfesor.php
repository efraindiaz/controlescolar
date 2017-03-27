<?php

$formEditProfesor =
'<div class="row searchProfesores">
	<input type="hidden" name="typeQuery" class="typeQuery" value="search">
	<h1 class="text-center">Editar Profesor</h1>
	<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
		<hr>
		<div class="form-group">
			<label for="Profesores">Buscar Profesor</label>
			<input type="text" id="Profesores" name="nombresProfesores" class="form-control" placeholder="Ingese El Nombre">
		</div>
	</div>
</div>
<br>
<div class="row datosProfesores" style="display:none;">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default" style="border-radius: 0px;">
			<table class="table table-hover tableProfesores">
				<thead style="background-color: #e9e9e9;">
					<tr>
						<th>Matricula</th>
						<th>Nombres</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
</div>';

print($formEditProfesor);

?>