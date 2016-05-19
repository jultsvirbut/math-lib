<html>
 <head>
  <title>Testing PHP</title>
 </head>
 <form action="index.php">
	<p>
		<input type="text" size=40 />
		<input type="button" value="Проверить" />
	</p>
</form>
<body>
<?php



	function gcd($a, $b) {
		return ($a % $b) ? gcd($b,$a % $b) : $b;
	}


	/*
	function gcd($a, $b) {
		$a = abs($a);
		$b = abs($b);
		while ($a != $b)
				if ($a>$b)
					$a -= $b;
				else
					$b -= $a;
    return $a;
	}
	*/
	
	function mpr($str){
		print $str."<br>";
	}
	
	function intToFloat($a, $b){
		return number_format($a, $b,".","");
	}
	
	
	function cutZeroDecimal($a){
		return number_format($a,0,"","");
	}
	// floor;
	
	
	
	$i = rand(1,10);
	$v = rand(1,2);
	
	echo "i = ".$i."<br>";
	print "v = ".$v."<br>";
	
	
	do {
		$m = rand(2,9999);
		}
	while(gcd($m, 100) == 100);
	print "m = ".$m."<br>";
	//print "gcd m = ".gcd($m, 100)."<br>";
	
	
	
	
	//print "intToFloat m,2 => ".intToFloat($m,2)."<br>";
	
	
	
	$k = cutZeroDecimal(intToFloat($m,2));
	print "k = ".$k."<br>";
		
	
	
	switch($v){
		case 1: $l = rand(101, 999); break;
		case 2: 
			do{ $l = rand(2, 999); } while($l == 100);
		break;
	}
	print "l = ".$l."<br>";
	
	$n = cutZeroDecimal(intToFloat($l,2));
	
	print "n = ".$n."<br>";
	
	$n1 = floor($n);
	
	print "n1 = ".$n1."<br>";
	
	
	$edizm1 = array("км","кг","ц","ч","а","га","км2","м","ч","мин");
	$edizm2 = array("м","г","кг","мин","м2","дм","см","мм","сек");
	
	switch ($i){
		case 1 : $j = 1; break;
		case 2 : $j = 2; break;
		case 3 : $j = 3; break;
		case 4 : $j = 4; break;
		case 5 :
		case 6 :
		case 7 : $j = 5; break;
		//case 8 : $j = array(6, 7, 8); break;
		case 8 : $j = rand(6, 8); break;
		case 9 :
		case 10 : $j = 9; break;
	}
	
	switch ($j){
		case 1 : $par5 = "метрах"; break;
		case 2 : $par5 = "граммах"; break;
		case 3 : $par5 = "килограммах"; break;
		case 4 : $par5 = "минутах"; break;
		case 5 : $par5 = "квадратных метрах"; break;
		case 6 : $par5 = "дециметрах"; break;
		case 7 : $par5 = "сантиметрах"; break;
		case 8 : $par5 = "миллиметрах"; break;
		case 9 : $par5 = "секундах"; break;
	}
	
	$mult = array(1000, 100, 10000, 1000000, 3600, 60, 10);
	
	$P = $k * $n;
	echo "P = ".$P."<br>";
	
	print "par5 = ".$par5."<br>";
	
	
	
	
	
	
	if ($i == 1 || $i == 2 || $j == 8)
		{$otv = $P * $mult[1];
		//$par3 = 
		}
	elseif ($i == 3 || $i == 5 || $j == 7)
		{$otv = $P * $mult[2];
		}
	elseif
		($i == 6)	
		{$otv = $P * $mult[3];}
	elseif
		($i == 7)	
		{$otv = $P * $mult[4];}
	elseif
		($i == 9)	
		{$otv = $P * $mult[5];}
	elseif
		($i == 4 || $i == 10)
		{$otv = $P * $mult[6];}
	elseif
		($j == 6)	
		{$otv = $P * $mult[7];}
	
	
	$par1 = "".$k." ".$edizm1[$i-1]." * ".$n;
	print "par1 = ".$par1."<br>";
	
	$par2 = $P." ".$edizm1[$i-1];
	print "par2 = ".$par2."<br>";
	
	
	
	
	
		
	
	
	echo "Ответ : ".$otv." ".$par5." .";
?>
 </body>
</html>




































