<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/core/Model.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/core/Database.php";

class AttendanceModel extends Model
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function add_attendance(int $employee_id, ?DateTime $in, ?DateTime $out, int $launch): void
    {
        $this->db->insert_attendance($in, $out, $employee_id, $launch);
    }

    public function get_attendances(int $month): array
    {
        return $this->db->get_attendance($month);
    }

    public function get_attendances_by_user(int $user_id, int $month): array
    {
        return $this->db->get_attendance_by_user($user_id, $month);
    }

    public function get_attendances_by_id(int $row_id): array
    {
        return $this->db->get_attendance_by_id($row_id);
    }

    function update(int $id, ?DateTime $in, ?DateTime $out, int $launch): void
    {
        $this->db->update_attendance_by_id($in, $out, $id, $launch);
    }

    function get_attendance_by_user_and_date(int $user_id, string $date): array
    {
        return $this->db->get_attendance_by_user_date($user_id, $date);
    }
}