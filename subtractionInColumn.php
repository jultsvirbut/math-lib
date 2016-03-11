<?php

$a = mt_rand(10,9999999);
$b = mt_rand(10,9999999);


$s1 = (string) max($a, $b);
$s2 = (string) min($a, $b);

echo $s1, ' - ', $s2, ' = ', $s1 - $s2;
echo '<hr>';


$s1_len = strlen($s1);
$s2_len = strlen($s2);

$sub = $k_mas = array();
$k_mas[$s1_len - 1] = 0;

for($i = $s1_len - 1, $j = $s2_len - 1; $i >= 0; $i--, $j--){

 	if($j < 0)
		$sub[$i] = $s1{$i} - $k_mas[$i];
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


$sum_num = implode("", $sub);
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



