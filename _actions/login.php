<?php

include("../vendor/autoload.php");

use Helpers\Http;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$email = $_POST["email"];
$password = md5($_POST["password"]);

$usersTable = new UsersTable(new MySQL);

$user = $usersTable->login($email, $password);

if($user){
    session_start();

    // if($user->suspended){
    //     Http::redirect("/index.php", "suspended=true");
    // }

    $_SESSION["user"] = $user;
    Http::redirect("/profile.php");
}else{
    Http::redirect("/index.php", "login=fail");
}