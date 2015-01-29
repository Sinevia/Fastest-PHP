<?php
include 'fastest.min.php';

server(['home','about']); // First action is default

/**
 * Route /
 */
function home(){
    return 'Hello world';
}

/**
 * Route /?a=about
 */
function about(){
    return 'Fastest PHP Framework';
}
?>
