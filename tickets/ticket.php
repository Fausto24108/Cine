<?php
include "../conexion/conexion.php";
$con = conectar();

$id_funcion = $_POST['id_funcion'];
$butacas = $_POST['butacas'];
$asientos = $_POST['asientos'];
$total = $_POST['total'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];

$nombre_cliente = $nombre . " " . $apellido;
$lista_butacas = explode(",", $butacas);

$codigo = 0;

foreach($lista_butacas as $b){

    $sql_insert = "INSERT INTO tickets (id_funcion, id_butaca, nombre_cliente, total, correo) VALUES ('$id_funcion', '$b', '$nombre_cliente', '$total', '$email')";
    mysqli_query($con, $sql_insert);

    if ($codigo == 0) {
        $codigo = mysqli_insert_id($con);
    }

    $sql_update = "UPDATE butacas SET estado = 1 WHERE id_butaca = '$b'";
    mysqli_query($con, $sql_update);
}

$sql = "SELECT funciones.horario, peliculas.titulo, salas.nombre_sala FROM funciones INNER JOIN peliculas ON funciones.id_pelicula = peliculas.id_pelicula INNER JOIN salas ON funciones.id_sala = salas.id_sala WHERE funciones.id_funcion = '$id_funcion'";

$res = mysqli_query($con, $sql);
$datos = mysqli_fetch_assoc($res);

$pelicula = $datos['titulo'];
$sala = $datos['nombre_sala'];
$horario = $datos['horario'];

require '../correo/enviar.php';

enviarTicket(
    $email,
    $nombre_cliente,
    $pelicula,
    $sala,
    $horario,
    $asientos,
    $total,
    $codigo
);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="icon" href="../recursos/LogoCine.jpg" type="image/jpg">
</head>
<body>
<div class="contenedor-ticket">
    <div class="ticket-header">
        <h2>Cine Magic</h2>
        <p>Gracias por tu compra</p>
    </div>
    <div class="ticket-body">
        <h3>Datos de tu orden</h3>
        <p><strong>Codigo:</strong> #<?php echo $codigo; ?></p>
        <p><strong>Cliente:</strong> <?php echo $nombre_cliente; ?></p>
        <p><strong>Correo:</strong> <?php echo $email; ?></p>
        <p><strong>Película:</strong> <?php echo $pelicula; ?></p>
        <p><strong>Sala:</strong> <?php echo $sala; ?></p>
        <p><strong>Horario:</strong> <?php echo $horario; ?></p>
        <p><strong>Asientos:</strong> <?php echo $asientos; ?></p>
        <p><strong>Total:</strong> $<?php echo $total; ?></p>
        <p><strong>El comprobante sera enviado a tu correo electronico</strong></p>
    </div>
</div>
</body>
</html>