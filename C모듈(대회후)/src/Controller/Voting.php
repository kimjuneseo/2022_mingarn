<?php

namespace src\Controller;

class Voting{
    function insert(){
        extract($_POST);
        // 방어로직 투표는 들어갔는데 에러 떴을때 안건 안들어가기
        // 투표 부터 들어가고 그 다음에 foreach
        query("INSERT INTO `voting_tbl`( `name`, `start_date`, `end_date`,`all_user`) VALUES (?,?,?,?)", [$voting,$start_date,$end_date,$all_user]);
        foreach($item as $item_name){
            $maxIdx = fetch("SELECT max(`idx`) as `index` from  `voting_tbl`");
            $idx = $maxIdx->index ? $maxIdx->index : 0;
            fetch("INSERT into item_tbl (`voting`, `name`) values(?,?)",[$idx, $item_name]);
        }
    }
}