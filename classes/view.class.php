<?php

declare(strict_types=1);

class View
{

    public function printErrors(array $errors)
    {
        echo "<script>";

        echo '$("#msg").addClass("error");';
        echo '$("#msg").html(';
        foreach ($errors as $key => $error)
            echo $key . ": " . $error . "<br>";

        echo ");";

        echo "</script>";
    }
}
