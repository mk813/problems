<?php
  $nums = array(5,5,4);
  $target = 9;
  $kac = count($nums) - 1;
  for ($i=0;$i <= $kac;$i++) {
    $x = $nums[$i];
    $y = $target - $x;
    $search = array_search($y,$nums,true);
    if ($search) {
      $xkey = array_search($x, $nums);
      $ykey = array_search($y, $nums);
      echo "[".$xkey .", ". $ykey."]";
      die;
    }
  }
?>
<?php
$nums = array(3,1,3,4);
$target = 4;
foreach($nums as $key => $num){
            for($i = $key+1; $i<count($nums);$i++){
                if($nums[$key]+$nums[$i] == $target)
                    echo "[".$key.", ".$i."]";
            }
        }
	?>