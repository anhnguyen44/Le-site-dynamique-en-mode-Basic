<?php
get_header();
if (isset($_FILES['file'])) {
    $upload_dir = 'uploads/images';
    //Đường dẫn của file sau khi upload
    $upload_file = $upload_dir . $_FILES['file']['name'];
//    $upload_file_copy =  $upload_dir.basename($_FILES['file']['name'],".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION)) . "- copy.".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    
    //$upload_file_copy_i =  $upload_dir.basename($_FILES['file']['name'],".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION)) . "- copy" . "-({$i})". ".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    //Câu lệnh move_uploaded_file --> dịch chuyển file trong server vào thư mục chúng ta lưu trữ file
    //Hàm move_uploaded_file trả về true ou false

    $error = array();
    $type_allow = array('png', 'jpeg', 'jpg', 'gift');
    $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    //show_array($_FILES['file']);
    //upload_dir ---> upload_directory(thu vien upload)
//    echo $type;
    if (!in_array(strtolower($type), $type_allow)) {
        $error['type'] = "Chỉ được upload ảnh gift, jpeg, jpg hoặc png";
    } else {
        /*
         * Upload file dưới 20MB cho phép
         * Search trên google từ khóa "Kích thước tập tin để quy đổi từ MB sang B. Vì ta biết rằng đơn vị kích thước file upload trên php là Byte"
         * 20 MB = 20.971.520B
         */
        $file_size = $_FILES['file']['size'];
        if ($file_size > 20971520) {
            $error['size'] = "Kích thước file vượt quá 20MB";
        }

        /*
         * Kiểm tra file có trên hệ thống hay chưa. Bằng cách kiểm tra tên file tồn tại trên hệ thống
         * Lập trình nâng cao hơn là nếu trùng thì ta tự động đổi tên file===>Cái này chúng ta làm sau
         */
        if (file_exists($upload_file)) {
//            $error['file_exit'] = "File đã có sẵn";
//            if (!file_exists($upload_file_copy)) {
//                copy($upload_file,$upload_file_copy);
//            } else {
//                $i=2;
//                while (true) {
//                    //Có thể thay path_name_file($upload_file) thành $type hoặc ngược lại
//                    if (file_exists($upload_dir. base_name_file($upload_file) . "- copy" . "-({$i}).".$type)) {
//                        $i++;
//                    } else {
//                        break;
//                    }
//                }
//                copy($upload_file, $upload_dir. base_name_file($upload_file) . "- copy" . "-({$i}).".$type);
//            }
            $name_file = pathinfo($upload_file,PATHINFO_FILENAME);
            $new_name_file = $name_file." - Copie.";
            $new_upload_file = $upload_dir.$new_name_file.$type;
            $k = 0;
            while(file_exists($new_upload_file)){
                $k++;
                $new_name_file = $name_file." - Copie({$k}).".$type;
                $new_upload_file = $upload_dir.$new_name_file;
            }
            $upload_file = $new_upload_file;
        }
    }

    if (empty($error)) {
//        echo "File đạt con mẹ nó chuẩn";
        if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
//        echo "Upload thành công";
            echo "<img src='{$upload_file}'/>";
            echo "<br><a href='{$upload_file}'>Download File: {$_FILES['file']['name']}</a>";
        } else {
            echo "Upload thất bại";
        }
    } else {
        show_array($error);
    }
//    echo base_name_file($_FILES['file']['name']);
}
?>

<div id="content">
    <?php
    if (isset($_POST['btn_add'])) {
        echo "<h1>{$_POST['title_post']}</h1><br>";
        echo $_POST['desc_post']."<br><br>";
        echo $_POST['content_post_add'];
    }
    ?>
    <form method="POST" enctype="multipart/form-data">
        <label for="file">Chọn avatar từ máy tính: </label>
        <input type="file" name="file" id="file"><br/><br/>
        <label for="title_post">Tiêu đề bài viết</label><br>
        <input type="text" name="title_post" id="title_post"><br><br>
        <label for="desc_post">Mô tả ngắn</label><br>
        <input type="text" name="desc_post" id="title_post"><br><br>
        <label for="editor1">Chi tiết bài viết</label><br>
        <textarea name="content_post_add" id="editor1"></textarea><br>
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1');
        </script>
        <input type="submit" name="btn_add" value="Them bai viet"><br><br>

    </form>
</div>
<?php get_footer(); ?>
