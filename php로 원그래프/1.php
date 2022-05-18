<?php
///////////////////////////////////////////////////////////////////////////////////////////////////
// 원 백분율 그래프 생성 함수
//
// $IMG_W_SIZE: 이미지 가로 사이즈
// $IMG_H_SIZE: 이미지 세로 사이즈
// $IMG_A: 타원의 긴쪽 반지름(가로)
// $IMG_A: 타원의 짧은 쪽 반지름(세로)
// $depth: 입체 높이
// $ARRAY: 통계 대상 배열
// $gap: 인덱스 간격
// $str_size: 출력 문자 크기
//
///////////////////////////////////////////////////////////////////////////////////////////////////

function ellipse_stat($IMG_W_SIZE, $IMG_H_SIZE, $IMG_A, $IMG_B, $depth, $ARRAY, $gap, $str_size) {

// 배열 원소 통계/분석
$total = count($ARRAY);
$i = 0;
$temp = array_count_values($ARRAY);
foreach ($temp as $key => $value) {
$idx1[$i] = $key; //원소별 인덱스
$idx2[$i] = $value; //원소별 갯수
$idx3[$i] = $value / $total *360; //고유각
$j = $i - 1;
if($j < 0) $j = 0;
$idx4[$i] = $idx3[$i] + $idx4[$j]; //누적각
$idx5[$i] = $idx3[$i] / 2 + ($idx4[$i] - $idx3[$i]);//중간 포인트
$i++;
}

// 이미지 생성
$img = imagecreate($IMG_W_SIZE, $IMG_H_SIZE);
$bg_color = imagecolorallocate($img, 255, 255, 255);
$bd_color = imagecolorallocate($img, 0, 0, 0);

// 바탕원 그리기(장축이 $IMG_A이고 단축이 $IMG_B인 타원)
imagearc($img, $IMG_A, $IMG_A, 2*$IMG_A, 2*$IMG_B, 0, 360, $bd_color);

// 경계선 그리기
$PI = pi(); //파이값
for($i = 0; $i<sizeof($idx1); $i++) {
//각도에 따른 분할값 산출
//원반지름이 $IMG_A인 원과 비교해서 y축의 값이 $IMG_B:$IMG_A의 비율을 갖는다
$theta1 = deg2rad($idx4[$i]); //라디안 변환
if($idx4[$i] >= 0 && $idx4[$i] < 90) { //위치 산출
$start_x = $IMG_A * cos($PI/2 - $theta1) + $IMG_A;
$start_y = $IMG_A - $IMG_A * sin($PI/2 - $theta1) * $IMG_B / $IMG_A;
} elseif($idx4[$i] >= 90 && $idx4[$i] < 180) {
$start_x = $IMG_A * sin($PI - $theta1) + $IMG_A;
$start_y = $IMG_A * cos($PI - $theta1) * $IMG_B / $IMG_A + $IMG_A;
} elseif($idx4[$i] >= 180 && $idx4[$i] < 270) {
$start_x = $IMG_A - $IMG_A * cos($PI*3/2 - $theta1);
$start_y = $IMG_A * sin($PI*3/2 - $theta1) * $IMG_B / $IMG_A + $IMG_A;
} else {
$start_x = $IMG_A - $IMG_A * sin($PI*2 - $theta1);
$start_y = $IMG_A - $IMG_A * cos($PI*2 - $theta1) * $IMG_B / $IMG_A;
}
//정해진 값에 따라 분할
imageline($img, $start_x, $start_y, $IMG_A, $IMG_A, $bd_color);
}