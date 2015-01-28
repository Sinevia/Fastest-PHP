function app($routemap) {

    function findRoute($routemap, $route) {
        $tokens = array(
            ':string' => '([a-zA-Z]+)',
            ':number' => '([0-9]+)',
            ':alpha' => '([a-zA-Z0-9-_]+)'
        );
        foreach ($routemap as $index => $action) {
            $pattern = strtr($index, $tokens);
            if (preg_match('#^/?' . $pattern . '/?$#', $route, $matches)) {
                return array($index, $matches);
            }
        }
        return null;
    }

    $path = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : $_SERVER['REQUEST_URI'];
    $result = findRoute($routemap, $path);

    if ($result != null) {
        $action = $routemap[$result[0]];
        $actions = explode('@', $action);
        $params = $result[1];
        array_shift($params);
        if (count($actions) > 1) {
            die(call_user_func_array([new $actions[0], $actions[1]], $params));
        } else {
            die(call_user_func_array($actions[0], $params));
        }
    }

    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
}
