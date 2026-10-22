<?php
include "../conexion/conexion.php";
include "../funciones/funciones_salas.php";

$conecta=conectar();
$nombre_sala=$_POST['nombre_sala'];
$tipo=$_POST['tipo'];
$capacidad=$_POST['capacidad'];

$consulta="insert into salas (nombre_sala, tipo, capacidad) values ('$nombre_sala', '$tipo', '$capacidad')";

$resultado=mysqli_query($conecta, $consulta);

if(!$resultado)
	echo "<p> ERROR, VUELVA A INTENTAR DE NUEVO </p>";
else {
	echo "<h2> SALA AGREGADA </h2>";
	echo '<p><a href="formulario_agregar_sala.html">Agregar Otra Sala</a></p>';
	echo "<p></p>";
	}
echo '<a href="../sistema.html">Volver</a>';

?>
