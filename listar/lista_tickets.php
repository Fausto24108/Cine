<?php
include "../conexion/conexion.php";

$conecta=conectar();

$consulta="SELECT * FROM butacas";
$resultado=mysqli_query($conecta,$consulta);

echo "<table border='1'>";
echo "<tr>
<th>ID TICKET</th>
<th>ID BUTACA</th>
<th>ID FUNCION</th>
<th>NRO ASIENTO</th>
<th>NOMBRE CLIENTE</th>
<th>CORREO</th>
<th>TOTAL</th>
<th>MODIFICAR</th>
<th>ELIMINAR</th>
</tr>";

while($fila=mysqli_fetch_array($resultado))
{
	echo "<tr>";

	echo "<td>".$fila['id_ticket']."</td>";
	echo "<td>".$fila['id_butaca']."</td>";
	echo "<td>".$fila['id_funcion']."</td>";
	echo "<td>".$fila['nro_asiento']."</td>";
	echo "<td>".$fila['nombre_cliente']."</td>";
	echo "<td>".$fila['correo']."</td>";
	echo "<td>".$fila['total']."</td>";
	echo "<td>".$fila['estado']."</td>";

	echo "<td>
	<a href='modificar_butaca.php?
	id_ticket=".$fila['id_ticket']."
	&id_butaca=".$fila['id_butaca']."
	&id_funcion=".$fila['id_funcion']."
	&nro_asiento=".$fila['nro_asiento']."
	&nombre_cliente=".$fila['nombre_cliente']."
	&correo=".$fila['correo']."
	&total=".$fila['total']."
	&estado=".$fila['estado']."'>
	Modificar
	</a>
	</td>";

	echo "<td>
	<a href='elimina_butaca.php?
	id_ticket=".$fila['id_ticket']."
	&id_butaca=".$fila['id_butaca']."
	&id_funcion=".$fila['id_funcion']."
	&nro_asiento=".$fila['nro_asiento']."
	&nombre_cliente=".$fila['nombre_cliente']."
	&correo=".$fila['correo']."
	&total=".$fila['total']."
	&estado=".$fila['estado']."'>
	Eliminar
	</a>
	</td>";

	echo "</tr>";
}

echo "</table>";
?>