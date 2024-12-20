<?php

require_once "core/Application.php";

const IS_DEBUG = true;

if (IS_DEBUG) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

session_start();

$application = new Application();