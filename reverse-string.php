<?php

  function reverse($str): string
  {
    
    if(!$str || strlen($str) < 2 || !is_string($str)) {
      return 'Hmm..Is not very good';
    }
    
    $arrayStr = [];
    
    for($i = strlen($str)-1; $i >= 0; $i--) {
      // array_push($arrayStr, $str[$i]);
      $arrayStr[] = $str[$i];
    }
    
    return implode('', $arrayStr);
      
  }
  
  function reverse2($str): string
  {
    if(!$str || strlen($str) < 2 || !is_string($str)) {
      return 'Hmm..Is not very good';
    }  
    
    $arrayStr = implode('', array_reverse(str_split($str)));
    
    return $arrayStr;
    
  }
  
  echo "reverse \n";
  echo reverse('My name is Luiz!') ."\n";
  echo reverse(1)."\n";
  echo reverse('M')."\n\n\n\n";
  
  echo "reverse2 \n";
  echo reverse2('My name is Luiz!')."\n";
  



?>
