<?php


$variant = mt_rand(4, 6);

$rope = [['Веревку', 'веревки'], ['Ленту', 'ленты'], ['Бечевку', 'бечевки'], ['Леску', 'лески'], ['Тесьму', 'тесьмы']];
$j = mt_rand(0, 4);



$a = mt_rand(101, 999) / 10;
$b = mt_rand(101, 999) / 10;
$c = mt_rand(101, 999) / 10;
$d = mt_rand(101, 999) / 10;
$e = mt_rand(101, 999) / 10;
$k = mt_rand(101, 999) / 10;



$units = [0, ['первого', $a], ['второго', $b], ['третьего', $c], ['четвертого', $d], ['пятого', $e], ['шестого', $k]];

$ind = mt_rand(2, 3);

switch ($variant) {
	case '4':
		$i = mt_rand(1, 4);
		break;
	case '5':
		$i = mt_rand(1, 5);
		break;
	case '6':
	$i = mt_rand(1, 6);
	break;	
}



if ($a > $b) {
    $rule12 = 'больше'; 
    $x = $a - $b; 
    $act12a = "{$b} + {$x} = {$a} (м) - длина первого куска."; 
    $act12b = "{$a} - {$x} = {$b} (м) - длина второго куска."; 
} else if ($a < $b) {
    $rule12 = 'меньше'; 
    $x = $b - $a; 
    $act12a = "{$b} - {$x} = {$a} (м) - длина первого куска."; 
    $act12b = "{$a} + {$x} = {$b} (м)- длина второго куска."; 
}
if ($a > $c) {
    $rule13 = 'больше'; 
    $y = $a - $c; 
    $act13a = "{$c} + {$y} = {$a} (м) - длина первого куска."; 
    $act13c = "{$a} - {$y} = {$c} (м) - длина третьего куска."; 
} else if ($a < $c) {
    $rule13 = 'меньше'; 
    $y = $c - $a; 
    $act13a = "{$c} - {$y} = {$a} (м) - длина первого куска."; 
    $act13c = "{$a} + {$y} = {$c} (м) - длина третьего куска."; 
}
switch ($ind) {
	case '3':
		if ($d > $c ) {
    	$rule4 = 'больше'; 
    	$z = $d - $c; 
    	$act4d = "{$c} + {$z} = {$d} (м) - длина четвертого куска."; 
    	$act4 = "{$d} - {$z} = {$c} (м) - длина третьего куска."; 
		} else if ($d < $c) {
    	$rule4 = 'меньше'; 
    	$z = $c - $d; 
    	$act4d = "{$c} - {$z} = {$d} (м) - длина четвертого куска."; 
    	$act4 = "{$d} + {$z} = {$c} (м) - длина третьего куска."; 
   		};
		break;
	case '2':
		if ($d > $b ) {
    	$rule4 = 'больше'; 
    	$z = $d - $b; 
    	$act4d = "{$b} + {$z} = {$d} (м) - длина четвертого куска."; 
    	$act4 = "{$d} - {$z} = {$b} (м) - длина второго куска."; 
		} else if ($d < $b) {
    	$rule4 = 'меньше'; 
    	$z = $b - $d; 
    	$act4d = "{$b} - {$z} = {$d} (м) - длина четвертого куска."; 
    	$act4 = "{$d} + {$z} = {$b} (м) - длина второго куска."; 
   		};
		break;
}
if ($d > $e ) {
    $rule45 = 'больше'; 
    $w = $d - $e; 
    $act45d = "{$e} + {$w} = {$d} (м) - длина четвертого куска."; 
    $act45e = "{$d} - {$w} = {$e} (м) - длина пятого куска."; 
} else if ($d < $e) {
    $rule45 = 'меньше'; 
    $w = $e - $d; 
    $act45d = "{$e} - {$w} = {$d} (м) - длина четвертого куска."; 
    $act45e = "{$d} + {$w} = {$e} (м) - длина пятого куска.";
}
if ($d > $k ) {
    $rule46 = 'больше'; 
    $v = $d - $k; 
    $act46d = "{$k} + {$v} = {$d} (м) - длина четвертого куска."; 
    $act46k = "{$d} - {$v} = {$k} (м) - длина шестого куска."; 
} else if ($d < $k) {
    $rule46 = 'меньше'; 
    $v = $k - $d; 
    $act46d = "{$k} - {$v} = {$d} (м) - длина четвертого куска."; 
    $act46k = "{$d} + {$v} = {$k} (м) - длина шестого куска."; 
}

switch ($variant) {
	case '4':
		$expr = "
		{$rope[$j][0]} разрезали на четыре куска. Первый кусок {$rule12} второго на {$x} м, и {$rule13} третьего на {$y} м. 
		Четвертый кусок {$rule4} {$units[$ind][0]} на {$z} м. 
		Чему равна длина всей {$rope[$j][1]}, если длина {$units[$i][0]} куска равна {$units[$i][1]} м.";
		$otv = $a + $b + $c + $d;
		break;
	case '5':
		$expr = "
		{$rope[$j][0]} разрезали на пять кусков. Первый кусок {$rule12} второго на {$x} м, и {$rule13} третьего на {$y} м. 
		Четвертый кусок {$rule4} {$units[$ind][0]} на {$z} м, и {$rule45} пятого на {$w} м. 
		Чему равна длина всей {$rope[$j][1]}, если длина {$units[$i][0]} куска равна {$units[$i][1]} м.";
		$otv = $a + $b + $c + $d + $e;
		break;
	case '6':
		$expr = "
		{$rope[$j][0]} разрезали на шесть кусков. Первый кусок {$rule12} второго на {$x} м, и {$rule13} третьего на {$y} м. 
		Четвертый кусок {$rule4} {$units[$ind][0]} на {$z} м, {$rule45} пятого на {$w} м, и {$rule46} шестого на {$v} м. 
		Чему равна длина всей {$rope[$j][1]}, если длина {$units[$i][0]} куска равна {$units[$i][1]} м.";
		$otv = $a + $b + $c + $d + $e + $k;
		break;				
}


echo '<pre>';
echo 'Условие: ', $expr;
echo '<pre>';
echo 'Ответ: ', $otv, ' (м)';
echo '<pre>';
echo 'Решение: ';
echo '<pre>';
echo "Чтобы найти длину {$rope[$j][1]} необходимо сложить длины всех кусков {$rope[$j][1]}. Найдем длину каждого куска.";
echo '<pre>';


//$solutions = [$act12a, $act12b, $act13c, $act4d, $act45e, $act46k];
$solutions = [];

switch ($units[$i][1]) {
	case $a:
		$solutions[0] = $act12b;
		$solutions[1] = $act13c;
		$solutions[2] = $act4d;
		$solutions[3] = $act45e;
		$solutions[4] = $act46k;

		break;
	case $b:
		$solutions[0] = $act12a;
		$solutions[1] = $act13c;
		$solutions[2] = $act4d;
		$solutions[3] = $act45e;
		$solutions[4] = $act46k;

		break;
	case $c:
		$solutions[0] = $act13a;
		$solutions[1] = $act12b;
		$solutions[2] = $act4d;
		$solutions[3] = $act45e;
		$solutions[4] = $act46k;

		break;
	case $d:
		if ($ind == 3){
			$solutions[0] = $act4;
			$solutions[1] = $act13a;
			$solutions[2] = $act12b;
		} else {
			$solutions[0] = $act4;
			$solutions[1] = $act12a;
			$solutions[2] = $act13c;
		}

		$solutions[3] = $act45e;
		$solutions[4] = $act46k;
		break;		
	case $e:
		$solutions[0] = $act45d;
		if ($ind == 3) {
			$solutions[1] = $act4;
			$solutions[2] = $act13a;
			$solutions[3] = $act12b;			
		} else {
			$solutions[1] = $act4;
			$solutions[2] = $act12a;
			$solutions[3] = $act13c;
		}
		$solutions[4] = $act46k;
		break;
	case $k:
		$solutions[0] = $act46d;
		$solutions[1] = $act45e;
		if ($ind == 3) {
			$solutions[2] = $act4;
			$solutions[3] = $act13a;
			$solutions[4] = $act12b;			
		} else {
			$solutions[2] = $act4;
			$solutions[3] = $act12a;
			$solutions[4] = $act13c;
		}
		break;
}

switch ($variant) {
	case '4':
		$solutions = array_slice($solutions, 0, 3);
		$solutions[] = "Тогда длина всей {$rope[$j][1]} равна:<pre>{$a} + {$b} + {$c} + {$d} = {$otv} (м)";
		foreach ($solutions as $solution) {
			echo $solution;
			echo '<pre>';
		}
		break;
	case '5':
		$solutions = array_slice($solutions, 0, 4);
		$solutions[] = "Тогда длина всей {$rope[$j][1]} равна:<pre>{$a} + {$b} + {$c} + {$d} + {$e} = {$otv} (м)";		
		foreach ($solutions as $solution) {
			echo $solution;
			echo '<pre>';
		}	
		break;
	case '6':
		$solutions = array_slice($solutions, 0, 5);
		$solutions[] = "Тогда длина всей {$rope[$j][1]} равна:<pre>{$a} + {$b} + {$c} + {$d} + {$e} + {$k} = {$otv} (м)";
		foreach ($solutions as $solution) {
			echo $solution;
			echo '<pre>';
		}		
		//print_r(array_slice($solutions, 0, 5));
	break;	
}
