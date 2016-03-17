<?php


/* Преобразует целое число number в десятичное, с countNumberAfterComma знаками после запятой */
function intToFloat($number, $countNumberAfterComma){

    $number = (string) $number;
    $numberLen = strlen($number);

    $newNumber = '';

    if($countNumberAfterComma >= $numberLen) {
        $countZero = $countNumberAfterComma - $numberLen;
        $newNumber = '0.'.str_repeat('0', $countZero).$number;
    }
    else {
        for($i = $numberLen - 1, $k = 1; $i >= 0; $i--, $k++){
            $newNumber .= $number{$i};
            if($k == $countNumberAfterComma) $newNumber .= '.';
        }
        
        $newNumber = strrev($newNumber);
    }

    return $newNumber;
}



/* Создает и возвращает string итоговую сумму sum и массив коэффициентов k_mas. 
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


/* Вывод самого столбика. Не выводить 0 в k_mas! */
function printAdditionInColumn ($a, $b, $sum, $k_mas) {

    $s1 = (string) max($a, $b);
    $s2 = (string) min($a, $b);

    $s1_len = strlen($s1);

    $k_num = implode("", $k_mas);

    echo '<pre>';
    $str = str_repeat(' ', $s1_len);
    $str = '';
    echo '<table width="80px">';
    echo "<tr><td align='right'>{$k_num}</td></tr>";
    echo "<tr><td align='right'>{$s1}</td></tr>";
    echo "<tr><td align='right' style='border-bottom: 1px solid #222;'>{$s2}</td></tr>"; 
    echo "<tr><td align='right'>{$sum}</td></tr>";
    echo '</table>';

};



/* Принимает два складываемых числа, сумму и массив коэффициентов. 
Заменяет в случайном порядке некоторые цифры в числах a, b и sum (чисел a и b) звездочками. Возвращает новые a, b, sum как string.
Создает массив solutions, который содержит поэтапное решение, как string. 
Длина массива solutions совпадает с количеством вставленных звездочек и длиной наименьшего из складываемых чисел */


function additionInColumnWithAsterisks ($a, $b, $sum, $k_mas) {

$s1 = (string) max($a, $b);
$s2 = (string) min($a, $b);

$s1_len = strlen($s1);
$s2_len = strlen($s2);

$elements = $solutions = array();

    for($i = $s1_len - 1, $j = $s2_len - 1; $j >= 0; $i--, $j--){
        $lelements = array();
        $lelements = array($s1{$i}, $s2{$j}, $sum{$i});
        if ($i == 0) $n = mt_rand(0, 1);
            else $n = mt_rand(0, 2);
        
        /* в этих местах делать поля, для ввода цифры, со звездочкой на фоне  */
        $lelements[$n] = '*';
        $elements[] = $lelements;

        $stars = $j + 1;

        if ($n == 2) {
            
            $lsum = $s1{$i} + $s2{$j} + $k_mas[$i]; 
            if ($k_mas[$i] == 0) {      
                $interim_solution = "{$stars} звездочка: {$s1{$i}} + {$s2{$j}} = $lsum";    
            } else {
                $interim_solution = "{$stars} звездочка: {$s1{$i}} + {$s2{$j}} + $k_mas[$i] = $lsum" . " (добавляем единицу с предыдущего шага)";
            }
            if ($lsum >= 10) {
                $solutions[$j] =  $interim_solution . " - записываем в сумму количество единиц {$sum{$i}} и запоминаем единицу для следующего старшего разряда";
            } else  $solutions[$j] = $interim_solution;

        } else {

            if ($sum{$i} >= $lelements[(1 + $n)%2] + $k_mas[$i]) {
                $ls12 = $sum{$i} - $lelements[(1 + $n)%2] - $k_mas[$i];
                if ($k_mas[$i] == 0) {
                    $interim_solution = "{$stars} звездочка: {$sum{$i}} - {$lelements[(1 + $n)%2]} = $ls12";    
                } else {
                    $interim_solution = "{$stars} звездочка: {$sum{$i}} - {$lelements[(1 + $n)%2]} - $k_mas[$i] = $ls12" . " (отнимаем единицу с предыдущего шага)";
                }

            } else {
                $lsum = '1' . $sum{$i};
                $interim_solution = "{$stars} звездочка: Так как {$sum{$i}} меньше {$lelements[(1 + $n)%2]}, берем {$lsum} и запоминаем единицу для следующего старшего разряда";       
                $ls12 = $lsum - $lelements[(1 + $n)%2] - $k_mas[$i];        
                if ($k_mas[$i] == 0) {
                    $interim_solution = $interim_solution . " {$lsum} - {$lelements[(1 + $n)%2]} = {$ls12}";
                } else {
                    $interim_solution = $interim_solution . " {$lsum} - {$lelements[(1 + $n)%2]} - $k_mas[$i] = {$ls12}" . " (отнимаем единицу с предыдущего шага)";
                }
            }

            $solutions[$j] = $interim_solution;
        }
    }

    $reversed_elements = array_reverse($elements);

    $s1_star = $s2_star = $sum_star = '';

    foreach ($reversed_elements as $lelements) {
        $s1_star = $s1_star . $lelements[0];
    }
    foreach ($reversed_elements as $lelements) {
        $s2_star = $s2_star . $lelements[1];
    }
    foreach ($reversed_elements as $lelements) {
        $sum_star = $sum_star . $lelements[2];
    }

    return array('a' => $s1_star, 'b' => $s2_star,'sum' => $sum_star, 'solutions' => $solutions);
}


/* Вывод столбика со звездочками */

function printAdditionInColumnWithAsterisks ($a, $b, $sum) {



    echo '<pre>';
    $str = str_repeat(' ', strlen($a));
    $str = '';
    echo '<table width="80px">';
    echo "<tr><td align='right'>{$a}</td></tr>";
    echo "<tr><td align='right' style='border-bottom: 1px solid #222;'>{$b}</td></tr>"; 
    echo "<tr><td align='right'>{$sum}</td></tr>";  
    echo '</table>';

};


$a0 = mt_rand(10,9999);
$b0 = mt_rand(10,9999);

$j = mt_rand(0, 6);
$i = $j + 2;

$a = intToFloat($a0, $i);
$b = intToFloat($b0, $j);

echo $a, ' + ', $b, ' = ', $a + $b;
if ($j == 0){
    $b  = $b.'.';
    $b_zero = $b.str_repeat('0', 2);
} else $b_zero = $b.str_repeat('0', 2);


$resAddition = additionInColumn($a*pow(10, $i), $b_zero*pow(10, $i));

echo '<pre>';
echo $a*pow(10, $i), '  ', $b_zero*pow(10, $i), '  ',  $resAddition['sum'];

$resAdditionAsterisks = additionInColumnWithAsterisks($a*pow(10, $i), $b_zero*pow(10, $i), $resAddition['sum'], $resAddition['k_mas']);
echo '<pre>';
echo $resAdditionAsterisks['a'], ' ', $resAdditionAsterisks['b'], '  ', $resAdditionAsterisks['sum'];

$resAddition['sum'] = intToFloat($resAddition['sum'], $i);
array_splice( $resAddition['k_mas'], count($resAddition['k_mas']) - $i, 0, ' ' );

printAdditionInColumn ($a, $b_zero, $resAddition['sum'], $resAddition['k_mas']);

$resAdditionAsterisks['a'] = intToFloat($resAdditionAsterisks['a'], $i);
$resAdditionAsterisks['b'] = intToFloat($resAdditionAsterisks['b'], $i);
$resAdditionAsterisks['sum'] = intToFloat($resAdditionAsterisks['sum'], $i);
echo '<pre>';
echo $resAdditionAsterisks['a'], ' ', $resAdditionAsterisks['b'], '  ', $resAdditionAsterisks['sum'];
printAdditionInColumnWithAsterisks ($resAdditionAsterisks['a'], $resAdditionAsterisks['b'], $resAdditionAsterisks['sum']);


echo '<pre>';
print_r($resAdditionAsterisks['solutions']);
echo '</pre>';

