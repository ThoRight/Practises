<?php
// Loops
$num = 6;
echo "Multiplication table for $num:\n";

for($i = 1;$i<=10;++$i) {
    $res = $num * $i;
    echo "$num * $i = $res\n";
}


$j = 1;
$res = 1;
while($j < $num) {
    $res *= $j;
    $j++;
}
echo "Factorial of $j: $res\n";

?>