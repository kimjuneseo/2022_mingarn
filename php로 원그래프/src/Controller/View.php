<?php
namespace src\Controller;

class View
{
    
    function main()
    {
        view("main");
        // var_dump($sum);

        $dummys = [
            addDummy('123123',500), //민석
            addDummy('준서 ',500), //준우
            addDummy('시호',500), //준서
        ];
        

          
 
        // DB idx Address 
        // [$idx] = $params;
        // dummy setting 
        $dummys = [
            addDummy('여준우',500), //민석
            addDummy('준서 ',500), //준우
            addDummy('시호',500), //준서
        ];
        

        // array_reduce => $acc에 값을 계속 더해주고 더한값 디렅
        $sum = array_reduce($dummys,  fn($acc,$item) => $acc+$item->value);
		
        $p = 360/$sum;


        // base setting 
        $imageWidth = 600;
        $imageHeight = 600;
        $circleSize = 400;
        // GDimage인스터스 생성
        $image = imagecreate($imageWidth,$imageHeight);

        // @start
        // 흰색
        $bg = imagecolorallocate($image, 255, 255, 255);
        // 검음색
        $black = imagecolorallocate($image,0,0,0);
        $acc = -90;

        foreach ($dummys as $idx => $item) {
            $color = imagecolorallocate($image,rand(0,255),rand(0,255),rand(0,255));
            $x = $imageWidth/2;
            $y = $imageHeight/2;

            $angle = $p*$item->value; // 120
            $start = $acc; // -90
            $end = $acc+$angle; // 30
            $acc = $end; 
            $degres =  $start + $angle/2; //-30
            $radians = $degres*(pi()/180);
            
            $ax = $x + cos($radians) * 5;
            $ay = $y + sin($radians) * 5;
            $lx = $x + cos($radians) * ($circleSize/2+30);
            $ly = $y + sin($radians) * ($circleSize/2+30);
            $tx = $x + cos($radians) * ($circleSize/2+40);
            $ty = $y + sin($radians) * ($circleSize/2+40);
            var_dump($lx,$ay);
            return;
            // var_dump($ax);   
            imagefilledarc($image, $ax, $ay, $circleSize, $circleSize, $start, $end, $color,IMG_ARC_PIE);            
            imageline($image,$ax,$ay,$lx,$ly,$color);

            imagettftext($image, 10, 0, $tx, $ty, $color, './b.otf', $item->name);
        }



        // imagepng($image);
    
    }
}
