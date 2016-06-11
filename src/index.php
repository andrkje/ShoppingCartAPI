<?php

require_once 'APIController.php';


header('Content-Type: text/html; charset=utf-8');
header('Access-Control-Allow-Origin: *');

if (isset($_SERVER['PATH_INFO'])) {
    $request_method = $_SERVER['REQUEST_METHOD'];   // HTTP request method
    $path = explode('/', trim($_SERVER['PATH_INFO']));   // URI
    $body = json_decode(file_get_contents('php://input'), true);    // JSON

    $response = null;

    if (json_last_error() == JSON_ERROR_NONE) {
        $controller = new APIController($request_method, $path, $body);
        $response = $controller->getResult();
    } else {
        // TODO: return error
    }

    header(':', true, $response->getStatusCode());
    echo $response->getResponse();
}