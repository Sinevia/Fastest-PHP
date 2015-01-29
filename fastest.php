<?php
function serve($actions = []) {
    $action = (isset($_REQUEST['a']) == true AND $_REQUEST['a'] !== '') ? $_REQUEST['a'] : $actions[0];
    if (in_array($action, $actions)) {
        if (function_exists($action)) {
            die(call_user_func($action));
        }
    }
    header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
}
?>
