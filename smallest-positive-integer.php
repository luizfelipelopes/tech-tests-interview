<?php


  function solutionTest($A) { // O(a+b+c)
    
    $minValueInteger = null;
    $maxValueInteger = null;
    
    $hashArr = [];
    
    for($i = 0; $i < count($A); $i++) { //O(n)
      
        if($minValueInteger > $A[$i] || !$minValueInteger) {
            $minValueInteger = $A[$i];
        }
        
        if($maxValueInteger < $A[$i] || !$maxValueInteger) {
            $maxValueInteger = $A[$i];
        }
        
        $hashArr[$A[$i]] = $i;
      
    }
    
    $B = [];
    
    for($j = $minValueInteger; $j <= $maxValueInteger; $j++) { //O(n)
        array_push($B, $j);
    }
    
   
    for($z = 0; $z < count($B); $z++) {  //O(n)
      if(!isset($hashArr[$B[$z]]) && $B[$z] > 0) {
        return $B[$z];
      }
      
    }
    
    $outSideValue = $maxValueInteger+1;
    
    return $outSideValue > 0 ? $outSideValue : 1;
  }


  echo solutionTest([1,3,6,4,1,2]) . "\n"; // 5
  echo solutionTest([1,2,3]) . "\n"; //4
  echo solutionTest([-1,-3]) . "\n"; //1

?>
