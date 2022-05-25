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

    function insert(){
        extract($_POST);
        
        query('INSERT INTO `store`( `name`, `type`, `phone`, `adress`, `rm`) VALUES (?,?,?,?,?)', [$name, $type1, $phone, $add,$nm]);
        
        View::store();
    }
    
    function select($parm){
        $idx = $parm[1];
        $item = fetch("select * from `store` where idx = ?", [$idx]);
        echo json_encode($item);
    }
    
    function update(){
        extract($_POST);
        
        query("UPDATE `store` SET `name`=?,`type`=?,`phone`=?,`adress`=?,`rm`=? WHERE `idx`=?", [$name, $type2, $phone, $add,$nm,$idx]);
        View::store();
    }

    function delete(){
        extract($_POST);
        
        query(" `store` SET `name`=?,`type`=?,`phone`=?,`adress`=?,`rm`=? WHERE `idx`=?", [$name, $type2, $phone, $add,$nm,$idx]);
        View::store();
    }
    
}

