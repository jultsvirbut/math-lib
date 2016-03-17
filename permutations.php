<?php

$x = array();

function pc_permute($items, $perms = array()) {

	global $x;

    if (empty($items)) { 
		echo join(' ', $perms) . "<br />";
		$x[] = join(' ', $perms);
    } else {
        for ($i = count($items) - 1; $i >= 0; --$i) {
             $newitems = $items;
             $newperms = $perms;
             list($foo) = array_splice($newitems, $i, 1);
             array_unshift($newperms, $foo);
             pc_permute($newitems, $newperms);
         }
    }
}

$arr = array('a', 'b', 'c', 'd');

pc_permute($arr);

echo '<pre>';
print_r($x);
echo '</pre>';