<div class="col-md-4 col-md-offset-4">
		<h3 class="text-center">Editar Periodo Cuatrimestral</h3>
			
		<form id="updatePCForm" action="" method="">
			<input type="text" name="typeQuery" value="editPC" hidden>
			<input type="text" name="id_cuatri" value="<?php print $cuatri[0]['id_cuatri'];?>">
			<div class="form-group">
				<label for="">Ciclo: </label>
				<input type="text" class="form-control" value="<?php print $cuatri[0]['ciclo_ini'].'/'.$cuatri[0]['ciclo_fin'];?>" readonly>								
			</div>		
			<div class="form-group">
				<label for="">Cuatrimestre: </label>
				<select class="form-control" name="numero_cuatri" id="">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>
			</div>
			<div class="form-group">
				<label for="">Fecha Inicio: </label>
				<input type="date" class="form-control" name="fecha_ini" value="<?php print $cuatri[0]['cuatri_ini'] ?>">
			</div>
			<div class="form-group">
				<label for="">Fecha fin: </label>
				<input type="date" class="form-control" name="fecha_fin" value="<?php print $cuatri[0]['cuatri_fin'] ?>">
			</div>
			<div class="form-group">
				<label for="">Status: </label>
				<select class="form-control" name="stado_cuatri" id="">

					<?php if($cuatri[0]['stado_cuatri'] == 1){ ?>
						<option value="1" selected>Abierto</option>
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
		</form>
	</div>	