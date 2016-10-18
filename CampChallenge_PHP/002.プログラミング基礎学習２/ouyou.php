<?php

$originNum = $_GET['originNum'];
$varNum = $originNum;
$num = null;
$otherNum = null;

while($varNum != 2 || $varNum != 3 || $varNum != 5 || $varNum != 7){
if($varNum%2 == 0){
	$num .= '2, ';
	$varNum /= 2;
	if($varNum == 1){
		break;
	}
}elseif($varNum%3 == 0){
	$num .= '3, ';
	$varNum /= 3;
	if($varNum == 1){
		break;
	}
}elseif($varNum%5 == 0){
	$num .= '5, ';
	$varNum /= 5;
	if($varNum == 1){
		break;
	}
}elseif($varNum%7 == 0){
	$num .= '7, ';
	$varNum /= 7;
	if($varNum == 1){
		break;
	}
}else{
	$otherNum = $varNum;
	break;
}
}

echo '元の値：' . $originNum;
echo '<br>';
echo '1桁の素因数：' .$num;
echo '<br>';
echo 'その他：' .$otherNum;
