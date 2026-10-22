<?php
include "../conexion/conexion.php";

$conecta = conectar();

$id_pelicula = $_GET['id_pelicula'] ?? $_POST['id_pelicula'] ?? '';
$titulo      = $_GET['titulo']      ?? $_POST['titulo']      ?? '';
$descripcion = $_GET['descripcion'] ?? $_POST['descripcion'] ?? '';
$imagen      = $_GET['imagen']      ?? $_POST['imagen']      ?? '';

if (isset($_POST['si'])) {
    $id_pelicula = $_POST['id_pelicula'];
    $titulo      = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $imagen_db   = $_POST['imagen_actual']; 

    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nombre_imagen = $_FILES['imagen']['name'];
        $ruta_temporal = $_FILES['imagen']['tmp_name'];
        
        $carpeta_destino = "../uploads/" . $nombre_imagen;

        if (move_uploaded_file($ruta_temporal, $carpeta_destino)) {
            $imagen_db = $nombre_imagen; 
        }
    }

    $consulta = "UPDATE peliculas
                 SET titulo = '$titulo',
                     descripcion = '$descripcion',
                     imagen = '$imagen_db'
                 WHERE id_pelicula = '$id_pelicula'";

    $resultado = mysqli_query($conecta, $consulta);

    if (!$resultado) {
        echo "<p>ERROR AL ACTUALIZAR: " . mysqli_error($conecta) . "</p>";
    } else {
        header('Location: ../lista_peliculas.php');
        exit();
    }
}

echo '
<form action="" method="post" enctype="multipart/form-data">

    ID:
    <input type="text" name="id_pelicula" value="' . $id_pelicula . '" readonly><br><br>

    Título:
    <input type="text" name="titulo" value="' . $titulo . '" required><br><br>

    Descripción:
    <input type="text" name="descripcion" value="' . $descripcion . '" required><br><br>

    <!-- Guardamos el nombre actual de la imagen por si no selecciona una nueva -->
    <input type="hidden" name="imagen_actual" value="' . $imagen . '">

    Imagen actual:<br>
    <img src="../uploads/' . $imagen . '" width="120"><br><br>

    Nueva Imagen (Opcional):
    <input type="file" name="imagen" accept="image/*"><br><br>

    <input type="submit" name="si" value="ACEPTAR CAMBIOS">

</form>';
?>