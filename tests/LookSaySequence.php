<?php

/**
Look Say Sequence
Have the function LookSaySequence (num) take the num parameter being passed and return the next number in the sequence according to the following rule: 
to generate the next number in a sequence read off the digits of the given number, counting the number of digits in groups of the same digit. 
For example, the sequence beginning with 1 would be: 1, 11, 21, 1211, ... The 11 comes from there being "one 1" before it and the 21 comes from there being "two 1's" before it. 
So your program should return the next number in the sequence given num.

Examples

Input: 1211
Output: 111221

Input: 2466
Output: 121426

*/

// $input = '1211';
$input = '2466';
$hashOcurrencies = [];
$count = 1;
$newInput = '';

// Time Complexity: O(n)
// Sapce Complexity: O(n)
for($i = 1; $i < strlen($input); $i++) {

	if($input[$i] == $input[$i-1]) {
		$count++;
	} else {
		$count = 1;
	}

	$newInput .= "{$count}{$input[$i-1]}";
	
}


print_r($newInput);

