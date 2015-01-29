<?php
include 'fastest.min.php';

/**
 * Route / or /?a=home
 */
function home_action(){
    return 'Hello world';
}

/**
 * Route /?a=about
 */
function about_action(){
    return 'Fastest PHP Framework';
}
?>
