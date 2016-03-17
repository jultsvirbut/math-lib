<?php

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

function cutZeroDecimal($decimal) {
    while($decimal{strlen($decimal) -1} == '0') {
        $decimal = substr($decimal, 0, -1);
    }
    if ($decimal{strlen($decimal) -1} == '.') $decimal = substr($decimal, 0, -1);
    return $decimal;
}


$a0 = mt_rand(1, 9999);
if($a0%10 == 0) $a0 = $a0 + 1;
$i = mt_rand(1, 3);

$a = intToFloat($a0, $i);

$a = cutZeroDecimal($a);

$a = (string) $a;

if($a{strlen($a) - 1} == 5) $a = $a + 0.1; 

echo '<pre>';
echo $a;    
    
echo '<pre>';
echo round($a);