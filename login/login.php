<?php
session_start();
include "../conexion/conexion.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = conectar();
    
    // Limpiar entradas del usuario
    $usuario = mysqli_real_escape_string($con, $_POST['usuario']);
    $password = $_POST['password'];

    // Buscar al usuario
    $sql = "SELECT * FROM administradores WHERE usuario = '$usuario'";
    $res = mysqli_query($con, $sql);

    if ($row = mysqli_fetch_assoc($res)) {
        // Verificar la contraseña encriptada
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_login'] = true;
            $_SESSION['admin_user'] = $row['usuario'];
            
            header("Location: cartelera.php"); // Redirigir al panel protegido
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "El usuario no existe";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - Administración</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="contenedor-pago">
    <h1>Iniciar Sesión</h1>
    
    <?php if($error): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form class="form-pago" method="POST" action="login.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Ingresar</button>
    </form>
</div>

</body>
</html>