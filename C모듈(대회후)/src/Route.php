<?php


function init($page){
    [$url] = explode("?", $_SERVER['REQUEST_URI']);
    foreach($page as $p){
        [$path, $name, $method] = explode("@", $p);
        $reg = preg_replace("/:[^\/]+/", "([^/]+)", $path);
        $reg = preg_replace("/\//", "\\/", $reg);
        $reg = "/^".$reg."$/";
        if(preg_match($reg, $url, $r)){
            $conName = "src\\Controller\\$name";
            $con = new $conName();
            $con->{$method}($r);
            exit;
        }
    }
    http_response_code(404);
}

function call($name, $args){
    if($_SERVER['REQUEST_METHOD'] == $name){
        init($args);

    }
}

$get = fn(...$args) => call("GET", $args);
$post = fn(...$args) => call("POST", $args);
