<?php

$numbers = [99, 44, 6, 2, 1, 5, 63, 87, 283, 4, 0];

function mergeSort($array)
{
  if(count($array) == 1) {
    return $array;
  }
  
  $length = count($array);
  $middle = floor($length / 2);
  $left = array_slice($array, 0, $middle);
  $right = array_slice($array, $middle);
  
  return merge(mergeSort($left), mergeSort($right));
}


function merge($left, $right)
{
  $result = [];
  $leftIndex = 0;
  $rightIndex = 0;
  
  while($leftIndex < count($left) && $rightIndex < count($right)) {
    if($left[$leftIndex] < $right[$rightIndex]) {
      $result[] = $left[$leftIndex];
      $leftIndex++;
    } else {
      $result[] = $right[$rightIndex];
      $rightIndex++;
    }
  }
  
  return array_merge($result, array_merge(array_slice($left, $leftIndex), array_slice($right, $rightIndex)));
  
}

$answer = mergeSort($numbers);
print_r($answer);
