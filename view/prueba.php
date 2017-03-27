<?php

$formPrueba =
'<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<form class="formPruebas">
			<div class="form-group">
				<label>Hola</label>
				<input type="text" name="hola" class="form-control hola">
			</div>
			<div class="form-group">
				<label>como estas</label>
				<input type="text" name="comoestas" class="form-control estas">
			</div>
			<hr>
			<div class="form-group">
				<button class="btn btn-primary" id="enviarPrueba">Aceptar</button>
			</div>
		</form>
	</div>
</div>';

echo $formPrueba;

?>