<?php

//課題１
$num1 = 1;
switch($num1){
	case 1:
	echo 'one';
	break;
	case 2:
	echo 'two';
	break;
	default:
	echo '想定外';
	break;
}
echo '<br>';

//課題２
$str1 = 'A';
switch($str1){
	case 'A':
	echo '英語';
	break;
	case 'あ':
	echo '日本語';
	break;
}

echo '<br>';

//課題３
for($i=0; $i<20; $i++){
	$num2 = 8;
	echo $num2 *= 8;
}

echo '<br>';

//課題４
$str2 = "";
for($i=0; $i<30; $i++){
	$str2 .= 'A';
}
echo $str2;

echo '<br>';

//課題５
$sum = 0;
for($i=0; $i<=100; $i++){
	$sum += $i;
}
echo $sum;

echo '<br>';

//課題６
$num3 = 1000;
while($num3 >= 100){
	$num3 /= 2;
}
echo $num3;

echo '<br>';

//課題７
$arr = array(10, 100, 'soeda', 'hayashi', -20, 118, 'END');

//課題８
$arr[2] = 33;
var_dump($arr);

echo '<br>';

//課題９
$arr2 = array(
	1 => 'AAA',
	'hello' => 'world',
	'soeda' => 33,
	20 => 20
);

var_dump($arr2);