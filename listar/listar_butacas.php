<?php
include "../conexion/conexion.php";

$conecta=conectar();

$consulta="SELECT * FROM butacas";
$resultado=mysqli_query($conecta,$consulta);

echo "<table border='1'>";
echo "<tr>
<th>ID</th>
<th>SALA</th>
<th>ASIENTO</th>
<th>ESTADO</th>
<th>MODIFICAR</th>
<th>ELIMINAR</th>
</tr>";

while($fila=mysqli_fetch_array($resultado))
{
	echo "<tr>";

	echo "<td>".$fila['id_butaca']."</td>";
	echo "<td>".$fila['id_sala']."</td>";
	echo "<td>".$fila['nro_asiento']."</td>";
	echo "<td>".$fila['estado']."</td>";

	echo "<td>
	<a href='modifica_butaca.php?
	id_butaca=".$fila['id_butaca']."
	&id_sala=".$fila['id_sala']."
	&nro_asiento=".$fila['nro_asiento']."
	&estado=".$fila['estado']."'>
	Modificar
	</a>
	</td>";

	echo "<td>
	<a href='elimina_butaca.php?
	id_butaca=".$fila['id_butaca']."
	&id_sala=".$fila['id_sala']."
	&nro_asiento=".$fila['nro_asiento']."
	&estado=".$fila['estado']."'>
	Eliminar
	</a>
	</td>";

	echo "</tr>";
}

echo "</table>";
?>