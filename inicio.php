<?php
include "conexion/conexion.php";
include "funciones/funciones_butacas.php";
include "funciones/funciones_salas.php";
include "funciones/funciones_peliculas.php";
include "funciones/funciones_funciones.php";
include "funciones/funciones_tickets.php";

$conecta=conectar();
$opcion=$_GET['opcion'];

switch($opcion){
 case 1:{
 mostrar_butacas($conecta);
 break;
 }
 case 2:
 header('Location: agregar/formulario_agregar_butaca.html');
 break;
 case 3:
 mostrar_salas($conecta);
 break;
 case 4:
 header('Location: agregar/formulario_agregar_sala.html');
 break;
 case 5:
 mostrar_peliculas($conecta);
 break;
 case 6:
 header('Location: agregar/formulario_agregar_peliculas.html');
 break;
 case 7:
 mostrar_funciones($conecta);
 break;
 case 8:
 header('Location: agregar/formulario_agregar_funciones.html');
 break;   
 case 9:
 mostrar_tickets($conecta);
 break;
 case 10:
 header('Location: agregar/formulario_agregar_tickets.html');
 break;    
}
mysqli_close($conecta);
?>
