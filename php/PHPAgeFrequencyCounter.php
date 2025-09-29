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
	
	
$data = '{"data": "key=IAfpk, age=64, key=WNVdi, age=58, key=jp9zt, age=58"}';
$input = json_decode($data);

// explode data array
// verify age elements and storage in hash key(age)/value(count o of ocurrences)
// set valus ahshMap in a new array
// convert to json format

$dataArr = explode(', ', $input->data);
$hashNumbers = [];


// Time complexity: O(n) + O(u log u) = O(n + u log u)
// Sapce complexity: O(n)

// O(n)
foreach($dataArr as $dataInput) {

	if(strpos($dataInput, 'age=') === false) {
		continue;
	}

	$num = substr($dataInput, 4);
	
	if(!isset($hashNumbers[$num])) {
		$hashNumbers[$num] = 1;
	} else {
		$hashNumbers[$num]++;
	}
}

// O(u log u)
ksort($hashNumbers);

$output = [];

// O(u)
foreach($hashNumbers as $key => $value) {
	$output[] = ['age' => $key, 'count' => $value];
}

$output = json_encode($output);

print_r($output);
	
?>
