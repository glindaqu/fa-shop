<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/views/CartView.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/Controller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/Database.php";

class CartController extends Controller
{
    private CartView $view;
    private Database $db;

    public function __construct()
    {
        $this->view = new CartView();
        $this->db = new Database();
    }

    public function index(): void
    {
        $items = [];

        $cart = $this->db->get_cart_by_client();

        if ($cart != null) {
            foreach ($cart as $item) {
                $got = $this->db->get_item($item["item_id"]);
                $got['ordered_count'] = $item['items_count'];
                $got['order_id'] = $item['id'];
                $items[] = $got;
            }
        }

        $this->view->index($items);
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die();
        }

        $item_id = $_POST['item_id'];

        $this->db->delete_from_cart($item_id);

        header('location: http://fa-shop-app/cart');
        exit;
    }
}
