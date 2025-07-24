<?php 
$var = 12;

$var1 = 14.7;

$var2 = "Hello";

$var3 = true;


$mark = 6;
if($mark>=10){
    echo "Pass";
}
else{
    echo "Fail";
}
echo "<br>";

if($mark>=18)
    echo "A";
elseif($mark>=15)
    echo "B";
elseif($mark>=10)
    echo "C";
else
    echo "D";

// Arithmetic Operators
// + - * / %  
echo "<br>";  
$num = 17;
if($num%2 != 0)
    echo "Odd";
else
    echo "Even";

// Relational Operators
// == != > < >= <=

// Logical Operators

if($num>0 && $num%2==0)
    echo "Even Positive";

if($num>0 || $num%2==0)
    echo "Positive or Even";

$isEven = true;
if(!$isEven)
    echo "Not Even";
?>