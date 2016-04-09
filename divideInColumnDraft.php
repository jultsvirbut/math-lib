   <?php 

    /* Получить массив цифр из числа
    * (int) @number - целое число
    * return array
    */
    function get_digits_from_number($number){

        $number = (int) $number;
        $number = (string) $number;
        $count_digits = strlen($number);

        for($i = 0; $i < $count_digits; $i++){
            $temp_number[] = $number{$i};
        }

        return $temp_number;

    }


    /* GET DIGITS DIVIDENT&DIVIDER */
    $digits_divident = get_digits_from_number($divident);
    $digits_divider = get_digits_from_number($divider);
    /* !GET DIGITS DIVIDENT&DIVIDER */

    /* CREATE TABLE VIEW */
    $table = '<table><tr>';

    foreach ($digits_divident as $digit) {
        $table .= "<td>{$digit}</td>";   
    }

    foreach ($digits_divider as $key=>$digit) {

        $class = '';

        if($key == 0)
            $class = 'style="border-left: 2px solid #222;"';

        $table .= "<td {$class}>{$digit}</td>";
    }

    $table .= '</tr><tr>';

    foreach (get_digits_from_number($steps[0]['subtr']) as $digit) {
        $table .= "<td>{$digit}</td>";   
    }

    foreach (get_digits_from_number($result) as $digit) {
        $table .= "<td>{$digit}</td>";   
    }

    $table .= '</tr>';
    /* !CREATE TABLE VIEW */

    echo $table;