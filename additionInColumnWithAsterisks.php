<?php

$a = mt_rand(10,9999999);
$b = mt_rand(10,9999999);

echo $a, ' + ', $b, ' = ', $a + $b;

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
    echo '<table width="50px">';
    echo "<tr><td align='right'>{$k_num}</td></tr>";
    echo "<tr><td align='right'>{$s1}</td></tr>";
    echo "<tr><td align='right' style='border-bottom: 1px solid #222;'>{$s2}</td></tr>"; 
    echo "<tr><td align='right'>{$sum}</td></tr>";
    echo '</table>';

};



$resAddition = additionInColumn($a, $b);
printAdditionInColumn ($a, $b, $resAddition['sum'], $resAddition['k_mas']);





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
    echo '<table width="50px">';
    echo "<tr><td align='right'>{$a}</td></tr>";
    echo "<tr><td align='right' style='border-bottom: 1px solid #222;'>{$b}</td></tr>"; 
    echo "<tr><td align='right'>{$sum}</td></tr>";  
    echo '</table>';

};

$resAdditionAsterisks = additionInColumnWithAsterisks($a, $b, $resAddition['sum'], $resAddition['k_mas']);

printAdditionInColumnWithAsterisks ($resAdditionAsterisks['a'], $resAdditionAsterisks['b'], $resAdditionAsterisks['sum']);


echo '<pre>';
print_r($resAdditionAsterisks['solutions']);
echo '</pre>';

