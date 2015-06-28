<?php

include_once 'fastest.seo.php';

/**
 * Route / or /home
 */
function home_action() {
    return '<h1>Home Page</h1>';
}

/**
 * Route /about
 */
function about_action() {
    return '<h1>About Page<h1>';
}

/**
 * Route /contact/form
 */
function contact_form_action() {
    return '<h1>Contact Form Page<h1>';
}

?>
