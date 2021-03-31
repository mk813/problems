<?php
	$arr = [];
	for ($i=0;$i<=10;$i++) {
		$arr[$i] = rand();
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
	print_r($basket);
?>