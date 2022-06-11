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
        $data = fetchAll('select vt.idx,vt.name, vt.start_date, vt.end_date,vt.end_date, vt.all_user, it.item_true+it.item_false+it.item_not as all_voting from item_tbl it join voting_tbl vt on it.voting = vt.idx GROUP by vt.name, vt.start_date, vt.end_date,vt.end_date, vt.all_user, it.item_true+it.item_false+it.item_not  order by vt.idx desc');
        view('voting', ["list"=>$data]);
    }
 
    
}

