<?php
include 'fastest.min.php';

server([
    '/' => 'home', // using function
    '/about/' => 'Application@about', // using method in a class
    '/admin/' => 'Admin', // using method in a class
    '/admin/:string' => 'Admin', // catch-all using method in a class
    '/admin/blog' => 'AdminBlog', // using method in a class
    '/admin/blog/:string' => 'AdminBlog', // catch-all using method in a class
]);

/**
 * Route /
 */
function home() {
    return 'Hello world';
}

/**
 * Route /about/
 */
class Application {

    function about() {
        return 'Fastest PHP Framework';
    }

}

/**
 * Route /admin/
 */
class Admin {

    function home() {
        return 'Admin@home';
    }

    function hello() {
        return 'Admin@hello';
    }

}

/**
 * Route /admin/event
 */
class AdminEvent {

    function home() {
        return 'AdminEvent@home';
    }

    function hello() {
        return 'AdminEvent@hello';
    }

}
?>
?>
