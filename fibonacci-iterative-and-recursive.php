<?php

// 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144 ...
// return a value of index that i sent via parameter
// actual value is tha sum of las two numbers

// O(n)
function fibonacciIterative($n)
{
  
  $fibonacciArray = [0, 1];
  
  for($i = 2; $i <= $n; $i++) {
    
    $fibonacciArray[$i] = $fibonacciArray[$i-1] + $fibonacciArray[$i-2];   
    
  }
  
  return $fibonacciArray[$n];
  
  
}

//O(2^n)
function fibonacciRecursive($n)
{
  
  if($n < 2) {
    return $n;
  }
  
  return fibonacciRecursive($n-1) + fibonacciRecursive($n-2); 
  
}


echo fibonacciIterative(43) . "\n"; // 55
echo fibonacciRecursive(43) . "\n"; // 55

