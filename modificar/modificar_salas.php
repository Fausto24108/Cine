<?php
include "../conexion/conexion.php";

$conecta=conectar();

$id_sala=$_GET['id_sala'];
$nombre_sala=$_GET['nombre_sala'];
$tipo=$_GET['tipo'];
$capacidad=$_GET['capacidad'];

echo '
<form action="#" method="post">

ID:
<input type="text" name="id_sala"
value="'.$id_sala.'" readonly><br><br>

Nombre Sala:
<input type="text" name="nombre_sala"
value="'.$nombre_sala.'" required><br><br>

Tipo:
<input type="text" name="tipo"
value="'.$tipo.'" required><br><br>

Capacidad:
<input type="text" name="capacidad"
value="'.$capacidad.'" required><br><br>

<input type="submit" name="si"
value="ACEPTAR CAMBIOS">

</form>';

if(isset($_POST['si']))
{
	$id_sala=$_POST['id_sala'];
	$nombre_sala=$_POST['nombre_sala'];
	$tipo=$_POST['tipo'];
	$capacidad=$_POST['capacidad'];

	$consulta="UPDATE salas
	SET
	nombre_sala='$nombre_sala',
	tipo='$tipo',
	capacidad='$capacidad'
	WHERE id_sala='$id_sala'";

	$resultado=mysqli_query($conecta,$consulta);

	if(!$resultado)
		echo "ERROR";
	else
		header('Location:../listar/lista_salas.php');
}
?>