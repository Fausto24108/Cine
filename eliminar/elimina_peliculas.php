<?php
include "../conexion/conexion.php";

$conecta=conectar();

$id_pelicula=$_GET['id_pelicula'];
$titulo=$_GET['titulo'];
$descripcion=$_GET['descripcion'];
$imagen=$_GET['imagen'];

echo "
<h3>VA A ELIMINAR LA SIGUIENTE BUTACA</h3>

<form action='#' method='post'>

<p>
ID: $id_pelicula |
Titulo: $titulo |
Descripcion: $descripcion |
Imagen: $imagen
</p>

<input type='submit' name='si' value='ELIMINAR'>

</form>
";

if(isset($_POST['si']))
{
	$consulta="DELETE FROM peliculas
	WHERE id_pelicula='$id_pelicula'";

	$resultado=mysqli_query($conecta,$consulta);

	if(!$resultado)
		echo "ERROR";
	else
		header('Location:lista_peliculas.php');
}
?>