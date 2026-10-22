<?php
include "../conexion/conexion.php";

$conecta=conectar();

$id_funcion=$_GET['id_funcion'];
$id_pelicula=$_GET['id_pelicula'];
$id_sala=$_GET['id_sala'];
$horario=$_GET['horario'];
$precio_entrada=$_GET['precio_entrada'];

echo '
<form action="#" method="post">

ID:
<input type="text" name="id_funcion"
value="'.$id_funcion.'" readonly><br><br>

ID Pelicula:
<input type="text" name="id_pelicula"
value="'.$id_pelicula.'" readonly><br><br>

ID Sala:
<input type="text" name="id_sala"
value="'.$id_sala.'" required><br><br>

Horario:
<input type="text" name="horario"
value="'.$horario.'" required><br><br>

Precio Entrada:
<input type="text" name="precio_entrada"
value="'.$precio_entrada.'" required><br><br>

<input type="submit" name="si"
value="ACEPTAR CAMBIOS">

</form>';

if(isset($_POST['si']))
{
	$id_funcion=$_POST['id_funcion'];
	$id_pelicula=$_POST['id_pelicula'];
	$id_sala=$_POST['id_sala'];
	$horario=$_POST['horario'];
	$precio_entrada=$_POST['precio_entrada'];

	$consulta="UPDATE funciones
	SET
	id_pelicula='$id_pelicula',
	id_sala='$id_sala',
	horario='$horario',
	precio_entrada='$precio_entrada'
	WHERE id_funcion='$id_funcion'";

	$resultado=mysqli_query($conecta,$consulta);

	if(!$resultado)
		echo "ERROR";
	else
		header('Location:../lista_funciones.php');
}
?>