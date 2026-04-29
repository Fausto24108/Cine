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

$id_confirmacion = 0;
$asientos_texto = [];

foreach($lista_butacas as $b){

    $sql_insert = "INSERT INTO tickets (id_funcion, id_butaca, nombre_cliente, total, correo) VALUES ('$id_funcion', '$b', '$nombre_cliente', '$total', '$email')";
    mysqli_query($con, $sql_insert);

    if ($id_confirmacion == 0) {
        $id_confirmacion = mysqli_insert_id($con);
    }

    $sql_update = "UPDATE butacas SET estado = 1 WHERE id_butaca = '$b'";
    mysqli_query($con, $sql_update);

    $sql_asiento = "SELECT nro_asiento FROM butacas WHERE id_butaca = '$b'";
    $res_asiento = mysqli_query($con, $sql_asiento);
    $fila = mysqli_fetch_assoc($res_asiento);

    $asientos_texto[] = $fila['nro_asiento'];
}

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="icon" href="../recursos/LogoCine.jpg" type="image/jpg">
</head>
<body>
<div class="contenedor-ticket">
    <div class="ticket-header">
        <h2>Cine Magic</h2>
        <p>Estimado cliente, gracias por usar el servicio de tickets de Cine Magic. Los datos de tu compra están indicados a continuación. Que disfrutes de tu función.</p>
    </div>
    <div class="ticket-body">
        <h3>Datos de tu orden</h3>
        <p><strong>Numero de confirmacion:</strong> #<?php echo $id_confirmacion; ?></p>
        <p><strong>Cliente:</strong> <?php echo $nombre_cliente; ?></p>
        <p><strong>Correo:</strong> <?php echo $email; ?></p>
        <p><strong>Película:</strong> <?php echo $pelicula; ?></p>
        <p><strong>Sala:</strong> <?php echo $sala; ?></p>
        <p><strong>Horario:</strong> <?php echo $fecha; ?></p>
        <p><strong>Asientos:</strong> <?php echo implode(", ", $asientos_texto); ?></p>
        <p><strong>Total:</strong> $<?php echo $total; ?></p>
        <p><strong>El comprobante sera enviado a tu correo electronico</strong></p>
    </div>
</div>

</body>