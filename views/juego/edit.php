<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar juego</title>
</head>

<body>
    <a href="?controller=juego&function=index">Atras</a>
    <form method="post" action="?controller=juego&function=update&id='<?php echo $id ?>">
        <label for="nombre">nombre</label>
        <input value="<?php echo $juegos['nombre'] ?>" type="text" id="nombre" name="nombre"><br>
        <label for="descripcion">descripcion</label>
        <input value="<?php echo $juegos['descripcion'] ?>" type="text" id="descripcion" name="descripcion"><br>
        <label for="stock">stock</label>
        <input value="<?php echo $juegos['stock'] ?>" type="text" id="stock" name="stock"><br>
        <label for="precio">precio</label>
        <input value="<?php echo $juegos['precio'] ?>" type="text" id="precio" name="precio"><br>
        <button type="submit" id="enviar">Enviar</button>
    </form>
</body>

</html>