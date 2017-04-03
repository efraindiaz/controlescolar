<?php

$formEditCiclo =
'<div class="row searchCiclos">
	<input type="hidden" name="typeQuery" class="typeQuery" value="search">
	<h1 class="text-center">Editar Ciclo</h1>
	<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
		<hr>
		<div class="form-group">
			<label for="Ciclos">Buscar Ciclo</label>
			<input type="text" id="Ciclos" name="nombresCiclos" class="form-control" placeholder="Ingrese el Ciclo">
		</div>
	</div>
</div>
<br>
<div class="row datosCiclos" style="display:none;">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-default" style="border-radius: 0px;">
			<table class="table table-hover tableCiclos">
				<thead style="background-color: #e9e9e9;">
					<tr>
						<th>Id</th>
						<th>Inicio</th>
						<th>Fin</th>
						<th>Estado</th>
						<th>Acciones<th>
					</tr>
				</thead>
				<tbody>

				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="modalProfesorEliminado" data-element="" data-keyboard="false" data-backdrop="static">
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

print($formEditCiclo);

?>