<?php
include "../conexion/conexion.php";
include "../funciones/funciones_butacas.php";

$conecta=conectar();
$id_sala=$_POST['id_sala'];
$nro_asiento=$_POST['nro_asiento'];
$estado=$_POST['estado'];

$consulta="insert into butacas (id_sala, nro_asiento, estado) values ('$id_sala', '$nro_asiento', '$estado')";

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
