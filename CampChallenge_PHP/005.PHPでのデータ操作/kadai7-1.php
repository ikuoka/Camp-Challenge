<?php

session_start();
if(isset($_POST['name'])){
$_SESSION['name'] = $_POST['name'];
}
if(isset($_POST['sex'])){
$_SESSION['sex'] = $_POST['sex'];
}
if(isset($_POST['hobby'])){
$_SESSION['hobby'] = $_POST['hobby'];
}

$name = isset($_POST['name']) ? $_POST['name'] : "";
$sex = isset($_POST['sex']) ? $_POST['sex'] : "";
$hobby = isset($_POST['hobby']) ? $_POST['hobby'] : "";

echo '名前：' .$name. '<br>';
echo '性別：' .$sex. '<br>';
echo '趣味：' .$hobby. '<br>';