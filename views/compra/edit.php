<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar compra</title>
</head>

<body>

    <a href="?controller=compra&function=index">Atras</a>
    <form method="post" action="?controller=compra&function=update&id='<?php echo $id ?>">
        <label for=" cliente_dni">cliente_dni</label>
        <input value="<?php echo $compras[$id]['cliente_dni'] ?>" type="text" id="cliente_dni" name="cliente_dni"><br>
        <label for="juego_id">juego_id</label>
        <input value="<?php echo $compras[$id]['juego_id'] ?>" type="text" id="juego_id" name="juego_id"><br>
        <label for="precio">precio</label>
        <input value="<?php echo $compras[$id]['precio'] ?>" type="text" id="precio" name="precio"><br>
        <label for="cantidad">cantidad</label>
        <input value="<?php echo $compras[$id]['cantidad'] ?>" type="text" id="cantidad" name="cantidad"><br>
        <label for="fecha">fecha</label>
        <input value="<?php echo $compras[$id]['fecha'] ?>" type="text" id="fecha" name="fecha"><br>
        <button type="submit" id="enviar">Enviar</button>
    </form>
</body>

</html>