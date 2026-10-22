<?php

function mostrar_peliculas($conecta) {
    $consulta = "SELECT * FROM peliculas";
    $resultado = mysqli_query($conecta, $consulta);

    if (!$resultado) {
        echo "<p>ERROR, VUELVA A INTENTAR DE NUEVO</p>";
        return;
    }

    $filas = mysqli_num_rows($resultado);

    if ($filas == 0) {
        echo "<p>NO HAY DATOS</p>";
        echo '<a href="agregar/formulario_agregar_peliculas.html">Crear</a><br/><br/>';
    } else {
        echo '<h2>PELICULAS</h2><br/><br/>';
        echo '<a href="agregar/formulario_agregar_peliculas.html">Crear</a><br/><br/>';
        echo '<table border="1">
                <thead>
                    <tr>
                        <th>ID_PELICULA</th>
                        <th>TITULO</th>
                        <th>DESCRIPCION</th>
                        <th>IMAGEN</th>
                        <th>MODIFICAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>';

        while ($tabla = mysqli_fetch_array($resultado)) {
            $id_pelicula  = $tabla['id_pelicula'];
            $titulo    = $tabla['titulo'];
            $descripcion = $tabla['descripcion'];
            $imagen     = $tabla['imagen'];
            
            echo '<tr>';
            echo '<td>' . $id_pelicula . '</td>';
            echo '<td>' . $titulo . '</td>';
            echo '<td>' . $descripcion . '</td>';
            echo '<td><img src="uploads/' . $imagen . '"width="200" style="height: auto;"></td>';
            echo '<td><a href="modificar/modificar_peliculas.php?id_pelicula=' . $id_pelicula . '&titulo=' . $titulo . '&descripcion=' . $descripcion . '&imagen=' . $imagen . '">Modificar</a></td>';
            echo '<td><a href="eliminar/elimina_peliculas.php?id_pelicula=' . $id_pelicula . '&titulo=' . $titulo . '&descripcion=' . $descripcion . '&imagen=' . $imagen . '">Eliminar</a></td>';
            echo '</tr>';
        }

        echo '  </tbody>
              </table>';
        echo "<br/><br/>";
    }

    echo '<a href="sistema.html">Volver</a>';
}

?>