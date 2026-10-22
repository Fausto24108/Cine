<?php
include "../conexion/conexion.php";

$conecta=conectar();

$id_butaca=$_GET['id_butaca'];
$id_sala=$_GET['id_sala'];
$nro_asiento=$_GET['nro_asiento'];
$estado=$_GET['estado'];

echo '
<form action="#" method="post">

ID:
<input type="text" name="id_butaca"
value="'.$id_butaca.'" readonly><br><br>

Sala:
<input type="text" name="id_sala"
value="'.$id_sala.'" required><br><br>

Asiento:
<input type="text" name="nro_asiento"
value="'.$nro_asiento.'" required><br><br>

Estado:
<input type="text" name="estado"
value="'.$estado.'" required><br><br>

<input type="submit" name="si"
value="ACEPTAR CAMBIOS">

</form>';

if(isset($_POST['si']))
{
	$id_butaca=$_POST['id_butaca'];
	$id_sala=$_POST['id_sala'];
	$nro_asiento=$_POST['nro_asiento'];
	$estado=$_POST['estado'];

	$consulta="UPDATE butacas
	SET
	id_sala='$id_sala',
	nro_asiento='$nro_asiento',
	estado='$estado'
	WHERE id_butaca='$id_butaca'";

	$resultado=mysqli_query($conecta,$consulta);

	if(!$resultado)
		echo "ERROR";
	else
		header('Location:lista_butacas.php');
}
?>