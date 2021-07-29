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
    <title>Login</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['username'])) { ?>
        <h1> Log In </h1>
        <form name="login" method="post">
            <input type="text" name="username" placeholder="Username" required autocomplete="username" />
            <br> <input type="password" name="password" placeholder="Password" required autocomplete="current-password" />
            <br> <button>Login</button>
        </form>
        <p>Not register yet?<a href="./register.php">Register Here</a></p>
        <p class="login"></p>
    <?php
    } else {
        echo "<p>Welcome " . $_SESSION['username'] . " </p>"
    ?>
        <p>you entered a private area. u are screwed</p>
        <br><a href="./includes/logout.inc.php" id="logout">Logout</a>
    <?php
    } ?>



    <script>
        $(document).ready(function() {
            $("button").click(function() {
                var userName = $("input[name='username']").val();
                var pass = $("input[name='password']").val();
                console.log('=' + userName);
                console.log('=-' + pass);
                $("p.login").load('./includes/login.inc.php', {
                    username: userName,
                    password: pass,
                }, function(data, status) {
                    console.log("--->" + data);
                });
            });
        });
    </script>
</body>

</html>