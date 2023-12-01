<?php
//importacion de controladores y archivo con los juegos
require_once 'db/datos.php';
require_once 'controllers/ClienteController.php';
require_once 'controllers/JuegoController.php';
require_once 'controllers/CompraController.php';
//declaracion de variables globales
$GLOBALS['clientes'] = $datos['Clientes'];
$GLOBALS['juegos'] = $datos['Juegos'];
$GLOBALS['compras'] = $datos['Compras'];

//enrutador
if (isset($_GET['controller']) && isset($_GET['function'])) {
    //recoge variables de url y si existe la clase y el metodo indicados en la url los llama y estos cargan la pagina correspondiente
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
        include 'views/errors/404.php'; //sin no existe un controlador o una funcion manda a pagina de error
    }
} else {
    include 'views/index.php'; //si no hay variables en url manda a la pagina principal
}
