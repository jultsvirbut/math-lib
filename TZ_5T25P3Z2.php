<?php


if(!function_exists('mb_ucfirst'))
{
 function mb_ucfirst($string, $enc = 'UTF-8')
 {
  return mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc) . 
         mb_substr($string, 1, mb_strlen($string, $enc), $enc);
 }
}

$count = 1;

$a = mt_rand(101, 999) / 10;
$b = mt_rand(11, 99) / 10;
$c1 = $a + $b;
$c2 = $a - $b;

$names = ['катера', 'теплохода', 'лодки', 'катамарана', 'яхты'];
$x = mt_rand(0, 5);
$name = $names[$x];

$mas = array (array ($a, "собственная скорость {$name}"), array ($b, "скорость течения реки"));


$i = mt_rand(0, 2);
$j = ($i + 1)%3;
$k = ($i + 2)%3;

$n_mas = array (1, 3);
$n = $n_mas[array_rand($n_mas)];


if ($i == 2) {
	$mas[$i] = ($n == 1) ? [$c1, "скорость {$name} по течению реки"]: [$c2, "скорость {$name} против течения реки"];
};
if ($j == 2) {
	$mas[$j] = ($n == 1) ? [$c1, "скорость {$name} по течению реки"] : [$c2, "скорость {$name} против течения реки"];
};
if ($k == 2) {
	$mas[$k] = ($n == 1) ? [$c1, "скорость {$name} по течению реки"] : [$c2, "скорость {$name} против течения реки"];
};

$first_q = mb_ucfirst($mas[$i][1]);

if ($k == 0) $mas[$k][1] = str_replace('ая', 'ую', $mas[$k][1], $count);

$quest = "{$first_q} равна {$mas[$i][0]} км/ч, а {$mas[$j][1]} {$mas[$j][0]} км/ч. Найдите {$mas[$k][1]}.";

echo '<pre>';
echo $quest; 


$theory1 = "Вспомним, что собственная скорость {$name} это скорость {$name} в стоячей воде. 
Скорость {$name} по течению реки это сумма собственной скорости {$name} и скорости течения реки.";

$theory3 = "Вспомним, что собственная скорость {$name} это скорость {$name} в стоячей воде. 
Скорость {$name} против течения реки это разность собственной скорости {$name} и скорости течения реки.";

$theory = '';

echo '<pre>';
echo 'Ответ: ', $mas[$k][0], ' (км/ч)'; 


echo '<pre>';
echo 'Решение:';
echo '<pre>';




if (($k == 2 && $n == 1) || ($k == 0 && $n == 3)) {
	$theory = ($n == 1) ? $theory1 : $theory3; 
	echo $theory;
	echo '<pre>';
	echo "Чтобы найти {$mas[$k][1]} нужно сложить {$mas[$i][1]} и {$mas[$j][1]}.";
	echo '<pre>';
	echo "{$mas[$i][0]} + {$mas[$j][0]} = {$mas[$k][0]} (км/ч)";
} else if (($k == 2 && $n == 3) || ($k == 1 && $n == 3)) {
		$mas[$i][1] = str_replace('ь', 'и', $mas[$i][1], $count);
		echo $theory3;
		echo '<pre>';
		echo "Чтобы найти {$mas[$k][1]} нужно от {$mas[$i][1]} отнять {$mas[$j][1]}.";
		echo '<pre>';
		echo "{$mas[$i][0]} - {$mas[$j][0]} = {$mas[$k][0]} (км/ч)";
} else if (($k == 1 && $n == 1) || ($k == 0 && $n == 1)) {
		$mas[$j][1] = str_replace('ь', 'и', $mas[$j][1], $count);
		echo $theory1;
		echo '<pre>';
		echo "Чтобы найти {$mas[$k][1]} нужно от {$mas[$j][1]}  отнять {$mas[$i][1]}.";
		echo '<pre>';
		echo "{$mas[$j][0]} - {$mas[$i][0]} = {$mas[$k][0]} (км/ч)";
}
