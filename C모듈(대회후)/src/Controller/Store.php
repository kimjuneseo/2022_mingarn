<?php

namespace src\Controller;

class Store{
    function insert(){
        extract($_POST);
        
        query('INSERT INTO `store`( `name`, `type`, `phone`, `adress`, `rm`) VALUES (?,?,?,?,?)', [$name, $type1, $phone, $add,$nm]);
        
        back();
    }
    
    function select($parm){
        $idx = $parm[1];
        $item = fetch("select * from `store` where idx = ?", [$idx]);
        echo json_encode($item);
    }
    
    function update(){
        extract($_POST);
        
        query("UPDATE `store` SET `name`=?,`type`=?,`phone`=?,`adress`=?,`rm`=? WHERE `idx`=?", [$name, $type2, $phone, $add,$nm,$idx]);
       
        back();
    }

    function delete(){
        extract($_POST);
        
        query(" `store` SET `name`=?,`type`=?,`phone`=?,`adress`=?,`rm`=? WHERE `idx`=?", [$name, $type2, $phone, $add,$nm,$idx]);
        back();
    }
}