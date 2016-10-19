<?php
date_default_timezone_set('Asia/Tokyo');

//課題１
$stamp1 = mktime(0, 0, 0, 1, 1, 2016);
$today1 = date('Y年m月d日 H時i分s秒' ,$stamp1);
echo $today1;

echo '<br><br>';

//課題２
$today2 = date('Y-m-d H:i:s');
echo $today2;

echo '<br><br>';

//課題３
$stamp3 = mktime(10, 0, 0, 11, 4, 2015);
$today3 = date('Y-m-d H:i:s' ,$stamp3);
echo $today3;

echo '<br><br>';

//課題４
$stamp4 = mktime(0, 0, 0, 1, 1, 2015);
$stamp4_2 = mktime(23, 59, 59, 12, 31, 2015);
$diff4 = $stamp4_2 - $stamp4;
echo $diff4;

echo '<br><br>';

//課題５
echo strlen('ほりたこうき'). '<br>';
echo mb_strlen('ほりたこうき');

echo '<br><br>';

//課題６
echo strstr('ikuokatiroh@gmail.com', '@');

echo '<br><br>';

//課題７
$str7 = 'きょUはぴIえIちぴIのくみこみかんすUのがくしゅUをしてIます';
$str7 = str_replace('I', 'い', $str7);
$str7 = str_replace('U', 'う', $str7);
echo $str7;

echo '<br><br>';

//課題８
$fp = fopen('profile.txt', 'w');
fwrite($fp, 'ぼくはほりたこうきです');
fclose($fp);

echo '<br><br>';

//課題９
$fp = fopen('profile.txt', 'r');
$file_txt = fgets($fp);
echo $file_txt;
fclose($fp);