<?php

$numbers = [99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0];

function bubbleSort($array)
{
  
  $lenght = count($array);
  
  for($i = 0; $i < $lenght; $i++) {
    for($j = 0; $j < $lenght-1; $j++) {
      
      if($array[$j] > $array[$j+1]) {
        $temp = $array[$j];
        $array[$j] = $array[$j+1];
        $array[$j+1] = $temp;
      }
    }
  }
  
  return $array;
  
}

print_r(bubbleSort($numbers));
