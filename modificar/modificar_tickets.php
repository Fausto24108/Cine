<?php
include "../conexion/conexion.php";

$conecta=conectar();

$id_ticket=$_GET['id_ticket'];
$id_funcion=$_GET['id_funcion'];
$nombre_cliente=$_GET['nombre_cliente'];
$correo=$_GET['correo'];
$total=$_GET['total'];

echo '
<form action="#" method="post">

ID Ticket:
<input type="text" name="id_ticket"
value="'.$id_ticket.'" readonly><br><br>

ID Funcion:
<input type="text" name="id_funcion"
value="'.$id_funcion.'" readonly><br><br>

Nombre Cliente:
<input type="text" name="nombre_cliente"
value="'.$nombre_cliente.'" required><br><br>

Correo:
<input type="email" name="correo"
value="'.$correo.'" required><br><br>

total:
<input type="number" name="total"
value="'.$total.'" required><br><br>

<input type="submit" name="si"
value="ACEPTAR CAMBIOS">

</form>';

if(isset($_POST['si']))
{
	$id_ticket=$_POST['id_ticket'];
	$id_funcion=$_POST['id_funcion'];
	$nombre_cliente=$_POST['nombre_cliente'];
	$correo=$_POST['correo'];
	$total=$_POST['total'];

	$consulta="UPDATE tickets
	SET
	id_funcion='$id_funcion',
	nombre_cliente='$nombre_cliente',
	correo='$correo',
	total='$total'
	WHERE id_ticket='$id_ticket'";

	$resultado=mysqli_query($conecta,$consulta);

	if(!$resultado)
		echo "ERROR";
	else
		header('Location:../lista_peliculas.php');
}
?>