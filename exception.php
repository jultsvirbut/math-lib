<?php
	
	/*
	* (array) @arr
	* return (string)
	*/
	function xyz($arr){

		if(!is_array($arr)) throw new Exception('Param @arr is not array');
		foreach($arr as $val){
			$r .= $val."<br>";
		}

		return $r ? $r : false;

	}

	try {
		$r = xyz(123);
	}
	catch(Exception $error){
		echo $error->getMessage();
	}

	echo 12312321;