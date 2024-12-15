<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";

class Database
{
    private string $server_name = DB_SERVER_NAME;
    private string $user = DB_USER_NAME;
    private string $password = DB_USER_PASSWORD;
    private string $db_name = DB_DB_NAME;

    private mysqli $db;

    public function __construct()
    {
        $this->db = new mysqli($this->server_name, $this->user, $this->password, $this->db_name);
    }

    public function __destruct()
    {
        $this->db->close();
    }

    # region client
    public function insert_client(string $email, string $password): void
    {
        $this->db->query("INSERT INTO client(email, password) VALUES ('$email', '$password')");
    }

    public function get_client(?int $id, ?string $email, ?string $password): ?array
    {
        $result = null;
        if ($id != null) {
            $st = $this->db->prepare("SELECT * FROM client WHERE id = ? LIMIT 1");
            $st->bind_param("i", $id);
            $st->execute();
            $result = $st->get_result()->fetch_assoc();
        } else if ($email != null and $password != null and $email != '' and $password != '') {
            $st = $this->db->prepare('SELECT * FROM client WHERE email = ? AND password = ?');
            $st->bind_param('ss', $email, $password);
            $st->execute();
            $result = $st->get_result()->fetch_assoc();
        }
        return $result;
    }

    # region item
    public function get_items(): ?array
    {
        $result = [];
        $data = $this->db->query(query: 'SELECT * FROM item');
        while ($row = $data->fetch_assoc()) {
            $result[] = $row;
        }
        return count($result) == 0 ? null : $result;
    }

    public function get_item(int $id): ?array
    {
        $st = $this->db->prepare("SELECT * FROM item WHERE id = ? LIMIT 1");
        $st->bind_param("i", $id);
        $st->execute();
        $result = $st->get_result()->fetch_assoc();
        return $result;
    }

    # region cart
    public function add_to_cart(int $item_id, int $count): void
    {
        $st = $this->db->prepare('INSERT INTO cart(user_id, item_id, items_count) VALUES (?, ?, ?)');
        $st->bind_param('iii', $_COOKIE['client_id'], $item_id, $count);
        $st->execute();
    }

    public function delete_from_cart(int $item_id): void
    {
        $st = $this->db->prepare('DELETE FROM cart WHERE user_id = ? AND item_id = ?');
        $st->bind_param('ii', $_COOKIE['client_id'], $item_id);
        $st->execute();
    }

    public function get_cart_by_client(): ?array
    {
        $st = $this->db->prepare('SELECT * FROM cart WHERE user_id = ?');
        $st->bind_param('i', $_COOKIE['client_id']);
        $st->execute();
        $result = $st->get_result();
        $arr = [];
        while ($item = $result->fetch_assoc()){
            $arr[] = $item;
        }
        return count($arr) == 0 ? null : $arr;
    }
}