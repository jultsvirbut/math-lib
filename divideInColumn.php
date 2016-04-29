<?php


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


    $divident = mt_rand(10,9999);
    $divider = mt_rand(2,99);
    $result = floor($divident / $divider);


    $steps = divide_in_column ($divident, $divider);
    




function print_divide_in_column($divident, $divider, $steps) {

    $result = floor($divident / $divider);
    $remainder = $steps[count($steps) - 1]['difference'];

    if ($steps[0]['result'] == 0) array_shift($steps);

    for ($i = 0; $i < count($steps); $i++){
        if ($steps[$i]['subtr'] == 0){
            unset($steps[$i]);
        }
    }

    $steps = array_values($steps);

    $str = '';
    $table = '<table>';
    $table .= "<tr><td align='left'>{$divident}</td>";
    $table .= "<td align='left' style='border-bottom: 1px solid #222; border-left: 1px solid #222;'>{$divider}</td></tr>";
    if (strlen($steps[0]['subtr']) != strlen($steps[0]['divident'])) {
        $steps[0]['subtr'] = 'x' . $steps[0]['subtr'];
    }
    $table .= "<tr><td align='left' style='border-bottom: 1px solid #222;'>{$steps[0]['subtr']}{$str}</td>";
    $table .= "<td align='left'>{$result}</td></tr>";

    //array_shift($steps);

    for ($i = 1; $i < count($steps); $i++){
        $x = (isset($steps[$i-1])) ? strlen($steps[$i-1]['subtr']) - strlen($steps[$i-1]['difference']) : '' ;
        if ($x != 0 || $steps[$i-1]['difference'] == 0) {
            $str .= 'x';
        }
        $table .= "<tr><td width='10px' align='left'>{$str}{$steps[$i]['divident']}</td></tr>";
        if (strlen($steps[$i]['divident']) != strlen($steps[$i]['subtr'])) $str .= 'x';
        $table .= "<tr><td width='10px' align='left' style='border-bottom: 1px solid #222;'>{$str}{$steps[$i]['subtr']}</td></tr>";   
    }
    $table .= "<tr><td width='10px' align='right'>{$remainder}</td></tr>";

    return $table;
}


$table = print_divide_in_column($divident, $divider, $steps);
echo $table;



