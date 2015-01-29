<?php

function fastest_get_uri() {
    if (isset($_SERVER['PATH_INFO'])) {
        return $_SERVER['PATH_INFO'];
    }
    // 1. Uri
    $uri = $_SERVER['REQUEST_URI'];
    // 2. Remove normal query string
    $uri = (strpos($uri, '?') !== false) ? substr($uri, 0, strpos($uri, '?')) : $uri;
    if (stripos($uri, '/' . $_SERVER['SCRIPT_NAME']) === false) {
        return '/';
    }
    // Does URI start with dir name?
    $dir_name = dirname($_SERVER['SCRIPT_NAME']);
    $uri = (stripos($uri, str_replace(DIRECTORY_SEPARATOR, "/", $dir_name), 0) === 0) ? substr($uri, strlen($dir_name)) : $uri;
    return $uri;
}

function fastest_controller() {
    $uri = trim(fastest_get_uri(), '/');
    $controllerName = 'Index';
    $methodName = 'home';
    if ($uri != '') {
        $action = explode('/', $uri);
        if (count($action) > 1) {
            $controllerName = $action[0];
            $methodName = $action[1];
        } else {
            $controllerName = $action[0];
        }
    }
    $controllerName .= 'Controller';
    try {
        $refl = new \ReflectionMethod($controllerName, $methodName);
        if ($refl->isPublic()) {
            $class = new $controllerName;
            return $class->$methodName();
        }
    } catch (Exception $e) {
        return 'Controller/Method not found';
    }
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
}

die(fastest_controller());
?>
