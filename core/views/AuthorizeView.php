<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/View.php";

class AuthorizeView extends View
{
    public function register(): void
    {
        ob_start();
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/auth/register.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
    }

    public function login(): void
    {
        ob_start();
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/auth/login.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
    }

    public function error(): void
    {
        ob_start();
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/auth/error.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php';
        $content = ob_get_contents();
        ob_end_clean();
        echo $content;
    }
}