<?php

$profiles = array(
	'profile1' => array(1, 'ほりた', '1992/08/01', 'よこはま'),
	'profile2' => array(2, 'すずき', '1990/10/09', 'とうきょう'),
	'profile3' => array(3, 'ますだ', '2001/09/22', 'さいたま')
	);

foreach($profiles as $key => $data){
	if($key == 'profile3'){
		break;
	}else{
	for($i=0; $i<4; $i++){
		if($i == 0 || $i == 3){
			continue;
		}elseif($i == 1){
			echo '名前は' .$data[$i]. '<br>';
		}else{
			echo '生年月日は' .$data[$i]. '<br>';
		}
	}
	}
}