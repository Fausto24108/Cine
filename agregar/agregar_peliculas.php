<?php
include "../conexion/conexion.php";
$conecta = conectar();

$titulo      = $_POST['titulo'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    
    $nombre_imagen = $_FILES['imagen']['name'];
    $ruta_temporal  = $_FILES['imagen']['tmp_name'];
    $carpeta_destino = "../uploads/" . $nombre_imagen;

    if (move_uploaded_file($ruta_temporal, $carpeta_destino)) {
        
        $consulta = "INSERT INTO peliculas (titulo, descripcion, imagen) VALUES ('$titulo', '$descripcion', '$nombre_imagen')";
        $resultado = mysqli_query($conecta, $consulta);

        if ($resultado) {
            echo "<h2>PELÍCULA AGREGADA CON ÉXITO</h2>";
        } else {
            echo "<p>Error en la base de datos: " . mysqli_error($conecta) . "</p>";
        }

    } else {
        echo "<p>Error al subir la imagen al servidor.</p>";
    }
}
?>