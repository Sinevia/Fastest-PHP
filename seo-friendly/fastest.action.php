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

function fastest_action() {
    $uri = trim(fastest_get_uri(), '/');
    $action = 'home_action';
    if ($uri != '') {
        $chunks = explode('/', $uri);
        $action = array_pop($chunks).'_action';
    }
    if (function_exists($action)) {
        die(call_user_func($action));
    } else {
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    }
}

die(fastest_action())
?>