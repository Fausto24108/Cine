<?php

function mostrar_funciones($conecta) {
    echo '<link rel="stylesheet" href="css/tablas.css">';

    $consulta = "SELECT * FROM funciones";
    $resultado = mysqli_query($conecta, $consulta);

    if (!$resultado) {
        echo "<p>ERROR, VUELVA A INTENTAR DE NUEVO</p>";
        return;
    }

    $filas = mysqli_num_rows($resultado);

    if ($filas == 0) {
        echo "<p>NO HAY DATOS</p>";
        echo '<a class="btn-crear" href="agregar/formulario_agregar_funciones.html">Crear</a><br/><br/>';
    } else {
        echo '<h2>Administración Funciones</h2>';
        echo '<div style="text-align: center;">';
        echo '<a class="btn-crear" href="agregar/formulario_agregar_funciones.html">Crear</a>';
        echo '</div><br/>';

        echo '<table class="tabla-admin">
                <thead>
                    <tr>
                        <th>ID_FUNCION</th>
                        <th>ID_PELICULA</th>
                        <th>ID_SALA</th>
                        <th>HORARIO</th>
                        <th>PRECIO_ENTRADA</th>
                        <th>ELIMINAR</th>
                        <th>MODIFICAR</th>
                    </tr>
                </thead>
                <tbody>';

        while ($tabla = mysqli_fetch_array($resultado)) {
            $id_funcion     = $tabla['id_funcion'];
            $id_pelicula    = $tabla['id_pelicula'];
            $id_sala        = $tabla['id_sala'];
            $horario        = $tabla['horario'];
            $precio_entrada = $tabla['precio_entrada'];
            
            echo '<tr>';
            echo '<td>' . $id_funcion . '</td>';
            echo '<td>' . $id_pelicula . '</td>';
            echo '<td>' . $id_sala . '</td>';
            echo '<td>' . $horario . '</td>';
            echo '<td>' . $precio_entrada . '</td>';
            echo '<td class="celda-eliminar"><a href="eliminar/eliminar_funciones.php?id_funcion=' . $id_funcion . '&id_pelicula=' . $id_pelicula . '&id_sala=' . $id_sala . '&horario=' . $horario . '&precio_entrada=' . $precio_entrada . '">Borrar</a></td>';
            echo '<td class="celda-modificar"><a href="modificar/modificar_funciones.php?id_funcion=' . $id_funcion . '&id_pelicula=' . $id_pelicula . '&id_sala=' . $id_sala . '&horario=' . $horario . '&precio_entrada=' . $precio_entrada . '">Modificar</a></td>';
            echo '</tr>';
        }

        echo '  </tbody>
              </table>';
        echo "<br/>";
    }

    echo '<a class="btn-volver" href="sistema.html">Volver</a>';
}

?>