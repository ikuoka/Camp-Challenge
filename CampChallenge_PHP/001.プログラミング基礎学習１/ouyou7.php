<?php

$classNumber = $_GET['classNumber'];
$totalPrice = $_GET['totalPrice'];
$number = $_GET['number'];

//商品種別の処理
if($classNumber == 1){
	$class = '雑貨';
}elseif($classNumber == 2){
	$class = '生鮮食品';
}elseif($classNumber == 3){
	$class = 'その他';
}else{
	echo '商品種別エラー';
}

//1個あたりの値段
$costPer = $totalPrice / $number;

//ポイントの処理
$point = '0';
if($totalPrice >= 5000){
	$point = '5';
}elseif($totalPrice >= 3000){
	$point = '4';
}

//　↓　出力結果

//総額が0未満の場合
if($totalPrice < 0){
	echo '総額が負の値です。';
}else{
//総額が0以上の場合
	echo '商品種別は' .$class. 'です。';
	echo '<br>';
	echo '総額は' .$totalPrice. '、１個当たりの値段は'. $costPer .'です。';
	echo '<br>';
	echo 'ポイントは' .$point. 'です。';
}
