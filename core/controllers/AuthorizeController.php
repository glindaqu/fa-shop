<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/views/AuthorizeView.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/Controller.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/Database.php";


class AuthorizeController extends Controller
{
    private AuthorizeView $view;
    private Database $db;

    public function __construct()
    {
        $this->view = new AuthorizeView();
        $this->db = new Database();
    }

    public function login(): void
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'POST':
                $client = $this->db->get_client(null, $_POST['email'], $_POST['password']);
                if (!$client) {
                    $this->view->error();
                    exit;
                }
                setcookie('client_id', $client['id'], time() + 12 * 60 * 60, '/');
                header('location: http://fa-shop-app/catalog/index');
                exit;
            default:
                $this->view->login();
                break;
        }
    }

    public function register(): void
    {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'POST':
                if ($_POST['password'] !== $_POST['password_again']) {
                    die('Пароли не совпеадают');
                }
                $this->db->insert_client($_POST['email'], $_POST['password']);
                $client = $this->db->get_client(null, $_POST['email'], $_POST['password']);
                if (!$client) {
                    $this->view->error();
                    exit;
                }
                setcookie('client_id', $client['id'], time() + 12 * 60 * 60, '/');
                header('location: http://fa-shop-app/catalog/index');
                exit;
            default:
                $this->view->register();
                break;
        }
    }

    public static function logout(): void {
        setcookie('client_id', '', -1, '/');
        unset($_COOKIE['client_id']);
        header('location: http://fa-shop-app/');
    }

    public static function has_auth(): bool
    {
        if (isset($_COOKIE['client_id'])) {
            return true;
        }
        return false;
    }
}
