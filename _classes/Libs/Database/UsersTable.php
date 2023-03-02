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
        $query = "SELECT * FROM users WHERE email = :email AND password = :password";

        $statement = $this->db->prepare($query);
        $statement->execute([ ":email" => $email, ":password" => $password ]);

        $user = $statement->fetch();

        return $user;
    }
}