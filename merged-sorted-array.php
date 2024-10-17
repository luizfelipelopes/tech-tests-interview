<?php


// Array1 => [0,3,4,31];
// Array2 => [4,6,30];
// NewArray => [0,3,4,4,6,30,31];

function mergeSortedArrays($array1, $array2): array
{
  
    if(!is_array($array1) 
    || !is_array($array2) 
    || !isset($array1) 
    || !isset($array2)
    || (count($array1) == 0 && count($array2) == 0)
    ) {
      throw new Exception('Hmmm...it\'s not good!');
    }
    
    $newArray = $array1;
    
    for($i = 0; $i < count($array2); $i++) {
      $newArray[] = $array2[$i];
    }
    
    sort($newArray);
    
    return $newArray;
}

function mergeSortedArrays2($array1, $array2): array
{
  
    if(!is_array($array1) 
    || !is_array($array2) 
    || !isset($array1) 
    || !isset($array2)
    || (count($array1) == 0 && count($array2) == 0)
    ) {
      throw new Exception('Hmmm...it\'s not good!');
    }
    

    $mergedArray = [];
    $array1Item = $array1[0];
    $array2Item = $array2[0];
    $i = 1;
    $j = 1;

    while($array1Item || $array2Item){
      
      if(!isset($array2Item) || (isset($array1Item) && $array1Item < $array2Item)) {
        $mergedArray[] = $array1Item;
        $array1Item = isset($array1[$i]) ? $array1[$i] : null;
        $i++;
      } else {
        $mergedArray[] = $array2Item;
        $array2Item = isset($array2[$j]) ? $array2[$j] : null;
        $j++;
      }
      
    }      


    return $mergedArray;
}

function mergeSortedArrays3($array1, $array2): array
{
  
    if(!is_array($array1) 
    || !is_array($array2) 
    || !isset($array1) 
    || !isset($array2)
    || (count($array1) == 0 && count($array2) == 0)
    ) {
      throw new Exception('Hmmm...it\'s not good!');
    }
    
    $newArray = [];
    $newArray = array_merge($newArray, $array1, $array2);
    
    sort($newArray);
    
    return $newArray;
}

echo 'mergeSortedArrays' . "\n";
var_dump(mergeSortedArrays([0,3,4,31], [4,6,30]));
// var_dump(mergeSortedArrays([0,3,4,31], ''));
// var_dump(mergeSortedArrays([], []));

echo 'mergeSortedArrays2' . "\n";
var_dump(mergeSortedArrays2([0,3,4], [4,6,30]));
var_dump(mergeSortedArrays2([0,3,4,31], [4,6,30]));

echo 'mergeSortedArrays3' . "\n";
var_dump(mergeSortedArrays3([0,3,4,31], [4,6,30]));

?>
