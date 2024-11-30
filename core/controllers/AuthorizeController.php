<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/views/AuthorizeView.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/Controller.php";

class AuthorizeController extends Controller
{
    private AuthorizeView $view;

    public function __construct()
    {
        $this->view = new AuthorizeView();
    }

    public function register(): void
    {
        $this->view->register();
    }

    public static function has_auth(): int
    {
        if (isset($_COOKIE['user_id'])) {
            return 1;
        }
        return 0;
    }
}
