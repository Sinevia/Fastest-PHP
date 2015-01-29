<?php
include 'fastest.min.php';

server([
    '/'=>'home',                   // using function
    '/about/'=>'Application@about' // using method in a class
]);

/**
 * Route /
 */
function home(){
    return 'Hello world';
}

/**
 * Route /about/
 */
class Application{
    function about(){
        return 'Fastest PHP Framework';
    }
}
?>
