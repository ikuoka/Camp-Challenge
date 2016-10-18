<?php

echo 'Hello world.';
echo '<br>';
echo 'groove' .'-'. 'gear';
echo '<br>';
$name = 'ホリタコウキ';
echo '私の名前は' .$name. 'です';
echo '<br>';
const numb1 = 10 + 5;
$numb2 = 12 * 2;
echo '定数は' .numb1;
echo '<br>';
echo '変数は' .$numb2;
echo '<br>';
$numb3 = 'a';
if($numb3 == 1){
	echo '1です';
}elseif($numb3 == 2){
	echo 'プログラミングキャンプ！';
}elseif($numb3 == 'a'){
	echo '文字です！';
}else{
	echo 'その他です！';
}