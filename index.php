<?php
session_start();
ini_set('display_errors', -1);
include './includes/class_autorelead.inc.php';
Ctrl::index();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="./style.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Home</title>
</head>

<body>

    <?php
    echo "<p>Welcome " . $_SESSION['username'] . " </p>"
    ?>
    <p>you entered a private area. u are screwed</p>
    <br><a href="./logout.php" id="logout">Logout</a>





</body>

</html>