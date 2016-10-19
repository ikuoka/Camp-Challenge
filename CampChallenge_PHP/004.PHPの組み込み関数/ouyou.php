<?php

//start_log
$start_time = microtime(true);
$log_msg = "開始時間： ".formatMicrotime($start_time,'Y-m-d H:i:s')."\n";
echo $log_msg;
error_log($log_msg, 3, 'error_log.txt');

echo '<br>';

//process１
echo 'htmlspecialcharsを実行';
$string = '<a href="http://google.com">Google</a>';
$result = htmlspecialchars($string, ENT_QUOTES);
echo $result ."<br>";

//process２
echo 'strip_tagsを実行';
$string = '<a href="http://google.com">Google</a>';
$result = strip_tags($string);
echo $result ."<br>";

//end_log
$end_time = microtime(true);
$log_msg = "終了時間： ".formatMicrotime($end_time,'Y-m-d H:i:s')."\n";
echo $log_msg;
error_log($log_msg, 3, 'error_log.txt');

echo '<br><br>';

//log_display
$file_txt = file_get_contents('error_log.txt');
echo $file_txt;

//time_format_convert_method
function formatMicrotime($time, $format = null)
{
   if (is_string($format)){
        $sec  = (int)$time;
        $msec = (int)(($time - $sec) * 100000);
        $formated = date($format, $sec). '.'. $msec;
     } else {
        $formated = sprintf('%0.5f', $time);
    }
    return $formated;
}