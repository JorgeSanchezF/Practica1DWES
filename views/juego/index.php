<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juegos</title>
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <main>
        <a href="index.php">Atras</a>
        <a href="?controller=juego&function=create">Agregar juego</a>
        <a id="boton" href="?controller=juego&function=categoria">Ordenar por categoria</a>
        <a id="boton" href="?controller=juego&function=precio">Ordenar por precio</a>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>tipo</th>
                    <th>descripcion</th>
                    <th>stock</th>
                    <th>precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($juegos)) {
                    foreach ($juegos as $id => $value) {
                        foreach ($value as $key => $value2) {
                            echo '<tr>';
                            echo '<td>' . $value2['nombre'] . '</td>';
                            echo '<td>' . $id . '</td>';
                            echo '<td>' . $value2['descripcion'] . '</td>';
                            echo '<td>' . $value2['stock'] . '</td>';
                            echo '<td>' . $value2['precio'] . '€</td>';
                            echo '<td><a href="?controller=juego&function=edit&id=' . $value2['id'] . '">Editar</a>';
                            echo '<td><a href="?controller=juego&function=destroy&id=' . $value2['id'] . '">Borrar</a></td>';
                            echo '</tr>';
                        }
                    }
                }

                ?>
            </tbody>
        </table>
    </main>
</body>

</html>