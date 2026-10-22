<?php
include "../conexion/conexion.php";

$conecta = conectar();

// 1. Leemos los datos desde la URL ($_GET) o desde el formulario ($_POST)
$id_sala     = $_GET['id_sala'] ?? $_POST['id_sala'] ?? '';
$nombre_sala = $_GET['nombre_sala'] ?? $_POST['nombre_sala'] ?? '';
$tipo        = $_GET['tipo'] ?? $_POST['tipo'] ?? '';
$capacidad   = $_GET['capacidad'] ?? $_POST['capacidad'] ?? '';

// 2. Si se hizo clic en el botón ELIMINAR (confirmación POST)
if (isset($_POST['si'])) {
    $id_eliminar = $_POST['id_sala'];

    $consulta = "DELETE FROM salas WHERE id_sala = '$id_eliminar'";
    $resultado = mysqli_query($conecta, $consulta);

    if (!$resultado) {
        echo "<p>ERROR AL ELIMINAR: " . mysqli_error($conecta) . "</p>";
    } else {
        header('Location: mostrar_salas.php'); // Redirige al listado
        exit();
    }
}

echo "
<h3>VA A ELIMINAR LA SIGUIENTE SALA</h3>

<form action='' method='post'>

    <p>
        <strong>ID:</strong> $id_sala |
        <strong>Nombre Sala:</strong> $nombre_sala |
        <strong>Tipo:</strong> $tipo |
        <strong>Capacidad:</strong> $capacidad
    </p>
    <input type='hidden' name='id_sala' value='$id_sala'>

    <input type='submit' name='si' value='ELIMINAR'>

</form>
";
?>