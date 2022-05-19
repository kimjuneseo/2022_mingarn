<?php

spl_autoload_register(function($f){
    str_replace("\\/", "/", $f);
    require_once("../$f.php");
});

function view($fileName, $e=[]){
    extract($e);
    require_once("../src/View/header.php");
    require_once("../src/View/$fileName.php");
    require_once("../src/View/footer.php");
};

function script($text){
    echo "<script>$text</script>";
}