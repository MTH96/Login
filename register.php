<?php
session_start();
ini_set('display_errors', -1);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./style.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Signup</title>
</head>

<body>

    <h1> Register </h1>
    <form action="#" method="post">
        <input type="text" name="username" placeholder="Username" required />
        <br> <input type="email" name="email" placeholder="email" required />
        <br> <input type="password" name="password" placeholder="Password" required />
        <br> <input type="submit" value="SignUp" name="submit">
    </form>
    <p>have an account?<a href="./index.php">Login Here</a></p>

    <p id="msg"></p>

    <?php
    include './includes/class_autorelead.inc.php';
    Ctrl::signUp();

    ?>
</body>

</html>