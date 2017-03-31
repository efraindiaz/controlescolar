<div class="row">
	<?php 
	$type = $_POST['restrict'];
	?>
	
	<h1 class="text-center">Listar Cuatrimestre</h1>
	<div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3">
		<hr>
		<div class="form-group">			

			<?php if($type == 'forEdit'){?>
			<label for="Profesores">Buscar Cuatrimestre para modificar</label>
			<!-- Input para buscar cuatris para modificar -->
			<input type="text" id="campoForUpdate" name="campoSearchCuatri" class="form-control" placeholder="Ingresar campo">
			<?php }elseif($type == 'forAddSubject'){ ?>
			<label for="Profesores">Buscar Cuatrimestre para asignar materias</label>
			<!-- Input para buscar cuatris para asignar materias -->
			<input type="text" id="campoForAddSubjects" name="campoSearchCuatri" class="form-control" placeholder="Ingresar campo">
			<?php } ?>
			
			

		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div id="listaCuatrisFilter" class="panel panel-default" style="border-radius: 0px;">
			
		</div>
	</div>
</div>