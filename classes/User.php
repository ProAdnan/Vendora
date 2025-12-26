<?php

require_once './Database.php';

class User
{
    private $db;
    private $table = "users";

    public $id;
    public $username;
    public $email;
    public $role;

    public function __construct()
    {

        $this->db = Database::getInstance()->getConnection();

    }

    public function register($username, $email, $password)
    {

        if (empty($username) || empty($email) || empty($password)) {

            return false;

        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Using prepared statements to prevent SQL injection


        $stmt = $this->db->prepare("INSERT INTO {$this->table} (username, email, password) VALUES (:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        return $stmt->execute();

    }

    public function login($username, $password)
    {
        // Implement login logic with prepared statements
        // Set session if successful
        // Return user object or false
    }

    public function logout()
    {
        // Destroy session
        session_start();
        session_unset();
        session_destroy();
        return true;
    }

    // Additional methods for user management
}



?>