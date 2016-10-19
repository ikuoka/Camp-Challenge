<?php

function get_profile(){
	$profile1 = "id：1<br>名前：ほりた<br>生年月日：1992/08/01<br>住所：よこはま";
	return $profile1;	
}

$profile1_1 = get_profile();
echo $profile1_1;


//引数でゲットする

// function get_profile($id, $name, $birth, $address){
// 	$profile = 'id：' . $id .'<br>'. '名前：' .$name. '<br>'. '生年月日：' .$birth. '<br>'. '住所：' .$address;
// 	return $profile;
// }

// $my_profile = get_profile(3, 'ほりたこうき', '1992/08/01', '横浜市');
// echo $my_profile;

