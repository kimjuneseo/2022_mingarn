<?php

namespace src\Controller;

class Page{
    function render(){
        $items = fetchAll("SELECT * FROM `store` order by idx desc");
        view("store", ['items'=>$items]);
    }

    function insertPage(){
        extract($_POST);
        $result = query("INSERT INTO `store`( `name`, `type`, `phone`, `address`, `rm`) VALUES (?,?,?,?,?)",[$name, $kind, $phone,$address, $info]);
        if($result){
            script("alert('정보가 등록되었습니다.')");
            Page::render();
        }
    }
    
    function getItem($parms){
        $idx = $parms[1];
        $result = fetch("SELECT * FROM `store` where `idx` = ?", [$idx]);
        echo json_encode($result);
        
    }

    function removeItem($parms){
        $idx = $parms[1];
        $result = query("DELETE from `store` where `idx` = ?", [$idx]);
        Page::render();

    }

    function updateItem($parms){
        extract($_POST);
        $result = query("UPDATE `store` set `name` = ?, `type` = ?, `phone` = ?, `address` =?, `rm` = ? where idx = ?", [$name, $kind, $phone,$address, $info,$idx]);
        Page::render();
    }

}