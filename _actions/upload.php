<?php

include("../vendor/autoload.php");

use Helpers\Auth;
use Helpers\Http;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

// print_r($_FILES);

$auth = new Auth;
$authUser = $auth->check();

$name = $_FILES["photo"]["name"];
$type = $_FILES["photo"]["type"];
$tmp_name = $_FILES["photo"]["tmp_name"];
$error = $_FILES["photo"]["error"];

$id = $authUser->id;
$photo = $name;

$usersTable = new UsersTable(new MySQL);

if($type === "image/jpeg" or $type === "image/png")
{
    $usersTable->uploadPhoto($id, $photo);
    move_uploaded_file($tmp_name, "photos/$photo");
    $authUser->photo = $photo;
    Http::redirect("/profile.php");
}else{
    Http::redirect("/profile.php", "error=type");
}