<?php

function reverseString($str)
{
  
  $length = strlen($str);
  $reverseWord = '';
  
  for($i = $length-1; $i >= 0; $i--) {
    $reverseWord .= $str[$i]; 
  }
  
  return $reverseWord;
  
}

function reverseStringRecursive($str)
{
  
  $length = strlen($str);
  
  if($length == 1) {
    return $str[0];
  }
  
  $lastChar = $str[$length-1];
  $str = substr($str, 0, -1);
  
  return $lastChar . reverseStringRecursive($str);
  
  
}

echo reverseString('yoyo master') . "\n";
echo reverseStringRecursive('yoyo master') . "\n";
