<?php

date_default_timezone_set('Asia/Tokyo');

session_start();

$access_time = date('Y/m/d H:i:s');
$_SESSION['time'] = $access_time;

echo $_SESSION['time'];
