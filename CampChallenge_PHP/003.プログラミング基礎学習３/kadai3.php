<?php

function kadai3($num1, $num2=5, $type=false){
	if($type=true){
		echo ($num1 * $num2)**2;
	}else{
		echo $num1 * $num2;
	}
}
kadai3(4, 3, true);