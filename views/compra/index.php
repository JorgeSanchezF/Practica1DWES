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
                    <th>DNI cliente</th>
                    <th>id juego</th>
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
                    foreach ($compras as $id => $value) {
                        if ($value['juego_id'] > 11) {
                            $categoria = 'Acción';
                        }
                        if ($value['juego_id'] < 11 && $value['juego_id'] > 5) {
                            $categoria = 'Aventura';
                        }
                        if ($value['juego_id'] < 6) {
                            $categoria = 'Deporte';
                        }

                        echo '<tr>';
                        echo '<td>' . $value['cliente_dni'] . '</td>';
                        echo '<td>' . $categoria . '</td>';
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