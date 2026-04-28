<?php
include "../conexion/conexion.php";
$con = conectar();

$id_funcion = $_POST['id_funcion'];
$butacas = $_POST['butacas'];
$total = $_POST['total'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];

$nombre_cliente = $nombre . " " . $apellido;

$lista_butacas = explode(",", $butacas);

foreach($lista_butacas as $b){

    $sql_insert = "INSERT INTO tickets (id_funcion, id_butaca, nombre_cliente, total, correo) VALUES ('$id_funcion', '$b', '$nombre_cliente', '$total', '$email')";
    mysqli_query($con, $sql_insert);

    $sql_update = "UPDATE butacas  SET estado = 1  WHERE id_butaca = '$b' AND id_butaca = '$b'";
    mysqli_query($con, $sql_update);
}

$id_confirmacion = mysqli_insert_id($con);

$sql = "SELECT f.horario, p.titulo, s.nombre_sala FROM funciones f INNER JOIN peliculas p ON f.id_pelicula = p.id_pelicula INNER JOIN salas s ON f.id_sala = s.id_sala WHERE f.id_funcion = '$id_funcion'";

$res = mysqli_query($con, $sql);
$datos = mysqli_fetch_assoc($res);

$pelicula = $datos['titulo'];
$sala = $datos['nombre_sala'];
$fecha = $datos['horario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ticket</title>
</head>
<body>

<h1>Pago realizado con éxito</h1>

<p>Confirmación: <?php echo $id_confirmacion; ?></p>
<p>Cliente: <?php echo $nombre_cliente; ?></p>
<p>Correo: <?php echo $email; ?></p>
<p>Película: <?php echo $pelicula; ?></p>
<p>Sala: <?php echo $sala; ?></p>
<p>Fecha: <?php echo $fecha; ?></p>
<p>Asientos: <?php echo $butacas; ?></p>
<p>Total: $<?php echo $total; ?></p>

</body>
</html>