<?php

declare(strict_types=1);
include_once  "./includes/class_autorelead.inc.php";
include_once "./includes/test_input.inc.php";

class Ctrl
{

    public static function signIn()
    {
        if (isset($_SESSION['username'])) {
            header('location:./index.php');
            exit;
        }
        $errors = array();
        if (isset($_POST['submit'])) {
            $username =  test_input($_POST['username']);
            $password = test_input($_POST['password']);
            $dbModel = new Model();
            $isSigned =  $dbModel->isUserSigned($username, $password);

            if (!$isSigned) {
                $errors['unfound'] = "can't find a user match this data";
            }

            if (empty($errors)) {
                session_start();
                $_SESSION['username'] = $username;
                header('location:./index.php');
            } else {

                $viewElement = new View();
                echo $viewElement->printErrors($errors);
            }
        }
    }

    public static function signUp()
    {
        if (isset($_SESSION['username'])) {
            header('location:./index.php');
            exit;
        }
        $errors = array();

        if (isset($_POST['submit'])) {

            $username = test_input($_POST['username']);
            $password = test_input($_POST['password']);
            $email = test_input($_POST['email']);

            if (!isValidateEmail($email))
                $errors['email'] = 'unvalid email';

            $dbModel = new Model();

            $signedUsers = $dbModel->getUsersByEmailOrUsername($email, $username);
            if (!empty($signedUsers))
                $errors['duplication'] = 'this username/password has signed before';

            if (empty($errors)) {
                $dbModel->addUser($email, $username, $password);
                session_start();
                $_SESSION['username'] = $username;
            } else {
                $viewElement = new View();
                echo  $viewElement->printErrors($errors);
            }
        }
    }
    public static function logOut()
    {
        session_start();
        session_unset();
        session_destroy();
        echo 'logout';
        header('location:./login.php');
    }

    public static function index()
    {

        if (!isset($_SESSION['username']))
            header('location:./login.php');
    }
}