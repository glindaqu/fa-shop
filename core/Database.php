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
    public function insert_client(string $email, string $password): void {
        $this->db->query("INSERT INTO client(email, password) VALUES ('$email', '$password')");
    }

    public function get_client(?int $id, ?string $email, ?string $password): ?array {
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
}