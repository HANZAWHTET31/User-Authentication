<?php

namespace Libs\Database;

use PDOException;

class UsersTable
{
    private $db;

    public function __construct(MySQL $mySQL)
    {   
        $this->db = $mySQL->connect();
    }

    public function login($email, $password)
    {
        $query = "SELECT users.*, roles.name AS role, roles.* FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE email = :email AND password = :password";

        $statement = $this->db->prepare($query);
        $statement->execute([ ":email" => $email, ":password" => $password ]);

        $user = $statement->fetch();

        return $user;
    }

    public function insert($data)
    {
        $data["password"] = password_hash($data["password"], PASSWORD_DEFAULT);
        $query = "INSERT INTO users (name, email, phone, address, password, created_at) VALUES (:name, :email, :phone, :address, :password, NOW())";
        $statement = $this->db->prepare($query);
        $statement->execute($data);

        return $this->db->lastInsertId();
    }

    public function getAll()
    {
        $query = "SELECT users.*, roles.name AS role, roles.value FROM users LEFT JOIN roles ON users.role_id = roles.id";
        $statement = $this->db->query($query);
        $usersData = $statement->fetchAll();
        return $usersData;
    }

    
}