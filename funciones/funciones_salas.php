<?php

function mostrar_salas($conecta) {
    echo '<link rel="stylesheet" href="css/tablas.css">';

    $consulta = "SELECT * FROM salas";
    $resultado = mysqli_query($conecta, $consulta);

    if (!$resultado) {
        echo "<p>ERROR, VUELVA A INTENTAR DE NUEVO</p>";
        return;
    }

    $filas = mysqli_num_rows($resultado);

    if ($filas == 0) {
        echo "<p>NO HAY DATOS</p>";
        echo '<a class="btn-crear" href="agregar/formulario_agregar_salas.html">Crear</a><br/><br/>';
    } else {
        echo '<h2>Administración Salas</h2>';
        echo '<div style="text-align: center;">';
        echo '<a class="btn-crear" href="agregar/formulario_agregar_sala.html">Crear</a>';
        echo '</div><br/>';

        echo '<table class="tabla-admin">
                <thead>
                    <tr>
                        <th>ID_SALA</th>
                        <th>NOMBRE SALA</th>
                        <th>TIPO</th>
                        <th>CAPACIDAD</th>
                        <th>ELIMINAR</th>
                        <th>MODIFICAR</th>
                    </tr>
                </thead>
                <tbody>';

        while ($tabla = mysqli_fetch_array($resultado)) {
            $id_sala     = $tabla['id_sala'];
            $nombre_sala = $tabla['nombre_sala'];
            $tipo        = $tabla['tipo'];
            $capacidad   = $tabla['capacidad'];
            
            echo '<tr>';
            echo '<td>' . $id_sala . '</td>';
            echo '<td>' . $nombre_sala . '</td>';
            echo '<td>' . $tipo . '</td>';
            echo '<td>' . $capacidad . '</td>';
            echo '<td class="celda-eliminar"><a href="eliminar/elimina_salas.php?id_sala=' . $id_sala . '&nombre_sala=' . $nombre_sala . '&tipo=' . $tipo . '&capacidad=' . $capacidad . '">Borrar</a></td>';
            echo '<td class="celda-modificar"><a href="modificar/modificar_salas.php?id_sala=' . $id_sala . '&nombre_sala=' . $nombre_sala . '&tipo=' . $tipo . '&capacidad=' . $capacidad . '">Modificar</a></td>';
            echo '</tr>';
        }

        echo '  </tbody>
              </table>';
        echo "<br/>";
    }

    echo '<a class="btn-volver" href="sistema.html">Volver</a>';
}

?>