<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class Session
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function create()
    {
        $stmt = $this->db->prepare("INSERT INTO sessions (user_id) VALUES (:user_id)");
        return $stmt->execute(['user_id' => $_SESSION['user_id']]);
    }

    public function update($logout_time)
    {
        $stmt = $this->db->prepare("UPDATE sessions SET logout_time = :logout_time WHERE logout_time IS NULL AND user_id = :user_id");
        return $stmt->execute(['logout_time' => $logout_time, 'user_id' => $_SESSION['user_id']]);
    }

    public function show()
    {
        $stmt = $this->db->prepare("SELECT sessions.id AS id, sessions.login_time AS login_time, sessions.logout_time AS logout_time,
        users.email AS user FROM sessions JOIN users ON sessions.user_id = users.id ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findByUserID()
    {
        $stmt = $this->db->prepare("SELECT * FROM sessions WHERE user_id = :user_id ORDER BY id DESC");
        $stmt->execute(['user_id' => $_SESSION['user_id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}