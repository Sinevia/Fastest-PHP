<?php
define('BOOTSTRAP_TIME_START', microtime(true));
$action = (isset($_REQUEST['a']) == true AND $_REQUEST['a'] !== '') ? $_REQUEST['a'] . '_action' : 'home_action';
if (function_exists($action)) {
    define('BOOTSTRAP_TIME_END', microtime(true));
    echo 'BOOT RUNTIME: ' . round(BOOTSTRAP_TIME_END - BOOTSTRAP_TIME_START, 5) . 's.<br />';
    echo (call_user_func($action));
} else {
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
}
echo '<br />TOTAL RUNTIME: ' . round(microtime(true) - BOOTSTRAP_TIME_START, 5) . 's.<br />';


function home_action() {
    echo 'APP RUNTIME: ' . round(microtime(true) - BOOTSTRAP_TIME_END, 5) . 's.<br />';
    echo 'Hello World';
}
?>