<?php
/**
	Encode and Decode Strings

	Design an algorithm to encode a list of strings to a single string. The encoded string is then decoded back to the original list of strings.

	Please implement encode and decode

	Example 1:

	Input: ["neet","code","love","you"]

	Output:["neet","code","love","you"]
	
	Example 2:

	Input: ["we","say",":","yes"]

	Output: ["we","say",":","yes"]
	
	Constraints:

	0 <= strs.length < 100
	0 <= strs[i].length < 200
	strs[i] contains only UTF-8 characters.
*/

// identifier to glue my array to a string
// when need decodeI use this identifier
// ["neet","code","love","you"] = 4#neet4#code4#love3#you



class Solution {

	// Time Complexity: O(n)
	// Space Complexity: O(n)
	public function encode(array $strs)
	{

		$encode = '';
		foreach($strs as $str) {

			$len = strlen($str);
			$encode .= "{$len}#{$str}";
		}

		return $encode;
	}

	// Time Complexity: O(n)
	// Space Complexity: O(n)
	public function decode(string $strs)
	{
		$i = 0;
		$arr = [];

		while($i < strlen($strs)) {

			$num = '';

			while($strs[$i] != '#') {
				$num .= $strs[$i];
				$i++;
			}

			$arr[] = substr($strs, $i+1, intVal($num));
			$i += intVal($num)+1;				

		}

		return $arr;

	}


}


$solution = new Solution();
$encode = $solution->encode(["we","say",":","y3#es"]);
// $encode = $solution->encode(["neet","code","love","you"]);
echo $encode . "\n";
print_r($solution->decode($encode));




