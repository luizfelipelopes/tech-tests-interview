<?php

/**

Have the function ArrayChallenge (str) take the str parameter and determine how many anagrams exist 
in the string. An anagram is a new word that is produced from rearranging the characters in a 
different word, for example: cars and arcs are anagrams. Your program should determine how many 
anagrams exist in a given string and return the total number. For example: if str is "aa aa odg dog gdo" 
then your program should return 2 because "dog" and "gdo" are anagrams of "odg".
The word "aa" occurs twice in the string but it isn't an anagram because it is the same word just 
repeated. The string will contain only spaces and lowercase letters, no punctuation, numbers, 
or uppercase letters.

Examples

Input: "aa aa odg dog gdo"
Output: 2

Input: "a cb c run urn urn"
Output: 1

*/

// Time complexity: O(n * m)
// Space complexity: O(n * m)

// $input = 'aa aa odg dog gdo';
$input = 'a c b c run urn urn';
$inputArr = explode(' ', $input);
$hashAnagrams = [];

for($i = 0; $i < count($inputArr); $i++) {

	if(strlen($inputArr[$i]) < 2) {
		continue;
	}

	$hash = array_fill(0, 26, 0);
	$word = $inputArr[$i];
	
	foreach(str_split($word) as $ch) {
		$hash[ord($ch) - ord('a')]++;
	}

	$key = implode('-',$hash);
	$hashAnagrams[$key][$word] = true;
}

$countAnagrams = 0;

foreach($hashAnagrams as $group) {

	if(count($group) > 1) {
		$countAnagrams += count($group)-1;
	}
}


print_r($countAnagrams);


