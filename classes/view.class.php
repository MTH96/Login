<?php

declare(strict_types=1);

class View
{

    public function printErrors(array $errors)
    {
        $result = '';
        $result .= "<script>";
        $result .= "$(document).ready(function(){";
        $result .= '$("#msg").addClass("error");';
        $result .= '$("#msg").html("';
        foreach ($errors as $key => $error)
            $result .= "<strong> " . $key . ":</strong> " . $error . "<br> ";

        $result .= '");';
        $result .= "});";
        $result .= "</script>";
        return $result;
    }
}
