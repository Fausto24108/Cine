<?php
include "../conexion/conexion.php";
include "../funciones/funciones.php";

$conecta=conectar();
$id_butaca=$_POST['id_butaca'];
$id_funcion=$_POST['id_funcion'];
$nombre_cliente=$_POST['nombre_cliente'];
$correo=$_POST['correo'];
$total=$_POST['total'];


$consulta="insert into tickets (id_butaca, id_funcion, nombre_cliente, correo, total) values ('$id_butaca', '$id_funcion', '$nombre_cliente', '$correo', '$total')";

$resultado=mysqli_query($conecta, $consulta);

if(!$resultado)
	echo "<p> ERROR, VUELVA A INTENTAR DE NUEVO </p>";
else {
	echo "<h2> BUTACA AGREGADA </h2>";
	echo '<p><a href="formulario_agregar_butaca.html">Agregar Otra Butaca</a></p>';
	echo "<p></p>";
	}
echo '<a href="../sistema.html">Volver</a>';

?>
