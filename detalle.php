<?php
include "conexion/conexion.php";
$con = conectar();

// Validar que se haya enviado el id de la película
if (!isset($_GET['id_pelicula']) || empty($_GET['id_pelicula'])) {
    header("Location: index/index.php");
    exit();
}

$id_pelicula = (int)$_GET['id_pelicula'];

// 1. Consultar la película seleccionada
$sqlPeli = "SELECT * FROM peliculas WHERE id_pelicula = $id_pelicula";
$resPeli = mysqli_query($con, $sqlPeli);

if (!$resPeli || mysqli_num_rows($resPeli) == 0) {
    header("Location: index/index.php");
    exit();
}

$pelicula = mysqli_fetch_assoc($resPeli);

// 2. Consultar las funciones disponibles para esta película
$sqlFunciones = "SELECT f.id_funcion, f.horario, f.precio_entrada, s.nombre_sala, s.tipo 
                 FROM funciones f 
                 INNER JOIN salas s ON f.id_sala = s.id_sala 
                 WHERE f.id_pelicula = $id_pelicula";

$resFunciones = mysqli_query($con, $sqlFunciones);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pelicula['titulo']; ?> - Cinemagic</title>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        .detalle-container {
            display: flex;
            gap: 30px;
            padding: 40px;
            max-width: 1000px;
            margin: 0 auto;
        }
        .poster img {
            width: 300px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }
        .info-pelicula {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .info-pelicula h1 {
            color: #3b82f6;
            font-size: 32px;
        }
        .descripcion {
            font-size: 16px;
            line-height: 1.5;
            color: #444;
        }
        .funciones-seccion {
            margin-top: 20px;
        }
        .funciones-lista {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 10px;
        }
        .btn-funcion {
            background-color: #3b82f6;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
            transition: background-color 0.2s;
        }
        .btn-funcion:hover {
            background-color: #2b52bf;
        }
        .btn-funcion small {
            display: block;
            font-weight: normal;
            font-size: 12px;
            margin-top: 4px;
        }
    </style>
</head>
<body>

    <main class="detalle-container">
        <div class="poster">
<img src="uploads/<?php echo $pelicula['imagen']; ?>" alt="<?php echo $pelicula['titulo']; ?>">
        </div>

        <div class="info-pelicula">
            <h1><?php echo $pelicula['titulo']; ?></h1>
            <p class="descripcion"><?php echo $pelicula['descripcion']; ?></p>

            <div class="funciones-seccion">
                <h2>Funciones Disponibles</h2>
                <div class="funciones-lista">
                    <?php 
                    if (mysqli_num_rows($resFunciones) > 0) {
                        while ($funcion = mysqli_fetch_assoc($resFunciones)) {
                            $horario = date("d/m/Y H:i", strtotime($funcion['horario']));
                            ?>
                            <a class="btn-funcion" href="butacas/butacas.php?id_funcion=<?php echo $funcion['id_funcion']; ?>">
                                <?php echo $horario; ?> hs
                                <small><?php echo $funcion['nombre_sala']; ?> (<?php echo $funcion['tipo']; ?>)</small>
                                <small>$<?php echo number_format($funcion['precio_entrada'], 2); ?></small>
                            </a>
                            <?php
                        }
                    } else {
                        echo "<p>No hay funciones programadas para esta película por el momento.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>

</body>
</html>