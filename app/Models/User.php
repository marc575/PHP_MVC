<?php
namespace App\Models;

use App\Core\Database;

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function create($username, $email, $role_id, $status, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->db->prepare("INSERT INTO users (username, email, password, role_id, status) VALUES (:username, :email, :password, :role_id, :status)");
        return $stmt->execute(['username' => $username, 'email' => $email, 'password' => $hashed_password, 'role_id' => $role_id, 'status' => $status]);
    }
    public function update($username, $email, $role_id, $status, $id)
    {
        $stmt = $this->db->prepare("UPDATE users SET username = :username, email = :email, role_id = :role_id, status = :status WHERE id = :id");
        return $stmt->execute(['username' => $username, 'email' => $email, 'role_id' => $role_id, 'status' => $status, 'id' => $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        return $stmt->execute(['id' => $id]) or die(print_r($this->db->errorInfo()));
    }

    public function show()
    {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function findByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch();
    }

    public function findByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}