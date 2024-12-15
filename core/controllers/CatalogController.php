<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/views/CatalogView.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/Controller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/Database.php";

class CatalogController extends Controller
{
    private CatalogView $view;
    private Database $db;

    public function __construct()
    {
        $this->view = new CatalogView();
        $this->db = new Database();
    }

    public function index(): void
    {
        $items = $this->db->get_items();
        if ($items == null or count($items) == 0) {
            die('Нет товаров');
        }
        $this->view->index($items);
    }

    public function item(array $params): void
    {
        if (!isset($params['id'])) {
            die('id не указан');
        }

        $id = $params['id'];
        $item = $this->db->get_item($id);
        if ($item == null or count($item) == 0) {
            die('item не найден');
        }

        $this->view->item($item);   
    }
}
