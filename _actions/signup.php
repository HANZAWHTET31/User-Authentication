<?php

include("../vendor/autoload.php");

use Helpers\Http;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$address = $_POST["address"];
$password = $_POST["password"];

$data = [
    ":name" => $name,
    ":email" => $email,
    ":phone" => $phone,
    ":address" => $address,
    ":password" => $password,
];

$usersTable = new UsersTable(new MySQL);

$id = $usersTable->insert($data);

if($id)
{
    Http::redirect("/index.php", "register=success");
}else{
    Http::redirect("/index.php", "register=fail");
}