<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/views/CatalogView.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/Controller.php";

class CatalogController extends Controller
{
    private CatalogView $view;

    public function __construct()
    {
        $this->view = new CatalogView();
    }

    public function index(): void
    {
        $this->view->index();
    }

    public function item(array $params): void
    {
        if (!isset($params['id'])) {
            View::page_not_found();
            exit;
        }
        $this->view->item([]);
    }
}
