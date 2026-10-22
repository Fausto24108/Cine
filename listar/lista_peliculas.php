<?php
include "../conexion/conexion.php";
include "../funciones/funciones.php";

$conecta=conectar();

$consulta="SELECT * FROM peliculas";
$resultado=mysqli_query($conecta,$consulta);

echo "<table border='1'>";

echo "<tr>
<th>ID</th>
<th>TITULO</th>
<th>DESCRIPCION</th>
<th>IMAGEN</th>
<th>MODIFICAR</th>
<th>ELIMINAR</th>
</tr>";

while($fila=mysqli_fetch_array($resultado))
{
	echo "<tr>";

	echo "<td>".$fila['id_pelicula']."</td>";
	echo "<td>".$fila['titulo']."</td>";
	echo "<td>".$fila['descripcion']."</td>";
	echo "<td>".$fila['imagen']."</td>";

	echo "<td>
	<a href='modificar_pelicula.php?
	id_pelicula=".$fila['id_pelicula']."
	&titulo=".$fila['titulo']."
	&descripcion=".$fila['descripcion']."
	&imagen=".$fila['imagen']."'>
	Modificar
	</a>
	</td>";

	echo "<td>
	<a href='elimina_pelicula.php?
	id_pelicula=".$fila['id_pelicula']."
	&titulo=".$fila['titulo']."
	&descripcion=".$fila['descripcion']."
	&imagen=".$fila['imagen']."'>
	Eliminar
	</a>
	</td>";

	echo "</tr>";
}

echo "</table>";
?>