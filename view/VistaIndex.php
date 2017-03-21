<table class="table">
		<thead>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Correo</th>
				<th>Telefono</th>
		</thead>

		<tbody>
			<?php 
				foreach ($resultado as $contact) {
			?>
			<tr>
				<td><?php print $contact['name'];?></td>
				<td><?php print $contact['lastName'];?></td>
				<td><?php print $contact['email'];?></td>
				<td><?php print $contact['phone'];?></td>
				<td><a href="update-contact.php?idContact=<?php print $contact['id']; ?>">Modificar</a> / <a href="delete-contact.php?idContact=<?php print $contact['id']; ?>&nameContact=<?php print $contact['name'];?>">Eliminar</a></td>
			</tr>
			<?php
			}
			?>
		</tbody>

	</table>