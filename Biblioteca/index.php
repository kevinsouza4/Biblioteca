<?php

include 'database/databaseconnect.php';

spl_autoload_register(function ($class) {
    $class_file = __DIR__ . '/app/controllers/' . $class . '.php';
    if (file_exists($class_file)) {
        include $class_file;
    }
});

$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
$uri_segments = explode('/', $request_uri[0]);

$controller_name = null;
$action = null;

if (isset($_GET['operation']) && isset($_GET['entity'])) {
    $operation = $_GET['operation'];
    $entity = $_GET['entity'];

    $controller_name_candidate = ucfirst($entity) . 'Controller';
    $controller_file_path = __DIR__ . '/app/controllers/' . $controller_name_candidate . '.php';

    if (file_exists($controller_file_path)) {
        $controller_name = $controller_name_candidate;

        switch ($operation) {
            case 'cadastrar':
                include 'app/views/' . $entity . '/cadastrar.php';
                break;
            case 'listar':
                $controller = new $controller_name($conn);
                $controller->listar();
                break;
            case 'editar':
                $id = isset($_GET['id']) ? $_GET['id'] : null;
                $controller = new $controller_name($conn);
                $controller->editar($id);
                break;
            case 'visualizar':
                $id = isset($_GET['id']) ? $_GET['id'] : null;
                $controller = new $controller_name($conn);
                $controller->visualizar($id);
                break;
            default:
                echo "Operação inválida.";
                break;
        }
    } else {
        echo "Controller not found.";
    }
} else {
    include 'app/views/home.php';
}

?>
