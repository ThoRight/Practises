<?php
function calculateRectangleArea($length, $width) {
    return $length * $width;
}

// I thought it was a square not area
function calculateSquare($num) {
    return $num * $num;
}

//Test Functions
$length = 5;
$width = 4;

echo "Length: $length, Width: $width\n";
$areaRec = calculateRectangleArea($length, $width);
echo "Area of the Rectangle: $areaRec\n";


$num = 6;
echo "Number: $num\n";
$squareNum = calculateSquare($num);
echo "Square of Number $num: $squareNum\n";

?>
