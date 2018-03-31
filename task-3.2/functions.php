<?php
function parseRequest() 
{
    $requestPath = $_SERVER['REQUEST_URI'];
    
    if (substr($requestPath, 0, strlen(APP_ROOT . '/')) != APP_ROOT . '/') {
        die('APP_ROOT is incorrectly defined in config.php');
    }

    $requestPath = substr($requestPath, strlen(APP_ROOT));
    $requestParts = explode('/', $requestPath);

    // Extract the controller from {controller}/{action}/{params}
   // $controller = DEFAULT_CONTROLLER;
   // if (count($requestParts) >= 2 && $requestParts[1] != '') {
   //     $controller = $requestParts[1];
   // }

    // Extract the action from {controller}/{action}/{params}
    $action = DEFAULT_ACTION;
    if (count($requestParts) >= 3 && $requestParts[2] != '') {
        $action = $requestParts[2];
    }

    // Extract the action parameters from {controller}/{action}/{params}
    $params = array_splice($requestParts, 3);

    $requestParsed = [
       // 'controller' => $controller,
        'action' => $action,
        'params' => $params];
    return $requestParsed;
}
?>