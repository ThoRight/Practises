<?php
//Variables, datatypes and operators
$integerVar = 10;
echo "Integer variable: $integerVar\n";

$floatVar = 20.5;
echo "Float var: $floatVar\n";

$stringVar = "Hello ";
echo "String var: $stringVar\n";

$booleanVar1 = true;
echo "Boolean var1: $booleanVar1\n";

$booleanVar2 = false;
echo "Boolean var2: $booleanVar2\n";

$sum = $integerVar + $floatVar;
echo "Summation: $sum\n";

$sub = $integerVar - $floatVar;
echo "Subtraction: $sub\n";

$mul = $integerVar * $floatVar;
echo "Multiplication: $mul\n";

$div = $integerVar / $floatVar;
echo "Division $div\n";

$concatenatedString = $stringVar . "World!\n";
echo "Concatenated string: $concatenatedString";

if ($booleanVar1 && $booleanVar2) {
    echo "Boolean var1 && Boolean var2 : true\n";
}
else {
    echo "Boolean var1 && Boolean var2 : false\n";
}
if ($booleanVar1 || $booleanVar2) {
    echo "Boolean var1 || Boolean var2 : true\n";
}
else {
    echo "Boolean var1 || Boolean var2 : false\n";
}

?>