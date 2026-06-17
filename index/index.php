<?php
include "conexion/conexion.php";

$con = conectar();

$sql = "SELECT * FROM peliculas";
$res = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cine Magic</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>

<h1>Cartelera</h1>
<div class="cartelera">

<?php
while($peli = mysqli_fetch_assoc($res)){
?>

<a class="pelicula" href="detalle.php?id_pelicula=<?php echo $peli['id_pelicula']; ?>">

    <img src="<?php echo $peli['imagen']; ?>">

    <h3><?php echo $peli['titulo']; ?></h3>

</a>

<?php
}
?>

</div>

</body>
</html>