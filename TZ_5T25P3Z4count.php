<?php
	
/* Добавить буквы */


	ini_set('display_errors', 1);
	error_reporting(0);

	function test_task_manager(){

		$i = mt_rand(0, 2);
		$j = ($i + 1)%3;
		$k = ($i + 2)%3;

		$i0 = mt_rand(0, 1);
		$ind0 = [$i, $j];
		$ind = $ind0[$i0];

		$a = mt_rand(101, 999) / 10;
		$b = mt_rand(101, 999) / 10;
		$c = mt_rand(101, 999) / 10;

		

		$sides = [[$a, 'AB'], [$b, 'BC'], [$c, 'AC']];

		if ($sides[$j][0] > $sides[$i][0] ) {
		    $rulex = 'больше'; 
		    $x = $sides[$j][0] - $sides[$i][0];
		    $act1 = "{$sides[$i][0]} + {$x} = {$sides[$j][0]}"; 
		} else if ($sides[$j][0] < $sides[$i][0]) {
		    $rulex = 'меньше'; 
		    $x = $sides[$i][0] - $sides[$j][0]; 
		    $act1 = "{$sides[$i][0]} - {$x} = {$sides[$j][0]}"; 
		} else if ($sides[$j][0] == $sides[$i][0]) {
		    $interim = mt_rand(1, 99)/10; 
		    $sides[$j][0] = $sides[$j][0] + $interim; 
		    $rulex = 'больше'; 
		    $x = $interim; 
		    $act1 = "{$sides[$i][0]} + {$x} = {$sides[$j][0]}";
		}

		switch ($ind) {
			case $i:
				if ($sides[$k][0] > $sides[$i][0] ) {
			    	$ruley = 'больше'; 
			    	$y = $sides[$k][0] - $sides[$i][0]; 
			    	$act2 = "{$sides[$i][0]} + {$y} = {$sides[$k][0]}";
		    	} else if ($sides[$k][0] < $sides[$i][0]) {
				    $ruley = 'меньше'; 
				    $y = $sides[$i][0] - $sides[$k][0]; 
				    $act2 = "{$sides[$i][0]} - {$y} = {$sides[$k][0]}";
				} else if ($sides[$k][0] == $sides[$i][0]) {
				    $interim = mt_rand(1, 99)/10; 
				    $sides[$k][0] = $sides[$k][0] + $interim; 
				    $ruley = 'больше'; 
				    $y = $interim; 
				    $act2 = "{$sides[$i][0]} + {$y} = {$sides[$k][0]}";
				}

				break;

			case $j:
				if ($sides[$k][0] > $sides[$j][0] ) {
			    	$ruley = 'больше'; 
			    	$y = $sides[$k][0] - $sides[$j][0];
			    	$act2 = "{$sides[$j][0]} + {$y} = {$sides[$k][0]}"; 
		    	} else if ($sides[$k][0] < $sides[$j][0]) {
				    $ruley = 'меньше'; 
				    $y = $sides[$j][0] - $sides[$k][0];
				    $act2 = "{$sides[$j][0]} - {$y} = {$sides[$k][0]}"; 
				} else if ($sides[$k][0] == $sides[$j][0]) {
				    $interim = mt_rand(1, 99)/10; 
				    $sides[$k][0] = $sides[$k][0] + $interim; 
				    $ruley = 'больше'; 
				    $y = $interim; 
				    $act2 = "{$sides[$i][0]} + {$y} = {$sides[$k][0]}";
				}

				break;
		}


		$p = $sides[$i][0] + $sides[$j][0] + $sides[$k][0];

		$expr_ind = mt_rand(0, 1);

		$expr_mas = ["В треугольнике ABC сторона {$sides[$i][1]} равна {$sides[$i][0]} см. {$sides[$j][1]} {$rulex} стороны {$sides[$i][1]} на {$x} см, 
		a {$sides[$k][1]} {$ruley} стороны {$sides[$ind][1]} на {$y} см. Найдите периметр треугольника ABC.",
		" Периметр треугольника ABC равен {$p} см. Сторона {$sides[$i][1]} равна {$sides[$i][0]} см, сторона {$sides[$j][1]} {$rulex} стороны {$sides[$i][1]} на {$x} см. Найдите сторону {$sides[$k][1]}."];


		$expr = $expr_mas[$expr_ind];

		echo $expr;

		if ($expr_ind == 0) {
			$otv = $p;
			$resh = "По условию, сторона {$sides[$j][1]} {$rulex} стороны {$sides[$i][1]} на {$x} см. Значит, {$sides[$j][1]} = {$act1} (см).<br>
			Так как {$sides[$k][1]} {$ruley} стороны {$sides[$ind][1]} на {$y} см, {$sides[$k][1]} = {$act2} (см).<br>
			Вспомним, что периметр P треугольника равен сумме длин всех сторон треугольника.<br>
			P = {$sides[0][1]} + {$sides[1][1]} + {$sides[0][1]}<br>
			P = {$a} + {$b} + {$c} = {$p} (см)";
		} else {
			$otv = $sides[$k][0];
			$resh = "По условию, сторона {$sides[$j][1]} {$rulex} стороны {$sides[$i][1]} на {$x} см. Значит, {$sides[$j][1]} = {$act1} (см).<br>
			Вспомним, что периметр треугольника равен сумме длин всех сторон треугольника.<br>
			P = {$sides[0][1]} + {$sides[1][1]} + {$sides[0][1]}<br>
			Поэтому, чтобы найти сторону {$sides[$k][1]}, нужно от периметра отнять известные стороны {$sides[$i][1]} и {$sides[$j][1]}.<br>
			{$sides[$k][1]} = {$p} – {$sides[$i][0]} - {$sides[$j][0]} = {$otv} (см)";
		}

		echo '<pre>';
		echo 'Ответ: ', $otv, ' (см)';


		echo '<pre>';
		echo 'Решение: ', $resh;

		$expr = preg_replace('#[\s]+#i', ' ', $expr);
		return array('exp'=>trim($expr).' - '.$otv, 'otv'=>$otv);

	}

	$result = array();
	$pre = array();

	for($i = 0; $i < 300; $i++){
		$otv = test_task_manager();
		if(!in_array($otv['exp'], $result))
			$result[] = $otv['exp'];
		$pre[$otv['otv']]++;
	}

	echo '<div style="margin: 100px;"></div>';

	$count_result = count($result);
	echo "Количество возможных вариантов задания {$count_result}";

	echo '<pre>';

	//print_r($pre);	

	//print_r($result);
	//echo '</pre>';