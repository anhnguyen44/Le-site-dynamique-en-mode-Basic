<?php
session_start();

setcookie('is_login',false, time()-3600, '/');
setcookie('user_login',NULL, time()-3600, '/');

unset($_SESSION['is_login']);
unset($_SESSION['fullname']);

header("location: index.php");
?>

