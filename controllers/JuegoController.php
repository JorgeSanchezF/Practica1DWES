<?php
require_once 'controllers/Controller.php';
require_once 'db/datos.php';
class JuegoController implements Controller
{
    public static function index()
    {
        $juegos = $GLOBALS['juegos'];
        if (isset($GLOBALS['error'])) {
            $error = $GLOBALS['error'];
        }
        include 'views/juego/index.php';
    }
    public static function create()
    {
        include 'views/juego/create.php';
    }
    public static function save()
    {
        $juegos = $GLOBALS['juegos'];
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];
        $precio = $_POST['precio'];

        if ($id > 10) {
            $categoria = 'Accion';
        }
        if ($id < 6 & $id > 5) {
            $categoria = 'Aventura';
        }
        if ($id < 6) {
            $categoria = 'Deportes';
        }
        $nuevojuego = array(
            'id' => $id,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'stock' => $stock,
            'precio' => $precio
        );

        array_push($juegos[$categoria], $nuevojuego);
        include 'views/juego/index.php';
    }
    public static function edit($id)
    {
        /*$juegos = null;
        $juegos = $GLOBALS['juegos'];
        if ($id > 10) {
            $categoria = 'Accion';
        }
        if ($id < 6 & $id > 5) {
            $categoria = 'Aventura';
        }
        if ($id < 6) {
            $categoria = 'Deportes';
        }
        foreach ($juegos[$categoria] as $key => $value) {
            if ($key == $id) {
                $juegos = $value;
            }
        }*/
        $juegos = $GLOBALS['juegos'];
        if ($id > 10) {
            $categoria = 'Accion';
        }
        if ($id < 6 & $id > 5) {
            $categoria = 'Aventura';
        }
        if ($id < 6) {
            $categoria = 'Deportes';
        }

        foreach ($juegos[$categoria] as $key => $value) {
            if ($id == $value['id']) {
                $juegos = $value;
            }
        }

        include 'views/juego/edit.php';
    }
    public static function update($id) #no edita
    {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];
        $precio = $_POST['precio'];


        foreach ($GLOBALS['juegos'] as $key => $value) {
            if ($key == $id) {
                $GLOBALS['juegos'][$key]['nombre'] = $nombre;
                $GLOBALS['juegos'][$key]['descripcion'] = $descripcion;
                $GLOBALS['juegos'][$key]['stock'] = $stock;
                $GLOBALS['juegos'][$key]['precio'] = $precio;
            }
        }
        JuegoController::index();
    }
    public static function destroy($id)
    {
        if (array_key_exists($id, $GLOBALS['juegos'])) {

            unset($GLOBALS['juegos'][$id]);
        } else {
            # Aqui la respuesta cuando no existe y por tanto no puedo eliminar
            $GLOBALS['error'] = "No se encuentra al juego";
        }
        JuegoController::index();
    }

    public static function precio() #no funciona
    {
        $juegos = $GLOBALS['juegos'];
        $aux = array();
        $sacado = 0;
        foreach ($juegos as $categoria => $juego) {
            array_push($aux, $juego);
            unset($juego);
        }
        usort($aux, $aux['precio']); #no funciona
        $juegos = array();
        foreach ($aux as $key => $value) {
            switch ($value['id']) {
                case $value['id'] < 6 & $value['id'] > 0:
                    array_push($juegos['Deportes']);
                    break;
                case $value['id'] < 16 & $value['id'] > 10:
                    array_push($juegos['Aventura']);
                    break;
                case $value['id'] > 5 & $value['id'] < 11:
                    array_push($juegos['Accion']);
                    break;
            }
        }

        include 'views/juego/index.php';
    }

    public static function categoria() #funciona?
    {
        $juegos = $GLOBALS['juegos'];

        asort($juegos);

        include 'views/juego/index.php';
    }
}
