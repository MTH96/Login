<?php
session_start();
ini_set('display_errors', -1);


?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./style.css">

    <title>Login</title>
</head>

<body>
    <h1> Log In </h1>
    <form action="#" method="post">
        <input type="text" name="username" placeholder="Username" required autocomplete="username" />
        <br> <input type="password" name="password" placeholder="Password" required autocomplete="current-password" />
        <br> <input type='submit' value="LogIn" name="submit">
    </form>
    <p>Not register yet?<a href="./register.php">Register Here</a></p>
    <p id="msg"></p>


    <?php
    include('./includes/class_autorelead.inc.php');
    Ctrl::signIn();
    ?>
</body>

</html>