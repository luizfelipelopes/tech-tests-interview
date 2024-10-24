<?php
// 5! = 5*4*3*2*1 = 120

// O(n)

function findFactorialRecursive($number)
{
  // stop base: if $number == 1
  
  if($number == 2) {
    return 2;
  }
  
  return $number * findFactorialRecursive($number-1);
  
}

// Time Complexity O(n)
// Space Complexity O(n)

function findFactorialIterative($number)
{
  
  $multiplier = 1;
  
  for($i = $number; $i > 1; $i--) {
    $multiplier *= $i;
  }
  
  return $multiplier;
  
}

echo findFactorialRecursive(5) . "\n";
echo findFactorialIterative(5) . "\n";
