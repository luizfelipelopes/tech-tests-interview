<?php

//0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144, 233...

$calcFibonacci = 0;
$calcFibonacciMaster = 0;

// O(2^n)
function fibonacci($n, &$calcFibonacci)
{
  $calcFibonacci++;
  if($n < 2) {
    return $n;
  }
  
  return fibonacci($n-1, $calcFibonacci) + fibonacci($n-2, $calcFibonacci);
}

function fibonacciMaster(&$calcFibonacciMaster)
{
  $cache = [];
  
  $fib = function ($n) use(&$cache, &$fib, &$calcFibonacciMaster) {
    $calcFibonacciMaster++;
    
    if(isset($cache[$n])) {
      return $cache[$n];
    } 
    
    if($n < 2) {
      return $n;
    } 
      
    $cache[$n] = $fib($n-1) + $fib($n-2);
    return $cache[$n];
    
  };
  
  return $fib;
  
}


echo fibonacci(30, $calcFibonacci) . "\n";
echo 'calcFibonacci: ' . $calcFibonacci . "\n"; // results: 2692537

$fib = fibonacciMaster($calcFibonacciMaster);
echo $fib(30) . "\n";
echo 'calcFibonacciMaster: ' . $calcFibonacciMaster . "\n"; // results: 59
