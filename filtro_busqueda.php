<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////



$conexion= new mysqli("localhost","root","","grupos");
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}
////////////////// VARIABLES DE CONSULTA////////////////////////////////////

$where="";
if(isset($_POST['xnombre'])){
	$nombre=$_POST['xnombre'];
} else{
	$nombre="";
}
if(isset($_POST['xcarrera'])){
	$carrera=$_POST['xcarrera'];
} else{
	$carrera="";
}
if(isset($_POST['xregistros'])){
	$limit=$_POST['xregistros'];
} else{
	$limit="";
}


////////////////////// BOTON BUSCAR //////////////////////////////////////

if (isset($_POST['buscar']))
{

	

	if (empty($_POST['xcarrera']))
	{
		$where="where Nombre like '".$nombre."%'";
	}

	else if (empty($_POST['xnombre']))
	{
		$where="where Carrera='".$carrera."'";
	}

	else
	{
		$where="where nombre like '".$nombre."%' and Carrera='".$carrera."'";
	}
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$alumnos="SELECT * FROM registros $where ";
$resAlumnos=$conexion->query($alumnos);
$resCarreras=$conexion->query($alumnos);

if(mysqli_num_rows($resAlumnos)==0)
{
	$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
?>
<html lang="es">

	<head>
		<title>Busqueda de Grupos y Alumnos</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	</head>
	
	<body background="poli.PNG">
		<header>
			<div class="alert alert-info">
			<h2>Busqueda de Grupos y Alumnos</h2>
			</div>
		</header>
		<section>
			<form method="post">
				<input type="text" placeholder="Nombre..." name="xnombre"/>
				<select name="xcarrera">
					<option value="">Carrera </option>
					<?php
					
						while ($registroCarreras = $resCarreras->fetch_array(MYSQLI_BOTH))

						{
							echo '<option value="'.$registroCarreras['Carrera'].'">'.$registroCarreras['Carrera'].'</option>';
						}					
						
					?>
				</select>

				
				</select>
				<button name="buscar" type="submit">Buscar</button>
			</form>
			<table class="table">
				<tr>
					<th>Nombre</th>
					<th>Edad</th>
					<th>Genero</th>
					<th>Matricula</th>
					<th>Carrera</th>
					<th>Fecha de Ingreso</th>
				</tr>

				<?php

				while ($registroAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{

					echo'<tr>
						 <td>'.$registroAlumnos['Nombre'].'</td>
						 <td>'.$registroAlumnos['Edad'].'</td>
						 <td>'.$registroAlumnos['Genero'].'</td>						 
						 <td>'.$registroAlumnos['Matricula'].'</td>
						 <td>'.$registroAlumnos['Carrera'].'</td>
						 <td>'.$registroAlumnos['Fecha de Ingreso'].'</td>
						 </tr>';				}
				?>
			</table>

			<?
				echo $mensaje;
			?>
		</section>
	</body>
</html>


