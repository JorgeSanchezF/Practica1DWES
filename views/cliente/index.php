<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <main>
        <a href="index.php">Atras</a>
        <a href="?controller=cliente&function=create">Agregar cliente</a>

        <a id="boton" href="?controller=cliente&function=ascendente">Ascendente</a>
        <a id="boton" href="?controller=cliente&function=descendente">Descendente</a>

        <table>
            <thead>

                <tr>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>TELF</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($clientes)) {
                    foreach ($clientes as $id => $value) {
                        echo '<tr>';
                        echo '<td>' . $value['nombre'] . '</td>';
                        echo '<td>' . $value['dni'] . '</td>';
                        echo '<td>' . $value['telefono'] . '</td>';
                        echo '<td>' . $value['correo'] . '</td>';
                        echo '<td><a href="?controller=cliente&function=edit&id=' . $id . '">Editar</a>';
                        echo '<td><a href="?controller=cliente&function=destroy&id=' . $id . '">Borrar</a></td>';
                        echo '</tr>';
                    }
                }

                ?>
            </tbody>
        </table>
    </main>
</body>

</html>