<?php

require_once 'controllers/Controller.php';
require_once 'db/datos.php';


class CompraController implements Controller
{
    public static function index()
    {
        require_once 'db/datos.php';
        $compras = $GLOBALS['compras'];
        if (isset($GLOBALS['error'])) {
            $error = $GLOBALS['error'];
        }

        include 'views/compra/index.php';
    }
    public static function create()
    {

        include 'views/compra/create.php';
    }
    public static function save() #funciona
    {
        require_once 'db/datos.php';
        $compras = $GLOBALS['compras'];

        $nuevoCliente_dni = $_POST['cliente_dni'];
        $nuevoJuego_id = $_POST['juego_id'];
        $nuevoPrecio = $_POST['precio'];
        $nuevoCantidad = $_POST['cantidad'];
        $nuevoFecha = $_POST['fecha'];

        $nuevaCompra = array(
            'cliente_dni' => $nuevoCliente_dni,
            'juego_id' => $nuevoJuego_id,
            'precio' => $nuevoPrecio,
            'cantidad' => $nuevoCantidad,
            'fecha' => $nuevoFecha
        );
        array_push($compras, $nuevaCompra);

        include 'views/compra/index.php';
    }
    public static function edit($id)
    {
        $compras = null;
        $compras = $GLOBALS['compras'];


        include 'views/compra/edit.php';
    }
    public static function update($id) #no edita
    {

        $compras = $GLOBALS['compras'];
        $id = $_GET['id'];
        $cliente_dni = $_POST['cliente_dni'];
        $juego_id = $_POST['juego_id'];
        $precio = $_POST['precio'];
        $cantidad = $_POST['cantidad'];
        $fecha = $_POST['fecha'];

        foreach ($compras as $key => $value) {
            if ($key == $id) {
                $value['cliente_dni'] = $cliente_dni;
                $value['juego_id'] = $juego_id;
                $value['precio'] = $precio;
                $value['cantidad'] = $cantidad;
                $value['fecha'] = $fecha;
            }
        }
        CompraController::index();
    }
    public static function destroy($id)
    {
        if (array_key_exists($id, $GLOBALS['compras'])) {

            unset($GLOBALS['compras'][$id]);
        } else {
            #si no existe manda error y no elimina
            $GLOBALS['error'] = "No se encuentra la compra";
        }
        CompraController::index();
    }

    public static function categoria()
    {
        $compras = $GLOBALS['compras'];


        include 'views/compra/index.php';
    }
}
