<div class="col-md-4 col-md-offset-4">
		<h3 class="text-center">Nuevo Periodo Cuatrimestral</h3>
		
		<?php if($data == null){?>
				<strong>No hay ciclos escolares registrados</strong>
				<?php } else{?>	
		<form id="newPCForm" action="" method="">
			<input type="text" name="typeQuery" value="insert" hidden>
			<div class="form-group">
				<label for="">Ciclo: </label>			
				<select class="form-control" name="id_ciclo" id="">
					<option value="<?php print $data[0]['id_ciclo']; ?>"><?php print $data[0]['ciclo_ini'].'/'.$data[0]['ciclo_fin'];?></option>							
				</select>						
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
				<input type="date" class="form-control" name="fecha_ini">
			</div>
			<div class="form-group">
				<label for="">Fecha fin: </label>
				<input type="date" class="form-control" name="fecha_fin">
			</div>
			<div class="form-group">
				<label for="">Status: </label>
				<select class="form-control" name="stado_cuatri" id="">
					<option value="1">Abierto</option>
					<option value="0">Cerrado</option>
				</select>
			</div>
			<div class="form-group">
				<input id="btnSaveCuat" type="submit" class="form-control btn btn-primary" value="Guardar">
			</div>
		</form>
		<?php } ?>		
	</div>	