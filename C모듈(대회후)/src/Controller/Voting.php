<?php

namespace src\Controller;

class Voting{
    function insert(){
        extract($_POST);
        query("INSERT INTO `voting_tbl`( `name`, `start_date`, `end_date`,`all_user`) VALUES (?,?,?,?)", [$voting,$start_date,$end_date,$all_user]);
        foreach($item as $item_name){
            $maxIdx = fetch("SELECT max(`idx`) as `index` from  `voting_tbl`");
            $idx = $maxIdx->index ? $maxIdx->index : 0;
            query("INSERT into item_tbl (`voting`, `name`) values(?,?)",[$idx, $item_name]);
        }
        back();
    }
    // api 한개 만든다 여기 api에는 클릭된 idx로 db에 조회해와서 테이터 폼에다가 푸려준다
    function votingAPI($parm){
        header("HTTP/1.1 200 OK");
        header("Content-Type: application/json; charset=UTF-8");
        
        $idx = $parm[1];
        $response = (object) [];

        $votingList = fetchAll("select vt.name as votingName, it.name, vt.all_user,it.item_true,it.item_false,it.item_not, it.name, it.item_true + it.item_false+ it.item_not as sum_voting from item_tbl it join voting_tbl vt on it.voting = vt.idx  WHERE it.voting =? ",[$idx]);
        $listIdx = 0;
        $votingArr = [];
        foreach($votingList as $item){
            $voting = [
                "votingName"=> $item->votingName,
                "item_true"=> $item->item_true,
                "item_false"=> $item->item_false,
                "item_not"=> $item->item_not,
                "sum_voting"=> $item->sum_voting,
            ];
            array_push($votingArr, $voting);
            $listIdx++;
        }
        $response->name = $votingList[0]->name;
        $response->votings = $votingArr;
        echo json_encode($response);
    }
} 

// 투테 투표명,
// 안테  안건이름, 안건에대한 결과