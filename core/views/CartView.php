<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/View.php";

class CartView extends View
{
    public function index(): void
    {
        ob_start();
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/cart/index.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
    }
}