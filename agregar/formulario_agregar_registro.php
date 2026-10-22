<?php
include "../funciones/funciones.php";
include "../conexion/conexion.php";
$conecta=conectar();

$codigo=$_GET['codigo'];
$nombre=$_GET['nombre'];

$cont="select * from adoptante";
$resultado_adop=mysqli_query($conecta, $cont);

if($resultado_adop){
echo '
	<h2>NUEVO REGISTRO DE ADOPCION</h2>
	<form action="agregar_registro.php" method="post">
	<label for="codigo">Codigo Mascota:</label>
	<input type="text" name="codigo" value="'.$codigo.'" readonly />
	<label for="nombre">Nombre Mascota:</label>
	<input type="text" name="nombre" value="'.$nombre.'" readonly /><br/><br/>
	<label for="fecha_a">Fecha Adopcion:</label>
	<input type="date" name="fecha_a" required/><br/><br/>
	
	<select required name="dni_a">
	<option value="" disabled selected>-- Seleccione Adoptante-- </option>';
	while($tabla_adop=mysqli_fetch_array($resultado_adop)){
	
		echo '<option value="'.$tabla_adop['dni_a'].'">'.$tabla_adop['dni_a'].'-'.$tabla_adop['apellido'].', '.$tabla_adop['nombre'].' - Telefono: '.$tabla_adop['domicilio'].'</option>';
		
		}
		echo '</select><br/><br/>';
		echo'
		<input type="submit" name="agregar" value="AGREGAR REGISTRO"/>
		<input type="submit" name="cancelar" value="CANCELAR" formaction="../sistema.html" formnovalidate/>
		</form><br/><br/>';
			echo '<a href="../sistema.html">Volver</a> ';
			}
			
	else{
		echo "<h3>No se pudo acceder a las Mascotas o Adoptantes</h3>";
		echo "<a href='../sistema.html'>Volver</a>";
		}
	?>
