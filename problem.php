<?php
echo "<br/>";
echo "<br/>";
	$sum = array(4, -1, 3);
	print_r ($sum);
	$last = end($sum) - 1;
	$target = 7;
echo "<br/>";
	for ($i=0;$i <= $last;$i++) {
		$f = $sum[0] + $sum[$i];
		if ($f == $target) {
			echo "<br/>".$sum[0]." + ".$sum[$i]." = ".$target;
															echo "<br/><br/>";
			$d = $sum[0];
			$l = $sum[$i];
			$key = array_search($d, $sum);
			$lol = array_search($l, $sum);
			
			echo "Output: [".$key.", ";
			echo $lol."]";
			echo "<br/>";
		}
		echo $f;
		echo "<br/>";
	}
															echo "<br/><br/>";
	for ($i=0;$i <= $last;$i++)	{
		$s = $sum[1] + $sum[$i];
		if ($s == $target) {
			echo "<br/>".$sum[1]." + ".$sum[$i]." = ".$target;
															echo "<br/><br/>";
			$d = $sum[1];
			$key = array_search($d, $sum);
			
			echo "Output: [".$key.", ";
			echo key($sum)."]";
			echo "<br/>";
		}
		echo $s;
		echo "<br/>";
	}
															echo "<br/><br/>";
	for ($i=0;$i <= $last;$i++)	{
		$l = $sum[2] + $sum[$i];
		if ($l == $target) {
			echo "<br/>".$sum[2]." + ".$sum[$i]." = ".$target;
															echo "<br/><br/>";
			$d = $sum[2];
			$l = $sum[$i];
			$key = array_search($d, $sum);
			$lol = array_search($l, $sum);
			
			echo "Output: [".$key.", ";
			echo $lol."]";
			echo "<br/>";
		}
		echo $l;
		echo "<br/>";
	}
?>
