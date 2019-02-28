<!--Nhớ là khi làm cách thêm pattern và title vào trong input để validation form thì chuỗi cho pattern bỏ đi hai dấu // và thêm một
từ khóa required để bắt buộc người điền phải điền vào form không bỏ trống-->

<?php
require 'data/user.php';
require 'lib/validation.php';
if (isset($_POST['btn_login'])) {
    $erreur = array();
    if (empty($_POST['username'])) {
        $erreur['username'] = "Không bỏ trống tên đăng nhập";
    } else {
        if (!is_username($_POST['username'])) {
            $erreur['username'] = "Ten dang nhap co chu cai chu so dau _ va dau cham tu 6-32 ki tu";
        }
    }

    if (empty($_POST['password'])) {
        $erreur['password'] = "Không bỏ trống mật khẩu";
    } else {
        if (!is_password($_POST['password'])) {
            $erreur['password'] = "Mat khau phai co kí tự đầu tiên in hoa tu 6-32 ki tu";
        }
    }

    if (empty($erreur)) {
        foreach ($list_users as $key => $value) {
            if ($value['username'] == $_POST['username'] && $value['password'] == $_POST['password']) {
                if (isset($_POST['remember_me'])) {
                    setcookie('is_login', true, time() + 3600, '/');
                    setcookie('fullname', $value['fullname'], time() + 3600, '/');
                }
                $_SESSION['is_login'] = true;
                $_SESSION['fullname'] = $value['fullname'];
                header("location: index.php");
            } else {
                $erreur['incorrect'] = "Tên đăng nhập hoặc mật khẩu chưa đúng";
            }
        }
    }
}
?>


<html>
    <head>
        <title>Login</title>
        <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body id="page_login">
        <div id="wp_login_form">
            <h1 id="title_form_login">Đăng nhập</h1>
            <form action="" method="POST">
                <input id="username" type="text" name="username" value="" placeholder="username">
                <?php get_error_by_field('username'); ?>
                <input id="password" type="password" name="password" value="" placeholder="password">
                <?php get_error_by_field('password'); ?>
                <?php get_error_by_field('incorrect'); ?>
                <div class="remember_me">
                    <input id="remember_me" type="checkbox" name="remember_me" value="remember">
                    <label for="remember_me" class="remember_me">Remember me</label>
                </div>
                <input id="btn_login" type="submit" name="btn_login" value="Đăng nhập">
            </form>
            <a id="lost_pass" href="">Forget password?</a>
        </div>
    </body>
</html>


