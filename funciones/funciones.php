<?php

function mostrar_mascota($conecta){
$consulta="select * from mascotas";
$resultado=mysqli_query($conecta, $consulta);

	if(!$resultado)
		echo "<p> ERROR, VUELVA A INTENTAR DE NUEVO </p>";
	else{
		$filas=mysqli_num_rows($resultado);
		
	if($filas==0){
		echo "<p> NO HAY DATOS </p>";
		}
	else{
	echo '<h2> MASCOTAS</h2><br/><br/>';
	echo '<table border="1" >
		<thead>
				<tr>
					<th>CODIGO</th>
					<th>NOMBRE</th>
					<th>TIPO</th>
					<th>RAZA</th>
					<th>EDAD</th>
					<th>SEXO</th>
					<th>FECHA_INGRESO</th>
					<th>COD.REGISTRO ADPCION</th>
					<th>MODIFICAR</th>
					<th>ELIMINAR</th>
					<th>DAR EN ADOPCION</th>
				</tr>
			</thead>';
		$cod_r=null;
		while($tabla=mysqli_fetch_array($resultado)){
		$cod=$tabla['codigo'];
		$nom=$tabla['nombre'];
		$tipo=$tabla['tipo'];
		$r=$tabla['raza'];
		$e=$tabla['edad'];
		$s=$tabla['sexo'];
		$fecha_i=$tabla['fecha_ingreso'];
		$cod_r=$tabla['codigo_reg'];
		if(is_null($cod_r))
			$cod_r="PARA ADOPTAR";
			echo '
			<tr>
			<td>'.$cod.'</td>
			<td>'.$nom.'</td>
			<td>'.$tipo.'</td>
			<td>'.$r.'</td>
			<td>'.$e.'</td>
			<td>'.$s.'</td>
			<td>'.$fecha_i.'</td>
			<td>'.$cod_r.'</td>
<td><a href="modificar/modifica_mascota.php?codigo='.$cod.'&nombre='.$nom.'&tipo='.$tipo.'&raza='.$r.'&edad='.$e.'&sexo='.$s.'&fecha_ingreso='.$fecha_i.'">Modificar</a></td>
<td><a href="eliminar/elimina_mascota.php?codigo='.$cod.'&nombre='.$nom.'&tipo='.$tipo.'&raza='.$r.'&edad='.$e.'&sexo='.$s.'&fecha_ingreso='.$fecha_i.'">Eliminar</a></td>';
if($cod_r=="PARA ADOPTAR")
	echo '
<td><a href="agregar/formulario_agregar_registro.php?codigo='.$cod.'&nombre='.$nom.'">Dar en Adopcion</a></td>';
else
	echo '
	<td>ADOPTADO</td>';
	echo '
	</tr> ';
}
	echo '</table>';
	echo "<br/><br/>";
}
	echo '<a href="sistema.html">Volver</a>';
}

}

?>
