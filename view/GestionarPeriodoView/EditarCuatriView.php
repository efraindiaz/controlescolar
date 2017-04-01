<di class="col-md-6 col-md-offset-3">
	<div id="notificationSuccess" class="form-group" style="display:none">
		 <div class="alert alert-success alert-dismissable">
		    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		    <strong>Exito!</strong> Se guardo la informacion satisfactoriamente.
		  </div>
	</div>
</di>

<div class="col-md-4 col-md-offset-4">

		<h3 class="text-center">Editar Periodo Cuatrimestral</h3>
			
		<form id="updatePCForm" action="" method="">
			<input type="text" name="typeQuery" value="editPC" hidden>
			<input type="text" name="id_cuatri" value="<?php print $cuatri[0]['id_cuatri'];?>" hidden>
			<div class="form-group">
				<label for="">Ciclo: </label>
				<input type="text" class="form-control" value="<?php print $cuatri[0]['ciclo_ini'].'/'.$cuatri[0]['ciclo_fin'];?>" readonly>								
			</div>		
			<div class="form-group">
				<label for="">Cuatrimestre: </label>

				<select class="form-control" name="numero_cuatri" id="">
					<!-- condificional para marcar selecto a la opcion -->
					<?php for ($i=1; $i < 11 ; $i++) { ?>						
						<option value="<?php print $i; ?>" <?php if($cuatri[0]['num_cuatri'] == $i){print "selected";} ?>> <?php print $i; ?></option>
					<?php } ?>

				</select>
			</div>
			<div class="form-group">
				<label for="">Fecha Inicio: </label>
				<input id="myDateStart" type="date" class="form-control" name="fecha_ini" value="<?php print $cuatri[0]['cuatri_ini'] ?>" min="<?php print $cuatri[0]['cuatri_ini'];?>" required>
			</div>
			<div class="form-group">
				<label for="">Fecha fin: </label>
				<input id="myDateEnd" type="date" class="form-control" name="fecha_fin" value="<?php print $cuatri[0]['cuatri_fin'] ?>" min="<?php print $cuatri[0]['cuatri_fin'];?>" required>
			</div>
			<div class="form-group">
				<label for="">Status: </label>
				<select class="form-control" name="stado_cuatri" id="">

					<?php if($cuatri[0]['cuatri_status'] == 1){ ?>
						<option value="1">Abierto</option>
						<option value="0">Cerrado</option>
					<?php }else{ ?>
						<option value="1">Abierto</option>
						<option value="0" selected>Cerrado</option>
					<?php } ?>
					
				</select>
			</div>
			<div class="form-group">
				<input id="btnUpdateCuat" type="submit" class="form-control btn btn-warning" value="Actualizar">
			</div>
			<div class="form-group">
				<input onclick="backToDisplayForEdit();" type="button" class="form-control btn btn-primary" value="Regresar">
			</div>
		</form>
	</div>	