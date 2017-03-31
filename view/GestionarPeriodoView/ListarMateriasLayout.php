<ul class="list-group">
		

	<?php if($total > 0 && $campo != '') {?>

		<?php foreach ($listMaterias as $mat) { ?>
		<a onclick="addNewSubject(<?php print $mat['id_materia']; ?>,'<?php print $mat['codigo_materia']; ?>','<?php print $mat['nombre_materia']; ?>')" class="list-group-item panel-primary btn" style=""><strong><?php print $mat['nombre_materia']; ?></strong></a>
		<?php } ?>				

	<?php }elseif($campo == ''){ ?>
		<p class="text-center" style="color:#1565C0;"><strong>Ingrese el nombre de la materia</strong></p>		

	<?php }else{ ?>
		<br>
		<div class="progress">
    		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%"></div>
  		</div>
  		<p class="text-center colorBluetext" style="color:#1565C0;"><strong>No se han encontrado resultados</strong></p>
	<?php } ?>



</ul>