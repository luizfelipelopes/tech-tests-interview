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


class Solution {

	public function encode(array $strs) {
		
		$encoded = '';
		for($i = 0; $i < count($strs); $i++) {
			$lenWord = strlen($strs[$i]);
			$encoded .= "{$lenWord}#{$strs[$i]}";
		}
		
		return $encoded;
	}


	public function decode(string $str) {
		
		$words = [];
		$word = '';

		$i = $j = 0;

		while($i < strlen($str)) {

			$length = '';
			$i = $j;
			$word = '';

			while(isset($str[$j]) && $str[$j] != '#') {
				$length .= $str[$j];
				$j++;
			}

			$j++;
			$maxLength = $j + intVal($length);
			
			while($j < $maxLength) {
				$word .= $str[$j];
				$j++;
			}
			
			if(!empty($word)) {
				$words[] = $word;
			}

			$i++;

		}

		return $words;

	}

}

$solution = new Solution();
$enconded = $solution->encode(["neet","code","lo##ve","you"]);
// $enconded = $solution->encode(["we","say",":","yes"]);


echo $enconded . "\n";
print_r(json_encode($solution->decode($enconded)));

