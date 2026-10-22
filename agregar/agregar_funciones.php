<?php
include "../conexion/conexion.php";
include "../funciones/funciones.php";

$conecta=conectar();
$id_pelicula=$_POST['id_pelicula'];
$id_sala=$_POST['id_sala'];
$horario=$_POST['horario'];
$precio_entrada=$_POST['precio_entrada'];

$consulta="insert into funciones (id_pelicula, id_sala, horario, precio_entrada) values ('$id_pelicula', '$id_sala', '$horario', '$precio_entrada')";

$resultado=mysqli_query($conecta, $consulta);

if(!$resultado)
	echo "<p> ERROR, VUELVA A INTENTAR DE NUEVO </p>";
else {
	echo "<h2> FUNCION AGREGADA </h2>";
	echo '<p><a href="formulario_agregar_funciones.html">Agregar Otra Funcion</a></p>';
	echo "<p></p>";
	}
echo '<a href="../sistema.html">Volver</a>';

?>
