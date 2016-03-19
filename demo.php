<?php
$a = 200;
$b = 10;

$statement = "$a%10 != 0";
$blockIf = "if({$statement}){ echo 123232; }";

echo eval($blockIf);