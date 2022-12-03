<?php

class App {
    private $controller = 'home';
    private $method = 'index';
    private $params = [];

    public function __construct() {
        $url = $this->parseUrl();

        // change default controller (home) if file / page exist
        if (isset($url[0]) && file_exists("../app/controllers/" . $url[0] . ".php")) {
            $this->controller = $url[0];

            // clearing array to see params only
            unset($url[0]);
        }

        // requiring the controller
        require_once '../app/controllers/' . $this->controller . '.php';

        // parsing controller from string to object
        $this->controller = new $this->controller;

        // change default method (index) if the method exist in the controllers class
        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];

            // clearing array to see params only
            unset($url[1]);
        }

        // to check if url has params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // execute or calling the page
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
    }
}