<?php

$a = mt_rand(10,9999999);
$b = mt_rand(10,9999999);

echo $a, '   ', $b, '      ', abs($a - $b);

/* Создает и возвращает string разность sub двух чисел a и b и массив коэффициентов k_mas. 
Массив k_mas содержит коэффициенты 0 или 1, для каждой цифры числа a. */

function subtraction_in_column ($a, $b) {
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
function print_subtraction_in_column ($a, $b, $sub, $k_mas) {

    $s1 = (string) max($a, $b);
    $s2 = (string) min($a, $b);
    $s1_len = strlen($s1);
    $k_num = implode("", $k_mas);
	echo '<pre>';
	$str = '';
	echo '<table width="50px">';
	echo "<tr><td align='right'>{$k_num}</td></tr>";
	echo "<tr><td align='right'>{$s1}</td></tr>";
	echo "<tr><td align='right' style='border-bottom: 1px solid #222;'>{$s2}</td></tr>"; 
	echo "<tr><td align='right'>{$sub}</td></tr>";	   
	echo '</table>';
};


$results = subtraction_in_column($a, $b);
print_subtraction_in_column ($a, $b, $results['sub'], $results['k_mas']);