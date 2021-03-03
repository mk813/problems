<?php
/*Return the sum of the numbers in the array,
except ignore sections of numbers starting with
a 6 and extending to the next 7 (every 6 will be followed by at least one 7).
Return 0 for no numbers.

sum67([1, 2, 2]) → 5
sum67([1, 2, 2, 6, 99, 99, 7]) → 5
sum67([1, 1, 6, 7, 2]) → 4*/

function six_seven($arr)
{
    $six = array_search(6, $arr);
    $seven = array_search(7, $arr);
    $length = $seven - $six + 1;
    $removable = array_splice($arr, $six, $length);
    echo array_sum($arr);
}
six_seven([6, 1, 3, 5, 7, 1, 1, 7]);
	?>