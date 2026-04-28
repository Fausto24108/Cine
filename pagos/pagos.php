<?php
include "../conexion/conexion.php";

$con = conectar();

$id_funcion = $_POST['id_funcion'];
$butacas = $_POST['butacas'];
$total = $_POST['total'];

$sql = "SELECT f.*, p.titulo FROM funciones f INNER JOIN peliculas p ON f.id_pelicula = p.id_pelicula WHERE f.id_funcion = $id_funcion";

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
                <p>Película: <?php echo $funcion['titulo']; ?></p>
                <p>Butacas: <?php echo $butacas; ?></p>
                <p>Total: $<?php echo $total; ?></p>
            </div>

            <form action="../tickets/ticket.php" method="POST" class="form-pago">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="text" name="apellido" placeholder="Apellido" required>
                <input type="email" name="email" placeholder="Email" required>
                
                <label for="numero-tarjeta">Numero tarjeta</label>
                <input type="text" name="numero-tarjeta" id="numero-tarjeta" placeholder="XXXX-XXXX-XXXX-XXXX" maxlength="19" required>
                
                <label for="fecha-vencimiento">Fecha de vencimiento</label>
                <div class="fecha">
                    <input type="text" name="mes" id="mes" placeholder="MM" maxlength="2" required>
                    <input type="text" name="anio" id="anio" placeholder="AA" maxlength="2" required>
                </div>
                
                <label for="codigo_seguridad">CVV</label>
                <input type="text" name="codigo_seguridad" id="codigo_seguridad" placeholder="XXX" maxlength="3" required>

                <div class="condiciones">
                    <input type="checkbox" name="condiciones" id="condiciones" required>
                    <label for="condiciones">Acepto las pautas de la compañia</label>
                </div>
                
                <div class="metodos-pago">
                    <img src="../recursos/mastercard.png" title="Mastercard" alt="Logo Mastercard">
                    <img src="../recursos/visa.png" title="Visa" alt="Logo Visa">
                </div>

                <input type="hidden" name="butacas" value="<?php echo $butacas; ?>">
                <input type="hidden" name="total" value="<?php echo $total; ?>">
                <input type="hidden" name="id_funcion" value="<?php echo $id_funcion; ?>">

                <button type="submit">Pagar</button>
            </form>
        </div>
    </main>
</body>
</html>