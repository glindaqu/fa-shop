<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/View.php";

class CatalogView extends View
{
    public function index(array $items): void
    {
        ob_start();
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/catalog/index.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
    }

    public function item(array $item): void
    {
        ob_start();
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/catalog/item.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
    }
}