<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>compras</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <main>
        <a href="index.php">Atras</a>
        <a href="?controller=compra&function=create">Agregar compra</a>

        <table>
            <thead>
                <tr>
                    <th>Nombre cliente</th>
                    <th>Nombre juego</th>
                    <th>precio</th>
                    <th>precio total</th>
                    <th>cantidad</th>
                    <th>fecha</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $numero = 0;
                if (isset($compras)) {
                    $juegos = $GLOBALS['juegos'];
                    $clientes = $GLOBALS['clientes'];
                    foreach ($compras as $id => $value) { #por cada compra 1 fila con nombreCliente, nombreJuego, precio, precioTotal, cantidad y fecha

                        foreach ($juegos as $key => $categoria) {
                            foreach ($categoria as $key2 => $contenidoJuego) {
                                if ($contenidoJuego['id'] == $value['juego_id']) {
                                    $nombreJuego = $contenidoJuego['nombre'];
                                }
                            }
                        }
                        foreach ($clientes as $key2 => $value2) {
                            if ($value2['dni'] == $value['cliente_dni']) {
                                $nombreCliente = $value2['nombre'];
                            }
                        }


                        echo '<tr>';
                        echo '<td>' . $nombreCliente . '</td>';
                        echo '<td>' . $nombreJuego . '</td>';
                        echo '<td>' . $value['precio'] . '€</td>';
                        echo '<td>' . $value['precio'] * $value['cantidad'] . '€</td>';
                        echo '<td>' . $value['cantidad'] . '</td>';
                        echo '<td>' . $value['fecha'] . '</td>';
                        echo '<td><a href="?controller=compra&function=edit&id=' . $numero . '">Editar</a>';
                        echo '<a href="?controller=compra&function=destroy&id=' . $numero . '">Borrar</a></td>';
                        echo '</tr>';
                        $numero = $numero + 1;
                    }
                }

                ?>
            </tbody>
        </table>
    </main>
</body>

</html>