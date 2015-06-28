<?php
$action = (isset($_REQUEST['a']) == true AND $_REQUEST['a'] !== '') ? $_REQUEST['a'] . '_action' : 'home_action';
if (function_exists($action)) {
    die (call_user_func($action));
} else {
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
}
?>