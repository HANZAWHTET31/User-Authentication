<?php

include("../vendor/autoload.php");

use Helpers\Http;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$id = $_GET["id"];

$usersTable = new UsersTable(new MySQL);

$usersTable->unsuspend($id);

Http::redirect("/admin.php");