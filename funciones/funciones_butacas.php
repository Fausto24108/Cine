<?php

function mostrar_butacas($conecta) {
    // Incluir la hoja de estilos en la cabecera
    echo '<link rel="stylesheet" href="css/tablas.css">';

    $consulta = "SELECT * FROM butacas";
    $resultado = mysqli_query($conecta, $consulta);

    if (!$resultado) {
        echo "<p>ERROR, VUELVA A INTENTAR DE NUEVO</p>";
        return;
    }

    $filas = mysqli_num_rows($resultado);

    if ($filas == 0) {
        echo "<p>NO HAY DATOS</p>";
        echo '<a class="btn-crear" href="agregar/formulario_agregar_butaca.html">Crear</a><br/><br/>';
    } else {
        echo '<h2>Administración Butacas</h2>';
        echo '<div style="text-align: center;">';
        echo '<a class="btn-crear" href="agregar/formulario_agregar_butaca.html">Crear</a>';
        echo '</div><br/>';
        
        echo '<table class="tabla-admin">
                <thead>
                    <tr>
                        <th>ID_BUTACA</th>
                        <th>ID_SALA</th>
                        <th>NRO_ASIENTO</th>
                        <th>ESTADO</th>
                        <th>ELIMINAR</th>
                        <th>MODIFICAR</th>
                    </tr>
                </thead>
                <tbody>';

        while ($tabla = mysqli_fetch_array($resultado)) {
            $id_butaca   = $tabla['id_butaca'];
            $id_sala     = $tabla['id_sala'];
            $nro_asiento = $tabla['nro_asiento'];
            $estado      = $tabla['estado'];
            
            echo '<tr>';
            echo '<td>' . $id_butaca . '</td>';
            echo '<td>' . $id_sala . '</td>';
            echo '<td>' . $nro_asiento . '</td>';
            echo '<td>' . $estado . '</td>';
            echo '<td class="celda-eliminar"><a href="eliminar/elimina_butacas.php?id_butaca=' . $id_butaca . '&id_sala=' . $id_sala . '&nro_asiento=' . $nro_asiento . '&estado=' . $estado . '">Borrar</a></td>';
            echo '<td class="celda-modificar"><a href="modificar/modificar_butacas.php?id_butaca=' . $id_butaca . '&id_sala=' . $id_sala . '&nro_asiento=' . $nro_asiento . '&estado=' . $estado . '">Modificar</a></td>';
            echo '</tr>';
        }

        echo '  </tbody>
              </table>';
        echo "<br/>";
    }

    echo '<a class="btn-volver" href="sistema.html">Volver</a>';
}

?>