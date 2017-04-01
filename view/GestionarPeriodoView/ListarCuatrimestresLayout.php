<table class="table table-hover">
	<thead style="background-color: #e9e9e9;">
		<tr>
			<th>Ciclo</th>
			<th>Cuatrimestre</th>
			<th>Fecha Inicio</th>
			<th>Fecha Fin</th>
			<th>Status</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody class="text-center">

		<?php 
			foreach ($listCuatrimestre as $cuatri) {
		?>
		<tr>
			<td><?php print $cuatri['ciclo_ini'].'|'.$cuatri['ciclo_fin'];?></td>
			<td><?php print $cuatri['num_cuatri'];?></td>
			<td><?php print $cuatri['cuatri_ini'];?></td>
			<td><?php print $cuatri['cuatri_fin'];?></td>
			<td><?php print $cuatri['cuatri_status'] ?></td>
			<?php if($btn == 'update'){ ?>
			<td><a class="btn btn-warning btn-xs" onclick="searchInfoForUpdate(<?php print $cuatri['id_cuatri']; ?>);">Modificar</a></td>
			<?php }elseif($btn == 'addSubject'){?>
			<td><a class="btn btn-primary btn-xs" onclick="displayAddSubject(<?php print $cuatri['id_cuatri']; ?>);">Asignar Materias</a></td>
			<?php } ?>
		</tr>
		<?php
		}
		?>

	</tbody>
</table>