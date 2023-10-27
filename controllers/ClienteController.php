<?php
require_once 'controllers/Controller.php';
require_once 'db/datos.php';
class ClienteController implements Controller
{

    public static function index()
    {
        $clientes = $GLOBALS['clientes'];
        if (isset($GLOBALS['error'])) {
            $error = $GLOBALS['error'];
        }

        include 'views/cliente/index.php';
    }
    public static function create()
    {
        include 'views/cliente/create.php';
    }
    public static function save() #funciona
    {
        require_once 'db/datos.php';
        $clientes = $GLOBALS['clientes'];
        $mayorId = 0;
        foreach ($clientes as $key => $cliente) { #recorro array clientes para saber la clave del nuevo cliente (el mayor id +1)
            $id = intval($key);
            if ($id > $mayorId) {
                $mayorId = $id;
                $lastId = $id;
            }
        }
        $nombre = $_POST['nombre'];
        $dni = $_POST['dni'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];

        $nuevoId = strval($lastId + 1); #valor de la key del nuevo cliente
        $lastId = $lastId + 1;
        $nuevoCliente = array( #construyo el nuevo cliente
            'nombre' => $nombre,
            'dni' => $dni,
            'telefono' => $telefono,
            'correo' => $correo
        );


        array_push($clientes, $nuevoCliente);


        include 'views/cliente/index.php';
    }
    public static function edit($id)
    {
        $clientes = null;
        $clientes = $GLOBALS['clientes'];
        foreach ($clientes as $key => $value) {
            if ($key == $id) {
                $clientes = $value;
            }
        }

        include 'views/cliente/edit.php';
    }
    public static function update($id) #no edita
    {
        $clientes = $GLOBALS['clientes'];

        $nuevoNombre = $_POST['nombre'];
        $nuevoDni = $_POST['dni'];
        $nuevoTelefono = $_POST['telefono'];
        $nuevoCorreo = $_POST['correo'];


        foreach ($clientes as $key => $value) {
            if ($key == $id) {
                $value['nombre'] = $nuevoNombre;
                $value['dni'] = $nuevoDni;
                $value['telefono'] = $nuevoTelefono;
                $value['correo'] = $nuevoCorreo;
            }
        }

        ClienteController::index();
    }
    public static function destroy($id)
    {
        if (array_key_exists($id, $GLOBALS['clientes'])) {

            unset($GLOBALS['clientes'][$id]);
        } else {
            # Aqui la respuesta cuando no existe y por tanto no puedo eliminar
            $GLOBALS['error'] = "No se encuentra al cliente";
        }
        ClienteController::index();
    }

    public static function ascendente() #funciona
    {
        $clientes = $GLOBALS['clientes'];
        ksort($clientes);
        include 'views/cliente/index.php';
    }
    public static function descendente() #funciona
    {
        $clientes = $GLOBALS['clientes'];
        krsort($clientes);
        include 'views/cliente/index.php';
    }
}
