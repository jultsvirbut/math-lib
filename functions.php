<?php

    /*
    *   Получить массив цифр числа
    *   (int) @number - число
    *   return array
    */
    function number_to_array($number) {
        if(!is_int($number)) throw new Exception('The number is not integer');
        
        $number = (string) $number;
        $number_len = strlen($number) - 1;
        $arr_digits = array();
        for($i = 0; $i < $number_len; $i++){
            $arr_digits[] = (int) $number{$i};
        }
            
        return $arr_digits;
    }
    

    /*
    *   Получить правильную форму слова
    *   (int) @number - случайное число
    *   (arr) @after - массив слов, 1ый элемент: форма слова при number = 21
    *                               2ой элемент: форма слова при number = 22
    *                               3ий элемент: форма слова при number = 26
    *   return string
    */
    function plural_form($number, $after) {
      $cases = array (2, 0, 1, 1, 1, 2);
      return $after[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
    }

    /*
    *   Получить правильное окончание слова
    *   (int) @number - случайное число
    *   (arr) @afterEnds - массив окончаний слов, 1ый элемент: окончание слова при number = 21
    *                                             2ой элемент: окончание слова при number = 22
    *                                             3ий элемент: окончание слова при number = 26
    *   return string
    */
    function plural_form_ending($number, $afterEnds) {
      $cases = array (2, 0, 1, 1, 1, 2);
      return $afterEnds[ ($number%100>4 && $number%100<20)? 2: $cases[min($number%10, 5)] ];
    }
  
    /*
    *   Обрезить нули в конце числа
    *   (int) @number - число
    *   return array
    */
    function cut_zero($number) {
            
        $original_number = $number;
        $i = 0;
        while($number % 10 == 0){
            $i++;
            $number = $number / 10;
        }
        return array('number'=>$number, 'count_zero'=>$i, 'original_number'=>$original_number);    
    }

    /*
    *   Получить массив случайных чисел
    *   (int) @countElements - количество случайных чисел
    *   (int) @min - минимальное значение диапазона
    *   (int) @max - максимальное значение диапазона
    *   return array
    */
    function array_fill_rand($countElements, $min = 1, $max = 99999){

        if($countElements <= 0) throw new Exception('Введите число > 0');
        $arrayRandomValues = array();
        for($i = 0; $i < $countElements; $i++){
            $arrayRandomValues[] = mt_rand($min, $max);
            }  
        return $arrayRandomValues;
        }




    /*
    *   Перемешивает массив, сохраняя ключи
    *   (array) @arr - входящий массив
    *   return array
    */
    function shuffle_with_save_keys($arr){

        $array_temp = array();

        foreach($arr as $key=>$val){
            $random_key = array_rand($arr);
            $array_temp[$random_key] = $arr[$random_key];
            unset($arr[$random_key]);
        }
        return $array_temp;
    }
 


    /*
    *   Получить десятичное число из целого, с определенным количеством знаков после запятой
    *   (int) @number - целое число
    *   (int) @countNumberAfterComma - количество знаков после запятой 
    *   return string
    */
    function int_to_float($number, $countNumberAfterComma){

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


    /*
    *   Обрезать нули в десятичном числе
    *   (string) @decimal - десятичное число
    *   return string
    */
    function cut_zero_decimal($decimal) {
        while($decimal{strlen($decimal) -1} == '0') {
            $decimal = substr($decimal, 0, -1);
        }
        if ($decimal{strlen($decimal) -1} == '.') $decimal = substr($decimal, 0, -1);
        return $decimal;
    }


    /*
    *   Получить два числа, удобных для сложения, таких, сумма которых заканчивается на нуль, два нуля или три нуля. 
    *   return array
    */

    function generate_pair_numbers_sum(){
        $num1 = mt_rand(1, 999);
        $num1 = (string) $num1;
        $num2_0 = mt_rand(1, 9);
        $num2_0 = (string) $num2_0;
        
        $num2_mas = array(
            $num2_0 . (10 - substr($num1, strlen($num1) - 1, 1)), 
            $num2_0 . (100 - substr($num1, strlen($num1) - 2, 2)), 
            $num2_0 . (1000 - substr($num1, strlen($num1) - 3, 3))
        );

        $i = mt_rand(0, 2);
        $num2 = $num2_mas[$i];  
        return array($num1, $num2);
    };


    /*
    *   Получить два числа, удобных для вычитания, таких, разность которых заканчивается на нуль, два нуля или три нуля. 
    *   return array
    */
    function generate_pair_numbers_diff(){
        $num1 = mt_rand(1, 999);
        $num1 = (string) $num1;
        $num2_0 = mt_rand(1, 9);
        $num2_0 = (string) $num2_0;
        
        $num2_mas = array(
            $num2_0 . substr($num1, strlen($num1) - 1, 1), 
            $num2_0 . substr($num1, strlen($num1) - 2, 2), 
            $num2_0 . substr($num1, strlen($num1) - 3, 3)
        );

        $i = mt_rand(0, 2);
        $num2 = $num2_mas[$i]; 
        $num_max = max($num1, $num2);
        $num_min = min($num1, $num2);
        return array($num_max, $num_min);
    };





    /*
    *   Получить набор латинских букв от A-Z
    *   (boolean) @lowercase - преобразовать все буквы в нижний регистр
    *   (array)   @exclude - исключающие значения
    *   return array
    */
    function get_en_letters($lowercase = false, $exclude = array()){

        $classes_letters = array();

        foreach (range(chr(0x41), chr(0x5A)) as $letter) {
            if($lowercase) $letter = strtolower($letter);
            if(!in_array($letter, $exclude))
                $classes_letters[] = $letter;
        }
        return $classes_letters;
    }




    /*
    *   Генерирует массив из n случайных букв латинского алфавита.
    *   (int) @n - количество сгенерируемых букв;
    *   (boolean) @register - true - нижний регистр, false - верхний
    *   return array
    */
    function get_some_letters($n, $register){
        $lets = get_en_letters($register);
        for ($i = 0; $i < 3; $i++){
            do{
                $let[$i] = $lets[array_rand($lets)];
            } while ($let[$i] == 'o' || $let[$i] == 'l');
            $lets = array_diff($lets, array($let[$i]));
        }
        return $let;
    }



    /*  
    *   Переводит первую букву строки в верхний регистр
    *   (string) @string - строка
    *   (string) @enc - кодировка
    *   return string
    */
    function mb_ucfirst($string, $enc = 'UTF-8') {
        return mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc) . mb_substr($string, 1, mb_strlen($string, $enc), $enc);
    }


    /*  
    *   Переводит первую букву строки в нижний регистр
    *   (string) @string - строка
    *   (string) @enc - кодировка
    *   return string
    */
    function mb_lcfirst($string, $enc = 'UTF-8') {
        return mb_strtolower(mb_substr($string, 0, 1, $enc), $enc) . mb_substr($string, 1, mb_strlen($string, $enc), $enc);
    }


    /*
    *   Записывает все делители числа 
    *   (int) @a - число
    *   return array
    */
    function all_dividers($a) {
        $mas = array();
        for ($i=1; $i<=$a; $i++){  
            if ($a % $i==0)      
                $mas[] = $i;
        }
        return $mas;
    }



    /*
    *   Записывает все простые делители числа // 120 = 2, 2, 2, 3, 5
    *   (int) @a - число
    *   return array
    */
    function factor($n) {
        $ans = array();
        $d = 2;
        while ($d * $d <= $n) {
            if ($n % $d == 0) {
                $ans[] = $d;
                $n = $n / $d;
            } else $d = $d + 1;
        }
        if ($n > 1) $ans[] = $n;
        return $ans;
    }


    /*
    *   Получить массив одночленов вида a*b*c или a*b или a, где a, b, c - случайные десятичные числа.
    *   (int) @n_monomials - количество одночленов
    *   return array
    */
    function create_monomials_dec_numbers($n_monomials) {
        $mas_monomials = array();
        $dec = [1, 10, 100];
        
        $mas_index = array();
        $mas_index[0] = 0;
        for ($i = 0; $i < $n_monomials; $i++) {

            $n_numbers = ($mas_index[$i] == 1) ? mt_rand(2, 3) : mt_rand(1, 3) ;
            
            $mas_index[$i+1] = $n_numbers;

            $mas_factors = array();  
            for ($j = 0; $j < $n_numbers; $j++){
                $mas_factors[] = mt_rand(1, 99) / $dec[array_rand($dec)];
            }
            $monomial = implode(' * ', $mas_factors);
            
            $mas_monomials[] = $monomial;
        }
        return $mas_monomials;
    }



    /*
    *   Вычислить значения выражений массива
    *   (array) @mas_monomials - массив выражений
    *   return array
    */
    function eval_elements_of_array($mas_monomials){
        foreach ($mas_monomials as $monomial) {
            $product_monomials[] = eval('return ' . $monomial . ';');
        }
        return $product_monomials;
    }


    /*
    *   Получить выражение (многочлен) из массива одночленов и случайно выбранных знаков + или -
    *   (array) @mas_monomials - массив одночленов
    *   (array) @product_monomials - массив вычисленных значений одночленов, для проверки, опционально 
    *   return array
    */
    function create_expression_sum_sub($mas_monomials, $product_monomials = array()) {

        if(is_array($product_monomials) && !$product_monomials)
            $product_monomials = $mas_monomials;

        $mas_zn_def = array(' + ', ' - ');

        $condition = $product_monomials[0] > (array_sum(array_slice($product_monomials, 1, count($product_monomials) - 1)));

        for ($i = 0; $i < count($product_monomials) - 1; $i++){
            if (($product_monomials[$i] > $product_monomials[$i + 1]) && $condition){
                    $mas_zn[] = $mas_zn_def[array_rand($mas_zn_def)];
                } else $mas_zn[] = ' + ';
        }

        $expr = '';
        for ($i = 0, $j = 0; $i < count($mas_monomials); $i++, $j++){
            $zn_x = isset($mas_zn[$j]) ? $mas_zn[$j] : '';
            $expr .= $mas_monomials[$i] . $zn_x;
        }
        $result = eval('return ' . $expr . ';');
        $mas_zn = (isset($mas_zn)) ? $mas_zn : '' ;
        return array('expr' => $expr, 'zn' => $mas_zn, 'result' => $result);

    }

    /*
    *   Считает количество символов в строке 
    *   (string) @string - строка
    *   return array
    */
    function u_count_chars($string){
    $result = array();
    $string = (string) $string;
    for($i = 0; $i < strlen($string);$i++){
        if(!isset($result[$string{$i}]))
            $result[$string{$i}] = null;
        $result[$string{$i}]++;
    }
    return $result;
    }


    /*
    *   Вывести умножение в столбик
    *   (int) @a - первый множитель
    *   (int) @b - второй множитель
    *   return string
    */
    function multiply_in_column ($a, $b) {

        $m1 = (string) max($a, $b);
        $m2 = (string) min($a, $b);
        $product = $a * $b;

        $multiply = array();
        $m1_strlen = strlen($m1);
        $m2_strlen = strlen($m2);

        for($j = $m2_strlen - 1; $j >= 0; $j--){
            if($m2{$j} == 0)
                $multiply[] = str_repeat('0', $m1_strlen);
            else
                $multiply[] = $m1 * $m2{$j};
        }
        $str = '';
        $table = '<table width="50px">';
        $table .= "<tr><td align='right'>{$m1}</td></tr>";
        $table .= "<tr><td align='right' style='border-bottom: 1px solid #222;'>{$m2}</td></tr>";
        foreach($multiply as $number){
            $table .= "<tr><td align='right'>{$number}{$str}</td></tr>";
            $str .= ' ';
        }
        if($m2 > 10) {
            $table .= "<tr><td align='right' style='border-bottom: 1px solid #222;'></td></tr>";
            $table .= "<tr><td align='right'>{$product}</td></tr>";
        }
        $table .= '</table>';
        return $table;
    }

    /*
    *   Получить все значения при поэтапном делении в столбик
    *   (int) @divident - делимое
    *   (int) @divider - делитель
    *   return array
    */
    function divide_in_column ($divident, $divider) {

        $divident = (string) $divident;
        $divider = (string) $divider;
        $div_length = strlen($divider);
    
        $steps = array ();

        $ldivident = substr($divident, 0, $div_length);
        $ldivider = $divider;

        for($i = $div_length; $i < strlen($divident) + 1; $i++) {
            $lresult = floor($ldivident / $ldivider);
            $lsubtr = $lresult * $ldivider;
            $ldifference = $ldivident - $lsubtr;
            
            $steps[] = array ('divident' => $ldivident, 'divider' => $ldivider, 'result' => $lresult, 'subtr' => $lsubtr, 'difference' => $ldifference);
                        
            if ($i < strlen($divident)) {
                $ldivident = ($ldifference != 0) ? $ldifference . $divident{$i} : $divident{$i} ;
                //$ldivident = $ldifference . $divident{$i};
            }
        }
        return $steps;
    }



    /*
    *   Получить сумму и массив коэффициентов для запоминания при сложении двух чисел
    *   (int) @a - первое слагаемое
    *   (int) @b - второе слагаемое
    *   return array
    */
    function addition_in_column ($a, $b) {

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

    /*
    *   Получить вывод самого столбика сложения двух чисел
    *   (int) @a - первое слагаемое
    *   (int) @b - второе слагаемое
    *   (string) @sum - сумма a и b
    *   (array) @k_mas - массив коэффициентов
    *   return string
    */
    function print_addition_in_column ($a, $b, $sum, $k_mas) {

        $s1 = (string) max($a, $b);
        $s2 = (string) min($a, $b);
        $s1_len = strlen($s1);
        $k_num = implode("", $k_mas);
        $str = '';
        $table = '<table width="90px">';
        $table .= "<tr><td align='right'>{$k_num}</td></tr>";
        $table .= "<tr><td align='right'>{$s1}</td></tr>";
        $table .= "<tr><td align='right' style='border-bottom: 1px solid #222;'>{$s2}</td></tr>"; 
        $table .= "<tr><td align='right'>{$sum}</td></tr>";
        $table .= '</table>';

        return $table;
    };

    /*
    *   Получить числа, с замененными случайным образом звездочками цифрами, и массив решения
    *   (int) @a - первое слагаемое
    *   (int) @b - второе слагаемое
    *   (int) @sum - сумма
    *   (array) @k_mas - массив коэффициентов дл язапоминания
    *   return array
    */
    function addition_in_column_with_asterisks ($a, $b, $sum, $k_mas) {

    $s1 = (string) max($a, $b);
    $s2 = (string) min($a, $b);

    $s1_len = strlen($s1);
    $s2_len = strlen($s2);
    $sum_len = strlen($sum);

    $s1_len = strlen($s1);
    $elements = $solutions = array();

        for($i = $s1_len - 1, $j = $s2_len - 1, $k = $sum_len - 1; $j >= 0; $i--, $j--, $k--){
            $lelements = array();
            $lelements = array($s1{$i}, $s2{$j}, $sum{$k});
            if ($i == 0) $n = mt_rand(0, 1);
                else $n = mt_rand(0, 2); 
            /* в этих местах делать поля, для ввода цифры, со звездочкой на фоне */
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
                    $solutions[$j] =  $interim_solution . " - записываем в сумму количество единиц {$sum{$k}} и запоминаем единицу для следующего старшего разряда";
                } else  $solutions[$j] = $interim_solution;

            } else {

                if ($sum{$k} >= $lelements[(1 + $n)%2] + $k_mas[$i]) {
                    $ls12 = $sum{$k} - $lelements[(1 + $n)%2] - $k_mas[$i];
                    if ($k_mas[$i] == 0) {
                        $interim_solution = "{$stars} звездочка: {$sum{$k}} - {$lelements[(1 + $n)%2]} = $ls12";    
                    } else {
                        $interim_solution = "{$stars} звездочка: {$sum{$k}} - {$lelements[(1 + $n)%2]} - $k_mas[$i] = $ls12" . " (отнимаем единицу с предыдущего шага)";
                    }

                } else {
                    $lsum = '1' . $sum{$k};
                    $interim_solution = "{$stars} звездочка: Так как {$sum{$k}} меньше {$lelements[(1 + $n)%2]}, берем {$lsum} и запоминаем единицу для следующего старшего разряда";       
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
        if ($s1_len > $s2_len) {
            $s1_star = substr($s1, 0, - $s2_len) . $s1_star;
        } 
        if ($sum_len > $s2_len) {
            $sum_star = substr($sum, 0, - $s2_len) . $sum_star;
        }
        return array('a' => $s1_star, 'b' => $s2_star,'sum' => $sum_star, 'solutions' => $solutions);
    }

    /*
    *   Получить вывод самого столбика сложения двух чисел со звездочками
    *   (int) @a - первое слагаемое
    *   (int) @b - второе слагаемое
    *   (string) @sum - сумма a и b
    *   return string
    */
    function print_addition_in_column_with_asterisks ($a, $b, $sum) {

        $str = '';
        $table = '<table width="50px">';
        $table .= "<tr><td align='right'>{$a}</td></tr>";
        $table .= "<tr><td align='right' style='border-bottom: 1px solid #222;'>{$b}</td></tr>"; 
        $table .= "<tr><td align='right'>{$sum}</td></tr>";  
        $table .= '</table>';
        return $table;
    };


    /*
    *   Получить разность и массив коэффициентов для запоминания при вычитании двух чисел
    *   (int) @a - уменьшаемое
    *   (int) @b - вычитаемое
    *   return array
    */

    function subtraction_in_column ($a, $b) {
        $s1 = (string) max($a, $b);
        $s2 = (string) min($a, $b);
        $s1_len = strlen($s1);
        $s2_len = strlen($s2);
        $sub = $k_mas = array();
        $k_mas[$s1_len - 1] = 0;
        for($i = $s1_len - 1, $j = $s2_len - 1; $i >= 0; $i--, $j--){

            if($j < 0){
                if ($s1{$i} == 0 && $k_mas[$i] == 1) {
                    $sub[$i] = 9 ;
                    $k_mas[$i-1] = 1;
                } else {
                    $sub[$i] = $s1{$i} - $k_mas[$i];
                    $k_mas[$i-1] = 0;
                }
            }
            else {
                if($s1{$i} - $k_mas[$i] < $s2{$j}){
                    $ls1 = '1' . $s1{$i};
                    $sub[$i] = $ls1 - $k_mas[$i] - $s2{$j};
                    $k_mas[$i-1] = 1;
                } 
                else {
                    $sub[$i] = $s1{$i} - $k_mas[$i] - $s2{$j};
                    $k_mas[$i-1] = 0;
                }
            }
            if ($i == 0 && $sub[$i] == 0) $sub[$i] = '';
        };
        ksort($sub);
        ksort($k_mas);
        $sub = implode("", $sub);
        return array('sub' => $sub, 'k_mas' => $k_mas);
    };

    /*
    *   Получить вывод самого столбика сложения двух чисел
    *   (int) @a - первое слагаемое
    *   (int) @b - второе слагаемое
    *   (string) @sum - сумма a и b
    *   (array) @k_mas - массив коэффициентов
    *   return string
    */
    function print_subtraction_in_column ($a, $b, $sub, $k_mas) {

        $s1 = (string) max($a, $b);
        $s2 = (string) min($a, $b);
        $s1_len = strlen($s1);
        $k_num = implode("", $k_mas);
        $str = '';
        $table = '<table width="90px">';
        $table .= "<tr><td align='right'>{$k_num}</td></tr>";
        $table .= "<tr><td align='right'>{$s1}</td></tr>";
        $table .= "<tr><td align='right' style='border-bottom: 1px solid #222;'>{$s2}</td></tr>"; 
        $table .= "<tr><td align='right'>{$sub}</td></tr>";     
        $table .= '</table>';
        return $table;
    };


        /*  Получить случайное число с исключение
    *   (int)   @min - минимальное значение
    *   (int)   @max - максимальное значение
    *   (array) @exclude - исключаемые значения
    *   return number
    */
    function mt_rand_exclude($min, $max, $exclude = array()){

        $number = mt_rand($min, $max);
        if(in_array($number, $exclude))
            $number = mt_rand_exclude($min,$max,$exclude);

        return $number;

    }
