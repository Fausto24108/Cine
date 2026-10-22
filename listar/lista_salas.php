<?php
include "../conexion/conexion.php";

$conecta=conectar();

$consulta="SELECT * FROM salas";
$resultado=mysqli_query($conecta,$consulta);

echo "<table border='1'>";
echo "<tr>
<th>ID</th>
<th>NOMBRE SALA</th>
<th>TIPO</th>
<th>CAPACIDAD</th>
</tr>";

while($fila=mysqli_fetch_array($resultado))
{
	echo "<tr>";

	echo "<td>".$fila['id_sala']."</td>";
	echo "<td>".$fila['nombre_sala']."</td>";
	echo "<td>".$fila['tipo']."</td>";
	echo "<td>".$fila['capacidad']."</td>";

	echo "<td>
	<a href='modificar_salas.php?
	id_sala=".$fila['id_sala']."
	&nombre_sala=".$fila['nombre_sala']."
	&tipo=".$fila['tipo']."
	&capacidad=".$fila['capacidad']."'>
	Modificar
	</a>
	</td>";

	echo "<td>
	<a href='elimina_salas.php?
	id_sala=".$fila['id_sala']."
	&tipo=".$fila['tipo']."
	&nro_asiento=".$fila['nro_asiento']."
	&capacidad=".$fila['capacidad']."'>
	Eliminar
	</a>
	</td>";

	echo "</tr>";
}

echo "</table>";
?>