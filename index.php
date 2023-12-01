<?php
require_once 'db/datos.php';
require_once 'controllers/ClienteController.php';
require_once 'controllers/JuegoController.php';
require_once 'controllers/CompraController.php';

$GLOBALS['clientes'] = $datos['Clientes'];
$GLOBALS['juegos'] = $datos['Juegos'];
$GLOBALS['compras'] = $datos['Compras'];

if (isset($_GET['controller']) && isset($_GET['function'])) {
    $controller = $_GET['controller'];
    $controller = $controller . 'Controller';
    $controller = ucfirst($controller);

    $function = $_GET['function'];

    if (class_exists($controller)) {
        if (method_exists($controller, $function)) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                call_user_func($controller . '::' . $function, $id);
            } else {
                call_user_func($controller . '::' . $function);
            }
        } else {
            echo 'No exsite función ' . $function;
        }
    } else {
        echo 'No existe controlador ' . $controller . ' o funcion ' . $function;
        include 'views/errors/404.php';
    }
} else {
    include 'views/index.php';
}
