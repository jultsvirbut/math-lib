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

/* Создает и возвращает string разность sub двух чисел a и b и массив коэффициентов k_mas. 
Массив k_mas содержит коэффициенты 0 или 1, для каждой цифры числа a. */

function subtractionInColumn ($a, $b) {

	$s1 = (string) max($a, $b);
	$s2 = (string) min($a, $b);

	$s1_len = strlen($s1);
	$s2_len = strlen($s2);

	$sub = $k_mas = array();
	$k_mas[$s1_len - 1] = 0;

	for($i = $s1_len - 1, $j = $s2_len - 1; $i >= 0; $i--, $j--){

	 	if($j < 0){
			if ($s1{$i} == 0 && $k_mas[$i] == 1) {
				$sub[$i] = 9 ;
				$k_mas[$i-1] = 1;
			} else {
				$sub[$i] = $s1{$i} - $k_mas[$i];
				$k_mas[$i-1] = 0;
			}
	 	}
	  	else {
			if($s1{$i} - $k_mas[$i] < $s2{$j}){
				$ls1 = '1' . $s1{$i};
				$sub[$i] = $ls1 - $k_mas[$i] - $s2{$j};
				$k_mas[$i-1] = 1;
			} 
			else {
			    $sub[$i] = $s1{$i} - $k_mas[$i] - $s2{$j};
				$k_mas[$i-1] = 0;
			}
		}
		if ($i == 0 && $sub[$i] == 0) $sub[$i] = '';

	};

	ksort($sub);
	ksort($k_mas);
	$sub = implode("", $sub);

	return array('sub' => $sub, 'k_mas' => $k_mas);
};
/* Вывод самого столбика. Не выводить 0 в k_mas! */
function printSubtractionInColumn ($a, $b, $sub, $k_mas) {

    $s1 = (string) max($a, $b);
    $s2 = (string) min($a, $b);

    $s1_len = strlen($s1);

    $k_num = implode("", $k_mas);

	echo '<pre>';

	$str = str_repeat(' ', $s1_len);
	$str = '';
	echo '<table width="50px">';
	echo "<tr><td align='right'>{$k_num}</td></tr>";
	echo "<tr><td align='right'>{$s1}</td></tr>";
	echo "<tr><td align='right' style='border-bottom: 1px solid #222;'>{$s2}</td></tr>"; 
	echo "<tr><td align='right'>{$sub}</td></tr>";
	   
	echo '</table>';


};






$a0 = mt_rand(10,9999);
$b0 = mt_rand(10,9999);


$i0 = mt_rand(0, 6);
$j0 = mt_rand(0, 6);


$a1 = intToFloat($a0, $i0);
$b1 = intToFloat($b0, $j0);


if ($a1 < $b1) {
	$a = $b1; $i = $j0;
	$b = $a1; $j = $i0;
} else {
	$a = $a1; $i = $i0;
	$b = $b1; $j = $j0;
}


echo '<pre>';
echo $a, ' * ', $b, ' = ', $a * $b;

$num_zero = $i - $j;

if($num_zero > 0) {
	if ($j == 0) $b = $b.'.';
	$b_zero = $b.str_repeat('0', $num_zero);
	$a_zero = $a;
} else {
	$num_zero = abs($num_zero);
	if ($i == 0) $a = $a.'.';
	$a_zero = $a.str_repeat('0', $num_zero);
	$b_zero = $b;
}

echo '<pre>';
echo $a_zero, ' - ', $b_zero, ' = ', $a - $b;


$results = subtractionInColumn($a_zero*pow(10, max($i, $j)), $b_zero*pow(10, max($i, $j)));

$results['sub'] = intToFloat($results['sub'], max($i, $j));
array_splice( $results['k_mas'], count($results['k_mas']) - max($i, $j), 0, ' ' );

printSubtractionInColumn ($a_zero, $b_zero, $results['sub'], $results['k_mas']);