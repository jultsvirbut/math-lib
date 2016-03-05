<?php

    /*
        (string) $input - dasdasdas
        (int) $multiplier - dasdasdsadsas
        @return (string) djalaskjkjd
    */
 

function number_to_array($number) {
    if(!is_int($number)) throw new Exception('The number is not integer');
    
    $number = (string) $number;
    $number_len = strlen($number) - 1;
    $arr_digits = array();
    for($i = 0; $i < $number_len; $i++){
        $arr_digits[] = (int) $number{$i};
    }
        
    return $arr_digits;
}
    
   
    /*try {
        $arr = number_to_array(10.2);
        echo '<pre>';
        print_r($arr);
    }*/


function pluralForm($number, $after) {
  $cases = array (2, 0, 1, 1, 1, 2);
  echo $after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
}


function pluralFormEnding($number, $afterEnds) {
  $cases = array (2, 0, 1, 1, 1, 2);
  echo $afterEnds[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
}
  

function cut_zero($number) {
        
    $original_number = $number;
    $i = 0;
    while($number % 10 == 0){
        $i++;
        $number = $number / 10;
    }
        
    return array('number'=>$number, 'count_zero'=>$i, 'original_number'=>$original_number);
        
}


function arrayFillRand($countElements, $min = 1, $max = 99999){

    if($countElements <= 0) throw new Exception('Введите число > 0');
    $arrayRandomValues = array();
    for($i = 0; $i < $countElements; $i++){
        $arrayRandomValues[] = mt_rand($min, $max);
        }
    
    return $arrayRandomValues;

    }

$arr = arrayFillRand(10, 200, 300);
echo '<pre>';
print_r($arr);


 

$arr = array('A'=>1/2, 'B'=>array(2,3), 'C'=>array(3,4));

function shuffle_with_save_keys($arr){

    $array_temp = array();

    foreach($arr as $key=>$val){
        $random_key = array_rand($arr);
        $array_temp[$random_key] = $arr[$random_key];
        unset($arr[$random_key]);
    }
    return $array_temp;
}
 
 
$arr = shuffle_with_save_keys($arr);
echo '<pre>';
print_r($arr);