<?php
$string = "Hello World!";
echo "Str: $string\n";

$reversedString = strrev($string);
echo "Reversed Str: $reversedString\n";

$uppercaseString = strtoupper($string);
echo "UpperCase Str: $uppercaseString\n";

$vowelCount = 0;
$vowels = ['a', 'e', 'i', 'o', 'u'];

for ($i = 0; $i < strlen($string); $i++) {
    if (in_array(strtolower($string[$i]), $vowels)) {
        $vowelCount++;
    }
}
echo "Vowel Count: $vowelCount\n";

?>
