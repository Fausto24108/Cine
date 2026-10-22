<?php
include "../conexion/conexion.php";

$conecta=conectar();

$id_funcion=$_GET['id_funcion'];
$id_pelicula=$_GET['id_pelicula'];
$id_sala=$_GET['id_sala'];
$horario=$_GET['horario'];
$precio_entrada=$_GET['precio_entrada'];

echo "
<h3>ELIMINAR LA SIGUIENTE FUNCION</h3>

<form action='#' method='post'>

<p>
ID: $id_funcion |
ID Pelicula: $id_pelicula |
ID Sala: $id_sala |
Horario: $horario |
Precio Entrada: $precio_entrada
</p>

<input type='submit' name='si' value='ELIMINAR'>

</form>
";

if(isset($_POST['si']))
{
	$consulta="DELETE FROM funciones
	WHERE id_funcion='$id_funcion'";

	$resultado=mysqli_query($conecta,$consulta);

	if(!$resultado)
		echo "ERROR";
	else
		header('Location:lista_funciones.php');
}
?>