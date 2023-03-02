<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        .wrap{
            width: 100%;
            max-width: 400px;
            margin: 30px auto;
        }
    </style>
</head>
<body>
    <main class="wrap">
        <section class="container">
            <h1 class="text-center">Sign Up</h1>
            <hr>
            <form action="_actions/signup.php" method="post">
                <label for="namee" class="form-label">Name</label>
                <input type="text" id="namee" name="name" class="form-control">
                <label for="mail" class="form-label">Email</label>
                <input type="text" id="mail" name="email" class="form-control">
                <label for="ph" class="form-label">Phone</label>
                <input type="text" id="ph" name="phone" class="form-control">
                <label for="addr" class="form-label">Address</label>
                <textarea id="addr" name="address" class="form-control" rows="2"></textarea>
                <label for="pswd" class="form-label">Password</label>
                <input type="password" id="pswd" name="password" class="form-control">
                <br>
                <input type="submit" class="form-control" value="Sign Up">
            </form>
            <hr>
            <p class="text-center">
                Already have an account! <a href="index.php">Sign In</a> here.
            </p>
        </section>
    </main>
</body>
</html>