<?php
include "../conexion/conexion.php";

$con = conectar();

$id_function = $_GET['id_funcion'];

$sql = "SELECT * FROM funciones WHERE id_funcion = $id_function";
$res = mysqli_query($con,$sql);
$funcion = mysqli_fetch_assoc($res);

$id_sala = $funcion['id_sala'];
$precio = $funcion['precio_entrada'];

$sql2 = "SELECT * FROM butacas WHERE id_sala = $id_sala";
$res2 = mysqli_query($con,$sql2);
?>

<!DOCTYPE html>
<html lang="es-ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine</title>
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="icon" href="../recursos/LogoCine.jpg" type="image/jpg">
</head>
<body>
    <main>
        <div class="leyenda">
            <div class="item">
                <div class="cuadro_libre"></div>
                <p>Libre</p>
            </div>

            <div class="item">
                <div class="cuadro_ocupado"></div>
                <p>Ocupado</p>
            </div>

            <div class="item">
                <div class="cuadro_seleccionado"></div>
                <p>Seleccionado</p>
            </div>
        </div>

        <div class="pantalla">
            <p>PANTALLA</p>
        </div>

        <div id="butacas">

        <?php
        while ($butaca = mysqli_fetch_assoc($res2)){
            $estado = $butaca['estado'];

            if ($estado == 1){
                $estadoVisual = "ocupado";
            }

            else{
                $estadoVisual = "libre";
            }

            echo "<div class='butaca " . $estadoVisual . "' data-id='" . $butaca['id_butaca'] . "'>"
            . $butaca['nro_asiento'] .
            "</div>";
        }
        
        ?>
        </div>
        <div class="compra">
        <h2 class="total">Total: $0</h2>  
        <button id="confirmar">Confirmar</button>
        </div>
        <form id="formCompra" action="../pagos/pagos.php" method="POST">
            <input type="hidden" name="butacas" id="inputButacas">
            <input type="hidden" name="id_funcion" value="<?php echo $id_function; ?>">
            <input type="hidden" name="total" id="inputTotal">
        </form>
    </main>
<script src="../JS/script.js"></script>
</body>
</html>