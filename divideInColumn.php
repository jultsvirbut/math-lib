<?php
	$divident = (string) mt_rand(10,9999);
	$divider = (string) mt_rand(2,99);

	echo $divident . " : " . $divider;

	$div_length = strlen($divider);
	
	$steps = array ();

	$ldivident = substr($divident, 0, $div_length);
	$ldivider = $divider;

	for($i = $div_length; $i < strlen($divident) + 1; $i++) {
		$lresult = floor($ldivident / $ldivider);
		$lsubtr = $lresult * $ldivider;
		$ldifference = $ldivident - $lsubtr;
		
		$step = array ('divident' => $ldivident, 'divider' => $ldivider, 'result' => $lresult, 'subtr' => $lsubtr, 'difference' => $ldifference);
		$steps[] = $step;
		
		if ($i < strlen($divident)) {
			$ldivident = $ldifference . $divident{$i};
		}
		
		echo '<pre>';
		print_r($step);

	}

	foreach ($steps as $step) {
			echo $step['result'];
		}	



		