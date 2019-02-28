<?php

require 'lib/data.php';
require 'data/news.php';
require 'data/product.php';
require 'lib/template.php';
?>
<?php

session_start();
$mod = isset($_GET['mod']) ? $_GET['mod'] : 'home';
$act = isset($_GET['act']) ? $_GET['act'] : 'main';
if (!isset($_COOKIE['is_login'])) {
    if (!isset($_SESSION['is_login']) && !isset($_COOKIE['is_login'])) {
        $mod = 'connection';
        $act = 'login';
    }
}
$path = "modules/{$mod}/{$act}.php";
if (file_exists($path)) {
    require $path;
} else {
    get_404();
}
?>



