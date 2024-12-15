<?php

use function PHPSTORM_META\map;

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

        $feedback = $this->db->get_feedback_by_item($id);
        $rate = 0;

        if ($feedback) {
            $rate = array_sum(array_column($feedback, 'rate')) / count($feedback);
            $rate = round($rate, 1);

            foreach ($feedback as &$f) {
                $client = $this->db->get_client($f['user_id'], null, null);
                $f['username'] = $client['email']; 
            }
        }

        $this->view->item($item, $feedback, $rate);
    }

    public function add_to_cart(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die();
        }

        $count = $_POST['count'];
        $item_id = $_POST['item_id'];

        $this->db->add_to_cart($item_id, $count);

        header('location: http://fa-shop-app/catalog');
        exit;
    }

    public function add_feedback(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            die();
        }
        $content = $_POST['text'];
        $rate = $_POST['rate'];
        $item = $_POST['item_id'];

        $this->db->add_feedback($item, $rate, $content);

        header("location: http://fa-shop-app/catalog/item/id=$item");
    }
}
