<?php

namespace src\Controller;
class View{
    function index(){
        view('index');
    }
    
    function event(){
        view('event');
    }
    function chart(){
        view('chart');
    }
    function sub1(){
        view('sub1');
    }
    function store(){
        $data = fetchAll('SELECT * FROM `store` order by `idx` desc');
        view('store', ["item"=>$data]);
    }
    function voting(){
        view('voting');
    }
 
    
}

