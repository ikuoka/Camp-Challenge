<?php
date_default_timezone_set('Asia/Tokyo');

$access_time = date('Y/m/d H:i:s');
setcookie('LastLoginDate', $access_time);

$lastDate = isset($_COOKIE['LastLoginDate']) ? $_COOKIE['LastLoginDate'] : "";

echo 'クッキー<br>';
echo $lastDate;