<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .wrap{
            width: 100%;
            max-width: 350px;
            margin: 50px auto;
        }
    </style>
</head>
<body>
    <main class="wrap">
        <section class="container">
            <h1>Log In</h1>
            <hr>
            <?php if(isset($_GET["login"])) : ?>
                <div class="p-3 mb-3">
                    <span class="alert alert-danger">Email and Password incorrect!</span>
                </div>
            <?php elseif(isset($_GET["signin"])) : ?>
                <div class="p-3 mb-3">
                    <span class="alert alert-danger">Enter your Email and Password!</span>
                </div>
            <?php endif ?>
            <form action="_actions/login.php" method="post">
                <label for="mail" class="form-label">Email</label>
                <input type="text" id="mail" name="email" class="form-control" required>
                <label for="pswd" class="form-label">Password</label>
                <input type="password" id="pswd" name="password" class="form-control" required>
                <br>
                <input type="submit" class="form-control bg-info" value="Log In">
            </form>
            <hr>
            <p class="text-center">
                Don't have an account? <a href="register.php">Register</a> here.
            </p>
        </section>
    </main>
</body>
</html>