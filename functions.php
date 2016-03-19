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



/* Преобразует целое число number в десятичное, с countNumberAfterComma знаками после запятой */
function intToFloat($number, $countNumberAfterComma){

    $number = (string) $number;
    $numberLen = strlen($number);
    $newNumber = '';

    if($countNumberAfterComma >= $numberLen) {
        $countZero = $countNumberAfterComma - $numberLen;
        $newNumber = '0.'.str_repeat('0', $countZero).$number;
    }
    else {
        for($i = $numberLen - 1, $k = 1; $i >= 0; $i--, $k++){
            $newNumber .= $number{$i};
            if($k == $countNumberAfterComma) $newNumber .= '.';
        }
        
        $newNumber = strrev($newNumber);
    }
    return $newNumber;
}


/* Обрезает нули в десятичных числах */
function cutZeroDecimal($decimal) {
    while($decimal{strlen($decimal) -1} == '0') {
        $decimal = substr($decimal, 0, -1);
    }
    if ($decimal{strlen($decimal) -1} == '.') $decimal = substr($decimal, 0, -1);
    return $decimal;
}


/* Генерирует пару "подходящих друг к другу" чисел для суммы. Например 233 и 3567, 185 и 415, 159 и 441, 947 и 503.
Возвращает массив из двух чисел */
function generatePairNumbersSum(){
    $num1 = mt_rand(1, 999);
    $num1 = (string) $num1;
    $num2_0 = mt_rand(1, 9);
    $num2_0 = (string) $num2_0;
    
    $num2_mas = array(
        $num2_0 . (10 - substr($num1, strlen($num1) - 1, 1)), 
        $num2_0 . (100 - substr($num1, strlen($num1) - 2, 2)), 
        $num2_0 . (1000 - substr($num1, strlen($num1) - 3, 3))
    );

    $i = mt_rand(0, 2);
    $num2 = $num2_mas[$i];  
    return array($num1, $num2);
};


/* Генерирует пару "подходящих друг к другу" чисел для разности. Например  719 и 419, 853 и 533б, 7923 и 923.
Возвращет массив из двух чисел, на первом месте большее число. */
function generatePairNumbersDiff(){
    $num1 = mt_rand(1, 999);
    $num1 = (string) $num1;
    $num2_0 = mt_rand(1, 9);
    $num2_0 = (string) $num2_0;
    
    $num2_mas = array(
        $num2_0 . substr($num1, strlen($num1) - 1, 1), 
        $num2_0 . substr($num1, strlen($num1) - 2, 2), 
        $num2_0 . substr($num1, strlen($num1) - 3, 3)
    );

    $i = mt_rand(0, 2);
    $num2 = $num2_mas[$i]; 
    $num_max = max($num1, $num2);
    $num_min = min($num1, $num2);
    return array($num_max, $num_min);
};


    $start = microtime(true);

    #sleep(2);

    class GenerationLetters {

        public static function getRusLetters(){

            $classesLetters = array();

            foreach (range(chr(0xC0), chr(0xDF)) as $letter)
            $classesLetters[] = iconv('CP1251', 'UTF-8', $letter);

            return $classesLetters;

        }

        public static function getEnLetters($lowerCase = false){

            $classesLetters = array();

            foreach (range(chr(0x41), chr(0x5A)) as $letter) {
                if($lowerCase) $letter = strtolower($letter);
                $classesLetters[] = $letter;
            }

            return $classesLetters;

        }

    }

    $a = GenerationLetters::getEnLetters(true);
    #echo '<Pre>';
    #print_r($a);

    ob_start();
    printf('<div class="execute-script">Скрипт выполнился за <b>%.4f</b></div>', microtime(true) - $start);
    $execute_script = ob_get_clean();

?>

<style type="text/css">
    .execute-script {
        font-family: Arial;
        width : 100%;
        height:  40px;
        line-height: 40px;
        position: fixed;
        bottom: 0px;
        left : 0px;
        background: #444;
        color : #fff;
        text-align: center;
        font-size : 16px;
        box-shadow: 0px -5px 10px rgba(0,0,0,.1);
    }
</style>

<?=$execute_script?>