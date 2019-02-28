<?php

function get_header($mod = '') {
    if (empty($mod)) {
        $path_header = 'inc/header.php';
    } else {
        $path_header = "inc/header-{$mod}.php";
    }
    if (file_exists($path_header)) {
        require $path_header;
    } else {
        echo "Không tồn tại đường dẫn {$path_header}";
    }
}

function get_footer() {
    $path_footer = 'inc/footer.php';
    if (file_exists($path_footer)) {
        require $path_footer;
    } else {
        echo "Không tồn tại đường dẫn {$path_footer}";
    }
}

function get_404() {
    $path_404 = 'inc/404.php';
    if (file_exists($path_404)) {
        require $path_404;
    } else {
        echo "Không tồn tại đường dẫn {$path_404}";
    }
}

function get_content_page() {
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';
    $path = "pages/{$page}.php";
    if (file_exists($path)) {
        require $path;
    } else {
        get_404();
    }
}
?>

