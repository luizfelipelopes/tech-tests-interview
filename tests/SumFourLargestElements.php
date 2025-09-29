<?php

/**
Array Challenge

Have the function Arraychallenge (arr) take the array of integers stored in arr, and find the four largest elements and return their sum. 
For example: if arr is (4, 5, -2, 3, 1, 2, 6, 6] then the four largest elements in this array are 6, 6, 4, and 5 and the total sum of these numbers is 21, 
so your program should return 21. If there are less than four numbers in the array your program should return the sum of all the numbers in the array.

Examples
Input: [1, 1, 1, -5]
Output: -2

Input: [0, 0, 2, 3, 7, 1]
Output: 13
*/

$input = [0, 0, 2, 3, 7, 1];
// $input = [1, 1, 1, -5];

// Solution 1

$minHeap = new SplMinHeap();

// Time Complexity: O(n log k) = O(n log 4) = O(n)
// Space Complexity: O(n)

for($i = 0; $i < count($input); $i++) {

	if($minHeap->count() < 4) {
		$minHeap->insert($input[$i]);
		continue;
	}

	if($input[$i] > $minHeap->top()) {
		$minHeap->extract();
		$minHeap->insert($input[$i]);
	}

}

$sum = 0;
// O(k log k) = O(1)
while(!$minHeap->isEmpty()) {
	$sum += $minHeap->extract();
}

echo $sum;

// Solution 2:

$first = $second = $third = $fourth = -9999999999;

for($i = 0; $i < count($input); $i++) {

	$value = $input[$i];

	if($value > $first) {
		$fourth = $third;
		$third = $second;
		$second = $first;
		$first = $value;

		continue;
	}

	if($value > $second) {
		$fourth = $third;
		$third = $second;
		$second = $value;
		
		continue;
	}

	if($value > $third) {
		$fourth = $third;
		$third = $value;

		continue;
	}

	if($value > $fourth) {
		$fourth = $value;
	}
}

echo $first + $second + $third + $fourth;

