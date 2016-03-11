<?php

$a = mt_rand(10,9999999);
$b = mt_rand(10,9999999);

echo $a, ' + ', $b, ' = ', $a + $b;

/* Создает и возвращает string сумму sum чисел a и b и массив коэффициентов k_mas. 
Массив k_mas содержит коэффициенты 0 или 1, для каждой цифры числа a. */

function additionInColumn ($a, $b) {

$s1 = (string) max($a, $b);
$s2 = (string) min($a, $b);

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
    $sum = implode("", $sum);

    return array('sum' => $sum, 'k_mas' => $k_mas);
};

/* Вывод самого столбика. Не выводить 0 в k_mas!*/
function printAdditionInColumn ($a, $b, $sum, $k_mas) {

    $s1 = (string) max($a, $b);
    $s2 = (string) min($a, $b);

    $s1_len = strlen($s1);

    $k_num = implode("", $k_mas);

    echo '<pre>';
    $str = str_repeat(' ', $s1_len);
    $str = '';
    echo '<table width="50px">';
    echo "<tr><td align='right'>{$k_num}</td></tr>";
    echo "<tr><td align='right'>{$s1}</td></tr>";
    echo "<tr><td align='right' style='border-bottom: 1px solid #222;'>{$s2}</td></tr>"; 
    echo "<tr><td align='right'>{$sum}</td></tr>";
    echo '</table>';

};

$results = additionInColumn($a, $b);
printAdditionInColumn ($a, $b, $results['sum'], $results['k_mas']);
