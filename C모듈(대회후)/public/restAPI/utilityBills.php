<?php
session_start();
/*
comment: 조건에 맞는 JSON 내용 제작 후 반환
*/

/* 결과 객체 */
$result = array();

/* 필수 입력 값 체크 */
// var_dump($_REQUEST['mm']);
if(!isset($_REQUEST['yyyy']) || !isset($_REQUEST['mm']))
{
	$result['statusCd'] = "401";
	$result['statusMsg'] = "입력값이 올바르지 않습니다.";
	echo json_encode($result);
	exit;
}

/* 데이터 생성 시작 */
$result['statusCd'] = "200";
$result['statusMsg'] = "정상";

/* 전기 평가 시 수정/삭제*/
$result['electric'] = array(
		"lastMonth" => 126, 
		"thisMonth" => 232,
		"avgMonth" => 150,
		"goal" => 220,
		"unit" => "kW"
	 );

/* 수도 평가 시 수정/삭제*/
$result['water'] = array(
		"lastMonth" => 5.4, 
		"thisMonth" => 3.6,
		"avgMonth" => 0, 
		"goal" => 5,
		"unit" => "㎥"
	 );


/* 가스 평가 시 수정/삭제*/
$result['gas'] = array(
		"lastMonth" => 42.11, 
		"thisMonth" => 25.29,
		"avgMonth" => 19.73,
		"goal" => 35.00,
		"unit" => "N㎥"
	 );


if(isset($_SESSION['utilityBillsReqCnt']))
{
	$utilityBillsReqCnt  = $_SESSION['utilityBillsReqCnt'];
	$utilityBillsReqCnt++; 
	$utilityBillsReqCnt = $_SESSION['utilityBillsReqCnt'] = $utilityBillsReqCnt;
}
else 
{
	$utilityBillsReqCnt = $_SESSION['utilityBillsReqCnt'] = 0;
}

if($utilityBillsReqCnt % 5 == 0)
{
	$result['statusCd'] = "411";
	$result['statusMsg'] = "데이터베이스에 연결할 수 없습니다.";	
}
else
{
	$result['statusCd'] = "200";
	$result['statusMsg'] = "정상";
	
}


echo json_encode($result);
?>