<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div id="notificationSuccess" class="form-group" style="display:none">
			 <div class="alert alert-success alert-dismissable">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
			    <strong>Exito!</strong> Se guardo la informacion satisfactoriamente.
			  </div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<h2 class="text-center">Asignar Materias</h2>
		</div>
	</div>

	<div class="row">
		<!-- contenedor busqueda -->
		<div class="col-md-offset-2 col-md-2">
			<br>
			<br>		
			<div class="form-group">
				<label for="">Buscar materia</label>
				<input id="RTSearchSubject" class="form-control" type="text">
				<!-- contenedor resultados de busqueda -->
				<div class="text-center" id="resultadosMaterias"></div>
			</div>
		</div>
		<!-- contenedor tabla materias -->
		<div class="col-md-5">
		<form action="" id="SubjectListForm"  method="">
			<input type="text" name="typeQuery" value="guardarMaterias" hidden>
			<input type="text" name="id_cuatrimestre" value="<?php print $infoCuatri[0]['id_cuatri']; ?>" hidden>
			<div class="col-md-12">
				<div class="form-group" class="center-text">
					<?php if($infoCarreras == null){ ?>
							<strong class="center-text" style="color:red;">¡Es necesario registrar una !</strong>
						<?php }else{ ?>
						<label for="">Selecciona una carrera</label>
						<select class="form-control" name="id_carrera" id="">		
						<?php foreach ($infoCarreras as $carrera) { ?>
							<option value="<?php print $carrera['id_carrera']; ?>"><?php print $carrera['nombre']; ?></option>
						<?php }?>
						</select>
						<?php } ?>
				</div>
			</div>
			<div class="col-md-12" style="background-color:white;">
				<table id="myTable" class="table table-striped">
			      <thead class="">
			        <tr>
			        	<th class = "text-center" data-field="id">ID</th>			        	
			          	<th class = "text-center" data-field="codigo">Código</th>
			          	<th class = "text-center" data-field="Nombre">Materia</th>
			      </tr>
			      </thead>
			      <tbody id="lista" name="lista">

			      </tbody>
			    </table>
			    <div id="text-ref" class="text-center">
			    	<p><strong>¡Aqui apareceran las materias que selecciones!</strong></p>
			    </div>

			    
			</div>

	
			<div id="contenedor-save-btn" class="form-group" style="display:none;">
				<input type="submit" id="btnSaveSubjects" class="form-control btn-primary"  value="Guardar">
			</div>
			<div class="form-group">
				<input onclick="displayForAddSubject();" type="button" class="form-control btn-success" value="Regresar">
			</div>

		</form>
		</div>
	</div>
</div>