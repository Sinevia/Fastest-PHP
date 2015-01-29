<?php
include_once 'fastest.controller.php';

class IndexController{
    /**
     * Route / or /index or /index/home
     * @return string
     */
    public function home(){
        return 'Hello World';
    }
}

class BooksController{
    /**
     * Route /books or /books/home
     * @return string
     */
    public function home(){
        return 'Hello World';
    }
}
?>
