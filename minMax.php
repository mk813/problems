<?php /* functional
	$arr = [];
	for ($i=0;$i<=10;$i++) {
		$arr[$i] = rand(1,20);
	}
	$max = max($arr);
	$min = min($arr);
	$chsearch = array_search($max, $arr);
	$ksearch = array_search($min, $arr);
	
	$replacements1 = array($chsearch => $min);
	$replacements2 = array($ksearch => $max);
	print_r($arr);
	echo "<br>";
	$basket = array_replace($arr, $replacements1);
	$basket = array_replace($basket, $replacements2);
	print_r($basket);*/
	
	// without functional
	$arr = [];
	for ($i=0;$i<=10;$i++) {
		$arr[$i] = rand(1,20);
	}
	$max = 0;
	$min = 20;
	for($i=0;$i<count($arr);$i++){
		if ($arr[$i] > $max)
			$max = $arr[$i];
		if ($arr[$i] < $min)
			$min = $arr[$i];
	}
	print_r($arr);
	echo "<br>";
	$mx = 0;
	$mn = 0;
	for ($i=0;$i<count($arr);$i++){
		if ($arr[$i] == $max && $mx == 0){
			$arr[$i] = $min;
			$mx = 1;
			}
		if ($arr[$i] == $min && $mn == 0){
				$arr[$i] = $max;
				$mn = 1;
		}		
	}
	print_r($arr);
?>