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

    <?php
    if (!isset($_SESSION['username'])) { ?>
        <h1> Register </h1>
        <form name="login" method="post">
            <input type="text" name="username" placeholder="Username" required />
            <br> <input type="email" name="email" placeholder="email" required />
            <br> <input type="password" name="password" placeholder="Password" required />
            <br> <button>SignUp</button>
        </form>
        <p id="msg"></p>
        <p class="signup"></p>
        <p>have an account?<a href="./index.php">Login Here</a></p>


    <?php
    } else {
        header('location:index.php');
        exit;
    } ?>


    <script>
        $(document).ready(function() {




            $("input").keyup(function() {
                var element = $(this);


                check_validation(element);

            });


            $("button").click(function() {

                if (check_validation($("input[name='email']")) &&
                    check_validation($("input[name='username']"))) {
                    var userName = $("input[name='username']").val();
                    var pass = $("input[name='password']").val();
                    var email = $("input[name='email']").val();
                    $("p.signup").load('./includes/signup.inc.php', {
                        username: userName,
                        password: pass,
                        email: email

                    }, );
                }


            });




            function check_validation(element) {

                console.log('->' + element + '<-');
                var data = element.val();
                var key = element.attr('name');
                var validation = true; //assume it's a valid data
                //don't check for password here
                if (key === "password")
                    return true;
                if (data === 'undefined' || data === '') {
                    element.addClass('error');
                    $("#msg").addClass('error');
                    $("#msg").html("error : this " + key + " cannot be empty");
                    return false;
                }
                console.log('->' + key + '<-');
                $.post('./includes/check_validation.inc.php', {
                        name: key,
                        value: data,
                    },
                    function(recivedData, status) {

                        console.log('->' + status + '<-');
                        console.log('--->' + recivedData + '<---');

                        if (status === 'success') {
                            if (recivedData.trim() == 'valid') {
                                element.removeClass('error');
                                $("#msg").removeClass('error');
                                $("#msg").html('valid data');

                            } else {
                                validation = false;
                                element.addClass('error');
                                $("#msg").addClass('error');
                                $("#msg").html("error : this " + key + " already signed up");

                            }

                            console.log('===' + key + ' : ' + validation);
                        }
                    });
                // console.log('===' + id + ' : ' + validation);
                return validation;
            }


        });
    </script>
</body>

</html>