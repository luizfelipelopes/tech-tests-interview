<?php
		
	  // 011100 0(2^5) + 1(2^4) + 1(2^3) + 1(2^2) + 0(2^1) + 0(2^0) = 16 + 8 + 4 = 28  
	
	  // calc binary to number
	  // loop while value > 0 = odd (minus 1) / even (divide by 2)
	
	  function convertBinayToNumber($s) { // O(n^2)
	    
	      $power = strlen($s) - 1;
	      $number = 0;
	    
	      for($i = 0; $i < strlen($s); $i++) {
	      
	        if($s[$i] == 0) {
	          continue;
	        }
	      
	        $number += pow(2, $power-$i) * $s[$i];   
	        
	      }
	      
	      return $number;
	  }
	
	
	  function solution($s) 
	  {
	    
	   $number = convertBinayToNumber($s); // O(n^2)
	   $countOperations = 0;
	      
	   while($number > 0) { // O(n)
	     
	      $countOperations++;
	      
	      if($number % 2 == 0) {
	        $number = $number / 2;
	        continue;
	      }
	      
	      $number -= 1;
	     
	   }
	   
	   return $countOperations;
	    
	  }

    echo solution('011100') . "\n"; // returns 28	
    echo solution('111') . "\n"; // returns 7
    echo solution('1111010101111') . "\n"; // returns 22	
	
?>
