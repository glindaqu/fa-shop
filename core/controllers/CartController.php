<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/views/CartView.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/Controller.php";

class CartController extends Controller
{
    private CartView $view;

    public function __construct()
    {
        $this->view = new CartView();
    }

    public function index(): void
    {
        $this->view->index();
    }
}
