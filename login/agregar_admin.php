<?php
session_start();
include "../conexion/conexion.php";

// Protección: Solo administradores logueados pueden crear otros usuarios
if (!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] !== true) {
    header("Location: login.php");
    exit();
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = conectar();

    $usuario = mysqli_real_escape_string($con, $_POST['nuevo_usuario']);
    $password_plana = $_POST['nueva_password'];

    // Encriptar la contraseña (funciona con cualquier clave)
    $password_encriptada = password_hash($password_plana, PASSWORD_DEFAULT);

    // Insertar en la base de datos
    $sql = "INSERT INTO administradores (usuario, password) VALUES ('$usuario', '$password_encriptada')";

    if (mysqli_query($con, $sql)) {
        $mensaje = "<p style='color: green;'>¡Usuario '$usuario' creado correctamente!</p>";
    } else {
        $mensaje = "<p style='color: red;'>Error al crear el usuario (posiblemente ya existe).</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Administrador</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="contenedor-pago">
    <h1>Nuevo Administrador</h1>

    <?php echo $mensaje; ?>

    <form class="form-pago" method="POST" action="agregar_admin.php">
        <label for="nuevo_usuario">Usuario:</label>
        <input type="text" id="nuevo_usuario" name="nuevo_usuario" required>

        <label for="nueva_password">Contraseña:</label>
        <input type="password" id="nueva_password" name="nueva_password" required>

        <button type="submit">Guardar Administrador</button>
    </form>
    
    <br>
    <a href="../sistema.php">Volver al Menú</a>
</div>

</body>
</html>