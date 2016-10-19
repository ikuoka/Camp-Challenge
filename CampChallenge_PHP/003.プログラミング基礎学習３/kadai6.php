<?php

function get_profile($keyword){
	$profiles = array(
		"id：1<br>名前：ほりた<br>生年月日：1992/08/01<br>住所：よこはま",
		"id：2<br>名前：すずき<br>生年月日：1991/11/12<br>住所：とうきょう",
		"id：3<br>名前：ますだ<br>生年月日：1993/02/11<br>住所：あきた",
		);

	//引数のキーワードで検索
	for($i=0; $i<3; $i++){
		if(strstr($profiles[$i], $keyword)){
			return $profiles[$i];
			break;
		}
	}
}

$profile1_1 = get_profile('す');
echo $profile1_1;

echo "<br><br>";

echo '検索ワード：す';