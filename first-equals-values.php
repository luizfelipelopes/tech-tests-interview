<?php
	

//Google Question
// Given an array = [2,5,1,2,3,5,1,2,4];
// It should return 2

// Given an array = [2,1,1,2,3,5,1,2,4];
// It should return 1

// Given an array = [2,3,4,5];
// It should return undefined

// hash keep the values of array
// each iteration check if the number was already	in hash (compare to key)
	
//[2 => 0, 5 => 1, 1 => 2]
	 
	 
//Time Complexity: O(n)
//Space Complexity: O(n)

function firstEqualsValues($array)
{
  
  $hash = [];
  $lenght = count($array);
  
  $hash[$array[0]] = 0;
  
  for($i = 1; $i < $lenght; $i++) {
    
    if(isset($hash[$array[$i]])) {
      return $array[$i];
    }
    
    $hash[$array[$i]] = $i;
    
  }
  
  return null;
  
}


// Time complexity : O(n^2)
// Space Complexy: O(1)

function firstEqualsValues2($array)
{
  
  $hash = [];
  $lenght = count($array);
  
  for($i = 0; $i < $lenght; $i++) {
    for($j = $i-1; $j >= 0; $j--) {
      if($array[$j] == $array[$i]) {
        return $array[$i];
      }
    }
    
  }
  
  return null;
  
}

echo "firstEqualsValues1\n";

echo firstEqualsValues([2,5,1,2,3,5,1,2,4]) . "\n";
echo firstEqualsValues([2,1,1,2,3,5,1,2,4]) . "\n";
echo firstEqualsValues(['A', 2, 'A', 1,1,2,3,5,1,2,4]) . "\n";
echo firstEqualsValues([2,3,4,5]) . "\n";

echo "firstEqualsValues2\n";

echo firstEqualsValues2([2,5,1,2,3,5,1,2,4]) . "\n";
echo firstEqualsValues2([2,1,1,2,3,5,1,2,4]) . "\n";
echo firstEqualsValues2(['A', 2, 'A', 1,1,2,3,5,1,2,4]) . "\n";
echo firstEqualsValues2([2,3,4,5]) . "\n";
	 
	 
?>
