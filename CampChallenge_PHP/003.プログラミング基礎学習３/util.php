<?php

function my_profile(){
	echo '名前：ホリタコウキ<br>';
	echo '生年月日：1992/08/01<br>';
	echo '自己紹介：はじめましてホリタです。<br>';
}

function num_decision($num){
	if($num%2 == 0){
		echo '偶数';
	}else{
		echo '奇数';
	}
}