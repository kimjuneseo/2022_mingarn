<?php
session_start();
/*
comment: 조건에 맞는 JSON 내용 제작 후 반환
*/

/* 결과 객체 */
$result = array();

/* 행사(평가 시 추가, 수정)*/
$eventArr = array(
	array("01-01", "01-01", "신정"), 
	array("02-01", "02-01", "입주 1주년"), 
	array("02-01", "02-03", "설날"), 
	array("10-03", "10-03", "개천절"), 
	array("04-03", "04-03", "선관위 추첨"), 
	array("09-09", "09-11", "추석"), 
	array("03-01", "03-01", "3ㆍ1 절"), 
	array("05-05", "05-05", "어린이날"), 
	array("08-15", "08-15", "광복절"), 
	array("05-08", "05-08", "부처님 오신 날"), 
	array("12-25", "12-25", "크리스마스"), 
	array("06-06", "06-06", "현충일"), 
	array("10-09", "10-09", "한글날")
	);


/* 필수 입력 값 체크 */
if(!isset($_REQUEST['yyyy']))
{
	$result['statusCd'] = "401";
	$result['statusMsg'] = "입력값이 올바르지 않습니다.";
	echo json_encode($result);
	exit;
}

/* 데이터 생성 시작 */
$result['statusCd'] = "200";
$result['statusMsg'] = "정상";

$result['totalCount'] = count($eventArr);

/* 데이터 생성 */
$eventList = array();

for($i = 0; $i < $result['totalCount']; $i++)
{
	$evenet = $eventArr[$i];
	$evenetArr = array(
		"startDt" => $_REQUEST['yyyy']."-".$evenet[0], 
		"endDt" => $_REQUEST['yyyy']."-".$evenet[1],
		"eventSj" => $evenet[2]
	 );
	 
	 $eventList[] = $evenetArr; 
}

$result['items'] = $eventList;

if(isset($_SESSION['eventReqCnt']))
{
	$eventReqCnt  = $_SESSION['eventReqCnt'];
	$eventReqCnt++; 
	$eventReqCnt = $_SESSION['eventReqCnt'] = $eventReqCnt;
}
else 
{
	$eventReqCnt = $_SESSION['eventReqCnt'] = 0;
}

if($eventReqCnt % 5 == 0)
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