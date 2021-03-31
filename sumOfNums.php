<?php
// get sum of num elements
	$num = 123;
	$arr  = array_map('intval', str_split($num));
	echo array_sum($arr)."<br>";
	
// get num of repeated values
	$lol = 4564565;
	$target = 4;
	$asd  = array_map('intval', str_split($lol));
	$rep = array_count_values($asd);
	echo $rep[$target]."<br>";
	

	$lol = 4564565;
	$target = 4;
	$cnt = 0;
	  while (strlen($lol) > 0) {
			$digit = $lol%10;
			$lol = $lol/10;
			echo $lol." ";
		}
		echo "<br>";
		
		
	
	
	
	
	
// get sum of nums which divilble by 5
	$start = 10;
	$end = 15;
	$sum = 0;
	for ($i=$start;$i<=$end;$i++) {
		if ($i%5 == 0) //fmod($i, 5) == 0;
			$sum += $i; 
	}
	echo $sum;
	
// Разработайте программу, которая из чисел 20 .. 45 находила те, которые делятся на 5 и найдите сумму этих чисел. 
// Рекомендую использовать функцию fmod для определения "делится число" или "не делится".
