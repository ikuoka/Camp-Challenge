<?php

function num_decision($num){
	if($num%2 == 0){
		echo '偶数';
	}else{
		echo '奇数';
	}
}

num_decision(5);