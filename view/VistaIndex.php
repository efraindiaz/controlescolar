<table class="table">
		<thead>
				<th>Id</th>
				<th>Matricula</th>
				<th>Nombre</th>
				<th>Apellido Materno</th>
				<th>Acciones</th>
		</thead>

		<tbody>
			<?php 
				foreach ($resultado as $contact) {
			?>
			<tr>
				<td><?php print $contact['id_profesor'];?></td>
				<td><?php print $contact['matricula'];?></td>
				<td><?php print $contact['nombre(s)'];?></td>
				<td><?php print $contact['apellido_materno'];?></td>
				<td><a href="update-contact.php?idContact=<?php print $contact['id']; ?>">Modificar</a> / <a href="delete-contact.php?idContact=<?php print $contact['id']; ?>&nameContact=<?php print $contact['name'];?>">Eliminar</a></td>
			</tr>
			<?php } ?>

		</tbody>

	</table>