<?php
include("vendor/autoload.php");

use Helpers\Auth;

$user = Auth::check();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <main class="container p-3">
        <h1>Profile</h1>
        <hr>
        <h2><?= $user->name ?></h2>
        <?php if($user->photo) : ?>
            <img src="_actions/photos/<?=$user->photo?>" alt="Profile Photo" class="img-thumbnail border-3" width="300">
        <?php endif ?>
        <form action="_actions/upload.php" method="post" enctype="multipart/form-data">
            <div class="input-group">
                <input type="file" name="photo" class="form-control">
                <button class="btn btn-secondary">Upload</button>
            </div>
        </form>
        <hr>
        <h3>Personal Info</h3>
        <ul class="list-group">
            <li class="list-group-item list-group-item-action active"><b>Email : </b><?= $user->email ?></li>
            <li class="list-group-item list-group-item-action active"><b>Phone : </b><?= $user->phone ?></li>
            <li class="list-group-item list-group-item-action active"><b>Address : </b><?= $user->address ?></li>
        </ul>
        <hr>
        <div>
            <button class="btn btn-info"><a href="admin.php" class="text-dark">Admin Dashboard</a></button>
            <button class="btn btn-secondary"><a href="_actions/logout.php" class="text-light">Log out</a></button>
        </div>
    </main>
</body>
</html>