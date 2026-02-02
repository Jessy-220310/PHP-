<?php
//datatypes in php
//string
$name="Jessy";
echo "Name:$name <br>";
//integer
$age=19;
echo "age :$age <br>";
//float
$cgpa=90.2;
echo "CGPA :$cgpa <br>";
//boolean
$isStudent=true;
echo "isStudent=var_dump($isStudent) <br>";
//array
$colors=array("RED","GREEN","BLUE");
echo "color:$colors[1] <br>";
//object
class Car{
    public $brand;
}
$c1=new Car();
$c1->brand="toyota";
echo $c1->brand;
//null
$var=null;
echo $var;
//resource used for files and db connections
$file=fopen("sia.txt","w");
//php string functions
//1.strlen
echo "length=".strlen("HEllo"). "<br>";
//2.strrev
echo "reverse=".strrev("Hello"). "<br>";
//3.strpos find position
echo "position=".strpos("hello world","world")."<br>";
//4.replace
echo "replace=".str_replace("world","jessy","hello world")."<br>";
//5.strtolower
echo 'lowercase='.strtolower('HELLO').'<br>';
//6.strtoupper
echo "uppercase=".strtoupper("hello")."<br>";
//7.substring
echo substr("hello world",0,5)."<br>";
//8.trim-remove spaces
echo "trim=".trim("  hello  ")."<br>";
//9.compare strings
/*0 → strings are equal

positive number → string1 is greater

negative number → string1 is smaller*/
echo "compare=".strcmp("hello","banan")."<br>";
//10.explode - split string into array
$arr=explode(",","a,b,c");
print_r($arr);
//11.implode - join array into string
$str=implode(",",$arr);
echo "<br>implode=".$str;
//12.ucfirst - capitalize first letter
echo "<br>ucfirst=".ucfirst("hello")."<br>";
//13.ucwords - capitalize first letter of each word
echo "ucwords=".ucwords("hello world")."<br>";
?>
