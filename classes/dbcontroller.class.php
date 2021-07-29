<?php

declare(strict_types=1);
include 'dbh.class.php';

class Dbcontroller extends Dbh
{

    public function getUsersByEmailOrUsername(string  $email, string $username)
    {
        try {
            $sql = "SELECT * FROM " . $this->table . " WHERE email= ? OR username = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email, $username]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
            return [];
        }
    }
    public function addUser(string  $email, string $username, string $pwd)
    {
        try {
            $sql = "INSERT INTO " . $this->table . " (email,username,pass) VALUES (?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            return   $stmt->execute([$email, $username, $pwd]);
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
            return false;
        }
    }
    public function isUserSigned(string  $username, string $pwd)
    {
        try {
            $sql = "SELECT * FROM " . $this->table . " WHERE username= ? AND pass = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$username, $pwd]);
            return !empty($stmt->fetchAll());
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
            return false;
        }
    }
    public function getUsersByStmt(string  $key, string $value)
    {
        try {
            $sql = "SELECT * FROM " . $this->table . " WHERE $key= ? ";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$value]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "error: " . $e->getMessage();
            return [];
        }
    }
}
