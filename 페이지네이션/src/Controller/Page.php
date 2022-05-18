<?php

namespace src\Controller;

class Page{
    function render($page){
        $idx = $page[1];
        $pages = fetchAll("SELECT * FROM store");
        $cnt = fetch("SELECT count(*) as `cnt` FROM `store`");
        
        // 전체페이지
        $AllPageCnt = ceil($cnt->cnt/6);

        // 현재 페이지
        $pageCnt = ceil(count($pages)/6);

        $start = $idx * 6 -6;
        $end = $idx * 6 ;
        $items = fetchAll("SELECT * FROM `store` WHERE `idx` <= ? and `idx` > ? ", [$end, $start]);
        
        view("store", ['items'=>$items, 'page' => $idx, 'pagesCnt' => $pageCnt, 'cnt' => $cnt->cnt, 'AllPageCnt' => $AllPageCnt]);
        
    }
}