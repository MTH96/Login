
<?php

include "class_autorelead.inc.php";
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
$data = test_input($_POST['value']);
$key = test_input($_POST['name']);

include "../classes/dbcontroller.class.php";
$dbController = new Dbcontroller();

if (empty($dbController->getUsersByStmt($key, $data))) {


    echo 'valid';
} else {
    echo 'unvalid';
}
?>