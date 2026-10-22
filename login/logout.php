<?php
session_start();

// Destruir todas las variables de sesión activa
session_unset();
session_destroy();

// Redirigir al formulario de login
header("Location: login.php");
exit();
?>