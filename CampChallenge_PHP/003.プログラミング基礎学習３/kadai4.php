<?php

function my_profile(){
	echo '名前：ホリタコウキ<br>';
	echo '生年月日：1992/08/01<br>';
	echo '自己紹介：はじめましてホリタです。<br>';
	return true;
}

for($i=0; $i<10; $i++){
	my_profile();
	if(true){
		echo 'この処理は正しく実行できました';
	}else{
		echo '正しく実行できませんでした';
	}
	echo '<br>';
}

