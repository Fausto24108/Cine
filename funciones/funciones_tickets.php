<?php

function mostrar_tickets($conecta) {
    echo '<link rel="stylesheet" href="css/tablas.css">';

    $consulta = "SELECT * FROM tickets";
    $resultado = mysqli_query($conecta, $consulta);

    if (!$resultado) {
        echo "<p>ERROR, VUELVA A INTENTAR DE NUEVO</p>";
        return;
    }

    $filas = mysqli_num_rows($resultado);

    if ($filas == 0) {
        echo "<p>NO HAY DATOS</p>";
        echo '<a class="btn-crear" href="agregar/formulario_agregar_tickets.html">Crear</a><br/><br/>';
    } else {
        echo '<h2>Administración Tickets</h2>';
        echo '<div style="text-align: center;">';
        echo '<a class="btn-crear" href="agregar/formulario_agregar_tickets.html">Crear</a>';
        echo '</div><br/>';

        echo '<table class="tabla-admin">
                <thead>
                    <tr>
                        <th>ID TICKET</th>
                        <th>ID BUTACA</th>
                        <th>ID FUNCION</th>
                        <th>NOMBRE CLIENTE</th>
                        <th>CORREO</th>
                        <th>TOTAL</th>
                        <th>ELIMINAR</th>
                        <th>MODIFICAR</th>
                    </tr>
                </thead>
                <tbody>';

        while ($tabla = mysqli_fetch_array($resultado)) {
            $id_ticket      = $tabla['id_ticket'] ?? '';
            $id_butaca      = $tabla['id_butaca'] ?? '';
            $id_funcion     = $tabla['id_funcion'] ?? '';
            $nombre_cliente = $tabla['nombre_cliente'] ?? '';
            $correo         = $tabla['correo'] ?? '';
            $total          = $tabla['total'] ?? '';

            echo '<tr>';
            echo '<td>' . $id_ticket . '</td>';
            echo '<td>' . $id_butaca . '</td>';
            echo '<td>' . $id_funcion . '</td>';
            echo '<td>' . $nombre_cliente . '</td>';
            echo '<td>' . $correo . '</td>';
            echo '<td>' . $total . '</td>';
            echo '<td class="celda-eliminar"><a href="eliminar/elimina_tickets.php?id_ticket=' . $id_ticket . '&id_butaca=' . $id_butaca . '&id_funcion=' . $id_funcion . '&nombre_cliente=' . urlencode($nombre_cliente) . '&correo=' . urlencode($correo) . '&total=' . $total . '">Borrar</a></td>';
            echo '<td class="celda-modificar"><a href="modificar/modificar_tickets.php?id_ticket=' . $id_ticket . '&id_butaca=' . $id_butaca . '&id_funcion=' . $id_funcion . '&nombre_cliente=' . urlencode($nombre_cliente) . '&correo=' . urlencode($correo) . '&total=' . $total . '">Modificar</a></td>';
            echo '</tr>';
        }

        echo '  </tbody>
              </table>';
        echo "<br/>";
    }

    echo '<a class="btn-volver" href="sistema.html">Volver</a>';
}

?>