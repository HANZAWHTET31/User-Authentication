<?php

include("vendor/autoload.php");

use Helpers\Auth;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Libs\Database\RolesTable;

$auth = new Auth;

$authUser = $auth::check();

$usersTable = new UsersTable(new MySQL);

$users = $usersTable->getAll();

$rolesTable = new RolesTable(new MySQL);

$roles = $rolesTable->getAllRoles();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg container bg-warning">
        <h2 class="navbar-brand">Admin Dashboard</h2>
        <nav class="container navbar-nav">
            <div class="flex-fill"></div>
            <span class="nav-item">
                <a href="profile.php" class="nav-link">User</a>
            </span>
            <span class="nav-item">
                <a href="_actions/logout.php" class="nav-link">Logout</a>
            </span>
        </nav>
    </nav>
    <main class="container">
        <table class="table">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <?php if($authUser->value == 3) : ?>
                    <th>Controls</th>
                <?php endif ?>
            </thead>
            <tbody>
                <?php foreach($users as $user) : ?>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td><?= $user->name ?></td>
                        <td><?= $user->email ?></td>
                        <td>
                            <?php if($user->value == 3) : ?>
                                <span class="badge bg-success">
                            <?php elseif($user->value == 2) : ?>
                                <span class="badge bg-primary">
                            <?php else : ?>
                                <span class="badge bg-secondary">
                            <?php endif ?>
                                    <?= $user->role ?>
                                </span>
                        </td>
                        <?php if($authUser->value == 3) : ?>
                            <td>
                                <?php if($user->suspended == 1) : ?>
                                    <a href="_actions/unsuspend.php?id=<?=$user->id?>" class="btn btn-success">Unsuspend</a>
                                <?php else : ?>
                                    <a href="_actions/suspend.php?id=<?=$user->id?>" class="btn btn-danger">Suspend</a>
                                <?php endif ?>
                                <a href="#" class="btn dropdown-toggle" data-bs-toggle="dropdown">Change Role</a>
                                <div class="dropdown-menu">
                                    <?php foreach($roles as $role) : ?>
                                        <a href="_actions/roles.php?id=<?=$user->id?>&role=<?=$role->id?>" class="dropdown-item"><?=$role->name?></a>
                                    <?php endforeach ?>
                                </div>
                                <a href="_actions/delete.php?id=<?=$user->id?>" class="btn">delete</a>
                            </td>
                        <?php endif ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>
</body>
</html>