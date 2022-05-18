<?php

function init($pages)
{
    [$url] = explode("?", $_SERVER["REQUEST_URI"]);

    foreach($pages as $p)
    {
        [$path, $name, $method] = explode("@", $p);
        
        $reg = preg_replace("/:[^\/]+/", "([^/]+)", $path);
        $reg = preg_replace("/\//", "\\/", $reg);
        $reg = "/^".$reg."$/";

        if(preg_match($reg, $url, $r)) {
            array_splice($r,0,1);
            $conName = "\\src\\Controller\\{$name}";
            $con = new $conName();
            $con->{$method}($r);
            exit;
        }
    }
};

function call($method, $args)
{
    if($_SERVER["REQUEST_METHOD"] == $method) {
        init($args);
    }
};

$get = fn(...$args) => call("GET", $args);
$post = fn(...$args) => call("POST", $args);