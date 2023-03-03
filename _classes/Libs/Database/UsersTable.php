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

    public function suspend($id)
    {
        $query = "UPDATE users SET suspended = 1 WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute([":id" => $id]);
        return $this->db->lastInsertId();
    }
    
    public function unsuspend($id)
    {
        $query = "UPDATE users SET suspended = 0 WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute([":id" => $id]);
        return $this->db->lastInsertId();
    }

    public function delete($id)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute([":id" => $id]);
    }

    public function role($id, $role)
    {
        $query = "UPDATE users SET role_id = :role WHERE id = :id";
        $statement = $this->db->prepare($query);
        $statement->execute([":role" => $role, ":id" => $id]);
    }
}