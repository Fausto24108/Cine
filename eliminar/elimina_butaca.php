<?php
include "../conexion/conexion.php";

$conecta=conectar();

$id_butaca=$_GET['id_butaca'];
$id_sala=$_GET['id_sala'];
$nro_asiento=$_GET['nro_asiento'];
$estado=$_GET['estado'];

echo "
<h3>VA A ELIMINAR LA SIGUIENTE BUTACA</h3>

<form action='#' method='post'>

<p>
ID: $id_butaca |
Sala: $id_sala |
Asiento: $nro_asiento |
Estado: $estado
</p>

<input type='submit' name='si' value='ELIMINAR'>

</form>
";

if(isset($_POST['si']))
{
	$consulta="DELETE FROM butacas
	WHERE id_butaca='$id_butaca'";

	$resultado=mysqli_query($conecta,$consulta);

	if(!$resultado)
		echo "ERROR";
	else
		header('Location:lista_butacas.php');
}
?>