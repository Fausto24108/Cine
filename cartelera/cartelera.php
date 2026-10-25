<?php
include "../conexion/conexion.php";

$con = conectar();

$sql = "SELECT * FROM peliculas";
$res = mysqli_query($con, $sql);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cine Magic</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" href="../recursos/LogoCine.jpg" type="image/jpg">
</head>
<body>

<!-- Header celeste fuera del contenedor de cartelera -->
<header class="navbar-celeste">
    <div class="navbar-brand">
        <a href="../index.html" class="nav-box">🎬 Index</a>
    </div>

    <h1>Cartelera</h1>

    <ul class="navbar-menu">
        <li>
            <?php if (isset($_SESSION['admin_login']) && $_SESSION['admin_login'] === true): ?>
                <a href="../login/logout.php" class="nav-box nav-box-logout">Cerrar Sesión</a>
            <?php else: ?>
                <a href="../login/login.php" class="nav-box">Iniciar Sesión</a>
            <?php endif; ?>
        </li>
    </ul>
</header>

<!-- Contenedor exclusivo para las películas -->
<div class="cartelera">
<?php
while($peli = mysqli_fetch_assoc($res)){
?>

    <a class="pelicula" href="../detalle.php?id_pelicula=<?php echo $peli['id_pelicula']; ?>">
        <img src="../uploads/<?php echo $peli['imagen']; ?>" alt="<?php echo $peli['titulo']; ?>">
        <h3><?php echo $peli['titulo']; ?></h3>
    </a>

<?php
}
?>
</div>

</body>
</html>