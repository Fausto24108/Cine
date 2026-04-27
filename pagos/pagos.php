<?php
include "../conexion/conexion.php";

$con = conectar();

$id_funcion = $_POST['id_funcion'];
$butacas = $_POST['butacas'];
$total = $_POST['total'];

$sql = "SELECT * FROM funciones WHERE id_funcion = $id_funcion";
$res = mysqli_query($con, $sql);
$funcion = mysqli_fetch_assoc($res);
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
    <main>
        <div class="contenedor-pago">
            <h1>Confirmar compra</h1>

            <div class="resumen">
                <p>Película: <?php echo $funcion['id_funcion']; ?></p>
                <p>Butacas: <?php echo $butacas; ?></p>
                <p>Total: $<?php echo $total; ?></p>
            </div>

            <form action="confirmar_pago.php" method="POST" class="form-pago">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="apellido" placeholder="Apellido" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="hidden" name="butacas" value="<?php echo $butacas; ?>">
                <input type="hidden" name="total" value="<?php echo $total; ?>">
                <input type="hidden" name="id_funcion" value="<?php echo $id_funcion; ?>">
                <button type="submit">Pagar</button>
            </form>
        </div>
    </main>
</body>
</html>