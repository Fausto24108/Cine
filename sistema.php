<?php
session_start();

// Deshabilitar la caché del navegador para evitar que vean la página al volver atrás
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 10
header("Expires: 0"); // Proxies

// Validar que exista la sesión
if (!isset($_SESSION['admin_login']) || $_SESSION['admin_login'] !== true) {
    header("Location: login/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Cine</title>
</head>
<body>

  <!-- Tu menú de gestión -->
  <ul>
    <li>
      <a href="#">Mostrar</a>
      <ul>
        <li><a href="inicio.php?opcion=1">Mostrar Butacas</a></li>
        <li><a href="inicio.php?opcion=3">Mostrar Salas</a></li>
        <li><a href="inicio.php?opcion=5">Mostrar Películas</a></li>
        <li><a href="inicio.php?opcion=7">Mostrar Funciones</a></li>
        <li><a href="inicio.php?opcion=9">Mostrar Tickets</a></li>
      </ul>
    </li>
    <li>
      <a href="#">Agregar</a>
      <ul>
        <li><a href="inicio.php?opcion=2">Agregar Nueva Butaca</a></li>
        <li><a href="inicio.php?opcion=4">Agregar Nueva Sala</a></li>
        <li><a href="inicio.php?opcion=6">Agregar Nueva Película</a></li>
        <li><a href="inicio.php?opcion=8">Agregar Nueva Función</a></li>
        <li><a href="inicio.php?opcion=10">Agregar Nuevo Ticket</a></li>
      </ul>
    </li>
    <li><a href="login/logout.php">Cerrar Sesión</a></li>
    <li><a href="login/agregar_admin.php">Nuevo admin</a></li>
    
  </ul>
<script>
  // Detecta si la página se está cargando desde la memoria caché del navegador (botón Atrás)
  window.addEventListener("pageshow", function (event) {
    if (event.persisted || (typeof window.performance != "undefined" && window.performance.navigation.type === 2)) {
      // Recarga la página desde el servidor para obligar a PHP a validar la sesión de nuevo
      window.location.reload();
    }
  });
</script>
</body>
</html>