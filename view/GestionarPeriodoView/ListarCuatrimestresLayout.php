<table class="table table-hover">
	<thead style="background-color: #e9e9e9;">
		<tr>
			<th>Ciclo</th>
			<th>Cuatrimestre</th>
			<th>Fecha Inici</th>
			<th>Fecha Fin</th>
			<th>Status</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
	<tbody>

		<?php 
			foreach ($listCuatrimestre as $cuatri) {
		?>
		<tr>
			<td><?php print $cuatri['id_ciclo'];?></td>
			<td><?php print $cuatri['numero_cuatri'];?></td>
			<td><?php print $cuatri['fecha_ini'];?></td>
			<td><?php print $cuatri['fecha_fin'];?></td>
			<td><?php print $cuatri['stado_cuatri'] ?></td>
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