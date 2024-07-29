<?php

$names = ["Murat", "Atakan", "Umut", "Ali"];
echo "Original Arr: ";
print_r($names);

echo "Sorted Arr(ascending order): ";
sort($names);
print_r($names);

$filteredArr = array_filter($names, function($name) {
    return strpos($name, 'A') === 0;
});
echo "Filtered Arr: (names starting with 'A')</h2>";
print_r($filteredArr);


?>
