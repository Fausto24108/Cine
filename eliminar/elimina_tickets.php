<?php
include "../conexion/conexion.php";

$conecta=conectar();

$id_ticket=$_GET['id_ticket'];
$id_butaca=$_GET['id_butaca'];
$id_funcion=$_GET['id_funcion'];
$nombre_cliente=$_GET['nombre_cliente'];
$correo=$_GET['correo'];
$total=$_GET['total'];

echo "
<h3>VA A ELIMINAR LA SIGUIENTE BUTACA</h3>

<form action='#' method='post'>

<p>
ID: $id_ticket |
Id Butaca: $id_butaca |
Id Funcion: $id_funcion |
Nombre Cliente: $nombre_cliente |
Correo: $correo |
Total: $total
</p>

<input type='submit' name='si' value='ELIMINAR'>

</form>
";

if(isset($_POST['si']))
{
	$consulta="DELETE FROM tickets
	WHERE id_ticket='$id_ticket'";

	$resultado=mysqli_query($conecta,$consulta);

	if(!$resultado)
		echo "ERROR";
	else
		header('Location:elimina_tickets.php');
}
?>