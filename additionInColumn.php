<?php

$a = mt_rand(10,9999999);
$b = mt_rand(10,9999999);


$s1 = (string) max($a, $b);
$s2 = (string) min($a, $b);

echo $s1, ' + ', $s2;
echo '<hr>';


$s1_len = strlen($s1);
$s2_len = strlen($s2);

$sum = $k_mas = array();
$k_mas[$s1_len - 1] = 0;

for($i = $s1_len - 1, $j = $s2_len - 1; $i >= 0; $i--, $j--){

 	if($j < 0)
		$x = $s1{$i} + 0 + $k_mas[$i];
  	else
		$x = $s1{$i} + $s2{$j} + $k_mas[$i];

	if($x >= 10){
		if($i == 0) $sum[$i] = $x;
		else {
			$sum[$i] = $x % 10;
			$k_mas[$i-1] = floor($x / 10);
		}
	} 
	else {
        $sum[$i] = $x;
		$k_mas[$i-1] = 0;
	}

};

ksort($sum);
ksort($k_mas);


$sum_num = implode("", $sum);
$k_num = implode("", $k_mas);


echo '<pre>';

$str = str_repeat(' ', $s1_len);
$str = '';
echo '<table width="50px">';
echo "<tr><td align='right'>{$k_num}</td></tr>";
echo "<tr><td align='right'>{$s1}</td></tr>";
echo "<tr><td align='right' style='border-bottom: 1px solid #222;'>{$s2}</td></tr>"; 
echo "<tr><td align='right'>{$sum_num}</td></tr>";
   
echo '</table>';





$lelements = [];
$elements = [];



for($i = $s1_len - 1, $j = $s2_len - 1; $j >= 0; $i--, $j--){
	 	
	$lelements = [$s1{$i}, $s2{$j}, $sum[$i]];
	if ($i == 0) $n = mt_rand(0, 1);
		else $n = mt_rand(0, 2);
	$lelements[$n] = '*';
	$elements[] = $lelements;

	if ($n == 2) {
		
		$lsum = $s1{$i} + $s2{$j} + $k_mas[$i]; 

		if ($k_mas[$i] == 0) {
			echo '<pre>'; 
			echo $i + 1 . ' звездочка: ';
			echo $s1{$i} . ' + ' . $s2{$j} . ' = ' . $lsum;
		} else {
				echo '<pre>'; 
				echo $i + 1 . ' звездочка: ';
				echo $s1{$i} . ' + ' . $s2{$j} . ' + ' . $k_mas[$i] . ' = ' . $lsum;
			}

		if ($lsum >= 10) {
			echo ' записываем в сумму количество единиц ' . $sum[$i] . ' и запоминаем единицу для следующего старшего разряда ';
		}

	} else {

		if ($sum[$i] >= $lelements[(1 + $n)%2] + $k_mas[$i]) {
			echo '<pre>'; 
			echo $i + 1 . ' звездочка: ';
			$ls12 = $sum[$i] - $lelements[(1 + $n)%2] - $k_mas[$i];

			if ($k_mas[$i] == 0) {

				echo $sum[$i] . ' - ' . $lelements[(1 + $n)%2] . ' = ' . $ls12;
			} else {

				echo $sum[$i] . ' - ' . $lelements[(1 + $n)%2] . ' - ' . $k_mas[$i] . ' = ' . $ls12;
				}

		} else {

			$lsum = '1' . $sum[$i];
			echo '<pre>'; 
			echo $i + 1 . ' звездочка: ';
			echo 'Так как ' . $sum[$i] . ' меньше ' . $lelements[(1 + $n)%2] . ', берем ' . $lsum . ' и запоминаем единицу для следующего старшего разряда ';
			
			if ($k_mas[$i] == 0) {

				echo $lsum . ' - ' . $lelements[(1 + $n)%2] . ' = ';
			} else {

					echo $lsum . ' - ' . $lelements[(1 + $n)%2] . ' - ' . $k_mas[$i] . ' = ';
				}

			echo $lsum - $lelements[(1 + $n)%2] - $k_mas[$i];
			if ($lsum - $lelements[(1 + $n)%2] - $k_mas[$i] >= 10) {
				echo ' - записываем в cлагаемое количество единиц ' . ($lsum - $lelements[(1 + $n)%2] - $k_mas[$i])%10 . ' и запоминаем единицу для следующего старшего разряда ';
			}
		}

	}




};


$reversed_elements = array_reverse($elements);
$s1_star = '';
$s2_star = '';
$sum_star = '';


   
foreach ($reversed_elements as $lelements) {
  	$s1_star = $s1_star . $lelements[0];
}
foreach ($reversed_elements as $lelements) {
  	$s2_star = $s2_star . $lelements[1];
}
foreach ($reversed_elements as $lelements) {
   	$sum_star = $sum_star . $lelements[2];
}


echo '<pre>';
$str = str_repeat(' ', $s1_len);
$str = '';
echo '<table width="50px">';
echo "<tr><td align='right'>{$s1_star}</td></tr>";
echo "<tr><td align='right' style='border-bottom: 1px solid #222;'>{$s2_star}</td></tr>"; 
echo "<tr><td align='right'>{$sum_star}</td></tr>";  
echo '</table>';




