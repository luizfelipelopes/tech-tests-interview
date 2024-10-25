<?php

$numbers = [99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0];

// Time complexity: O(n^2)
// Space complexity: O(1)
function selectionSort($array)
{

  $length = count($array);
  
  for($i = 0; $i < $length; $i++) {
    
    $min = $i;
    
    for($j = $i+1; $j < $length; $j++) {

      if($array[$min] > $array[$j]) {
        $min = $j;  
      }

    }
        
    $temp = $array[$i];    
    $array[$i] = $array[$min];
    $array[$min] = $temp;
    
  }
  return $array;
  
}

print_r(selectionSort($numbers));
