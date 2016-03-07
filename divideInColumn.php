<?php
$a = mt_rand(10,9999);
$b = mt_rand(2,99);

$a = (string) 78540;
$b = (string) 55;

echo '<pre>';
echo $a, '  ', $b;


$b_len = strlen($b);
$a_len = strlen($a);


$a0 = substr($a, 0, $b_len);

echo '<pre>';
echo $a0;

	
$res = array();
$minued = array();
$difference = array();
$work_a = array();


$work_a[0] = $a0;

if ($a0 < $b) {
	
	$work_a[1] = $a0 . $a{strlen($a0)};
	
	
} else $work_a[1] = $a0;


$a1_len = strlen($work_a[1]);

$iter = $a_len - $a1_len;
 
$res[0] = floor($work_a[1]/$b);
$minued[0] = $res[0] * $b;
$difference[0] = $work_a[1] - $minued[0];


echo '<pre>';
echo $work_a[1], ' ', $res[0], ' ', $minued[0], ' ', $difference[0];


for ($i = $a1_len, $j = 1; $i < $a_len, $j < 4; $i++, $j++){
	$work_a[$j+1] = $difference[$j-1] . $a{$i};
	if ($work_a[$j+1] < $b) {
		$work_a[$j+1] = $difference[$j-1] . $a{$i} . $a{$i+1};
		$i ++;
		$j ++;
	}
	$res[$j] = floor($work_a[$j+1]/$b);
	$minued[$j] = $res[$j] * $b;
	$difference[$j] = $work_a[$j+1] - $minued[$j];
	echo '<pre>';
	echo $work_a[$j+1], ' ', $res[$j], ' ', $minued[$j], ' ', $difference[$j];
}

echo '<pre>';
print_r($res);

/*echo '<pre>';
print_r($res);
print_r($minued);
print_r($difference);
print_r($work_a); */

