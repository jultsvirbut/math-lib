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



