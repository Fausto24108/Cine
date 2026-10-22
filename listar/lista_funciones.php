<?php
include "../conexion/conexion.php";
include "../funciones/funciones.php";

$conecta=conectar();

$consulta="SELECT * FROM funciones";
$resultado=mysqli_query($conecta,$consulta);

echo "<table border='1'>";

echo "<tr>
<th>ID</th>
<th>ID PELICULA</th>
<th>ID SALA</th>
<th>HORARIO</th>
<th>PRECIO ENTRADA</th>
</tr>";

while($fila=mysqli_fetch_array($resultado))
{
	echo "<tr>";

	echo "<td>".$fila['id_funcion']."</td>";
	echo "<td>".$fila['id_pelicula']."</td>";
	echo "<td>".$fila['id_sala']."</td>";
	echo "<td>".$fila['horario']."</td>";
	echo "<td>".$fila['precio_entrada']."</td>";

	echo "<td>
	<a href='modificar_funciones.php?
	id_pelicula=".$fila['id_pelicula']."
	&titulo=".$fila['titulo']."
	&descripcion=".$fila['descripcion']."
	&imagen=".$fila['imagen']."'>
	Modificar
	</a>
	</td>";

	echo "<td>
	<a href='lista_funciones.php?
	id_funcion=".$fila['id_funcion']."
	id_pelicula=".$fila['id_pelicula']."
	&id_sala=".$fila['id_sala']."
	&horario=".$fila['horario']."
	&precio_entrada=".$fila['precio_entrada']."'>
	Eliminar
	</a>
	</td>";

	echo "</tr>";
}

echo "</table>";
?>