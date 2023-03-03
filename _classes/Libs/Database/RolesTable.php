<?php

namespace Libs\Database;

use PDOException;

class RolesTable
{
    private $db;

    public function __construct(MySQL $mySQL)
    {
        $this->db = $mySQL->connect();
    }

    public function getALLRoles()
    {
        $query = "SELECT * FROM roles";
        $statement = $this->db->query($query);
        $data = $statement->fetchAll();
        return $data;
    }
}