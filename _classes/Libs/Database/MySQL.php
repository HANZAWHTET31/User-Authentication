<?php

namespace Libs\Database;

use PDO;
use PDOException;

class MySQL
{
    private $database;
    private $dbhost;
    private $dbname;
    private $dbuser;
    private $dbpass;

    public function __construct(
        $dbhost = "localhost",
        $dbname = "project3",
        $dbuser = "root",
        $dbpass = "",
    )
    {
        $this->dbhost = $dbhost;
        $this->dbname = $dbname;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->database = null;
    }

    public function connect()
    {
        $this->database = new PDO("mysql:dbhost=$this->dbhost;dbname=$this->dbname;", $this->dbuser, $this->dbpass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]);
        return $this->database;
    }
}