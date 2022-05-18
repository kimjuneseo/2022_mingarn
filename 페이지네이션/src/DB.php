<?php


class DB{
    static $db = null;
    static function getDB(){
        if(!self::$db){
            $option = [19=>5, 3=>2];
            self::$db = new \PDO("mysql:host=localhost;dbname=20220518;charset=utf8mb4", "root", "",$option);        }
        return self::$db;
    } 
    
}

function query($sql, $data=[]){
    $q = DB::getDB()->prepare($sql);
    try{
        $q->execute($data);
        return $q;
    }catch(Execption $e){
        echo "$e->getMessage() <br>";
        return false;
    }

}

function fetch($sql, $data=[]){
    $q = query($sql, $data);
    return $q ? $q->fetch(): $q;
}

function fetchAll($sql, $data=[]){
    $q = query($sql, $data);
    return $q ? $q->fetchAll(): $q;
}

function lastInsertId(){
    return DB::getDB()->lastInsertId();
}