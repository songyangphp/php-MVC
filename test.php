<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-26
 * Time: 14:11
 */
/*$file = "aaa.jpg";
$ext = end(explode(".",$file));
var_dump($ext);

$arr = array(6, 3, 8, 2, 9, 1);
$tmp = 0;
$count = count($arr)-1;
for ($i=0; $i<$count; $i++){
    for ($j=0; $j<$count-$i; $j++){
        if($arr[$j] < $arr[$j+1]){
            $tmp = $arr[$j];
            $arr[$j] = $arr[$j+1];
            $arr[$j+1] = $tmp;
        }
    }
}

var_dump($arr);

$Tarray = array(
    array('id' => 0, 'name' => '123'),
    array('id' => 0, 'name' => '1234'),
    array('id' => 0, 'name' => '1235'),
    array('id' => 0, 'name' => '12356'),
    array('id' => 0, 'name' => '123abc')
);

$count = count($Tarray)-1;
for ($i=0; $i<$count; $i++){
    for ($j=0; $j<$count-$i; $j++){
        if(strlen($Tarray[$j]['name']) > strlen($Tarray[$j+1]['name'])){
            $tmp = $Tarray[$j];
            $Tarray[$j] = $Tarray[$j+1];
            $Tarray[$j+1] = $tmp;
        }
    }
}

$i = 1;
foreach ($Tarray as $k => $v){
    $Tarray[$k]['id'] = $i;
    $i++;
}

var_dump($Tarray);*/


$array = array(2,1,32,24,79,16,19,25,67,81,100);
//冒泡排序

$count = count($array)-1;
for ($i=0; $i<$count; $i++){
    for($j=0; $j<$count-$i; $j++){
        if($array[$j] < $array[$j+1]){
            $tmp = $array[$j];
            $array[$j] = $array[$j+1];
            $array[$j+1] = $tmp;
        }
    }
}


var_dump($array);




/*for ($i=1; $i<=9; $i++){
    echo "\n";
    for ($j=1; $j<=$i; $j++){
        echo $i."x".$j."=".($i*$j)." ";
    }
}*/



for ($i=1; $i<=9; $i++){
    echo PHP_EOL;
    $j=1;
    while ($j<=$i){
        echo $i."x".$j."=".($i*$j)." ";
        $j++;
    }
}















