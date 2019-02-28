<?php
function show_array($data){
    if(is_array($data)&&!empty($data)){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

function path_name_file($url){
    return pathinfo($url,PATHINFO_EXTENSION);
}

//function base_name_file($url){
//    return basename($url,".".path_name_file($url));
//}
function base_name_file($url){
    return pathinfo($url,PATHINFO_FILENAME);
}
?>
