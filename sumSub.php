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

	if ($newNumber{strlen($newNumber) - 1} == 0) $newNumber = substr($newNumber, 0, -1);
	if ($newNumber{strlen($newNumber) - 1} == '.') $newNumber = substr($newNumber, 0, -1);
    return $newNumber;
}


/* Генерирует пару "подходящих друг к другу" чисел для суммы. Например 233 и 3567, 185 и 415, 159 и 441, 947 и 503.
Возвращает массив из двух чисел */
function generatePairNumbersSum(){
    $num1 = mt_rand(1, 999);
    $num1 = (string) $num1;
    $num2_0 = mt_rand(1, 99);
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


/* Генерирует пару "подходящих друг к другу" чисел для разности. Например  
Возвращет массив из двух чисел, на первом месте большее число. */
function generatePairNumbersDiff(){
    $num1 = mt_rand(1, 999);
    $num1 = (string) $num1;
    $num2_0 = mt_rand(1, 99);
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



$n = 4;
$mas_pairs = array();
for ($i = 0; $i < 2 * $n; $i=$i +2){
	$k = mt_rand(0, 5);
	$pair = generatePairNumbersDiff();
	$mas_pairs[$i] = intToFloat($pair[0], $k);
	$mas_pairs[$i+1] = intToFloat($pair[1], $k);	
}



echo '<pre>';
$mas_pairs_0 = $mas_pairs;
rsort($mas_pairs);
$mas_pairs_shuffle = $mas_pairs;
echo '<pre>';
print_r($mas_pairs_0);
echo '<pre>';
print_r($mas_pairs_shuffle);
echo '<pre>';


$expr = $mas_pairs_shuffle[0];

for ($i = 1; $i <= count($mas_pairs_shuffle) - 1; $i++){
 $expr = $expr . ' - ' . $mas_pairs_shuffle[$i];
}
echo '<pre>';
echo $expr;

$diff = $mas_pairs_shuffle[0];

echo '<pre>';
echo $diff;

for ($i = 1; $i <= count($mas_pairs_shuffle) - 1; $i++){
$diff = $diff - $mas_pairs[$i];
};

echo '<pre>';
echo $diff;








$resh0 = $mas_pairs_0[0];

for ($i = 1; $i < count($mas_pairs_0); $i++){
	$resh0 = $resh0. ' - ' . $mas_pairs_0[$i];
	
};

echo '<pre>';
echo $resh0;



$resh1 = '';
$resh1_mas = array();
for ($i = 0; $i < count($mas_pairs_0); $i = $i + 2){
	$resh1_mas[$i] = $mas_pairs_0[$i] - $mas_pairs_0[$i+1];
	$resh1 .= $resh1_mas[$i] . ' - ';
};

if ($resh1{strlen($resh1)-1} == ' ') 
	$resh1 = substr($resh1, 0, -3);

echo '<pre>';
echo $resh1;
echo '<pre>';
print_r($resh1_mas);



$otv = array_sum($mas_pairs_0);
echo '<pre>';
echo $otv;