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
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../recursos/LogoCine.jpg" type="image/jpg">
</head>
<body>
    
</body>
</html>