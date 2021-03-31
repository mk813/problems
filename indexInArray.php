<?php
	$arr = [];
	$pch = 1;
	for ($i=0;$i<=10;$i++) {
		$arr[$i] = rand(1,100);
	}
	for ($i=0;$i<count($arr);$i++) {
			$even = $arr[$i]%2;
				if ($arr[$i] > 0 && $even !== 0)
					echo $arr[$i]."<br>";
	}
?>