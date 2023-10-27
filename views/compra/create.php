<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear cliente</title>
</head>

<body>
    <a href="?controller=cliente&function=index">Atras</a>
    <form method="post" action="?controller=compra&function=save">
        <label for="cliente_dni">dni</label>
        <input type="text" id="cliente_dni" name="cliente_dni"><br>
        <label for="juego_id">Id juego</label>
        <input type="text" id="juego_id" name="juego_id"><br>
        <label for="precio">precio</label>
        <input type="text" id="precio" name="precio"><br>
        <label for="cantidad">cantidad</label>
        <input type="text" id="cantidad" name="cantidad"><br>
        <label for="fecha">fecha</label>
        <input type="text" id="fecha" name="fecha"><br>

        <button id="enviar">Enviar</button>
    </form>
</body>

</html>