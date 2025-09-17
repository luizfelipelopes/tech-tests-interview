<?php
  /**
  	
  PHP Age Frequency Counter
  
  In this PHP challenge, your task is to write a script that performs a GET request on 
  the URL https://coderbyte.com/api/challenges/json/age-counting. The 
  response from this URL will contain a key named data. The value of this key is a string that includes multiple items, 
  each formatted as key=STRING, age=INTEGER.
  Your goal is to parse this string and calculate the frequency of each specific age. 
  The final output should be a list of objects, each object containing two keys: age and count. 
  The age key represents a pecific age, and the count key indicates how many times this age occurs in the string.
  The output list should be sorted in ascending order based on the age key.	
  	
  Example Input:
  {"data": "key=IAfpk, age=58, key=WNVdi, age=64, key=jp9zt, age=58"}
  Example Output:
  [{age: 58, count: 2}, {age: 64, count: 1}]
  
  **/
	
	
  // 	$ch = curl_init('https://coderbyte.com/api/challenges/json/age-counting');
  // 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  // 	curl_setopt($ch, CURLOPT_HEADER, 0);
  //   $data = curl_exec($ch);
  //   curl_close($ch);
	
	
	$data = json_encode(["data" => "key=IAfpK, age=58, key=VNVdi, age=64, key=jp9zt, age=58"]);
	$response = json_decode($data, true);
	$responseArr = explode(', ', $response['data']);
	
  $arrAge = [];
  
  foreach($responseArr as $value) {
    if(strpos($value, 'age=') === false) {
      continue;
    }
    
    $age = substr_replace($value, '',  0, 4);
    
    if(!isset($arrAge[$age])) {
      $arrAge[$age] = 1; 
    } else {
      $arrAge[$age]++;
    }
  }
  
  ksort($arrAge);
  
	$result = [];
	
	foreach($arrAge as $key => $value) {
	  $result[] = ['age' => $key,  'count' => $value];
	}
	
	print_r(json_encode($result));
	
	
	
	
	
	
	
	
?>
