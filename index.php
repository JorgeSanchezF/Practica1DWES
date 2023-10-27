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
    $controller = $controller . 'Controller'; #forma el contolador (ej: cliente->clienteController)
    $controller = ucfirst($controller); #primera letra mayuscula (ej: clienteController->ClienteController)

    $function = $_GET['function'];

    if (class_exists($controller)) {
        if (method_exists($controller, $function)) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                call_user_func($controller . '::' . $function, $id); #envia a controlador y ejecuta funcion que necesita id
            } else {
                call_user_func($controller . '::' . $function); #envia a controlador y ejecuta funcion que no necesita id
            }
        } else {
            echo 'No exsite función ' . $function; #no existe la funcion definida
        }
    } else {
        echo 'No existe controlador ' . $controller;
        include 'views/errors/404.php'; #no existe el controlador definido
    }
} else {
    include 'views/index.php'; #index simple
}
