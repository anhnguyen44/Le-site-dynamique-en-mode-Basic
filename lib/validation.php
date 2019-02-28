<?php

function is_username($username){
    $pattern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if(preg_match($pattern, $username)){
        return true;
    }
    return false;
}

function is_password($password){
    $pattern = "/^([A-Z]{1})([\w\.~!@#$%^&*()+]){5,31}$/";
    if(preg_match($pattern, $password)){
        return true;
    }
    return false;
}

function get_error_by_field($field){
    global $erreur;
    if(isset($erreur[$field])){
        echo "<p style='color: #f36363;font-size: 13px;text-align: left;margin-left: 10px;'>{$erreur[$field]}</p>";
    }
}


?>

