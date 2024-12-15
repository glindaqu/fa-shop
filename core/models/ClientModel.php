<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/Model.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/Database.php";

class ClientModel extends Model
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    
}