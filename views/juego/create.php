<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear juego</title>
</head>

<body>
    <a href="?controller=juego&function=index">Atras</a>
    <form method="post" action="?controller=juego&function=save">
        <label for="id">id</label>
        <input type="text" id="id" name="id"><br>
        <label for="nombre">nombre</label>
        <input type="text" id="nombre" name="nombre"><br>
        <label for="descripcion">descripcion</label>
        <input type="text" id="descripcion" name="descripcion"><br>
        <label for="stock">stock</label>
        <input type="text" id="stock" name="stock"><br>
        <label for="precio">precio</label>
        <input type="text" id="precio" name="precio"><br>

        <button id="enviar">Enviar</button>
    </form>
</body>

</html>