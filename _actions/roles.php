<?php 

include("../vendor/autoload.php");

use Helpers\Http;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$id = $_GET["id"];
$role = $_GET["role"];

$usersTable = new UsersTable(new MySQL);

$usersTable->role($id, $role);

Http::redirect("/admin.php");