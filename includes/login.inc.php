<?php
session_start();
include "class_autorelead.inc.php";
include "./test_input.inc.php";
ini_set('display_errors', -1);



$username =  test_input($_POST['username']);
$password = test_input($_POST['password']);

$dbController = new Dbcontroller();
$isSigned = $dbController->isUserSigned($username, $password);
if ($isSigned === false) {
    //not signed up yet( no user data in the table)

    $message = "unable to login \\nYou haven\'t signed up yet! ";
    echo '<script type="text/javascript">';
    echo  "alert('$message')";  //not showing an alert box.
    echo '</script>';

    exit;
}
$_SESSION['username'] = $username;
