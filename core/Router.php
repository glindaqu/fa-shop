<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/controllers/AuthorizeController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/controllers/CatalogController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/controllers/CartController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/View.php";

class Router
{
    private string $controller = "statistic";
    private string $action = "index";

    public function __construct()
    {
        $params = [];
        $splitted = explode("/", $_SERVER['REQUEST_URI']);
        $given_controller = trim($splitted[1]);

        $given_action = "";

        if (isset($splitted[2])) {
            $given_action = trim($splitted[2]);
        }

        if ($given_action !== '') {
            $this->action = $given_action;
        }

        if ($given_controller !== '') {
            $this->controller = $given_controller;
        }

        if (isset($splitted[3])) {
            foreach (explode("&", $splitted[3]) as $param_str) {
                $params[explode("=", $param_str)[0]] = explode("=", $param_str)[1];
            }
        }

        $this->navigate($params);
    }

    public function navigate(array $params): void
    {
        $path = ucfirst($this->controller . 'Controller');
        if (!class_exists($path) || !method_exists($path, $this->action)) {
            View::page_not_found();
            exit;
        }
        // if ($path == "AuthorizeController" || AuthorizeController::has_auth()) {
            $controller = new $path();
            $action = $this->action;
            $controller->$action($params);
        // } else {
        //     $controller = new AuthorizeController();
        //     $controller->index();
        // }
    }

    public function route_dump(): string
    {
        return "action: $this->action, controller: $this->controller";
    }
}