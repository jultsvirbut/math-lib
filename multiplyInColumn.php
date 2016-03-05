function cut_zero($number) {
        
    $original_number = $number;
    $i = 0;
    while($number % 10 == 0){
        $i++;
        $number = $number / 10;
    }
        
    return array('number'=>$number, 'count_zero'=>$i, 'original_number'=>$original_number);
        
}


    
$a = mt_rand(10,9999);
$b = mt_rand(10,9999);

echo $a, '  ', $b;

$a = cut_zero($a);
$b = cut_zero($b);

$otv = $a['number'] * $b['number'];
$count_zero = $a['count_zero'] + $b['count_zero'];

echo '<pre>';
print_r($a);
print_r($b);

$m1 = (string) max($a['number'], $b['number']);
$m2 = (string) min($a['number'], $b['number']);

echo $m1, '  ', $m2;

$multiply = array();
$m1_strlen = strlen($m1);
$m2_strlen = strlen($m2);

for($j = $m2_strlen - 1; $j >= 0; $j--){
    if($m2{$j} == 0)
        $multiply[] = str_repeat('0', $m1_strlen);
    else
        $multiply[] = $m1 * $m2{$j};
}


echo '<pre>';
print_r($multiply);


$str = str_repeat(' ', $m1_strlen);
$str = '';
echo '<table width="50px">';
echo "<tr><td align='right'>{$m1}</td></tr>";
echo "<tr><td align='right' style='border-bottom: 1px solid #222;'>{$m2}</td></tr>";
foreach($multiply as $number){
    echo "<tr><td align='right'>{$number}{$str}</td></tr>";
    //echo '<br>';
    $str .= ' ';
}
if($m2 > 10) {
    echo "<tr><td align='right' style='border-bottom: 1px solid #222;'></td></tr>";
    echo "<tr><td align='right'>{$otv}</td></tr>";
}
echo '</table>';

echo $count_zero > 0 ? 'Ответ: ' . $otv.str_repeat('0', $count_zero) : 'Ответ: ' . $otv;
