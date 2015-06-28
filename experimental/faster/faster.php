<?php

function serve($routemap) {

    function findRoute($routemap) {
        $tokens = array(
            ':string' => '([a-zA-Z]+)',
            ':number' => '([0-9]+)',
            ':alpha' => '([a-zA-Z0-9-_]+)'
        );
        krsort($routemap);
        foreach ($routemap as $index => $action) {
            $pattern = strtr($index, $tokens);
            if (preg_match('#^/?' . $pattern . '/?$#', getUri(), $matches)) {
                return array($index, $matches);
            }
        }
        return null;
    }

    function getUri() {
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

    $result = findRoute($routemap);

    if ($result != null) {
        $action = $routemap[$result[0]];
        $actions = explode('@', $action);
        $params = $result[1];
        array_shift($params);
        if (count($actions) > 1) {
            die(call_user_func_array([new $actions[0], $actions[1]], $params));
        } else {
            if (function_exists($actions[0])) {
                die(call_user_func_array($actions[0], $params));
            }
            $class = $actions[0];
            if (isset($actions[1]) == false AND class_exists($class)) {
                $method = count($params) > 0 ? $params[0] : 'home';
                try {
                    $reflectionMethod = new ReflectionMethod($class, $method);
                    if ($reflectionMethod->isPublic() == true) {
                        die($reflectionMethod->invokeArgs(new $class, $params));
                    }
                } catch (Exception $e) {
                     
                }
            }
        }
    }

    die('404 - Page Not Found');
}

?>