<?php
session_start();

include "./class_autorelead.inc.php";
include "./test_input.inc.php";
ini_set('display_errors', -1);


$username = test_input($_POST['username']);
$password = test_input($_POST['password']);
$email = test_input($_POST['email']);

$dbController = new Dbcontroller();

if (empty($dbController->getUsersByEmailOrUsername($email, $username))) {
    if ($dbController->addUser($email, $username, $password)) {
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
    } else {

        $message = "couldn\'t access the DB \\n please contact with  the mannger! ";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }


    exit;
} else {

    $message = "this username or email is user before \\n please change them! ";
    echo "<script type='text/javascript'>alert('$message');</script>";

    exit;
}
