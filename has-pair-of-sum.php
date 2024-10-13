<?php
// pair that results in a sum of a number
// integer, decimal, negative numbers
// if there is a pair wich the sum results my number (return true/false)


// [6,4,3,2,1,7] => 9



// time O(n^2)
// space O(1)
// Naive solution
function hasPairWithSum($numbers, $sumNumber) 
{
  
  // create a nested loop the n element wirh anothers () 
  // if i found a sum => return true
  // otherwise will return false (go out the loop and return false)

  if(!is_numeric($sumNumber)) {
      throw new Exception('Please the sum value need to be just numbers!');
  }

  $length = count($numbers);
  
  for($i = 0; $i < $length; $i++) {
    for($j = 0; $j < $length; $j++) {
      
      if(!is_numeric($numbers[$i]) && !is_numeric($numbers[$j])) {
          throw new Exception('Please the values need to be just numbers!');
      }
      
      if($numbers[$i] + $numbers[$j] == $sumNumber) {
        return true;
      }
      
    }
    
  }
  
  return false;
  
}

// avoid nested loop
// implement a hash ()
  // i will create an array (set)
  // i run a loop with length of my array of inpout
  // check if my current number of array is in my new array (set)
  // if not i will put in a set (the difference between my result number sum and my current number)
  // if i have the current number in a set i found the pair number sum and return true


// [6,4,3,2,1,7] => 9

// 9-6 = 3
// 9-4 = 5; 
// [3, 5]

// 6+3 = 9

// time complexity: O(n)
// sapce complexity: O(n)
// Efficient solution
function hasPairWithSum2($numbers, $sumNumber) 
{
  
  $hashSet = [];
  
  if(!is_array($numbers)) {
      throw new Exception('Please the numbers need to be in a array!');
  }
  
  if(!is_numeric($sumNumber)) {
      throw new Exception('Please the sum value need to be just numbers!');
  }
  
  for($i = 0; $i < count($numbers); $i++) {
    
    if(!is_numeric($numbers[$i])) {
        throw new Exception('Please the values need to be just numbers!');
    }    
    
    if(in_array($numbers[$i], $hashSet)) {
      return true;
    }
    
    array_push($hashSet, ($sumNumber - $numbers[$i]));
    
  }
  
  return false;
  
}


  try {
    
    var_dump(hasPairWithSum([6,4,3,2,1,7], 9)); // should return true    
    var_dump(hasPairWithSum([6,4,3,2,1,7], 900000)); // should return false    
    var_dump(hasPairWithSum(['A',4,3,2,1,'A'], 'Hgdsjhghds'));  // shoud return exceptions Please the sum value need to be just numbers! 
    var_dump(hasPairWithSum(['A',4,3,2,1,'A'], 9));  // shoud return exceptions Please the values need to be just numbers!
    
  } catch(Exception $e) {
    
    echo $e->getMessage();
    
  }


  try {
    
    var_dump(hasPairWithSum2([6,4,3,2,1,7], 9)); // should return true    
    var_dump(hasPairWithSum2([6,4,3,2,1,7], 900000)); // should return false    
    var_dump(hasPairWithSum2([1,2,3,9], 8)); // should return false    
    var_dump(hasPairWithSum2([1,2,4,4], 8)); // should return true    
    var_dump(hasPairWithSum2([], 8)); // should return false    
    var_dump(hasPairWithSum2([1], 8)); // should return false    
    var_dump(hasPairWithSum2(['A',4,3,2,1,'A'], 'Hgdsjhghds'));  // shoud return exceptions Please the sum value need to be just numbers! 
    var_dump(hasPairWithSum2(['A',4,3,2,1,'A'], 9));  // shoud return exceptions Please the values need to be just numbers!
    var_dump(hasPairWithSum2(1, 8)); // should return exception Please the numbers need to be in a array!    
    var_dump(hasPairWithSum2([1], null)); // should return exception Please the sum value need to be just numbers!   
    
  } catch(Exception $e) {
    
    echo $e->getMessage();
    
  }

?>
