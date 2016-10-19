<?php

$g_number = 3;

function double_gnum(){
	global $g_number;
	$g_number *= 2;
	static $number = 0;
	$number++;
}

for($i=0; $i<20; $i++){
	double_gnum();
}

echo $g_number;