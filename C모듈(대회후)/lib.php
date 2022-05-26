<?php

spl_autoload_register(function($r){
    str_replace("\\/", "/", $r);
    require_once("../$r.php");

});

function view($fileName, $data=[]){
    extract($data);
    require_once "../src/View/header.php";
    require_once "../src/View/$fileName.php";
    require_once "../src/View/footer.php";
}

function script($text){
    echo "<script>$text</script>";
}

function back(){
    script("history.back();");
}