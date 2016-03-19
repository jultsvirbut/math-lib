<?php



$i = mt_rand(0, 1);

$dec = [10, 100, 1000]; 

$a = mt_rand(11, 9999) / $dec[array_rand($dec)];
$x = mt_rand(11, 9999) / $dec[array_rand($dec)];
$b = $a + $x;
$c = abs($a - $x);

$mas = [["x + {$a} = {$b}", "{$a} + x = {$b}"], ["{$a} – x = {$c}", "x – {$a} = {$c}"]];



switch ($i) {
	case '0':
		$j = mt_rand(0, 1);
		break;
	case '1':
		$j = ($a > $x) ? 0 : 1 ;
		break;
}


$solutions = [["x = {$b} - {$a} = {$x}", "x = {$b} - {$a} = {$x}"], ["x = {$a} - {$c} = {$x}", "x = {$c} + {$a} = {$x}"]];


echo '<pre>';
echo $mas[$i][$j];
echo '<pre>';
echo $x;
echo '<pre>';
echo $solutions[$i][$j];
