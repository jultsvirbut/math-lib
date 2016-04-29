<?php
$a = mt_rand(99,999)/100;
$drob = strstr($a, '.');
echo $drob{0};
//unset($drob{0});
//echo $drob;