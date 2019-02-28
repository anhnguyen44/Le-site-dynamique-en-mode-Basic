<html>
    <head>
        <title>Hệ thống điều hướng cơ bản</title>
        <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/style.css" rel="stylesheet" type="text/css"/>
        <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
                <a id="logo">COUCOU</a>
                <div id="user_logout">
                    <p>Hello <strong><?php if(isset($_COOKIE['is_login'])) echo $_COOKIE['fullname']; else echo $_SESSION['fullname'];?></strong>(<a href="?mod=connection&act=logout">Đăng xuất</a>)</p>
                </div>
                <ul id="main-menu" class="mod-home">
                    <li><a href="?mod=home&act=main">Trang chủ</a></li>
                    <li><a href="?mod=page&act=detail&id=1">Về chúng tôi</a></li>
                    <li><a href="?mod=new&act=main">Tin tức</a></li>
                    <li><a href="?mod=product&act=main&cat_id=1">Điện thoại</a></li>
                    <li><a href="?mod=product&act=main&cat_id=2">Ti vi</a></li>
                    <li><a href="?mod=page&act=detail&id=2">Liên hệ</a></li>
                    <li><a href="?mod=post&act=main">Thêm bài viết</a></li>
                </ul>
            </div>
